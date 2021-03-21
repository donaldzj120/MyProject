<?php
class Mgr_Mitumori_update extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
		if ($this->uri->segment(2) != FALSE){
			$id = $this->uri->segment(2);
		}
		$this->load->library('form_validation');
		//$data['formlabes'] = $this->mylabels->CtmCreateMisForm;
		$data['formlabels'] = $this->mylabels->CtmCreateMisForm;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$config = array(
               array(
                     'field'   => 'kingaku',
                     'label'   => '金額',
                     'rules'   => 'trim|required'
                  )
            );
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header_view',$data);
			$this->load->view('mgr_menu_view',$data);
			$this->load->view('mgr_mitumori_update_view', $data);
			$this->load->view('footer_view',$data);
		}
		else
		{
			if($this->Update_Mitumori($_POST)){
				redirect('mgr_mitumori');
			}else{
				$this->load->view('header_view',$data);
				$this->load->view('mgr_menu_view',$data);
				$this->load->view('mgr_mitumori_update_view', $data);
				$this->load->view('footer_view',$data);
			}
		}
	}
	function Update_Mitumori($Post)
	{
		if(isset($Post) && !empty($Post))
		{
			$Post = $this->delArrayElementByKey($Post, 'id');
			$Post = $this->delArrayElementByKey($Post, 'x');
			$Post = $this->delArrayElementByKey($Post, 'y');

			$Post = array_merge($Post, array('hensin' => 1));
			$this->db->where('id', $id);
			$this->db->update('sagyo', $Post);
			return true;
		}
		else
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