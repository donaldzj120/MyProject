<?php
class Mgr_oshirase extends Controller {

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');

		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
		{
			redirect('login');
		}

		//$data['result_th'] = $this->mylabels->HyoTableTh;
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['pageindex'] = '';

		$data['result_td'] = $this->oshirase_model->GetOshiraseListInfo();

		$data['authority'] = $authority;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_oshirase_view',$data);
		$this->load->view('footer_view',$data);
	}

	function oshirase_new()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');

		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
		{
			redirect('login');
		}

		$this->load->helper(array('form', 'url'));

		$this->load->library('table');

		$this->load->library('form_validation');

		$this->load->library('mylabels');

		$data['formlabes'] = $this->mylabels->OshiraseFormLabels;

		$data['header'] = $this->mylabels->Header;

		$data['base'] = $this->config->item('base_url');

		$data['css'] = $this->config->item('css');

		$data['LogoutLink'] = anchor('login/logout');

		$data['authority'] = $authority;

		$config = array(
			array(
	        	'field'   => 'Title',
				'label'   => $data['formlabes']['title'],
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'Body',
				'label'   => $data['formlabes']['body'],
				'rules'   => 'trim|required'
			)
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header_view',$data);
			$this->load->view('mgr_menu_view',$data);
			$this->load->view('mgr_oshirase_create_view', $data);
			$this->load->view('footer_view',$data);
		}
		else
		{
			if($this->Insert_Users($_POST))
			{
				redirect('mgr_oshirase');
			}else{
				$this->load->view('header_view',$data);
				$this->load->view('mgr_menu_view',$data);
				$this->load->view('mgr_oshirase_create_view', $data);
				$this->load->view('footer_view',$data);
			}
		}
	}


	function oshirase_show()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');

		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
		{
			redirect('login');
		}

		if ($this->uri->segment(3) != FALSE){
			$id = $this->uri->segment(3);

			$data['td'] = $this->oshirase_model->GetOshiraseInfo($id);
		}

		$this->load->library('form_validation');

		$this->load->library('mylabels');

		$data['formlabes'] = $this->mylabels->OshiraseFormLabels;
		//$data['result_th'] = $this->mylabels->HyoTableTh;
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['pageindex'] = '';

		$data['result_td'] = $this->oshirase_model->GetOshiraseListInfo();

		$data['authority'] = $authority;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_oshirase_show_view',$data);
		$this->load->view('footer_view',$data);
	}

	function oshirase_del($id)
	{
		$this->db->where('id', $id);

		$this->db->delete('oshirase');

		redirect('mgr_oshirase');
	}

	function Insert_Users( $Post = 0 )
	{
		$authority = $this->session->userdata('authority');

		if(isset($Post) && !empty($Post))
		{
			$Post = $this->delArrayElementByKey($Post, 'x');

			$Post = $this->delArrayElementByKey($Post, 'y');

			$Post = array_merge($Post, array('Create_Date' => date('Y/m/d H:i:s')));

			$Post = array_merge($Post, array('Create_user' => $this->session->userdata('id')));

			$this->db->insert('oshirase', $Post);

			return true;

		}
		else
		{
			return false;
		}
	}

		// This function deletes a element in an array, by giving it the name of a key.
	function delArrayElementByKey($array_with_elements, $key_name) {

		$key_index = array_keys(array_keys($array_with_elements), $key_name);

		if (count($key_index) != '') {

			// Es gibt dieses Element (mindestens einmal) in diesem Array, wir loeschen es:

			array_splice($array_with_elements, $key_index[0], 1);

		}

		return $array_with_elements;

	}// End function delArrayElementByKey
}
?>