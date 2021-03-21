<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends Model {

	function User_Model()
    {
        // Call the Model constructor for PHP4
        parent::Model();
    }

	function GetUserInfo($jyouiID, $authority)
    {
    	if(!empty($jyouiID))
    	{
    		$this->db->where('jyouiID', $jyouiID);
    	}
		else
		{
			$this->db->where('jyouiID', 999999);
		}

    	if(!empty($authority))
    	{
    		$this->db->where('authority', $authority);
    	}

		$this->db->orderby("authority");
		$this->db->orderby("username");

		$query = $this->db->get('users');

		return $query->result_array();
    }

    function GetUserJyoiInfo($id)
    {
    	if(!empty($id))
    	{
    		$this->db->where('id', $id);
    	}

    	$query = $this->db->get('users');

    	$user = $query->result_array();

    	return $user[0];
    }

	function GetUserListInfo()
    {
    	$sql = "";
		$sql = $sql . "SELECT user_id, username ";
		$sql = $sql . "FROM users ";
		$sql = $sql . "WHERE authority != 1 AND authority != 3 ";
		$sql = $sql . "ORDER BY user_id ";

		$query = $this->db->query($sql);

		return $query->result_array();
    }
}
