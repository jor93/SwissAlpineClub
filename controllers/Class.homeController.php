<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 28.09.2016
 * Time: 14:21
 */


class homeController extends Controller {

    public function home(){
    }

    public function showHike(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $this->badassSafer($_POST['showHike']);
            $_SESSION['tourId'] = $id;
            $this->redirect('tour','hikingFromHome');
        }
    }

}