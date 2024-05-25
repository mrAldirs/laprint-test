<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseOrderController;

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

Route::get('/', [AuthController::class, 'index'])->name('signin')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [AuthController::class, 'register'])->name('signup')->middleware('guest');
Route::post('/registrasi', [AuthController::class, 'regis'])->name('register')->middleware('guest');

Route::middleware(['auth'])->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
  Route::resource('customer', CustomerController::class);
  Route::resource('supplier', SupplierController::class);
  Route::get('/p/{status}', [ProductController::class, 'index'])->name('product.index2');
  Route::resource('product', ProductController::class);
  Route::get('/product/change-status/{id}', [ProductController::class, 'changeStatus']);
  
  Route::resource('sales', SalesOrderController::class);
  Route::get('/sales/approve/{id}', [SalesOrderController::class, 'approve']);
  
  Route::resource('purchase', PurchaseOrderController::class);
  Route::get('/get-sales-order/{id}', [PurchaseOrderController::class, 'getSalesOrder'])->name('getSalesOrder');
  Route::get('/purchase/approve/{id}', [PurchaseOrderController::class, 'approve']);
  
  Route::resource('penerimaan', PenerimaanController::class);
  Route::get('/get-purchase-order/{id}', [PenerimaanController::class, 'getPurchaseOrder'])->name('getPurchaseOrder');
  Route::get('/receipt/approve/{id}', [PenerimaanController::class, 'approve']);
  
  Route::resource('inventory', InventoryController::class);
});
