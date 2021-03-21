<?php
class Mgr_doraiba extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 1 )
		redirect('login');
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['authority'] = $authority;
		$this->load->view('header_view',$data);
		$this->load->view('mgr_doraiba_view',$data);
		$this->load->view('footer_view',$data);
	}
}