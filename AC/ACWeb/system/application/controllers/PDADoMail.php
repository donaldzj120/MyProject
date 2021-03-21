<?php
include('qdmail.php');

class PDADoMail extends Controller {

	function PDADoMail()
	{
		parent::Controller();
	}

	function index()
	{
		$fromUser = $_REQUEST['from'];
		//$toUser = $_REQUEST['to'];
		$sagyouID1 = $_REQUEST['sagyo_id1'];
		$sagyouID2 = $_REQUEST['sagyo_id2'];

		$mail = $this->mylabels->dlMisOverM;

		$query = $this->db->get_where('users', array('user_id' => $fromUser));

		$mail['fromname'] = $query->row()->username.'　';

		$mail['frommail'] = $query->row()->email;

		$toUser = $query->row()->jyouiID;

		while($toUser != 0)
		{
			$query = $this->db->get_where('users', array('id' => $toUser));

			$toUser = $query->row()->jyouiID;

			$mail['to'] = $query->row()->email;

			$mail['message'] = $fromUser.'が'.$sagyouID1.'-'.$sagyouID2."の配送を完了しました。";

			$rtn = $this->sendmail($mail);

			$mail['fromname'] = $query->row()->username.'　';

			$mail['frommail'] = $query->row()->email;

			$fromUser = $query->row()->user_id;
		}

		$sgQuery = $this->db->get_where('sagyo', array('sagyo_id1' => $sagyouID1, 'sagyo_id2' => $sagyouID2));

		$query = $this->db->get_where('users', array('user_id' => $sgQuery->row()->from_id ));

		$mail['to'] = $query->row()->email;

		$mail['message'] = $fromUser.'が'.$sagyouID1.'-'.$sagyouID2."の配送を完了しました。";

		$rtn = $this->sendmail($mail);

		if(!$rtn){
			echo $mail['fromname']." ".$mail['frommail']." ".$mail['to']." ".$mail['message'];
		}
		else
		{
			echo "OK";
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
		//$from = mb_convert_encoding($from, "ISO-2022-JP","UTF-8");
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