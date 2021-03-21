<td valign="top">
<div id="menu16">
</div>
<?php if($authority != 1 && $authority != 3) { ?>
<div style="width:360px;margin-left: auto;margin-right: auto;">
	<div style="float:left;width:130px;">
		<!--<?php echo form_open('mgr_shukkin/shukkin'); ?>-->
		<?php echo form_open(); ?>
			<div>
				<input type="text" style="text-align: center;" name="shukkin" value="<?php echo $shukkin_jikan; ?>" readonly="readonly" size="15" />
			</div>
			<?php if ($shukkin_jikan == '') { ?>
			<div>
				<?php echo anchor('mgr_shukkin/shukkin', '<img src="'.$base.'/images/shukkin_button.jpg" border="0"/>'); ?>
				<!-- <input type="image" src="<?php echo "$base"; ?>/images/r6_c8.jpg">
				<input type="hidden" value="submit"> -->
			</div>
			<?php } ?>
		<?php echo form_close();?>
	</div>
	<div style="float:right;width:130px;">
		<?php echo form_open(); ?>
			<input type="hidden" name="id" value="<?php echo $kinmu_id;?>" />
			<div>
				<input type="text" style="text-align: center;" name="taikin" value="<?php echo $taikin_jikan; ?>" readonly="readonly" size="15" />
			</div>
			<?php if ($shukkin_jikan != '' && $taikin_jikan == '') { ?>
			<div>
				<?php echo anchor('mgr_shukkin/taikin', '<img src="'.$base.'/images/taikin_button.jpg" border="0"/>'); ?>
				<!-- <input type="image" src="<?php echo "$base"; ?>/images/r6_c8.jpg">
				<input type="hidden" value="submit"> -->
			</div>
			<?php } ?>
		<?php echo form_close();?>
	</div>
</div>
<?php } ?>
<?php echo form_open('mgr_shukkin/search'); ?>
  <table border="0" cellspacing="0" width="1026" bgcolor="#999999">
   <tr>
   <?php if($authority == 1) { ?>
    <td width="55%" bgcolor="#FFFFFF"></td>
    <th align="right" height="20" width="10%" bgcolor="#FFFFFF">社員：</th>
    <td width="auto" bgcolor="#FFFFFF">
	<?php echo form_dropdown('user', $userlist, '-');?>
    </td>
    <?php } else { ?>
    <td width="65%" bgcolor="#FFFFFF"></td>
    <?php } ?>
    <th align="right" height="20" width="10%" bgcolor="#FFFFFF">年月：</th>
	<td width="auto" bgcolor="#FFFFFF">
    <select name="nen">
	  <option value =""  ></option>
	  <option value ="1" >2013年</option>
	  <option value ="2" >2014年</option>
	  <option value ="3" >2015年</option>
	</select>
	<td width="auto" bgcolor="#FFFFFF">
    <select name="getsu">
	  <option value =""  ></option>
	  <option value ="1" >１月</option>
	  <option value ="2" >２月</option>
	  <option value ="3" >３月</option>
	  <option value ="4" >４月</option>
	  <option value ="5" >５月</option>
	  <option value ="6" >６月</option>
	  <option value ="7" >７月</option>
	  <option value ="8" >８月</option>
	  <option value ="9" >９月</option>
	  <option value ="10" >１０月</option>
	  <option value ="11" >１１月</option>
	  <option value ="12" >１２月</option>
	</select>
    </td>
    <td width="10%" bgcolor="#FFFFFF"><input type="image" src="<?php echo "$base"; ?>/images/r6_c8.jpg">
		<input type="hidden" value="submit"></td>
   </tr>
   </table>
   <?php echo form_close();?>
   <?php if(!empty($result_td)){?>
    <table cellpadding="0" cellspacing="0" id="mgr_table">
      <tr>
       	<th><img alt="" src="<?php echo $base;?>images/shukkin1.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/shukkin2.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/shukkin3.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/shukkin4.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/shukkin5.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/shukkin6.jpg"></th>
      </tr>
     <?php $i = 1;?>
     <?php foreach($result_td as $td){?>
	 <?php if ($i % 2 == 0) { ?>
     <tr height="35" bgcolor="#CFFEDB">
	 <?php } else { ?>
	 <tr height="35" bgcolor="#FFFFFF">
	 <?php } ?>
      	<td align="center" style="word-break:break-all;"><?php echo $td['username'];?></td>
      	<td align="center" style="word-break:break-all;"><?php echo substr($td['hiduke'], 0, 4)."年".substr($td['hiduke'], 5, 2)."月".substr($td['hiduke'], 8, 2)."日";?></td>
        <td align="center" style="word-break:break-all;"><?php if(!empty($td['shukkin_jikan'])) {echo substr($td['shukkin_jikan'], 11, 2)."時".substr($td['shukkin_jikan'], 14, 2)."分";}?></td>
        <td align="center" style="word-break:break-all;"><?php if(!empty($td['taikin_jikan'])) {echo substr($td['taikin_jikan'], 11, 2)."時".substr($td['taikin_jikan'], 14, 2)."分";}?></td>
        <td align="center" style="word-break:break-all;"><?php if(!empty($td['kinmu_jikan'])) {echo (int)($td['kinmu_jikan']/60)."時".($td['kinmu_jikan']%60)."分";}?></td>
        <td class="right_line" align="center" valign="middle"></td>
      </tr>
      <?php $i = $i + 1;?>
      <?php } ?>
    </table>
	<?php } else { ?>
	<table border="0" cellpadding="0" cellspacing="0" id="mgr_table">
      <tr>
        <th><img alt=""  src="<?php echo $base;?>images/shukkin1.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/shukkin2.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/shukkin3.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/shukkin4.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/shukkin5.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/shukkin6.jpg"></th>
      </tr>
     </table>
	<?php } ?>
	<?php if(isset($pagination)) echo $pagination; ?>
</td>