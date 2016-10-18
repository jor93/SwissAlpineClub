<?php
/**
 * Created by PhpStorm.
 * User: jor
 * Date: 23.09.2016
 * Time: 09:11
 */

/**
 * Connection class to mySQL Server
 * @author Johner Robert
 */
class SQL {
	const HOST = "127.0.0.1";
	const PORT = "3306";
	const DATABASE = "grp1";
	const USER = "root";
	const PWD = "";

	private static $instance;
	private $_conn;

    private $lastInsertedId;

	/**
	 * prevent from direct creation of object
	 */
	private function __construct()
	{
		try{
			$this->_conn = new PDO('mysql:host='.self::HOST.
					';port='.self::PORT.
					';dbname='.self::DATABASE,
					self::USER, self::PWD);
            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		catch (PDOException $e) {
			die ('Connection failed: ' . $e->getMessage());
		}

	}

    /**
     * @return mixed
     */
    public function getLastInsertedId()
    {
        return $this->lastInsertedId;
    }

    /**
     * @param mixed $lastInsertedId
     */
    public function setLastInsertedId($lastInsertedId)
    {
        $this->lastInsertedId = $lastInsertedId;
    }



	/**
	 * singleton method
	 * @return resource
	 */
	public static function getInstance()
	{
		if (!isset(self::$instance)|| self::$instance == null)
		{
			$c = __CLASS__;
			self::$instance = new $c();
		}
		return self::$instance;
	}

	// function for select query
	public function select($query){
        echo '</br>' . 'SQL query: ';
        var_dump($query);
        // prepare query (sql injection)
        $stmt = $this->_conn->prepare($query);
        // execute query or show error
		$result = $this->_conn->query($stmt->queryString)
		or die(print_r($this->_conn->errorInfo(), true));
		return $result;
	}

	// function for insert/update/delete
	public function executeQuery($query){
	    echo '</br>' . 'SQL query: ';
        var_dump($query);
        try {
            // begin trans
            $this->_conn->beginTransaction();
            // prepare query (sql injection)
            $stmt = $this->_conn->prepare($query);
            // execute query
            $result = $this->_conn->exec($stmt->queryString);
            // get any error
            $e = $this->_conn->errorInfo();
            // check error
            if ($e[1] != null) {
                // rollback if errors
                $this->_conn->rollBack();
                die(print_r($this->_conn->errorInfo(), true));
            } else{
                // commit if no erros
                var_dump($this->_conn->lastInsertId());
                $this->setLastInsertedId($this->_conn->lastInsertId());
                $this->_conn->commit();
            }
            // rollback if any exception thrown
        } catch (PDOException $e) {
            $this->_conn->rollBack();
            die(print_r($e->getMessage(), true));
        }
		return $result;
	}


    // function for select query
    public function selectBLOB($query, $tourid){
        echo '</br>' . 'SQL query: ';
        var_dump($query);
        // prepare query (sql injection)
        $stmt = $this->_conn->prepare($query);
        $stmt->execute(array(":id" => $tourid));
        $stmt->bindColumn(1, $data, PDO::PARAM_LOB);
        $stmt->bindColumn(2, $mime);
        $stmt->fetch(PDO::FETCH_BOUND);
        // execute query or show error
        $result = array("mime" => $mime,
            "data" => $data)
        or die(print_r($this->_conn->errorInfo(), true));
        return $result;
    }


    // function for insert/update/delete
    public function executeBLOBQuery($query, $tourid, $filePath, $mime){
        echo '</br>' . 'SQL query: ';
        var_dump($query);
        try {
            // begin trans
            $this->_conn->beginTransaction();
            // prepare query (sql injection)
            $stmt = $this->_conn->prepare($query);
            //write data stream
            $blob = fopen($filePath, 'rb');
            $stmt->bindParam(':id', $tourid);
            $stmt->bindParam(':mime', $mime);
            $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
            // execute query
            $result = $stmt->execute();
            // get any error
            $e = $this->_conn->errorInfo();
            // check error
            if ($e[1] != null) {
                // rollback if errors
                $this->_conn->rollBack();
                die(print_r($this->_conn->errorInfo(), true));
            } else{
                // commit if no erros
                $this->_conn->commit();
            }
            // rollback if any exception thrown
        } catch (PDOException $e) {
            $this->_conn->rollBack();
            die(print_r($e->getMessage(), true));
        }
        return $result;
    }




}
