<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class SuccessResponse implements Responsable
{
    public function toResponse($request)
    {
        return response()->json([], Response::HTTP_ACCEPTED);
    }
}
