<?php

class Orm {

	public function table_name()
	{
		return strtolower(get_called_class()).'s';
	}

	public function demo()
	{
		return 'hello';
	}

	public static function find($id)
	{
		$db = new Database;
		$handler = $db->connect();

		$assignments = array(
				':id' => $id
			);

		$table = 'SELECT * FROM '.self::table_name();
		$sql = $table.' WHERE id = :id LIMIT 1';

		$sth = $handler->prepare($sql);
		$sth->execute($assignments);

		return $sth->fetch();
	}

	public static function all()
	{
		$db = new Database;
		$handler = $db->connect();

		$sql = 'SELECT * FROM '.self::table_name();

		$sth = $handler->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

}

?>