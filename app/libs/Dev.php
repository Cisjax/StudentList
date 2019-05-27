<?php

namespace app\libs;

class Dev
{
    public static function debug($str){
        echo '<pre>';
        var_dump($str);
        echo '</pre>';
        exit;
    }
}