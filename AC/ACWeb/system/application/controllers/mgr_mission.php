<?php
include('qdmail.php');

class Mgr_mission extends Controller {

	function Mgr_mission()
	{
		parent::Controller();
	}

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		//ログイン画面の判断
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');

		$this->load->library('mylabels');
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['downurl'] = $this->config->item('base_url').$this->config->item('pdf');
		$data['upurl'] = $this->config->item('base_url').$this->config->item('uploads');
		$data['siryo'] = $this->config->item('base_url').$this->config->item('siryo');
		$data['deletemismsg'] = $this->mylabels->deletemismsg;
		$data['cancelmismsg'] = $this->mylabels->cancelmismsg;

		//任務状態
		$data['new'] = anchor('mgr_mission/1', "<img src='".$data['base']."images/haisou_r1_c1.jpg' width='65' height='25' border='0' />");
		$data['doing'] = anchor('mgr_mission/2', "<img src='".$data['base']."images/haisou_r1_c3.jpg' width='65' height='25' border='0' />");
		$data['over'] = anchor('mgr_mission/3', "<img src='".$data['base']."images/haisou_r1_c5.jpg' width='65' height='25' border='0' />");
		$data['all'] = anchor('mgr_mission', "<img src='".$data['base']."images/haisou_r1_c7.jpg' width='65' height='25' border='0' />");

		$data['post'] = array(
				'mission_id' => '',
				'mission_id2' => '',
				'mission_status' => ''
				);
		$data['pageindex'] = '';

		$where = array(
				'mission_id' => '',
				'mission_id2' => '',
				'mission_status' => '',
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

		$url = $data['base'].'index.php/mgr_mission';

		if ($this->uri->segment(2) > 0){

			$url = $data['base'].'index.php/mgr_mission/'.$this->uri->segment(2);

			$where['mission_status'] = $this->uri->segment(2) - 1;

			$data['post']['mission_status'] = $this->uri->segment(2);
		}

		$data['result_th'] = $this->mylabels->MgrDtbMisThLabels;
		//任務リストの取得
		//$data['result_td'] = $this->mission_model->GetMissionInfo($mission_status, $per_page, $offset);
		$data['result_td'] = $this->mission_model->GetMissionInfo($where);
		//任務件数の取得
		$total_rows = $this->mission_model->GetMissionCount($where);

		//ドライバーの取得
		/*
		if($authority == 1 || $authority == 2)
		{
			$dlArray = $this->user_model->GetUserInfo('', 5);
		}
		else
		{
		*/
			$dlArray = $this->user_model->GetUserInfo($this->session->userdata('id'), 5);
		//}

		$data['dl'] = array('0'=>'-');
		foreach ($dlArray as $row)
		{
			$data['dl'] = $data['dl'] + array($row['user_id']=>$row['username']);
		}
		//下位会社の取得
		/*
		if($authority == 1 || $authority == 2)
		{
			$kaishaArray = $this->user_model->GetUserInfo('', 4);
		}
		else
		{
		*/
			$kaishaArray = $this->user_model->GetUserInfo($this->session->userdata('id'), 4);
		//}
		$data['kaisha'] = array('0'=>'-');
		foreach ($kaishaArray as $row)
		{
			$data['kaisha'] = $data['kaisha'] + array($row['user_id']=>$row['username']);
		}

		for ($i=0; $i<count($data['result_td']); $i++)
		{
		   $date = $this->getsagyotime(
				$data['result_td'][$i]['mission_id'],
				$data['result_td'][$i]['mission_id2'],
				$data['result_td'][$i]['from_id'] );
		   $data['result_td'][$i]['recv_date'] = $date['hiccyaku'];
		   $data['result_td'][$i]['fenpei_date'] = $date['hiduke'];
		}

		$data['statusText'] = $this->mylabels->statusText;

		//---------------page------------------
		$this->load->library('pagination');

		$config['base_url'] = $url.'/page/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['num_links'] = 10;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//---------------------------------

		$data['authority'] = $authority;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_mission_view',$data);
		$this->load->view('footer_view',$data);
	}

