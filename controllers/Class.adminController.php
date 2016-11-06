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

    function manageInscription(){

    }
    function showInscription(){

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
            $operation = $this->badassSafer($_POST['operation']);
            if($operation == 1){
                Account::deleteAccount($_SESSION['accountToChange']->getIdAccount());
                $_SESSION['country'] = null;
                $_SESSION['accountToChange'] = null;
                $this->redirect('admin','manageAccount');

            }else if($operation == 0){
                // get form
                $firstName = $this->badassSafer($_POST['firstname']);
                $lastName = $this->badassSafer($_POST['lastname']);
                $address = $this->badassSafer($_POST['address']);
                $zip = $this->badassSafer($_POST['zip']);
                $location = $this->badassSafer($_POST['location']);
                $phone = $this->badassSafer($_POST['phone']);
                $language = $this->badassSafer($_POST['lang']);
                $country = $this->badassSafer($_POST['country']);
                $abo = $this->badassSafer($_POST['abo']);
                $run = $this->badassSafer($_POST['runlevel']);

                // create new account and fill with data
                $user = new Account();
                $user->setIdAccount($_SESSION['accountToChange']->getIdAccount());
                $user->setFirstname(ucwords($firstName));
                $user->setLastname(ucwords($lastName));
                $user->setPassword($_SESSION['accountToChange']->getPassword());
                $user->setEmail($_SESSION['accountToChange']->getEmail());
                $user->setAddress(ucwords($address));
                $user->setPhone($phone);
                $user->setLanguage($language);
                $user->setAbonnement($abo);
                $locationId = loginController::getIdLocationFromZipAndLocationName($location, $zip);
                $user->setLocation($locationId);
                $user->setCountry($country);
                $user->setRunlevel($run);
                $user->setLastlogin($_SESSION['accountToChange']->getLastlogin());
                $user->setActivated($_SESSION['accountToChange']->getActivated());

                // update account
                Account::updateAccountAdmin($user);
                $_SESSION['accountToChange'] = $user;
            }

        }

    }

}