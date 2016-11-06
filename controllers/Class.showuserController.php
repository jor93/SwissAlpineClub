<?php

/**
 * Created by PhpStorm.
 * User: vm
 * Date: 03.10.2016
 * Time: 10:55
 */
class showuserController extends Controller
{

    private $account;

    function showuser(){
        if(self::getActiveUserWithoutCookie())$this->account = $_SESSION['account'];
        else $this->redirect('login', 'login');
    }

    //Account::updateAccount(1, 'PeterNames', 'PeterLastname', 'Address Peter', '1', '5555555', 'SE', '2');

    function updateUserAccount(){

        if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['address'])
        && isset($_POST['loc']) && isset($_POST['plz']) && isset($_POST['phone']) && isset($_POST['lang'])
        && isset($_POST['country'])){

            $idLocation = loginController::getIdLocationFromZipAndLocationName($_POST['loc'], $_POST['plz']);

            $this->account = $_SESSION['account'];

            //Check if something has changed in the database
            if(Account::updateAccount($this->account->getIdAccount(), $this->badassSafer($_POST['fname']), $this->badassSafer($_POST['lname']),
                $this->badassSafer($_POST['address']), $idLocation, $this->badassSafer($_POST['phone']),
                $this->badassSafer($_POST['lang']), $_POST['country'])){
                $this->account->setFirstname($_POST['fname']);
                $this->account->setLastname($_POST['lname']);
                $this->account->setAddress($_POST['address']);
                $this->account->getLocation()->setLocationName($_POST['loc']);
                $this->account->getLocation()->setPostcode($_POST['plz']);
                $this->account->setPhone($_POST['phone']);
                $this->account->setLanguage($_POST['lang']);
                $this->account->getCountry()->setIdCountry(($_POST['country']));
                $_SESSION['account'] = $this->account;
                $this->redirect('profile', 'showuser');
            }
        }
        $this->redirect('profile', 'showuser');
    }
}