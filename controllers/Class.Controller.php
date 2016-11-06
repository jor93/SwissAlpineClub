 <?php
 /**
  * Created by PhpStorm.
  * User: jor
  * Date: 23.09.2016
  * Time: 09:11
  */

 /**
  * Parent class for every other controller class
 * @author Johner Robert
 */
 class Controller {
 	protected $vars = array();
 	protected $controller;
 	protected $method;
    protected $illegalChars = array('"',"§","°","1","+","¦","2","@","3","*","#","4","5","%","6","&","¬","7","/","|","8","(","¢","9",")","0","=","?","´","^","`","~","[","¨","!","]","{","}","£",",",".",";",":","_","<",">");
 	 
 	/**
 	 * Constructor
 	 * @param string $controller
 	 * @param string $method
 	 */
 	function Controller($controller, $method) {
 		$this->controller = $controller;
 		$this->method = $method;
 	}
 
 	/**
 	 * Display view associated to a controller method
 	 */
 	function display(){
 	    if(strcmp($this->controller,'home')==0)
            $view = "{$this->controller}.php";
 		else
 		    $view = "{$this->controller}/{$this->method}.php";
        //echo '</br> current view: ' . $view;
 		if(file_exists('views/'.$view))
 			include 'views/'.$view;
 	}
 
 	/**
 	 * URL redirection
 	 * @param string $controller
 	 * @param string $method
 	 */
 	function redirect($controller, $method) {
 		$url = "Location: " . URL_DIR. $controller . '/' .$method;
 		header($url);
 	}

     //check if user is active and get back which runlevel has account
     public static function checkActiveUser()
     {
         if(self::getActiveUserWithoutCookie())return 1;
         if(self::getAdminUserWithoutCookie())return 10;
         else return false;
     }

     /**
      * Get active (logged-in) user
      * @return User
      */
     function getActiveUser(){
         if(isset($_SESSION['account']) && isset($_COOKIE['Rme']))
             return $_SESSION['account'];
         else
             return false;
     }

     /**
      * Get active (logged-in) admin
      * @return User
      */
     function getAdminUser(){
         if(isset($_SESSION['account']) && isset($_COOKIE['Rme']) && $_SESSION['account']->getRunlevel() == 10)
             return $_SESSION['account'];
         else {
             if(isset($_COOKIE["Rme"])){
                 setcookie("Rme", "", time() - 3600, "/");
             }
             return false;
         }
     }

     /**
      * Get active (logged-in) admin
      * @return User
      */
      static function  getAdminUserWithoutCookie(){
         if(isset($_SESSION['account']) && $_SESSION['account']->getRunlevel() == 10)
             return $_SESSION['account'];
         else {
             return false;
         }
     }

     /**
      * Get active (logged-in) user without cookie
      * @return User
      */
     static function getActiveUserWithoutCookie(){
         if(isset($_SESSION['account'])){
             return $_SESSION['account'];
         }
         else
             return false;
     }


     /**
      * Make a string safe
      * @return string
      */
 	function badassSafer($secureMe){
 	    $secured = trim($secureMe);
        $secured = stripslashes($secured);
        $secured = htmlspecialchars($secured, ENT_QUOTES, 'UTF-8');
 	    echo '</br>' . 'secured string: ' . $secured;
        return $secured;
    }

     /**
      * Clean Names from illegals chars
      * @return User
      */
    function cleanNames($cleanMyName){
        return str_replace($this->illegalChars, "", $cleanMyName);
    }

     /**
      * Check Names for illegals chars
      * @return User
      */
     function checkNames($checkMyName){
         $length = count($this->illegalChars);
         for ($i = 0; $i < $length; ++$i) {
             if( strpos( $checkMyName, $this->illegalChars[$i] ) !== false ) return false;
         }
         return true;

     }

     static function checkHeader(){
         $user = Controller::checkActiveUser();
         if(is_bool($user) === true && !$user)
             include_once ROOT_DIR . '/views/header.inc';
         else if(is_int($user) === true && $user == 10)
             include_once ROOT_DIR. '/views/headeradmin.inc';
         else
             include_once ROOT_DIR . '/views/header.inc';
     }

     /**
      * Detect Browser Language
      * @return languages
      */
     static function getPreferredLanguage(){
         $acceptedLanguages = @explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
         $preferredLanguage = null;
         $maxWeight = 0.0;
         foreach((array)$acceptedLanguages as $acceptedLanguage){
             $weight = (float)@substr(explode(';', $acceptedLanguage)[1], 2);
             if(!$weight){$weight = 1.0;}
             if($weight > $maxWeight){
                 $preferredLanguage =  substr($acceptedLanguage, 0, 2);
                 $maxWeight = $weight;
             }
         }
         return $preferredLanguage;
     }

 }