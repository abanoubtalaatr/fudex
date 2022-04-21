<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Responses\SuccessResponse;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        return CustomerResource::collection(Customer::paginate(12));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CustomerRequest  $request
     * @return \App\Http\Responses\SuccessResponse
     */
    public function store(CustomerRequest $request): SuccessResponse
    {
        Customer::create($request->validated());

        return new SuccessResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \App\Http\Resources\CustomerResource
     */
    public function show(Customer $customer): CustomerResource
    {
        return CustomerResource::make($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \App\Http\Responses\SuccessResponse
     */
    public function update(CustomerRequest $request, Customer $customer): SuccessResponse
    {
        $customer->update($request->validated());

        return new SuccessResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \App\Http\Responses\SuccessResponse
     */
    public function destroy(Customer $customer): SuccessResponse
    {
        $customer->delete();

        return new SuccessResponse();
    }
}