	function dtb_confirm()
	{
		$mail_to = "";

		if(!empty($_POST))
		{
			//任務ＩＤ
			$mis_id = $_POST['mis_id'];
			//ドライバー
			$dl_id = $_POST['doraiba'];
			//下位会社
			$kaisha_id = $_POST['kaisha'];
		}

		if(empty($dl_id) && empty($kaisha_id)){
			redirect("mgr_mission");
		}else{
			//下位会社を選択した場合
			if(!empty($kaisha_id))
			{
				$mail_to = $kaisha_id;

				$update = array(
					'fenpei_id' => $this->session->userdata('user_id'),
					'kaisha_id' => $kaisha_id,
					'mission_status' => 1,
					'fenpei_date' => date('Y/m/d H:i:s')
				);
			}
			//ドライバーを選択した場合
			else if(!empty($dl_id))
			{
				$mail_to = $dl_id;

				$update = array(
					'fenpei_id' => $this->session->userdata('user_id'),
					'zhixing_id' => $dl_id,
					'mission_status' => 1,
					'fenpei_date' => date('Y/m/d H:i:s')
				);
			}
			//任務情報の更新
			$this->mission_model->UpdateMission($update, $mis_id);

			//下位会社を選択した場合、任務の新規
			if(!empty($kaisha_id))
			{
				$this->mission_model->InsertMission($mis_id, $kaisha_id);
			}

			$query = $this->db->get_where('mission', array('id' => $mis_id));
			$mailmsg[0]['misid'] = $query->row()->mission_id.'-'.$query->row()->mission_id2;
			$mailmsg[0]['ctmid'] = $query->row()->from_id;

			$query = $this->db->get_where('users', array('user_id' => $mail_to));
			$runuser = $query->result_array();

			//send mail to dl
			$mail = $this->mylabels->mgrMisDistributedD;
			$mail['to'] = $runuser[0]['email'];
			//$admquery = $this->db->get_where('users', array('authority' => 1));
			//foreach ($admquery->result() as $row){
				//$mail['to'] = $mail['to'].','.$row->email;
			//}

			$mail['fromname'] = $this->session->userdata('username').'　';
			if($mail['fromname'] != $this->config->item('admin')){
				$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
				$mail['frommail'] = $query->row()->email;
			}
			$subject = $mail['message'];
			$mail['message'] = '';
			foreach($mailmsg as $msg){
				$mail['message'] .= $msg['ctmid'].'が'.$msg['misid'].$subject."\r\n";
			}
			$rtn = $this->sendmail($mail);
			//$rtn = FALSE;
			if(!$rtn){
				echo '<h1>配車できました。メールの送信に失敗しました。</h1>';
				echo anchor("mgr_mission",'戻す');
				exit;
			}
			if(!empty($mailmsg[0]['ctmid'])){
				//send to custom
				$mail = $this->mylabels->mgrMisDistributedC;
				$mail['fromname'] = $this->session->userdata('username').'　';
				if($mail['fromname'] != $this->config->item('admin')){
					$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
					$mail['frommail'] = $query->row()->email;
				}
				foreach($mailmsg as $msg){
					$query = $this->db->get_where('users', array('user_id' => $msg['ctmid']));
					$mail['to'] = $query->row()->email;
					$mail['message'] = $msg['misid'].$mail['message'];
					$rtn = $this->sendmail($mail);
				}
				if(!$rtn){
					echo '<h1>配車できました。メールの送信に失敗しました。</h1>';
					echo anchor("mgr_mission",'戻す');
					exit;
				}
			}
			redirect('mgr_mission/2');

		}
	}

	function getsagyotime( $id1, $id2, $fromid ){

		$this->db->where('sagyo_id1', $id1);

		$this->db->where('sagyo_id2', $id2);

		$this->db->where('from_id', $fromid);

		$query = $this->db->get('sagyo');

		$data = array( 'hiduke'=>'','hiccyaku'=>'');

		if ($query->num_rows() > 0){

			$mission_data = $query->result_array();

			//引取日時
			$year = substr($mission_data[0]['hiccyaku1'],0,4);

			$month = substr($mission_data[0]['hiccyaku1'],5,2);

			$day = substr($mission_data[0]['hiccyaku1'],8,2);

			$year = $year - 1988;

			$data['hiduke'] = '平成'.$year.'年'.$month.'月'.$day.'日'.' '.$mission_data[0]['jikan'];

			//御届日時
			$year = substr($mission_data[0]['sagyo_date'],0,4);

			$month = substr($mission_data[0]['sagyo_date'],5,2);

			$day = substr($mission_data[0]['sagyo_date'],8,2);

			$year = $year - 1988;

			$data['hiccyaku'] = '平成'.$year.'年'.$month.'月'.$day.'日'.' '.$mission_data[0]['sagyo_time'];

		}
		return $data;
	}

