<?php

/**
 * Created by PhpStorm.
 * User: mv
 * Date: 15.10.2016
 * Time: 14:29
 */
class TypeTour
{
    private $idTypeTour;
    private $language_idLanguage;
    private $typeTourDE;
    private $typeTourFR;

    /**
     * TypeTour constructor.
     * @param $idTypeTour
     * @param $language_idLanguage
     * @param $typeTourDE
     * @param $typeTourFR
     */
    public function __construct($idTypeTour, $language_idLanguage, $typeTourDE, $typeTourFR)
    {
        $this->idTypeTour = $idTypeTour;
        $this->language_idLanguage = $language_idLanguage;
        $this->typeTourDE = $typeTourDE;
        $this->typeTourFR = $typeTourFR;
    }

    /**
     * @return mixed
     */
    public function getIdTypeTour()
    {
        return $this->idTypeTour;
    }

    /**
     * @param mixed $idTypeTour
     */
    public function setIdTypeTour($idTypeTour)
    {
        $this->idTypeTour = $idTypeTour;
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
    public function getTypeTourDE()
    {
        return $this->typeTourDE;
    }

    /**
     * @param mixed $typeTourDE
     */
    public function setTypeTourDE($typeTourDE)
    {
        $this->typeTourDE = $typeTourDE;
    }

    /**
     * @return mixed
     */
    public function getTypeTourFR()
    {
        return $this->typeTourFR;
    }

    /**
     * @param mixed $typeTourFR
     */
    public function setTypeTourFR($typeTourFR)
    {
        $this->typeTourFR = $typeTourFR;
    }

    static function selectTypeTour($idTypeTour){
        $query = "SELECT TypeTour.*, Language.*
                  FROM TypeTour, Language WHERE idTypeTour = '$idTypeTour' and TypeTour.Language_idLanguage = Language.idLanguage";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        return new TypeTour($row['TypeTour.idTypeTour'], $row['TypeTour.Language_idLanguage'], $row['Language.de'], $row['Language.fr']);
    }

    //Getting concrete tpyes for the tour
    static function selectTypesFromTour($typesOfTour){
        $whereClause = "";
        $lastElement = end($typesOfTour);
        foreach ($typesOfTour as $typeId){
            $whereClause += "idTypeTour = '$typeId'";
            if($lastElement == $typeId)break;
            $whereClause += " and ";
        }
        $query = "SELECT TypeTour.*
                  FROM TypeTour, Language where '$whereClause' and TypeTour.Language_idLanguage = Language.idLanguage";
        $result = SQL::getInstance()->select($query);

        $typeTours = array();
        while ($row = mysqli_fetch_row($result)) {
            if(!$row) return false;
            $typeTours[] = $row;
        }

        if(!isset($typeTours)) return false;
        return $typeTours;
    }

    //Getting all types id's of a specific tour
    static function selectAllTypesTour($idTour){
        $query = "SELECT TypeTour_Tour.*
                  FROM TypeTour_Tour where Tour_idTour = '$idTour'";
        $result = SQL::getInstance()->select($query);
        $typesOfTour = array();
        while ($row = mysqli_fetch_row($result)) {
            if(!$row) return false;
            $typesOfTour[] = $row['TypeTour_idTypeTour'];
        }
        if(!isset($typesOfTour)) return false;
        return $typesOfTour;
    }

    static function insertTypeTour($idTour, $typeArray){
        $valueQuery = "";
        $lastElement = end($typeArray);
        foreach($typeArray as $type){
            $valueQuery += "('$type','$idTour')";
            if($lastElement == $type)break;
            $valueQuery += " ,";
        }
        $query = "INSERT INTO typetour_tour('TypeTour_idTypeTour', 'Tour_idTour')
                  VALUES '$valueQuery'";
        return  SQL::getInstance()->executeQuery($query);
    }

}