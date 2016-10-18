<?php

/**
 * Created by PhpStorm.
 * User: gez
 * Date: 18.10.2016
 * Time: 08:58
 */
class favoriteController extends Controller
{
    function favorite(){
        if($this->getAdminUser()){
            $this->redirect('login', 'login');
            exit;
        }
    }

    function handleFavorites(){
        $favorites = array();

        // get all favorites from current user
        $currentUser = $this->getActiveUserWithoutCookie();
        $idAcc = $currentUser->getIdAccount();
        $tempFavorites = $this->getAllFavorites($idAcc);

        // put into array to handle
        foreach ($tempFavorites as $fav){
            $favorites = $fav;
        }

        var_dump($favorites[0]);
    }

    function addFavorite(){

    }

    function removeFavorite(){

    }

    // returns all of the data
    private function getAllFavorites($idAcc){
        $query = "SELECT * FROM favorites WHERE idaccount = '$idAcc';";
        return SQL::getInstance()->select($query);
    }
}