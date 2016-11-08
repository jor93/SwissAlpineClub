<?php

/**
 * Created by PhpStorm.
 * User: mv
 * Date: 15.10.2016
 * Time: 13:44
 */
class Region
{
    private $idRegion;
    private $language_idLanguage;
    private $regionNameDE;
    private $regionNameFR;

    /**
     * Region constructor.
     * @param $idRegion
     * @param $language_idLanguage
     * @param $regionNameDE
     * @param $regionNameFR
     */
    public function __construct($idRegion, $language_idLanguage, $regionNameDE, $regionNameFR)
    {
        $this->idRegion = $idRegion;
        $this->language_idLanguage = $language_idLanguage;
        $this->regionNameDE = $regionNameDE;
        $this->regionNameFR = $regionNameFR;
    }

    /**
     * @return mixed
     */
    public function getIdRegion()
    {
        return $this->idRegion;
    }

    /**
     * @param mixed $idRegion
     */
    public function setIdRegion($idRegion)
    {
        $this->idRegion = $idRegion;
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
    public function getRegionNameDE()
    {
        return $this->regionNameDE;
    }

    /**
     * @param mixed $regionNameDE
     */
    public function setRegionNameDE($regionNameDE)
    {
        $this->regionNameDE = $regionNameDE;
    }

    /**
     * @return mixed
     */
    public function getRegionNameFR()
    {
        return $this->regionNameFR;
    }

    /**
     * @param mixed $regionNameFR
     */
    public function setRegionNameFR($regionNameFR)
    {
        $this->regionNameFR = $regionNameFR;
    }

    static function selectRegion($idRegion){
        $query = "SELECT region.*, language.*
                  FROM region, Language WHERE idRegion = '$idRegion' and region.Language_idLanguage = language.idLanguage";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        return new Region($row['Region.idRegion'], $row['Region.Language_idLanguage'], $row['Language.de'], $row['Language.fr']);
    }

}