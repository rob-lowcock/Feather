<?php

/**
 * Database class
 *
 * Used to connect to the database and execute queries
 */
class Database
{

	private $_connection;

	public $dbh;

	/**
	 * connect to the database
	 * 
	 * @param  string $dbserver The server name / address (defaults to config)
	 * @param  string $dbname   The database name (defaults to config)
	 * @param  string $dbuser   The user to connect to the database (defaults to config)
	 * @param  string $dbpass   The password to connect to the database (defaults to config)
	 * @return PDO object
	 */
	public function connect($dbserver = DB_SERVER, $dbname = DB_NAME, $dbuser = DB_USER, $dbpass = DB_PASSWORD)
	{
		$this->dbh = new PDO('mysql:server=' . $dbserver . ';dbname=' . $dbname, $dbuser, $dbpass);
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
	    $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	    return $this->dbh;
	}

}