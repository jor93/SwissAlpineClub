<?php

/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 15.10.2016
 * Time: 14:06
 */
class Status
{

    private $idStatus;
    private $language_idLanguage;
    private $statusDE;
    private $statusFR;

    /**
     * Status constructor.
     * @param $idStatus
     * @param $language_idLanguage
     * @param $statusDE
     * @param $statusFR
     */
    public function __construct($idStatus, $language_idLanguage, $statusDE, $statusFR)
    {
        $this->idStatus = $idStatus;
        $this->language_idLanguage = $language_idLanguage;
        $this->statusDE = $statusDE;
        $this->statusFR = $statusFR;
    }

    /**
     * @return mixed
     */
    public function getIdStatus()
    {
        return $this->idStatus;
    }

    /**
     * @param mixed $idStatus
     */
    public function setIdStatus($idStatus)
    {
        $this->idStatus = $idStatus;
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
    public function getStatusDE()
    {
        return $this->statusDE;
    }

    /**
     * @param mixed $statusDE
     */
    public function setStatusDE($statusDE)
    {
        $this->statusDE = $statusDE;
    }

    /**
     * @return mixed
     */
    public function getStatusFR()
    {
        return $this->statusFR;
    }

    /**
     * @param mixed $statusFR
     */
    public function setStatusFR($statusFR)
    {
        $this->statusFR = $statusFR;
    }

    static function selectStatus($idStatus){
        $query = "SELECT status.*, language.*
                  FROM status, language WHERE idStatus = '$idStatus' and status.Language_idLanguage = language.idLanguage";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        return new Status($row['idStatus'], $row['Language_idLanguage'], $row['de'], $row['fr']);
    }

    public static function getStatusByLanguage($language){
        $query = "SELECT idStatus, $language FROM status, language WHERE status.Language_idLanguage =  language.idLanguage;";
        return SQL::getInstance()->select($query)->fetchAll();
    }

}