<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\BikeSale;
use App\Models\Payment;
use App\Models\ProfitLoss;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BikeSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if($request->has('query')){
            $q = $request->input('query');
            // $sales = BikeSale::with('bike')->where('name', 'like', '%' . $q . '%')->whereHas('bike', function($query) {
            //     $query->where('bike_name', 'like', '%' . $q . '%');
            // })->get();
            $sales = BikeSale::with('bike')
            ->where(function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%')
                    ->orWhereHas('bike', function($query) use ($q) {
                        $query->where('bike_name', 'like', '%' . $q . '%');
                    });
            })
            ->paginate(15);

        }else{
            $sales = BikeSale::with('bike')->paginate(15);
        }
        return view('admin.sales-bikes', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getinvoice(Request $request){
        $id = $request->id;
        $bike_sale = BikeSale::where('id',$id)->first();
        $bike = Bike::where('id' , $bike_sale->bike_id)->first();
        return view('admin.print-invoice', compact('bike_sale', 'bike'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'cnic' => 'required',
            'payment_method' => 'required',
        ]);
        
        // dd($request->all());
        $bike = Bike::where('engine_no', $request->engine_no)->first();
        $bike->status = 1;
        $bike->sale_price = $request->sale_price;
        $bike->sale_date = $request->sale_date;
        $bike->save();
        $bike_sale = new BikeSale();
        $bike_sale->bike_id = $bike->id;        
        $bike_sale->name = $request->name;        
        $bike_sale->father_name = $request->father_name;        
        $bike_sale->cnic = $request->cnic;        
        $bike_sale->address = $request->address;        
        $bike_sale->payment_method = $request->payment_method;
        $bike_sale->save();
        if($bike_sale->payment_method == 'installment'){

            $payment = new Payment();
            $payment->sale_id = $bike_sale->id;
            $payment->advance_payment = $request->advance_payment;
            $payment->paid_amount = $request->advance_payment;
            $payment->total_price = $bike->sale_price;
            $payment->save();
            $inputData = $request->all();
            $installmentCount = 1;
            $installmentDate = Carbon::now()->addMonths(2);

            foreach ($inputData as $fieldName => $fieldValue) {
                if (strpos($fieldName, 'input_') === 0) { 
                    $amount = $fieldValue;
                   
                    $installment = new Transaction();
                    $installment->sale_id = $bike_sale->id;
                    $installment->payment_id = $payment->id;
                    $installment->installment_count = $installmentCount;
                    $installment->amount = $amount;
                    $installment->paid_date = $installmentDate->format('Y-m-d');
                    $installment->save();
                    $installmentCount++;
                    $installmentDate->addMonths(2);
                }
            }


        }else{
            $payment = new Payment();
            $payment->sale_id = $bike_sale->id;
            $payment->paid_amount = $bike->sale_price;
            $payment->total_price = $bike->sale_price;
            $payment->status = 1;
            $payment->save();
        }
        // ---- profit loss -----
        $profit = $request->sale_price - $request->purchase_price;
        $profit_loss = ProfitLoss::first();
        if (!$profit_loss) {
            $profit_loss = new ProfitLoss();
            $profit_loss->total_prof_loss = 0;
        }
        $profit_loss->total_prof_loss += $profit;
        $profit_loss->save();
        // return redirect()->route('bike-sales.index')->with('message', 'Sale Added Successfully!');
        return view('admin.print-invoice', compact('bike_sale', 'bike'));
    }

    /**
     * Display the specified resource.
     */
    public function show(BikeSale $bikeSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BikeSale $bikeSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BikeSale $bikeSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BikeSale $bikeSale)
    {
        //
    }
    //--------
    public function addBike()
    {
        $bikes = Bike::where('status', 0)->get();
        return view('admin.bike-sale', compact('bikes'));
    }
    //--------
    public function getBike($engine_no)
    {
        $bike = Bike::where('engine_no', $engine_no)->first();
        return response()->json($bike);
    }
    public function bikeModel($bikeModel)
    {
        $colors = Bike::select('colour')->where('model', $bikeModel)->distinct()->get();
        return response()->json([
            'colors' => $colors,
        ]);
    }
    // ---------
    public function invoice()
    {
        return view('admin.invoice');
    }
}
