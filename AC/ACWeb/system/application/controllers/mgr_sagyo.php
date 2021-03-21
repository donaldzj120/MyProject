<?php
class Mgr_sagyo extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
		$this->load->helper('date');		$data['authority'] = $authority;
		$datestring = "%Y";
		$time = time();
		if ($this->uri->segment(2) != FALSE)
		{
			$year = $this->uri->segment(2);
		}
		else
		{
			$year = mdate($datestring, $time);
		}
		$data['result_th'] = $this->mylabels->SagyoTableTh;
		$sql = "";
		$sql = "SELECT year, month, day, SUM(`kosuu`) AS gosu, SUM(`jyuryo`) AS jyuryo, SUM(`kyori`) AS kyori, SUM(`kyori_kane`) AS kyori_kane, SUM(`gokei`) AS gokei, SUM(`futai_kane`) AS futai_kane, SUM(`kousoku`) AS kousoku, SUM(`cyusya_kane`) AS cyusya_kane ";
		$sql = $sql . "	FROM sagyo ";
		$sql = $sql . "	WHERE year = '" . $year . "' ";
		$sql = $sql . "	GROUP BY `year`,`month` ";
		$sql = $sql . "	ORDER BY month";

		$query = $this->db->query($sql);

		$data['result_td'] = $query->result_array();

		$this->db->select('sum(gokei) AS gokei');
		$this->db->where('year', $year);
		$this->db->from('sagyo');
		$query = $this->db->get();

		$data['nd_gokei'] = $query->result_array();
		$data['nd_gokei'] = $data['nd_gokei'][0]['gokei'];
		$data['nendo'] = $year;

		$year_list = array();

		$nendo_width = 0;
		for ($i = 2009; $i <= mdate($datestring, $time); $i++)
		{
			$nendo_width = $nendo_width + 1;
			$year_list[] = array(
				'nendo' => $i
			);
		}
		$data['nendo_width'] = 60 / $nendo_width;
		$data['year_list'] = $year_list;

		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['header'] = $this->mylabels->Header;
		$data['sagyo_tuika'] = $this->mylabels->sagyo_tuika;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_sagyo_view',$data);
		$this->load->view('footer_view',$data);

	}

	function sagyo_delete()
	{
		if ($this->uri->segment(2) != FALSE)
		{
			$sagyo_id = $this->uri->segment(2);
			//$this->DeleteUser($User_ID);
			$this->db->where('id', $sagyo_id);
			$this->db->delete('sagyo');
		}
		redirect('mgr_sagyo');
	}
}
?>