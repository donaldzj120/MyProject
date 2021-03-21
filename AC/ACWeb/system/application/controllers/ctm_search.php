<?php
class Ctm_search extends Controller {
	function index()
	{
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['statusText'] = $this->mylabels->statusText;
		$data['cancelmismsg'] = $this->mylabels->cancelmismsg;
		if(empty($_POST)){
			$data['post'] = array(
				'mission_id' => '',
				'mission_id2' => '',
				'search_date' => date('Y-m-d'),
				'search_date2' => date('Y-m-d'),
				'mission_status' => '',
				'datetime' => ''
				);
				$data['showtb'] = FALSE;
		}else{
			$data['post'] = $_POST;
			$where = array(
				'from_id' =>'',
				'del_status' =>'',
				'mission_id' =>'',
				'mission_id2' =>'',
				'search_date' =>'',
				'search_date2' =>'',
				'mission_status' =>'',
				'datetime' =>'',
				'order' =>''
			);
			echo '<pre>';
			print_r($_POST);
			echo '<pre>';
			$where['from_id'] = $this->session->userdata('user_id');
			$where['mission_id'] = $_POST['mission_id'];
			$where['mission_id2'] = $_POST['mission_id2'];
			$where['search_date'] = $_POST['search_date'];
			list($year, $month, $day ) = explode ('-', $where['search_date']);
			$where['search_date'] = date ('Y-m-d H:i:s', mktime (0,0,0,$month,$day,$year));
			$where['search_date2'] = $_POST['search_date2'];
			list($year, $month, $day ) = explode ('-', $where['search_date2']);
			$where['search_date2'] = date ('Y-m-d H:i:s', mktime (23,59,59,$month,$day,$year));
			$where['mission_status'] = $_POST['mission_status'];
			$where['datetime'] = $_POST['datetime'];
			switch($where['mission_status']){
				case 0:$where['order'] = "recv_date";break;
				case 1:$where['order'] = "fenpei_date";break;
				case 2:$where['order'] = "over_date";break;
				case 3:$where['order'] = "recv_date";$where['del_status'] = 1;break;
				default:$where['order'] = "recv_date";
			}
			echo $sql = $this->SelectSagyo($where);
			$query = $this->db->query($sql);
			$data['result_th'] = $this->mylabels->CtmMisTh;
			$data['result_td'] = $query->result_array();
			$data['showtb'] = TRUE;
		}
		$this->load->view('header_view',$data);
		$this->load->view('ctm_menu_view',$data);
		$this->load->view('ctm_search_view',$data);
		$this->load->view('footer_view',$data);
	}

	function SelectSagyo($where){
		$sql = "";
		$sql = $sql . "SELECT ";
		$sql = $sql . "m.id as mid, m.mission_id as mid1, m.mission_id2 as mid2, m.mission_status, m.del_status, m.from_id as mfid, ";
		$sql = $sql . "s.id as id, s.sagyo_id1 as sid1, s.sagyo_id2 as sid2, ";
		$sql = $sql . "s.ka_name1 as name1, s.ka_name2 as name2, ";
		$sql = $sql . "s.ka_add1 as add1, s.ka_add2 as add2, s.ka_add3 as add3, ";
		$sql = $sql . "s.ka_tel as tel, ";
		$sql = $sql . "s.todoke_name1 as tname1, s.todoke_name2 as tname2, ";
		$sql = $sql . "s.todoke_add1 as tadd1, s.todoke_add2 as tadd2, s.todoke_add3 as tadd3, ";
		$sql = $sql . "s.todoke_tel as ttel ";
		$sql = $sql . "FROM mission as m, sagyo as s ";
		$sql = $sql . "WHERE m.mission_id = s.sagyo_id1 AND m.mission_id2 = s.sagyo_id2 ";
		$sql = $sql . "AND m.mission_id LIKE '".$where['mission_id']."%' ";
		$sql = $sql . "AND m.mission_id2 LIKE '".$where['mission_id2']."%' ";
		$sql = $sql . "AND m.from_id = '".$where['from_id']."' AND s.from_id = '".$where['from_id']."'";
		if(!empty($where['datetime']))
			$sql = $sql . " AND m.".$where['order']." >= '".$where['search_date']."' AND m.".$where['order']." <= '".$where['search_date2']."'";
		if(!empty($where['del_status']))
			$sql = $sql . " AND m.del_status = ".$where['del_status'];
		if(!empty($where['mission_status'])){
			$where['mission_status'] = $where['mission_status'] - 1;
			$sql = $sql . " AND m.mission_status = ".$where['mission_status'];
		}
		if(!empty($where['order']))
			$sql = $sql . " ORDER BY ".$where['order'];

		return $sql;
	}
}