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
        $uname = $_POST['username'];
        $pwd = $_POST['password'];

        //Check if data valid
        if(empty($uname) or empty($pwd)){
            $_SESSION['msg'] = '<span class="error">A required field is empty!</span>';
            $this->redirect('login', 'login');
        }
        else{
            //Load user from DB if exists
            $result = User::connect($uname, $pwd);

            //Put user in session if exists or return error msg
            if(!$result){
                $_SESSION['msg'] = '<span class="error">Username or password incorrect!</span>';
                $this->redirect('login', 'login');
            }
            else{
                $_SESSION['msg'] = '<span class="success">Welcome '. $result->getFirstname(). ' '.$result->getLastname().'!</span>';
                $_SESSION['user'] = $result;
                $this->redirect('login', 'welcome');
            }
        }
    }

    /**
     * Method that controls the page 'login.php'
     */
    function login(){
        //if a user is active he cannot re-login
        if($this->getActiveUser()){
            $this->redirect('login', 'welcome');
            exit;
        }

        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }

    /**
     * Method called by the logout hyperlink
     */
    function logout(){
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

        $_SESSION['country'] = null;
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
            $aborting = false;

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
                $firstName = $this->badassSafer($_POST['firstname']);
                $lastName = $this->badassSafer($_POST['lastname']);
                $email = $this->badassSafer($_POST['email']);
                $address = $this->badassSafer($_POST['address']);
                $location = $this->badassSafer($_POST['location']);
                $phone = $this->badassSafer($_POST['phone']);
                $language = $this->badassSafer($_POST['lang']);
                $password1 = $this->badassSafer($_POST['pwd1']);
                $password2 = $this->badassSafer($_POST['pwd2']);
                // todo unshow error
            } else {
                // todo show error
                //return;
            }

            // check firstname
            if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {

                return;
            }

            // check lastname
            if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
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
                return;
            }

            // check if username isn't already in use
            $answer = self::checkEmailIfExists($email);
            if ($answer === 1) {
                return;
            }

            // check if zip code ist in db
            $answer = self::checkIfZipCodeExists($location);
            if ($answer === 0) {
                // insert new zip code here
            }

            // check if pwd are the same
            if (strcmp($password1, $password2) != 0) return;

            // check if pwd meet our security
            $answer = self::checkPassword($password2);
            if ($answer === false) return;

            echo '</br>';
            var_dump($answer);

            // everything is fine, create new account
            //$user = new Account();
        }

    }


    /**
     * Method that controls the page 'welcome.php'
     */
    function welcome(){
        //The page cannot be displayed if no user connected
        if(!$this->getActiveUser()){
            $this->redirect('login', 'login');
            exit;
        }

        //Get message from connection process
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';

    }

    // password strength checker
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
        return SQL::getInstance()->select($query);
    }

    // returns 1 if already exist, returns 0 if NOT exist
    public static function checkIfZipCodeExists($zipToCheck){
        $query = "SELECT CASE WHEN EXISTS (SELECT postcode FROM location WHERE postcode = '$zipToCheck') THEN 1 ELSE 0 END;";
        return SQL::getInstance()->select($query);
    }

    // returns the country code if found
    public static function getLocation(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        if($details->country != null)
            return $details->country;
    }
}