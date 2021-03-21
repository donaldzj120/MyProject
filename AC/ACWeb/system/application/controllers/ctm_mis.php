<?php
include('qdmail.php');

class Ctm_mis extends Controller {


	function index()
	{

		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 3 )
		redirect('login');

		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['statusText'] = $this->mylabels->statusText;
		$data['cancelmismsg'] = $this->mylabels->cancelmismsg;

		$data['new'] = anchor('ctm_mis/1', "<img src='".$data['base']."images/haisou_r1_c1.jpg' width='65' height='25' border='0' />");
		$data['doing'] = anchor('ctm_mis/2', "<img src='".$data['base']."images/haisou_r1_c3.jpg' width='65' height='25' border='0' />");
		$data['over'] = anchor('ctm_mis/3', "<img src='".$data['base']."images/haisou_r1_c5.jpg' width='65' height='25' border='0' />");
		//$data['del'] = anchor('ctm_mis/4', 'トル');
		$data['all'] = anchor('ctm_mis/9', "<img src='".$data['base']."images/haisou_r1_c7.jpg' width='65' height='25' border='0' />");
		$mission_status = '';
		$data['pageindex'] = '';

		$data['post'] = array(
				'mission_id' => '',
				'mission_id2' => '',
				'mission_status' => ''
				);

		$where = array(
			'from_id' =>'',
			'del_status' =>'',
			'mission_status' =>'',
			'order' =>'',
			'mission_id' => '',
			'mission_id2' => '',
			'adm_status' => 1,
			'limit' => 20,
			'offset' => 0
		);

		//display count per page
		$per_page = $this->config->item('per_page');
		//$offset = 0;
		$segs = $this->uri->segment_array();
		if(array_search("page",$segs) != false){
			if(isset($segs[array_search("page",$segs)+1])){
				//$offset = $segs[array_search("page",$segs)+1];
				$where['offset'] = $segs[array_search("page",$segs)+1];
				$config['uri_segment'] = array_search("page",$segs)+1;
			}
		}

		$where['from_id'] = $this->session->userdata('user_id');

		$url = $data['base'].'index.php/ctm_mis';

		if ($this->uri->segment(2) != FALSE){
			if($this->uri->segment(2) == 4 ){
				$where['del_status'] = 1;
			}else{
				$where['mission_status'] = $this->uri->segment(2) - 1;
			}

			$url = $data['base'].'index.php/ctm_mis/'.$this->uri->segment(2);
		}

		/*switch($mission_status){
			case 0:$where['order'] = "recv_date";break;
			case 1:$where['order'] = "fenpei_date";break;
			case 2:$where['order'] = "over_date";break;
			default:$where['order'] = "recv_date";
		}*/

		$query = $this->mission_model->SelectSagyo($where);

		$data['result_th'] = $this->mylabels->CtmMisTh;
		$data['result_td'] = $query;

		//---------------page------------------
		$total_rows = $this->mission_model->SelectSagyoCount($where);

		$this->load->library('pagination');

		$config['base_url'] = $url.'/page/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['num_links'] = 10;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//---------------------------------

		$this->load->view('header_view',$data);
		$this->load->view('ctm_menu_view',$data);
		$this->load->view('ctm_mis_view',$data);
		$this->load->view('footer_view',$data);
	}

	function deletemis(){

		if ($this->uri->segment(3) != FALSE){

			//update mission status
			$data = array('del_status' => 1);
			$this->db->where('id', $this->uri->segment(3));
			$this->db->update('mission', $data);

			$mail = $this->mylabels->ctmCanceledMis;
			$mail['fromname'] = $this->session->userdata('username').'　';
			$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
			$mail['frommail'] = $query->row()->email;
			$query = $this->db->get_where('users', array('authority' => 1));
			foreach ($query->result() as $row){
				$mail['to'] = $mail['to'].','.$row->email;
			}
			$this->db->where('id', $this->uri->segment(3));
			$query = $this->db->get('mission');
			$mail['message'] = $this->session->userdata('user_id').'が'.$query->row()->mission_id.'-'.$query->row()->mission_id2.$mail['message'];
			$rtn = $this->sendmail($mail);
			//$rtn = FALSE;
			if(!$rtn){
				echo '<h1>任務は更新できました。メールの送信に失敗しました。</h1>';
				echo anchor("ctm_mis",'戻す');
				exit;
			}
			redirect('ctm_mis');
		}
	}
