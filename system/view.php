<?php

class View {
	
	public static function load($file)
	{
		$path = '../app/views/'.$file.'.php';

		if ( ! file_exists($path) ) {
			throw new Exception('View '.$file.' not found');
		} else {
			require_once $path;
		}
	}

}