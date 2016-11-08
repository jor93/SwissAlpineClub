<?php

/**
 * Created by PhpStorm.
 * User: mv
 * Date: 17.10.2016
 * Time: 17:53
 */
class adminController extends Controller
{
    function checkRights(){
        $user = Controller::checkActiveUser();
        if(is_bool($user) === true && !$user)
            $this->redirect('login', 'login');
        else if(is_int($user) === true && $user == 1)
            $this->redirect('profile', 'showuser');
    }

    function showhike(){
        $this->checkRights();
    }

    function managehike(){
        $this->checkRights();
    }

    function hikemanage(){
        $this->checkRights();
    }

     function showadmin(){
         $this->checkRights();
     }

     function manageaccount(){
         $this->checkRights();
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
             $id = $this->badassSafer($_POST['showUser']);
            $_SESSION['accountId'] = $id;
             $this->redirect('admin','showaccount');
         }
     }

    function manageinscription(){
        $this->checkRights();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $this->badassSafer($_POST['showInscription']);
            $_SESSION['idInscription'] = $id;
            $this->redirect('admin','showinscription');
        }
    }

    function showinscription(){
        $this->checkRights();
        if(isset($_SESSION['idInscription'])) {
            $id = $this->badassSafer($_SESSION['idInscription']);
            $result = Inscription::selectInscriptionByIdInscription($id);
            $_SESSION['inscriptionToChange'] = $result;
            $result_part = Participant::getParticipantFromInscription($id);
            $_SESSION['participants_Inscription'] = $result_part;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $operation = $this->badassSafer($_POST['operation']);
            if ($operation == 1) {
                // delete


/*
                Account::deleteAccount($_SESSION['accountToChange']->getIdAccount());
                $_SESSION['country'] = null;
                $_SESSION['accountToChange'] = null;
                $this->redirect('admin','manageAccount');
*/

            } else if ($operation == 0) {
                // save
                // get from form



                /*
                $firstName = $this->badassSafer($_POST['firstname']);
                $lastName = $this->badassSafer($_POST['lastname']);
                $abo = $this->badassSafer($_POST['aboPart']);

                // create new account and fill with data
                $user = new Account();
                $user->setIdAccount($_SESSION['accountToChange']->getIdAccount());
                $user->setFirstname(($firstName));
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
                */
            }
        }
    }

    function showaccount(){
        $this->checkRights();
        if(isset($_SESSION['accountId'])) {
            $id = $this->badassSafer($_SESSION['accountId']);
            $result = Account::selectAccountById($id);
            $account = Account::createAccount($result[0], $result[1], $result[2], $result[5], $result[3], $result[4], $result[12], $result[13], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11]);
            $_SESSION['accountToChange'] = $account;
            $_SESSION['accountId'] = null;

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
                $this->redirect('admin','manageaccount');
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
            } else if($operation == 2){
                $this->redirect('forgotpw','resetpassword');
            }
        }
    }
}