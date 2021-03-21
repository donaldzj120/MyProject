<?php

class Mgr_search extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');		$data['authority'] = $authority;
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');		$this->load->library('mylabels');		$data['header'] = $this->mylabels->Header;		$data['base'] = $this->config->item('base_url');		$data['css'] = $this->config->item('css');		$data['LogoutLink'] = anchor('login/logout');		$data['downurl'] = $this->config->item('base_url').$this->config->item('pdf');		$data['upurl'] = $this->config->item('base_url').$this->config->item('uploads');		$data['siryo'] = $this->config->item('base_url').$this->config->item('siryo');		$data['deletemismsg'] = $this->mylabels->deletemismsg;		$data['cancelmismsg'] = $this->mylabels->cancelmismsg;
		if(empty($_POST)){
			$mission_id = '';
			$mission_id2 = '';
			$mission_status = '';
			$search_date = date('Y-m-d');
			$search_date2 = date('Y-m-d');
			$data['post'] = array(
				'mission_id' => $mission_id,
				'mission_id2' => $mission_id2,
				'search_date' => $search_date,
				'search_date2' => $search_date2,
				'mission_status' => $mission_status
			);
			$data['showtb'] = FALSE;
		}else{
			$mission_id = $_POST['mission_id'];
			$mission_id2 = $_POST['mission_id2'];
			$search_date = $_POST['search_date'];
			$search_date2 = $_POST['search_date2'];
			$mission_status = $_POST['mission_status'];
			$data['post'] = $_POST;

			$this->db->order_by("mission_status");
			switch($mission_status){
				case 0:$this->db->order_by("recv_date", "desc");break;
				case 1:$this->db->order_by("fenpei_date", "desc");break;
				case 2:$this->db->order_by("over_date", "desc");break;
			}

			$like = array(
			'mission_id' => $mission_id,
			'mission_id2' => $mission_id2
			);
			$this->db->like($like,'after');

			list($month, $day, $year) = explode ('-', $search_date2);
			$search_date2 = date("Y-m-d H:i:s", mktime(23,59,59,$month,$day,$year));

			switch($mission_status){
				case '':
					break;
				case '1':
					$where = array(
						'recv_date >' => $search_date,
						'recv_date <' => $search_date2,
						'mission_status' => $mission_status-1
					);
					$this->db->where($where);
					break;
				case '2':
					$where = array(
						'fenpei_date >' => $search_date,
						'fenpei_date <' => $search_date2,
						'mission_status' => $mission_status-1
					);
					$this->db->where($where);
					break;
				case '3':
					$where = array(
						'over_date >' => $search_date,
						'over_date <' => $search_date2,
						'mission_status' => $mission_status-1
					);
					$this->db->where($where);
					break;
			}
			$query = $this->db->get('mission');
			$data['result_th'] = $this->mylabels->MgrDtbMisThLabels;
			$data['result_td'] = $query->result_array();
			$data['statusText'] = $this->mylabels->statusText;
			$data['showtb'] = TRUE;
		}
		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_search_view',$data);
		$this->load->view('footer_view',$data);
	}
}