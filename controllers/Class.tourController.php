<?php

/**
 * Created by PhpStorm.
 * User: mv
 * Date: 14.10.2016
 * Time: 09:18
 */
class tourController extends Controller
{

    function tour(){
        if($this->getAdminUser()){
            $this->redirect('login', 'login');
            exit;
        }
    }




}