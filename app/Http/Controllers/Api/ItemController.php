<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Http\Responses\SuccessResponse;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        return ItemResource::collection(Item::paginate(12));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ItemRequest  $request
     * @return \App\Http\Responses\SuccessResponse
     */
    public function store(ItemRequest $request): SuccessResponse
    {
        Item::create($request->validated());

        return new SuccessResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $Item
     * @return \App\Http\Resources\ItemResource
     */
    public function show(Item $Item): ItemResource
    {
        return ItemResource::make($Item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ItemRequest  $request
     * @param  \App\Models\Item  $Item
     * @return \App\Http\Responses\SuccessResponse
     */
    public function update(ItemRequest $request, Item $Item): SuccessResponse
    {
        $Item->update($request->validated());

        return new SuccessResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $Item
     * @return \App\Http\Responses\SuccessResponse
     */
    public function destroy(Item $Item): SuccessResponse
    {
        $Item->delete();

        return new SuccessResponse();
    }
}
