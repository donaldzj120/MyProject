<td valign="top"><!--
<div class="title01">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<div class="point"></div>
		</td>
		<td width="50%"><?php echo $this->session->userdata('username');?></td>
		<td width="50%" align="right"><?php echo $doing; ?> <?php echo $over; ?>
		<?php echo $all; ?>&nbsp;&nbsp;</td>
	</tr>
</table>
</div> --><div id="menu2">	<div class="menuUtility"><?php echo $all; ?></div>	<div class="menuUtility"><?php echo $over; ?></div>	<div class="menuUtility"><?php echo $doing; ?></div></div><?php if(!empty($result_td)){?>
<table id="dl_table" cellpadding="0" cellspacing="0" >
	<tr>        <th><img alt="" src="<?php echo $base;?>images/dl_mis1.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis2.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis3.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis4.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis5.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis6.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis7.jpg"></th>      </tr>
	<?php foreach($result_td as $td){?>
	<tr align="center" bgcolor="#FFFFFF">
		<td height="35"><?php echo $td['mission_id'].'-'.$td['mission_id2'];?></td>
		<!--  <td width="10%"><?php //echo $statusText[$td['mission_status']];?></td> -->
		<td><?php echo $td['fenpei_date'];?></td>
		<td><?php echo $td['over_date'];?></td>
		<td><?php
		if(!empty($td['filename'])){
			echo anchor($downurl.$td['filename'],"<img src='".$base."images/kakunin.jpg' border=0>", array('target' => '_blank'));
		}else{
			echo anchor('dl_mission_show/'.$td['id'],"<img src='".$base."images/kakunin.jpg' border=0>");
		}
		?></td>
		<td><?php
		if(!empty($td['fileover'])){
			//echo anchor($upurl.$td['fileover'],$td['fileover'], array('target' => '_blank'));			echo anchor($upurl.$td['fileover'],"<img src='".$base."images/dr.jpg' border=0>", array('target' => '_blank'));
		}else{
			echo '<a href="'.$base.$this->config->item('index_page').'/'.'dl_upload/'.$td['id'].'">添付</a>';
		}
		?></td>
        <td><?php if(!empty($td['siryo']))echo anchor($siryo.$td['siryo'],$td['siryo'], array('target' => '_blank'));?></td>
		  <td class="right_line"><?php switch($td['mission_status']){
			case 1:				echo anchor('dl_mis/misover/'.$td['id'],$mis_link[0]);
				break;
			case 2:
				echo $mis_link[1];break;			case 4:				echo 'キャンセル済';		  } ?></td>
	</tr>
	<?php } ?>
</table>
<?php } else { ?>
<table id="dl_table" cellpadding="0" cellspacing="0" >	<tr>        <th><img alt="" src="<?php echo $base;?>images/dl_mis1.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis2.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis3.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis4.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis5.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis6.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/dl_mis7.jpg"></th>      </tr>
</table>
<?php } ?>
<!-- <table border="0" width="100%">
	<tr>
		<td align="center"><?php echo $pageindex; ?></td>
	</tr>
</table> -->
</td>
