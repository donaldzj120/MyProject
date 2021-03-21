<?php
class Mgr_sagyo_update extends Controller {

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
		$this->load->helper('date');
		$data['segment3'] =	$this->uri->segment(3);

		$data['authority'] = $authority;

		if ($this->uri->segment(2) != FALSE){
			$id = $this->uri->segment(2);
			$query = $this->db->get_where('sagyo', array('id' => $id));
			$data['td'] = $query->result_array();
			$data['td'] = $data['td'][0];
			$data['id'] = $id;
			$data['sagyo_id1'] = $data['td']['sagyo_id1'];
			$data['sagyo_id2'] = $data['td']['sagyo_id2'];

			if(isset($data['td']['ka_tel']) && !empty($data['td']['ka_tel']))
	      	{
	      		$katel = split('-',$data['td']['ka_tel']);
	      		$data['ka_tel1'] = $katel[0];
	      		$data['ka_tel2'] = $katel[1];
	      		$data['ka_tel3'] = $katel[2];
	      	}

			if(isset($data['td']['todoke_tel']) && !empty($data['td']['todoke_tel']))
	      	{
	      		$katel = split('-',$data['td']['todoke_tel']);
	      		$data['todoke_tel1'] = $katel[0];
	      		$data['todoke_tel2'] = $katel[1];
	      		$data['todoke_tel3'] = $katel[2];
	      	}

			$query = $this->db->get_where('users', array('user_id' => $data['td']['from_id']));
			$temp = $query->result_array();
			$data['username'] = $temp[0]['username'];
			$data['userid'] = $temp[0]['user_id'];
		}
		else
		{
			$data['id'] = $_POST['id'];
		}

		$this->load->library('form_validation');

		$data['formlabes'] = $this->mylabels->SagyoFormTableTh;

		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['header'] = $this->mylabels->Header;

		$datestring = "%Y-%m-%d";
		$time = time();
		$data['hiccyaku_date'] = mdate($datestring, $time);
		$data['sagyo_date'] = mdate($datestring, $time);

		if(!empty($_POST) ){

			if(isset($_POST['hiccyaku1']) ){
				$data['hiccyaku_date'] = $_POST['hiccyaku1'];
			}
			if(isset($_POST['sagyo_date']) ){
				$data['sagyo_date'] = $_POST['sagyo_date'];
			}
		}

		$this->db->where('authority', 4);
		$this->db->orderby('username');
		$query = $this->db->get('users');

		$data['uke'] = $query->result_array();

