<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\UserTypeController;
use App\Http\Controllers\Api\SubcategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user_type', [UserTypeController::class, 'getUserType']);

Route::get('user', [UserController::class, 'index']);
Route::post('user', [UserController::class, 'save']);
Route::get('user/{id}', [UserController::class, 'getUser']);
Route::put('user/{id}', [UserController::class, 'update']);
Route::delete('user/{id}', [UserController::class, 'delete']);

Route::get('unit', [UnitController::class, 'getUnits']);
Route::post('unit', [UnitController::class, 'save']);
Route::put('unit/{id}', [UnitController::class, 'update']);

Route::get('account', [AccountController::class, 'getAccounts']);

Route::get('category', [CategoryController::class, 'getCategory']);
Route::post('category', [CategoryController::class, 'save']);
Route::put('category/{id}', [CategoryController::class, 'update']);

Route::get('product', [ProductController::class, 'getProduct']);
Route::post('product', [ProductController::class, 'save']);
Route::put('product/{id}', [ProductController::class, 'update']);

Route::get('subcategory', [SubcategoryController::class, 'getsubcategory']);
Route::post('subcategory', [SubcategoryController::class, 'save']);
Route::put('subcategory/{id}', [SubcategoryController::class, 'update']);
Route::get('subcategory/{id}', [SubcategoryController::class, 'getsubcategoryId']);

Route::get('customer', [CustomerController::class, 'getCustomer']);
Route::post('customer', [CustomerController::class, 'save']);
Route::put('customer/{id}', [CustomerController::class, 'update']);
