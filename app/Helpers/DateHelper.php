<?php

namespace App\Helpers;

class DateHelper
{
    public static function getDate(string $date=null)
    {
        if($date) {
            $timestamp = \Carbon\Carbon::parse($date)->timestamp;
            return  '<span style="display:none">'.$timestamp.'</span>'.\Carbon\Carbon::parse($date)->format('m/d/Y');
        }
        return "N/A";
    }

    public static function getDateTime(string $datetime=null)
    {
        if($datetime) {
            $timestamp = \Carbon\Carbon::parse($datetime)->timestamp;
            return  '<span style="display:none">'.$timestamp.'</span>'.\Carbon\Carbon::parse($datetime)->format('m/d/Y g:i A');
        }
        return "N/A";
    }
}

