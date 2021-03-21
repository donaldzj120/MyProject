<?php
class Mgr_seikyusyo_meisai extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		$data['authority'] = $authority;

		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');
		$this->load->library('form_validation');
		//$this->load->library('mylabels');
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['formtable'] = $this->mylabels->SeikyusyoFormTableTh;
		$data['formlabels'] = $this->mylabels->SeikyusyoKakuninTableTh;
		$data['result_th'] = $this->mylabels->SeikyusyoMeisaiTableTh;
		$data['sagyo_kubun'] = $this->mylabels->sagyo_kubun;
		$data['sagyo_fudai'] = $this->mylabels->sagyo_fudai;
		$data['fulikomi_houhou'] = $this->mylabels->fulikomi_houhou;
		$data['fulikomi_saki'] = $this->mylabels->fulikomi_saki;
		$this->db->where('authority', 4);
		$this->db->orderby('username');
		$query = $this->db->get('users');
		$data['seikyusaiki'] = $query->result_array();
		if (isset($_POST['mode']) && $_POST['mode'] == 'kensaku')
		{
			$seikyu_from = $_POST['seikyu_from'];
			$seikyu_to = $_POST['seikyu_to'];
			$seikyusaki = $_POST['seikyusaki'];

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

			$data['seikyu_from'] = $_POST['seikyu_from'];
			$data['seikyu_to'] = $_POST['seikyu_to'];

			$data['showtb'] = TRUE;

			$this->db->where('user_id', $seikyusaki);
			$query = $this->db->get('users');
			$userlist = $query->result_array();
			$data['cs_id'] = $userlist[0]['user_id'];
			$data['cs_name'] = $userlist[0]['username'];
			$data['cs_jyusyo'] = $userlist[0]['user_info1'];

			$this->load->view('header_view',$data);
			$this->load->view('mgr_menu_view',$data);
			$this->load->view('mgr_seikyusyo_meisai_view',$data);
			$this->load->view('footer_view',$data);

		}
		elseif(isset($_POST['mode']) && $_POST['mode'] == 'kakunin')
		{
			$config = array(
			   array(
                     'field'   => 'seikyu_kingaku',
                     'label'   => $data['formtable']['kingaku'],
                     'rules'   => 'trim|required|max_length[10]|numeric'
                  ),
               array(
                     'field'   => 'kazei',
                     'label'   => $data['formtable']['kazei'],
                     'rules'   => 'trim|required|max_length[10]|numeric'
                  ),
               array(
                     'field'   => 'syohizei',
                     'label'   => $data['formtable']['syohizei'],
                     'rules'   => 'trim|required|max_length[10]|numeric'
                  ),
               array(
                     'field'   => 'hikazei_kosouku',
                     'label'   => $data['formtable']['kosoku'],
                     'rules'   => 'trim|required|max_length[10]|numeric'
                  ),
               array(
                     'field'   => 'hikazei_cyusya',
                     'label'   => $data['formtable']['cyusya'],
                     'rules'   => 'trim|required|max_length[10]|numeric'
                  ),
               array(
                     'field'   => 'sihara_kubun',
                     'label'   => $data['formtable']['siharau'],
                     'rules'   => 'trim'
                  ),
               array(
                     'field'   => 'furikomisaki',
                     'label'   => $data['formtable']['furikomi'],
                     'rules'   => 'trim'
                  )
            );

			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$data['ps'] = $_POST;
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

				$data['seikyu_from'] = $_POST['seikyu_from'];
				$data['seikyu_to'] = $_POST['seikyu_to'];

				$data['showtb'] = TRUE;

				$this->db->where('user_id', $seikyusaki);
				$query = $this->db->get('users');
				$userlist = $query->result_array();
				$data['cs_id'] = $userlist[0]['user_id'];
				$data['cs_name'] = $userlist[0]['username'];
				$data['cs_jyusyo'] = $userlist[0]['user_info1'];

				$this->load->view('header_view',$data);
				$this->load->view('mgr_menu_view',$data);
				$this->load->view('mgr_seikyusyo_meisai_view',$data);
				$this->load->view('footer_view',$data);
			}
			else
			{
				$data['ps'] = $_POST;

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
				$this->load->view('header_view',$data);
				$this->load->view('mgr_menu_view',$data);
				$this->load->view('mgr_seikyusyo_kakunin_view',$data);
				$this->load->view('footer_view',$data);
			}
		}
		else
		{
			$data['seikyu_from'] = date('Y-m-d');
			$data['seikyu_to'] = date('Y-m-d');
			$data['showtb'] = FALSE;
			$this->load->view('header_view',$data);
			$this->load->view('mgr_menu_view',$data);
			$this->load->view('mgr_seikyusyo_meisai_view',$data);
			$this->load->view('footer_view',$data);
		}
	}
}