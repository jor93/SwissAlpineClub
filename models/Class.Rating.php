<?php

/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 15.10.2016
 * Time: 14:32
 */
class Rating
{

    private $idRating;
    private $account_idAccount;
    private $tour_idTour;
    private $rating;
    private $comment;

    /**
     * Rating constructor.
     * @param $idRating
     * @param $account_idAccount
     * @param $tour_idTour
     * @param $rating
     * @param $comment
     */
    public function __construct($idRating, $account_idAccount, $tour_idTour, $rating, $comment)
    {
        $this->idRating = $idRating;
        $this->account_idAccount = $account_idAccount;
        $this->tour_idTour = $tour_idTour;
        $this->rating = $rating;
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getIdRating()
    {
        return $this->idRating;
    }

    /**
     * @param mixed $idRating
     */
    public function setIdRating($idRating)
    {
        $this->idRating = $idRating;
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

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    static function selectRating($idRating){
        $query = "SELECT *
                  FROM Rating WHERE idRating = '$idRating'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        return new Rating($row['idRating'], $row['Account_idAccount'], $row['Tour_idTour'], $row['Rating'], $row['Comment']);
    }


    static function insertRating($idTour, $idAccount, $rate, $comment){
        $query = "INSERT INTO Rating('Account_idAccount', 'Tour_idTour', 'Rating', 'Comment') 
                  VALUES ('$idAccount', '$idTour', '$rate','$comment')";
        return  SQL::getInstance()->executeQuery($query);
    }

    static function updateRating($idRating, $rate, $comment){
        $query = "UPDATE Rating
        SET Rating='$rate',Comment='$comment'
        WHERE idRating = '$idRating'";
        return  SQL::getInstance()->executeQuery($query);
    }

}