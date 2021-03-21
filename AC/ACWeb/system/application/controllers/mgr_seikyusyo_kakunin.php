<?php
class Mgr_seikyusyo_kakunin extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');		$data['authority'] = $authority;
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
			$this->load->library('Seikyusyo');
			$seikyu_from = $_POST['seikyu_from'];
			$seikyu_to = $_POST['seikyu_to'];
			$seikyusaki = $_POST['seikyusaki_id'];
			list($year, $month, $day) = explode ('-', $seikyu_from);
			$seikyu_from = date("Y-m-d H:i:s", mktime(0,0,0,$month,$day,$year));
			list($year, $month, $day) = explode ('-', $seikyu_to);
			$seikyu_to = date("Y-m-d H:i:s", mktime(23,59,59,$month,$day,$year));
			$sql = "";
			$sql = $sql . "SELECT mis.recv_date as recv_date, sg.ka_add1 as ka_add1, sg.ka_add2 as ka_add2, sg.ka_add3 as ka_add3, sg.todoke_add1 as todoke_add1, ";
			$sql = $sql . "sg.todoke_add2 as todoke_add2, sg.todoke_add3 as todoke_add3, sg.kosuu as kosuu, sg.jyuryo as jyuryo, sg.kubun as kubun, sg.sonota as sonota, ";
			$sql = $sql . "sg.kyori as kyori, sg.kousoku as kousoku, sg.cyusya_kane as cyusya_kane, sg.bikou as bikou, sg.futai_kane as futai_kane, sg.kihon as kihon, sg.futai_sagyo as futai_sagyo ";
			$sql = $sql . "FROM mission as mis, sagyo as sg ";
			$sql = $sql . "WHERE mis.mission_id = sg.sagyo_id1 AND mis.mission_id2 = sg.sagyo_id2 AND mis.from_id = sg.from_id ";
			$sql = $sql . "AND mis.recv_date >= '$seikyu_from' AND mis.recv_date <= '$seikyu_to' AND mis.from_id = '$seikyusaki' AND mis.mission_status = 2 ";
			$sql = $sql . "ORDER BY mis.recv_date";

			$query = $this->db->query($sql);

			$data['seikyumeisai'] = $query->result_array();

			$sql = "";
			$sql = $sql . "SELECT ";
			$sql = $sql . "sum(sg.kousoku) as kousoku, sum(sg.cyusya_kane) as cyusya_kane, sum(sg.futai_kane) as futai_kane, sum(sg.kihon) as kihon ";
			$sql = $sql . "FROM mission as mis, sagyo as sg ";
			$sql = $sql . "WHERE mis.mission_id = sg.sagyo_id1 AND mis.mission_id2 = sg.sagyo_id2 AND mis.from_id = sg.from_id ";
			$sql = $sql . "AND mis.recv_date >= '$seikyu_from' AND mis.recv_date <= '$seikyu_to' AND mis.from_id = '$seikyusaki' AND mis.mission_status = 2 ";

			$query = $this->db->query($sql);
			$gokei = $query->result_array();
			$data['gokei'] = $gokei[0];

			$file_name = date('YmdHis').'.xls';

	        $this->seikyusyo->send($_POST, $data['seikyumeisai'], $data['gokei'], $file_name);

			$_POST = array_merge($_POST, array('seikyu_hiduke' => date('Y-m-d')));
			$_POST = array_merge($_POST, array('creatdate' => date('Y-m-d H:i:s')));
			$_POST = array_merge($_POST, array('file' => $file_name));
			$_POST = $this->delArrayElementByKey($_POST, 'x');
			$_POST = $this->delArrayElementByKey($_POST, 'y');
			$_POST = $this->delArrayElementByKey($_POST, 'mode');

			$this->db->insert('seikyusyo', $_POST);
			redirect('mgr_seikyusyo');

		//}
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