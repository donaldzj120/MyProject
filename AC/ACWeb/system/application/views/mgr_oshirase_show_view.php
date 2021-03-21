<td valign="top">
<!-- <div class="title02">
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<div class="point"></div>
		</td>
		<td><?php echo $formlabes['userregformtitle']?></td>
	</tr>
</table>
</div> -->
<div id="menu12">
</div>
<?php echo form_open('mgr_oshirase/oshirase_new/'); ?>
<div>
  <div id="ct1"><?php echo $formlabes['title']?><font size="-2" color="#FF9900">※必須(半角英数字)</font></div>
  <div id="ct2">
  	<input type="text" name="Title" value="<?php echo $td['Title'];?>" size="20" readOnly="readOnly" />
  </div>
  <div id="ctmg1"><?php echo strip_tags(form_error('user_id')); ?></div>
  <div id="ct3"><?php echo $formlabes['body']?><font size="-2" color="#FF9900">※必須(半角英数字)</font></div>
  <div id="ct4" style="height:auto;">
  	<textarea name="Body" rows="10" cols="50" readOnly="readOnly"><?php echo $td['Body'];?></textarea>
  </div>
</div>
<div style="clear: both;">
</div>
<div id="bt">
	<div class="bt_left">
	<!-- <input type="image" src="<?php echo "$base"; ?>images/touroku.jpg">
	<input type="hidden" value="submit"> -->
	</div>
	<div class="bt_right">
	<?php echo anchor('mgr_oshirase', '<img src="'.$base.'/images/cxl.jpg" border="0"/>'); ?></div>
	</div>
</form>
</td>
