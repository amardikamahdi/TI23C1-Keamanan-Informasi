<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public function InternalServerErrorResponse(): JsonResponse
    {
        return response()->json([
            'message' => __('http-statuses.500'),
        ], 500);
    }

    public function CreatedResponse(string $redirect): JsonResponse
    {
        return response()->json([
            'message' => 'Data berhasil disimpan.',
            'redirect' => $redirect,
        ], 201);
    }
}
