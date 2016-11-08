<?php

/**
 * Created by PhpStorm.
 * User: gez
 * Date: 22.10.2016
 * Time: 23:09
 */
class Inscription
{
    private $idInscription;
    private $tour_idTour;
    private $max_inscriptions;
    private $free_space;
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
    public function __construct($idInscription, $tour_idTour, $max_inscriptions, $free_space, $expiration_date, $status_idStatus, $information)
    {
        $this->idInscription = $idInscription;
        $this->tour_idTour = $tour_idTour;
        $this->max_inscriptions = $max_inscriptions;
        $this->free_space = $free_space;
        $this->expiration_date = $expiration_date;
        $this->status_idStatus = $status_idStatus;
        $this->information = $information;
    }

    /**
     * @return mixed
     */
    public function getIdInscription()
    {
        return $this->idInscription;
    }

    /**
     * @param mixed $idInscription
     */
    public function setIdInscription($idInscription)
    {
        $this->idInscription = $idInscription;
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

    /**
     * @return mixed
     */
    public function getFreeSpace()
    {
        return $this->free_space;
    }

    /**
     * @param mixed $free_space
     */
    public function setFreeSpace($free_space)
    {
        $this->free_space = $free_space;
    }

    // insert inscription
    public static function insertInscription($obj){
        $query = "INSERT INTO `grp1`.`inscription`(`Tour_idTour`,`Max_Inscriptions`, `Free_Space` ,`Expiration_date`,`Status_idStatus`,`Information`)
                  VALUES ($obj->tour_idTour,$obj->max_inscriptions, $obj->free_space, '$obj->expiration_date',$obj->status_idStatus,'$obj->information');";
        SQL::getInstance()->select($query);
        return;
    }

    // update inscription
    public static function updateInscription($inscription){
        $query = "UPDATE Inscription SET Max_Inscriptions='$inscription->max_inscriptions', Free_Space='$inscription->free_space', Expiration_Date='$inscription->expiration_date', Status_idStatus='$inscription->status_idStatus', 
                Information='$inscription->information' where Tour_idTour='$inscription->tour_idTour'";
        return SQL::getInstance()->executeQuery($query);
    }

    // delete related tour id
    public static function deleteInscriptionByTourId($idTour){
        $query = "DELETE FROM inscription WHERE Tour_idTour = '$idTour'";
        SQL::getInstance()->select($query);
        return;
    }

    // get single inscription by id
    public static function selectInscriptionByIdTour($idTour){
        $query = "SELECT * FROM Inscription where Tour_idTour = '$idTour'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();

        if(!$row) return false;

        return new Inscription($row['idInscription'], $idTour, $row['Max_Inscriptions'], $row['Free_Space'], $row['Expiration_Date'], $row['Status_idStatus'], $row['Information']);
    }

    // get single inscription by id inscription
    public static function selectInscriptionByIdInscription($idInscription){
        $query = "SELECT * FROM Inscription where Tour_idTour = '$idInscription'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();

        if(!$row) return false;

        return new Inscription($idInscription, $row['Tour_idTour'], $row['Max_Inscriptions'], $row['Free_Space'], $row['Expiration_Date'], $row['Status_idStatus'], $row['Information']);
    }

    // get single free_space by id
    public static function selectFreeSpaceByidTour($idTour){
        $query = "SELECT Free_Space FROM Inscription where Tour_idTour = '$idTour'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();

        if(!$row) return false;

        return $row['Free_Space'];
    }

    // insert inscription_account
    public static function insertInscriptionAccount($account, $inscription){
        $query = "INSERT INTO account_inscription(account_idAccount, inscription_idInscription) VALUES($account, $inscription);";
        SQL::getInstance()->select($query);
        return;
    }

    // check if acc for tour already in db
    public static function checkAccForTour($idAcc){
        $query = "SELECT * FROM account_inscription WHERE Account_idAccount = $idAcc;";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();

        if(!$row) return false;

        return true;
    }

    // update inscription
    public static function updateFreeSpace($inscription, $new_ones){
        $query = "UPDATE inscription SET free_space = (free_space - $new_ones) WHERE idInscription = $inscription;";
        SQL::getInstance()->executeQuery($query);
        return;
    }

    // get single free_space by id
    public static function selectAccountInscripted($account, $inscription){
        $query = "select Account_idAccount from account_inscription where Account_idAccount = $account and Inscription_idInscription = $inscription;";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();

        if(!$row) return false;

        return $row['Account_idAccount'];
    }

    // update inscription --> set status new!!
    public static function updateStatus($inscription, $idStatus){
        $query = "UPDATE inscription SET Status_idStatus = $idStatus WHERE idInscription = $inscription;";
        SQL::getInstance()->executeQuery($query);
        return;
    }

    // get all inscriptions for the admin
    public static function selectAllInscriptions(){
        $query = "select t.idTour, i.Max_Inscriptions, i.Free_Space, i.Expiration_Date, i.Information, t.Title, t.Subtitle, l.de, l.fr, LocationName 
                  from inscription as i, tour as t, status as s, language as l, location as lo where i.Tour_idTour = t.idTour 
                  and s.idStatus = i.Status_idStatus and s.Language_idLanguage = l.idLanguage and lo.idlocation = t.location_idlocation;";
        return SQL::getInstance()->select($query)->fetchAll();
    }

    // check if acc for tour already in db
    public static function getAccsInscriptedByIdInscription($idInscription){
        $query = "select idaccount, firstname, Lastname, Email, Abonnement_idAbonnement, l.de, l.fr 
                  from account a, account_inscription as ai, inscription as i, abonnement as ab, 
                  language as l where a.idAccount = ai.Account_idAccount and ai.Inscription_idInscription = i.idInscription 
                  and a.Abonnement_idAbonnement = ab.idAbonnement and ab.Language_idLanguage = l.idLanguage and i.idInscription = $idInscription;";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetchAll();

        if(!$row) return false;

        return $row;
    }

    // get the next 3 hikings for home page
    public static function getAllInsByAccount($accountId){
        $query = "SELECT account.idAccount, tour.idTour,tour.Title, tour.Start_date, tour.End_date FROM inscription, account, account_inscription, tour
                    WHERE inscription.idInscription = account_inscription.Inscription_idInscription
                    AND account.idAccount = account_inscription.Account_idAccount
                    AND inscription.Tour_idTour = tour.idTour
                    AND account.idAccount = $accountId
                    ORDER BY tour.Start_date ASC;";
        return SQL::getInstance()->select($query)->fetchAll();
    }
}