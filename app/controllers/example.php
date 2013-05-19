<?php
/**
 * Example controller
 *
 * The class name MUST be the same as the filename, but with the first letter capitalised.
 * This class deals with all pages and sub-pages at yoursite.com/example/
 */
class Example extends BaseController {
	
	/**
	 * Index page.
	 *
	 * Returns the default view
	 * Accessible at yoursite.com/example/
	 * 
	 * @return void
	 */
	public function index()
	{
		// The following commented lines load a model and execute a function from that model
		
		// $stuff = Model::load('example/stuff');
		// echo $stuff->do_stuff();

		View::load('feather/default');
	}

}