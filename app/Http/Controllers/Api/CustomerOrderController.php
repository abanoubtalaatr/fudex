<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    /**
     * @param Request $request
     * @param $customer
     * @return JsonResponse
     */
    public function index(Request $request, $customer): JsonResponse
    {
        $orders = Order::where('customer_id', $customer)->get();

        return response()->json(['data' => $orders->load('customer')]);
    }
}
