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
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
             $id = $this->badassSafer($_POST['showUser']);
            $_SESSION['accountId'] = $id;
             $this->redirect('admin','showAccount');
         }

     }

    function showAccount(){
        if(isset($_SESSION['accountId'])) {
            $id = $this->badassSafer($_SESSION['accountId']);
            $result = Account::selectAccountById($id);
            $account = Account::createAccount($result[0], $result[1], $result[2], $result[5], $result[3], $result[4], $result[12], $result[13], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11]);
            $_SESSION['accountToChange'] = $account;
        }
        if(!isset($_SESSION['country'])){
            $query = "select idCountry,NameCountry,CodeCountry from country;";
            $data = SQL::getInstance()->select($query)->fetchAll();
            $_SESSION['country'] = $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        }

    }

}