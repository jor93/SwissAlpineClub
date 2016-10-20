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
        //if a user is active he cannot re-login
        if($this->getActiveUser()){
            $this->redirect('favorite', 'favorite');
            exit;
        }
    }

    static function handleFavorites(){
        // check if already a favorite then add or rm
        $inputFavorite = $_POST['selectedFav'];

        // get the data
        $result = Favorite::getFavorite($inputFavorite);
        // read from pdo statement
        $temp = $result->fetch();
        $idFavorite = $temp[0];

        if ($idFavorite == 0){
            self::addFavorite($idFavorite);
        }else{
            self::removeFavorite($idFavorite);
        }
    }

    static function addFavorite($newFavorite){
        Favorite::insertFavorite($newFavorite);
    }

    static function removeFavorite($rmFavorite){
        Favorite::removeFavorite($rmFavorite);
        self::redirect('favorite', 'favorite');
    }

    public static function getAllFavorites(){
        // get all favorites from current user
        $currentUser = self::getActiveUserWithoutCookie();
        $idAcc = $currentUser->getIdAccount();
        return $tempFavorites = Favorite::getAllFavorites($idAcc);
    }
}