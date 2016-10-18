<?php

/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 18.10.2016
 * Time: 09:03
 */
class tourController extends Controller
{
    function tour(){

        if($this->getAdminUser()){
            $this->redirect('login', 'login');
            exit;
        }
    }

    function insertTour(){
        if(isset($_POST['hikeName']) && isset($_POST['difficulty']) && isset($_POST['subtitle'])
            && isset($_POST['duration']) && isset($_POST['locationDep']) && isset($_POST['locationArriv'])
            && isset($_POST['price']) && isset($_POST['descDE']) && isset($_POST['descFR'])
            && isset($_POST['sdate']) && isset($_POST['edate']) && isset($_POST['deptime'])
            && isset($_POST['artime']) && isset($_FILES['img'])){

            /*
            $handle = $_FILES['img']['tmp_name'];
            //Tour::insertTourImage(1, $handle);

            $image = Tour::selectTourImage(1);
            header("Content-Type:" . 'image/jpg');

            echo $image;
            //http://www.mysqltutorial.org/php-mysql-blob/
            */
        }

    }
}