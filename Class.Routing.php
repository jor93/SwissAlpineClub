<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 23.09.2016
 * Time: 09:11
 */

/**
 * class used to apply http request with the MVC structure
 * 
 * @author Johner Robert
 */
class Routing {
	// variable
	private static $instance;
	
	/**
	 * singleton
	 */
	private function __construct() {
	}
	
	/**
	 * singleton method
	 */
	public static function getInstance() {
		// if singleton never created then create it once
		if (! isset ( self::$instance ) || self::$instance == null) {
			$c = __CLASS__;
			self::$instance = new $c ();
		}
		return self::$instance;
	}
	
	/**
	 * redirect to the controller and view
	 */
	public function route() {
		// read the URL to check it
		$path = parse_url ( (isset ( $_SERVER ['HTTPS'] ) ? 'https' : 'http') . '://' . $_SERVER ['HTTP_HOST'] . $_SERVER ['REQUEST_URI'] );
		$parts = explode ( "/", substr ( $path ['path'], 1 ) );

		// Login
		// get the controller and the view or method
		$controller = strtolower ( (@$parts [1]) ? $parts [1] : "home" );
		$method = strtolower ( (@$parts [2]) ? $parts [2] : "home" );

        echo '</br> controller:';
        var_dump($controller);
        echo '</br> method:';
        var_dump($method);

		// Check if controller and method exist, else show error page
		if (! file_exists ( ROOT_DIR . "controllers/Class.{$controller}Controller.php" )) {
			$controller = "error";
			$method = "error404";
            echo 'controller doesnt exists';
		} elseif (! method_exists ( "{$controller}Controller", "{$method}" )) {
			$controller = "error";
			$method = "error404";
            echo 'method doesnt exists';
		}
		
		// Instantiate controller class
		$class = $controller . "Controller";
		$controller_instance = new $class ( $controller, $method );
		
		// Call controller method first then display the view
		$controller_instance->$method ();
		$controller_instance->display ();
	}
}