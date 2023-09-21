<?php

namespace App\Helpers;

class Helper
{

    public static function tempFormat(float $temp): ?int
    {
        return intval($temp);
    }

    public static function getTime(string $time=null)
    {
        if($time)
        {
            return  \Carbon\Carbon::createFromTimestamp($time)->format('h:m a');
        }
    }
}
