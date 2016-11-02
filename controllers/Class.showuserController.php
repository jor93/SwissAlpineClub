<?php

/**
 * Created by PhpStorm.
 * User: vm
 * Date: 03.10.2016
 * Time: 10:55
 */
class showuserController extends Controller
{

    private $accountId;

    function showuser(){
        if(self::getActiveUserWithoutCookie())$this->account = $_SESSION['account'];
        else $this->redirect('login', 'login');
    }

    //Account::updateAccount(1, 'PeterNames', 'PeterLastname', 'Address Peter', '1', '5555555', 'SE', '2');

    function updateUserAccount(){
        //var_dump($this->account->getIdAccount());
        $this->accountId = $_SESSION['account']->getIdAccount();

        if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['address']) &&
        isset($_POST['locationId']) && isset($_POST['loc']) && isset($_POST['plz']) && isset($_POST['phone']) && isset($_POST['lang']) && isset($_POST['countryId'])
        && $_POST['country']){
            //Check if something has changed in the database
            if(Account::updateAccount($this->accountId, $_POST['firstname'], $_POST['lastname'], $_POST['address'],
                $_POST['locationId'], $_POST['phone'], $_POST['language'], $_POST['countryId'])){
                $this->account->setFirstname($_POST['firstname']);
                $this->account->setLastname($_POST['lastname']);
                $this->account->setAddress($_POST['address']);
                $this->account->getLocation()->setLocationName($_POST['locationName']);
                $this->account->getLocation()->setPostcode($_POST['postcode']);
                $this->account->setPhone($_POST['phone']);
                $this->account->setLanguage($_POST['language']);
                $this->account->getCountry()->setNameCountry($_POST['countryName']);
                $_SESSION['account'] = $this->account;
                $this->redirect('profile', 'showuser');
            }
        }

        $this->redirect('profile', 'showuser');
    }
}