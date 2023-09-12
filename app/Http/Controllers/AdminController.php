<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\BikeSale;
use App\Models\Expense;
use App\Models\Payment;
use App\Models\ProfitLoss;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        // dd('dhasdgj');
        $today = Carbon::now()->format('Y-m-d');
        $total_bike = Bike::where('status', 0)->count();
        $total_sale = Payment::select('payments')->sum('total_price');
        $total_bike_sale = BikeSale::count();
        $today_sales = BikeSale::whereDate('created_at', $today)->count();
        $profit_loss = ProfitLoss::first();
        $total_expnse = Expense::sum('total_expense');
        if($profit_loss){
            $toal_profit = $profit_loss->total_prof_loss - $total_expnse;
        }else{
            $toal_profit = 0;
            $total_expnse = 0;
        }
        // ---------
        // Get daily sales data from the database for the last 5 days
        $dateRange = collect(Carbon::now()->subDays(4)->daysUntil(Carbon::now()))->map(function($date) {
            return $date->format('Y-m-d');
        });

        $dailySales = Payment::selectRaw('DATE(created_at) as sale_date, SUM(total_price) as total_sales')
            ->where('created_at', '>=', $dateRange->first())
            ->groupBy('sale_date')
            ->orderBy('sale_date')
            ->get();

        // Prepare data for the Chart.js script
        $labels = $dateRange->toArray();
        $data = $dateRange->map(function($date) use ($dailySales) {
            $saleData = $dailySales->where('sale_date', $date)->first();
            return $saleData ? $saleData->total_sales : 0;
        })->toArray();
        // ------ this for circle pi chart ----------
        $totalAdded = Bike::count();
        $totalSold = BikeSale::count();
        $pidata = array(
           'totalAdded' => $totalAdded, 
            'totalSold' =>$totalSold
        );
        // dd($pidata['totalAdded']);
        return view('admin.index', compact('total_bike', 'total_sale', 'total_bike_sale', 'today_sales', 'labels', 'data', 'pidata', 'toal_profit', 'total_expnse') );
    }
    // ---------
    public function addExpense(){
        $expenses = Expense::paginate(20);
        return view('admin.add-expense', compact('expenses'));
    }
    // ---------
    public function expenseStore(Request $request){
         //
         $validated = $request->validate([
            'expense_name' => 'required',
            'total_expense' => 'required',
        ]);
        $data = $request->all();
        $expense = Expense::create($data);
        return back()->with('message', 'Expense added successfully.');
    }
    public function expenseUpdate(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);
        $expenses = $expense->update($request->all());
        return back()->with('message', 'Expense Updated Successfully.');
    }
    public function deleteExpense($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return back()->with('message', 'Expense Deleted Successfully.');
    }
}
