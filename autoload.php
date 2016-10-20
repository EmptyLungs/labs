<?php
/**
 * Created by PhpStorm.
 * User: rint
 * Date: 20.10.2016
 * Time: 20:03
 */
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
