<?php

class Database {

	private $_connection;

	public $dbh;

	public function connect()
	{
		$this->dbh = new PDO('mysql:server='.DB_SERVER.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
	    $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	    return $this->dbh;
	}

}