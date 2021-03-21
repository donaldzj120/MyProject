<td valign="top">
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
<div id="menu4">
</div>
  <?php echo form_open('mgr_sagyo_update',array('name' => 'mgr_sagyo_update')); ?>
  <input type="hidden" name="sagyo_id1" value="<?php echo $sagyo_id1;?>" />
  <input type="hidden" name="sagyo_id2" value="<?php echo $sagyo_id2;?>" />
  <input type="hidden" name="sagyo_year" value="<?php if(isset($td)) echo $td['year'];else echo set_value('sagyo_year')?>" />
  <input type="hidden" name="sagyo_month" value="<?php if(isset($td)) echo $td['month'];else echo set_value('sagyo_month')?>" />
  <input type="hidden" name="sagyo_day" value="<?php if(isset($td)) echo $td['day'];else echo set_value('sagyo_day')?>" />
  <input type="hidden" name="from_id" value="<?php echo $userid;?>" />
  <input type="hidden" name="username" value="<?php echo $username;?>" />
<div>
  <div id="ct1"><?php echo $formlabes['sagyo_id']?></div>
  <div id="ct2"><?php echo $sagyo_id1;?>-<?php echo $sagyo_id2;?></div>
  <div id="ctmg1"></div>
  <div id="ct3"><?php echo $formlabes['uke']?></div>
  <div id="ct4">
  	<?php echo $username;?>
  </div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabes['todoke_tel1']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	<input type="text" name="todoke_tel1" value="<?php if(empty($todoke_tel1)) echo set_value('todoke_tel1');else echo $todoke_tel1; ?>" size="4" maxlength="4"/>-
      <input type="text" name="todoke_tel2" value="<?php if(empty($todoke_tel2)) echo set_value('todoke_tel2');else echo $todoke_tel2; ?>" size="4" maxlength="4" />-
      <input type="text" name="todoke_tel3" value="<?php if(empty($todoke_tel3)) echo set_value('todoke_tel3');else echo $todoke_tel3; ?>" size="4" maxlength="4" />
  </div>
  <div id="ctmg2"><?php if(strip_tags(form_error('todoke_tel1')) != '') { ?>
      <?php echo strip_tags(form_error('todoke_tel1')); ?>
      <?php } elseif(strip_tags(form_error('todoke_tel2')) != '') { ?>
      <?php echo strip_tags(form_error('todoke_tel2')); ?>
      <?php } else { ?>
      <?php echo strip_tags(form_error('todoke_tel3')); ?>
      <?php } ?></div>
  <div id="ct3"><?php echo $formlabes['todoke_post']?><font size="-2" color="#FF9900">(半角数字のみ)</font></div>
  <div id="ct4">
  	<input type="text" name="todoke_post" value="<?php if(empty($td['todoke_post'])) echo set_value('todoke_post');else echo $td['todoke_post']; ?>" size="6" onKeyUp="AjaxZip2.zip2addr(this,'todoke_add1','todoke_add2');" />
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('todoke_post')); ?></div>
  <div id="ct3" style="height:65px;"><?php echo $formlabes['todoke_add']?></div>
  <div id="ct4" style="height:65px;">
  	<input type="text" name="todoke_add1" value="<?php if(empty($td['todoke_add1'])) echo set_value('todoke_add1');else echo $td['todoke_add1']; ?>" size="40" />&nbsp;&nbsp;都道府県<br/>
      <input type="text" name="todoke_add2" value="<?php if(empty($td['todoke_add2'])) echo set_value('todoke_add2');else {$add = explode(',',$td['todoke_add2']); echo $add[0];} ?>" size="15" />&nbsp;&nbsp;町&nbsp;&nbsp;
      <input type="text" name="todoke_add22" value="<?php if(empty($td['todoke_add2'])) echo set_value('todoke_add22');else if(isset($add[1])) echo $add[1]; ?>" size="15" /><?php //var_dump($add);?><br/>
      <input type="text" name="todoke_add3" value="<?php if(empty($td['todoke_add3'])) echo set_value('todoke_add3');else echo $td['todoke_add3']; ?>" size="40" />&nbsp;&nbsp;ビル
  </div>
  <div id="ctmg2" style="height:65px;"><?php if(strip_tags(form_error('todoke_add1')) != '') {?>
  	  <?php echo strip_tags(form_error('todoke_add1')); ?>
  	  <?php } elseif(strip_tags(form_error('todoke_add2')) != '') { ?>
  	  <?php echo strip_tags(form_error('todoke_add2')); ?>
  	  <?php } else { ?>
  	  <?php echo strip_tags(form_error('todoke_add3')); ?>
  	  <?php }?></div>
  <div id="ct3" style="height:40px;"><?php echo $formlabes['todoke_name']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4" style="height:40px;">
  	<input type="text" name="todoke_name1" value="<?php if(empty($td['todoke_name1'])) echo set_value('todoke_name1');else echo $td['todoke_name1']; ?>" size="40" />&nbsp;&nbsp;会社<br/>
      <input type="text" name="todoke_name2" value="<?php if(empty($td['todoke_name2'])) echo set_value('todoke_name2');else echo $td['todoke_name2']; ?>" size="40" />&nbsp;&nbsp;様
  </div>
  <div id="ctmg2" style="height:40px;"><?php if(strip_tags(form_error('todoke_name1')) != '') {?>
      <?php echo strip_tags(form_error('todoke_name1')); ?>
      <?php } else {?>
      <?php echo strip_tags(form_error('todoke_name2')); ?>
      <?php }?></div>
  <div id="ct3"><?php echo $formlabes['todoketime'];?></div>
  <div id="ct4">
  	<input readonly type="text" name="sagyo_date" onclick="SelectDate(this,'yyyy\-MM\-dd')" size="12" value="<?php if(!empty($td))echo $td['sagyo_date'];else echo $sagyo_date; ?>">&nbsp;&nbsp;
      <input type="radio" name="tdkjikan" value="必着"
      <?php
      if(!empty($td)&& strlen($td['sagyo_time']) == 5) {
      	echo 'checked';
      	$tdkji = substr($td['sagyo_time'],0,2);
      	$tdkfun = substr($td['sagyo_time'],3,2);
      }else echo set_radio('tdkjikan', '必着');?>>必着
      <select name="tdkji">
      	<?php for($i=0;$i<24;$i++) {?>
      	<option value="<?php echo $i?>" <?php if(isset($tdkji)&&($tdkji == $i))echo 'selected';else echo set_select('tdkji', $i); ?>><?php echo $i;?></option>
      	<?php }?>
      </select>：
      <select name="tdkfun">
      	<option value="00" <?php if(isset($tdkfun)&&($tdkfun=='00'))echo 'selected';else echo set_select('tdkfun', "00"); ?>>00</option>
      	<option value="30" <?php if(isset($tdkfun)&&($tdkfun=='30'))echo 'selected';else echo set_select('tdkfun', "30"); ?>>30</option>
      </select>
      <input type="radio" name="tdkjikan" value="AM" <?php if(!empty($td)&& $td['sagyo_time'] == "AM") echo 'checked';else echo set_radio('tdkjikan', 'AM');?>>AM
      <input type="radio" name="tdkjikan" value="PM" <?php if(!empty($td)&& $td['sagyo_time'] == "PM") echo 'checked';else echo set_radio('tdkjikan', 'PM');?>>PM
      <input type="radio" name="tdkjikan" value="終日" <?php if(!empty($td)&& $td['sagyo_time'] == "終日") echo 'checked';else echo set_radio('tdkjikan', '終日');?>>終日
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('todoketime')); ?></div>
  <div id="ct3"><?php echo $formlabes['ka_tel1']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	<input type="text" name="ka_tel1" value="<?php if(empty($ka_tel1)) echo set_value('ka_tel1');else echo $ka_tel1; ?>" size="4" maxlength="4" />-
      <input type="text" name="ka_tel2" value="<?php if(empty($ka_tel2)) echo set_value('ka_tel2');else echo $ka_tel2; ?>" size="4" maxlength="4" />-
      <input type="text" name="ka_tel3" value="<?php if(empty($ka_tel3)) echo set_value('ka_tel3');else echo $ka_tel3; ?>" size="4" maxlength="4" />&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo '<a href="#" onClick=openwin("'.$base.$this->config->item('index_page').'/'.'mgr_ka'.'")>荷送人履歴検索</a>';?></strong>
  </div>
  <div id="ctmg2"><?php if(strip_tags(form_error('ka_tel1')) != '') { ?>
      <?php echo strip_tags(form_error('ka_tel1')); ?>
      <?php } elseif(strip_tags(form_error('ka_tel2')) != '') { ?>
      <?php echo strip_tags(form_error('ka_tel2')); ?>
      <?php } else { ?>
      <?php echo strip_tags(form_error('ka_tel3')); ?>
      <?php } ?></div>
  <div id="ct3"><?php echo $formlabes['ka_post']?><font size="-2" color="#FF9900">(半角数字のみ)</font></div>
  <div id="ct4">
  	<input type="text" name="ka_post" value="<?php if(empty($td['ka_post'])) echo set_value('ka_post');else echo $td['ka_post']; ?>" size="6" onKeyUp="AjaxZip2.zip2addr(this,'ka_add1','ka_add2');" />
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('ka_post')); ?></div>
  <div id="ct3" style="height:65px;"><?php echo $formlabes['jyusyo']?></div>
  <div id="ct4" style="height:65px;">
  	<input type="text" name="ka_add1" value="<?php if(empty($td['ka_add1'])) echo set_value('ka_add1');else echo $td['ka_add1']; ?>" size="40" />&nbsp;&nbsp;都道府県<br/>
      <input type="text" name="ka_add2" value="<?php if(empty($td['ka_add2'])) echo set_value('ka_add2');else {$add = explode(',',$td['ka_add2']); echo $add[0];} ?>" size="15" />&nbsp;&nbsp;町&nbsp;&nbsp;
      <input type="text" name="ka_add22" value="<?php if(empty($td['ka_add2'])) echo set_value('ka_add22');else if(isset($add[1]))echo $add[1]; ?>" size="15" /><br/>
      <input type="text" name="ka_add3" value="<?php if(empty($td['ka_add3'])) echo set_value('ka_add3');else echo $td['ka_add3']; ?>" size="40" />&nbsp;&nbsp;ビル
  </div>
  <div id="ctmg2" style="height:65px;"><?php if(strip_tags(form_error('ka_add1')) != '') {?>
  	  <?php echo strip_tags(form_error('ka_add1')); ?>
  	  <?php } elseif(strip_tags(form_error('ka_add2')) != '') { ?>
  	  <?php echo strip_tags(form_error('ka_add2')); ?>
  	  <?php } else { ?>
  	  <?php echo strip_tags(form_error('ka_add3')); ?>
  	  <?php }?></div>
  <div id="ct3" style="height:40px;"><?php echo $formlabes['niukejin']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4" style="height:40px;">
      <input type="text" name="ka_name1" value="<?php if(empty($td['ka_name1'])) echo set_value('ka_name1');else echo $td['ka_name1']; ?>" size="40" />&nbsp;&nbsp;会社<br/>
      <input type="text" name="ka_name2" value="<?php if(empty($td['ka_name2'])) echo set_value('ka_name2');else echo $td['ka_name2']; ?>" size="40" />&nbsp;&nbsp;様
  </div>
  <div id="ctmg2" style="height:40px;"><?php if(strip_tags(form_error('ka_name1')) != '') {?>
      <?php echo strip_tags(form_error('ka_name1')); ?>
      <?php } else {?>
      <?php echo strip_tags(form_error('ka_name2')); ?>
      <?php }?></div>
  <div id="ct3"><?php echo $formlabes['hiccyaku'];?></div>
  <div id="ct4">
      <input readonly type="text" name="hiccyaku1" onclick="SelectDate(this,'yyyy\-MM\-dd')" size="12" value="<?php if(!empty($td))echo $td['hiccyaku1'];else echo $hiccyaku_date; ?>">&nbsp;&nbsp;
      <input type="radio" name="hckjikan" value="必着"
      <?php
      if(!empty($td)&& strlen($td['jikan']) == 5) {
      	echo 'checked';
      	$ji = substr($td['jikan'],0,2);
      	$fun = substr($td['jikan'],3,2);
      }else echo set_radio('hckjikan', '必着');?>>必着
      <select name="ji">
      	<?php for($i=0;$i<24;$i++) {?>
      	<option value="<?php echo $i?>" <?php if(isset($ji)&&($ji == $i))echo 'selected';else echo set_select('ji', $i); ?>><?php echo $i;?></option>
      	<?php }?>
      </select>：
      <select name="fun">
      	<option value="00" <?php if(isset($fun)&&($fun=='00'))echo 'selected';else echo set_select('fun', "00"); ?>>00</option>
      	<option value="30" <?php if(isset($fun)&&($fun=='30'))echo 'selected';else echo set_select('fun', "30"); ?>>30</option>
      </select>
      <input type="radio" name="hckjikan" value="AM" <?php if(!empty($td)&& $td['jikan'] == "AM") echo 'checked';else echo set_radio('hckjikan', 'AM');?>>AM
      <input type="radio" name="hckjikan" value="PM" <?php if(!empty($td)&& $td['jikan'] == "PM") echo 'checked';else echo set_radio('hckjikan', 'PM');?>>PM
      <input type="radio" name="hckjikan" value="終日" <?php if(!empty($td)&& $td['jikan'] == "終日") echo 'checked';else echo set_radio('hckjikan', '終日');?>>終日
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('hiccyaku')); ?></div>
  <div id="ct3"><?php echo $formlabes['egyou']?></div>
  <div id="ct4"><input type="text" name="egyou" value="<?php if(empty($td['egyou'])) echo set_value('egyou');else echo $td['egyou']; ?>" size="40" /></div>
  <div id="ctmg2"><?php echo strip_tags(form_error('egyou')); ?></div>
  <div id="ct3"><?php echo $formlabes['kihon']?></div>
  <div id="ct4"><input type="text" name="kihon" value="<?php if(empty($td['kihon'])) echo set_value('kihon');else echo $td['kihon']; ?>" size="12" /></div>
  <div id="ctmg2"><?php echo strip_tags(form_error('kihon')); ?></div>
  <div id="ct3"><?php echo $formlabes['gosu']?></div>
  <div id="ct4"><input type="text" name="kosuu" value="<?php if(empty($td['kosuu'])) echo set_value('kosuu');else echo $td['kosuu']; ?>" size="5" />&nbsp;個</div>
  <div id="ctmg2"><?php echo strip_tags(form_error('kosuu')); ?></div>
  <div id="ct3"><?php echo $formlabes['jyuryo']?></div>
  <div id="ct4"><input type="text" name="jyuryo" value="<?php if(empty($td['jyuryo'])) echo set_value('jyuryo');else echo $td['jyuryo']; ?>" size="5" />&nbsp;KG</div>
  <div id="ctmg2"><?php echo strip_tags(form_error('jyuryo')); ?></div>
  <div id="ct3"><?php echo $formlabes['kubun'][0]?></div>
  <div id="ct4">
  	<select name="kubun">
      	  <option value="0" <?php if(empty($td['kubun'])) {echo set_select('kubun', '0');$td['kubun'] = 0;} switch($td['kubun']){case 0:echo 'selected';}?> ><?php echo $formlabes['kubun'][0]?></option>
          <option value="1" <?php if(empty($td['kubun'])) {echo set_select('kubun', '1');$td['kubun'] = 1;} switch($td['kubun']){case 1:echo 'selected';}?> ><?php echo $formlabes['kubun'][1]?></option>
          <option value="2" <?php if(empty($td['kubun'])) {echo set_select('kubun', '2');$td['kubun'] = 2;} switch($td['kubun']){case 2:echo 'selected';}?> ><?php echo $formlabes['kubun'][2]?></option>
          <option value="3" <?php if(empty($td['kubun'])) {echo set_select('kubun', '3');$td['kubun'] = 3;} switch($td['kubun']){case 3:echo 'selected';}?> ><?php echo $formlabes['kubun'][3]?></option>
          <option value="4" <?php if(empty($td['kubun'])) {echo set_select('kubun', '4');$td['kubun'] = 4;} switch($td['kubun']){case 4:echo 'selected';}?> ><?php echo $formlabes['kubun'][4]?></option>
        </select>
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('kubun')); ?></div>
  <div id="ct3"><?php echo $formlabes['kyori']?></div>
  <div id="ct4"><input type="text" name="kyori" value="<?php if(empty($td['kyori'])) echo set_value('kyori');else echo $td['kyori']; ?>" size="5" />&nbsp;KM</div>
  <div id="ctmg2"><?php echo strip_tags(form_error('kyori')); ?></div>
  <div id="ct3"><?php echo $formlabes['kyori_kane']?></div>
  <div id="ct4"><input type="text" name="kyori_kane" value="<?php if(empty($td['kyori_kane'])) echo set_value('kyori_kane');else echo $td['kyori_kane']; ?>" size="5" />&nbsp;円</div>
  <div id="ctmg2"><?php echo strip_tags(form_error('kyori_kane')); ?></div>
  <div id="ct3"><?php echo $formlabes['futai_sagyo'][0]?></div>
  <div id="ct4"><input type="checkbox" name="futai_sagyo[]" value="1" <?php if(!empty($td['futai_sagyo'])){if(stristr($td['futai_sagyo'],'1')) echo $flag = 'checked';}else echo set_checkbox('futai_sagyo[]', '1'); ?> /><?php echo $formlabes['futai_sagyo'][1]?>&nbsp;&nbsp;
      <input type="checkbox" name="futai_sagyo[]" value="2" <?php if(!empty($td['futai_sagyo'])){if(stristr($td['futai_sagyo'],'2')) echo $flag = 'checked';}else echo set_checkbox('futai_sagyo[]', '2'); ?> /><?php echo $formlabes['futai_sagyo'][2]?>&nbsp;&nbsp;
      <input type="checkbox" name="futai_sagyo[]" value="3" <?php if(!empty($td['futai_sagyo'])){if(stristr($td['futai_sagyo'],'3')) echo $flag = 'checked';}else echo set_checkbox('futai_sagyo[]', '3'); ?> /><?php echo $formlabes['futai_sagyo'][3]?>&nbsp;&nbsp;
      <input type="checkbox" name="futai_sagyo[]" value="4" <?php if(!empty($td['futai_sagyo'])){if(stristr($td['futai_sagyo'],'4')) echo $flag = 'checked';}else echo set_checkbox('futai_sagyo[]', '4'); ?> /><?php echo $formlabes['futai_sagyo'][4]?>&nbsp;&nbsp;
      <input type="checkbox" name="futai_sagyo[]" value="5" <?php if(!empty($td['futai_sagyo'])){if(stristr($td['futai_sagyo'],'5')) echo $flag = 'checked';}else echo set_checkbox('futai_sagyo[]', '5'); ?> /><?php echo $formlabes['futai_sagyo'][5]?>
      <input type="text" name="sonota" value="<?php if(empty($td['sonota'])) echo set_value('sonota');else echo $td['sonota']; ?>" size="20"/>
      </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('sonota')); ?></div>
  <div id="ct3"><?php echo $formlabes['futai_kane']?></div>
  <div id="ct4"><input type="text" name="futai_kane" value="<?php if(empty($td['futai_kane'])) echo set_value('futai_kane');else echo $td['futai_kane']; ?>" size="5" />&nbsp;円</div>
  <div id="ctmg2"><?php echo strip_tags(form_error('futai_kane')); ?></div>
  <div id="ct3"><?php echo $formlabes['kousoku']?></div>
  <div id="ct4"><input type="text" name="kousoku" value="<?php if(empty($td['kousoku'])) echo set_value('kousoku');else echo $td['kousoku']; ?>" size="5" />&nbsp;円</div>
  <div id="ctmg2"><?php echo strip_tags(form_error('kousoku')); ?></div>
  <div id="ct3"><?php echo $formlabes['cyusya_kane']?></div>
  <div id="ct4"><input type="text" name="cyusya_kane" value="<?php if(empty($td['cyusya_kane'])) echo set_value('cyusya_kane');else echo $td['cyusya_kane']; ?>" size="5" />&nbsp;円</div>
  <div id="ctmg2"><?php echo strip_tags(form_error('cyusya_kane')); ?></div>
  <div id="ct3" style="height:110px;"><?php echo $formlabes['biko']?></div>
  <div id="ct4" style="height:110px;"><textarea name="bikou" rows="5" cols="50"><?php if(empty($td['bikou'])) echo set_value('bikou');else echo $td['bikou']; ?></textarea></div>
  <div id="ctmg2" style="height:110px;"><?php echo strip_tags(form_error('bikou')); ?></div>
  <div id="ct3"><?php echo $formlabes['faxkara']?></div>
  <div id="ct4"><input type="text" name="faxid" value="<?php echo set_value('faxid'); ?>" size="12" /></div>
  <div id="ctmg2"><?php echo strip_tags(form_error('faxid')); ?></div>
</div>
<div id="bt">
	<div class="bt_left">
		<input type="image" src="<?php echo "$base"; ?>images/touroku.jpg">
		<input type="hidden" value="submit">
		<input type="hidden" name="id" value="<?php echo $id;?>" />
      <input type="hidden" name="segment3" value="<?php echo $segment3;?>" />
	</div>
	<div class="bt_right">
		<?php echo anchor('mgr_kakunin', '<img src="'.$base.'/images/cxl.jpg" border="0"/>'); ?>
	</div>
</div>
  </form></td>
