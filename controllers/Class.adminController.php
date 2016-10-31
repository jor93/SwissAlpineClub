<?php

/**
 * Created by PhpStorm.
 * User: mv
 * Date: 17.10.2016
 * Time: 17:53
 */
class adminController extends Controller
{

    function showHike(){

    }

    function manageHike(){

    }

    function hikeImageTest(){


    }

    function hikemanage(){

    }
     function showadmin(){

     }

     function manageAccount(){


     }

    function showAccount(){
        var_dump($_POST);
        $id = $_POST['selectedId'];
        echo 'testtetsttest: ' . $id . '</br>';

        if(isset($_SESSION['id']))
            $id = $_SESSION['id'];
            echo 'asdfasdf: ' . $id;


    }

}