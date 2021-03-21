<?php
include('qdmail.php');

class Ctm_mis_upconfirm extends Controller {


	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 3 )
		redirect('login');

		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['formlabels'] = $this->mylabels->CtmConfirmMisForm;


		if(isset($_POST) && !empty($_POST))
		{
			$upload_data['file_name'] = $_POST['file_name'];
/*
			if(!empty($_FILES["userfile"]["name"])){

				//ファイルのアップロード
				$config['upload_path'] = './siryo/';
				$config['allowed_types'] = 'pdf|doc|xls';
				$config['file_name'] = $this->session->userdata('user_id').'_'.date('YmdHis');

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
				}

				$upload_data = $this->upload->data();
			}
*/
			//作業テーブルの新規
			$_POST = array_merge($_POST, array('year' => date('Y')));
			$_POST = array_merge($_POST, array('month' => date('m')));
			$_POST = array_merge($_POST, array('day' => date('d')));
			//$_POST = array_merge($_POST, array('sagyo_date' => date('Y-m-d')));
			$_POST = array_merge($_POST, array('create_date' => date('Y-m-d H:i:s')));
			$_POST = array_merge($_POST, array('update_date' => date('Y-m-d H:i:s')));

			if (isset($_POST['tdkjikan']))
			{
				switch($_POST['tdkjikan']){
					case '必着':
						$_POST = array_merge($_POST, array('sagyo_time' => $_POST['tdkji'].':'.$_POST['tdkfun']));
						break;
					case 'AM':
						$_POST = array_merge($_POST, array('sagyo_time' => 'AM'));
						break;
					case 'PM':
						$_POST = array_merge($_POST, array('sagyo_time' => 'PM'));
						break;
					case '終日':
						$_POST = array_merge($_POST, array('sagyo_time' => '終日'));
						break;
				}
			}
			else
			{
				$_POST = array_merge($_POST, array('sagyo_time' => ''));
			}

			if (isset($_POST['hckjikan']))
			{
				switch($_POST['hckjikan']){
					case '必着':
						$_POST = array_merge($_POST, array('jikan' => $_POST['ji'].':'.$_POST['fun']));
						break;
					case 'AM':
						$_POST = array_merge($_POST, array('jikan' => 'AM'));
						break;
					case 'PM':
						$_POST = array_merge($_POST, array('jikan' => 'PM'));
						break;
					case '終日':
						$_POST = array_merge($_POST, array('jikan' => '終日'));
						break;
				}
			}
			else
			{
				$_POST = array_merge($_POST, array('jikan' => ''));
			}
			//$_POST = array_merge($_POST, array('jikan' => $_POST['ji'].':'.$_POST['fun']));

			if (isset($_POST['ka']))
			{
				switch($_POST['ka'])
				{
					case 0:
						$ka_temp = '封筒';
						break;
					case 1:
						$ka_temp = 'ﾀﾞﾝﾎﾞｰﾙ';
						break;
					case 2:
						$ka_temp = '布ﾊﾞｯｸﾞ';
						break;
					case 3:
						$ka_temp = 'ｼﾞｭﾗﾙﾐﾝ';
						break;
					case 4:
						$ka_temp = $_POST['ka_sonota'];
						break;
					default:
						$ka_temp = '';
						break;
				}
			}
			else
			{
				$ka_temp = '';
			}
			$_POST = array_merge($_POST, array('ka' => $ka_temp));
			if (isset($_POST['siji']))
			{
				switch($_POST['siji'])
				{
					case 0:
						$siji_temp = '配達';
						break;
					case 1:
						if(isset($_POST['siji2']))
						{
							$siji_temp = $_POST['siji2'].'営業所止';
							break;
						}
						else
						{
							$siji_temp = "";
							break;
						}
					case 2:
						if(isset($_POST['siji3']))
						{
							$siji_temp = $_POST['siji3'].'空港止';
							break;
						}
						else
						{
							$siji_temp = "";
							break;
						}
					case 3:
						$siji_temp = 'チャーター';
						break;
					case 4:
						if(isset($_POST['siji5']))
						{
							$siji_temp = $_POST['siji5'];
							break;
						}
						else
						{
							$siji_temp = "";
							break;
						}
					default:
						$siji_temp = '';
						break;
				}
			}
			else
			{
				$siji_temp = '';
			}
			$id = $_POST['id'];
			$_POST = array_merge($_POST, array('flag' => 0));
			$_POST = array_merge($_POST, array('siji' => $siji_temp));
			$_POST = array_merge($_POST, array('from_id' => $this->session->userdata('user_id')));
			$_POST = array_merge($_POST, array('todoke_tel' => $_POST['todoke_tel1'].'-'.$_POST['todoke_tel2'].'-'.$_POST['todoke_tel3']));
			$_POST = $this->delArrayElementByKey($_POST, 'todoke_tel1');
			$_POST = $this->delArrayElementByKey($_POST, 'todoke_tel2');
			$_POST = $this->delArrayElementByKey($_POST, 'todoke_tel3');
			$_POST = array_merge($_POST, array('ka_tel' => $_POST['ka_tel1'].'-'.$_POST['ka_tel2'].'-'.$_POST['ka_tel3']));
			$_POST = $this->delArrayElementByKey($_POST, 'ka_tel1');
			$_POST = $this->delArrayElementByKey($_POST, 'ka_tel2');
			$_POST = $this->delArrayElementByKey($_POST, 'ka_tel3');
			$_POST = $this->delArrayElementByKey($_POST, 'x');
			$_POST = $this->delArrayElementByKey($_POST, 'y');
			$_POST = $this->delArrayElementByKey($_POST, 'ji');
			$_POST = $this->delArrayElementByKey($_POST, 'fun');
			$_POST = $this->delArrayElementByKey($_POST, 'file');
			$_POST = $this->delArrayElementByKey($_POST, 'ka_sonota');
			$_POST = $this->delArrayElementByKey($_POST, 'siji2');
			$_POST = $this->delArrayElementByKey($_POST, 'siji3');
			$_POST = $this->delArrayElementByKey($_POST, 'siji5');
			$_POST = $this->delArrayElementByKey($_POST, 'id');
			$_POST = $this->delArrayElementByKey($_POST, 'create_date');
			$_POST = $this->delArrayElementByKey($_POST, 'hckjikan');
			$_POST = $this->delArrayElementByKey($_POST, 'tdkjikan');
			$_POST = $this->delArrayElementByKey($_POST, 'tdkji');
			$_POST = $this->delArrayElementByKey($_POST, 'tdkfun');
			$_POST = $this->delArrayElementByKey($_POST, 'file_name');
			$_POST = $this->delArrayElementByKey($_POST, 'uploadedfile');

			$_POST['todoke_add2'] = $_POST['todoke_add2'].','.$_POST['todoke_add22'];
			$_POST = $this->delArrayElementByKey($_POST, 'todoke_add22');
			$_POST['ka_add2'] = $_POST['ka_add2'].','.$_POST['ka_add22'];
			$_POST = $this->delArrayElementByKey($_POST, 'ka_add22');

			/*echo "<pre>";
			 print_r($_POST);
			 echo "</pre>";*/
			$this->db->where('id', $id);
			$this->db->update('sagyo', $_POST);

			if(!empty($upload_data['file_name'])){
				$siryo = $upload_data['file_name'];
			}

			$this->db->where('mission_id', $_POST['sagyo_id1']);
			$this->db->where('mission_id2', $_POST['sagyo_id2']);
			$query = $this->db->get('mission');

			$temp = $query->result_array();
			$siryo = '';

			if(empty($temp))
			{
				//messionの新規
				$mission_data = array(
	                'mission_id' => $_POST['sagyo_id1'],
	                'mission_id2' => $_POST['sagyo_id2'],
	                'mission_status' => 0,
	                'recv_date' => date('Y/m/d H:i:s'),
					'siryo' => $siryo,
					'from_id' => $this->session->userdata('user_id')
				);
				$this->db->insert('mission', $mission_data);
			}
			else
			{
				//mession update
				$mission_data = array(
					'siryo' => $siryo
				);
				$this->db->where('mission_id', $_POST['sagyo_id1']);
				$this->db->where('mission_id2', $_POST['sagyo_id2']);
				$this->db->update('mission', $mission_data);
			}

			$mail = $this->mylabels->ctmUpdatedMis;
			$mail['fromname'] = $this->session->userdata('username').'　';
			$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
			$mail['frommail'] = $query->row()->email;
			$query = $this->db->get_where('users', array('authority' => 1));
			foreach ($query->result() as $row){
				$mail['to'] = $mail['to'].','.$row->email;
			}
			$mail['message'] = $this->session->userdata('user_id').'が'.$_POST['sagyo_id1'].'-'.$_POST['sagyo_id2'].$mail['message'];
			$rtn = $this->sendmail($mail);
			//$rtn = FALSE;
			if(!$rtn){
				echo '<h1>任務は更新できました。メールの送信に失敗しました。</h1>';
				echo anchor("ctm_mis",'戻す');
				exit;
			}
			/*　
			if(!$this->sendmail($mail)){
				echo '<h1>任務は更新できました。<br>メールの送信に失敗しました。</h1>';
				echo anchor("ctm_mis",'戻す');
				exit;
			　	　			  	　			 　
				}
			*/
			redirect('ctm_mis');
			/*
			$this->load->view('header_view',$data);
			$this->load->view('ctm_menu_view',$data);
			$this->load->view('ctm_mis_confirm_view',$data);
			$this->load->view('footer_view',$data);
			*/
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