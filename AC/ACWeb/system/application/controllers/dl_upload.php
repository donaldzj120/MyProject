<?php
class Dl_upload extends Controller {
	function Dl_upload()
	{
		parent::Controller();
		//$this->load->helper(array('form', 'url'));
	}
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 5 )
			redirect('login');
		if ($this->uri->segment(2) != FALSE){
			$data['id'] = $this->uri->segment(2);
		}else{
			exit;
		}
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['error'] = ' ';
		$this->load->view('header_view',$data);
		$this->load->view('dl_upload_view', $data );
		$this->load->view('footer_view',$data);
	}
	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf|jpg|jpeg|png|gif';
		$config['file_name'] = date('YmdHis').'p';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$data['header'] = $this->mylabels->Header;
			$data['base'] = $this->config->item('base_url');
			$data['css'] = $this->config->item('css');
			$data['LogoutLink'] = anchor('login/logout');
			$data['id'] = $_POST['id'];
			$this->load->view('header_view',$data);
			$this->load->view('dl_upload_view', $error);
			$this->load->view('footer_view',$data);
		}
		else
		{
			//echo '<h3>'.$_POST['id'].'</h3>';
			$upload_data = $this->upload->data();
			$data = array('fileover' => $upload_data['file_name']);
			$this->db->where('id', $_POST['id']);
			$this->db->update('mission', $data);
			/*//send mail to manager
			$mail = $this->mylabels->dlmail;
			$mail['fromname'] = $this->session->userdata('username');
			$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
			$mail['frommail'] = $query->row()->email;
			if(!$this->sendmail($mail)){
				echo '<h1>任務は更新できました。<br>メールの送信に失敗しました。</h1>';
				echo anchor("ctm_mis",'戻す');
	 　			 exit;
			}*/
			//redirect('dl_mis/misover/'.$_POST['id']);
			redirect('dl_mis');
			/*
			 echo $upload_data['file_name'];
			 echo '<h3>Your file was successfully uploaded!</h3><ul>';
			 foreach($upload_data as $item => $value)
			 echo '<li>'.$item.':'.$value.'</li>';
			 echo '</ul><p>'.anchor('dl_upload', 'Upload Another File!').'</p>';*/
		}
	}
	function sendmail($email = '')
	{
		//メールエンコーディング
		mb_language("ja");
		mb_internal_encoding("ISO-2022-JP");
		//fromエンコード
		$from  = $email['fromname'];
		$from = mb_convert_encoding($from, "ISO-2022-JP","UTF-8");
		echo $from = 'From: "'.$from.'"<'.$email['frommail'].'.>';
		//subjectエンコード
		$subject  = $email['subject'];
		$subject = mb_convert_encoding($subject, "ISO-2022-JP","UTF-8");

		//本文エンコード
		$mail = $email['message'];
		$mail = mb_convert_encoding($mail,"ISO-2022-JP","UTF-8");

		if (mb_send_mail($email['to'], $subject, $mail, $from)) {
		  return TRUE;//"メールが送信されました。";
		} else {
		  return FALSE;//"メールの送信に失敗しました。";
		}

	}
}
?>