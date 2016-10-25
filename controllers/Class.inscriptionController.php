<?php

/**
 * Created by PhpStorm.
 * User: gez
 * Date: 22.10.2016
 * Time: 20:45
 */
class inscriptionController extends Controller
{
    function inscription(){
    }

    function handleNrPart(){
        $_SESSION['msg'] = $_POST['nrPar'];
    }
}