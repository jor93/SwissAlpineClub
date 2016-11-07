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
        $email_name = $this->badassSafer($_POST['userName']);
        $email_address = $this->badassSafer($_POST['userEmail']);
        $email_msg = $this->badassSafer($_POST['userMsg']);
        $captcha = $this->badassSafer($_POST['g-recaptcha-response']);

        // check captcha
        $secretKey = "6LfhNQoUAAAAAOOKEW62RA5s6dZwL54lXO-OGWmy";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
            // do here when captcha was error
            $_SESSION['error_send_mail'] = 1;
        } else{
            if ($email_name != null && $email_address != null && $email_msg != null){
                // create object to transmit
                $temp = array();
                $temp[0] = $email_name;
                $temp[1] = $email_address;
                $temp[2] = $email_msg;

                // call method to send mail
                forgotpwController::sendMail($temp, 2);

                // make visible that the demand was send to the company
                $_SESSION['msg'] = true;
            }else{
                $_SESSION['error_send_mail'] = 2;
            }
        }
        $this->redirect('general', 'contact');
    }

    function about(){

    }
}