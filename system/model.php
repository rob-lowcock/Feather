<?php

class Model {
	
	public static function load($file)
	{
		$path = '../app/models/'.$file.'.php';

		if ( ! file_exists($path) ) {
			throw new Exception('Model '.$file.' not found');
		} else {
			require_once $path;

			$slash_pos = strrpos($file, '/');

			if ($slash_pos === FALSE) {
				$class = $file;
			} else {
				$class = substr($file, $slash_pos + 1);
			}

			return new $class;
		}
	}

}

?>