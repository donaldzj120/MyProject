<?php

class Dl_mission_show extends Controller {

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 5 )
			redirect('login');
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		if ($this->uri->segment(2) == FALSE){
			echo 'Access Error!';
		}else{
			$id = $this->uri->segment(2);
			$this->db->select('id, mission_id, mission_id2, from_id, fileover');
			$query = $this->db->get_where('mission', array('id' => $id));
			$data['formlabels'] = $this->mylabels->MissionShowForm;
			$td = $query->result_array();
			$mission_data = $td[0];
			if(!empty($mission_data['fileover']))
			{
				$filename = mb_split('\.',$mission_data['fileover']);
				if($filename[1] == 'jpg' || $filename[1] == 'jpeg' || $filename[1] == 'png' || $filename[1] == 'gif')
				{
					$data['filename'] = $mission_data['fileover'];
				}
				else
				{
					$data['filename'] = "";
				}
			}
			else
			{
				$data['filename'] = "";
			}
			$this->db->where('sagyo_id1', $mission_data['mission_id']);
			$this->db->where('sagyo_id2', $mission_data['mission_id2']);
			$this->db->where('from_id', $mission_data['from_id']);
			$query = $this->db->get('sagyo');
			$mission_data = $query->result_array();
			$year = substr($mission_data[0]['sagyo_date'],0,4);
			$month = substr($mission_data[0]['sagyo_date'],5,2);
			$day = substr($mission_data[0]['sagyo_date'],8,2);
			$year = $year - 1988;
			$data['hiduke'] = '平成'.$year.'年'.$month.'月'.$day.'日'.' '.$mission_data[0]['jikan'];;

			$week = date('w', strtotime($mission_data[0]['hiccyaku1']));

			$hiccyaku = substr($mission_data[0]['sagyo_date'], 5, 2).'月'.substr($mission_data[0]['sagyo_date'], 8, 2).'日';

			if(substr($mission_data[0]['sagyo_time'], 0, 2) == '00' && substr($mission_data[0]['sagyo_time'], 3, 2) == '00')
			{
				$data['hiccyaku'] = $hiccyaku.'('.$this->Week($week).')';
			}
			else
			{
				$data['hiccyaku'] = $hiccyaku.'('.$this->Week($week).')'.' '.$mission_data[0]['sagyo_time'];
			}

			$data['ps'] = $mission_data[0];
			$data['id'] = $id;
			$this->load->view('header_view',$data);
			$this->load->view('dl_mission_show_view',$data);
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
}