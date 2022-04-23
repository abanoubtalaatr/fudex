<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CustomerCartController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\CustomerOrderController;
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

Route::get('customers/{customer}/cart', CustomerCartController::class)->name('customer-cart');
Route::apiResource('items', ItemController::class)->only('index', 'show');
Route::apiResource('carts', CartController::class);
Route::apiResource('customers', CustomerController::class)->only('show');
Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/{customer}/order', [CustomerOrderController::class, 'index'])->name('orders.index');
