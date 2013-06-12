<?php
/**
 * Model class
 * 
 * Provide functionality for loading models
 */
class Model
{
	/**
	 * load a model
	 * 
	 * @param  string $file The model / file name
	 * @return object       The model
	 */
	public static function load($file)
	{
		$path = '../app/models/' . $file . '.php';

		if (!file_exists($path)) {
			throw new Exception('Model ' . $file . ' not found');
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