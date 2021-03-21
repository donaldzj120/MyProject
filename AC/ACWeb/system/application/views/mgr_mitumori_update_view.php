<td valign="top">
<div id="menu15">
</div>
  <?php echo form_open('mgr_mitumori_update',array('name' => 'mgr_mitumori_update')); ?>
  <input type="hidden" name="id" value="<?php if(!empty($query['id']))echo $query['id'];else echo $id;?>" >
  <input type="hidden" name="from_id" value="<?php if(!empty($query['from_id']))echo $query['from_id'];?>" >
<div>
  <div id="ct1"><?php echo $formlabels['todoke_tel1']?></div>
  <div id="ct2"><?php echo $todoke_tel1.'-'.$todoke_tel2.'-'.$todoke_tel3;?></div>
  <div id="ctmg1"></div>
  <div id="ct3"><?php echo $formlabels['todoke_add']?></div>
  <div id="ct4">
  	<?php $add = explode(',',$query['todoke_add2']); echo $query['todoke_add1'].$add[0].$query['todoke_add3']; ?>
  </div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['todoke_name']?></div>
  <div id="ct4">
  	<?php echo $query['todoke_name1'].$query['todoke_name2']; ?>
  </div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['todoke_post']?></div>
  <div id="ct4">
  	<?php echo $query['todoke_post'];?>
  </div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['todoketime'];?></div>
  <div id="ct4">
  	<?php echo $query['sagyo_date']; ?>&nbsp;&nbsp;
      <?php
      if(!empty($query)&& strpos($query['sagyo_time'],':') > 0) {
      	echo '必着 '.$query['sagyo_time'];
      }
      else
      {
      	echo $query['sagyo_time'];
      }
      ?>
  </div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['ka_tel1']?></div>
  <div id="ct4"><?php echo $ka_tel1.'-'.$ka_tel2.'-'.$ka_tel3;?></div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['ka_add']?></div>
  <div id="ct4"><?php $add = explode(',',$query['ka_add2']); echo $query['ka_add1'].$add[0].$query['ka_add3']; ?></div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['ka_name']?></div>
  <div id="ct4"><?php echo $query['ka_name1'].$query['ka_name2'] ?></div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['ka_post']?></div>
  <div id="ct4"><?php echo $query['ka_post']; ?></div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['hiccyaku'];?></div>
  <div id="ct4">
  	<?php if(!empty($query['hiccyaku1']))echo $query['hiccyaku1'];?>&nbsp;&nbsp;
      <?php
      if(!empty($query['jikan'])&& strpos($query['jikan'],':') > 0) {
      	echo '必着'.$query['jikan'];
      }
      else
      {
      	echo $query['jikan'];
      }
      ?>
  </div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['hinmei']?></div>
  <div id="ct4"><?php echo $query['hinmei']; ?></div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['hoken']?></div>
  <div id="ct4"><?php echo $query['hoken']; ?></div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['ka']; $flag = 0;?></div>
  <div id="ct4"><?php echo $ka_temp; ?></div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['siji']; $flag = 0;?></div>
  <div id="ct4"><?php echo $siji_temp;?></div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['kosuu']?></div>
  <div id="ct4"><?php echo $query['kosuu']; ?></div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['jyuryo']?></div>
  <div id="ct4"><?php echo $query['jyuryo']; ?></div>
  <div id="ctmg2"></div>
  <div id="ct3"><?php echo $formlabels['tokki']?></div>
  <div id="ct4"><?php echo $query['tokki']; ?></div>
  <div id="ctmg2"></div>
  <div id="ct3">金額<font color="red">(半角数字のみ)</font></div>
  <div id="ct4"><input type="text" name="kingaku" value="<?php echo set_value('kingaku'); ?>" size="6" /></div>
  <div id="ctmg2"><?php echo strip_tags(form_error('kingaku')); ?></div>
</div>
<div id="bt">
	<div class="bt_left">
		<input type="image" src="<?php echo "$base"; ?>images/touroku.jpg">
		<input type="hidden" value="submit">
	</div>
	<div class="bt_right">
		<?php echo anchor('mgr_mitumori', '<img src="'.$base.'/images/cxl.jpg" border="0"/>'); ?>
	</div>
</div>
</form>
</td>
