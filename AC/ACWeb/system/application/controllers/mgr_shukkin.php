<?php

class Mgr_shukkin extends Controller {	function Mgr_shukkin()	{		parent::Controller();	}
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

		$data['statusText'] = $this->mylabels->statusText;
		//$data['result_th'] = $this->mylabels->MgrMisTh;
		//$mission_status = '';
		$data['pageindex'] = '';

		$where = array(
			'user_id' =>'',
			'hiduke_from' =>'',
			'hiduke_to' =>'',
			'limit' => 20,
			'offset' => 0,
		);

		if($authority != 1)
		{
			$where['user_id'] = $this->session->userdata('user_id');
		}
		//display count per page		$per_page = $this->config->item('per_page');		//$offset = 0;		$segs = $this->uri->segment_array();		if(array_search("page",$segs) != false){			if(isset($segs[array_search("page",$segs)+1])){
				$where['offset'] = $segs[array_search("page",$segs)+1];				$config['uri_segment'] = array_search("page",$segs)+1;			}		}

		$userlist = $this->user_model->GetUserListInfo();

		$data['userlist'] = array('0'=>'-');
		foreach ($userlist as $row)
		{
			$data['userlist'] = $data['userlist'] + array($row['user_id']=>$row['username']);
		}

		$data['result_td'] = $this->shukkin_model->GetShukkinListInfo($where);

		//---------------page------------------
		$total_rows = $this->shukkin_model->SelectShukkinCount($where);
		$this->load->library('pagination');
		$url = $data['base'].'index.php/mgr_shukkin';
		$config['base_url'] = $url.'/page/';		$config['total_rows'] = $total_rows;		$config['per_page'] = $per_page;		$config['num_links'] = 10;		$this->pagination->initialize($config);		$data['pagination'] = $this->pagination->create_links();		//---------------------------------

		//データの取得
		if($authority != 1)
		{
			$kinmu_data = $this->shukkin_model->GetShukkinInfo($where['user_id']);

			if($kinmu_data != NULL && $kinmu_data['id'] != '')
			{
				if($kinmu_data['shukkin_jikan'] != '' && $kinmu_data['shukkin_jikan'] != '0000-00-00 00:00:00')
				{
					$data['shukkin_jikan'] = substr($kinmu_data['shukkin_jikan'], 10, 9);
				}
				else
				{
					$data['shukkin_jikan'] = '';
				}
				if($kinmu_data['taikin_jikan'] != '' && $kinmu_data['taikin_jikan'] != '0000-00-00 00:00:00')
				{
					$data['taikin_jikan'] = substr($kinmu_data['taikin_jikan'], 10, 9);
				}
				else
				{
					$data['taikin_jikan'] = '';
				}

				$data['kinmu_id'] = $kinmu_data['id'];
			}
		}
		else
		{
			$data['shukkin_jikan'] = '';
			$data['taikin_jikan'] = '';
			$data['kinmu_id'] = '';
		}

		$data['authority'] = $authority;

		$this->load->view('header_view', $data);
		$this->load->view('mgr_menu_view', $data);
		$this->load->view('mgr_shukkin_view', $data);
		$this->load->view('footer_view', $data);
	}

	function shukkin()
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

		$jikan = date('Y/m/d H:i:s');

		$user_id = $this->session->userdata('user_id');

		//データの取得
		$kinmu_data = $this->shukkin_model->GetShukkinInfo($user_id);

		if($kinmu_data == null || $kinmu_data['id'] == '')
		{
			$this->shukkin_model->InsertShukkin($user_id);
		}

		//データの取得
		$kinmu_data = $this->shukkin_model->GetShukkinInfo($user_id);

		$data['shukkin_jikan'] = substr($kinmu_data['shukkin_jikan'], 10, 9);

		$data['pageindex'] = '';

		$where = array(
			'user_id' =>'',
			'hiduke_from' =>'',
			'hiduke_to' =>'',
			'limit' => 20,
			'offset' => 0,
		);

		$where['user_id'] = $this->session->userdata('user_id');

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

		$userlist = $this->user_model->GetUserListInfo();

		$data['userlist'] = array('0'=>'-');
		foreach ($userlist as $row)
		{
			$data['userlist'] = $data['userlist'] + array($row['user_id']=>$row['username']);
		}

		$data['result_td'] = $this->shukkin_model->GetShukkinListInfo($where);

		//---------------page------------------
		$total_rows = $this->shukkin_model->SelectShukkinCount($where);

		$this->load->library('pagination');

		$url = $data['base'].'index.php/mgr_shukkin';

		$config['base_url'] = $url.'/page/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['num_links'] = 10;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//---------------------------------

		$data['taikin_jikan'] = '';
		$data['kinmu_id'] = $kinmu_data['id'];
		$data['authority'] = $authority;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_shukkin_view',$data);
		$this->load->view('footer_view',$data);
	}

	function taikin()
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

		$user_id = $this->session->userdata('user_id');

		//データの取得
		$kinmu_data = $this->shukkin_model->GetShukkinInfo($user_id);

		if($kinmu_data['taikin_jikan'] == '' || $kinmu_data['taikin_jikan'] == '0000-00-00 00:00:00')
		{
			$this->shukkin_model->UpdateShukkin($kinmu_data['id'], $kinmu_data['shukkin_jikan']);
		}

		$userlist = $this->user_model->GetUserListInfo();

		$data['userlist'] = array('0'=>'-');
		foreach ($userlist as $row)
		{
			$data['userlist'] = $data['userlist'] + array($row['user_id']=>$row['username']);
		}

		//データの取得
		$kinmu_data = $this->shukkin_model->GetShukkinInfo($user_id);

		$data['pageindex'] = '';

		$where = array(
			'user_id' =>'',
			'hiduke_from' =>'',
			'hiduke_to' =>'',
			'limit' => 20,
			'offset' => 0,
		);

		$where['user_id'] = $this->session->userdata('user_id');

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

		$data['result_td'] = $this->shukkin_model->GetShukkinListInfo($where);

		//---------------page------------------
		$total_rows = $this->shukkin_model->SelectShukkinCount($where);

		$this->load->library('pagination');

		$url = $data['base'].'index.php/mgr_shukkin';

		$config['base_url'] = $url.'/page/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['num_links'] = 10;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//---------------------------------

		$data['authority'] = $authority;
		$data['shukkin_jikan'] = substr($kinmu_data['shukkin_jikan'], 10, 9);
		$data['taikin_jikan'] = substr($kinmu_data['taikin_jikan'], 10, 9);
		$data['kinmu_id'] = $kinmu_data['id'];

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_shukkin_view',$data);
		$this->load->view('footer_view',$data);
	}

	function search()
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

		//ユーザーID
		//$user_id = $_POST['user'];
		//年
		$nen = $_POST['nen'];
		//月
		$getsu = $_POST['getsu'];

		//echo $user_id.$nen.$getsu;

		$userlist = $this->user_model->GetUserListInfo();

		$data['userlist'] = array('0'=>'-');
		foreach ($userlist as $row)
		{
			$data['userlist'] = $data['userlist'] + array($row['user_id']=>$row['username']);
		}

		//データの取得
		//$kinmu_data = $this->shukkin_model->GetShukkinInfo($user_id);

		$data['pageindex'] = '';

		$where = array(
			'user_id' =>'',
			'hiduke_from' =>'',
			'hiduke_to' =>'',
			'limit' => 20,
			'offset' => 0,
		);

		if($authority == 1)
		{
			//ユーザーID
			$user_id = $_POST['user'];

			if($user_id != "0")
			{
				$where['user_id'] = $user_id;
			}
		}
		else
		{
			$where['user_id'] = $this->session->userdata('user_id');
		}

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

		if($nen != null && $nen != "")
		{
			if($getsu != null && $getsu != "")
			{
				$where['hiduke_from'] = $this->getNen($nen)."-".$this->getGetsu($getsu)."-01";
				$where['hiduke_to'] = $this->getNen($nen)."-".$this->getGetsu($getsu)."-31";
			}
			else
			{
				$where['hiduke_from'] = $this->getNen($nen)."-01-01";
				$where['hiduke_to'] = $this->getNen($nen)."-12-31";
			}
		}

		//$where['hiduke_from'] = $nen."-".$getsu."-01";
		//$where['hiduke_to'] = $nen."-".$getsu."-31";

		$data['result_td'] = $this->shukkin_model->GetShukkinListInfo($where);

		//---------------page------------------
		$total_rows = $this->shukkin_model->SelectShukkinCount($where);

		$this->load->library('pagination');

		$url = $data['base'].'index.php/mgr_shukkin';

		$config['base_url'] = $url.'/page/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['num_links'] = 10;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//---------------------------------

		$data['shukkin_jikan'] = '';
		$data['taikin_jikan'] = '';
		$data['kinmu_id'] = '';

		$data['authority'] = $authority;

		$this->load->view('header_view', $data);
		$this->load->view('mgr_menu_view', $data);
		$this->load->view('mgr_shukkin_view', $data);
		$this->load->view('footer_view', $data);
	}

	function getNen($nen)
	{
		switch ($nen)
		{
			case 1:
				return "2013";
			case 2:
				return "2014";
			case 3:
				return "2015";
		}
	}

	function getGetsu($getsu)
	{
		switch ($getsu)
		{
			case 1:
				return "01";
			case 2:
				return "02";
			case 3:
				return "03";
			case 4:
				return "04";
			case 5:
				return "05";
			case 6:
				return "06";
			case 7:
				return "07";
			case 8:
				return "08";
			case 9:
				return "09";
			case 10:
				return "10";
			case 11:
				return "11";
			case 12:
				return "12";
		}
	}
}