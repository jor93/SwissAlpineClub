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

    /**
     * Participant constructor.
     * @param $idParticipant
     * @param $firstname
     * @param $lastname
     * @param $abonnement
     * @param $inscription
     */
    public function __construct($idParticipant, $firstname, $lastname, $abonnement, $inscription)
    {
        $this->idParticipant = $idParticipant;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->abonnement = $abonnement;
        $this->inscription = $inscription;
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

    public static function insertParticipant($obj){
        $query = "INSERT INTO `grp1`.`participant` (`Firstname`, `Lastname`, `Abonnement_idAbonnement`, `Inscription_idInscription`)
                    VALUES ('$obj->firstname','$obj->lastname', $obj->abonnement, $obj->inscription);";
        return SQL::getInstance()->executeQuery($query);
    }

    public static function getNumberOfParticipants($idInscription){
        $query = "SELECT COUNT(*) as NP FROM participant WHERE inscription_idInscription = '$idInscription'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();

        if(!$row) return false;

        return $row['NP'];
    }

    public static function deleteParticipant(){

    }

}