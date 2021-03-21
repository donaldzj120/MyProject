<td valign="top"><div class="title02">
<script src="<?php echo $base;?>js/ajaxzip2/jquery.js"></script>
<script src="<?php echo $base;?>js/ajaxzip2/ajaxzip2.js" charset="UTF-8"></script>
<script>AjaxZip2.JSONDATA = '<?php echo $base;?>js/ajaxzip2/data';</script>
<script src="<?php echo $base;?>js/WebCalendar.js" type="text/javascript"></script>

<script>
function showcre(value1,value2,value3,value4,value5,value6,value7)
{
	var ka_name1=document.ctm_mis_create.ka_name1;
	ka_name1.value=value1;
	var ka_name2=document.ctm_mis_create.ka_name2;
	ka_name2.value=value2;
	var a = new Array();
	a = value3.split('-');
	var ka_tel1=document.ctm_mis_create.ka_tel1;
	ka_tel1.value=a[0];
	var ka_tel2=document.ctm_mis_create.ka_tel2;
	ka_tel2.value=a[1];
	var ka_tel3=document.ctm_mis_create.ka_tel3;
	ka_tel3.value=a[2];
	if(value4 != null)
	{
		var ka_post=document.ctm_mis_create.ka_post;
		ka_post.value=value4;
		}
	if(value5 != null)
	{
		var ka_add1=document.ctm_mis_create.ka_add1;
		ka_add1.value=value5;
		}
	if(value6 != null)
	{
		var b = new Array();
		b = value6.split(',');
		if(b[0] != null)
		{
			var ka_add2=document.ctm_mis_create.ka_add2;
			ka_add2.value=b[0];
			}
		
		if(b[1] != null)
		{
			var ka_add22=document.ctm_mis_create.ka_add22;
			ka_add22.value=b[1];
			}
		}
	if(value7 != null)
	{
		var ka_add3=document.ctm_mis_create.ka_add3;
		ka_add3.value=value7;
		}
}
</script>
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td><?php echo $formlabes['sagyoformtitle']?></td>
      </tr>
    </table>
  </div>
  <?php echo form_open('mgr_sagyo_create',array('name' => 'mgr_sagyo_create')); ?>
  <table  border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" width=100%>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['sagyo_id']?><font size="-2" color="#FF9900">※必須(半角英数字)</font></th>
      <td width="47%">
      <input type="text" name="sagyo_id1" value="<?php echo set_value('sagyo_id1'); ?>" size="10" maxlength="10" />-
      <input type="text" name="sagyo_id2" value="<?php echo set_value('sagyo_id2'); ?>" size="10" maxlength="10" /></td>
      <td class="err_msg" width="30%" align="left">
      <?php if(strip_tags(form_error('sagyo_id1')) != '') {?>
  	  <?php echo strip_tags(form_error('sagyo_id1')); ?>
  	  <?php } else { ?>
  	  <?php echo strip_tags(form_error('sagyo_id2')); ?>
  	  <?php }?></td>
    </tr>
	<tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['sagyo_date']?><font size="-2" color="#FF9900">※必須</font></th>
      <td width="47%"><input type="text" name="uketuke_date"  onclick="SelectDate(this,'yyyy\-MM\-dd')" readonly size="12" value="<?php echo $uketuke_date; ?>"></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('uketuke_date')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['uke']?><font color="#FF9900">※必須</font></th>
      <td width="47%">
      <select name="from_id">
    	<?php foreach($uke as $td){?>
      		<option value="<?php echo $td['user_id']?>" <?php echo set_select('from_id', $td['user_id'], TRUE); ?> ><?php echo $td['username']?></option>
		<?php }?>
		</select>
	  </td>
	  <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('from_id')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['todoke_tel1']?><font size="-2" color="#FF9900">※必須</font></th>
      <td width="47%">
      <input type="text" name="todoke_tel1" value="<?php echo set_value('todoke_tel1'); ?>" size="4" maxlength="4" />-<input type="text" name="todoke_tel2" value="<?php echo set_value('todoke_tel2'); ?>" size="4" maxlength="4" />-<input type="text" name="todoke_tel3" value="<?php echo set_value('todoke_tel3'); ?>" size="4" maxlength="4" /></td>
      <td width="30%" align="left"><font color="red">
      <?php if(strip_tags(form_error('todoke_tel1')) != '') { ?>
      <?php echo strip_tags(form_error('todoke_tel1')); ?>
      <?php } elseif(strip_tags(form_error('todoke_tel2')) != '') { ?>
      <?php echo strip_tags(form_error('todoke_tel2')); ?>
      <?php } else { ?>
      <?php echo strip_tags(form_error('todoke_tel3')); ?>
      <?php } ?>
      </font></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['todoke_post']?><font size="-2" color="#FF9900">(半角数字のみ)</font></th>
      <td width="47%">
      <input type="text" name="todoke_post" value="<?php echo set_value('todoke_post'); ?>" size="6" onKeyUp="AjaxZip2.zip2addr(this,'todoke_add1','todoke_add2');" /></td>
      <td width="30%" align="left"><font color="red"><?php echo strip_tags(form_error('todoke_post')); ?></font></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['todoke_add']?></th>
      <td width="47%">
      <input type="text" name="todoke_add1" value="<?php echo set_value('todoke_add1'); ?>" size="40" />&nbsp;&nbsp;都道府県<br/>
      <input type="text" name="todoke_add2" value="<?php echo set_value('todoke_add2'); ?>" size="15" />&nbsp;&nbsp;町&nbsp;
      <input type="text" name="todoke_add22" value="<?php echo set_value('todoke_add22'); ?>" size="15" /><br/>
      <input type="text" name="todoke_add3" value="<?php echo set_value('todoke_add3'); ?>" size="40" />&nbsp;&nbsp;ビル</td>
      <td width="30%" align="left"><font color="red">
      <?php if(strip_tags(form_error('todoke_add1')) != '') {?>
  	  <?php echo strip_tags(form_error('todoke_add1')); ?>
  	  <?php } elseif(strip_tags(form_error('todoke_add2')) != '') { ?>
  	  <?php echo strip_tags(form_error('todoke_add2')); ?>
  	  <?php } else { ?>
  	  <?php echo strip_tags(form_error('todoke_add3')); ?>
  	  <?php }?></font>
  	  </td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['todoke_name']?><font size="-2" color="#FF9900">※必須</font></th>
      <td width="47%">
      <input type="text" name="todoke_name1" value="<?php echo set_value('todoke_name1'); ?>" size="40" />&nbsp;&nbsp;会社<br/>
      <input type="text" name="todoke_name2" value="<?php echo set_value('todoke_name2'); ?>" size="40" />&nbsp;&nbsp;様</td>
      <td width="30%" align="left"><font color="red">
      <?php if(strip_tags(form_error('todoke_name1')) != '') {?>
      <?php echo strip_tags(form_error('todoke_name1')); ?>
      <?php } else {?>
      <?php echo strip_tags(form_error('todoke_name2')); ?>
      <?php }?>
      </font></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['todoketime']?></th>
      <td width="47%">
      <input readonly type="text" name="sagyo_date" onclick="SelectDate(this,'yyyy\-MM\-dd')" size="12" value="<?php echo $sagyo_date; ?>">&nbsp;&nbsp;
      <input type="radio" name="tdkjikan" value="必着" <?php echo set_radio('tdkjikan', '必着');?>>必着
      <select name="tdkji">
      	<?php for($i=0;$i<24;$i++) {?>
      	<option value="<?php echo $i?>" <?php echo set_select('tdkji', $i); ?>><?php echo $i;?></option>
      	<?php }?>
      </select>：
      <select name="tdkfun">
      	<option value="00" <?php echo set_select('tdkfun', '00'); ?>>00</option>
      	<option value="30" <?php echo set_select('tdkfun', '30'); ?>>30</option>
      </select>
      <input type="radio" name="tdkjikan" value="AM" <?php echo set_radio('tdkjikan', 'AM');?>>AM
      <input type="radio" name="tdkjikan" value="PM" <?php echo set_radio('tdkjikan', 'PM');?>>PM
      <input type="radio" name="tdkjikan" value="終日" <?php echo set_radio('tdkjikan', '終日');?>>終日
      </td>
      <td width="30%" align="left"><?php echo strip_tags(form_error('todoketime')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['ka_tel1']?><font size="-2" color="#FF9900">※必須</font></th>
      <td width="47%">
      <input type="text" name="ka_tel1" value="<?php echo set_value('ka_tel1'); ?>" size="4" maxlength="4" />-
      <input type="text" name="ka_tel2" value="<?php echo set_value('ka_tel2'); ?>" size="4" maxlength="4" />-
      <input type="text" name="ka_tel3" value="<?php echo set_value('ka_tel3'); ?>" size="4" maxlength="4" />&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo '<a href="#" onClick=openwin("'.$base.$this->config->item('index_page').'/'.'mgr_ka'.'")>荷送人履歴検索</a>';?></strong></td>
      <td width="30%" align="left"><font color="red">
      <?php if(strip_tags(form_error('ka_tel1')) != '') { ?>
      <?php echo strip_tags(form_error('ka_tel1')); ?>
      <?php } elseif(strip_tags(form_error('ka_tel2')) != '') { ?>
      <?php echo strip_tags(form_error('ka_tel2')); ?>
      <?php } else { ?>
      <?php echo strip_tags(form_error('ka_tel3')); ?>
      <?php } ?>
      </font></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['ka_post']?><font size="-2" color="#FF9900">(半角数字のみ)</font></th>
      <td width="47%">
      <input type="text" name="ka_post" value="<?php echo set_value('ka_post'); ?>" size="6"  onKeyUp="AjaxZip2.zip2addr(this,'ka_add1','ka_add2');" /></td>
      <td width="30%" align="left"><font color="red">
      <?php echo strip_tags(form_error('ka_post')); ?>
      </font></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['jyusyo']?></th>
      <td width="47%">
      <input type="text" name="ka_add1" value="<?php echo set_value('ka_add1'); ?>" size="40" />&nbsp;&nbsp;都道府県<br/>
      <input type="text" name="ka_add2" value="<?php echo set_value('ka_add2'); ?>" size="15" />&nbsp;&nbsp;町&nbsp;
      <input type="text" name="ka_add22" value="<?php echo set_value('ka_add22'); ?>" size="15" /><br/>
      <input type="text" name="ka_add3" value="<?php echo set_value('ka_add3'); ?>" size="40" />&nbsp;&nbsp;ビル</td>
      <!-- <input type="text" name="jyusyo" value="<?php echo set_value('jyusyo'); ?>" size="40" /></td> -->
      <td class="err_msg" width="30%" align="left">
      <?php if(strip_tags(form_error('ka_add1')) != '') {?>
  	  <?php echo strip_tags(form_error('ka_add1')); ?>
  	  <?php } elseif(strip_tags(form_error('ka_add2')) != '') { ?>
  	  <?php echo strip_tags(form_error('ka_add2')); ?>
  	  <?php } else { ?>
  	  <?php echo strip_tags(form_error('ka_add3')); ?>
  	  <?php }?>
      </td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['niukejin']?><font size="-2" color="#FF9900">※必須</font></th>
      <td width="47%">
      <input type="text" name="ka_name1" value="<?php echo set_value('ka_name1'); ?>" size="40" />&nbsp;&nbsp;会社<br/>
      <input type="text" name="ka_name2" value="<?php echo set_value('ka_name2'); ?>" size="40" />&nbsp;&nbsp;様
      </td>
      <td class="err_msg" width="30%" align="left">
      <?php if(strip_tags(form_error('ka_name1')) != '') {?>
      <?php echo strip_tags(form_error('ka_name1')); ?>
      <?php } else {?>
      <?php echo strip_tags(form_error('ka_name2')); ?>
      <?php }?>
  	  </td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['hiccyaku']?></th>
      <td width="47%">
      <input readonly type="text" name="hiccyaku1" onclick="SelectDate(this,'yyyy\-MM\-dd')" size="12" value="<?php echo $hiccyaku_date; ?>">&nbsp;&nbsp;
      <input type="radio" name="hckjikan" value="必着" <?php echo set_radio('hckjikan', '必着');?>>必着
      <select name="ji">
      	<?php for($i=0;$i<24;$i++) {?>
      	<option value="<?php echo $i?>" <?php echo set_select('ji', $i); ?>><?php echo $i;?></option>
      	<?php }?>
      </select>：
      <select name="fun">
      	<option value="00" <?php echo set_select('fun', '00'); ?>>00</option>
      	<option value="30" <?php echo set_select('fun', '30'); ?>>30</option>
      </select>
      <input type="radio" name="hckjikan" value="AM" <?php echo set_radio('hckjikan', 'AM');?>>AM
      <input type="radio" name="hckjikan" value="PM" <?php echo set_radio('hckjikan', 'PM');?>>PM
      <input type="radio" name="hckjikan" value="終日" <?php echo set_radio('hckjikan', '終日');?>>終日
      </td>
      <td width="30%" align="left"><?php echo strip_tags(form_error('hiccyaku')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['egyou']?></th>
      <td width="47%"><input type="text" name="egyou" value="<?php echo set_value('egyou'); ?>" size="40" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('egyou')); ?></td>
    </tr>
    <!-- <tr>
      <th bgcolor="#E0EFFF"><?php echo $formlabes['kwe_no']?></th>
      <td width="40%"><input type="text" name="kwe_no" value="<?php echo set_value('kwe_no'); ?>" size="20" /></td>
      <td class="err_msg" width="40%" align="left"><?php echo strip_tags(form_error('kwe_no')); ?></td>
    </tr> -->
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['kihon']?></th>
      <td width="47%"><input type="text" name="kihon" value="<?php echo set_value('kihon'); ?>" size="12" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('kihon')); ?></td>
    </tr>	
    <!-- <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['jikan']?></th>
      <td width="47%"><input type="text" name="jikan" value="<?php echo set_value('jikan'); ?>" size="5" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('jikan')); ?></td>
    </tr> -->
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['gosu']?></th>
      <td width="47%"><input type="text" name="kosuu" value="<?php echo set_value('kosuu'); ?>" size="5" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('kosuu')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['jyuryo']?></th>
      <td width="47%"><input type="text" name="jyuryo" value="<?php echo set_value('jyuryo'); ?>" size="5" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('jyuryo')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['kubun'][0]?></th>
      <td width="47%"><select name="kubun">
      		<option value="0" <?php echo set_select('kubun', '0', TRUE); ?>><?php echo $formlabes['kubun'][0]?></option>
			<option value="1" <?php echo set_select('kubun', '1'); ?>><?php echo $formlabes['kubun'][1]?></option>
			<option value="2" <?php echo set_select('kubun', '2'); ?>><?php echo $formlabes['kubun'][2]?></option>
			<option value="3" <?php echo set_select('kubun', '3'); ?>><?php echo $formlabes['kubun'][3]?></option>
			<option value="4" <?php echo set_select('kubun', '4'); ?>><?php echo $formlabes['kubun'][4]?></option>
		</select></td>
      <!-- <td width="40%"><input type="text" name="kubun" value="<?php echo set_value('kubun'); ?>" size="5" /></td> -->
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('kubun')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['kyori']?></th>
      <td width="47%"><input type="text" name="kyori" value="<?php echo set_value('kyori'); ?>" size="5" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('kyori')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['kyori_kane']?></th>
      <td width="47%"><input type="text" name="kyori_kane" value="<?php echo set_value('kyori_kane'); ?>" size="12" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('kyori_kane')); ?></td>
    </tr>
    
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['futai_sagyo'][0]?></th>
      <td width="47%">
      <input type="checkbox" name="futai_sagyo[]" value="1" <?php echo set_checkbox('futai_sagyo[]', '1'); ?> /><?php echo $formlabes['futai_sagyo'][1]?>&nbsp;&nbsp;
      <input type="checkbox" name="futai_sagyo[]" value="2" <?php echo set_checkbox('futai_sagyo[]', '2'); ?> /><?php echo $formlabes['futai_sagyo'][2]?>&nbsp;&nbsp;
      <input type="checkbox" name="futai_sagyo[]" value="3" <?php echo set_checkbox('futai_sagyo[]', '3'); ?> /><?php echo $formlabes['futai_sagyo'][3]?>&nbsp;&nbsp;
      <input type="checkbox" name="futai_sagyo[]" value="4" <?php echo set_checkbox('futai_sagyo[]', '4'); ?> /><?php echo $formlabes['futai_sagyo'][4]?>&nbsp;&nbsp;
      <input type="checkbox" name="futai_sagyo[]" value="5" <?php echo set_checkbox('futai_sagyo[]', '5'); ?> /><?php echo $formlabes['futai_sagyo'][5]?>
      <input type="text" name="sonota" value="<?php echo set_value('sonota'); ?>" size="20"/>
      </td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('sonota')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['futai_kane']?></th>
      <td width="47%"><input type="text" name="futai_kane" value="<?php echo set_value('futai_kane'); ?>" size="12" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('futai_kane')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['kousoku']?></th>
      <td width="47%"><input type="text" name="kousoku" value="<?php echo set_value('kousoku'); ?>" size="12" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('kousoku')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['cyusya_kane']?></th>
      <td width="47%"><input type="text" name="cyusya_kane" value="<?php echo set_value('cyusya_kane'); ?>" size="12" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('cyusya_kane')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['biko']?></th>
      <td width="47%">
      <textarea name="bikou" rows="5" cols="50"><?php echo set_value('bikou'); ?></textarea>
      </td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('bikou')); ?></td>
    </tr>
    <tr>
      <th width="23%" bgcolor="#E0EFFF"><?php echo $formlabes['faxkara']?></th>
      <td width="47%"><input type="text" name="faxid" value="<?php echo set_value('faxid'); ?>" size="12" /></td>
      <td class="err_msg" width="30%" align="left"><?php echo strip_tags(form_error('faxid')); ?></td>
    </tr>
  </table>
    <table width="100%">
   <tr align="center">
	<td>
      <input type="image" src="<?php echo "$base"; ?>/images/button_tuika.gif">
	  <input type="hidden" value="submit">
	</td>
   </tr>
  </table>
  </form></td>
