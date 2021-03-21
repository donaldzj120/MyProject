<?php

class login extends Controller {

	function Welcome()
	{
		parent::Controller();
	}

	function index()
	{
		$this->load->library('mylabels');
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['lables'] = $this->mylabels->LoginFormArray;

		if (isset($_POST['login_check']))
		{
			if(isset($_POST['username']) && strlen($_POST['username'])>0 && isset($_POST['password']) && strlen($_POST['password'])>0){
				$result = $this->login_check();
				if($result['state']){
					$data['err_msg'] = 'Logined';
					$row = $result['query']->row_array();
					//echo $row['authority'];
					switch ($row['authority']){
						case 1:
							redirect('mgr_hyo');break;
						case 2:
							redirect('mgr_hyo');break;
						case 3:
							redirect('ctm_mis/2');break;
						case 4:
							redirect('mgr_hyo');break;
						case 5:
							redirect('dl_mis/1');break;
					}
				}else{
					$username = $_POST['username'];
					$password = $_POST['password'];

					if( $username == $this->config->item('admin') &&
						$password == $this->config->item('adminpass') ){
						$loginstatus = array(
							'status' => 'OK',
							'id'  => '0',
							'user_id'  => $username,
							'username'  => $username,
							'authority'  => 1
						);//Session״̬
						$this->session->set_userdata($loginstatus);
						redirect('mgr_hyo');

					}else{
						$data['err_msg'] = 'ユーザーIDまたはパスワードが違います。';
						$data['user_name'] = $_POST['username'];
					}
				}
			}
			elseif (isset($_POST['username']) && strlen($_POST['username'])>0)
			{
				$data['err_msg'] = 'パスワードを入力してください。';
				$data['user_name'] = $_POST['username'];
			}
			else
			{
				$data['err_msg'] = 'ユーザーIDを入力してください。';
				$data['user_name'] = $_POST['username'];
			}
		}

		$this->load->view('header_view',$data);
		$this->load->view('login_view',$data);
		$this->load->view('footer_view',$data);
	}

	function login_check()
	{

		$rtarray = array();
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username)){
			/*
			$sql = "SELECT *
					FROM `users`
					WHERE `user_id` = '$username'
					AND `password` = '$password'";
			$query = $this->db->query($sql);
			*/
			$query = $this->db->get_where('users', array('user_id' => $username));
			if ($query->num_rows() > 0)
			{
				if($password ==  $this->encrypt->decode($query->row()->password)){
				$loginstatus = array(
					'status' => 'OK',
					'id'  => $query->row()->id,
					'user_id'  => $query->row()->user_id,
					'username'  => $query->row()->username,
					'authority'  => $query->row()->authority
				);//Session״̬
				$this->session->set_userdata($loginstatus);

				$rtarray['state'] = true;
				$rtarray['query'] = $query;

				$data = array('lastlogindate' => date('Y-m-d H:i:s'));
				$this->db->where('id', $query->row()->id);
				$this->db->update('users', $data);
				}else{
					$rtarray['state'] = false;
				}
			}
			else
			{
					$rtarray['state'] = false;

			}
		}
		return $rtarray;
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
?>