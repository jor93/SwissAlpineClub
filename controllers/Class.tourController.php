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
            $this->redirect('favorite', 'favorite');
            exit;
        }
        favoriteController::updateFavorites();
    }

    function insertTour(){
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
            Tour::updateTourImage(1, 'C:\Users\Acer\Pictures\Michael\Bier\bierLogo.jpg', $mime);


            $image = Tour::selectTourImage(1);
            header("Content-Type:" . $image['mime']);

            //var_dump($image['data']);
            //http://www.mysqltutorial.org/php-mysql-blob/
        }

    }
}