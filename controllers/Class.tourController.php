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

    function favorite(){
        if($this->getAdminUser()){
            $this->redirect('tour', 'favorite');
            exit;
        }
    }

    function insertTour(){

/*
        Tour::updateTourImage(1, 'images/banner.jpeg', 'image/jpeg');
        $image = Tour::selectTourImage(1);
        header("Content-Type: image/jpeg");

        echo '<img src="data:image/jpeg;base64,'.base64_encode( $image['data'] ).'"/>';*/

        /*
        if(isset($_POST['hikeName']) && isset($_POST['difficulty']) && isset($_POST['subtitle'])
            && isset($_POST['duration']) && isset($_POST['locationDep']) && isset($_POST['locationArriv'])
            && isset($_POST['price']) && isset($_POST['descDE']) && isset($_POST['descFR'])
            && isset($_POST['sdate']) && isset($_POST['edate']) && isset($_POST['deptime'])
            && isset($_POST['artime']) && isset($_FILES['img'])){

            $handle = $_FILES['img']['tmp_name'];
            $mime = $_FILES['img']['type'];
            var_dump($handle);
            var_dump($mime);
            //Tour::updateTourImage(1, $handle, $mime);
            Tour::updateTourImage(1, 'images\banner.jpg', $mime);

            $image = Tour::selectTourImage(1);
            //header("Content-Type:" . $image['mime']);
            header("Content-Type:" . 'image/jpeg');
            echo $image;
            //var_dump($image['data']);
            //http://www.mysqltutorial.org/php-mysql-blob/
        }*/

    }
}