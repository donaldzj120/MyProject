<?php
class Mgr_Mitumori_Confirm extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');		$this->load->helper('date');		$datestring = "%Y-%m-%d";		$time = time();		$data['hiccyaku_date'] = mdate($datestring, $time);		$data['sagyo_date'] = mdate($datestring, $time);		$data['query'] = '';		$data['ka'] = '';		$data['siji'] = '';		if(isset($_POST['uploadedfile']))		{			$data['uploadedfile'] = $_POST['uploadedfile'].'1';		}		if(!empty($_POST) ){			$data['id'] = $_POST['id'];			if(isset($_POST['ka']) ){				$data['ka'] = $_POST['ka'];			}			if(isset($_POST['siji']) ){				$data['siji'] = $_POST['siji'];			}		}		if ($this->uri->segment(2) != FALSE){			$data['id'] = $this->uri->segment(2);			$query = $this->db->get_where('sagyo',			array('id' => $this->uri->segment(2)));			$data['query'] = $query->result_array();			$data['query'] = $data['query'][0];			if(isset($data['query']['ka_tel']) && !empty($data['query']['ka_tel']))	      	{	      		$katel = split('-',$data['query']['ka_tel']);	      		$data['ka_tel1'] = $katel[0];	      		$data['ka_tel2'] = $katel[1];	      		$data['ka_tel3'] = $katel[2];	      	}			if(isset($data['query']['todoke_tel']) && !empty($data['query']['todoke_tel']))	      	{	      		$katel = split('-',$data['query']['todoke_tel']);	      		$data['todoke_tel1'] = $katel[0];	      		$data['todoke_tel2'] = $katel[1];	      		$data['todoke_tel3'] = $katel[2];	      	}			if (isset($data['query']['ka']))			{				switch($data['query']['ka'])				{					case 0:						$ka_temp = '封筒';						break;					case 1:						$ka_temp = 'ﾀﾝﾎﾞｰﾙ';						break;					case 2:						$ka_temp = '布ﾊﾞｯｸ';						break;					case 3:						$ka_temp = 'ｼﾞｭﾗﾙｼﾝ';						break;					case 4:						$ka_temp = $data['query']['ka_sonota'];						break;					default:						$ka_temp = '';						break;				}			}			else			{				$ka_temp = '';			}			$data['ka_temp'] = $ka_temp;			if (isset($data['query']['siji']))			{				switch($data['query']['siji'])				{					case 0:						$siji_temp = '配達';						break;					case 1:						if(isset($data['query']['siji2']))						{							$siji_temp = $data['query']['siji2'].'営業所止';							break;						}						else						{							$siji_temp = "";							break;						}					case 2:						if(isset($data['query']['siji3']))						{							$siji_temp = $data['query']['siji3'].'空港止';							break;						}						else						{							$siji_temp = "";							break;						}					case 3:						$siji_temp = 'チャーター';						break;					case 4:						if(isset($data['query']['siji5']))						{							$siji_temp = $data['query']['siji5'];							break;						}						else						{							$siji_temp = "";							break;						}					default:						$siji_temp = '';						break;				}			}			else			{				$siji_temp = '';			}			$data['siji_temp'] = $siji_temp;		}

		$data['formlabels'] = $this->mylabels->CtmCreateMisForm;		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');

		$data['authority'] = $authority;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_mitumori_confirm_view', $data);
		$this->load->view('footer_view',$data);

	}
}