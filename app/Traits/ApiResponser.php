<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{

    public function successResponse($data, $message = null, $code = Response::HTTP_OK)
    {
        return \response()->json([
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function errorResponse($message, $errors = null, $code = 422)
    {
        return \response()->json([
            'message' => $message,
            'errors' => $errors
        ], $code);
    }
}
