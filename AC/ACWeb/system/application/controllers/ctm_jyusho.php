<?php
class Ctm_jyusho extends Controller {
	function index()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 3 )
			redirect('login');
		$th = $this->mylabels->MgrKaTh;
		$this->load->helper('url');

		$this->load->helper('form');
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'."\n";		echo '<script src="'.$this->config->item('base_url').'js/common.js" type="text/javascript"></script>'."\n";

		echo form_open('ctm_jyusho/jyusho_search', array('id' => 'jyushoSearch'))."\n";
		echo form_hidden("ken", '');
		//echo '<div id="ken">'."\n";

		echo '<table  border="0" cellpadding="1" cellspacing="1" width=100%>'."\n";

		echo '<tr>'."\n";

		//echo '<td><a href="#" onclick="searchCity('."'東京都'".');" >東京都</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/43").'">東京都</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/1").'">北海道</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/2").'">青森県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/3").'">岩手県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/4").'">宮城県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/5").'">秋田県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/6").'">山形県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/7").'">福島県</a></td>'."\n";

		echo '</tr>'."\n";

		echo '<tr>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/8").'">茨城県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/9").'">栃木県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/10").'">群馬県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/11").'">埼玉県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/12").'">千葉県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/13").'">神奈川県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/14").'">新潟県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/15").'">富山県</a></td>'."\n";

		echo '</tr>'."\n";

		echo '<tr>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/16").'">石川県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/17").'">福井県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/18").'">山梨県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/19").'">長野県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/20").'">岐阜県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/21").'">静岡県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/22").'">愛知県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/23").'">三重県</a></td>'."\n";

		echo '</tr>'."\n";

		echo '<tr>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/24").'">滋賀県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/25").'">京都府</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/26").'">大阪府</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/27").'">兵庫県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/28").'">奈良県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/29").'">和歌山県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/30").'">鳥取県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/31").'">島根県</a></td>'."\n";

		echo '</tr>'."\n";

		echo '<tr>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/32").'">岡山県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/33").'">広島県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/34").'">山口県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/35").'">徳島県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/36").'">香川県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/37").'">愛媛県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/38").'">高知県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/39").'">福岡県</a></td>'."\n";

		echo '</tr>'."\n";

		echo '<tr>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/40").'">佐賀県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/41").'">長崎県</a></td>'."\n";

		echo '<td><a href="'.site_url("ctm_jyusho/jyusho_search/42").'">熊本県</a></td>'."\n";

		echo '<td></td>'."\n";

		echo '<td></td>'."\n";

		echo '<td></td>'."\n";

		echo '<td></td>'."\n";

		echo '<td></td>'."\n";

		echo '</tr>'."\n";

		echo '</table>';

		//echo '</div>'."\n";

		echo form_close();

	}
	function jyusho_search()
	{
		$status = $this->session->userdata('status');
		$authority = $this->session->userdata('authority');
		if (!isset($status) || $status != 'OK' || $authority != 3 )
			redirect('login');
		$th = $this->mylabels->MgrKaTh;
		$this->load->helper('form');
		$i = 1;

		if ($this->uri->segment(3) != FALSE){
			$kenArray = $this->mylabels->kenArray;
			$ken = $kenArray[$this->uri->segment(3)];
		}

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'."\n";

		echo '<script src="'.$this->config->item('base_url').'js/common.js" type="text/javascript"></script>'."\n";

		echo form_open('ctm_jyusho/jyusho_search2', array('id' => 'jyushoSearch'))."\n";
		//if(!empty($_POST))
		//{
			//if(isset($_POST['ken']))
			//{
				echo form_hidden("city", '');

				echo form_hidden("ken", $ken);

				$sql = "";

				$sql = $sql."select distinct city ";

				$sql = $sql."from mtb_zip ";

				$sql = $sql."where state = '".$ken."' ";

				$sql = $sql."order by zipcode";

				$query = $this->db->query($sql);

				$result_td = $query->result_array();

				echo '<table  border="0" cellpadding="1" cellspacing="1" width=100%>'."\n";

				foreach($result_td as $td)
				{
					if($i == 1)
					{
						echo '<tr>'."\n";
					}

					echo '<td><a href="#" onclick="searchMati('."'".$ken."',"."'".$td['city']."'".');" >'.$td['city'].'</a></td>';

					if($i == 6)
					{
						echo '</tr>'."\n";

						$i = 0;
					}

					$i = $i + 1;
				}

				echo '</table>'."\n";

				echo form_close();
			//}
		//}
	}
}