/*
	function SelectSagyo($where){

			$sql = "";
			$sql = $sql . "SELECT ";
			$sql = $sql . "m.id as mid, m.mission_id as mid1, m.mission_id2 as mid2, m.mission_status, m.del_status, m.from_id as mfid, ";
			$sql = $sql . "s.id as id, s.sagyo_id1 as sid1, s.sagyo_id2 as sid2, ";
			$sql = $sql . "s.ka_name1 as name1, s.ka_name2 as name2, ";
			$sql = $sql . "s.ka_add1 as add1, s.ka_add2 as add2, s.ka_add3 as add3, ";
			$sql = $sql . "s.ka_tel as tel, ";
			$sql = $sql . "s.todoke_name1 as tname1, s.todoke_name2 as tname2, ";
			$sql = $sql . "s.todoke_add1 as tadd1, s.todoke_add2 as tadd2, s.todoke_add3 as tadd3, ";
			$sql = $sql . "s.todoke_tel as ttel, s.update_date ";
			$sql = $sql . "FROM mission as m, sagyo as s ";
			$sql = $sql . "WHERE m.mission_id = s.sagyo_id1 AND s.flag = 0 AND m.mission_id2 = s.sagyo_id2 ";
			$sql = $sql . "AND m.from_id = '".$where['from_id']."' AND s.from_id = '".$where['from_id']."'";
			if(!empty($where['del_status']))
				$sql = $sql . " AND m.del_status = ".$where['del_status'];
			if(!empty($where['mission_status'])){

				if($where['mission_status'] == 3){
					$where['mission_status'] = $where['mission_status'] - 1;
					$sql = $sql . " AND m.mission_status >= ".$where['mission_status'];
				}else if($where['mission_status'] == 2){
					$where['mission_status'] = $where['mission_status'] - 1;
					$sql = $sql . " AND m.mission_status <= ".$where['mission_status'];
				}
				else{
					$where['mission_status'] = $where['mission_status'] - 1;
					$sql = $sql . " AND m.mission_status = ".$where['mission_status'];
				}
			}
			//if(!empty($where['order']))
				$sql = $sql . " ORDER BY `update_date` DESC ";

		return $sql;
	}
*/
	function searchid(){


		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 3 )
		redirect('login');

		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['statusText'] = $this->mylabels->statusText;
		$data['cancelmismsg'] = $this->mylabels->cancelmismsg;

		$data['new'] = anchor('ctm_mis/1', "<img src='".$data['base']."images/haisou_r1_c1.jpg' width='65' height='25' border='0' />");
		$data['doing'] = anchor('ctm_mis/2', "<img src='".$data['base']."images/haisou_r1_c3.jpg' width='65' height='25' border='0' />");
		$data['over'] = anchor('ctm_mis/3', "<img src='".$data['base']."images/haisou_r1_c5.jpg' width='65' height='25' border='0' />");
		//$data['del'] = anchor('ctm_mis/4', 'トル');
		$data['all'] = anchor('ctm_mis', "<img src='".$data['base']."images/haisou_r1_c7.jpg' width='65' height='25' border='0' />");

		$mission_status = '';
		$data['pageindex'] = '';

		$data['post'] = $_POST;

		$where = array(
			'from_id' =>'',
			'del_status' =>'',
			'mission_id' =>'',
			'mission_id2' =>'',
			'mission_status' =>'',
			'order' =>''
		);

		$where['from_id'] = $this->session->userdata('user_id');

		$where['mission_id'] = $_POST['mission_id'];
		$where['mission_id2'] = $_POST['mission_id2'];
			//$where['mission_status'] = $_POST['mission_status'];
			/*
			switch($where['mission_status']){
				case 0:$where['order'] = "recv_date";break;
				case 1:$where['order'] = "fenpei_date";break;
				case 2:$where['order'] = "over_date";break;
				default:$where['order'] = "recv_date";
			}
			*/
		$sql = $this->searchsagyo($where);

		$query = $this->db->query($sql);

		$data['result_th'] = $this->mylabels->CtmMisTh;
		$data['result_td'] = $query->result_array();


		$this->load->view('header_view',$data);
		$this->load->view('ctm_menu_view',$data);
		$this->load->view('ctm_mis_view',$data);
		$this->load->view('footer_view',$data);
	}

	function searchsagyo($where){

		$sql = "";
		$sql = $sql . "SELECT ";
		$sql = $sql . "m.id as mid, m.mission_id as mid1, m.mission_id2 as mid2, m.mission_status, m.del_status, m.from_id as mfid, ";
		$sql = $sql . "s.id as id, s.sagyo_id1 as sid1, s.sagyo_id2 as sid2, ";
		$sql = $sql . "s.ka_name1 as name1, s.ka_name2 as name2, ";
		$sql = $sql . "s.ka_add1 as add1, s.ka_add2 as add2, s.ka_add3 as add3, ";
		$sql = $sql . "s.ka_tel as tel, ";
		$sql = $sql . "s.todoke_name1 as tname1, s.todoke_name2 as tname2, ";
		$sql = $sql . "s.todoke_add1 as tadd1, s.todoke_add2 as tadd2, s.todoke_add3 as tadd3, ";
		$sql = $sql . "s.todoke_tel as ttel ";
		$sql = $sql . "FROM mission as m, sagyo as s ";
		$sql = $sql . "WHERE m.mission_id = s.sagyo_id1 AND m.mission_id2 = s.sagyo_id2 ";
		//$sql = $sql . "AND m.mission_id LIKE '".$where['mission_id']."%' ";
		//$sql = $sql . "AND m.mission_id2 LIKE '".$where['mission_id2']."%' ";
		$sql = $sql . "AND m.from_id = '".$where['from_id']."' AND s.from_id = '".$where['from_id']."'";
		/*if(!empty($where['mission_status'])){
			$where['mission_status'] = $where['mission_status'] - 1;
			$sql = $sql . " AND m.mission_status = ".$where['mission_status'];
		}*/
		if(!empty($where['mission_id'])){
			$sql = $sql . "AND m.mission_id LIKE '".$where['mission_id']."%' ";
		}
		if(!empty($where['mission_id2'])){
			$sql = $sql . "AND m.mission_id2 LIKE '".$where['mission_id2']."%' ";
		}
		//if(!empty($where['order']))
			//$sql = $sql . " ORDER BY ".$where['order'];
			$sql = $sql . " ORDER BY `update_date` DESC ";

		return $sql;
	}


	function sendmail($email = '')
	{
		//メールエンコーディング
		//mb_language("ja");
		//mb_internal_encoding("ISO-2022-JP");

		//fromエンコード

		$from  = $email['fromname'];

		//$from = mb_convert_encoding($from, "ISO-2022-JP","UTF-8");

		$from = 'From: "'.$from.'"<'.$email['frommail'].'.>';



		//subjectエンコード

		$subject  = $email['subject'];

		//$subject = mb_convert_encoding($subject, "ISO-2022-JP","UTF-8");



		//本文エンコード

		$mail = $email['message'];

		//$mail = mb_convert_encoding($mail,"ISO-2022-JP","UTF-8");




		//if (mb_send_mail($email['to'], $subject, $mail, $from)) {
		if (qd_send_mail( 'text' , $email['to'], $subject, $mail, $from)) {

		  return TRUE;//"メールが送信されました。";

		} else {

		  return FALSE;//"メールの送信に失敗しました。";

		}

	}
}