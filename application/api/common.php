<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/12/20
 * Time: 22:54
 */
function show($code, $message, $data)
{
    return [
        'code'=>$code,
        'message'=>$message,
        'data'=>$data
    ];
}