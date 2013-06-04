<?php


require_once dirname(__FILE__).'/../system/database.php';

class databaseTest extends PHPUnit_Framework_TestCase {
	
	public function testConnect()
	{
		require_once dirname(__FILE__).'/../app/config.php';
		$db = new Database();
		$handler = $db->connect();

		$this->assertInstanceOf('PDO', $handler);
	}

	public function testConnectFail()
	{
		$db = new Database();

		try {
			$handler = $db->connect('INVALID', 'INVALID', 'INVALID', FALSE);
			$this->fail('No exception has been raised');
		}
		catch (PDOException $expected) {

		}

	}

}

?>