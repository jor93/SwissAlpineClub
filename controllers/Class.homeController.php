<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 28.09.2016
 * Time: 14:21
 */


class homeController extends Controller {

    public function home(){
        //if a user is active he cannot re-login
        if($this->getActiveUser()){
            $this->redirect('login', 'welcome');
            exit;
        }
    }

}