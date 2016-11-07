<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 23.09.2016
 * Time: 09:11
 */

class loginController extends Controller {
    /**
     * Method called by the form of the page login.php
     */
    function connection(){
        //Get data posted by the form
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
        }
        //Load account from DB if exists
        $result = Account::connect($email, $password);
        //Put account in session if exists or return error msg
        if (!$result) {
            $this->redirect('login', 'login');
        } else {
            //Check if Account can update Lastlogin
            if(strcmp((string)date("Y-m-d"), (string)$result->getLastlogin()) != 0){
                Account::updateLastLogin($result->getIdAccount());
                $currentDate = date("Y-m-d");
                $result->setLastlogin($currentDate);
            }
            //Set cookie for remember me if its active
            if (isset($_POST['rememberMe'])) {
                $rmbe = sha1('1');
                setcookie("Rme", $rmbe, 0, "/");
            }
            $_SESSION['account'] = $result;

            // set lang in the db!
            $_SESSION['lang'] = $result->getLanguage();

            $this->redirect('profile', 'showuser');
        }
    }

    /**
     * Method that controls the page 'login.php'
     */
    function login(){
        //if a user is active he cannot re-login
        if ($this->getActiveUser()) {
            $this->redirect('profile', 'showuser');
            exit;
        }
    }


    function forgotpw()
    {
        //if a user is active he cannot re-login
        if ($this->getActiveUser()) {
            $this->redirect('forgotpw', 'forgotpw');
            exit;
        }
    }

    function resetpw()
    {
        if (isset($_GET['action'])){
            $_SESSION['action_url'] = $_GET['action'];
            $_SESSION['encrypt_url'] = $_GET['encrypt'];
        }

        //if a user is active he cannot re-login
        if ($this->getActiveUser()) {
            $this->redirect('forgotpw', 'resetpw');
            exit;
        }
    }

    /**
     * Method called by the logout hyperlink
     */
    function logout()
    {
        if(isset($_COOKIE["Rme"])){
            setcookie("Rme", "", time() - 3600, "/");
        }
        $_SESSION['account'] = null;
        $this->redirect('login', 'login');
    }

    /**
     * Method that controls the page 'newuser.php'
     */
    function newuser(){
        //if a user is active he cannot re-register
        if($this->getActiveUser()){
            $this->redirect('login', 'welcome');
            exit;
        }

        //Get message and data from registration process
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['persistence'] = isset($_SESSION['persistence']) ? $_SESSION['persistence'] : array('','','','');
    }

    function register(){
        // load country to session
        if(!isset($_SESSION['country'])){
            $query = "select idCountry,NameCountry,CodeCountry from country;";
            $data = SQL::getInstance()->select($query)->fetchAll();
            $_SESSION['country'] = $data;
        }
        // validating form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // reseting errors
            $_SESSION['errors'] = null;
            // initializing variable
            $firstName = "";
            $lastName = "";
            $email = "";
            $address = "";
            $zip = "";
            $location = "";
            $phone = "";
            $language = "";
            $password1 = "";
            $password2 = "";
            $country = "";
            $abo = "";
            $aborting = false;

            $errorsInForm = array();

            // checking if form is filled out
            if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['location'])
                && isset($_POST['phone']) && isset($_POST['lang']) && isset($_POST['pwd1']) && isset($_POST['abo']) && isset($_POST['country'])) {

                // get data from post and secured it
                $firstName = $this->badassSafer($_POST['firstname']);
                $lastName = $this->badassSafer($_POST['lastname']);
                $email = $this->badassSafer($_POST['email']);
                $address = $this->badassSafer($_POST['address']);
                $zip = $this->badassSafer($_POST['zip']);
                $location = $this->badassSafer($_POST['location']);
                $phone = $this->badassSafer($_POST['phone']);
                $language = $this->badassSafer($_POST['lang']);
                $password1 = $this->badassSafer($_POST['pwd1']);
                $password2 = $this->badassSafer($_POST['pwd2']);
                $country = $this->badassSafer($_POST['country']);
                $abo = $this->badassSafer($_POST['abo']);
                $_SESSION['saved'] = array($firstName,$lastName,$email,$address,$zip,$zip,$location,$phone,$language,$country,$abo);
            } else {
                $aborting = true;
                array_push($errorsInForm, 1);
            }

            // check if names are valid
            if($this->checkNames($firstName) === false){
                array_push($errorsInForm, 6);
                $aborting = true;
            }

            if($this->checkNames($lastName) === false){
                array_push($errorsInForm, 7);
                $aborting = true;
            }

            // check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errorsInForm, 2);
                $aborting = true;
            }

            // check if username isn't already in use
            $answer = self::checkEmailIfExists($email);
            if ($answer[0] === 1) {
                array_push($errorsInForm, 3);
                $aborting = true;
            }

            // check if pwd are the same
            if (strcmp($password1, $password2) != 0) {
                array_push($errorsInForm, 4);
                $aborting = true;
            } else{
                // check if pwd meet our security
                $answer = self::checkPasswordStrength($password2);
                if ($answer === false) {
                    array_push($errorsInForm, 5);
                    $aborting = true;
                }
            }
            if($aborting){
                // write all errors to session
                $_SESSION['errors'] = $errorsInForm;

                echo '</br>' . 'error in form';
                $length = count($errorsInForm);
                for ($i = 0; $i < $length; ++$i) {
                    echo "</br>" . $errorsInForm[$i];
                }
                return;

            }
            // everything is fine, no errors, create account
            $user = new Account();
            $user->setFirstname(ucwords($firstName));
            $user->setLastname(ucwords($lastName));
            $user->setPassword(sha1($password1));
            $user->setEmail($email);
            $user->setAddress(ucwords($address));
            $user->setPhone($phone);
            $user->setLanguage($language);
            $user->setAbonnement($abo);

                // check if zip code is in db
                $answer = self::checkIfZipCodeExists($location);
                if ($answer[0] === -1) {
                    // insert new location if
                    $obj = new Location(ucwords($location), strtoupper($zip), 4);
                    Location::insertLocation($obj);
                }

                // set location and country id
                $locationId = loginController::getIdLocationFromZipAndLocationName($location, $zip);
                $user->setLocation($locationId);
                $user->setCountry($country);

            // insert new account
            Account::insertAccount($user);

            // send email - confirmation -> set active
            forgotpwController::sendMail($user, 3);

            // redirect to other page
            //$this->redirect('profile', 'showuser');

                // registration successfull --> reset everything
                $_SESSION['country'] = null;
                $_SESSION['error'] = null;
                $_SESSION['saved'] = null;
        }
    }

    function activateAccount(){
        echo '</br> ACTIVATE';
        // after confirming the mail get redirected here - modify db
        if (isset($_GET['action']) && isset($_GET['encrypt'])){
            $action = $_GET['action'];
            $encrypt = $_GET['encrypt'];

            // decrypt and set status 1(active)
            $idAcc = Encryption::decode($encrypt);
            echo '</br>idAcc : ' . $idAcc;
            $status = 1;
            // update db
            Account::updateStatus($status, $idAcc);
        }
        $this->redirect('login', 'login');
    }


    // returns false if password is to weak, if good true
    public static function checkPasswordStrength($password){
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $special   =  preg_match('/[^a-zA-Z\d]/', $password);

        if(!$uppercase || !$lowercase || !$number || !$special || strlen($password) < 8)
            return false;
        else
            return true;
    }

    public static function getPreferredLanguage(){
        return parent::getPreferredLanguage();
    }

    // returns 1 if already exist, returns 0 if NOT exist
    public static function checkEmailIfExists($emailToCheck){
        $query = "SELECT CASE WHEN EXISTS (SELECT email FROM account WHERE email = '$emailToCheck') THEN 1 ELSE 0 END;";
        return SQL::getInstance()->select($query)->fetch();
    }

    // returns 1 if already exist, returns 0 if NOT exist
    public static function checkIfZipCodeExists($zipToCheck){
        $query = "SELECT CASE WHEN EXISTS (SELECT postcode FROM location WHERE postcode = '$zipToCheck') THEN 1 ELSE 0 END;";
        return SQL::getInstance()->select($query)->fetch();
    }

    // return the id of the location if found else -1
    public static function getIdLocationFromZipAndLocationName($locationName, $zip){
        $query = "SELECT * from location WHERE locationName = '$locationName' AND PostCode = '$zip';";
        $answer = SQL::getInstance()->select($query)->fetch();
        if($answer[0] > 0)
            return $answer[0];
        else
            return -1;
    }

    // returns the country code if found
    public static function getLocation(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        if($details->country != null)
            return $details->country;
    }

    public static function thank(){

    }
}