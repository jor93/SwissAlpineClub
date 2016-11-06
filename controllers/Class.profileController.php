<?php

/**
 * Created by PhpStorm.
 * User: mv
 * Date: 17.10.2016
 * Time: 17:52
 */
class profileController extends Controller
{

    function showuser(){
        if(!isset($_SESSION['country'])){
            $query = "select idCountry,NameCountry,CodeCountry from country;";
            $data = SQL::getInstance()->select($query)->fetchAll();
            $_SESSION['country'] = $data;
        }
    }

}