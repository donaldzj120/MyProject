<td valign="top">
<script src="<?php echo $base;?>js/ajaxzip2/jquery.js"></script>
<script src="<?php echo $base;?>js/ajaxzip2/ajaxzip2.js" charset="UTF-8"></script>
<script>AjaxZip2.JSONDATA = '<?php echo $base;?>js/ajaxzip2/data';</script>
<script src="<?php echo $base;?>js/WebCalendar.js" type="text/javascript"></script>
<script type="text/javascript">
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
function jyusho(value1,value2)
{
	var ka_add1=document.getElementById('todoke_add1');
	ka_add1.value=value1;
	var ka_add2=document.getElementById('todoke_add2');
	ka_add2.value=value2;
	}
</script>
<img src="<?php echo $base;?>images/haisou_menu.jpg" width="1026" height="37" />
  <?php echo form_open_multipart('ctm_mis_create',array('name' => 'ctm_mis_create')); ?>
  <div id="ct1"><?php echo $formlabels['id']?><font size="-2" color="#FF9900">※必須(半角英数字)</font></div>
  <div id="ct2">
  	<input type="text" name="sagyo_id1" value="<?php echo $sagyo_id1; ?>" size="7" maxlength="10" readonly="true" style="background-color: #DEDEDE;" />-
    <input type="text" name="sagyo_id2" value="<?php echo $sagyo_id2; ?>" size="8" maxlength="10" readonly="true" style="background-color: #DEDEDE;" />
  </div>
  <div id="ctmg1">
   <?php if(strip_tags(form_error('sagyo_id1')) != '') {?>
  	  <?php echo strip_tags(form_error('sagyo_id1')); ?>
  	  <?php } else { ?>
  	  <?php echo strip_tags(form_error('sagyo_id2')); ?>
   <?php }?>
  </div>
  <div id="ct3"><?php echo $formlabels['todoke_tel1']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	  <input type="text" name="todoke_tel1" value="<?php echo set_value('todoke_tel1'); ?>" size="4" maxlength="3" style="ime-mode: disabled;"/>-
      <input type="text" name="todoke_tel2" value="<?php echo set_value('todoke_tel2'); ?>" size="4" maxlength="4" style="ime-mode: disabled;"/>-
      <input type="text" name="todoke_tel3" value="<?php echo set_value('todoke_tel3'); ?>" size="4" maxlength="4" style="ime-mode: disabled;"/>
  </div>
  <div id="ctmg2">
	<?php if(strip_tags(form_error('todoke_tel1')) != '') { ?>
      <?php echo strip_tags(form_error('todoke_tel1')); ?>
      <?php } elseif(strip_tags(form_error('todoke_tel2')) != '') { ?>
      <?php echo strip_tags(form_error('todoke_tel2')); ?>
      <?php } else { ?>
      <?php echo strip_tags(form_error('todoke_tel3')); ?>
      <?php } ?>
  </div>
  <div id="ct3"><?php echo $formlabels['todoke_post']?><font size="-2" color="#FF9900">(半角数字のみ)</font></div>
  <div id="ct4">
  	<input type="text" name="todoke_post" value="<?php echo set_value('todoke_post'); ?>" size="6" style="ime-mode: disabled;"onKeyUp="AjaxZip2.zip2addr(this,'todoke_add1','todoke_add2');" />&nbsp;&nbsp;<strong><?php echo '<a href="#" onClick=openwin("'.$base.$this->config->item('index_page').'/'.'ctm_jyusho'.'")>御届先住所検索</a>';?></strong>
  </div>
  <div id="ctmg2">
	<?php echo strip_tags(form_error('todoke_post')); ?>
  </div>
  <div id="ct3" style="height:70px;"><?php echo $formlabels['todoke_add']?></div>
  <div id="ct4" style="height:70px;">
  	都道府県&nbsp;<input type="text" name="todoke_add1" id="todoke_add1" value="<?php echo set_value('todoke_add1'); ?>" size="10" />&nbsp;&nbsp;
      市区町村都&nbsp;<input type="text" name="todoke_add2" id="todoke_add2" value="<?php echo set_value('todoke_add2'); ?>" size="19" /><br/>
      それ以下の住所&nbsp;<input type="text" name="todoke_add22" value="<?php echo set_value('todoke_add22'); ?>" size="41" /><br/>
      建物名&nbsp;<input type="text" name="todoke_add3" value="<?php echo set_value('todoke_add3'); ?>" size="49" />
  </div>
  <div id="ctmg2" style="height:70px;">
	<?php if(strip_tags(form_error('todoke_add1')) != '') {?>
  	  <?php echo strip_tags(form_error('todoke_add1')); ?>
  	  <?php } elseif(strip_tags(form_error('todoke_add2')) != '') { ?>
  	  <?php echo strip_tags(form_error('todoke_add2')); ?>
  	  <?php } else { ?>
  	  <?php echo strip_tags(form_error('todoke_add3')); ?>
  	  <?php }?>
  </div>
  <div id="ct3" style="height:50px;"><?php echo $formlabels['todoke_name']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4" style="height:50px;">
  	会社名&nbsp;<input type="text" name="todoke_name1" value="<?php echo set_value('todoke_name1'); ?>" size="35" />&nbsp;&nbsp;不要の場合は*を入力してください。<br/>
      お名前&nbsp;<input type="text" name="todoke_name2" value="<?php echo set_value('todoke_name2'); ?>" size="35" />
  </div>
  <div id="ctmg2" style="height:50px;">
	<?php if(strip_tags(form_error('todoke_name1')) != '') {?>
      <?php echo strip_tags(form_error('todoke_name1')); ?>
      <?php } else {?>
      <?php echo strip_tags(form_error('todoke_name2')); ?>
      <?php }?>
  </div>
  <div id="ct3"><?php echo $formlabels['todoketime']?></div>
  <div id="ct4">
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
  </div>
  <div id="ctmg2">
  </div>
  <div id="ct3"><?php echo $formlabels['ka_tel1']?><font size="-2" color="#FF9900">※必須(半角数字)</font></div>
  <div id="ct4">
  	<input type="text" name="ka_tel1" value="<?php echo set_value('ka_tel1'); ?>" size="4" maxlength="3" style="ime-mode: disabled;"/>-
      <input type="text" name="ka_tel2" value="<?php echo set_value('ka_tel2'); ?>" size="4" maxlength="4" style="ime-mode: disabled;"/>-
      <input type="text" name="ka_tel3" value="<?php echo set_value('ka_tel3'); ?>" size="4" maxlength="4" style="ime-mode: disabled;"/>&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo '<a href="#" onClick=openwin("'.$base.$this->config->item('index_page').'/'.'ctm_ka'.'")>荷送人履歴検索</a>';?></strong>
  </div>
  <div id="ctmg2">
  <?php if(strip_tags(form_error('ka_tel1')) != '') { ?>
      <?php echo strip_tags(form_error('ka_tel1')); ?>
      <?php } elseif(strip_tags(form_error('ka_tel2')) != '') { ?>
      <?php echo strip_tags(form_error('ka_tel2')); ?>
      <?php } else { ?>
      <?php echo strip_tags(form_error('ka_tel3')); ?>
      <?php } ?>
  </div>
  <div id="ct3"><?php echo $formlabels['ka_post']?><font size="-2" color="#FF9900">(半角数字のみ)</font></div>
  <div id="ct4">
  	<input type="text" name="ka_post" value="<?php echo set_value('ka_post'); ?>" size="6" style="ime-mode: disabled;"onKeyUp="AjaxZip2.zip2addr(this,'ka_add1','ka_add2');" />
  </div>
  <div id="ctmg2">
  	<?php echo strip_tags(form_error('ka_post')); ?>
  </div>
  <div id="ct3" style="height:70px;"><?php echo $formlabels['ka_add']?></div>
  <div id="ct4" style="height:70px;">
  	都道府県&nbsp;<input type="text" name="ka_add1" value="<?php echo set_value('ka_add1'); ?>" size="4" />
      市区町村都&nbsp;<input type="text" name="ka_add2" value="<?php echo set_value('ka_add2'); ?>" size="11" /><br/>
      それ以下の住所&nbsp;<input type="text" name="ka_add22" value="<?php echo set_value('ka_add22'); ?>" size="27" /><br/>
      建物名&nbsp;<input type="text" name="ka_add3" value="<?php echo set_value('ka_add3'); ?>" size="35" />
  </div>
  <div id="ctmg2" style="height:70px;">
  	<?php if(strip_tags(form_error('ka_add1')) != '') {?>
  	  <?php echo strip_tags(form_error('ka_add1')); ?>
  	  <?php } elseif(strip_tags(form_error('ka_add2')) != '') { ?>
  	  <?php echo strip_tags(form_error('ka_add2')); ?>
  	  <?php } else { ?>
  	  <?php echo strip_tags(form_error('ka_add3')); ?>
  	  <?php }?>
  </div>
  <div id="ct3" style="height:50px;"><?php echo $formlabels['ka_name']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4" style="height:50px;">
  	会社名&nbsp;<input type="text" name="ka_name1" value="<?php echo set_value('ka_name1'); ?>" size="35" />&nbsp;&nbsp;不要の場合は*を入力してください。<br/>
      お名前&nbsp;<input type="text" name="ka_name2" value="<?php echo set_value('ka_name2'); ?>" size="35" />
  </div>
  <div id="ctmg2" style="height:50px;">
  	<?php if(strip_tags(form_error('ka_name1')) != '') {?>
      <?php echo strip_tags(form_error('ka_name1')); ?>
      <?php } else {?>
      <?php echo strip_tags(form_error('ka_name2')); ?>
      <?php }?>
  </div>
  <div id="ct3"><?php echo $formlabels['hiccyaku']?></div>
  <div id="ct4">
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
  </div>
  <div id="ctmg2">
  	<?php echo strip_tags(form_error('hiccyaku')); ?>
  </div>
  <div id="ct3"><?php echo $formlabels['hinmei']?></div>
  <div id="ct4">
  	<input type="text" name="hinmei" value="<?php echo set_value('hinmei'); ?>" size="50" />
  </div>
  <div id="ctmg2">
  	<?php echo strip_tags(form_error('hinmei')); ?>
  </div>
  <div id="ct3"><?php echo $formlabels['hoken']?></div>
  <div id="ct4">
  	<input type="text" name="hoken" value="<?php echo set_value('hoken'); ?>" size="10" style="ime-mode: disabled;"/>
  </div>
  <div id="ctmg2">
  	<?php echo strip_tags(form_error('hoken')); ?>
  </div>
  <div id="ct3" style="height:50px;"><?php echo $formlabels['ka']?></div>
  <div id="ct4" style="height:50px;">
  	<input type="radio" name="ka" value="0" <?php if($ka != NULL && $ka == '0') echo 'checked'; ?>  />&nbsp;<?php echo $formlabels['ka1'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="ka" value="1" <?php if(!empty($ka) && $ka == '1') echo 'checked'; ?> />&nbsp;<?php echo $formlabels['ka2'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="ka" value="2" <?php if(!empty($ka) && $ka == '2') echo 'checked'; ?> />&nbsp;<?php echo $formlabels['ka3'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="ka" value="3" <?php if(!empty($ka) && $ka == '3') echo 'checked'; ?> />&nbsp;<?php echo $formlabels['ka4'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<br/>
      <input type="radio" name="ka" value="4" <?php echo set_radio('ka', '4'); ?> />&nbsp;その他<input type="text" name="ka_sonota" value="<?php echo set_value('ka_sonota'); ?>" size="10" />
  </div>
  <div id="ctmg2" style="height:50px;">
  	<?php echo strip_tags(form_error('ka')); ?>
  </div>
  <div id="ct3" style="height:50px;"><?php echo $formlabels['siji']?></div>
  <div id="ct4" style="height:50px;">
  	<input type="radio" name="siji" value="0" <?php if($siji != NULL && $siji == '0') echo 'checked'; ?> />&nbsp;<?php echo $formlabels['siji1'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="siji" value="1" <?php echo set_radio('siji', '1') ?> />&nbsp;<input type="text" name="siji2" value="<?php echo set_value('siji2'); ?>" size="5" />&nbsp;&nbsp;<?php echo $formlabels['siji2'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="siji" value="2" <?php echo set_radio('siji', '2') ?> />&nbsp;<input type="text" name="siji3" value="<?php echo set_value('siji3'); ?>" size="5" />&nbsp;&nbsp;<?php echo $formlabels['siji3'] ?><br/>
      <input type="radio" name="siji" value="3" <?php if(!empty($siji) && $siji == '3') echo 'checked'; ?> />&nbsp;<?php echo $formlabels['siji4'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="siji" value="4" <?php if(!empty($siji) && $siji == '4') echo 'checked'; ?> />&nbsp;その他<input type="text" name="siji5" value="<?php echo set_value('siji5'); ?>" size="5" />
  </div>
  <div id="ctmg2" style="height:50px;">
  	<?php echo strip_tags(form_error('siji')); ?>
  </div>
  <div id="ct3"><?php echo $formlabels['kosuu']?></div>
  <div id="ct4">
  	<input type="text" name="kosuu" value="<?php echo set_value('kosuu'); ?>" size="2" style="ime-mode: disabled;"/>&nbsp;個
  </div>
  <div id="ctmg2">
  	<?php echo strip_tags(form_error('kosuu')); ?>
  </div>
  <div id="ct3"><?php echo $formlabels['jyuryo']?></div>
  <div id="ct4">
  	<input type="text" name="jyuryo" value="<?php echo set_value('jyuryo'); ?>" size="2" style="ime-mode: disabled;"/>&nbsp;KG
  </div>
  <div id="ctmg2">
  	<?php echo strip_tags(form_error('jyuryo')); ?>
  </div>
  <div id="ct3" style="height:85px;"><?php echo $formlabels['tokki']?></div>
  <div id="ct4" style="height:85px;">
  	<textarea name="tokki" rows="3" cols="50"><?php echo set_value('tokki'); ?></textarea>
  </div>
  <div id="ctmg2" style="height:85px;">
  	<?php echo strip_tags(form_error('tokki')); ?>
  </div>
  <div id="ct3"><?php echo $formlabels['file'];?><font size="-2" color="#FF9900"><strong>(*.pdf, *.doc, *.xls, *.jpg, *.txt)</strong></font></div>
  <div id="ct4">
  	<input type="file" name="userfile" size="20" />
  </div>
  <div id="ctmg2">
  </div>
  <div id="kt">
	<div id="kt1">
	<input type="image" src="<?php echo "$base"; ?>/images/mt_r26_c2.jpg">
	<input type="hidden" value="submit">
	</div>
	<div id="kt2">
	<?php echo anchor('ctm_mis', '<img src="'.$base.'/images/mt_r1_c1.jpg" border="0"/>'); ?></div>
	</div>
  </form></td>
