<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Contracts\DataTable;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if($request->has('query')) {
            $q = $request->input('query');
            $bikes = Bike::where('bike_name', 'like', '%' . $q . '%')->where('status', 0)->paginate(15);
        }else {
            $bikes = Bike::where('status', 0)->paginate(15);
        }
        return view('admin.all-bikes', compact('bikes'));

    }
    // public function search(Request $request)
    // {
    //     dd('dfsjj');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'bike_name' => 'required',
            'model' => 'required',
            'capacity' => 'required',
            'year' => 'required',
            'engine_no' => 'required|unique:bikes',
        ]);
        $data = request()->all();
        $bikes = Bike::create($data);
        // Alert::toast('Bike Added Successfully.', 'success');
        return back()->with('message', 'Bike added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bike $bike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bike $bike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bike $bike)
    {
        //
        // dd($bike);
        $bike->update($request->all());

        return redirect()->route('bikes.index')->with('message', 'Bike updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bike $bike)
    {
        //
        $bike->delete();
        return redirect()->back()->with('message', 'Bike deleted successfully');

    }
    // ----------
    public function getdata(Request $request) {
        
        if ($request->ajax()) {
            $data = Bike::select('*');
            return DataTable::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
    }
    // ------------
    public function addBike()
    {
        return view('admin.add-bike');
    }
    // -------------
    public function priceList(){
        $bikes = Bike::where('status', 0)
        ->select(['bike_name', 'model', DB::raw('MAX(purchase_price) as purchase_price')])
        ->groupBy('bike_name', 'model', 'purchase_price')
        ->get();
        return view('admin.price-list' , compact('bikes'));
    }
}
