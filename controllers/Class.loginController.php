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
    function login()
    {
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
        session_destroy();
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
        /*
        if(!isset($_SESSION['zipcode'])){
            $query = "select idCountry,NameCountry from country;";
            $data = SQL::getInstance()->select($query)->fetchAll();
            $_SESSION['country'] = $data;
            echo 'session not existed yet!';
        }*/



        // validating form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // initializing variable
            $firstName = "";
            $lastName = "";
            $email = "";
            $address = "";
            $location = "";
            $phone = "";
            $language = "";
            $password = "";

            //$test = $_POST['country'];

            // checking if form is filled out
            if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['location'])
                && isset($_POST['phone']) && isset($_POST['lang']) && isset($_POST['pwd1'])
            ) {
                // get data from post and secured it
                $firstName = $this->cleanNames($this->badassSafer($_POST['firstname']));
                $lastName = $this->cleanNames($this->badassSafer($_POST['lastname']));
                $email = $this->badassSafer($_POST['email']);
                $address = $this->badassSafer($_POST['address']);
                $location = $this->badassSafer($_POST['location']);
                $phone = $this->badassSafer($_POST['phone']);
                $language = $this->badassSafer($_POST['lang']);
                $password1 = $this->badassSafer($_POST['pwd1']);
                $password2 = $this->badassSafer($_POST['pwd2']);
            } else {
                $_SESSION['error'] = 1;
                // Bitte füllen Sie alle Felder aus!
                //
                return;
            }

            // check language
            switch ($language) {
                case 'en':
                    $language = 'en';
                    break;
                case 'fr':
                    $language = 'fr';
                    break;
                case 'de':
                    $language = 'de';
                    break;
                default:
                    return;
            }

            // check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 2;
                // Ungültige E-Mail Adresse!
                //
                return;
                return;
            }

            // check if username isn't already in use
            $answer = self::checkEmailIfExists($email);
            if ($answer[0] === 1) {
                $_SESSION['error'] = 3;
                // Diese E-Mail Adresse exisitert bereits!
                //
                return;
            }

            // check if zip code ist in db
            $answer = self::checkIfZipCodeExists($location);
            if ($answer[0] === 0) {
                // insert new zip code here
            }

            // check if pwd are the same
            if (strcmp($password1, $password2) != 0){
                $_SESSION['error'] = 4;
                // Passswörter sind nicht identisch!
                return;
            }

            // check if pwd meet our security
            $answer = self::checkPasswordStrength($password2);
            if ($answer === false){
                $_SESSION['error'] = 5;
                // Passswort ist zu schwach
                return;
            }

            echo '</br>';

            // everything is fine, create new account
            //$user = new Account();

            // registration successfull
            $_SESSION['country'] = null;
            $_SESSION['error'] = null;
        }

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

    // returns the country code if found
    public static function getLocation(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        if($details->country != null)
            return $details->country;
    }
}