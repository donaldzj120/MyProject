<?php

class Dl_nouhin extends Controller {

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
		if ($this->uri->segment(3) == true){
			$id = $this->uri->segment(3);
			$this->db->select('id, mission_id, mission_id2, from_id');
			$query = $this->db->get_where('mission', array('id' => $id));
			$data['formlabels'] = $this->mylabels->MissionShowForm;
			$td = $query->result_array();
			$mission_data = $td[0];

			$this->db->where('sagyo_id1', $mission_data['mission_id']);
			$this->db->where('sagyo_id2', $mission_data['mission_id2']);
			$this->db->where('from_id', $mission_data['from_id']);
			$query = $this->db->get('sagyo');
			$mission_data = $query->result_array();

			$year = substr($mission_data[0]['sagyo_date'],0,4);
			$month = substr($mission_data[0]['sagyo_date'],5,2);
			$day = substr($mission_data[0]['sagyo_date'],8,2);

			$year = $year - 1988;
			$data['year'] = '平成'.$year.'年';
			$data['month'] = $month.'月';
			$data['day'] = $day.'日';

			$week = date('w', strtotime($mission_data[0]['hiccyaku1']));

			$hiccyaku = substr($mission_data[0]['hiccyaku1'], 5, 2).'月'.substr($mission_data[0]['hiccyaku1'], 8, 2).'日';

			if(substr($mission_data[0]['jikan'], 0, 2) == '00' && substr($mission_data[0]['jikan'], 3, 2) == '00')
			{
				$data['hiccyaku'] = $hiccyaku.'('.$this->Week($week).')';
			}
			else
			{
				$data['hiccyaku'] = $hiccyaku.'('.$this->Week($week).')'.' '.substr($mission_data[0]['jikan'], 0, 5);
			}

			if ($this->uri->segment(2) == true)
			{
				$data['kubun'] = $this->uri->segment(2);
			}

			$data['ps'] = $mission_data[0];
			//$data['id'] = $id;
			$this->load->view('header_view',$data);
			$this->load->view('mgr_nouhin_view',$data);
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