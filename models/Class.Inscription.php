<?php

/**
 * Created by PhpStorm.
 * User: gez
 * Date: 22.10.2016
 * Time: 23:09
 */
class Inscription
{
    private $tour_idTour;
    private $account_idAcoount;
    private $max_inscriptions;
    private $expiration_date;
    private $status_idStatus;
    private $information;

    /**
     * Inscription constructor.
     * @param $tour_idTour
     * @param $account_idAcoount
     * @param $max_inscriptions
     * @param $expiration_date
     * @param $status_idStatus
     * @param $information
     */
    public function __construct($tour_idTour, $account_idAcoount, $max_inscriptions, $expiration_date, $status_idStatus, $information)
    {
        $this->tour_idTour = $tour_idTour;
        $this->account_idAcoount = $account_idAcoount;
        $this->max_inscriptions = $max_inscriptions;
        $this->expiration_date = $expiration_date;
        $this->status_idStatus = $status_idStatus;
        $this->information = $information;
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
    public function getAccountIdAcoount()
    {
        return $this->account_idAcoount;
    }

    /**
     * @param mixed $account_idAcoount
     */
    public function setAccountIdAcoount($account_idAcoount)
    {
        $this->account_idAcoount = $account_idAcoount;
    }

    /**
     * @return mixed
     */
    public function getMaxInscriptions()
    {
        return $this->max_inscriptions;
    }

    /**
     * @param mixed $max_inscriptions
     */
    public function setMaxInscriptions($max_inscriptions)
    {
        $this->max_inscriptions = $max_inscriptions;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * @param mixed $expiration_date
     */
    public function setExpirationDate($expiration_date)
    {
        $this->expiration_date = $expiration_date;
    }

    /**
     * @return mixed
     */
    public function getStatusIdStatus()
    {
        return $this->status_idStatus;
    }

    /**
     * @param mixed $status_idStatus
     */
    public function setStatusIdStatus($status_idStatus)
    {
        $this->status_idStatus = $status_idStatus;
    }

    /**
     * @return mixed
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * @param mixed $information
     */
    public function setInformation($information)
    {
        $this->information = $information;
    }

    // insert inscription
    public static function insertInscription($obj){
        $query = "INSERT INTO `grp1`.`inscription`(`Tour_idTour`,`Max_Inscriptions`,`Expiration_date`,`Status_idStatus`,`Information`)
                  VALUES ($obj->tour_idTour,$obj->max_inscriptions,'$obj->expiration_date',$obj->status_idStatus,'$obj->information');";
        SQL::getInstance()->select($query);
        return;
    }

    // get single inscription by id
    public static function selectAccountByEmail($idTour){
        $query = "SELECT * FROM Inscription where Tour_idTour = '$idTour'";
        return $result = SQL::getInstance()->select($query)->fetch();
    }
}