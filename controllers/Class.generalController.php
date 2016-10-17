<?php

/**
 * Created by PhpStorm.
 * User: gez
 * Date: 10.10.2016
 * Time: 09:53
 */
class generalController extends Controller
{
    function contact(){


    }

    function getRequestCustomer(){
        // get the values from contact forms
        $email_name = $_POST['userName'];
        $email_address = $_POST['userEmail'];
        $email_msg = $_POST['userMsg'];

        // create object to transmit
        $temp = array();
        $temp[0] = $email_name;
        $temp[1] = $email_address;
        $temp[2] = $email_msg;

        // call method to send mail
        forgotpwController::sendMail($temp, false);

        // make visible that the demand was send to the company
        $_SESSION['msg'] = true;

        $this->redirect('general', 'contact');
    }

    function about(){

    }
}