<?php

namespace App\Helpers;

class StatistiquesHelper{

    public static function percentage($part, $total){
        $percentage =  $total ? ($part * 100) / $total : 0;
        return number_format($percentage, 2);
    }

}