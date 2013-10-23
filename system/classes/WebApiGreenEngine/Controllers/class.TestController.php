<?php
/**
 * Created by PhpStorm.
 * User: glilya
 * Date: 23.10.13
 * Time: 1:23
 */

namespace WebApiGreenEngine\Controllers;


/**
 * Class TestController
 * @package WebApiGreenEngine\Controllers
 */
class TestController extends Generic{

    /**
     *
     * @webApiProtocol any
     *
     * @return array
     */
    public function test () {
        return array('data' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10));
    }
} 