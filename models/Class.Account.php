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

    public static function createAccount($idAccount, $firstname, $lastname, $password, $email, $address, $location, $country,
                                 $phone, $language, $runlevel, $abonnement, $lastlogin, $activated){
        $user = new Account();
        $user->idAccount = $idAccount;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->password = $password;
        $user->email = $email;
        $user->address = $address;
        $user->location = $location;
        $user->country = $country;
        $user->phone = $phone;
        $user->language = $language;
        $user->runlevel = $runlevel;
        $user->abonnement = $abonnement;
        $user->lastlogin = $lastlogin;
        $user->activated = $activated;
        return $user;
     }

     public function getFullName(){
         return $this->firstname . ' ' . $this->lastname;
     }

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

    // connect a user with username and pw
    public static function connect($email, $password){
        $query = "SELECT *
                  FROM Account WHERE Account.Email='$email' AND Account.Password='$password'";
        $result = SQL::getInstance()->select($query);
        $row = $result->fetch();
        if(!$row) return false;

        $abonnement = Abonnement::selectAbonnement($row['Abonnement_idAbonnement']);
        $location = Location::selectLocation($row['Location_idLocation']);
        $country = Country::selectCountry($row['Country_idCountry']);

        return Account::createAccount($row['idAccount'], $row['Firstname'], $row['Lastname'], $row['Password'], $row['Email'], $row['Address'], $location, $country,
            $row['Phone'], $row['Language'], $row['Runlevel'], $abonnement, $row['Lastlogin_Date'], $row['Activated']);
    }

    // update last login in db
    public static function updateLastLogin($accountId){
        $currentDate = date("Y-m-d");
        $query = "UPDATE Account SET Lastlogin_Date = '$currentDate' WHERE idAccount=$accountId";
        return  SQL::getInstance()->executeQuery($query);
    }

    // update account
    public static function updateAccount($accountid, $firstname, $lastname, $address, $locationid, $phone, $language, $countryId){
        $query = "UPDATE Account SET Firstname = '$firstname', Lastname = '$lastname',
                  Address = '$address', Location_idLocation = '$locationid',
                  Phone = '$phone', Language = '$language',
                  Country_idCountry = '$countryId'
                  WHERE idAccount=$accountid";
        return  SQL::getInstance()->executeQuery($query);
    }

    // activate account in db
    public static function activate($accountId){
        $query = "UPDATE Account SET Activated = 1 WHERE idAccount=$accountId";
        return  SQL::getInstance()->executeQuery($query);
    }

    // default value: runlevel 1, lastlogin: now(), activated 0
    public static function insertAccount($obj){
        $query = "INSERT INTO `grp1`.`account`(`Firstname`,`Lastname`,`Email`,`Address`,`Password`,`Phone`,`Language`,`Runlevel`,`Abonnement_idAbonnement`,`Lastlogin_Date`,`Activated`,`Location_idLocation`,`Country_idCountry`)
                  VALUES ('$obj->firstname','$obj->lastname','$obj->email','$obj->address','$obj->password','$obj->phone','$obj->language',1,'$obj->abonnement',now(),0,$obj->location,$obj->country);";
        return  SQL::getInstance()->executeQuery($query);
    }

    public static function updateAccountAdmin($obj){
        $query = "UPDATE account SET
                idAccount = '$obj->idAccount',
                Firstname = '$obj->firstname',
                Lastname = '$obj->lastname',
                Email = '$obj->email',
                Address = '$obj->address',
                Password = '$obj->password',
                Phone = '$obj->phone',
                Language = '$obj->language',
                Runlevel = '$obj->runlevel',
                Abonnement_idAbonnement = '$obj->abonnement',
                Lastlogin_Date = '$obj->lastlogin',
                Activated = '$obj->activated',
                Location_idLocation = '$obj->location',
                Country_idCountry = '$obj->country'
                WHERE idAccount = '$obj->idAccount';";
        return  SQL::getInstance()->executeQuery($query);
    }

    // get all accounts for view
    public static function selectAllAccounts(){
        $query = "SELECT idAccount,Firstname,Lastname,Email,Address,Phone,locationName,Postcode,NameCountry, Language
                  FROM account, abonnement, location, country  
	              WHERE abonnement.idAbonnement = account.Abonnement_idAbonnement 
	              AND location.idLocation = account.Location_idLocation
	              AND country.idCountry = Country_idCountry;";
        return SQL::getInstance()->select($query)->fetchAll();
    }

    // get single account by id
    public static function selectAccountById($accountId){
        $query = "SELECT * FROM Account where Account.idAccount = '$accountId';";
        return $result = SQL::getInstance()->select($query)->fetch();
    }

    // get single account id by email
    public static function selectAccountByEmail($accountEmail){
        $query = "SELECT idAccount FROM Account where Account.Email = '$accountEmail'";
        return $result = SQL::getInstance()->select($query)->fetch();
    }

    // get id account per encrypted mda value
    public static function selectAccountIdByMDA($encrypted){
        //$query = "SELECT idAccount FROM Account where md5(90*13+idAccount) = '$encrypted'";
        $query = "SELECT idAccount FROM Account where md5(90*13+idAccount) = '$encrypted'";
        return $result = SQL::getInstance()->select($query)->fetch();
    }

    // returns all of the data
    public static function getUserData($emailToCheck){
        $query = "SELECT * FROM account WHERE email = '$emailToCheck';";
        return SQL::getInstance()->select($query);
    }

    // reset pwd
    public static function resetpwDB($pw_new, $idAcc){
        $update = "UPDATE account SET Password = '$pw_new' WHERE idaccount = '$idAcc';";
        SQL::getInstance()->executeQuery($update);
        return;
    }

    // update status
    public static function updateStatus($status, $idAcc){
        $update = "UPDATE account SET Activated = $status WHERE idaccount = $idAcc;";
        SQL::getInstance()->executeQuery($update);
        return;
    }

    // delete account
    public static function deleteAccount($idAcc){
        $update = "DELETE FROM account_inscription WHERE idaccount = $idAcc;
                    DELETE FROM favorites WHERE idaccount = $idAcc;
                    DELETE FROM rating WHERE idaccount = $idAcc;
                    DELETE FROM account WHERE idaccount = $idAcc;";
        SQL::getInstance()->executeQuery($update);
        return;
    }
}