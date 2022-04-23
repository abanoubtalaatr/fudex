<?php

namespace App\Http\Controllers\Api;

use App\Actions\DeleteCartForCustomerAction;
use App\Actions\UpdateCustomerStoreCreditAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Responses\SuccessResponse;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @param UpdateCustomerStoreCreditAction $updateCustomerStoreCreditAction
     * @param DeleteCartForCustomerAction $deleteCartForCustomerAction
     * @return SuccessResponse
     */
    public function store(
        OrderRequest                    $request,
        UpdateCustomerStoreCreditAction $updateCustomerStoreCreditAction,
        DeleteCartForCustomerAction     $deleteCartForCustomerAction
    ): SuccessResponse
    {
        $updateCustomerStoreCreditAction($request);
        $deleteCartForCustomerAction($request);
        Order::create($request->validated());
        return new SuccessResponse();
    }
}
