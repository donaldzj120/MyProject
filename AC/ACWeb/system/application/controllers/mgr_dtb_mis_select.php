<?php
class Mgr_dtb_mis_select extends Controller {
	function Mgr_dtb_mis_select()
	{
		parent::Controller();
	}
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');		$this->load->library('mylabels');		$data['header'] = $this->mylabels->Header;		$data['base'] = $this->config->item('base_url');		$data['css'] = $this->config->item('css');		$data['LogoutLink'] = anchor('login/logout');		$data['downurl'] = $this->config->item('base_url').$this->config->item('pdf');		$data['statusText'] = $this->mylabels->statusText;		$data['run_userid'] = 0;
		if ($this->uri->segment(2) != FALSE)
		{
			$data['run_userid'] = $this->uri->segment(2);
			$query = $this->db->get_where('users', array('id' => $data['run_userid']));
			if($query->num_rows() > 0){
				$data['dluserinfo'] = $query->result_array();
			}else{
				$data['err_msg'] = 'select dluser error!';
			}
		}
		if ($this->uri->segment(3) != FALSE)
		{
			$kubun = $this->uri->segment(3);
			if ($kubun == 'err')
			{
				$data['err_ninmu'] = $this->mylabels->err_ninmu;
			}
		}
		if(!empty($_POST['search'])){
			$this->db->like('mission_id', $_POST['mission_id'], 'after');
			$this->db->like('mission_id2', $_POST['mission_id2'], 'after');
		}
		$this->db->where(array('mission_status' => 0));
		$this->db->order_by("recv_date", "desc");
		$query = $this->db->get('mission');
		$data['result_th'] = $this->mylabels->MgrDtbMisSelThLabes;
		$data['result_td'] = $query->result_array();
		$data['result_rownum'] = $query->num_rows();
		$data['authority'] = $authority;
		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_dtb_mis_select_view',$data);
		$this->load->view('footer_view',$data);

	}
}
?>