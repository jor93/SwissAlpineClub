<?php

/**
 * Created by PhpStorm.
 * User: mv
 * Date: 14.10.2016
 * Time: 09:41
 */
class Tour
{
    private $idTour;
    private $startDate;
    private $endDate;
    private $duration;
    private $title;
    private $subtitle;
    private $depart_time;
    private $arrival_time;
    private $price;
    private $difficulty;
    private $status;
    private $idLanguageDescription;
    private $languageDescriptionDE;
    private $languageDescriptionFR;
    private $picture;
    private $mime;
    private $locationDep;
    private $locationArriv;
    private $type;
    private $transport;

    /**
     * Tour constructor.
     * @param $idTour
     * @param $startDate
     * @param $endDate
     * @param $duration
     * @param $title
     * @param $subtitle
     * @param $depart_time
     * @param $arrival_time
     * @param $price
     * @param $difficulty
     * @param $status
     * @param $idLanguageDescription
     * @param $languageDescriptionDE
     * @param $languageDescriptionFR
     * @param $picture
     * @param $locationDep
     * @param $locationArriv
     * @param $type
     * @param $transport
     */
    public function __construct($idTour, $startDate, $endDate, $duration, $title, $subtitle,
                                $depart_time, $arrival_time, $price, $difficulty, $status,
                                $idLanguageDescription, $languageDescriptionDE, $languageDescriptionFR,
                                $picture, $locationDep, $locationArriv, $type, $transport)
    {
        $this->idTour = $idTour;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->duration = $duration;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->depart_time = $depart_time;
        $this->arrival_time = $arrival_time;
        $this->price = $price;
        $this->difficulty = $difficulty;
        $this->status = $status;
        $this->idLanguageDescription = $idLanguageDescription;
        $this->languageDescriptionDE = $languageDescriptionDE;
        $this->languageDescriptionFR = $languageDescriptionFR;
        $this->picture = $picture;
        $this->locationDep = $locationDep;
        $this->locationArriv = $locationArriv;
        $this->type = $type;
        $this->transport = $transport;
    }

    /**
     * @return mixed
     */
    public function getIdTour()
    {
        return $this->idTour;
    }

    /**
     * @param mixed $idTour
     */
    public function setIdTour($idTour)
    {
        $this->idTour = $idTour;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return mixed
     */
    public function getDepartTime()
    {
        return $this->depart_time;
    }

    /**
     * @param mixed $depart_time
     */
    public function setDepartTime($depart_time)
    {
        $this->depart_time = $depart_time;
    }

    /**
     * @return mixed
     */
    public function getArrivalTime()
    {
        return $this->arrival_time;
    }

    /**
     * @param mixed $arrival_time
     */
    public function setArrivalTime($arrival_time)
    {
        $this->arrival_time = $arrival_time;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param mixed $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getIdLanguageDescription()
    {
        return $this->idLanguageDescription;
    }

    /**
     * @param mixed $idLanguageDescription
     */
    public function setIdLanguageDescription($idLanguageDescription)
    {
        $this->idLanguageDescription = $idLanguageDescription;
    }

    /**
     * @return mixed
     */
    public function getLanguageDescriptionDE()
    {
        return $this->languageDescriptionDE;
    }

    /**
     * @param mixed $languageDescriptionDE
     */
    public function setLanguageDescriptionDE($languageDescriptionDE)
    {
        $this->languageDescriptionDE = $languageDescriptionDE;
    }

    /**
     * @return mixed
     */
    public function getLanguageDescriptionFR()
    {
        return $this->languageDescriptionFR;
    }

    /**
     * @param mixed $languageDescriptionFR
     */
    public function setLanguageDescriptionFR($languageDescriptionFR)
    {
        $this->languageDescriptionFR = $languageDescriptionFR;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getLocationDep()
    {
        return $this->locationDep;
    }

    /**
     * @param mixed $locationDep
     */
    public function setLocationDep($locationDep)
    {
        $this->locationDep = $locationDep;
    }

    /**
     * @return mixed
     */
    public function getLocationArriv()
    {
        return $this->locationArriv;
    }

    /**
     * @param mixed $locationArriv
     */
    public function setLocationArriv($locationArriv)
    {
        $this->locationArriv = $locationArriv;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param mixed $transport
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
    }

    /**
     * @return mixed
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * @param mixed $mime
     */
    public function setMime($mime)
    {
        $this->mime = $mime;
    }

    static function insertTour($tour, &$lastInsertId){
        $query = "INSERT INTO Tour (Start_date, End_date, Duration, Title, Subtitle, Depart_time, Arrival_time,
                                  Price, Difficulty, Status_idStatus, Language_idLanguage, Location_idLocation,
                                  Location_idLocation1)
                  VALUES ('$tour->startDate', '$tour->endDate', '$tour->duration', '$tour->title', '$tour->subtitle',
                  '$tour->depart_time', '$tour->arrival_time', '$tour->price', '$tour->difficulty', '$tour->status',
                  '$tour->idLanguageDescription', '$tour->locationDep', '$tour->locationArriv')";
        $result = SQL::getInstance()->executeQuery($query);
        $lastInsertId = SQL::getInstance()->getLastInsertedId();
        return $result;
    }

    static function insertTourDescription($descDE, $descFR, &$lastInsertId){
        $query = "INSERT INTO Language(de, fr)
                  VALUES ('$descDE', '$descFR')";
        $result = SQL::getInstance()->executeQuery($query);
        $lastInsertId = SQL::getInstance()->getLastInsertedId();
        return $result;
    }

    static function selectTour($tourId){
        $query = "SELECT Tour.*, LanguageDesc.*
                  FROM Tour, Language as LanguageDesc
                 where Tour.idTour = '$tourId'
                 and Tour.Language_idLanguage = LanguageDesc.idLanguage";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();

        if(!$row) return false;

        if($status = Status::selectStatus($row['Status_idStatus']) &&
        $locationDep = Location::selectLocation($row['Tour.Location_idLocation']) &&
        $locationArriv = Location::selectLocation($row['Tour.Location_idLocation1'])) {
            return new Tour($tourId, $row['Tour.Start_date'], $row['Tour.End_date'], $row['Tour.Duration'],
                $row['Tour.Titel'], $row['Tour.Subtitle'],
                $row['Tour.Depart_time'], $row['Tour.Arrival_time'], $row['Tour.Price'], $row['Tour.Difficulty'], $status,
                $row['Tour.Language_idLanguage'], $row['LanguageDesc.de'], $row['LanguageDesc.fr'],
                $row['Tour.Picture'], $locationDep, $locationArriv, transport);
        }
        return false;
    }

    static function updateTourImage($tourid, $path, $mime){
        $query = "UPDATE Tour SET Picture = :data, Mime = :mime WHERE Tour.idTour = :id";
        return  SQL::getInstance()->executeBLOBQuery($query, $tourid, $path, $mime);
    }

    static function selectTourImage($tourid){
        $query = "SELECT Picture, Mime from Tour where idTour = :id";
        $result = SQL::getInstance()->selectBLOB($query, $tourid);

        if(!$result) return false;

        return $result;
    }

    static function selectAllTours(){
        $query = "SELECT * FROM `tour`, `location` WHERE `Location_idLocation` = `idLocation`";
        return SQL::getInstance()->select($query);
    }
}