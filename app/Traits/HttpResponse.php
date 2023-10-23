<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Resources\Json\JsonResource;


trait HttpResponse
{

    public function response(string $message, string|int $status, array|Model|JsonResource $data = [])
    {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "data" => $data
        ], $status);
    }

    public function error(string $message, string|int $status, MessageBag|array $errors=[], array $data = [])
    {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "errors"=> $errors,
            "data" => $data
        ], $status);
    }
}
