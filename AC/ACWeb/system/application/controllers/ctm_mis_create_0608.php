<?php

class Ctm_mis_create extends Controller {

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 3 )
			redirect('login');

		$this->load->helper('date');

		$datestring = "%Y-%m-%d";
		$time = time();

		$data['hiccyaku_date'] = mdate($datestring, $time);
		$data['sagyo_date'] = mdate($datestring, $time);

		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
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
                     'rules'   => 'trim|required|alpha_numeric|max_length[10]|callback_repeatcheck'
                  ),
               array(
                     'field'   => 'sagyo_id2',
                     'label'   => $data['formlabels']['id'],
                     'rules'   => 'trim|required|alpha_numeric|max_length[10]'
                  ),
               array(
                     'field'   => 'todoke_tel1',
                     'label'   => $data['formlabels']['todoke_tel1'],
                     'rules'   => 'trim|required|numeric'
                  ),
               array(
                     'field'   => 'todoke_tel2',
                     'label'   => $data['formlabels']['todoke_tel2'],
                     'rules'   => 'trim|required|numeric'
                  ),
               array(
                     'field'   => 'todoke_tel3',
                     'label'   => $data['formlabels']['todoke_tel3'],
                     'rules'   => 'trim|required|numeric'
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
                     'rules'   => 'trim|required|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_name2',
                     'label'   => $data['formlabels']['todoke_name'],
                     'rules'   => 'trim|required|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_post',
                     'label'   => $data['formlabels']['todoke_post'],
                     'rules'   => 'trim|numeric|min_length[7]|max_length[7]'
                  ),
               array(
                     'field'   => 'ka_tel1',
                     'label'   => $data['formlabels']['ka_tel1'],
                     'rules'   => 'trim|required|numeric'
                  ),
               array(
                     'field'   => 'ka_tel2',
                     'label'   => $data['formlabels']['ka_tel2'],
                     'rules'   => 'trim|required|numeric'
                  ),
               array(
                     'field'   => 'ka_tel3',
                     'label'   => $data['formlabels']['ka_tel3'],
                     'rules'   => 'trim|required|numeric'
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
                     'rules'   => 'trim|required|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_name2',
                     'label'   => $data['formlabels']['ka_name'],
                     'rules'   => 'trim|required|max_length[100]'
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
               /*array(
                     'field'   => 'bikou',
                     'label'   => $data['formlabels']['bikou'],
                     'rules'   => 'trim|max_length[200]'
                  ),*/
               array(
                     'field'   => 'tokki',
                     'label'   => $data['formlabels']['tokki'],
                     'rules'   => 'trim|max_length[500]'
                  )
               /*array(
                     'field'   => 'file',
                     'label'   => $data['formlabels']['file'],
                     'rules'   => 'trim'
                  )*/
        );

		$this->form_validation->set_rules($config);

		$data['ps'] = $this->mylabels->Header;

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header_view',$data);
			$this->load->view('ctm_menu_view',$data);
			$this->load->view('ctm_mis_create_view',$data);
			$this->load->view('footer_view',$data);
		}else{
			$data['ps'] = $_POST;

			$year = substr($_POST['hiccyaku1'],0,4);
			$month = substr($_POST['hiccyaku1'],5,2);
			$day = substr($_POST['hiccyaku1'],8,2);

			$year = $year - 1988;
			$data['hiduke'] = '平成'.$year.'年'.$month.'月'.$day.'日';

			if (isset($_POST['hckjikan']))
			{
				switch($_POST['hckjikan']){
					case '必着':
						$jikan = $_POST['ji'].':'.$_POST['fun'];
						break;
					case 'AM':
						$jikan = 'AM';
						break;
					case 'PM':
						$jikan = 'PM';
						break;
					case '終日':
						$jikan = '終日';
						break;
				}
			}
			else
			{
				$jikan = '';
			}
			$data['hiduke'] .= ' '.$jikan;

			$hiccyaku = $_POST['sagyo_date'];

			$week = date('w', strtotime($hiccyaku));

			$hiccyaku = substr($hiccyaku, 5, 2).'月'.substr($hiccyaku, 8, 2).'日';

			if (isset($_POST['tdkjikan']))
			{
				switch($_POST['tdkjikan']){
					case '必着':
						$jikan = $_POST['tdkji'].':'.$_POST['tdkfun'];
						break;
					case 'AM':
						$jikan = 'AM';
						break;
					case 'PM':
						$jikan = 'PM';
						break;
					case '終日':
						$jikan = '終日';
						break;
				}
			}
			else
			{
				$jikan = '';
			}

			$data['hiccyaku'] = $hiccyaku.'('.$this->Week($week).')'.' '.$jikan;

			if (isset($_POST['ka']))
			{
				$ka = $this->Ka($_POST['ka']);

				if($ka == '')
				{
					$ka = $_POST['ka_sonota'];
				}
			}
			else
			{
				$ka = '';
			}

			$data['ka'] = $ka;

			if(isset($_POST['siji']))
			{
				switch($_POST['siji'])
				{
					case 0:
						$temp = '配達';
						break;
					case 1:
						$temp = $_POST['siji2'].'営業所止';
						break;
					case 2:
						$temp = $_POST['siji3'].'空港止';
						break;
					case 3:
						$temp = 'チャーター';
						break;
					case 4:
						$temp = $_POST['siji5'];
						break;
					default:
						$temp = '';
						break;
				}
			}
			else
			{
				$temp = '';
			}
			$data['siji'] = $temp;		if(isset($_POST) && !empty($_POST))		{			$upload_data['file_name'] = '';			$data['file_name'] = $upload_data['file_name'];			$data['uploaderror'] = '添付ファイルはありません。';			if(!empty($_FILES["userfile"]["name"])){				//ファイルのアップロード				$config['upload_path'] = './siryo/';				$config['allowed_types'] = 'pdf|doc|xls|txt|jpg';				$config['file_name'] = $this->session->userdata('user_id').'_'.date('YmdHis');				$this->load->library('upload', $config);				if (!$this->upload->do_upload())				{					$data['uploaderror'] = $this->upload->display_errors();				}else{					$upload_data = $this->upload->data();					$data['uploaderror'] = $upload_data['file_name'];					$data['file_name'] = $upload_data['file_name'];				}			}		}
			$data['formlabels'] = $this->mylabels->CtmKakuninMisForm;

			$this->load->view('header_view',$data);
			$this->load->view('ctm_menu_view',$data);
			$this->load->view('ctm_mis_kakunin_view',$data);
			$this->load->view('footer_view',$data);
		}
	}

	function Week($week)
	{
		switch($week)
		{
			case 0:
				$yobi = '日';
				break;
			case 1:
				$yobi = '月';
				break;
			case 2:
				$yobi = '火';
				break;
			case 3:
				$yobi = '水';
				break;
			case 4:
				$yobi = '木';
				break;
			case 5:
				$yobi = '金';
				break;
			case 6:
				$yobi = '土';
				break;
		}
		return $yobi;
	}

	function Ka($ka)
	{
		switch($ka)
		{
			case 0:
				$temp = '封筒';
				break;
			case 1:
				$temp = 'ﾀﾞﾝﾎﾞｰﾙ';
				break;
			case 2:
				$temp = '布ﾊﾞｯｸﾞ';
				break;
			case 3:
				$temp = 'ｼﾞｭﾗﾙﾐﾝ';
				break;
			default:
				$temp = '';
				break;
		}
		return $temp;
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

	function repeatcheck($str)
	{
		$where = array('sagyo_id1' => $str,'sagyo_id2' => $_POST['sagyo_id2'],
					'from_id' => $this->session->userdata('user_id'));
		$query = $this->db->get_where('sagyo', $where);
		if ($query->num_rows() > 0)
		{
			$this->form_validation->set_message('repeatcheck', '伝票IDは重複です。');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}