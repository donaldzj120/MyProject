<?php
class Mgr_user extends Controller {

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');		$data['authority'] = $authority;
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
		$this->load->helper('url');
		$this->load->library('mylabels');
		if ($this->uri->segment(2) !== FALSE)
		{
			$User_ID = $this->uri->segment(2);
			$this->DeleteUser($User_ID);
			redirect('mgr_user');
		}
		$data['result_th'] = $this->mylabels->UserShowTableTh;
		$data['result_td'] = $this->user_model->GetUserInfo($this->session->userdata('id'), '');
		$data['pageindex'] = '';
		/*
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = 'login/logout';
		$data['title'] = 'Welcome To MySite!!';
		*/

		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['authorityText'] = $this->mylabels->authorityText;
		$data['userviewcrt'] = $this->mylabels->userviewcrt;
		$data['dlstatusText'] = $this->mylabels->dlstatusText;
		$data['deleteusermsg'] = $this->mylabels->deleteusermsg;
		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_user_view',$data);
		$this->load->view('footer_view',$data);
	}
	function DeleteUser($User_ID)
	{
		$this->db->where('id', $User_ID);
		$this->db->delete('users');
	}
}
?>