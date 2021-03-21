<?php
class Mgr_Mitumori extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
		$data['result_th'] = $this->mylabels->CtmMitumoriTh;		$this->db->where('flag', 1);
		$this->db->orderby("hensin");
		$this->db->orderby("create_date","DESC");
		$query = $this->db->get('sagyo');
		$data['result_td'] = $query->result_array();
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');		$data['pageindex'] = '';		$data['authority'] = $authority;
		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_mitumori_view',$data);
		$this->load->view('footer_view',$data);
	}
}
?>