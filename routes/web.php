<?php

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/orders', 'OrderController');          // orders.index
Route::resource('/products', 'ProductController');       // products.index
Route::resource('/suppliers', 'SupplierController');    // suppliers.index
Route::resource('/users', 'UserController');            // users.index
Route::resource('/companies', 'CompanyController');     // companies.index
Route::resource('/transactions', 'TransactionController');     // companies.index

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//addition ni joshua
use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);