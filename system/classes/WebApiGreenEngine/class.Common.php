<?php
/**
 * Created by PhpStorm.
 * User: glilya
 * Date: 23.10.13
 * Time: 1:21
 */

namespace WebApiGreenEngine;


class Common {
    public static function jecho (array $arr) {
        echo(json_encode($arr));
    }
} 