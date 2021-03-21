<?php
class PDADoUpdate extends Controller {

	function PDADoUpdate()
	{
		parent::Controller();
	}

	function index()
	{
		$query = $_REQUEST['DB_Query'];

		mysql_query($query);

		if (mysql_error()) {
		    header("HTTP/1.1 500 Internal Server Error");
		    echo "DataBase Error!\n";
		    echo $query."\n";
		    echo mysql_error();
		}
		else
		{
			echo "OK";
		}
	}
}