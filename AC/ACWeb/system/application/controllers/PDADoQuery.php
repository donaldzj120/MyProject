<?php
class PDADoQuery extends Controller {

	function PDADoQuery()
	{
		parent::Controller();
	}

	function index()
	{
		$query = $_REQUEST['DB_Query'];

		$sth = mysql_query($query);

		/*
		if (mysql_errno()) {
		    header("HTTP/1.1 500 Internal Server Error");
		    echo "DataBase Error!\n";
		    echo $query."\n";
		    echo mysql_error();
		}
		else
		{
		*/
		    $rows = array();
		    while($r = mysql_fetch_assoc($sth)) {
		        $rows[] = $r;
		        //echo $r."<br>";
		    }
		    print json_encode($rows);
		//}
	}
}