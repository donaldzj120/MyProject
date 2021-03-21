<?php
include('qdmail.php');


class Ctm_Mitumori extends Controller {

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 3 )
			redirect('login');

		if ($this->uri->segment(2) !== FALSE)
		{
			$Mitumori_ID = $this->uri->segment(2);
			$this->DeleteUser($Mitumori_ID);
			//redirect('ctm_mitumori');
		}

		$data['result_th'] = $this->mylabels->CtmMitumoriTh;


		$this->db->orderby("flag");
		$this->db->orderby("create_date","DESC");
		$this->db->where('from_id', $this->session->userdata('user_id'));
		$this->db->where('flag', 1);
		//$query = $this->db->get('mitumori');
		$query = $this->db->get('sagyo');
		$data['result_td'] = $query->result_array();
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['pageindex'] = '';
		//$data['authorityText'] = $this->mylabels->authorityText;
		//$data['userviewcrt'] = $this->mylabels->userviewcrt;
		//$data['dlstatusText'] = $this->mylabels->dlstatusText;
		$data['deletemitumorimsg'] = $this->mylabels->deletemitumorimsg;

		$this->load->view('header_view',$data);
		$this->load->view('ctm_menu_view',$data);
		$this->load->view('ctm_mitumori_view',$data);
		$this->load->view('footer_view',$data);
	}

	function DeleteUser($Mitumori_ID)
	{
		$this->db->where('id', $Mitumori_ID);
		$this->db->delete('sagyo');

			$mail = $this->mylabels->ctmCanceledMori;
			$mail['fromname'] = $this->session->userdata('username').'　';
			$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
			$mail['frommail'] = $query->row()->email;
			$query = $this->db->get_where('users', array('authority' => 1));
			foreach ($query->result() as $row){
				$mail['to'] = $mail['to'].','.$row->email;
			}
			$this->db->where('id', $this->uri->segment(3));
			$query = $this->db->get('mission');
			$mail['message'] = $this->session->userdata('user_id').'が'.$Mitumori_ID.$mail['message'];
			$rtn = $this->sendmail($mail);
			//$rtn = FALSE;
			if(!$rtn){
				echo '<h1>任務は更新できました。メールの送信に失敗しました。</h1>';
				echo anchor("ctm_mitumori",'戻す');
				exit;
			}
			redirect('ctm_mitumori');
	}

	function sendmail($email = '')
	{
		//メールエンコーディング
		//mb_language("ja");
		//mb_internal_encoding("ISO-2022-JP");

		//fromエンコード

		$from  = $email['fromname'];

		//$from = mb_convert_encoding($from, "ISO-2022-JP","UTF-8");

		$from = 'From: "'.$from.'"<'.$email['frommail'].'.>';



		//subjectエンコード

		$subject  = $email['subject'];

		//$subject = mb_convert_encoding($subject, "ISO-2022-JP","UTF-8");



		//本文エンコード

		$mail = $email['message'];

		//$mail = mb_convert_encoding($mail,"ISO-2022-JP","UTF-8");




		//if (mb_send_mail($email['to'], $subject, $mail, $from)) {
		if (qd_send_mail( 'text' , $email['to'], $subject, $mail, $from)) {

		  return TRUE;//"メールが送信されました。";

		} else {

		  return FALSE;//"メールの送信に失敗しました。";

		}

	}
}

?>