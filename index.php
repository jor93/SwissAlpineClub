<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 23.09.2016
 * Time: 09:11
 */

// global constants
define('SITE_NAME', 'SwissAlpineClub');
define('ROOT_DIR', dirname(getcwd()) . '/' . SITE_NAME.'/');
define('URL_DIR', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']
    . '/' . SITE_NAME.'/');

// load the required classes automatically
function __autoload($class)
{
    // check the controller
    if(file_exists(ROOT_DIR."controllers/Class.$class.php")){
        require(ROOT_DIR."controllers/Class.$class.php");
        return;
    }
    // check the model
    if(file_exists(ROOT_DIR."models/Class.$class.php")){
        require(ROOT_DIR."models/Class.$class.php");
        return;
    }
    // check the data
    if(file_exists(ROOT_DIR."data/Class.$class.php")){
        require(ROOT_DIR."data/Class.$class.php");
        return;
    }

}

// start the session
session_start();

// call the controller, method and view
require_once 'Class.Routing.php';
Routing::getInstance()->route();



