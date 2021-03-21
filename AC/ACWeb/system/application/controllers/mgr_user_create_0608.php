<?php
class Mgr_user_create extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');		$data['authority'] = $authority;
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
		$this->load->helper(array('form', 'url'));
		$this->load->library('table');
		$this->load->library('form_validation');
		$this->load->library('mylabels');
		$data['formlabes'] = $this->mylabels->UserRegFormLabels;
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');		$data['user_authority'] = $authority;
		$config = array(
				array(
                     'field'   => 'user_id',
                     'label'   => $data['formlabes']['user_id'],
                     'rules'   => 'trim|required|min_length[4]|max_length[40]|xss_clean|callback_username_check'
                     ),
                     array(
                     'field'   => 'password',
                     'label'   => $data['formlabes']['password'],
                     'rules'   => 'trim|required|min_length[6]|max_length[10]|matches[passconf]'
                     ),
                     array(
                     'field'   => 'passconf',
                     'label'   => $data['formlabes']['passconf'],
                     'rules'   => 'trim|required'
                     ),
                     array(
                     'field'   => 'authority',
                     'label'   => $data['formlabes']['authority'],
                     'rules'   => 'trim'
                     ),
                     array(
                     'field'   => 'username',
                     'label'   => $data['formlabes']['username'],
                     'rules'   => 'trim|required|max_length[40]|xss_clean'
                     ),
                     array(
                     'field'   => 'email',
                     'label'   => $data['formlabes']['email'],
                     'rules'   => 'trim|required|max_length[100]|valid_email'
                     ),
                     array(
                     'field'   => 'user_phone3',
                     'label'   => $data['formlabes']['user_phone3'],
                     'rules'   => 'trim|required|numeric'
                     ),
                     array(
                     'field'   => 'user_phone4',
                     'label'   => $data['formlabes']['user_phone4'],
                     'rules'   => 'trim|required|numeric'
                     ),
                     array(
                     'field'   => 'user_phone5',
                     'label'   => $data['formlabes']['user_phone5'],
                     'rules'   => 'trim|required|numeric'
                     ),
                     array(
                     'field'   => 'user_phone6',
                     'label'   => $data['formlabes']['user_phone6'],
                     'rules'   => 'trim|numeric'
                     ),
                     array(
                     'field'   => 'user_phone7',
                     'label'   => $data['formlabes']['user_phone7'],
                     'rules'   => 'trim|numeric'
                     ),
                     array(
                     'field'   => 'user_phone8',
                     'label'   => $data['formlabes']['user_phone8'],
                     'rules'   => 'trim|numeric'
                     ),
                     array(
                     'field'   => 'user_info1',
                     'label'   => $data['formlabes']['user_info1'],
                     'rules'   => 'trim|max_length[100]'
                     ),
                     array(
                     'field'   => 'user_info2',
                     'label'   => $data['formlabes']['user_info2'],
                     'rules'   => 'trim|max_length[100]'
                     ),
                     array(
                     'field'   => 'car_info1',
                     'label'   => $data['formlabes']['car_info1'],
                     'rules'   => 'trim|max_length[100]'
                     ),
                     array(
                     'field'   => 'car_info2',
                     'label'   => $data['formlabes']['car_info2'],
                     'rules'   => 'trim|max_length[100]'
                     )
                     );

                     $this->form_validation->set_rules($config);

                     if ($this->form_validation->run() == FALSE)
                     {
                     	$this->load->view('header_view',$data);
                     	$this->load->view('mgr_menu_view',$data);
                     	$this->load->view('mgr_user_create_view', $data);
                     	$this->load->view('footer_view',$data);
                     }
                     else
                     {
                     	if($this->Insert_Users($_POST)){
                     		redirect('mgr_user');
                     	}else{
                     		$this->load->view('header_view',$data);
                     		$this->load->view('mgr_menu_view',$data);
                     		$this->load->view('mgr_user_create', $data);
                     		$this->load->view('footer_view',$data);
                     	}
                     }
	}
	function Insert_Users( $Post = 0)
	{
		$authority = $this->session->userdata('authority');

		if(isset($Post) && !empty($Post))
		{
			$Post = $this->delArrayElementByKey($Post, 'passconf');
			$Post = $this->delArrayElementByKey($Post, 'x');
			$Post = $this->delArrayElementByKey($Post, 'y');
			$Post = array_merge($Post, array('user_phone1' => $Post['user_phone3'].'-'.$Post['user_phone4'].'-'.$Post['user_phone5']));
			$Post = $this->delArrayElementByKey($Post, 'user_phone3');
			$Post = $this->delArrayElementByKey($Post, 'user_phone4');
			$Post = $this->delArrayElementByKey($Post, 'user_phone5');
			if(!empty($Post['user_phone6']) && !empty($Post['user_phone7']) && !empty($Post['user_phone8']))
			{
				$Post = array_merge($Post, array('user_phone2' => $Post['user_phone6'].'-'.$Post['user_phone7'].'-'.$Post['user_phone8']));
			}
			$Post = $this->delArrayElementByKey($Post, 'user_phone6');
			$Post = $this->delArrayElementByKey($Post, 'user_phone7');
			$Post = $this->delArrayElementByKey($Post, 'user_phone8');
			$Post['password'] = $this->encrypt->encode($Post['password']);
			$Post = array_merge($Post, array('create_date' => date('Y/m/d H:i:s')));
			if($authority == 1)
			{
				if($Post['authority'] === 4 ||  $Post['authority'] === 5)
				{
					$Post = array_merge($Post, array('jyouiID' => 999999));
				}
				else
				{
					$Post = array_merge($Post, array('jyouiID' => $this->session->userdata('id')));
				}
			}
			else
			{
				$Post = array_merge($Post, array('jyouiID' => $this->session->userdata('id')));
			}
			$this->db->insert('users', $Post);
			return true;
		}
		else
		return false;
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

	function username_check($str)
	{
		if($str == $this->config->item('admin')){
			$this->form_validation->set_message('username_check', 'お名前 「%s」 は重複です。');
			return FALSE;
		}
		$query = $this->db->get_where('users', array('user_id' => $str));
		if ($query->num_rows() > 0)
		{
			$this->form_validation->set_message('username_check', 'お名前 「%s」 は重複です。');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
?>