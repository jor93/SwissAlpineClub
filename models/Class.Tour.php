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
     */
    public function __construct($idTour, $startDate, $endDate, $duration, $title, $subtitle,
                                $depart_time, $arrival_time, $price, $difficulty, $status,
                                $idLanguageDescription, $languageDescriptionDE, $languageDescriptionFR,
                                $picture, $locationDep, $locationArriv)
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
    }

    public static function createTour($idTour, $startDate, $endDate, $duration, $title, $subtitle,
                                $depart_time, $arrival_time, $price, $difficulty, $status,
                                $idLanguageDescription, $languageDescriptionDE, $languageDescriptionFR,
                                $picture, $locationDep, $locationArriv)
    {
        $tour = new Tour();
        $tour->idTour = $idTour;
        $tour->startDate = $startDate;
        $tour->endDate = $endDate;
        $tour->duration = $duration;
        $tour->title = $title;
        $tour->subtitle = $subtitle;
        $tour->depart_time = $depart_time;
        $tour->arrival_time = $arrival_time;
        $tour->price = $price;
        $tour->difficulty = $difficulty;
        $tour->status = $status;
        $tour->idLanguageDescription = $idLanguageDescription;
        $tour->languageDescriptionDE = $languageDescriptionDE;
        $tour->languageDescriptionFR = $languageDescriptionFR;
        $tour->picture = $picture;
        $tour->locationDep = $locationDep;
        $tour->locationArriv = $locationArriv;
        return $tour;
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

    static function insertTour($tour, &$lastInsertId){
        $query = "INSERT INTO tour (Start_date, End_date, Duration, Title, Subtitle, Depart_time, Arrival_time,
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
        $query = "INSERT INTO language(de, fr)
                  VALUES ('$descDE', '$descFR')";
        $result = SQL::getInstance()->executeQuery($query);
        $lastInsertId = SQL::getInstance()->getLastInsertedId();
        return $result;
    }




    static function selectTour($tourId){
        $query = "SELECT tour.*, languageDesc.*
                  FROM tour , language
                 where tour.idTour = '$tourId'
                 and tour.Language_idLanguage = language.idLanguage";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();

        if(!$row) return false;

        if(Status::selectStatus($row['Status_idStatus']) &&
            Location::selectLocation($row['Location_idLocation']) &&
            Location::selectLocation($row['Location_idLocation1'])) {
            $status = Status::selectStatus($row['Status_idStatus']);
            $locationDep = Location::selectLocation($row['Location_idLocation']);
            $locationArriv = Location::selectLocation($row['Location_idLocation1']);

            return new Tour($tourId, $row['Start_date'], $row['End_date'], $row['Duration'],
                $row['Title'], $row['Subtitle'],
                $row['Depart_time'], $row['Arrival_time'], $row['Price'], $row['Difficulty'], $status,
                $row['Language_idLanguage'], $row['de'], $row['fr'],
                $row['Picture'], $locationDep, $locationArriv);
        }
        return false;
    }

    static function updateTour($tour){
        $result = false;
        $query = "UPDATE tour SET Start_date='$tour->startDate', End_date='$tour->endDate', Duration='$tour->duration', Title='$tour->title', 
                Subtitle='$tour->subtitle', Depart_time='$tour->depart_time', Arrival_time='$tour->arrival_time', Price='$tour->price', Difficulty='$tour->difficulty', 
                Status_idStatus='$tour->status', Location_idLocation='$tour->locationDep', Location_idLocation1='$tour->locationArriv' where idTour='$tour->idTour'";

        $queryLanguage = "UPDATE language SET de='$tour->languageDescriptionDE', fr='$tour->languageDescriptionFR'
        where idLanguage='$tour->idLanguageDescription'";

        SQL::getInstance()->executeQuery($query);
        SQL::getInstance()->executeQuery($queryLanguage);
        return $result;
    }

    static function updateTourImage($tourid, $path, $mime){
        $query = "UPDATE tour SET Picture = :data, Mime = :mime WHERE tour.idTour = :id";
        return  SQL::getInstance()->executeBLOBQuery($query, $tourid, $path, $mime);
    }

    static function selectTourImage($tourid){
        $query = "SELECT Picture, Mime from tour where idTour = :id";
        $result = SQL::getInstance()->selectBLOB($query, $tourid);

        if(!$result) return false;

        return $result;
    }

    static function selectTourTypes($tourid){
            $query = "SELECT TypeTour_idTypeTour from typetour_tour where Tour_idTour = $tourid";
        $result = SQL::getInstance()->select($query);

        if(!$result) return false;

        return $result;
    }

    static function selectAllTours(){
        $query = "SELECT * FROM `tour`, `location` WHERE `Location_idLocation` = `idLocation`";
        return SQL::getInstance()->select($query);
    }

    // get the next 3 hikings for home page
    public static function getNext3Hikings(){
        $query = "SELECT tour.idTour,tour.Start_date,tour.End_date,tour.Duration,tour.Title,tour.Subtitle,tour.Depart_time,tour.Arrival_time,tour.Price,tour.Status_idStatus,tour.Language_idLanguage,tour.Picture,tour.Location_idLocation
                    FROM grp1.tour, grp1.location, grp1.status, grp1.language
                    WHERE tour.Language_idLanguage = language.idLanguage 
                    AND tour.Status_idStatus = status.idStatus 
                    AND tour.Location_idLocation = location.idLocation
                    AND tour.Start_date > now()
                    ORDER BY tour.Start_date ASC
                    LIMIT 3;";
        return SQL::getInstance()->select($query)->fetchAll();
    }
}