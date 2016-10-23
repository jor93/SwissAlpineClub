<?php
/**
 * Created by PhpStorm.
 * User: vm
 * Date: 28.09.2016
 * Time: 17:24
 */

class Account{

    private $idAccount;
    private $firstname;
    private $lastname;
    private $password;
    private $email;
    private $address;
    private $location;
    private $country;
    private $phone;
    private $language;
    private $runlevel;
    private $abonnement;
    private $lastlogin;
    private $activated;

    public function __construct(){}



    /*public function __construct($idAccount, $firstname, $lastname, $password, $email, $address, $location, $country,
                                $phone, $language, $runlevel, $abonnement, $lastlogin, $activated)
    {
        $this->idAccount = $idAccount;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = $password;
        $this->email = $email;
        $this->address = $address;
        $this->location = $location;
        $this->country = $country;
        $this->phone = $phone;
        $this->language = $language;
        $this->runlevel = $runlevel;
        $this->abonnement = $abonnement;
        $this->lastlogin = $lastlogin;
        $this->activated = $activated;
    }*/

    /**
     * @return mixed
     */
    public function getIdAccount()
    {
        return $this->idAccount;
    }

    /**
     * @param mixed $idAccount
     */
    public function setIdAccount($idAccount)
    {
        $this->idAccount = $idAccount;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getRunlevel()
    {
        return $this->runlevel;
    }

    /**
     * @param mixed $runlevel
     */
    public function setRunlevel($runlevel)
    {
        $this->runlevel = $runlevel;
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
    public function getLastlogin()
    {
        return $this->lastlogin;
    }

    /**
     * @param mixed $lastlogin
     */
    public function setLastlogin($lastlogin)
    {
        $this->lastlogin = $lastlogin;
    }

    /**
     * @return mixed
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * @param mixed $activated
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
    }

    public static function connect($email, $password){
       // $pwd = sha1($password);
        $query = "SELECT *
                  FROM Account WHERE Account.Email='$email' AND Account.Password='$password'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        $abonnement = Abonnement::selectAbonnement($row['Abonnement_idAbonnement']);
        $location = Location::selectLocation($row['Location_idLocation']);
        $country = Country::selectCountry($row['Country_idCountry']);

        var_dump($location->getLocationName());

        return new Account($row['idAccount'], $row['Firstname'], $row['Lastname'], $row['Password'], $row['Email'], $row['Address'], $location, $country,
            $row['Phone'], $row['Language'], $row['Runlevel'], $abonnement, $row['Lastlogin_Date'], $row['Activated']);
    }

    public static function updateLastLogin($accountId){
        $currentDate = date("Y-m-d");
        $query = "UPDATE Account SET Lastlogin_Date = '$currentDate' WHERE idAccount=$accountId";
        return  SQL::getInstance()->executeQuery($query);
    }

    public static function updateAccount($accountid, $firstname, $lastname, $address, $locationid, $phone, $language, $countryId){
        $query = "UPDATE Account SET Firstname = '$firstname', Lastname = '$lastname',
                  Address = '$address', Location_idLocation = '$locationid',
                  Phone = '$phone', Language = '$language',
                  Country_idCountry = '$countryId'
                  WHERE idAccount=$accountid";
        return  SQL::getInstance()->executeQuery($query);
    }


    // default value: runlevel 1, lastlogin: now(), activated 0
    public static function insertAccount($obj){
        $query = "INSERT INTO `grp1`.`account`(`Firstname`,`Lastname`,`Email`,`Address`,`Password`,`Phone`,`Language`,`Runlevel`,`Abonnement_idAbonnement`,`Lastlogin_Date`,`Activated`,`Location_idLocation`,`Country_idCountry`)
                  VALUES ('$obj->firstname','$obj->lastname','$obj->email','$obj->address','$obj->password','$obj->phone','$obj->language',1,'$obj->abonnement',now(),0,$obj->location,$obj->country);";
        return  SQL::getInstance()->executeQuery($query);
    }
}