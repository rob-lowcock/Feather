<?php

class Orm {

	public function table_name()
	{
		return strtolower(get_called_class()).'s';
	}

	public static function find($id)
	{
		$db = new Database;
		$handler = $db->connect();

		$sql = 'SELECT * FROM '.self::table_name().' WHERE id='.$id.' LIMIT 1';

		$handler = $handler->query($sql);
		return $handler->fetch();
	}

	public static function all()
	{
		$db = new Database;
		$handler = $db->connect();

		$sql = 'SELECT * FROM '.self::table_name();

		$handler = $handler->query($sql);
		return $handler->fetchAll();
	}

}

?>