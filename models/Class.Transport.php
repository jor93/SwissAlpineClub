<?php

/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 15.10.2016
 * Time: 14:11
 */
class Transport
{

    private $idTransport;
    private $language_idLanguage;
    private $transportDE;
    private $transportFR;

    /**
     * Transport constructor.
     * @param $idTransport
     * @param $language_idLanguage
     * @param $transportDE
     * @param $transportFR
     */
    public function __construct($idTransport, $language_idLanguage, $transportDE, $transportFR)
    {
        $this->idTransport = $idTransport;
        $this->language_idLanguage = $language_idLanguage;
        $this->transportDE = $transportDE;
        $this->transportFR = $transportFR;
    }

    /**
     * @return mixed
     */
    public function getIdTransport()
    {
        return $this->idTransport;
    }

    /**
     * @param mixed $idTransport
     */
    public function setIdTransport($idTransport)
    {
        $this->idTransport = $idTransport;
    }

    /**
     * @return mixed
     */
    public function getLanguageIdLanguage()
    {
        return $this->language_idLanguage;
    }

    /**
     * @param mixed $language_idLanguage
     */
    public function setLanguageIdLanguage($language_idLanguage)
    {
        $this->language_idLanguage = $language_idLanguage;
    }

    /**
     * @return mixed
     */
    public function getTransportDE()
    {
        return $this->transportDE;
    }

    /**
     * @param mixed $transportDE
     */
    public function setTransportDE($transportDE)
    {
        $this->transportDE = $transportDE;
    }

    /**
     * @return mixed
     */
    public function getTransportFR()
    {
        return $this->transportFR;
    }

    /**
     * @param mixed $transportFR
     */
    public function setTransportFR($transportFR)
    {
        $this->transportFR = $transportFR;
    }

    static function selectTransport($idTransport){
        $query = "SELECT Transport.*, Language.*
                  FROM Transport, Language WHERE idTransport = '$idTransport' and Transport.Language_idLanguage = Language.idLanguage";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        return new Transport($row['Transport.idTransport'], $row['Transport.Language_idLanguage'], $row['Language.de'], $row['Language.fr']);
    }

    static function insertTransportTour($idTour, $transportArray){
        $valueQuery = "";
        $lastElement = end($transportArray);
        for ($i = 0; $i < count($transportArray); $i++) {
            var_dump($valueQuery);
            $valueQuery .= "('$idTour','$transportArray[$i]')";
            if($lastElement === $transportArray[$i])break;
            $valueQuery .= " ,";
        }
        $query = "INSERT INTO Transport_tour(Tour_idTour, Transport_idTransport)
                  VALUES " . $valueQuery;
        return  SQL::getInstance()->executeQuery($query);
    }

    static function insertTourTransport($idTour, $idTransport){
        $query = "INSERT INTO Transport_tour(Tour_idTour, Transport_idTransport) VALUES ('$idTour','$idTransport')";
        return  SQL::getInstance()->executeQuery($query);
    }

    public static function getTranportByLanguage($language){
        $query = "SELECT idTransport, $language FROM grp1.transport, language WHERE grp1.transport.Language_idLanguage = language.idLanguage;";
        return SQL::getInstance()->select($query)->fetchAll();
    }

    //get Tour ids used for a specific tour
    public static function getTransportIdsFromTour($tourId){
        $query = "SELECT Transport_idTransport FROM transport_tour WHERE Tour_idTour = '$tourId';";
        return SQL::getInstance()->select($query)->fetchAll();
    }

    static function selectTransportLength(){
        $query = "SELECT count(*) as ResultTransport FROM Transport";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;
        return $row['ResultTransport'];
    }

}