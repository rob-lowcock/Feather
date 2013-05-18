<?php

class Example extends BaseController {
	
	public function index()
	{
		$stuff = Model::load('example/stuff');

		echo $stuff->do_stuff();

		//View::load('feather/default');
	}

}