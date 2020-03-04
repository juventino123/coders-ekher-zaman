<?php

class DatabaseManager{
	
	private $dbHost = '127.0.0.1';
	private $dbUser = 'root';
	private $dbPassword = '';
	private $dbName = 'universityproject';
	
	//constructor
	public function __construct(){}
	
	//connection to the database
	public function connectToDb()
	{
		$dbConnection = mysqli_connect($this->dbHost,$this->dbUser,$this->dbPassword,$this->dbName);
		return $dbConnection;
	}
	
	//execute query insert , update , delete
	public function executeQuery($query)
	{
		$dbConnection = $this->connectToDb();
		$result = mysqli_query($dbConnection,$query);
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