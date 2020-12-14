<?php

namespace App\Helpers;

class StatistiquesHelper{

    private static $decimals = 2;

    public static function percentage($part, $total){
        $percentage =  $total ? ($part * 100) / $total : 0;
        return number_format($percentage, self::$decimals);
    }

}