<?php
namespace App\Helpers;

class JsonHelper
{
    public static function error($data=[], $msg='', $statusCode=1)
    {
        if(empty($msg)){
            $msg = 'Internal error';
        }
        return self::generate($data,$msg, $statusCode);
    }

    public static function success($data=[], $msg='', $statusCode=0)
    {
        if(empty($msg)){
            $msg = 'Success';
        }
        return self::generate($data,$msg, $statusCode);
    }

    public static function generate($data=[], $msg='', $statusCode=1)
    {
        if(empty($data)){
            $data = ['null'=>1];
        }

        return response()->json([
            'code' => $statusCode,
            'msg' => $msg,
            'result' => $data,
        ]);
    }
}
