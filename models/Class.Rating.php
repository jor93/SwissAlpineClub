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
    private $date_of_comment;
    private $comment;

    /**
     * Rating constructor.
     * @param $idRating
     * @param $account_idAccount
     * @param $tour_idTour
     * @param $rating
     * @param $comment
     */
    public function __construct($idRating, $account_idAccount, $tour_idTour, $rating, $comment, $date_of_comment)
    {
        $this->idRating = $idRating;
        $this->account_idAccount = $account_idAccount;
        $this->tour_idTour = $tour_idTour;
        $this->rating = $rating;
        $this->comment = $comment;
        $this->date_of_comment = $date_of_comment;
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

    /**
     * @return mixed
     */
    public function getDateOfComment()
    {
        return $this->date_of_comment;
    }

    /**
     * @param mixed $date_of_comment
     */
    public function setDateOfComment($date_of_comment)
    {
        $this->date_of_comment = $date_of_comment;
    }

    static function selectRating($idRating){
        $query = "SELECT *
                  FROM rating WHERE idRating = '$idRating'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        return new Rating($row['idRating'], $row['Account_idAccount'], $row['Tour_idTour'], $row['Rating'], $row['Comment'], $row['Date_of_comment']);
    }

    // get all ratings for one tour
    static function selectRatingsFromTour($idtour){
        $query = "SELECT *
                  FROM rating WHERE tour_idTour = '$idtour'";
        return SQL::getInstance()->select($query)->fetchAll();
    }

    // get sum of ratings
    static function getSumRatings($idtour){
        $query = "SELECT SUM(rating) FROM rating WHERE tour_idTour = $idtour";
        $temp = SQL::getInstance()->select($query)->fetch();
        $result = $temp[0];
        return $result;
    }

    // check if account has already rated a tour
    static function selectRatingByidAccount($idAcc, $idTour){
        $query = "SELECT account_idAccount FROM rating WHERE account_idAccount = $idAcc AND tour_idTour = $idTour;";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return true;

        return false;
    }

    static function insertRating($obj){
        $query = "INSERT INTO rating(account_idAccount, tour_idTour, rating, comment, date_of_comment) 
                  VALUES ($obj->account_idAccount, $obj->tour_idTour, $obj->rating,'$obj->comment', '$obj->date_of_comment')";
        return  SQL::getInstance()->executeQuery($query);
    }

    static function updateRating($idRating, $rate, $comment){
        $query = "UPDATE rating
        SET rating='$rate',Comment='$comment'
        WHERE idRating = '$idRating'";
        return  SQL::getInstance()->executeQuery($query);
    }

}