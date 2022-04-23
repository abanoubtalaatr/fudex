<?php

namespace App\Actions;

use App\Models\Customer;
use Illuminate\Http\Request;

class UpdateCustomerStoreCreditAction
{
    public function __invoke(Request $request)
    {
       $customer = Customer::find($request->input('customer_id'));

       $customer->update([
          'store_credit'=> $customer->store_credit - $request->input('total')
       ]);
    }
}
