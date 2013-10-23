<?php
/**
 * Created by PhpStorm.
 * User: glilya
 * Date: 21.10.13
 * Time: 18:37
 */

function rawLog ($file, $message, $isSet500AndDie = false) {
    $t = date("d-m-Y H:i:s");
    file_put_contents($file, "{$t} {$message} \r\n", FILE_APPEND | LOCK_EX);
    if ($isSet500AndDie) {
        header('HTTP/1.1 500 Internal Server Error');
        die('500 Internal Server Error');
    }
}

function loadClass ($classpath) {
    $path = ''; $class = '';
    if (($idx = strripos($classpath, '\\')) !== false) {
        $path = str_replace('\\', '/', substr($classpath, 0, $idx + 1));
        $class = 'class.'.substr($classpath, $idx + 1).'.php';
    } else $class = "/class.{$classpath}.php";
    $filepath = "system/classes/{$path}{$class}";
    if (is_readable($filepath)) require($filepath);
    else rawLog('error.log', "Class {$classpath} not found. DEBUG: {$filepath}");
}

spl_autoload_register('loadClass');