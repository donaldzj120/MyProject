<?php
include('qdmail.php');

class Dl_mis extends Controller {

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
		$data['statusText'] = $this->mylabels->statusText;
		$data['siryo'] = $this->config->item('base_url').$this->config->item('siryo');

		//任務状態
		$data['doing'] = anchor('dl_mis/1', "<img src='".$data['base']."images/haisou_r1_c3.jpg' width='65' height='25' border='0' />");
		$data['over'] = anchor('dl_mis/2', "<img src='".$data['base']."images/haisou_r1_c5.jpg' width='65' height='25' border='0' />");
		$data['all'] = anchor('dl_mis', "<img src='".$data['base']."images/haisou_r1_c7.jpg' width='65' height='25' border='0' />");

		$data['pageindex'] = '';

		$where = array(
			'mission_status' =>'',
			'zhixing_id' =>''
		);

		$mission_status = '';
		$query = '';

		if ($this->uri->segment(2) != FALSE){
			$mission_status = $this->uri->segment(2);

			$where['mission_status'] = $mission_status;
			$where['zhixing_id'] = $this->session->userdata('user_id');

			switch($mission_status){
				case 1:
					$query = $this->mission_model->GetDoraibaMission($where, 1);
					break;
				case 2:
					$query = $this->mission_model->GetDoraibaMission($where, 2);
					break;
			}
		}else{
			$where['mission_status'] = '';
			$where['zhixing_id'] = $this->session->userdata('user_id');

			$query = $this->mission_model->GetDoraibaMission($where, 3);
		}

		/*
		$limit = $this->config->item('limit');
		$offset = 0;

		if ($this->uri->segment(2) != FALSE){
			$data['uri_segment'] = 0;
			$data['base_url'] = $data['base'].$this->config->item('index_page').'/'.'dl_mis/'.$this->uri->segment(2).'/page/';

			if ($this->uri->segment(2) == 'page'){
				$mission_status = '';
				$this->db->order_by("recv_date", "desc");
				$query = $this->db->get_where('mission',
				array(
					'zhixing_id' => $this->session->userdata('user_id')
				)
				);
				$offset = $this->uri->segment(3);
				$data['uri_segment'] = 3;
				$data['base_url'] = $data['base'].$this->config->item('index_page').'/'.'dl_mis/page/';
			}
			if ($this->uri->segment(3) == 'page'){
				$offset = $this->uri->segment(4);
				$data['uri_segment'] = 4;
				$data['base_url'] = $data['base'].$this->config->item('index_page').'/'.'dl_mis/'.$this->uri->segment(2).'/page/';
			}

		}else{
			$mission_status = '';
			$query = $this->db->get_where('mission',
			array(
					'zhixing_id' => $this->session->userdata('user_id')
			)
			);
			$data['uri_segment'] = 0;
			$data['base_url'] = $data['base'].$this->config->item('index_page').'/'.'dl_mis/page/';
		}
		//echo '['.$mission_status.']['.$limit.']['.$offset.']';

		$config['uri_segment'] = $data['uri_segment'];
		$config['base_url']	= $data['base_url'];
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);
		$data['pageindex'] = $this->pagination->create_links();

		if($mission_status === ''){
			$this->db->order_by("recv_date", "desc");
			$query = $this->db->get_where('mission',
			array(
					'zhixing_id' => $this->session->userdata('user_id')
			));
		}else{
			switch($mission_status){
				case 0:$this->db->order_by("recv_date", "desc");break;
				case 1:$this->db->order_by("fenpei_date", "desc");break;
				case 2:$this->db->order_by("over_date", "desc");break;
			}
			$query = $this->db->get_where('mission', array('mission_status' => $mission_status,
					'zhixing_id' => $this->session->userdata('user_id')), $limit, $offset);
		}
		*/

		$data['result_th'] = $this->mylabels->DlMisTh;
		$data['result_td'] = $query;
		$data['mis_link'] = $this->mylabels->mis_link;
		$data['downurl'] = $this->config->item('base_url').$this->config->item('pdf');
		$data['upurl'] = $this->config->item('base_url').$this->config->item('uploads');

		$this->load->view('header_view',$data);
		$this->load->view('dl_mis_view',$data);
		$this->load->view('footer_view',$data);
	}

	function misover()
	{

		if ($this->uri->segment(3) != FALSE){

			//任務状態の更新
			$oldStatus = $this->mission_model->GetMissionInfoById($this->uri->segment(3));
			if(!empty($oldStatus))
			{
				$this->mission_model->UpdateMissionStatud($oldStatus['mission_id'], $oldStatus['mission_id2']);
			}

			//update user status
			$user_id = $this->session->userdata('user_id');
			$query = $this->db->get_where('mission', array('zhixing_id' => $user_id,'mission_status' => 1));
			if (!($query->num_rows() > 0))
			{
				$data = array('status' => 0);
				$this->db->where('user_id', $user_id);
				$this->db->update('users', $data);
			}

			//send mail to manager
			$mail = $this->mylabels->dlMisOverM;
			$mail['fromname'] = $this->session->userdata('username').'　';

			$query = $this->user_model->GetUserJyoiInfo($this->session->userdata('id'));

			//$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
			//ユーザーEメール
			$mail['frommail'] = $query['email'];

			//ユーザー上位ID
			$jyouID = $query['jyouiID'];
			//上位IDによって、上位会社のメールアドレスを取得する
			$query = $this->user_model->GetUserJyoiInfo($jyouID);

			//$query = $this->db->get_where('users', array('authority' => 1));
			$mail['to'] = $query['email'];

			//foreach ($query->result() as $row){

				//$mail['to'] = $mail['to'].','.$row->email;

			//}

			$query = $this->db->get_where('mission', array('id' => $this->uri->segment(3)));
			//$mission = $query->
			$mail['message'] = $this->session->userdata('user_id').'が'.$query->row()->mission_id.'-'.$query->row()->mission_id2.$mail['message'];

			$rtn = $this->sendmail($mail);
			//$rtn = FALSE;
			if(!$rtn){
				echo '<h1>任務は更新できました。メールの送信に失敗しました。</h1>';
				echo anchor("dl_mis",'戻す');
				exit;
			}
/*
			$mail = $this->mylabels->dlMisOverC;
			$mail['fromname'] = $this->session->userdata('username').'　';
			$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
			$mail['frommail'] = $query->row()->email;

			$query = $this->db->get_where('mission', array('id' => $this->uri->segment(3)));

			$mail['message'] = $query->row()->mission_id.'-'.$query->row()->mission_id2.$mail['message'];

			if(!empty($query->row()->from_id)){
				$query = $this->db->get_where('users', array('user_id' => $query->row()->from_id));

				$mail['to'] = $query->row()->email;

				$rtn = $this->sendmail($mail);

				if(!$rtn){
					echo '<h1>任務は更新できました。メールの送信に失敗しました。</h1>';
					echo anchor("dl_mis",'戻す');
					exit;
				}
			}*/
			redirect('dl_mis');
		}
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