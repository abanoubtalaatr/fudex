<?php

namespace App\Actions;

use App\Models\Cart;
use Illuminate\Http\Request;

class DeleteCartForCustomerAction
{
    public function __invoke(Request $request)
    {
        $carts = Cart::where('customer_id' , $request->input('customer_id'))->get();

        foreach ($carts as $cart) {
            $cart->delete();
        }
    }
}
