<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shukkin_Model extends Model {

	function Shukkin_Model()
    {
        // Call the Model constructor for PHP4
        parent::Model();
    }

	function GetShukkinListInfo($where)
    {
    	$sql = "";
		$sql = $sql . "SELECT ";
		$sql = $sql . "sk.user_id as user_id, sk.shukkin_jikan as shukkin_jikan, sk.taikin_jikan as taikin_jikan, ";
		$sql = $sql . "sk.kinmu_jikan as kinmu_jikan, sk.hiduke as hiduke, user.username as username ";
		$sql = $sql . "FROM shukkin as sk, users as user ";

		if($where['user_id'] != null && $where['user_id'] != '')
    	{
			$sql = $sql . "WHERE sk.user_id = '".$where['user_id']."' ";
			$sql = $sql . "AND sk.user_id = user.user_id ";
    	}
		else
		{
			$sql = $sql . "WHERE sk.user_id = user.user_id ";
		}

    	if($where['hiduke_from'] != null && $where['hiduke_from'] != '')
    	{
			$sql = $sql . "AND sk.hiduke >= '".$where['hiduke_from']."' ";
			$sql = $sql . "AND sk.hiduke <= '".$where['hiduke_to']."' ";
    	}

    	$sql = $sql . " ORDER BY shukkin_jikan DESC ";

		$sql = $sql . " LIMIT ".$where['offset']." , ".$where['limit'];

		//echo $sql;

		$query = $this->db->query($sql);

    	$kinmu_data = $query->result_array();

    	return $kinmu_data;
    }

	function SelectShukkinCount($where)
	{
		$sql = "";
		$sql = $sql . "SELECT ";
		$sql = $sql . "count(*) as row ";
		$sql = $sql . "FROM shukkin as sk, users as user ";

		if($where['user_id'] != null && $where['user_id'] != '')
    	{
			$sql = $sql . "WHERE sk.user_id = '".$where['user_id']."' ";
			$sql = $sql . "AND sk.user_id = user.user_id ";
    	}
		else
		{
			$sql = $sql . "WHERE sk.user_id = user.user_id ";
		}

		if($where['hiduke_from'] != null && $where['hiduke_from'] != '')
    	{
			$sql = $sql . "AND sk.hiduke >= '".$where['hiduke_from']."' ";
			$sql = $sql . "AND sk.hiduke <= '".$where['hiduke_to']."' ";
    	}

    	//$sql = $sql . " ORDER BY shukkin_jikan DESC ";

		//$sql = $sql . " LIMIT ".$where['offset']." , ".$where['limit'];

		$query = $this->db->query($sql);

		$total_rows = $query->result_array();

		if($total_rows != null)
		{
			return $total_rows[0]['row'];
		}
		else
		{
			return 0;
		}
	}

    function GetShukkinInfo($user_id)
    {
    	$this->db->where('user_id', $user_id);

    	$this->db->where('hiduke', date('Y/m/d'));

    	$query = $this->db->get('shukkin');

    	$kinmu_data = $query->result_array();

    	if($kinmu_data != null)
    	{
    		return $kinmu_data[0];
    	}
    	else
    	{
    		return null;
    	}
    }

	function InsertShukkin($user_id)
	{
		try
		{
			//kinmu_dataの新規
			$kinmu_data = array(
	                'user_id' => $user_id,
	                'shukkin_jikan' => date('Y/m/d H:i:s'),
	                'taikin_jikan' => '',
	                'kinmu_jikan' => '',
					'hiduke' => date('Y/m/d H:i:s')
			);

			$this->db->insert('shukkin', $kinmu_data);

			return true;
		}
		catch (Exception $ex)
		{
			throw $ex->getMessage();
		}
	}

	function UpdateShukkin($id, $shukkin_jikan)
	{
		$this->db->where('id', $id);

		$date1 = strtotime(date('Y/m/d H:i:s')) - strtotime($shukkin_jikan);

		$kinmu_data = array('taikin_jikan' => date('Y/m/d H:i:s'), 'kinmu_jikan' => $date1 / 60);

		$this->db->update('shukkin', $kinmu_data);
	}
}
