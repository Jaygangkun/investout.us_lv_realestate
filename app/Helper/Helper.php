<?php
namespace App\Helper;

class Helper
{
    public static function numberWithCommas($val){
        return rtrim(rtrim(number_format($val, 2, '.', ','), '0'), '.');
    }
}

?>