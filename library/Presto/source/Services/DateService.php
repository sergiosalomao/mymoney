<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 13/04/2019
 * Time: 12:15
 */

class DateService
{
    const DATE_FORMAT = "d/m/Y";

    public static function DateNow($format = null){
        if ($format ==  null) $format =  self::DATE_FORMAT;
        return date ($format);
    }

    public static function DateEngToBr($date){
        return implode('/', array_reverse(explode('-', $date)));
    }

    public static function DateBrToEng($date){
        return implode('-', array_reverse(explode('/', $date)));
    }
}

