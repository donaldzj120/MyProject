<?php
include('qdmail.php');

class Mgr_dtb_mis_confirm extends Controller {

	function Mgr_dtb_mis_confirm()
	{
		parent::Controller();
	}

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');

		$this->load->library('mylabels');
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['downurl'] = $this->config->item('base_url').$this->config->item('pdf');

		if(!isset($_POST['run_userid']) || empty($_POST['run_userid']))
		{
			$data['err_msg1'] = 'Please Select RunUser!';
		}
		else
		{
			$data['run_userid'] = $_POST['run_userid'];
			$this->db->select('id, username, status, car_info1');
			$query = $this->db->get_where('users', array('id' => $data['run_userid']));
			$data['user_th'] = $this->mylabels->MgrDtbThLabelsc;
			$data['user_td'] = $query->result_array();
			$data['dlstatusText'] = $this->mylabels->dlstatusText;
		}

		if(isset($_POST['missions']) && count($_POST['missions']) != 0){
			$id = $_POST['missions'];
			$data['mission_th'] = $this->mylabels->MgrDtbMisSelThLabesc;
			$query = $this->db->or_where_in('id', $id);
			$query = $this->db->get('mission');
			$data['result_rownum'] = $query->num_rows();
			$data['mission_td'] = $query->result_array();
			$data['statusText'] = $this->mylabels->statusText;
		}
		else
		{
			$data['err_msg2'] = 'Please Select Mission!';
			redirect('mgr_dtb_mis_select/' . $_POST['run_userid'] . '/err');
		}

		$data["authority"] = $authority;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_dtb_mis_confirm_view',$data);
		$this->load->view('footer_view',$data);

	}

	function confirm_misson()
	{
		if(!isset($_POST['run_userid']) || empty($_POST['run_userid']))
		{
			redirect('confirm');
		}
		$query = $this->db->get_where('users', array('id' => $_POST['run_userid']));
		$runuser = $query->result_array();

		$mailmsg = array();
		$i = 0;
		foreach($_POST['missions'] as $id)
		{
			$query = $this->db->get_where('mission', array('id' => $id));
			$mailmsg[$i]['misid'] = $query->row()->mission_id.'-'.$query->row()->mission_id2;
			$mailmsg[$i]['ctmid'] = $query->row()->from_id;
			$i++;

			$updata = array(
				'fenpei_id' => $this->session->userdata('user_id'),
				'zhixing_id' => $runuser[0]['user_id'],
				'mission_status' => 1,
				'fenpei_date' => date('Y/m/d H:i:s')
			);
			$this->db->where('id', $id);
			$this->db->update('mission', $updata);
		}
		$updata = array('status' => 1);
		$this->db->where('id', $_POST['run_userid']);
		$this->db->update('users', $updata);

		//send mail to dl
		$mail = $this->mylabels->mgrMisDistributedD;
		$mail['to'] = $runuser[0]['email'];
		$mail['fromname'] = $this->session->userdata('username').'　';
		if($mail['fromname'] != $this->config->item('admin')){
			$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
			$mail['frommail'] = $query->row()->email;
		}
		$subject = $mail['message'];
		$mail['message'] = '';
		foreach($mailmsg as $msg){
			if(empty($msg['ctmid']))
				$mail['message'] .= $msg['misid'].$subject."\r\n";
			else
				$mail['message'] .= $msg['ctmid'].'が'.$msg['misid'].$subject."\r\n";
		}
		$rtn = $this->sendmail($mail);
		//$rtn = FALSE;
		if(!$rtn){
			echo '<html><head>';
			echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';
			echo '</head><body>';
			echo '<h1>配車できました。メールの送信に失敗しました。</h1>';
			echo anchor("mgr_dtb",'戻す');
			echo '</body></html>';
			exit;
		}
		//send to custom
		$mail = $this->mylabels->mgrMisDistributedC;
		$mail['fromname'] = $this->session->userdata('username').'　';
		if($mail['fromname'] != $this->config->item('admin')){
			$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
			$mail['frommail'] = $query->row()->email;
		}
		foreach($mailmsg as $msg){
			$query = $this->db->get_where('users', array('user_id' => $msg['ctmid']));
			$mail['to'] = $query->row()->email;
			$mail['message'] = $msg['misid'].$mail['message'];
			$rtn = $this->sendmail($mail);
		}
		if(!$rtn){
			echo '<html><head>';
			echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';
			echo '</head><body>';
			echo '<h1>配車できました。メールの送信に失敗しました。</h1>';
			echo anchor("mgr_dtb",'戻す');
			echo '</body></html>';
			exit;
		}

		redirect('mgr_mission/2');
	}

	function sendmail($email = '')
	{
		//メールエンコーディング
		//mb_language("ja");
		//mb_internal_encoding("ISO-2022-JP");

		//fromエンコード
		$from  = $email['fromname'];
		//$from = mb_convert_encoding($from, "ISO-2022-JP","UTF-8");
		$from = 'From: "'.$from.'"<'.$email['frommail'].'>';

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
		return FALSE;
	}

}
?>