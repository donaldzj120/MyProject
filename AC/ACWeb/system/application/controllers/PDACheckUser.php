<?php
class PDACheckUser extends Controller {

	function PDACheckUser()
	{
		parent::Controller();
	}

	function index()
	{
		$user = $_REQUEST['user'];

		$password = $_REQUEST['password'];

		$ps = $this->encrypt->encode($password);

		$query = $this->db->get_where('users', array('user_id' => $user, 'authority' => '5'));

		//$query = "select * from users where user_id = '".$_REQUEST['user']."' and password = '".$ps."'";
		//$sth = mysql_query($query);

		$check = "NG";

		if ($query->num_rows() > 0)
		{
			$check = "NG";
		    //$rows = array();
			if($password ==  $this->encrypt->decode($query->row()->password)){
		        $check = "OK";
			}
		}

		print $check;
/*
		if (mysql_errno()) {
		    header("HTTP/1.1 500 Internal Server Error");
		    echo $query.'\n';
		    echo mysql_error();
		}
		else
		{
			$check = "NG";
		    $rows = array();
		    while($r = mysql_fetch_assoc($sth)) {
		        $rows[] = $r;
		        $check = "OK";
		        //echo $r."<br>";
		    }
	    	//print json_encode($rows);
	    	print $check;
		}
		*/
	}
}