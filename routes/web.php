<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\BikeRepairController;
use App\Http\Controllers\BikeSaleController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () { 

Route::get('/dashboard', [AdminController::class, 'index']);
Route::get('add-expense', [AdminController::class, 'addExpense'])->name('add-expense');
Route::post('expense-store', [AdminController::class, 'expenseStore'])->name('expense-store');
Route::get('delete-expense/{id}', [AdminController::class, 'deleteExpense']);
Route::post('expense-update/{id}', [AdminController::class, 'expenseUpdate'])->name('expense-update');
Route::resource('bike-sales', BikeSaleController::class);
Route::get('add_bike', [BikeSaleController::class, 'addBike'])->name('bike-sales.add_bike');
Route::get('bike-sales/invoice/{id}', [BikeSaleController::class, 'getinvoice']);
Route::get('bike-sales/print/{id}', [BikeSaleController::class, 'print']);
Route::get('getBikes/{engine_no}', [BikeSaleController::class, 'getBike']);
Route::get('getBikeColors/{bikeModel}', [BikeSaleController::class, 'bikeModel']);
Route::get('invoice', [BikeSaleController::class, 'invoice'])->name('sales.invice');
Route::post('bike_sale_search', [BikeSaleController::class, 'index'])->name('bike-sale.search');
Route::get('repairng-list', [BikeRepairController::class, 'index'])->name('bikes.repairng-list');
Route::post('repaire-store', [BikeRepairController::class, 'store'])->name('repaire-store');
Route::post('repaier-update/{bikeRepair}', [BikeRepairController::class, 'update'])->name('repaier-update');
Route::get('delete-repaier/{id}', [BikeRepairController::class, 'destroy'])->name('delete-repaier');
Route::get('replace-repaire-bike/{id}', [BikeRepairController::class, 'replaceRepaireBike']);


Route::resource('bikes', BikeController::class);
Route::post('search', [BikeController::class, 'index'])->name('bikes.search');
Route::get('add-bike', [BikeController::class, 'addBike'])->name('bikes.add-bike');
Route::get('price-list', [BikeController::class, 'priceList'])->name('bikes.price-list');
// Route::post('getdata', [BikeController::class, 'getdata'])->name('bikes.getdata');

// ------- payments installments
Route::get('installments', [PaymentController::class, 'index'])->name('installments.index');
Route::get('view_installemts/{id}', [PaymentController::class, 'viewInstallemts']);
Route::get('paid_installment/{id}/{payment}', [PaymentController::class, 'paidInstallment']);
// Route::get('paid_second_installment/{id}', [PaymentController::class, 'paidSecondInstallment']);
// Route::get('unpaid_second_installment/{id}', [PaymentController::class, 'unPaidSecondInstallment']);
// Route::get('paid_third_installment/{id}', [PaymentController::class, 'paidThirdInstallment']);
// Route::get('unpaid_third_installment/{id}', [PaymentController::class, 'unPaidThirdInstallment']);
Route::get('complete_installment/{id}', [PaymentController::class, 'completeInstallemts']);
Route::get('delete_installemts/{id}', [PaymentController::class, 'deleteInstallemts']);
Route::post('search_installemts', [PaymentController::class, 'index'])->name('installment.search');

});