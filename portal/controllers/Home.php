<?php
use kllmp\Http\REST_Controller;

class Home extends REST_Controller {
	public function Index()	{
		$this->load->View('home');
	}

	public function Info(){
		phpinfo();
	}
}
