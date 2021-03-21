<?php

class Ctm_ka extends Controller {

	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 3 )
			redirect('login');
		$th = $this->mylabels->MgrKaTh;
		$this->load->helper('form');
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'."\n";
		echo form_open('ctm_ka/ka_search')."\n";
		echo '<table align="right" border="0" cellpadding="0" cellspacing="0" bgcolor="#9999999" width=60%>'."\n";
		echo '<tr><th bgcolor="#2DADEA" width="25%" style="color:white;">'.$th['ka_name'].'</th>'."\n";
		echo '<td width="50%" align="center" bgcolor="#FFFFFF">'."\n";
		$ka_data = array(
              'name'        => 'ka_name',
              'id'          => 'ka_name',
              'maxlength'   => '50',
              'size'        => '30',
            );
		echo form_input($ka_data)."\n";
		echo '</td>'."\n";
		$ka_data = array(
              'type'        => 'image',
              'src'         => $this->config->item('base_url').'/images/r6_c8.jpg',
            );
		echo '<td width="25%" bgcolor="#FFFFFF">'."\n";
		echo form_input($ka_data)."\n";
		echo '</td>'."\n";
		echo '</tr>'."\n";
		echo '</table>'."\n";
		echo form_close();

		echo '<br />';
		echo '<br />';

		echo '<table  border="0" cellpadding="1" cellspacing="1" bgcolor="#9999999" width=100%>'."\n";
		echo '<tr>'."\n";
		echo '<th bgcolor="#2DADEA" width="30%" style="color:white;">'.$th['ka_name'].'</th>'."\n";
		echo '<th bgcolor="#2DADEA" width="16%" style="color:white;">'.$th['ka_tel'].'</th>'."\n";
		echo '<th bgcolor="#2DADEA" width="16%" style="color:white;">'.$th['ka_post'].'</th>'."\n";
		echo '<th bgcolor="#2DADEA" width="30%" style="color:white;">'.$th['ka_add'].'</th>'."\n";
		echo '<th bgcolor="#2DADEA" width="8%" style="color:white;">'.$th['ka_kakutei'].'</th>'."\n";
		echo '</tr>'."\n";
		echo '</table>';

        //echo form_label($th['ka_name'],'kaname');
        //echo form_input($data);

		//$query = $this->db->get_where('mission', array('id' => $id));

		//$th = $this->mylabels->missionshowth;
		//$td = $query->result_array();
		//$td = $td[0];
		/*
		echo '<table  border="0" cellpadding="3" cellspacing="1" bgcolor="#9999999" width=100%>';
		echo '<tr><th bgcolor="#E0EFFF" width="30%">'.$th[0].'</th><td  width="70%" bgcolor="#FFFFFF">'.$td['from_id'].'</td></tr>';
		echo '<tr><th bgcolor="#E0EFFF">'.$th[1].'</th><td  bgcolor="#FFFFFF">'.$td['to_name'].'</td></tr>';
		echo '<tr><th bgcolor="#E0EFFF">'.$th[2].'</th><td  bgcolor="#FFFFFF">'.$td['to_where'].'</td></tr>';
		echo '<tr><th bgcolor="#E0EFFF">'.$th[3].'</th><td  bgcolor="#FFFFFF">'.$td['to_phone'].'</td></tr>';
		echo '</table>';
		*/
	}

	function ka_search()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 3 )
			redirect('login');
		$th = $this->mylabels->MgrKaTh;
		$this->load->helper('form');
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'."\n";
		echo form_open('ctm_ka/ka_search')."\n";
		echo '<table align="right" border="0" cellpadding="0" cellspacing="0" bgcolor="#9999999" width=60%>'."\n";
		echo '<tr><th bgcolor="#2DADEA" width="25%" style="color:white;">'.$th['ka_name'].'</th>'."\n";
		echo '<td width="50%" align="center" bgcolor="#FFFFFF">'."\n";
		$ka_data = array(
              'name'        => 'ka_name',
              'id'          => 'ka_name',
              'maxlength'   => '50',
              'size'        => '30',
            );
		echo form_input($ka_data)."\n";
		echo '</td>'."\n";
		$ka_data = array(
              'type'        => 'image',
              'src'         => $this->config->item('base_url').'/images/r6_c8.jpg',
            );
		echo '<td width="25%" bgcolor="#FFFFFF">'."\n";
		echo form_input($ka_data)."\n";
		echo '</td>'."\n";
		echo '</tr>'."\n";
		echo '</table>'."\n";
		echo form_close();
		if(isset($_POST['ka_name']))
		{
			$from_id = $this->session->userdata('user_id');
			$sql = '';
			$sql = $sql."select * ";
			$sql = $sql."from ka ";
			$sql = $sql."where from_id = '$from_id' and (ka_name1 like '%".$_POST['ka_name']."%' or ka_name2 like '%".$_POST['ka_name']."%') ";
			$query = $this->db->query($sql);
			$result_td = $query->result_array();
			echo '<br />';
			echo '<br />';
			echo '<script>'."\n";
			echo 'function updata(value1,value2,value3,value4,value5,value6,value7){'."\n";
			echo 'opener.showcre(value1,value2,value3,value4,value5,value6,value7);'."\n";
			echo 'window.close();'."\n";
			echo '}'."\n";
			echo '</script>'."\n";
			echo '<table  border="0" cellpadding="1" cellspacing="1" bgcolor="#9999999" width=100%>'."\n";
			echo '<tr>'."\n";
			echo '<th bgcolor="#2DADEA" width="30%" style="color:white;">'.$th['ka_name'].'</th>'."\n";
			echo '<th bgcolor="#2DADEA" width="16%" style="color:white;">'.$th['ka_tel'].'</th>'."\n";
			echo '<th bgcolor="#2DADEA" width="16%" style="color:white;">'.$th['ka_post'].'</th>'."\n";
			echo '<th bgcolor="#2DADEA" width="30%" style="color:white;">'.$th['ka_add'].'</th>'."\n";
			echo '<th bgcolor="#2DADEA" width="8%" style="color:white;">'.$th['ka_kakutei'].'</th>'."\n";
			echo '</tr>'."\n";
			foreach($result_td as $td)
			{
				echo '<tr>'."\n";
				echo '<td bgcolor="#FFFFFF">'.$td['ka_name1'].' '.$td['ka_name2'].'</td>'."\n";
				echo '<td bgcolor="#FFFFFF">'.$td['ka_tel'].'</td>'."\n";
				echo '<td bgcolor="#FFFFFF">'.$td['ka_post'].'</td>'."\n";				$add = explode(',',$td['ka_add2']);
				echo '<td bgcolor="#FFFFFF">'.$td['ka_add1'].' '.$add[0].' '.$td['ka_add3'].'</td>'."\n";
				$ka_data = array(
					  'name'		=> 'button',
					  'id' 			=> 'button',
		        	  'value'		=> 'kakutei',
		            );
		        $js = 'onClick="updata('.'\''.$td['ka_name1'].'\''.',\''.$td['ka_name2'].'\',\''.$td['ka_tel'].'\',\''.$td['ka_post'].'\',\''.$td['ka_add1'].'\',\''.$td['ka_add2'].'\',\''.$td['ka_add3'].'\')"';
				echo '<td bgcolor="#FFFFFF" align="center">'."\n";
				echo form_button($ka_data,'確定',$js)."\n";
				echo '</td>'."\n";
				echo '</tr>'."\n";
			}
			echo '</table>'."\n";
			echo '</body>'."\n";
			echo '</html>'."\n";
		}
		else
		{
			echo '<br />';
			echo '<br />';
			echo '<table  border="0" cellpadding="1" cellspacing="1" bgcolor="#9999999" width=100%>'."\n";
			echo '<tr>'."\n";
			echo '<th bgcolor="#2DADEA" width="30%" style="color:white;">'.$th['ka_name'].'</th>'."\n";
			echo '<th bgcolor="#2DADEA" width="16%" style="color:white;">'.$th['ka_tel'].'</th>'."\n";
			echo '<th bgcolor="#2DADEA" width="16%" style="color:white;">'.$th['ka_post'].'</th>'."\n";
			echo '<th bgcolor="#2DADEA" width="30%" style="color:white;">'.$th['ka_add'].'</th>'."\n";
			echo '<th bgcolor="#2DADEA" width="8%" style="color:white;">'.$th['ka_kakutei'].'</th>'."\n";
			echo '</tr>'."\n";
			echo '</table>';
		}
	}
}