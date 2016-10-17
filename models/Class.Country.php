<?php

/**
 * Created by PhpStorm.
 * User: mv
 * Date: 15.10.2016
 * Time: 13:30
 */
class Country
{

    private $idCountry;
    private $nameCountry;

    /**
     * Country constructor.
     * @param $idCountry
     * @param $nameCountry
     */
    public function __construct($idCountry, $nameCountry)
    {
        $this->idCountry = $idCountry;
        $this->nameCountry = $nameCountry;
    }

    /**
     * @return mixed
     */
    public function getIdCountry()
    {
        return $this->idCountry;
    }

    /**
     * @param mixed $idCountry
     */
    public function setIdCountry($idCountry)
    {
        $this->idCountry = $idCountry;
    }

    /**
     * @return mixed
     */
    public function getNameCountry()
    {
        return $this->nameCountry;
    }

    /**
     * @param mixed $nameCountry
     */
    public function setNameCountry($nameCountry)
    {
        $this->nameCountry = $nameCountry;
    }

    static function selectCountry($idCountry){
        $query = "SELECT *
                  FROM Country WHERE idCountry = '$idCountry'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        return new Country($row['idCountry'], $row['NameCountry']);
    }

}