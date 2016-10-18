<?php

/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 15.10.2016
 * Time: 13:10
 */
class Location
{
    private $idLocation;
    private $locationName;
    private $postcode;
    private $idRegion;

    /**
     * Location constructor.
     * @param $idLocation
     * @param $locationName
     * @param $postcode
     * @param $Region_idRegion
     */
    public function __construct( $locationName, $postcode, $Region_idRegion)
    {
        $this->locationName = $locationName;
        $this->postcode = $postcode;
        $this->idRegion = $Region_idRegion;
    }

    /**
     * @return mixed
     */
    public function getIdLocation()
    {
        return $this->idLocation;
    }

    /**
     * @param mixed $idLocation
     */
    public function setIdLocation($idLocation)
    {
        $this->idLocation = $idLocation;
    }

    /**
     * @return mixed
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * @param mixed $locationName
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
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

    static function selectLocation($idLocation){
        $query = "SELECT *
                  FROM Location WHERE idLocation = '$idLocation'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        return new Location($row['idLocation'], $row['LocationName'], $row['Postcode'], $row['Region_idRegion']);
    }

    public static function insertLocation($obj){
        $query = "INSERT INTO `grp1`.`location` (`LocationName`,`Postcode`,`Region_idRegion`)
                  VALUES('$obj->locationName','$obj->postcode',4);";
        $result = SQL::getInstance()->executeQuery($query);
        var_dump($result);



    }


}