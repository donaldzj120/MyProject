<td valign="top">
  <!-- <div class="title02">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="40%">配送状況確認</td>
        <td width="60%" align="right">
		<?php echo $new; ?>
		<?php echo $doing; ?>
		<?php echo $over; ?>
		<!--<?php echo $del; ?>-->
		<!--<?php echo $all; ?>&nbsp;&nbsp;
		</td>
      </tr>
    </table>
  </div> -->
<div id="menu4">
<div class="menuUtility"><?php echo $all; ?></div>
<div class="menuUtility"><?php echo $over; ?></div>
<div class="menuUtility"><?php echo $doing; ?></div>
<div class="menuUtility"><?php echo $new; ?></div>
</div>
<?php echo form_open('mgr_kakunin/searchid'); ?>
	<input type="hidden" name="mission_status" value="<?php echo $post['mission_status'];?>" />
  <table border="0" cellspacing="0" width="1026" bgcolor="#999999">
   <tr>
    <td width="55%" bgcolor="#FFFFFF"></td>
    <th align="right" height="20" width="10%" bgcolor="#FFFFFF">伝票ID:</th>
    <td width="25%" bgcolor="#FFFFFF">
    <input type="text" name="mission_id" value="<?php echo $post['mission_id'];?>" size="12" maxlength="7"></input>
	  -
	<input type="text" name="mission_id2" value="<?php echo $post['mission_id2'];?>" size="12" maxlength="8"></input>
	</td>
	<!-- <td width="10%" bgcolor="#FFFFFF">
    <select name="mission_status">
	  <option value ="" <?php switch($post['mission_status']){case '':echo 'selected';break;}?> >全て表示</option>
	  <option value ="1" <?php switch($post['mission_status']){case 1:echo 'selected';break;}?> >新着</option>
	  <option value ="2" <?php switch($post['mission_status']){case 2:echo 'selected';break;}?> >実行中</option>
	  <option value ="3" <?php switch($post['mission_status']){case 3:echo 'selected';break;}?> >完了</option>
	</select>
    </td> -->
    <td width="10%" bgcolor="#FFFFFF"><input type="image" src="<?php echo "$base"; ?>/images/r6_c8.jpg">
		<input type="hidden" value="submit"></td>
   </tr>
   </table>
   <?php echo form_close();?>
   <?php if(!empty($result_td)){?>
    <table cellpadding="0" cellspacing="0" id="mgr_table">
      <tr>
       	<th><img alt="" src="<?php echo $base;?>images/jyoukyou1.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou2.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou3.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou4.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou5.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou6.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou7.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou8.jpg"></th>
      </tr>
     <?php $i = 1;?>
     <?php foreach($result_td as $td){?>
	 <?php if ($i % 2 == 0) { ?>
     <tr height="35" bgcolor="#CFFEDB">
	 <?php } else { ?>
	 <tr height="35" bgcolor="#FFFFFF">
	 <?php } ?>
      	<td align="center" style="word-break:break-all;"><?php if(!empty($td['mfid'])) echo $td['mfid']; else echo "FAX";?></td>
      	<td align="center" style="word-break:break-all;"><?php echo $td['mid1'].'-'.$td['mid2'];?></td>
        <td align="center" style="word-break:break-all;"><?php if(!empty($td['zhixing_id'])) {echo $td['zhixing_id'];} else if(!empty($td['kaisha_id'])) {echo $td['kaisha_id'];}?><br><?php if($td['del_status'] == 1)echo $statusText[3];else echo $statusText[$td['mission_status']];?></td>
        <td style="word-break:break-all;"><?php $add = explode(',',$td['add2']);echo $td['add1'].$add[0];//.$td['add3'];?><br><?php echo $td['name1'].$td['name2'];?></td>
        <!-- <td align="center" rowspan="2" width="8%"><?php echo $td['tel'];?></td> -->
        <td style="word-break:break-all;"><?php $tadd = explode(',',$td['tadd2']); echo $td['tadd1'].$tadd[0];//$td['tadd2'].$td['tadd3'];?><br><?php echo $td['tname1'].$td['tname2'];?></td>
        <!-- <td align="center" rowspan="2" width="8%"><?php echo $td['ttel'];?></td> -->
        <td align="center" style="word-break:break-all;"><?php echo $td['update_date'];?></td>
        <?php if($td['mid2'] != 'FAX') { ?>
        	<td align="center" style="word-break:break-all;"><?php echo anchor('mgr_mission_show/'.$td['mid'],"<img src='".$base."images/kakunin.jpg' border=0>");?></td>
        <?php } else { ?>
        	<td align="center" style="word-break:break-all;">
	      	<?php echo anchor($downurl.$td['filename'],"<img src='".$base."images/kakunin.jpg' border=0>", array('target' => '_blank'));?>
	      	</td>
	    <?php } ?>
		<td class="right_line" align="center">
		<?php if($td['mid2'] != 'FAX') { ?>
			<?php if($td['mission_status'] < 2) { ?>
	        <?php echo anchor('mgr_sagyo_update/'.$td['id'].'/kakunin',"<img src='".$base."images/shuusei.jpg' border=0>");?>
	      	<?php } ?>
      	<?php } ?>
		</td>
	    <!--<?php if($td['mid2'] != 'FAX') { ?>
        <td align="center" style="word-break:break-all;"><?php echo anchor('mgr_mission_show/'.$td['mid'],'確認');?><br>
        <?php if($td['mission_status'] < 2) { ?>
        <?php echo anchor('mgr_sagyo_update/'.$td['id'].'/kakunin','修正');?>
      	<?php } ?>
      	</td>
      	<?php } else { ?>
      	<td align="center" width="8%" style="word-break:break-all;">
      	<?php echo anchor($downurl.$td['filename'],'確認', array('target' => '_blank'));?>
      	</td>
      	<?php }?>-->

      </tr>
      <?php $i = $i + 1;?>
      <?php } ?>
    </table>
	<?php } else { ?>
	<table border="0" cellpadding="0" cellspacing="0" id="mgr_table">
      <tr>
       <th><img alt="" src="<?php echo $base;?>images/jyoukyou1.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou2.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou3.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou4.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou5.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou6.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou7.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou8.jpg"></th>
      </tr>
     </table>
	<?php } ?>
	<?php if(isset($pagination)) echo $pagination; ?>
</td>