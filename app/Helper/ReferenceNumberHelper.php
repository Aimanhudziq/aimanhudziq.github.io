<?php

namespace App\Helper;

class ReferenceNumberHelper{


    /***
     * generate ref number for client by date + random number
     */
    
    public static function shuffleString($stringValue, $startWith = "") {
        $range = \range(0, \mb_strlen($stringValue));
        shuffle($range);
        foreach($range as $index) {
            $startWith .= \mb_substr($stringValue, $index, 1);
        }
        //dd($startWith);
        return $startWith;
    }


    /**
     * 1. generate ref number by using method shuffle string
     * eg output => g2^x%a)z+=jq$v1oubf#rk_ned3twihc(!lyp@ms&*
     * shuffle string method will be generate unique id 
     * 2. includes date ie: year + month + day (20191025)
     * 3. using sha1 (secure Hash Algorithm);
     */

    public static function genRefNum()
    {
        $strvalue = self::shuffleString("abcdefghijklmnopqrstuvwxyz1234567890");

        $str_alph = substr(uniqid($strvalue),0,8);

        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $ref_number =  strtoupper($today . $rand . $str_alph);
        //dd($ref_number);
        return $ref_number;
    }



}