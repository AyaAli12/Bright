<?php
namespace App\Traits;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ApiResponse
{
    public function successResponse($data = null, string $message = null, int $status = 200)
    {
        $response = [
            'status' => true,
            'message' => $message,
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $status);
    }

    public function errorResponse($data = null, string $message = null , $status = 500)
    {
       
        $response = [
            'status' => false,
            'message' => $message,
        ];


        if (!is_null($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $status);
    }

    
}