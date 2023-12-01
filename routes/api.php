<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AccountController;

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

Route::get('user', [UserController::class, 'index']);
Route::post('user', [UserController::class, 'save']);
Route::post('user/{id}', [UserController::class, 'getUser']);
Route::put('user/{id}', [UserController::class, 'update']);
Route::delete('user/{id}', [UserController::class, 'delete']);

Route::get('unit', [UnitController::class, 'getUnits']);
Route::post('unit', [UnitController::class, 'save']);
Route::put('unit/{id}', [UnitController::class, 'update']);

Route::get('account', [AccountController::class, 'getAccounts']);