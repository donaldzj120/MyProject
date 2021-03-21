<td valign="top">
<div class="title02">
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<div class="point"></div>
		</td>
		<td>配車選択</td>
	</tr>
</table>
</div>
<?php echo form_open(current_url()); ?>
<table border="0" cellspacing="0" width="100%" align="right" bgcolor="#999999">
   <tr>
    <td width="55%" bgcolor="#FFFFFF"></td>
    <th width="10%" align="right" height="20" width="20%" bgcolor="#FFFFFF">伝票ID:</th>
    <td width="25%" bgcolor="#FFFFFF" align="left">
    <input type="text" name="mission_id" value="" size="12" maxlength="7"></input>
	  -
	<input type="text" name="mission_id2" value="" size="12" maxlength="8"></input>
	</td>
    <td width="10%" bgcolor="#FFFFFF"><input type="image" src="<?php echo "$base"; ?>/images/button_kensaku.gif"> 
		<input type="hidden" name="search" value="submit"></td>
   </tr>
   </table><br><br>
</form>
<?php echo form_open('mgr_dtb_mis_confirm'); ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr>
  <td width="100%"><font color="red"><?php if(isset($err_ninmu)) echo $err_ninmu;?></font>
  </td>
 </tr>
</table>
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#999999"
	width=100%>
	<tr bgcolor="#D0F0F9" height="20">
	<?php
	foreach($result_th as $th){
		echo '<th>'.$th.'</th>';
	}
	?>
	</tr>
	<?php foreach($result_td as $td){?>
	<tr align="center" bgcolor="#FFFFFF">
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
		<td><input type="checkbox" name="missions[]"
			value="<?php echo $td['id'];?>"></td>
	</tr>
	<?php } ?>
</table>
<br />
<br />
	<?php if($result_rownum != 0 ){ ?>
<table width="100%">
	<tr align="center">
		<td><input type="hidden" name="run_userid" value="<?php echo $run_userid;?>" /> 
		<!--<input type="image" src=="<?php echo "$base"; ?>/images/button_toroku.gif">-->
		<input type="image" src="<?php echo "$base"; ?>/images/button_toroku.gif">
	  	<input type="hidden" value="submit"></td>
	</tr>
</table>
	<?php } ?></form>
</td>
