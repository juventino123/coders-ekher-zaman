<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class DatabaseManager{
//local	
	private $dbHost = '127.0.0.1';
	private $dbUser = 'root';
	private $dbPassword = '';
	private $dbName = 'universityproject';
	
// online

	/*private $dbHost = 'localhost';
	private $dbUser = 'id12609868_root';
	private $dbPassword = 'C@oQLPI3^H8*U]Pd';
	private $dbName = 'id12609868_universityproject';*/
	//constructor
	public function __construct(){}
	
	//connection to the database
	public function connectToDb()
	{
		$dbConnection = mysqli_connect($this->dbHost,$this->dbUser,$this->dbPassword,$this->dbName) or die('can\'t connect to the db');
		return $dbConnection;
	}
	
	//execute query insert , update , delete
	public function executeQuery($query)
	{
		$dbConnection = $this->connectToDb();
		$result = mysqli_query($dbConnection,$query);
		//echo $query."<br>";
		if(mysqli_error($dbConnection))
		{
			echo "error " .mysqli_error($dbConnection);
			die();
		}
		return $result;
	}
	
	//execute select query
	public function selectQuery($query)
	{
		$queryResult = $this->executeQuery($query);
		$resultArray = [];
		$resultArray = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
		return $resultArray;
	}
	
	//destructor
	public function __destruct(){}
	
}

?>