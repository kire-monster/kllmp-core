<?php


use kllmp\Controllers\kllmp_Controller;

class Home extends kllmp_Controller
{
	public function index()
	{
		self::vista("home.php");
	}
}
