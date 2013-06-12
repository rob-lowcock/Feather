<?php

/**
 * Object Relational Mapper
 */
class Orm
{

	/**
	 * get the appropriate table name
	 * 
	 * @return string Table name
	 */
	public function table_name()
	{
		return strtolower(get_called_class()).'s';
	}

	/**
	 * find a particular entry in the table
	 * @param  int/array $param The parameters to find in the database or the ID
	 * @return object        	The database row
	 */
	public static function find($param)
	{
		$db = new Database;
		$handler = $db->connect();

		$table = 'SELECT * FROM '.self::table_name();

		if (!is_array($param)) {
			$assignments = array(
					':id' => $param
				);
			
			$sql = $table.' WHERE id = :id LIMIT 1';
		} else {
			foreach ($param as $k => $v) {
				$assignments[':'.$k] = $v;

				$where[] = $k.' = :'.$k;
			}

			$where = implode(' AND ', $where);
			$sql = $table.' WHERE '.$where.' LIMIT 1';
		}


		$sth = $handler->prepare($sql);
		$sth->execute($assignments);

		return $sth->fetch();
	}

	/**
	 * return all entries from the table
	 * 
	 * @return object All table rows
	 */
	public static function all()
	{
		$db = new Database;
		$handler = $db->connect();

		$sql = 'SELECT * FROM ' . self::table_name();

		$sth = $handler->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

}

?>