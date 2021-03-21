<td valign="top"><div class="title02">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="50%">ご依頼の配送状況</td>
        <td width="50%" align="right">
		</td>
      </tr>
    </table>
  </div>
<?php echo form_open('ctm_ka/searchid'); ?>
  <table border="0" cellspacing="0" width="100%" align="right" bgcolor="#999999">
   <tr>
    <td width="55%" bgcolor="#FFFFFF"></td>
    <th align="right" height="20" width="10%" bgcolor="#FFFFFF">荷送人お名前</th>
    <td width="25%" bgcolor="#FFFFFF">
    <input type="text" name="ka_name" value="<?php echo $post['ka_name'];?>" size="12" maxlength="7"></input>
	</td>
    <td width="10%" bgcolor="#FFFFFF"><input type="image" src="<?php echo "$base"; ?>/images/r6_c8.jpg">
		<input type="hidden" value="submit"></td>
   </tr>
   </table><br><br>
</form>
</td>
