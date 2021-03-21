<td valign="top">
<div class="title01">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<div class="point"></div>
		</td>
		<td width="50%" align="left">資料添付</td>
		<td width="50%" align="right"></td>
	</tr>
</table>
</div>
<div class="table01">
<?php echo form_open_multipart('dl_upload/do_upload');?>
<table border="0" cellpadding="3" cellspacing="1" width=100%>
　<tr>
	<td align="center" valign="middle" >
	 <input type="file" name="userfile" size="20" />
	 <input type="hidden" name="id" value="<?php echo $id;?>" />
	</td>
 </tr>
 <tr>
  <td width="100%" align="center"><font color="red">(*.pdf, *.jpg, *.jpeg, *.png, *.gif)</font></td>
 </tr>
 <tr>
 <td width="100%" align="center"><font color="red"><?php echo strip_tags($error);?></font><br /></td>

 </tr>
</table>
<table width="100%">
	<tr align="center">
		<td>
			<input type="image" src="<?php echo "$base"; ?>/images/button_updata.gif"> 
			<input name="submit" type="hidden" value="submit"> 
			<a href="<?php echo $base.$this->config->item('index_page').'/'; ?>dl_mis">
			<img src="<?php echo "$base"; ?>/images/button_torikesi.gif" border="0" />
			</a>
		</td>
	</tr>
</table>
</form>
</div>
</td>
