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
        $this->updateFavorites();
    }

    // to reach from tour controller as well
    public static function updateFavorites(){
        $favorites = self::getAllFavorites();

        /*
        foreach ($favorites as $fav){
            //$temp = new Favorite($fav);
            echo '</br>id Favorite: ' . $fav[0];
            echo '</br>id Account: ' . $fav[1];
            echo '</br>id Tour: ' . $fav[2];
            echo '</br>---------------------';
        }
        */
    }

    static function handleFavorites($selectedFavorite){
      // check if already a favorite then add or rm
        echo 'selected item --> ' . $selectedFavorite;

    }

    function addFavorite(){

    }

    function removeFavorite(){
        echo 'haifisch';

    }

    public static function getAllFavorites(){
        // get all favorites from current user
        $currentUser = self::getActiveUserWithoutCookie();
        $idAcc = $currentUser->getIdAccount();
        return $tempFavorites = Favorite::getAllFavorites($idAcc);
    }
}