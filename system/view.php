<?php

class View
{
	/**
	 * load a view
	 * @param  string 	$file 	the filename
	 * @param  mixed 	$data 	any data that should be loaded in
	 * @return void
	 */
	public static function load($file, $data = NULL)
	{
		$path = '../app/views/' . $file . '.php';

		if (!file_exists($path)) {
			throw new Exception('View ' . $file . ' not found');
		} else {

			// If an array of data is passed to the view, use variable variables to set each element as a variable for the view.
			if (is_array($data)) {
				foreach ($data as $k => $v) {
					$$k = $v;
				}
			}

			require_once $path;
		}
	}

}