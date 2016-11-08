<?php

/**
 * Created by PhpStorm.
 * User: mv
 * Date: 15.10.2016
 * Time: 13:57
 */
class Abonnement
{

    private $idAbonnement;
    private $language_idLanguage;
    private $abonnementDE;
    private $abonnementFR;

    /**
     * Abonnement constructor.
     * @param $idAbonnement
     * @param $language_idLanguage
     * @param $abonnementDE
     * @param $abonnementFR
     */
    public function __construct($idAbonnement, $language_idLanguage, $abonnementDE, $abonnementFR)
    {
        $this->idAbonnement = $idAbonnement;
        $this->language_idLanguage = $language_idLanguage;
        $this->abonnementDE = $abonnementDE;
        $this->abonnementFR = $abonnementFR;
    }

    /**
     * @return mixed
     */
    public function getIdAbonnement()
    {
        return $this->idAbonnement;
    }

    /**
     * @param mixed $idAbonnement
     */
    public function setIdAbonnement($idAbonnement)
    {
        $this->idAbonnement = $idAbonnement;
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
    public function getAbonnementDE()
    {
        return $this->abonnementDE;
    }

    /**
     * @param mixed $abonnementDE
     */
    public function setAbonnementDE($abonnementDE)
    {
        $this->abonnementDE = $abonnementDE;
    }

    /**
     * @return mixed
     */
    public function getAbonnementFR()
    {
        return $this->abonnementFR;
    }

    /**
     * @param mixed $abonnementFR
     */
    public function setAbonnementFR($abonnementFR)
    {
        $this->abonnementFR = $abonnementFR;
    }

    static function selectAbonnement($idAbonnement){
        $query = "SELECT abonnement.*, language.*
                  FROM abonnement, language WHERE idAbonnement = $idAbonnement and abonnement.Language_idLanguage = language.idLanguage";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        return new Abonnement($row['Abonnement.idAbonnement'], $row['Abonnement.Language_idLanguage'], $row['Language.de'], $row['Language.fr']);
    }

    public static function getAboByLanguage($language){
        $query = "SELECT idAbonnement, $language FROM grp1.abonnement, language WHERE grp1.abonnement.Language_idLanguage =  language.idLanguage;";
        return SQL::getInstance()->select($query)->fetchAll();
    }
}