<?php

/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 15.10.2016
 * Time: 14:49
 */
class Favorite
{
    private $idFavorite;
    private $account_idAccount;
    private $tour_idTour;

    /**
     * Favorite constructor.
     * @param $idFavorite
     * @param $account_idAccount
     * @param $tour_idTour
     */
    public function __construct($idFavorite, $account_idAccount, $tour_idTour)
    {
        $this->idFavorite = $idFavorite;
        $this->account_idAccount = $account_idAccount;
        $this->tour_idTour = $tour_idTour;
    }

    /**
     * @return mixed
     */
    public function getIdFavorite()
    {
        return $this->idFavorite;
    }

    /**
     * @param mixed $idFavorite
     */
    public function setIdFavorite($idFavorite)
    {
        $this->idFavorite = $idFavorite;
    }

    /**
     * @return mixed
     */
    public function getAccountIdAccount()
    {
        return $this->account_idAccount;
    }

    /**
     * @param mixed $account_idAccount
     */
    public function setAccountIdAccount($account_idAccount)
    {
        $this->account_idAccount = $account_idAccount;
    }

    /**
     * @return mixed
     */
    public function getTourIdTour()
    {
        return $this->tour_idTour;
    }

    /**
     * @param mixed $tour_idTour
     */
    public function setTourIdTour($tour_idTour)
    {
        $this->tour_idTour = $tour_idTour;
    }

    static function getAllFavorites($idAccount){
        $query = "SELECT * FROM favorites WHERE Account_idAccount = '$idAccount';";
        return SQL::getInstance()->select($query);
    }

    static function insertFavorite($idAccount, $idTour){
        $query = "INSERT INTO favorites (Account_idAccount, Tour_idTour) VALUES ('$idAccount', '$idTour')";
        return  SQL::getInstance()->executeQuery($query);
    }

    static function removeFavorite($idFavorite){
        $query = "DELETE FROM Favorites WHERE idFavorites = '$idFavorite'";
        return  SQL::getInstance()->executeQuery($query);
    }

    static function getFavorite($idFavorite){
        $query = "SELECT * FROM favorites WHERE idFavorites = '$idFavorite';";
        return SQL::getInstance()->select($query);
    }
}