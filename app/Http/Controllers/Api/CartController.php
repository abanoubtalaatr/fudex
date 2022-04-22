<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Resources\CartResource;
use App\Http\Responses\SuccessResponse;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        return CartResource::collection(Cart::paginate(12));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CartRequest  $request
     * @return \App\Http\Responses\SuccessResponse
     */
    public function store(CartRequest $request): SuccessResponse
    {
        $itemExistBefore = Cart::where('item_id', $request->input('item_id'))->first();

        if(is_null($itemExistBefore)) {
            Cart::create($request->validated());
            return new SuccessResponse();
        }

        $oldQuantity = $itemExistBefore->quanity;

        $itemExistBefore->update([
           'quantity' => $oldQuantity + $request->input('quantity')
        ]);
        return new SuccessResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \App\Http\Resources\CartResource
     */
    public function show(Cart $cart): CartResource
    {
        return CartResource::make($cart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \App\Http\Responses\SuccessResponse
     */
    public function update(CartRequest $request, Cart $cart): SuccessResponse
    {
        $cart->update($request->validated());

        return new SuccessResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \App\Http\Responses\SuccessResponse
     */
    public function destroy(Cart $cart): SuccessResponse
    {
        $cart->delete();

        return new SuccessResponse();
    }
}
