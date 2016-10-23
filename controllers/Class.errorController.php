<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 23.09.2016
 * Time: 09:12
 */

class errorController extends Controller {
    /**
     * Method that controls the page 'http404.php'
     */
    function error404()
    {
        // check url
        $path = parse_url(
            (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' .
            $_SERVER['HTTP_HOST'] .
            $_SERVER['REQUEST_URI']
        );

        $parts = explode("/", substr($path['path'], 1));
        $controller = ucfirst(strtolower((@$parts[1]) ? $parts[1] : ""));
        $method = strtolower((@$parts[2]) ? $parts[2] : "");

        $this->vars['controller'] = $controller;
        $this->vars['method'] = $method;
        $this->vars['title'] = '404_error';
    }

    public static function showErrorFromSession($errorNumber){
        if(!isset($_SESSION['error'])){
            return false;
        }
        $array = $_SESSION['error'];
        $length = count($array);
        for ($i = 0; $i < $length; ++$i) {
            if($errorNumber === $array[$i])
               return true;
        }
    }
}