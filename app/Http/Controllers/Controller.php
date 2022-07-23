<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return JsonResponse
     */
    protected function resourceNotFound(): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'resource not found'
        ],404);
    }

    /**
     * @return JsonResponse
     */
    protected function resourceDeleted(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => 'resource deleted successfully'
        ],200);
    }


    protected function resourceError($error): JsonResponse
    {
        return response()->json([
            'status' => 'failed',
            'message' => $error
        ],500);
    }

}
