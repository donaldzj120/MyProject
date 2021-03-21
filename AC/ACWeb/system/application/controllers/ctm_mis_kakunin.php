<?php

class Ctm_mis_kakunin extends Controller {

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 3 )
			redirect('login');

		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		//$data['formlabels'] = $this->mylabels->CtmCreateMisForm;

		$this->load->view('header_view',$data);
		$this->load->view('ctm_menu_view',$data);
		$this->load->view('ctm_mis_kakunin_view',$data);
		$this->load->view('footer_view',$data);

	}
}