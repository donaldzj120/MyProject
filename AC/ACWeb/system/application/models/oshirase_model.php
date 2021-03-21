<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oshirase_Model extends Model {

	function Oshirase_Model()
    {
        // Call the Model constructor for PHP4
        parent::Model();
    }

	function GetOshiraseListInfo()
    {
		$this->db->orderby("Create_Date");

		$query = $this->db->get('oshirase');

		return $query->result_array();
    }

    function GetOshiraseInfo($id)
    {
    	if(!empty($id))
    	{
    		$this->db->where('ID', $id);
    	}

    	$query = $this->db->get('oshirase');

    	$oshirase = $query->result_array();

    	return $oshirase[0];
    }
}
