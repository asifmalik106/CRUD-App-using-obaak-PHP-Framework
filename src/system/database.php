<?php
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'mvc');
	define('DB_USER', 'root');
	define('DB_PASS', '');
/**
* 
*/
class Database
{
	public $conn;

	function __construct()
	{
		$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		/* Check connection
		if ($this->conn->connect_error) {
   			die("Connection failed: " . $this->conn->connect_error);
		} 
		echo "Connected successfully";*/
	}

	public function execute($sql)
	{
		//return $this->conn->query($sql);
		if ($this->conn->query($sql) === TRUE) {
    		return TRUE;
		} else {
		   	return FALSE;
		}
	}

	public function fetch($sql)
	{
		//return $this->conn->query($sql);
		return $this->conn->query($sql);
	}

	public function selectDB($db){
		mysqli_select_db($this->conn,$db);
	}
	
}