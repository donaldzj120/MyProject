<td valign="top">
<!--<div class="title02">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="50%">配送依頼情報</td>
        <td width="50%" align="right">
		<?php echo $new; ?>
		<?php echo $doing; ?>
		<?php echo $over; ?>-->
		<!--<?php //echo $del; ?>-->
		<!--<?php echo $all; ?>
		</td>
      </tr>
    </table>
  </div> -->
  <div id="menu2">
  	<div class="menuUtility"><?php echo $all; ?></div>
  	<div class="menuUtility"><?php echo $over; ?></div>
  	<div class="menuUtility"><?php echo $doing; ?></div>
	<div class="menuUtility"><?php echo $new; ?></div>
  </div>
<?php echo form_open('mgr_mission/searchid'); ?>
  <input type="hidden" name="mission_status" value="<?php echo $post['mission_status'];?>" />
  <table border="0" cellspacing="0" width="1026" bgcolor="#999999" style="margin-bottom:5px;">
   <tr>
    <td width="55%" bgcolor="#FFFFFF"></td>
    <th align="right" height="20" width="10%" bgcolor="#FFFFFF">伝票ID:</th>
    <td width="25%" bgcolor="#FFFFFF">
    <input type="text" name="mission_id" value="<?php echo $post['mission_id'];?>" size="12" maxlength="7"></input>
	  -
	<input type="text" name="mission_id2" value="<?php echo $post['mission_id2'];?>" size="12" maxlength="8"></input>
	</td>
    <td width="10%" bgcolor="#FFFFFF"><input type="image" src="<?php echo "$base"; ?>/images/r6_c8.jpg">
		<input type="hidden" value="submit"></td>
   </tr>
   </table>
   <?php echo form_close(); ?>
   <?php if(!empty($result_td)) {?>
    <table cellpadding="0" cellspacing="0" id="mgr_table">
      <tr>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission1.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission12.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission2.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission3.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission4.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission5.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission6.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission7.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission8.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission9.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission10.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission11.jpg"></th>
      </tr>
      <?php foreach($result_td as $td){?>
      <tr align="center">
	  <?php echo form_open('mgr_mission/dtb_confirm',array('name' => 'dtb'.$td['id'])); ?>
	  	<input type="hidden" name="mis_id" value="<?php echo $td['id'];?>" />
        <td height="35"><?php echo $td['mission_id'].'-'.$td['mission_id2'];?></td>
        <!-- <td width="5%"><?php echo $td['fenpei_id'];?></td> -->
        <td align="center" valign="middle"><?php if($td['mission_status'] > 0) echo $td['kaisha_id']; else echo form_dropdown('kaisha', $kaisha, '-');?></td>
        <td align="center" valign="middle"><?php if($td['mission_status'] > 0) echo $td['zhixing_id']; else echo form_dropdown('doraiba', $dl, '-');?></td>
        <td><?php if($td['del_status'] == 1)echo $statusText[3];else echo $statusText[$td['mission_status']];?></td>
        <!-- <td width="6%"><?php if($td['del_status'] == 1) echo '取消中';?></td> -->
        <td><?php echo $td['recv_date'];?></td>
        <td><?php echo $td['fenpei_date'];?></td>
        <!-- <td width="12%"><?php echo $td['over_date'];?></td>-->
		<td align="center" valign="middle"><?php
      	if(!empty($td['filename'])){
			echo anchor($downurl.$td['filename'], "<img src='".$base."images/kakunin.jpg' border=0>", array('target' => '_blank'));
		}else{
			echo anchor('mgr_mission_show/'.$td['id'], "<img src='".$base."images/kakunin.jpg' border=0>");
		}
		?></td>
		<td align="center" valign="middle"><?php
		if(!empty($td['filename'])){
			//header("Content-disposition: attachment; filename=".$td['filename']);
			//echo anchor($downurl.urlencode(mb_convert_encoding($td['filename'],'UTF-8','auto')), $td['filename'], array('target' => '_blank'));
			echo anchor('mgr_mission/download/'.$td['id'], "<img src='".$base."images/hozon.jpg' border=0>");
		}
		?></td>
        <td align="center" valign="middle"><?php if(!empty($td['fileover']))echo anchor($upurl.$td['fileover'],"<img src='".$base."images/dr.jpg' border=0>", array('target' => '_blank'));?></td>
        <td align="center" valign="middle"><?php if(!empty($td['siryo']))echo anchor($siryo.$td['siryo'],"<img src='".$base."images/dr.jpg' border=0>", array('target' => '_blank'));?></td>
		<td align="center" valign="middle">
      	<?php if ($td['mission_status'] == 0) { ?>
      		<a href="javascript:document.<?php echo 'dtb'.$td['id']; ?>.submit();"><img src="<?php echo $base; ?>images/haisou_kakunin.jpg" border="0"></a>
      	<?php } else { ?>
      	<?php } ?>
      	</td>
		<td class="right_line" align="center" valign="middle"><?php
		if($td['del_status'] == 1){
			echo anchor('mgr_mission/deletemis/'.$td['id'],
						"<img src='".$base."images/sakujyo.jpg' border=0>",
						array('onclick' => 'javascript:if(window.confirm(\''.$deletemismsg.'\')) return ture;else return false;')
				);
			echo anchor('mgr_mission/canceldelmis/'.$td['id'],
						"<img src='".$base."images/sakujyo.jpg' border=0>",
						array('onclick' => 'javascript:if(window.confirm(\''.$cancelmismsg.'\')) return ture;else return false;')
				);

      	}
		if($td['mission_id2'] == 'FAX'){
			echo anchor('mgr_mission/deletemis/'.$td['id'],
						"<img src='".$base."images/sakujyo.jpg' border=0>",
						array('onclick' => 'javascript:if(window.confirm(\''.$deletemismsg.'\')) return ture;else return false;')
				);

      	}?></td>
	  <?php echo form_close(); ?>
	</tr>
      <?php } ?>
    </table>
	<?php } else { ?>
	<table cellpadding="0" cellspacing="0" id="mgr_table">
      <tr>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission1.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission12.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission2.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission3.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission4.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission5.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission6.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission7.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission8.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission9.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission10.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mgr_mission11.jpg"></th>
      </tr>
	</table>
	<?php }?>
   <?php if(isset($pagination)) echo $pagination;?>
</td>
