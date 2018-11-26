<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 23/11/2018
 * Time: 11:16
 */
function load($class){
    require $class.'.php';
}

spl_autoload_register('load');