	/**
	 *
	 * @param unknown_type $week
	 */
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

	function deletemis()
	{
		if ($this->uri->segment(3) != FALSE){
			$sakujyoid = $this->uri->segment(3);

			//$this->db->select('mission_id', 'mission_id2', 'from_id');
			$this->db->where('id', $sakujyoid);
			$query = $this->db->get('mission');

			$temp = $query->result_array();
			$temp = $temp[0];
			$userid = $temp['from_id'];
			/*
			$this->db->where('sagyo_id1', $temp['mission_id']);
			$this->db->where('sagyo_id2', $temp['mission_id2']);
			$this->db->where('from_id', $temp['from_id']);
			$this->db->delete('sagyo');
			//delete mission status
			$this->db->where('id', $sakujyoid);
			$this->db->delete('mission');
			*/
			if($query->row()->mission_id2 == 'FAX'){

				//delete mission status
				$this->db->where('id', $sakujyoid);
				$this->db->delete('mission');

			}else{

				$data = array('mission_status' => 4,'del_status' => 0);
				$this->db->where('id', $this->uri->segment(3));
				$this->db->update('mission', $data);

				//send mail to custom
				$mail = $this->mylabels->mgrMisCanceled;
				$mail['fromname'] = $this->session->userdata('username').'　';
				$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
				$mail['frommail'] = $query->row()->email;
				$query = $this->db->get_where('users', array('user_id' => $userid));
				$mail['to'] = $query->row()->email;

				$mail['message'] = $temp['mission_id'].'-'.$temp['mission_id2'].$mail['message'];

				$rtn = $this->sendmail($mail);
				//$rtn = FALSE;
				if(!$rtn){
					echo '<h1>任務は更新できました。メールの送信に失敗しました。</h1>';
					echo anchor("mgr_mission",'戻す');
					exit;
				}

			}

			redirect('mgr_mission');
		}
	}

	function download()
	{
		if ($this->uri->segment(3) != FALSE){
			$downloadid = $this->uri->segment(3);

			$this->db->where('id', $downloadid);
			$query = $this->db->get('mission');

			$temp = $query->result_array();
			$temp = $temp[0];
			$filename = mb_convert_encoding($temp['filename'],'UTF-8','auto') ;
			$mission = mb_convert_encoding($temp['mission_id'], 'UTF-8','auto');
			$url = $this->config->item('base_url');

			$this->load->helper('download');

			$data = file_get_contents($url.'pdf/'.$filename); // 读文件内容
			$name = $mission.'.pdf';

			force_download($name, $data);

			redirect('mgr_mission');
		}
	}

	function canceldelmis(){

		if ($this->uri->segment(3) != FALSE){

			//update mission status
			$data = array('del_status' => 0);
			$this->db->where('id', $this->uri->segment(3));
			$this->db->update('mission', $data);
			redirect('mgr_mission');
		}
	}

	function searchid(){

		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || ($authority != 1 && $authority != 2 && $authority != 4))
			redirect('login');

		$this->load->library('mylabels');
		$data['header'] = $this->mylabels->Header;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$data['LogoutLink'] = anchor('login/logout');
		$data['downurl'] = $this->config->item('base_url').$this->config->item('pdf');
		$data['upurl'] = $this->config->item('base_url').$this->config->item('uploads');
		$data['siryo'] = $this->config->item('base_url').$this->config->item('siryo');
		$data['deletemismsg'] = $this->mylabels->deletemismsg;
		$data['cancelmismsg'] = $this->mylabels->cancelmismsg;

		$url = $data['base'].'index.php/mgr_mission';

		//$data['new'] = anchor('mgr_mission/1', '未手配');
		//$data['doing'] = anchor('mgr_mission/2', '手配中');
		//$data['over'] = anchor('mgr_mission/3', '配送完了');
		//$data['del'] = anchor('mgr_mission/4', '取消中');
		//$data['all'] = anchor('mgr_mission', '全て表示');

