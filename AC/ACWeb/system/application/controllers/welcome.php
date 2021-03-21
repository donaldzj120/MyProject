<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		redirect('login');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */