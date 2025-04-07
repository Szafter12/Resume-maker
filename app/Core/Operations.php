<?php

namespace App\Core;

use DateTime;

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

    public static function formatDate($dateString)
    {
        $date = DateTime::createFromFormat('Y-m-d', $dateString);
        return $date ? $date->format('d M Y') : $dateString;
    }
}
