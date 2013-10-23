<?php
/**
 * Created by PhpStorm.
 * User: glilya
 * Date: 21.10.13
 * Time: 18:37
 */

namespace WebApiGreenEngine;

class Core {
    public static function route () {
        $out = array();
        $out['data'] = self::getAllApiMethods();

        Common::jecho($out);
    }

    private static function getAllApiMethods () {

        $out = array();
        $files = array_values(array_filter(scandir('system/classes/WebApiGreenEngine/Controllers'), function($item) {
            $ignored = array('.','..','class.Generic.php');
            return (!in_array($item, $ignored));
        }));
        $out['classes'] = array_map(function ($item) {
            return array('name' => str_replace(array('class.', '.php'), '', $item));
        }, $files);
        for ($i = 0; $i < sizeof($out['classes']); $i++) {
            $rc = new \ReflectionClass('\\WebApiGreenEngine\\Controllers\\'.$out['classes'][$i]['name']);
            $out['classes'][$i]['description_class'] = str_replace(array('/**','*/'), '', $rc->getDocComment());
            $out['classes'][$i]['methods'] = array();
        }

        return $out;
    }
} 