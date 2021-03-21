<?php
class Mgr_sagyo_meisai extends Controller {

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
		$data['authority'] = $authority;

		$this->load->helper('date');
		if ($this->uri->segment(2) != FALSE)
		{
			$year = $this->uri->segment(2);
		}
		else
		{
			$year = $_POST['year'];
		}
		if ($this->uri->segment(3) != FALSE)
		{
			$month = $this->uri->segment(3);
		}
		else
		{
			$month = $_POST['month'];
		}
		if ($this->uri->segment(4) != FALSE)
		{
			$day = $this->uri->segment(4);
		}
		elseif (isset($_POST['day']))
		{
			$day = $_POST['day'];
		}
		else
		{
			$datestring = "%d";
			$time = time();
			$day = mdate($datestring, $time);
		}
		if (isset($_POST['mode']) && $_POST['mode'] == 'excel')
		{
			$this->excel($year,$month,$day);
		}
		$this->db->select('day');
		$this->db->where('year', $year);
		$this->db->where('month', $month);
		$this->db->orderby('day');
		$this->db->groupby('day');
		$query = $this->db->get('sagyo');
		$data['result_date'] = $query->result_array();
		if ($day == 32)
		{
			$sql = "SELECT * FROM sagyo WHERE year = ' $year ' AND month = ' $month ' AND day = (SELECT min(day) FROM sagyo WHERE year = '$year' AND month = '$month') ";
			$query = $this->db->query($sql);
		}
		else
		{
			$this->db->where('year', $year);
			$this->db->where('month', $month);
			$this->db->where('day', $day);
			$query = $this->db->get('sagyo');
		}
		$data['result_th'] = $this->mylabels->SagyoMeisaiTableTh;
		$data['result_td'] = $query->result_array();
		$data['click_day'] = $data['result_td'][0]['day'];
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['header'] = $this->mylabels->Header;
		$data['sagyo_tuika'] = $this->mylabels->sagyo_tuika;
		$data['deletesagyomsg'] = $this->mylabels->deletesagyomsg;
		$data['year'] = $year;
		$data['month'] = $month;
		$data['sagyo_kubun'] = $this->mylabels->sagyo_kubun;
		$data['sagyo_fudai'] = $this->mylabels->sagyo_fudai;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_sagyo_meisai_view',$data);
		$this->load->view('footer_view',$data);

	}

	function excel($year, $month, $day)
	{
		$this->load->library('Excel');
		$this->load->helper('download');

		$this->db->where('year', $year);
		$this->db->where('month', $month);
		$this->db->where('day', $day);
		$query = $this->db->get('sagyo');

		$file_name = 'AC(' . $year . $month . $day . ')' . '.xls';

		$temp = $year - 1988;
		$temp = '平成'.$temp.'年'.$month.'月'.$day.'日';
        $this->excel->send($query->result_array(), $file_name, $temp, $day);
        $data = file_get_contents("excel/" . $file_name);

		$name = $file_name;

		force_download($name, $data);
	}
}
?>