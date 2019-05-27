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
    static public function years($default=null)
    {   $j=1990;
        while ($j <= 2005) {
            echo "<option value='" . $j . "'>$j</option>";
            if (isset($default)){
                echo "<option selected value='" . $default . "'>$default </option>";
            }
            $j++;
        }
    }
}