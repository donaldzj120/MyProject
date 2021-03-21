<?phpinclude('qdmail.php');
class Mgr_Mitumori_update extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');		/*
		if ($this->uri->segment(2) != FALSE){
			$id = $this->uri->segment(2);
		}		else		{			$id = $_POST['id'];		}		*/		$this->load->helper('date');		$datestring = "%Y-%m-%d";		$time = time();		$data['hiccyaku_date'] = mdate($datestring, $time);		$data['sagyo_date'] = mdate($datestring, $time);		$data['query'] = '';		$data['ka'] = '';		$data['siji'] = '';		if(isset($_POST['uploadedfile']))		{			$data['uploadedfile'] = $_POST['uploadedfile'].'1';		}		if(!empty($_POST) ){			$data['id'] = $_POST['id'];			if(isset($_POST['ka']) ){				$data['ka'] = $_POST['ka'];			}			if(isset($_POST['siji']) ){				$data['siji'] = $_POST['siji'];			}		}		if ($this->uri->segment(2) != FALSE){			$data['id'] = $this->uri->segment(2);			$query = $this->db->get_where('sagyo',			array('id' => $this->uri->segment(2)));			$data['query'] = $query->result_array();			$data['query'] = $data['query'][0];			/*if(isset($_POST['uploadedfile']))			{				$data['uploadedfile'] = $_POST['uploadedfile'];			}else{				//$this->db->where('mission_id', $data['query']['sagyo_id1']);				//$this->db->where('mission_id2', $data['query']['sagyo_id2']);				$this->db->where('id', $this->uri->segment(2));				$mquery = $this->db->get('mission');				if(!empty($mquery) && $mquery != NULL)				{					$data['uploadedfile'] = $mquery->row()->siryo;				}			}*/			if(isset($data['query']['ka_tel']) && !empty($data['query']['ka_tel']))	      	{	      		$katel = split('-',$data['query']['ka_tel']);	      		$data['ka_tel1'] = $katel[0];	      		$data['ka_tel2'] = $katel[1];	      		$data['ka_tel3'] = $katel[2];	      	}			if(isset($data['query']['todoke_tel']) && !empty($data['query']['todoke_tel']))	      	{	      		$katel = split('-',$data['query']['todoke_tel']);	      		$data['todoke_tel1'] = $katel[0];	      		$data['todoke_tel2'] = $katel[1];	      		$data['todoke_tel3'] = $katel[2];	      	}			if (isset($data['query']['ka']))			{				switch($data['query']['ka'])				{					case 0:						$ka_temp = '封筒';						break;					case 1:						$ka_temp = 'ﾀﾝﾎﾞｰﾙ';						break;					case 2:						$ka_temp = '布ﾊﾞｯｸ';						break;					case 3:						$ka_temp = 'ｼﾞｭﾗﾙｼﾝ';						break;					case 4:						$ka_temp = $data['query']['ka_sonota'];						break;					default:						$ka_temp = '';						break;				}			}			else			{				$ka_temp = '';			}			$data['ka_temp'] = $ka_temp;			if (isset($data['query']['siji']))			{				switch($data['query']['siji'])				{					case 0:						$siji_temp = '配達';						break;					case 1:						if(isset($data['query']['siji2']))						{							$siji_temp = $data['query']['siji2'].'営業所止';							break;						}						else						{							$siji_temp = "";							break;						}					case 2:						if(isset($data['query']['siji3']))						{							$siji_temp = $data['query']['siji3'].'空港止';							break;						}						else						{							$siji_temp = "";							break;						}					case 3:						$siji_temp = 'チャーター';						break;					case 4:						if(isset($data['query']['siji5']))						{							$siji_temp = $data['query']['siji5'];							break;						}						else						{							$siji_temp = "";							break;						}					default:						$siji_temp = '';						break;				}			}			else			{				$siji_temp = '';			}			$data['siji_temp'] = $siji_temp;		}
		$this->load->library('form_validation');
		//$data['formlabes'] = $this->mylabels->CtmCreateMisForm;
		$data['formlabels'] = $this->mylabels->CtmCreateMisForm;		$data['header'] = $this->mylabels->Header;
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
		{			$data['authority'] = $authority;
			$this->load->view('header_view',$data);
			$this->load->view('mgr_menu_view',$data);
			$this->load->view('mgr_mitumori_update_view', $data);
			$this->load->view('footer_view',$data);
		}
		else
		{
			if($this->Update_Mitumori($_POST)){				//send to custom				$mail = $this->mylabels->mgrMitumoriUpdate;				$mail['fromname'] = $this->session->userdata('username').'　';				if($mail['fromname'] != $this->config->item('admin')){					$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));					$mail['frommail'] = $query->row()->email;				}else{					$mail['frommail'] = "admin@ac.com";				}				/*				$query = $this->db->get_where('mitumori', array('id' => $_POST['id']));				*/				$this->db->where('id', $_POST['id']);				$query = $this->db->get('sagyo');				$data['query'] = $query->result_array();				$data['query'] = $data['query'][0];				$query = $this->db->get_where('users', array('user_id' => $data['query']['from_id']));				$mail['to'] = $query->row()->email;				$mail['message'] = $mail['message'];				/*				echo '<pre>';				print_r($mail);				echo '</pre>';				exit();				*/				$rtn = $this->sendmail($mail);				if(!$rtn){					echo '<html><head>';					echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';					echo '</head><body>';					echo '<h1>見積返信できました。メールの送信に失敗しました。</h1>';					echo anchor("mgr_mitumori",'戻す');					echo '</body></html>';					exit;				}
				redirect('mgr_mitumori');
			}else{				$data['authority'] = $authority;
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
		{			$id = $Post['id'];
			$Post = $this->delArrayElementByKey($Post, 'id');
			$Post = $this->delArrayElementByKey($Post, 'x');
			$Post = $this->delArrayElementByKey($Post, 'y');

			$Post = array_merge($Post, array('hensin' => 1));
			$this->db->where('id', $id);			$this->db->where('from_id', $Post['from_id']);
			$this->db->update('sagyo', $Post);
			return true;
		}
		else		{			return false;		}
	}
	// This function deletes a element in an array, by giving it the name of a key.
	function delArrayElementByKey($array_with_elements, $key_name) {
		$key_index = array_keys(array_keys($array_with_elements), $key_name);
		if (count($key_index) != '') {
			// Es gibt dieses Element (mindestens einmal) in diesem Array, wir loeschen es:
			array_splice($array_with_elements, $key_index[0], 1);
		}
		return $array_with_elements;
	}// End function delArrayElementByKey	function sendmail($email = '')	{		//メールエンコーディング		//mb_language("ja");		//mb_internal_encoding("ISO-2022-JP");		//fromエンコード		$from  = $email['fromname'];		//$from = mb_convert_encoding($from, "ISO-2022-JP","UTF-8");		$from = 'From: "'.$from.'"<'.$email['frommail'].'>';		//subjectエンコード		$subject  = $email['subject'].'　';		//$subject = mb_convert_encoding($subject, "ISO-2022-JP","UTF-8");		//本文エンコード		$mail = $email['message'];		//$mail = mb_convert_encoding($mail,"ISO-2022-JP","UTF-8");		//if (mb_send_mail($email['to'], $subject, $mail, $from)) {		if (qd_send_mail( 'text' , $email['to'], $subject, $mail, $from)) {		  return TRUE;//"メールが送信されました。";		} else {		  return FALSE;//"メールの送信に失敗しました。";		}		return FALSE;	}
}