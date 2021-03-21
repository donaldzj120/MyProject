<?php

class Missionshow extends Controller {


	function index()
	{
		if ($this->uri->segment(2) == FALSE){
			echo 'Access Error!';
		}else{
			$id = $this->uri->segment(2);
			$query = $this->db->get_where('mission', array('id' => $id));
			
			$th = $this->mylabels->missionshowth;
			$td = $query->result_array();
			$td = $td[0];
			
			echo '<html>';
			echo '<head>';
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
			echo '</head>';
			echo '<body>';
			echo '<table  border="0" cellpadding="3" cellspacing="1" bgcolor="#9999999" width=100%>';
			echo '<tr><th bgcolor="#E0EFFF" width="30%">'.$th[0].'</th><td  width="70%" bgcolor="#FFFFFF">'.$td['from_id'].'</td></tr>';
			echo '<tr><th bgcolor="#E0EFFF">'.$th[1].'</th><td  bgcolor="#FFFFFF">'.$td['to_name'].'</td></tr>';
			echo '<tr><th bgcolor="#E0EFFF">'.$th[2].'</th><td  bgcolor="#FFFFFF">'.$td['to_where'].'</td></tr>';
			echo '<tr><th bgcolor="#E0EFFF">'.$th[3].'</th><td  bgcolor="#FFFFFF">'.$td['to_phone'].'</td></tr>';
			echo '</table>';
			echo '</body>';
			echo '</html>';
		}
	}
}