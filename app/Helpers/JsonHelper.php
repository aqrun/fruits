<?php
namespace App\Helpers;

class JsonHelper
{
    public static function error($data, $statusCode=0)
    {
        return self::generate($data, $statusCode);
    }

    public static function success($data, $statusCode=0)
    {
        return self::generate($data, $statusCode);
    }

    public static function generate($data, $statusCode=0)
    {
        if(empty($data)){
            $data = new \stdClass();
        }

        return response()->json([
            'code' => $statusCode,
            'msg' => 'Internal error',
            'result' => $data,
        ]);
    }
}
