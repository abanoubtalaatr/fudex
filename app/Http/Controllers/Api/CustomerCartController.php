<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CustomerCartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $customer): \Illuminate\Http\JsonResponse
    {
        $customerCart = Cart::where('customer_id', $customer)->get();

        return response()->json(['data' => $customerCart->load('item')]);
    }
}
