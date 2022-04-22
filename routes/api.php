<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CustomerCartController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('customers/{customer}/cart', CustomerCartController::class)->name('customer-cart');
Route::apiResource('items', ItemController::class);
Route::apiResource('carts', CartController::class);
Route::apiResource('customers', CustomerController::class);
Route::apiResource('orders', OrderController::class);
