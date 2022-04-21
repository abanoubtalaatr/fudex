<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Responses\SuccessResponse;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        return OrderResource::collection(Order::paginate(12));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @return \App\Http\Responses\SuccessResponse
     */
    public function store(OrderRequest $request): SuccessResponse
    {
        Order::create($request->validated());

        return new SuccessResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \App\Http\Resources\OrderResource
     */
    public function show(Order $order): OrderResource
    {
        return OrderResource::make($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \App\Http\Responses\SuccessResponse
     */
    public function update(OrderRequest $request, Order $order): SuccessResponse
    {
        $order->update($request->validated());

        return new SuccessResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \App\Http\Responses\SuccessResponse
     */
    public function destroy(Order $order): SuccessResponse
    {
        $order->delete();

        return new SuccessResponse();
    }
}
