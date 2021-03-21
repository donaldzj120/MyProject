<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mission_Model extends Model {

	function Mission_Model()
    {
        // Call the Model constructor for PHP4
        parent::Model();
    }

    /**
     *
     * 任務画面で、リストの取得
     * @param unknown_type $where
     */
	function GetMissionInfo($where)
    {
    	$authority = $this->session->userdata('authority');

    	$sql = "";
		$sql = $sql . "SELECT  * ";
		$sql = $sql . "FROM mission ";
		$sql = $sql . "WHERE id != 0 ";

		if($where['mission_status'] === 0 || $where['mission_status'] === 1 || $where['mission_status'] === 2)
		{
			$sql = $sql . " AND mission_status = '".$where['mission_status']."'";
		}
		//管理者の場合
    	if($authority == 1 || $authority == 2)
    	{
    		$sql = $sql . " AND (fenpei_id = '".$this->session->userdata('user_id')."' OR fenpei_id = '') ";
		}
		else
		{
			$sql = $sql . " AND fenpei_id = '".$this->session->userdata('user_id')."'";
		}
		//任務ＩＤ１
		if(!empty($where['mission_id']))
		{
			$sql = $sql . " AND mission_id like '%".$where['mission_id']."%'";
		}
		//任務ＩＤ２
    	if(!empty($where['mission_id2']))
		{
			$sql = $sql . " AND mission_id2 like '%".$where['mission_id2']."%'";
		}
		//ORDER BY 未手配の場合
		if($where['mission_status'] === 0)
		{
			$sql = $sql . " ORDER BY recv_date DESC ";
		}
		//ORDER BY 手配済みの場合
		else if($where['mission_status'] === 1)
		{
			$sql = $sql . " ORDER BY fenpei_date DESC ";
		}
		//ORDER BY 配送完了の場合
		else if($where['mission_status'] === 2)
		{
			$sql = $sql . " ORDER BY over_date DESC ";
		}
		else
		{
			$sql = $sql . " ORDER BY mission_status ASC, recv_date DESC ";
		}

		$sql = $sql . " LIMIT ".$where['offset']." , ".$where['limit'];

		//echo $sql;
		$query = $this->db->query($sql);

		return $query->result_array();
    }

    /**
     *
     * 任務画面でデータ件数の取得
     * @param unknown_type $where
     */
	function GetMissionCount($where)
    {
    	$authority = $this->session->userdata('authority');

    	$sql = "";
		$sql = $sql . "SELECT  count(*) row ";
		$sql = $sql . "FROM mission ";
		$sql = $sql . "WHERE id != 0 ";

		if($where['mission_status'] === 0 || $where['mission_status'] === 1 || $where['mission_status'] === 2)
		{
			$sql = $sql . " AND mission_status = '".$where['mission_status']."'";
		}

    	if($authority == 1)
    	{
    		$sql = $sql . " AND (fenpei_id = '".$this->session->userdata('user_id')."' OR fenpei_id = '') ";
		}
		else
		{
			$sql = $sql . " AND fenpei_id = '".$this->session->userdata('user_id')."'";
		}

    	//任務ＩＤ１
		if(!empty($where['mission_id']))
		{
			$sql = $sql . " AND mission_id like '%".$where['mission_id']."%'";
		}
		//任務ＩＤ２
    	if(!empty($where['mission_id2']))
		{
			$sql = $sql . " AND mission_id2 like '%".$where['mission_id2']."%'";
		}

		$query = $this->db->query($sql);

		$total_rows = $query->result_array();

		return $total_rows[0]['row'];
    }

    /**
     * ＩＤによって、任務情報を取得する
     * @param unknown_type $id
     */
	function GetMissionInfoById($id)
    {
		$this->db->where('id', $id);

		$query = $this->db->get('mission');

		$mission = $query->result_array();

		return $mission[0];
    }

    /**
     * 配送状況確認画面で、データの取得
     * Enter description here ...
     * @param unknown_type $where
     * @param unknown_type $limit
     * @param unknown_type $offset
     */
	function SelectSagyo($where)
	{
		$authority = $this->session->userdata('authority');

		$sql = "";
		$sql = $sql . "SELECT ";
		$sql = $sql . "m.id as mid, m.mission_id as mid1, m.mission_id2 as mid2, m.mission_status, m.del_status, m.filename as filename, m.from_id as mfid, m.zhixing_id as zhixing_id, ";
		$sql = $sql . "s.id as id, s.sagyo_id1 as sid1, s.sagyo_id2 as sid2, m.kaisha_id as kaisha_id, ";
		$sql = $sql . "s.ka_name1 as name1, s.ka_name2 as name2, ";
		$sql = $sql . "s.ka_add1 as add1, s.ka_add2 as add2, s.ka_add3 as add3, ";
		$sql = $sql . "s.ka_tel as tel, ";
		$sql = $sql . "s.todoke_name1 as tname1, s.todoke_name2 as tname2, ";
		$sql = $sql . "s.todoke_add1 as tadd1, s.todoke_add2 as tadd2, s.todoke_add3 as tadd3, ";
		$sql = $sql . "s.todoke_tel as ttel, s.update_date as update_date ";
		$sql = $sql . "FROM mission as m left join sagyo as s on m.mission_id = s.sagyo_id1 AND m.mission_id2 = s.sagyo_id2 AND m.from_id = s.from_id ";
		$sql = $sql . "WHERE m.id != 0 AND m.mission_id2 != 'FAX'";
		//$sql = $sql . "AND m.from_id = '".$where['from_id']."' AND s.from_id = '".$where['from_id']."'";
		//if(!empty($where['del_status']))
			//$sql = $sql . " AND m.del_status = ".$where['del_status'];
		//顧客の場合、adm_statusが1に設定される
		if(!empty($where['adm_status']))
		{
			$sql = $sql . " AND m.adm_status = ".$where['adm_status'];
		}
		//管理者の場合
    	if($authority == 1)
    	{
    		$sql = $sql . " AND (fenpei_id = '".$where['fenpei_id']."' OR fenpei_id = '') ";
		}
		else if($authority == 2 || $authority == 4)
		{
			$sql = $sql . " AND fenpei_id = '".$where['fenpei_id']."'";
		}
		//任務ＩＤ１
		if(!empty($where['mission_id']))
		{
			$sql = $sql . "AND m.mission_id LIKE '%".$where['mission_id']."%' ";
		}
		//任務ＩＤ２
		if(!empty($where['mission_id2']))
		{
			$sql = $sql . "AND m.mission_id2 LIKE '%".$where['mission_id2']."%' ";
		}
		//状態
		if($where['mission_status'] === 0 || $where['mission_status'] === 1 || $where['mission_status'] === 2){
			//配送完了の場合、配送完了と削除のデータが表示されます。
			if($where['mission_status'] == 2){
				$sql = $sql . " AND m.mission_status >= ".$where['mission_status'];
			}else{
				$sql = $sql . " AND m.mission_status = ".$where['mission_status'];
			}
		}
		//ORDER BY 未手配の場合
		if($where['mission_status'] === 0)
		{
			$sql = $sql . " ORDER BY recv_date DESC ";
		}
		//ORDER BY 手配済みの場合
		else if($where['mission_status'] === 1)
		{
			$sql = $sql . " ORDER BY fenpei_date DESC ";
		}
		//ORDER BY 配送完了の場合
		else if($where['mission_status'] === 2)
		{
			$sql = $sql . " ORDER BY over_date DESC ";
		}
		else
		{
			$sql = $sql . " ORDER BY mission_status ASC, recv_date DESC ";
		}

		$sql = $sql . " LIMIT ".$where['offset']." , ".$where['limit'];
		//echo $sql;
		$query = $this->db->query($sql);

		return $query->result_array();
	}


	function SelectSagyoCount($where)
	{
		$authority = $this->session->userdata('authority');

		$sql = "";
		$sql = $sql . "SELECT ";
		$sql = $sql . "count(*) as row ";
		$sql = $sql . "FROM mission as m left join sagyo as s on m.mission_id = s.sagyo_id1 AND m.mission_id2 = s.sagyo_id2 AND m.from_id = s.from_id ";
		$sql = $sql . "WHERE m.id != 0 AND  m.mission_id2 != 'FAX'";
		//$sql = $sql . "AND m.from_id = '".$where['from_id']."' AND s.from_id = '".$where['from_id']."'";
		//if(!empty($where['del_status']))
			//$sql = $sql . " AND m.del_status = ".$where['del_status'];
		//顧客の場合、adm_statusが1に設定される
		if(!empty($where['adm_status']))
		{
			$sql = $sql . " AND m.adm_status = ".$where['adm_status'];
		}
		//管理者の場合
    	if($authority == 1)
    	{
    		$sql = $sql . " AND (fenpei_id = '".$where['fenpei_id']."' OR fenpei_id = '') ";
		}
		else if($authority == 2 || $authority == 4)
		{
			$sql = $sql . " AND fenpei_id = '".$where['fenpei_id']."'";
		}
		//任務ＩＤ１
		if(!empty($where['mission_id']))
		{
			$sql = $sql . "AND m.mission_id LIKE '%".$where['mission_id']."%' ";
		}
		//任務ＩＤ２
		if(!empty($where['mission_id2']))
		{
			$sql = $sql . "AND m.mission_id2 LIKE '%".$where['mission_id2']."%' ";
		}
		//状態
		if($where['mission_status'] === 0 || $where['mission_status'] === 1 || $where['mission_status'] === 2){
			//配送完了の場合、配送完了と削除のデータが表示されます。
			if($where['mission_status'] == 2){
				$sql = $sql . " AND m.mission_status >= ".$where['mission_status'];
			}else{
				$sql = $sql . " AND m.mission_status = ".$where['mission_status'];
			}
		}

		$query = $this->db->query($sql);

		$total_rows = $query->result_array();

		return $total_rows[0]['row'];
	}

    /**
     * 下位会社に任務を分配する場合、新しい任務を作る
     * Enter description here ...
     * @param unknown_type $id
     * @param unknown_type $kaishaId
     */
	function InsertMission($id, $kaishaId)
	{
		try
		{
			$old = $this->GetMissionInfoById($id);

			//messionの新規
			$mission_data = array(
	                'mission_id' => $old['mission_id'],
	                'mission_id2' => $old['mission_id2'],
	                'mission_status' => 0,
	                'recv_date' => date('Y/m/d H:i:s'),
					'siryo' => $old['filename'],
					'from_id' => $old['from_id'],
					'fenpei_id' => $kaishaId,
					'kaisha_id' => '',
					'adm_status' => 2,
					'siryo' => $old['siryo'],
					'memo' => $old['memo']
			);

			$this->db->insert('mission', $mission_data);

			return true;
		}
		catch (Exception $ex)
		{
			throw $ex->getMessage();
		}
	}

	function GetHaishaHyou()
	{
		$this->load->helper('date');
		$datestring = "%Y-%m-%d";
		$time = time();
		$hiduke = mdate($datestring, $time);

		$sql = "";
		//$sql = $sql."SELECT ms.mission_id as sagyo_id1, ms.mission_id2 as sagyo_id2, us.username as username, ";
		//$sql = $sql."ms.mission_status as mission_status, ms.fenpei_date as fenpei_date, ms.over_date as over_date, sg.ka_add1 as ka_add1, sg.ka_add2 as ka_add2, sg.todoke_add1 as todoke_add1, sg.todoke_add1 as todoke_add2, ";
		//$sql = $sql."sg.sagyo_date as sagyo_date, sg.sagyo_time as sagyo_time, sg.hiccyaku1 as hiccyaku1, sg.sonota as sonota ";
		//$sql = $sql."FROM mission as ms LEFT JOIN sagyo AS sg ON sg.sagyo_id1 = ms.mission_id AND sg.sagyo_id2 = ms.mission_id2, users as us ";
		//$sql = $sql."WHERE ";
		//$sql = $sql." ms.zhixing_id = us.user_id AND ms.fenpei_id = '".$this->session->userdata('user_id')."' AND substr(ms.fenpei_date, 1, 10) = '$hiduke'";

		$sql = $sql."SELECT us.username as username, ";
		$sql = $sql."group_concat(SUBSTR(ms.fenpei_date, 12, 5)) as fenpei_date ";
		//$sql = $sql."sg.sagyo_date as sagyo_date, sg.sagyo_time as sagyo_time, sg.hiccyaku1 as hiccyaku1, sg.sonota as sonota ";
		$sql = $sql."FROM mission as ms , users as us ";
		$sql = $sql."WHERE ";
		$sql = $sql." ms.zhixing_id = us.user_id AND ms.fenpei_id = '".$this->session->userdata('user_id')."' AND substr(ms.fenpei_date, 1, 10) = '$hiduke'";
		$sql = $sql."group by username order by username";
//echo $sql;
		$query = $this->db->query($sql);

		return  $query->result_array();
	}

	function GetDoraibaMission($where, $order)
	{
		if(!empty($where))
		{
			if(!empty($where['mission_status']))
			{
				$this->db->where('mission_status', $where['mission_status']);
			}

			if(!empty($where['zhixing_id']))
			{
				$this->db->where('zhixing_id', $where['zhixing_id']);
			}
		}

		if($order == 1)
		{
			$this->db->order_by("fenpei_date", "desc");
			$this->db->order_by("mission_status", "desc");
		}
		else if($order == 2)
		{
			$this->db->order_by("over_date", "desc");
			$this->db->order_by("mission_status", "desc");
		}
		else if($order == 3)
		{
			$this->db->order_by("recv_date", "desc");
			$this->db->order_by("mission_status", "desc");
		}

		$query = $this->db->get('mission');

		return $query->result_array();
	}

	function UpdateMission($updata, $id)
	{
		$this->db->where('id', $id);

		$this->db->update('mission', $updata);
	}
	/**
	 * 任務ＩＤ１とＩＤ２によって、任務状態を更新する
	 * @param unknown_type $mission_id1
	 * @param unknown_type $mission_id2
	 */
	function  UpdateMissionStatud($mission_id1, $mission_id2)
	{
		$this->db->where('mission_id', $mission_id1);

		$this->db->where('mission_id2', $mission_id2);

		$data = array('mission_status' => 2, 'over_date' => date('Y/m/d H:i:s'));

		$this->db->update('mission', $data);
	}
}
