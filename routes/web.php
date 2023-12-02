<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get('/cashier', function () {
    return view('cashier');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/units', function () {
    return view('units');
});

Route::get('/products', function () {
    return view('products');
});


Route::get('/customers', function () {
    return view('customers');
});
Route::get('/subcategory', function () {
    return view('subcategory');
});

// Route::get('/orders', function () {
//     return view('orders');
// });
