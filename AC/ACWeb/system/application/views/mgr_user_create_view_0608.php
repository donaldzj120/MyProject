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
<div id="menu8">
</div>
<?php echo form_open('mgr_user_create'); ?>
<div>
  <div id="ct1"><?php echo $formlabes['user_id']?><font size="-2" color="#FF9900">※必須(半角英数字)</font></div>
  <div id="ct2">
  	<input type="text" name="user_id" value="<?php echo set_value('user_id'); ?>" size="20" />
  </div>
  <div id="ctmg1"><?php echo strip_tags(form_error('user_id')); ?></div>
  <div id="ct3"><?php echo $formlabes['password']?><font size="-2" color="#FF9900">※必須(半角英数字)</font></div>
  <div id="ct4">
  	<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="20" />
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('password')); ?></div>
  <div id="ct3"><?php echo $formlabes['passconf']?><font size="-2" color="#FF9900">※必須(半角英数字)</font></div>
  <div id="ct4">
  	<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="20" />
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('passconf')); ?></div>
  <div id="ct3"><?php echo $formlabes['authority'][0]?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	<select name="authority">
		<?php if ($user_authority == 1) {?>
		<option value="1" <?php echo set_select('authority', '1'); ?>><?php echo $formlabes['authority'][1]?></option>
		<option value="2" <?php echo set_select('authority', '2'); ?>><?php echo $formlabes['authority'][2]?></option>
		<option value="3" <?php echo set_select('authority', '3'); ?>><?php echo $formlabes['authority'][3]?></option>
		<?php } ?>
		<option value="4" <?php echo set_select('authority', '4', TRUE); ?>><?php echo $formlabes['authority'][4]?></option>
		<option value="5" <?php echo set_select('authority', '5'); ?>><?php echo $formlabes['authority'][5]?></option>
	</select>
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('authority')); ?></div>
  <div id="ct3"><?php echo $formlabes['username']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="20" />
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('username')); ?></div>
  <div id="ct3"><?php echo $formlabes['email']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('email')); ?></div>
  <div id="ct3"><?php echo $formlabes['user_phone3']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	<input type="text" name="user_phone3" value="<?php echo set_value('user_phone3'); ?>" size="4" maxlength="3"/>-
	<input type="text" name="user_phone4" value="<?php echo set_value('user_phone4'); ?>" size="4" maxlength="4" />-
	<input type="text" name="user_phone5" value="<?php echo set_value('user_phone5'); ?>" size="4" maxlength="4" />
  </div>
  <div id="ctmg2">
  	  <?php if(strip_tags(form_error('user_phone3')) != '') { ?>
      <?php echo strip_tags(form_error('user_phone3')); ?>
      <?php } elseif(strip_tags(form_error('user_phone4')) != '') { ?>
      <?php echo strip_tags(form_error('user_phone4')); ?>
      <?php } else { ?>
      <?php echo strip_tags(form_error('user_phone5')); ?>
      <?php } ?>
  </div>
  <div id="ct3"><?php echo $formlabes['user_phone6']?></div>
  <div id="ct4">
  	<input type="text" name="user_phone6" value="<?php echo set_value('user_phone6'); ?>" size="4" maxlength="3"/>-
	<input type="text" name="user_phone7" value="<?php echo set_value('user_phone7'); ?>" size="4" maxlength="4"/>-
	<input type="text" name="user_phone8" value="<?php echo set_value('user_phone8'); ?>" size="4" maxlength="4"/>
  </div>
  <div id="ctmg2">
  	  <?php if(strip_tags(form_error('user_phone6')) != '') { ?>
      <?php echo strip_tags(form_error('user_phone6')); ?>
      <?php } elseif(strip_tags(form_error('user_phone7')) != '') { ?>
      <?php echo strip_tags(form_error('user_phone7')); ?>
      <?php } else { ?>
      <?php echo strip_tags(form_error('user_phone8')); ?>
      <?php } ?>
  </div>
  <div id="ct3"><?php echo $formlabes['user_info1']?></div>
  <div id="ct4">
  	<input type="text" name="user_info1" value="<?php echo set_value('user_info1'); ?>" size="50" />
  </div>
  <div id="ctmg2">
  	  <?php echo strip_tags(form_error('user_info1')); ?>
  </div>
  <div id="ct3"><?php echo $formlabes['user_info2']?></div>
  <div id="ct4">
  	<input type="text" name="user_info2" value="<?php echo set_value('user_info2'); ?>" size="50" />
  </div>
  <div id="ctmg2">
  	  <?php echo strip_tags(form_error('user_info2')); ?>
  </div>
  <div id="ct3"><?php echo $formlabes['car_info1']?></div>
  <div id="ct4">
  	<input type="text" name="car_info1" value="<?php echo set_value('car_info1'); ?>" size="50" />
  </div>
  <div id="ctmg2">
  	 <?php echo strip_tags(form_error('car_info1')); ?>
  </div>
  <div id="ct3"><?php echo $formlabes['car_info2']?></div>
  <div id="ct4">
  	<input type="text" name="car_info2" value="<?php echo set_value('car_info2'); ?>" size="50" />
  </div>
  <div id="ctmg2">
  	 <?php echo strip_tags(form_error('car_info2')); ?>
  </div>
</div>
<div style="clear: both;">
</div>
<div id="bt">
	<div class="bt_left">
		<input type="image" src="<?php echo "$base"; ?>images/touroku.jpg">
		<input type="hidden" value="submit">
	</div>
	<div class="bt_right">
		<?php echo anchor('mgr_user', '<img src="'.$base.'/images/cxl.jpg" border="0"/>'); ?>
	</div>
</div>
</form>
</td>
