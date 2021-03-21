<?php
include('qdmail.php');

class Ctm_Mitumori_create extends Controller {

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

		$this->load->helper('date');

		$datestring = "%Y-%m-%d";
		$time = time();

		$data['hiccyaku_date'] = mdate($datestring, $time);
		$data['sagyo_date'] = mdate($datestring, $time);

		$data['formlabels'] = $this->mylabels->CtmCreateMisForm;
		$data['ka'] = '';
		$data['siji'] = '';

		if(!empty($_POST) ){

			if(isset($_POST['ka']) ){
				$data['ka'] = $_POST['ka'];
			}
			if(isset($_POST['siji']) ){
				$data['siji'] = $_POST['siji'];
			}
			if(isset($_POST['hiccyaku1']) ){
				$data['hiccyaku_date'] = $_POST['hiccyaku1'];
			}
			if(isset($_POST['sagyo_date']) ){
				$data['sagyo_date'] = $_POST['sagyo_date'];
			}
		}
		$this->load->library('form_validation');

		$config = array(
               array(
                     'field'   => 'sagyo_id1',
                     'label'   => $data['formlabels']['id'],
                     'rules'   => 'trim|alpha_numeric|max_length[10]|callback_repeatcheck'
                  ),
               array(
                     'field'   => 'sagyo_id2',
                     'label'   => $data['formlabels']['id'],
                     'rules'   => 'trim|alpha_numeric|max_length[10]'
                  ),
               array(
                     'field'   => 'todoke_tel1',
                     'label'   => $data['formlabels']['todoke_tel1'],
                     'rules'   => 'trim|numeric'
                  ),
               array(
                     'field'   => 'todoke_tel2',
                     'label'   => $data['formlabels']['todoke_tel2'],
                     'rules'   => 'trim|numeric'
                  ),
               array(
                     'field'   => 'todoke_tel3',
                     'label'   => $data['formlabels']['todoke_tel3'],
                     'rules'   => 'trim|numeric'
                  ),
               array(
                     'field'   => 'todoke_add1',
                     'label'   => $data['formlabels']['todoke_add'].$data['formlabels']['do'],
                     'rules'   => 'trim|max_length[200]'
                  ),
               array(
                     'field'   => 'todoke_add2',
                     'label'   => $data['formlabels']['todoke_add'].$data['formlabels']['mati'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_add22',
                     'label'   => $data['formlabels']['todoke_add'].$data['formlabels']['mati'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_add3',
                     'label'   => $data['formlabels']['todoke_add'].$data['formlabels']['biru'],
                     'rules'   => 'trim|max_length[200]'
                  ),
               array(
                     'field'   => 'todoke_name1',
                     'label'   => $data['formlabels']['todoke_name'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_name2',
                     'label'   => $data['formlabels']['todoke_name'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_post',
                     'label'   => $data['formlabels']['todoke_post'],
                     'rules'   => 'trim|numeric|min_length[7]|max_length[7]'
                  ),
               array(
                     'field'   => 'ka_tel1',
                     'label'   => $data['formlabels']['ka_tel1'],
                     'rules'   => 'trim|numeric'
                  ),
               array(
                     'field'   => 'ka_tel2',
                     'label'   => $data['formlabels']['ka_tel2'],
                     'rules'   => 'trim|numeric'
                  ),
               array(
                     'field'   => 'ka_tel3',
                     'label'   => $data['formlabels']['ka_tel3'],
                     'rules'   => 'trim|numeric'
                  ),
               array(
                     'field'   => 'ka_add1',
                     'label'   => $data['formlabels']['ka_add'].$data['formlabels']['do'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_add2',
                     'label'   => $data['formlabels']['ka_add'].$data['formlabels']['mati'],
                     'rules'   => 'trim|max_length[50]'
                  ),
               array(
                     'field'   => 'ka_add22',
                     'label'   => $data['formlabels']['ka_add'].$data['formlabels']['mati'],
                     'rules'   => 'trim|max_length[50]'
                  ),
               array(
                     'field'   => 'ka_add3',
                     'label'   => $data['formlabels']['ka_add'].$data['formlabels']['biru'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_name1',
                     'label'   => $data['formlabels']['ka_name'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_name2',
                     'label'   => $data['formlabels']['ka_name'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_post',
                     'label'   => $data['formlabels']['ka_post'],
                     'rules'   => 'trim|numeric|min_length[7]|max_length[7]'
                  ),
               array(
                     'field'   => 'sagyo_date',
                     'label'   => $data['formlabels']['hiccyaku'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'tdkji',
                     'label'   => $data['formlabels']['ji'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'tdkfun',
                     'label'   => $data['formlabels']['fun'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'tdkjikan',
                     'label'   => $data['formlabels']['hiccyaku'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'hiccyaku1',
                     'label'   => $data['formlabels']['hiccyaku'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'hckjikan',
                     'label'   => $data['formlabels']['hiccyaku'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'ji',
                     'label'   => $data['formlabels']['ji'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'fun',
                     'label'   => $data['formlabels']['fun'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'hinmei',
                     'label'   => $data['formlabels']['hinmei'],
                     'rules'   => 'trim|max_length[50]'
                  ),
               array(
                     'field'   => 'hoken',
                     'label'   => $data['formlabels']['hoken'],
                     'rules'   => 'trim|numeric'
                  ),
               array(
                     'field'   => 'ka',
                     'label'   => $data['formlabels']['ka'],
                     'rules'   => 'trim|callback_Ka_Check'
                  ),
               array(
                     'field'   => 'ka_sonota',
                     'label'   => $data['formlabels']['ka_sonota'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'siji',
                     'label'   => $data['formlabels']['siji'],
                     'rules'   => 'trim|callback_Siji_Check'
                  ),
               array(
                     'field'   => 'siji2',
                     'label'   => $data['formlabels']['siji2'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'siji3',
                     'label'   => $data['formlabels']['siji3'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'siji4',
                     'label'   => $data['formlabels']['siji4'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'siji5',
                     'label'   => $data['formlabels']['siji5'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'kosuu',
                     'label'   => $data['formlabels']['kosuu'],
                     'rules'   => 'trim|numeric'
                  ),
               array(
                     'field'   => 'jyuryo',
                     'label'   => $data['formlabels']['jyuryo'],
                     'rules'   => 'trim|numeric'
                  ),
               array(
                     'field'   => 'tokki',
                     'label'   => $data['formlabels']['tokki'],
                     'rules'   => 'trim|max_length[500]'
                  )
        );

		$this->form_validation->set_rules($config);

		$data['ps'] = $this->mylabels->Header;

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header_view',$data);
			$this->load->view('ctm_menu_view',$data);
			$this->load->view('ctm_mitumori_create_view',$data);
			$this->load->view('footer_view',$data);
		}else{
			if($this->Insert_Mitumori($_POST)){

				$mail = $this->mylabels->ctmMitumoriMis;
				$mail['fromname'] = $this->session->userdata('username').'　';
				$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
				$mail['frommail'] = $query->row()->email;
				$query = $this->db->get_where('users', array('authority' => 1));
				//echo '<pre>';
				//var_dump($query->result());
				//echo '</pre>';
				foreach ($query->result() as $row){
					$mail['to'] = $mail['to'].','.$row->email;
				}
				$mail['message'] = $this->session->userdata('user_id').'から'.$mail['message'];
				$rtn = $this->sendmail($mail);
				//$rtn = FALSE;
				if(!$rtn){
					echo '<html><head>';
					echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';
					echo '</head><body>';
					echo '<h1>任務は新規できました。メールの送信に失敗しました。</h1>';
					echo anchor("ctm_mitumori",'戻す');
					echo '</body></html>';
					exit;
				}
				redirect('ctm_mitumori');
			}else{
				$this->load->view('header_view',$data);
				$this->load->view('ctm_menu_view',$data);
				$this->load->view('ctm_mitumori_create', $data);
				$this->load->view('footer_view',$data);
            }
		}
	}

	function Ka_Check()
	{
		if(isset($_POST['ka']))
		{
			if($_POST['ka'] == 4)
			{
				if(!isset($_POST['ka_sonota']) || empty($_POST['ka_sonota']))
				{
					$this->form_validation->set_message('Ka_Check', '%sが入力されていません。');
					return false;
				}
				else
				{
					return true;
				}
			}
		}
	}

	function Siji_Check()
	{
		if(isset($_POST['siji']))
		{
			if($_POST['siji'] == 1)
			{
				if(!isset($_POST['siji2']) || empty($_POST['siji2']))
				{
					$this->form_validation->set_message('Siji_Check', '%sが入力されていません。');
					return false;
				}
				else
				{
					return true;
				}
			}
			elseif($_POST['siji'] == 2)
			{
				if(!isset($_POST['siji3']) || empty($_POST['siji3']))
				{
					$this->form_validation->set_message('Siji_Check', '%sが入力されていません。');
					return false;
				}
				else
				{
					return true;
				}
			}
			elseif($_POST['siji'] == 5)
			{
				if(!isset($_POST['siji5']) || empty($_POST['siji5']))
				{
					$this->form_validation->set_message('Siji_Check', '%sが入力されていません。');
					return false;
				}
				else
				{
					return true;
				}
			}
		}
	}

	function Insert_Mitumori( $Post = 0)
	{

		if(isset($Post) && !empty($Post))
		{
			$Post = array_merge($Post, array('year' => date('Y')));
			$Post = array_merge($Post, array('month' => date('m')));
			$Post = array_merge($Post, array('day' => date('d')));

			if (isset($Post['tdkjikan']))
			{
				switch($Post['tdkjikan']){
					case '必着':
						$Post = array_merge($Post, array('sagyo_time' => $Post['tdkji'].':'.$Post['tdkfun']));
						break;
					case 'AM':
						$Post = array_merge($Post, array('sagyo_time' => 'AM'));
						break;
					case 'PM':
						$Post = array_merge($Post, array('sagyo_time' => 'PM'));
						break;
					case '終日':
						$Post = array_merge($Post, array('sagyo_time' => '終日'));
						break;
				}
			}
			else
			{
				$Post = array_merge($Post, array('sagyo_time' => ''));
			}

			if (isset($Post['hckjikan']))
			{
				switch($Post['hckjikan']){
					case '必着':
						$Post = array_merge($Post, array('jikan' => $Post['ji'].':'.$Post['fun']));
						break;
					case 'AM':
						$Post = array_merge($Post, array('jikan' => 'AM'));
						break;
					case 'PM':
						$Post = array_merge($Post, array('jikan' => 'PM'));
						break;
					case '終日':
						$Post = array_merge($Post, array('jikan' => '終日'));
						break;
				}
			}
			else
			{
				$Post = array_merge($Post, array('jikan' => ''));
			}

			if (isset($Post['ka']))
			{
				switch($Post['ka'])
				{
					case 0:
						$ka_temp = '封筒';
						break;
					case 1:
						$ka_temp = 'ﾀﾝﾎﾞｰﾙ';
						break;
					case 2:
						$ka_temp = '布ﾊﾞｯｸ';
						break;
					case 3:
						$ka_temp = 'ｼﾞｭﾗﾙｼﾝ';
						break;
					case 4:
						$ka_temp = $Post['ka_sonota'];
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
			$_POST = array_merge($Post, array('ka' => $ka_temp));

			if (isset($Post['siji']))
			{
				switch($Post['siji'])
				{
					case 0:
						$siji_temp = '配達';
						break;
					case 1:
						if(isset($Post['siji2']))
						{
							$siji_temp = $Post['siji2'].'営業所止';
							break;
						}
						else
						{
							$siji_temp = "";
							break;
						}
					case 2:
						if(isset($Post['siji3']))
						{
							$siji_temp = $Post['siji3'].'空港止';
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
						if(isset($Post['siji5']))
						{
							$siji_temp = $Post['siji5'];
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

			$Post = array_merge($Post, array('siji' => $siji_temp));
			$Post = array_merge($Post, array('todoke_tel' => $Post['todoke_tel1'].'-'.$Post['todoke_tel2'].'-'.$Post['todoke_tel3']));

			$Post = $this->delArrayElementByKey($Post, 'todoke_tel1');
			$Post = $this->delArrayElementByKey($Post, 'todoke_tel2');
			$Post = $this->delArrayElementByKey($Post, 'todoke_tel3');

			$Post = array_merge($Post, array('ka_tel' => $Post['ka_tel1'].'-'.$Post['ka_tel2'].'-'.$Post['ka_tel3']));
			$Post = $this->delArrayElementByKey($Post, 'ka_tel1');
			$Post = $this->delArrayElementByKey($Post, 'ka_tel2');
			$Post = $this->delArrayElementByKey($Post, 'ka_tel3');

			$Post = $this->delArrayElementByKey($Post, 'ji');
			$Post = $this->delArrayElementByKey($Post, 'fun');
			$Post = $this->delArrayElementByKey($Post, 'file');
			$Post = $this->delArrayElementByKey($Post, 'ka_sonota');
			$Post = $this->delArrayElementByKey($Post, 'siji2');
			$Post = $this->delArrayElementByKey($Post, 'siji3');
			$Post = $this->delArrayElementByKey($Post, 'siji5');
			$Post = $this->delArrayElementByKey($Post, 'hckjikan');
			$Post = $this->delArrayElementByKey($Post, 'tdkjikan');
			$Post = $this->delArrayElementByKey($Post, 'tdkji');
			$Post = $this->delArrayElementByKey($Post, 'tdkfun');
			$Post = $this->delArrayElementByKey($Post, 'file_name');

			$Post['todoke_add2'] = $Post['todoke_add2'].','.$Post['todoke_add22'];
			$Post = $this->delArrayElementByKey($Post, 'todoke_add22');
			$Post['ka_add2'] = $Post['ka_add2'].','.$Post['ka_add22'];
			$Post = $this->delArrayElementByKey($Post, 'ka_add22');


			$Post = $this->delArrayElementByKey($Post, 'x');
			$Post = $this->delArrayElementByKey($Post, 'y');
			$Post = array_merge($Post, array('flag' => 1));
			$Post = array_merge($Post, array('create_date' => date('Y-m-d')));
			$Post = array_merge($Post, array('from_id' => $this->session->userdata('user_id')));
			$this->db->insert('sagyo', $Post);
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