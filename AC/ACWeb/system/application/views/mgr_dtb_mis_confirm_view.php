
<td valign="top">
<div class="title02">

<?php echo form_open('mgr_dtb_mis_confirm/confirm_misson'); ?>
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<div class="point"></div>
		</td>
		<td>運転者&nbsp;<font color="#FF0000"><?php if(isset($err_msg1)) echo $err_msg1;?></font></td>
	</tr>
</table>

</div>
<?php if(isset($user_th)){?>
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#999999"
	width=100%>
	<tr bgcolor="#D0F0F9" height="20">
	<?php
	foreach($user_th as $th){
		echo '<th>'.$th.'</th>';
	}
	?>
	</tr>
	<?php foreach($user_td as $td){?>
	<tr align="center" bgcolor="#FFFFFF">
		<td><?php echo $td['username'];?></td>
		<td><?php echo $dlstatusText[$td['status']];?></td>
		<td><?php echo $td['car_info1'];?></td>
	</tr>
	<?php } ?>
</table>
	<?php } ?> <br>
<br>
<br>
<div class="title02">
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<div class="point"></div>
		</td>
		<td>任務&nbsp;</td>
	</tr>
</table>
</div>
	<?php if(isset($mission_th)){?>
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#999999"
	width=100%>
	<tr bgcolor="#D0F0F9" height="20">
	<?php
	foreach($mission_th as $th){
		echo '<th>'.$th.'</th>';
	}
	?>
	</tr>
	<?php foreach($mission_td as $td){?>
	<tr align="center" bgcolor="#FFFFFF">
		<input type="hidden" name="missions[]" value="<?php echo $td['id'];?>" />
		<td><?php echo $td['mission_id'].'-'.$td['mission_id2'];?></td>
		<td><?php echo $statusText[$td['mission_status']];?></td>
		<td><?php echo $td['recv_date'];?></td>
		<td><?php 
		if(!empty($td['filename'])){
			echo anchor($downurl.$td['filename'],$td['filename']);
		}else{
			echo anchor('mgr_mission_show/'.$td['id'],'詳細');
		}
		?></td>
	</tr>
	<?php } ?>
</table>
	<?php } ?> <br />
<br />
<table width="100%">
	<tr align="center">
		<td><input type="hidden" name="run_userid"
			value="<?php if(isset($run_userid)) echo $run_userid;?>" /> <?php if(isset($result_rownum) && $result_rownum != 0 ){ ?>
		<input type="image"
			src="<?php echo "$base"; ?>/images/button_kakunin.gif"> <input
			name="submit" type="hidden" value="submit"> <?php } ?> <a
			href="mgr_dtb"><img
			src="<?php echo "$base"; ?>/images/button_torikesi.gif" border="0" /></a>
		</td>
	</tr>
</table>
</form>
</td>
