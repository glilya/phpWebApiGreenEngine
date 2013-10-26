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

        /**
         * План реализации этой функции,
         *  * Получаем список классов, рефлексируем все
         *  * @webApiClassDescription - строчка описания класса
         *  * @webApiMethodDescription - строчка описания метода
         *  * @webApiProtocolType - Тип протокола вызова,
         */

        $out = array();

        $files = array_values(array_filter(scandir('system/classes/WebApiGreenEngine/Controllers'), function($item) {
            $ignored = array('.','..','class.Generic.php');
            return (!in_array($item, $ignored));
        }));
        $out['classes'] = array_map(function ($item) {
            return array('name' => str_replace(array('class.', '.php'), '', $item));
        }, $files);

        // Reflect classes
        for ($i = 0; $i < sizeof($out['classes']); $i++) {
            $reflectObj = new \ReflectionClass('\\WebApiGreenEngine\\Controllers\\'.$out['classes'][$i]['name']);

            $headComment = explode("\r\n", $reflectObj->getDocComment());
            foreach ($headComment as $line)
                if (strpos($line, '@webApiClassDescription') !== false)
                    $out['classes'][$i]['description'] = trim(str_replace('* @webApiClassDescription', '', $line));
            //$out['classes'][$i]['debug'] = $headComment;
        }

        return $out;
    }
} 