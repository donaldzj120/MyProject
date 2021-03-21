<?php
class Mgr_dtb extends Controller {
	function Mgr_dtb()
	{
		parent::Controller();
	}
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
		$this->db->select('id, username, status, car_info1');
		$this->db->order_by("lastlogindate", "desc");
		//$query = $this->db->get('users');
		$query = $this->db->get_where('users', array('authority' => 3));
		$data['result_th'] = $this->mylabels->MgrDtbThLabels;
		$data['result_td'] = $query->result_array();
		$data['dlstatusText'] = $this->mylabels->dlstatusText;
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');		$data['pageindex'] = '';		$data['authority'] = $authority;
		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_dtb_view',$data);
		$this->load->view('footer_view',$data);
	}
}
?>