<?php

/**
 * Created by PhpStorm.
 * User: gez
 * Date: 27.10.2016
 * Time: 20:23
 */
class Participant
{
    private $idParticipant;
    private $firstname;
    private $lastname;
    private $abonnement;
    private $inscription;
    private $account;

    /**
     * Participant constructor.
     * @param $idParticipant
     * @param $firstname
     * @param $lastname
     * @param $abonnement
     * @param $inscription
     */
    public function __construct($idParticipant, $firstname, $lastname, $abonnement, $inscription, $account)
    {
        $this->idParticipant = $idParticipant;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->abonnement = $abonnement;
        $this->inscription = $inscription;
        $this->account = $account;
    }

    /**
     * @return mixed
     */
    public function getIdParticipant()
    {
        return $this->idParticipant;
    }

    /**
     * @param mixed $idParticipant
     */
    public function setIdParticipant($idParticipant)
    {
        $this->idParticipant = $idParticipant;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getAbonnement()
    {
        return $this->abonnement;
    }

    /**
     * @param mixed $abonnement
     */
    public function setAbonnement($abonnement)
    {
        $this->abonnement = $abonnement;
    }

    /**
     * @return mixed
     */
    public function getInscription()
    {
        return $this->inscription;
    }

    /**
     * @param mixed $inscription
     */
    public function setInscription($inscription)
    {
        $this->inscription = $inscription;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    public static function insertParticipant($obj){
        $query = "INSERT INTO `grp1`.`participant` (`Firstname`, `Lastname`, `Abonnement_idAbonnement`, `Inscription_idInscription`, `Account_idAccount`)
                    VALUES ('$obj->firstname','$obj->lastname', $obj->abonnement, $obj->inscription, $obj->account);";
        return  SQL::getInstance()->executeQuery($query);
    }

    public static function getNumberOfParticipants($idInscription){
        $query = "SELECT COUNT(*) as NP FROM participant WHERE inscription_idInscription = '$idInscription'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();

        if(!$row) return false;

        return $row['NP'];
    }

    public static function getParticipantFromInscription($idInscription, $idaccount){
        $query = "SELECT idParticipant, Firstname, Lastname, l.de, l.fr, p.Account_idAccount
                  FROM participant AS p, abonnement AS a, language AS l 
                  WHERE p.Abonnement_idAbonnement = a.idAbonnement AND l.idLanguage = a.Language_idLanguage 
                  AND Inscription_idInscription = $idInscription AND p.Account_idAccount = $idaccount";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetchAll();

        if(!$row) return false;

        return $row;
    }
}