		$data['new'] = anchor('mgr_mission/1', "<img src='".$data['base']."images/haisou_r1_c1.jpg' width='65' height='25' border='0' />");
		$data['doing'] = anchor('mgr_mission/2', "<img src='".$data['base']."images/haisou_r1_c3.jpg' width='65' height='25' border='0' />");
		$data['over'] = anchor('mgr_mission/3', "<img src='".$data['base']."images/haisou_r1_c5.jpg' width='65' height='25' border='0' />");
		//$data['del'] = anchor('mgr_mission/4', '取消中');
		$data['all'] = anchor('mgr_mission', "<img src='".$data['base']."images/haisou_r1_c7.jpg' width='65' height='25' border='0' />");

		$data['post'] = $_POST;
		$data['pageindex'] = '';

		$where = array(
				'mission_id' => '',
				'mission_id2' => '',
				'mission_status' => '',
				'limit' => 20,
				'offset' => 0
				);

		$where['mission_id'] = $_POST['mission_id'];
		$where['mission_id2'] = $_POST['mission_id2'];
		if(!empty($_POST['mission_status']))
		{
			$where['mission_status'] = $_POST['mission_status'] - 1;
		}

		//display count per page
		$per_page = $this->config->item('per_page');
		//$offset = 0;
		$segs = $this->uri->segment_array();
		if(array_search("page",$segs) != false){
			if(isset($segs[array_search("page",$segs)+1])){
				$where['offset'] = $segs[array_search("page",$segs)+1];
				$config['uri_segment'] = array_search("page",$segs)+1;
			}
		}

		$data['result_td'] = $this->mission_model->GetMissionInfo($where);
		//任務件数の取得
		$total_rows = $this->mission_model->GetMissionCount($where);
		/**
		 *

		$sql = "";
		$sql = $sql . "SELECT *";
		$sql = $sql . "FROM mission AS m ";
		if(!empty($where['mission_id'])){
			$sql = $sql . "WHERE m.mission_id LIKE '".$where['mission_id']."%' ";
		}
		if(!empty($where['mission_id2'])){
			if(!empty($where['mission_id'])){
				$sql = $sql . "AND m.mission_id2 LIKE '".$where['mission_id2']."%' ";
			}
			else
			{
				$sql = $sql . "WHERE m.mission_id2 LIKE '".$where['mission_id2']."%' ";
			}
		}
		$sql = $sql . " ORDER BY mission_status, recv_date DESC ";

		$query = $this->db->query($sql);*/
		//--

		//ドライバーの取得
		$dlArray = $this->user_model->GetUserInfo($this->session->userdata('id'), 4);
		$data['dl'] = array('0'=>'-');
		foreach ($dlArray as $row)
		{
			$data['dl'] = $data['dl'] + array($row['user_id']=>$row['username']);
		}

		//下位会社の取得
		$kaishaArray = $this->user_model->GetUserInfo($this->session->userdata('id'), 3);
		$data['kaisha'] = array('0'=>'-');
		foreach ($kaishaArray as $row)
		{
			$data['kaisha'] = $data['kaisha'] + array($row['user_id']=>$row['username']);
		}

		$data['result_th'] = $this->mylabels->MgrDtbMisThLabels;
		//$data['result_td'] = $query->result_array();
		for ($i=0; $i<count($data['result_td']); $i++)
		{
		   $date = $this->getsagyotime(
				$data['result_td'][$i]['mission_id'],
				$data['result_td'][$i]['mission_id2'],
				$data['result_td'][$i]['from_id'] );
		   $data['result_td'][$i]['recv_date'] = $date['hiccyaku'];
		   $data['result_td'][$i]['fenpei_date'] = $date['hiduke'];
		}
		//--
		$data['statusText'] = $this->mylabels->statusText;

		//---------------page------------------
		$this->load->library('pagination');

		$config['base_url'] = $url.'/page/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['num_links'] = 10;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//---------------------------------

		$data['authority'] = $authority;

		$this->load->view('header_view',$data);
		$this->load->view('mgr_menu_view',$data);
		$this->load->view('mgr_mission_view',$data);
		$this->load->view('footer_view',$data);
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
?>