		$config = array(
               array(
                     'field'   => 'sagyo_id1',
                     'label'   => $data['formlabes']['sagyo_id'],
                     'rules'   => 'trim|required|max_length[10]'
                  ),
               array(
                     'field'   => 'sagyo_id2',
                     'label'   => $data['formlabes']['sagyo_id'],
                     'rules'   => 'trim|required|max_length[10]'
                  ),
               array(
                     'field'   => 'sagyo_date',
                     'label'   => $data['formlabes']['sagyo_date'],
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'from_id',
                     'label'   => $data['formlabes']['uke'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'todoke_tel1',
                     'label'   => $data['formlabes']['todoke_tel1'],
                     'rules'   => 'trim|required|numeric'
                  ),
               array(
                     'field'   => 'todoke_tel2',
                     'label'   => $data['formlabes']['todoke_tel2'],
                     'rules'   => 'trim|required|numeric'
                  ),
               array(
                     'field'   => 'todoke_tel3',
                     'label'   => $data['formlabes']['todoke_tel3'],
                     'rules'   => 'trim|required|numeric'
                  ),
               array(
                     'field'   => 'todoke_add1',
                     'label'   => $data['formlabes']['todoke_add'].$data['formlabes']['do'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_add2',
                     'label'   => $data['formlabes']['todoke_add'].$data['formlabes']['mati'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_add22',
                     'label'   => $data['formlabes']['todoke_add'].$data['formlabes']['mati'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_add3',
                     'label'   => $data['formlabes']['todoke_add'].$data['formlabes']['biru'],
                     'rules'   => 'trim|max_length[200]'
                  ),
               array(
                     'field'   => 'todoke_name1',
                     'label'   => $data['formlabes']['todoke_name'],
                     'rules'   => 'required|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_name2',
                     'label'   => $data['formlabes']['todoke_name'],
                     'rules'   => 'required|max_length[100]'
                  ),
               array(
                     'field'   => 'todoke_post',
                     'label'   => $data['formlabes']['todoke_post'],
                     'rules'   => 'trim|required|min_length[7]|max_length[7]'
                  ),
               array(
                     'field'   => 'ka_tel1',
                     'label'   => $data['formlabes']['ka_tel1'],
                     'rules'   => 'trim|required|numeric'
                  ),
               array(
                     'field'   => 'ka_tel2',
                     'label'   => $data['formlabes']['ka_tel2'],
                     'rules'   => 'trim|required|numeric'
                  ),
               array(
                     'field'   => 'ka_tel3',
                     'label'   => $data['formlabes']['ka_tel3'],
                     'rules'   => 'trim|required|numeric'
                  ),
               array(
                     'field'   => 'ka_name1',
                     'label'   => $data['formlabes']['niukejin'],
                     'rules'   => 'trim|required|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_name2',
                     'label'   => $data['formlabes']['niukejin'],
                     'rules'   => 'trim|required|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_add1',
                     'label'   => $data['formlabes']['jyusyo'].$data['formlabes']['do'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_add2',
                     'label'   => $data['formlabes']['jyusyo'].$data['formlabes']['mati'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_add22',
                     'label'   => $data['formlabes']['jyusyo'].$data['formlabes']['mati'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_add3',
                     'label'   => $data['formlabes']['jyusyo'].$data['formlabes']['biru'],
                     'rules'   => 'trim|max_length[100]'
                  ),
               array(
                     'field'   => 'ka_post',
                     'label'   => $data['formlabes']['ka_post'],
                     'rules'   => 'trim|required|min_length[7]|max_length[7]'
                  ),
               array(
                     'field'   => 'sagyo_date',
                     'label'   => $data['formlabes']['hiccyaku'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'tdkji',
                     'label'   => $data['formlabes']['ji'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'tdkfun',
                     'label'   => $data['formlabes']['fun'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'tdkjikan',
                     'label'   => $data['formlabes']['hiccyaku'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'hiccyaku1',
                     'label'   => $data['formlabes']['hiccyaku'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'hckjikan',
                     'label'   => $data['formlabes']['hiccyaku'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'ji',
                     'label'   => $data['formlabes']['ji'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'fun',
                     'label'   => $data['formlabes']['fun'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'egyou',
                     'label'   => $data['formlabes']['egyou'],
                     'rules'   => 'trim|max_length[50]'
                  ),
               /*array(
                     'field'   => 'kwe_no',
                     'label'   => $data['formlabes']['kwe_no'],
                     'rules'   => 'trim|max_length[20]'
                  ), */
               array(
                     'field'   => 'kihon',
                     'label'   => $data['formlabes']['kihon'],
                     'rules'   => 'trim|max_length[10]|numeric'
                  ),
               /*array(
                     'field'   => 'jikan',
                     'label'   => $data['formlabes']['jikan'],
                     'rules'   => 'trim'
                  ),*/
               array(
                     'field'   => 'kosuu',
                     'label'   => $data['formlabes']['gosu'],
                     'rules'   => 'trim|max_length[5]|numeric'
                  ),
               array(
                     'field'   => 'jyuryo',
                     'label'   => $data['formlabes']['jyuryo'],
                     'rules'   => 'trim|max_length[8]|numeric'
                  ),
               array(
                     'field'   => 'kubun',
                     'label'   => $data['formlabes']['kubun'],
                     'rules'   => 'trim|max_length[10]'
                  ),
               array(
                     'field'   => 'kyori',
                     'label'   => $data['formlabes']['kyori'],
                     'rules'   => 'trim|max_length[10]|numeric'
                  ),
               array(
                     'field'   => 'kyori_kane',
                     'label'   => $data['formlabes']['kyori_kane'],
                     'rules'   => 'trim|max_length[10]|numeric'
                  ),
               array(
                     'field'   => 'futai_sagyo[]',
                     'label'   => $data['formlabes']['futai_sagyo'],
                     'rules'   => 'trim|max_length[100]'
                  ),
				array(
                     'field'   => 'futai_kane',
                     'label'   => $data['formlabes']['futai_kane'],
                     'rules'   => 'trim|max_length[10]|numeric'
                  ),
				array(
                     'field'   => 'kousoku',
                     'label'   => $data['formlabes']['kousoku'],
                     'rules'   => 'trim|max_length[10]|numeric'
                  ),
				array(
                     'field'   => 'cyusya_kane',
                     'label'   => $data['formlabes']['cyusya_kane'],
                     'rules'   => 'trim|max_length[10]|numeric'
                  ),
                array(
                     'field'   => 'faxid',
                     'label'   => $data['formlabes']['faxkara'],
                     'rules'   => 'trim|max_length[40]'
                  ),
                array(
                     'field'   => 'sonota',
                     'label'   => $data['formlabes']['sonota'],
                     'rules'   => 'callback_Sonota_Check'
                  ),
				array(
                     'field'   => 'sagyo_year',
                     'label'   => 'sagyo_year',
                     'rules'   => 'trim|max_length[200]'
                  ),
				array(
                     'field'   => 'sagyo_month',
                     'label'   => 'sagyo_month',
                     'rules'   => 'trim|max_length[200]'
                  ),
				array(
                     'field'   => 'sagyo_day',
                     'label'   => 'sagyo_day',
                     'rules'   => 'trim|max_length[200]'
                  )
            );

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
			if(isset($_POST['from_id']))
			{
				$data['userid'] = $_POST['from_id'];
			}
			if(isset($_POST['sagyo_id1']))
			{
				$data['sagyo_id1'] = $_POST['sagyo_id1'];
			}
			if(isset($_POST['sagyo_id2']))
			{
				$data['sagyo_id2'] = $_POST['sagyo_id2'];
			}
			if(isset($_POST['username']))
			{
				$data['username'] = $_POST['username'];
			}
			/*
			if(isset($_POST['sagyo_year']))
			{
				$data['td']['year'] = $_POST['sagyo_year'];
			}
			if(isset($_POST['sagyo_month']))
			{
				$data['td']['month'] = $_POST['sagyo_month'];
			}
			if(isset($_POST['sagyo_day']))
			{
				$data['td']['day'] = $_POST['sagyo_day'];
			}
			*/
			$this->load->view('header_view',$data);
			$this->load->view('mgr_menu_view',$data);
			$this->load->view('mgr_sagyo_update_view', $data);
			$this->load->view('footer_view',$data);
		}
		else
		{
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
			if($this->Update_Sagyo($_POST)){

				if (!empty($_POST['segment3'])){
					redirect('mgr_kakunin');
				}
				/*$temp_date = $_POST['sagyo_date'];
				$year = substr($temp_date, 0, 4);
				$month = substr($temp_date, 5, 2);
				$day = substr($temp_date, 8, 2);*/				$year = $_POST['sagyo_year'];				$month = $_POST['sagyo_month'];				$day = $_POST['sagyo_day'];
				redirect('mgr_sagyo_meisai/' . $year . '/' . $month . '/' . $day);
			}else{
				$this->load->view('header_view',$data);
				$this->load->view('mgr_menu_view',$data);
				$this->load->view('mgr_sagyo_update', $data);
				$this->load->view('footer_view',$data);
			}
		}
	}
	function Update_Sagyo( $Post = 0)
	{
		$id = $Post['id'];

		if(isset($Post) && !empty($Post))
		{
			$faxid = $Post['faxid'];
			$sonota = false;
			if(isset($Post['futai_sagyo']))
			{
				$temp_list = $Post['futai_sagyo'];
				$temp = '';
				for($i = 0; $i < count($Post['futai_sagyo']); $i++)
				{
					$temp = $temp.$Post['futai_sagyo'][$i].',';
					if($Post['futai_sagyo'][$i] == 5)
					{
						$sonota = true;
					}
				}
				$temp = substr($temp, 0, strlen($temp)-1);
			}
			else
			{
				$temp = '';
			}
			$Post = array_merge($Post, array('todoke_tel' => $Post['todoke_tel1'].'-'.$Post['todoke_tel2'].'-'.$Post['todoke_tel3']));
			$Post = $this->delArrayElementByKey($Post, 'todoke_tel1');
			$Post = $this->delArrayElementByKey($Post, 'todoke_tel2');
			$Post = $this->delArrayElementByKey($Post, 'todoke_tel3');
			$Post = array_merge($Post, array('ka_tel' => $Post['ka_tel1'].'-'.$Post['ka_tel2'].'-'.$Post['ka_tel3']));
			$Post = $this->delArrayElementByKey($Post, 'ka_tel1');
			$Post = $this->delArrayElementByKey($Post, 'ka_tel2');
			$Post = $this->delArrayElementByKey($Post, 'ka_tel3');
			$Post = $this->delArrayElementByKey($Post, 'id');
			$Post = $this->delArrayElementByKey($Post, 'x');
			$Post = $this->delArrayElementByKey($Post, 'y');
			$Post = $this->delArrayElementByKey($Post, 'segment3');
			$Post = $this->delArrayElementByKey($Post, 'temp_year');
			$Post = $this->delArrayElementByKey($Post, 'temp_month');
			$Post = $this->delArrayElementByKey($Post, 'temp_day');
			$Post = $this->delArrayElementByKey($Post, 'faxid');
			$Post = $this->delArrayElementByKey($Post, 'username');
			$Post = $this->delArrayElementByKey($Post, 'tdkjikan');
			$Post = $this->delArrayElementByKey($Post, 'tdkji');
			$Post = $this->delArrayElementByKey($Post, 'tdkfun');
			$Post = $this->delArrayElementByKey($Post, 'hckjikan');
			$Post = $this->delArrayElementByKey($Post, 'ji');
			$Post = $this->delArrayElementByKey($Post, 'fun');
			//$Post = $this->delArrayElementByKey($Post, 'sagyo_date');			$Post = $this->delArrayElementByKey($Post, 'sagyo_year');			$Post = $this->delArrayElementByKey($Post, 'sagyo_month');			$Post = $this->delArrayElementByKey($Post, 'sagyo_day');
			if (!$sonota)
			{
				$Post = $this->delArrayElementByKey($Post, 'sonota');
			}
			$Post = $this->delArrayElementByKey($Post, 'futai_sagyo');
			//$Post = array_merge($Post, array('create_date' => date('Y/m/d H:i:s')));
			$Post = array_merge($Post, array('update_date' => date('Y/m/d H:i:s')));
			$Post = array_merge($Post, array('gokei' => $Post['kousoku'] + $Post['cyusya_kane'] + $Post['futai_kane'] + $Post['kyori_kane']));
			$Post = array_merge($Post, array('year' => date('Y')));
			$Post = array_merge($Post, array('month' => date('m')));
			$Post = array_merge($Post, array('day' => date('d')));
			$Post = array_merge($Post, array('futai_sagyo ' => $temp));

			$Post['todoke_add2'] = $Post['todoke_add2'].','.$Post['todoke_add22'];
			$Post = $this->delArrayElementByKey($Post, 'todoke_add22');
			$Post['ka_add2'] = $Post['ka_add2'].','.$Post['ka_add22'];
			$Post = $this->delArrayElementByKey($Post, 'ka_add22');

			$this->db->where('id', $id);
			$this->db->update('sagyo', $Post);

			if (isset($faxid) && !empty($faxid))
			{
				$this->db->set('mission_id', $Post['sagyo_id1']);
				$this->db->set('mission_id2', $Post['sagyo_id2']);
				$this->db->where('mission_id', $faxid);
				$this->db->where('from_id', $Post['from_id']);
				$this->db->update('mission');
			}
			return true;
		}
		else
			return false;
	}


	function sagyo_delete()
	{
		if ($this->uri->segment(2) !== FALSE)
		{
			$sagyo_id = $this->uri->segment(2);

			$this->db->where('id', $sagyo_id);
			$this->db->delete('sagyo');
		}
		if ($this->uri->segment(3) !== FALSE)
		{
			$year = $this->uri->segment(3);
		}
		if ($this->uri->segment(4) !== FALSE)
		{
			$month = $this->uri->segment(4);
		}
		if ($this->uri->segment(5) !== FALSE)
		{
			$day = $this->uri->segment(5);
		}
		redirect('mgr_sagyo_meisai/' . $year . '/' . $month . '/' . $day);
	}

	function Sonota_Check($str)
	{
		if(isset($_POST['futai_sagyo']))
        {
        	$futai_sagyo = $_POST['futai_sagyo'];
	        for($i=0; $i<count($futai_sagyo); $i++)
	        {
	        	if($futai_sagyo[$i] == 5)
	        	{
	        		if(!isset($_POST['sonota']) || empty($_POST['sonota']))
	        		{
	        			$this->form_validation->set_message('Sonota_Check', 'その他が入力されません。');
	        			return FALSE;
	        		}
	        		else
	        		{
	        			return TRUE;
	        		}
	        	}
	        }
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
}