<?php

class Mgr_kakunin extends Controller {	function Mgr_kakunin()	{		parent::Controller();	}
	function index()
	{

		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		//ログインの判断
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');

		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		//状態の設定
		$data['new'] = anchor('mgr_kakunin/1', "<img src='".$data['base']."images/haisou_r1_c1.jpg' width='65' height='25' border='0' />");
		$data['doing'] = anchor('mgr_kakunin/2', "<img src='".$data['base']."images/haisou_r1_c3.jpg' width='65' height='25' border='0' />");
		$data['over'] = anchor('mgr_kakunin/3', "<img src='".$data['base']."images/haisou_r1_c5.jpg' width='65' height='25' border='0' />");
		$data['all'] = anchor('mgr_kakunin', "<img src='".$data['base']."images/haisou_r1_c7.jpg' width='65' height='25' border='0' />");		$data['downurl'] = $this->config->item('base_url').$this->config->item('pdf');
		//$data['del'] = anchor('mgr_kakunin/4', '取消中');

		$data['statusText'] = $this->mylabels->statusText;
		$data['result_th'] = $this->mylabels->MgrMisTh;
		$mission_status = '';
		$data['pageindex'] = '';

		$data['post'] = array(
			'mission_id' => '',
			'mission_id2' => '',
			'mission_status' => ''
		);

		$where = array(
			'mission_id' =>'',
			'mission_id2' =>'',
			'mission_status' =>'',
			'fenpei_id' =>'',
			'limit' => 20,
			'offset' => 0,
		);

		$where['fenpei_id'] = $this->session->userdata('user_id');
		$url = $data['base'].'index.php/mgr_kakunin';

		if ($this->uri->segment(2) > 0)
		{			$url = $data['base'].'index.php/mgr_kakunin/'.$this->uri->segment(2);
			$where['mission_status'] = $this->uri->segment(2) - 1;

			$data['post']['mission_status'] = $this->uri->segment(2);
		}
		//display count per page		$per_page = $this->config->item('per_page');		//$offset = 0;		$segs = $this->uri->segment_array();		if(array_search("page",$segs) != false){			if(isset($segs[array_search("page",$segs)+1])){
				$where['offset'] = $segs[array_search("page",$segs)+1];				$config['uri_segment'] = array_search("page",$segs)+1;			}		}

		$data['result_td'] = $this->mission_model->SelectSagyo($where);
		//---------------page------------------
		$total_rows = $this->mission_model->SelectSagyoCount($where);
		$this->load->library('pagination');		$config['base_url'] = $url.'/page/';		$config['total_rows'] = $total_rows;		$config['per_page'] = $per_page;		$config['num_links'] = 10;		$this->pagination->initialize($config);		$data['pagination'] = $this->pagination->create_links();		//---------------------------------

		$data['authority'] = $authority;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_kakunin_view',$data);
		$this->load->view('footer_view',$data);
	}
	function searchid(){

		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');

		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['statusText'] = $this->mylabels->statusText;
		$data['cancelmismsg'] = $this->mylabels->cancelmismsg;
		$data['downurl'] = $this->config->item('base_url').$this->config->item('pdf');

		$data['new'] = anchor('mgr_kakunin/1', "<img src='".$data['base']."images/haisou_r1_c1.jpg' width='65' height='25' border='0' />");
		$data['doing'] = anchor('mgr_kakunin/2', "<img src='".$data['base']."images/haisou_r1_c3.jpg' width='65' height='25' border='0' />");
		$data['over'] = anchor('mgr_kakunin/3', "<img src='".$data['base']."images/haisou_r1_c5.jpg' width='65' height='25' border='0' />");
		$data['all'] = anchor('mgr_kakunin', "<img src='".$data['base']."images/haisou_r1_c7.jpg' width='65' height='25' border='0' />");

		$mission_status = '';

		$data['pageindex'] = '';

		$data['post'] = $_POST;

		$where = array(
			'mission_id' =>'',
			'mission_id2' =>'',
			'mission_status' =>'',
			'fenpei_id' =>'',
			'limit' => 20,
			'offset' => 0,
		);

		//任務ＩＤ１
		$where['mission_id'] = $_POST['mission_id'];
		//任務ＩＤ２
		$where['mission_id2'] = $_POST['mission_id2'];

		if(!empty($_POST['mission_status']))
		{
			$where['mission_status'] = $_POST['mission_status'] - 1;
		}

		$where['fenpei_id'] = $this->session->userdata('user_id');

		//display count per page
		$per_page = $this->config->item('per_page');
		//$offset = 0;
		$segs = $this->uri->segment_array();
		if(array_search("page",$segs) != false){
			if(isset($segs[array_search("page",$segs)+1])){
				$where['offset'] = $segs[array_search("page",$segs)+1];
				$config['uri_segment'] = array_search("page",$segs)+1;
			}
		}

		//$sql = $this->searchsagyo($where, $per_page, $offset);

		//$query = $this->db->query($sql);

		$data['result_th'] = $this->mylabels->MgrMisTh;

		$data['result_td'] = $this->mission_model->SelectSagyo($where);
		//---------------page------------------
		$url = $data['base'].'index.php/mgr_kakunin';

		$total_rows = $this->mission_model->SelectSagyoCount($where);

		$this->load->library('pagination');

		$config['base_url'] = $url.'/page/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['num_links'] = 10;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//---------------------------------

		$data['authority'] = $authority;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_kakunin_view',$data);
		$this->load->view('footer_view',$data);
	}
}