<?php
/**
 * Created by PhpStorm.
 * User: glilya
 * Date: 21.10.13
 * Time: 18:37
 */

function rawLog ($file, $message) {
    $t = date("d-m-Y H:i:s");
    file_put_contents($file, "{$t} {$message} \r\n", FILE_APPEND | LOCK_EX);
}

function loadClass ($classpath) {
    $path = ''; $class = '';
    if (($idx = strripos($classpath, '\\')) !== false) {
        $path = str_replace('\\', '/', substr($classpath, 0, $idx + 1));
        $class = 'class.'.substr($classpath, $idx + 1).'.php';
    } else $class = "/class.{$classpath}.php";
    $filepath = "system/classes/{$path}{$class}";
    if (is_readable($filepath)) die("Class [{$classpath}] is file founded  in {$filepath}");
    else 
}