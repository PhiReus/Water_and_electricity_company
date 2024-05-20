<?php

if (!function_exists('format_Date')) {
    function format_Date($date, $format = 'Y-m-d')
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}

