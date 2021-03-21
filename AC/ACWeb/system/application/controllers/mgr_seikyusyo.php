<?php
class Mgr_seikyusyo extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');		$data['authority'] = $authority;
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
		if ($this->uri->segment(2) !== FALSE)
		{
			$id = $this->uri->segment(2);
			$this->DeleteUser($id);
			redirect('mgr_seikyusyo');
		}
		$data['result_th'] = $this->mylabels->SeikyusyoTableTh;
		$query = $this->db->get('seikyusyo');
		$data['result_td'] = $query->result_array();
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['header'] = $this->mylabels->Header;
		$data['seikyusyo'] = $this->mylabels->seikyusyo;
		$data['deleteusermsg'] = $this->mylabels->deleteseikyusyomsg;
		$data['seikyusyo_sakusei'] = $this->mylabels->seikyusyo_sakusei;
		$data['siryo'] = $this->config->item('base_url').$this->config->item('seikyusyo');
		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_seikyusyo_view',$data);
		$this->load->view('footer_view',$data);
	}
	function DeleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('seikyusyo');
	}
}
?>