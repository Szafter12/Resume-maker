<?php

namespace App\Core;

class Operations
{
    public static function response(string $status, string $message, $data = null)
    {
        echo json_encode(
            [
                'status' => $status,
                'message' => $message,
                'data' => $data
            ]
        );
    }
}
