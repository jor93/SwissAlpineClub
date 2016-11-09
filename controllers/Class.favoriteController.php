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

    function handlefavorites(){
        // check if already a favorite then add or rm
        $inputFavorite = $_POST['favoritehike'];

        // get all favorites from current user
        $idAcc = $_SESSION['account']->getIdAccount();

        // get the data
        $result = Favorite::getAllFavorites($idAcc);

        // read from pdo statement
        $j = 0;
        $idFavorites = array();
        // get all ids from table favorite
        while ($temp = $result->fetch(PDO::FETCH_ASSOC)) {
            $Favorite_idTour = $temp['Tour_idTour'];
            $idFavorites[$j++] = $Favorite_idTour;
        }

        $check = false;
        $countFav = count($idFavorites);
        for ($i = 0; $i < $countFav; $i++){
            if ($idFavorites[$i] == $inputFavorite){
                $check = true;
                break;
            }
        }

        if (!$check){
            self::addFavorite($idAcc, $inputFavorite);
        }else{
            self::removeFavorite($idAcc, $inputFavorite);
        }
    }

    static function addFavorite($idAcc, $inputFavorite){
        Favorite::insertFavorite($idAcc, $inputFavorite);
        self::redirect('tour', 'hiking');

    }

    static function removeFavorite($idAcc, $inputFavorite){
        Favorite::removeFavorite($idAcc, $inputFavorite);
        self::redirect('tour', 'hiking');
    }

    public static function getAllFavorites(){
        // get all favorites from current user
        $currentUser = self::getActiveUserWithoutCookie();
        $idAcc = $currentUser->getIdAccount();
        return $tempFavorites = Favorite::getAllFavorites($idAcc);
    }
}