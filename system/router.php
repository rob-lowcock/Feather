<?php

class Router {

	public static function base_url()
	{
		$structure = substr($_SERVER['PHP_SELF'], 0, -9);

		return 'http://'.$_SERVER['HTTP_HOST'].'/'.$structure;
	}

	/**
	 * list_segments
	 *
	 * Returns a list of segments according to the contents of the URI
	 * 
	 * @return array
	 */
	protected function list_segments()
	{
		$base_length = strlen($_SERVER['PHP_SELF']) - 9;	// Get the length of the uri (e.g. /feather/public)
															// We subtract 9 as that's the length of 'index.php'
		$request = $_SERVER['REQUEST_URI'];
		$segment_string = substr($request, $base_length);	// Get the main segments

		if ($segment_string)
			return explode('/', $segment_string);
	}
	
	/**
	 * segment
	 *
	 * Returns the contents of a particular segments.
	 * Returns FALSE if segment doesn't exist or there are no segments
	 * 
	 * @param  int		$number		The number of the segment
	 * @return string
	 */
	public static function segment($number = null)
	{
		if ( ! is_int($number) ) {
			throw new Exception("Segment number not an integer");
		}

		$segments = self::list_segments();

		if ( isset($segments[$number - 1]) )
			return $segments[$number - 1];
		else
			return FALSE;
	}

	/**
	 * get_controller
	 *
	 * Returns the controller and function requested by the user according to the segments
	 * 
	 * @return object
	 */
	public static function get_controller()
	{
		// In this instance we'll just get all the segments and do the array ourselves.
		// It stops us having to make multiple calls to the segment function
		 
		$segments = self::list_segments();

		if (isset($segments[0])) {
			$file = $segments[0];
		} else {
			$file = lcfirst(DEFAULT_CONTROLLER);
		}

		$location = '../app/controllers/'.$file.'.php';
		
		if ( ! file_exists($location) ) {
			throw new Exception($file . " controller not found. TEMP MESSAGE: SHOULD 404");
			return FALSE;
		} else {
			require_once $location;
			$controller = ucfirst($file);

			$controller = new $controller;

			if (isset($segments[1])) {
				return $controller->$segments[1]();
			} else {
				return $controller->index();
			}
		}

		
	}

}

?>