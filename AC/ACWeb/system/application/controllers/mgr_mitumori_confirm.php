<?php
class Mgr_Mitumori_Confirm extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');

		$data['formlabels'] = $this->mylabels->CtmCreateMisForm;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');

		$data['authority'] = $authority;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_mitumori_confirm_view', $data);
		$this->load->view('footer_view',$data);

	}
}