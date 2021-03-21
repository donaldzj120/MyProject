<td valign="top">
<!-- <div class="title02">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td><?php echo $formlabes['userregformtitle']?></td>
      </tr>
    </table>
  </div> -->
  <div id="menu9">
</div>
  <?php echo form_open('mgr_user_update'); ?>
  <div>
  <input type="hidden" name="id" value="<?php if(empty($td['id'])) echo set_value('id');else echo $td['id']; ?>"></input>
  <input type="hidden" name="user_id" value="<?php if(empty($td['user_id'])) echo set_value('user_id');else echo $td['user_id']; ?>" />
  <div id="ct1"><?php echo $formlabes['user_id']?></div>
  <div id="ct2">
  	<?php if(empty($td['user_id'])) echo set_value('user_id');else echo $td['user_id']; ?>
  </div>
  <div id="ctmg1"></div>
  <div id="ct3"><?php echo $formlabes['password']?><font size="-2" color="#FF9900">※必須(半角英数字)</font></div>
  <div id="ct4">
  	<input type="password" name="password" value="<?php if(empty($td['password'])) echo set_value('password');else echo $td['password']; ?>" size="12" />
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('password')); ?></div>
  <div id="ct3"><?php echo $formlabes['passconf']?><font size="-2" color="#FF9900">※必須(半角英数字)</font></div>
  <div id="ct4">
  	<input type="password" name="passconf" value="<?php if(empty($td['password'])) echo set_value('passconf');else echo $td['password']; ?>" size="12" />
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('passconf')); ?></div>
  <div id="ct3"><?php echo $formlabes['authority'][0]?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	<select name="authority">
      	<?php if($user_authority == 1) {?>
        <option value="1" <?php if(!empty($td['authority']) && ($td['authority'] == 1)) {echo 'selected';}else{echo set_select('authority', '1');}?> ><?php echo $formlabes['authority'][1]?></option>
        <option value="2" <?php if(!empty($td['authority']) && ($td['authority'] == 2)) {echo 'selected';}else{echo set_select('authority', '2');}?> ><?php echo $formlabes['authority'][2]?></option>
        <option value="3" <?php if(!empty($td['authority']) && ($td['authority'] == 3)) {echo 'selected';}else{echo set_select('authority', '3');}?> ><?php echo $formlabes['authority'][3]?></option>
      	<?php } ?>
        <option value="4" <?php if(!empty($td['authority']) && ($td['authority'] == 4)) {echo 'selected';}else{echo set_select('authority', '4');}?> ><?php echo $formlabes['authority'][4]?></option>
        <option value="5" <?php if(!empty($td['authority']) && ($td['authority'] == 5)) {echo 'selected';}else{echo set_select('authority', '5');}?> ><?php echo $formlabes['authority'][5]?></option>
    </select>
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('authority')); ?></div>
  <div id="ct3"><?php echo $formlabes['username']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	<input type="text" name="username" value="<?php if(empty($td['username'])) echo set_value('username');else echo $td['username'];?>" size="15" />
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('username')); ?></div>
  <div id="ct3"><?php echo $formlabes['email']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	<input type="text" name="email" value="<?php if(empty($td['email'])) echo set_value('email');else echo $td['email']; ?>" size="25" />
  </div>
  <div id="ctmg2"><?php echo strip_tags(form_error('email')); ?></div>
  <div id="ct3"><?php echo $formlabes['user_phone3']?><font size="-2" color="#FF9900">※必須</font></div>
  <div id="ct4">
  	<input type="text" name="user_phone3" value="<?php if(empty($user_phone3)) echo set_value('user_phone3');else echo $user_phone3; ?>" size="4" maxlength="3" />-
    <input type="text" name="user_phone4" value="<?php if(empty($user_phone4)) echo set_value('user_phone4');else echo $user_phone4; ?>" size="4" maxlength="4" />-
    <input type="text" name="user_phone5" value="<?php if(empty($user_phone5)) echo set_value('user_phone5');else echo $user_phone5; ?>" size="4" maxlength="4" />
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
  	<input type="text" name="user_phone6" value="<?php if(empty($user_phone6)) echo set_value('user_phone6');else echo $user_phone6; ?>" size="4" maxlength="3"/>-
    <input type="text" name="user_phone7" value="<?php if(empty($user_phone7)) echo set_value('user_phone7');else echo $user_phone7; ?>" size="4" maxlength="4"/>-
    <input type="text" name="user_phone8" value="<?php if(empty($user_phone8)) echo set_value('user_phone8');else echo $user_phone8; ?>" size="4" maxlength="4"/>
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
  	<input type="text" name="user_info1" value="<?php if(empty($td['user_info1'])) echo set_value('user_info1');else echo $td['user_info1'];?>" size="50" />
  </div>
  <div id="ctmg2">
  	<?php echo strip_tags(form_error('user_info1')); ?>
  </div>
  <div id="ct3"><?php echo $formlabes['user_info2']?></div>
  <div id="ct4">
  	<input type="text" name="user_info2" value="<?php if(empty($td['user_info2'])) echo set_value('user_info2');else echo $td['user_info2']; ?>" size="50" />
  </div>
  <div id="ctmg2">
  	<?php echo strip_tags(form_error('user_info2')); ?>
  </div>
  <div id="ct3"><?php echo $formlabes['car_info1']?></div>
  <div id="ct4">
  	<input type="text" name="car_info1" value="<?php if(empty($td['car_info1'])) echo set_value('car_info1');else echo $td['car_info1']; ?>" size="50" />
  </div>
  <div id="ctmg2">
  	<?php echo strip_tags(form_error('car_info1')); ?>
  </div>
  <div id="ct3"><?php echo $formlabes['car_info2']?></div>
  <div id="ct4">
  	<input type="text" name="car_info2" value="<?php if(empty($td['car_info2'])) echo set_value('car_info2');else echo $td['car_info2']; ?>" size="50" />
  </div>
  <div id="ctmg2">
  	<?php echo strip_tags(form_error('car_info2')); ?>
  </div>
  <?php if ($authority == 1) {?>
  	<div id="ct3"><?php echo $formlabes['bangou']?></div>
  	<div id="ct4">
  	<input type="text" name="bangou" value="<?php if(empty($td['bangou'])) echo set_value('bangou');else echo $td['bangou']; ?>" size="10" maxlength="7"/>
  	</div>
  	<div id="ctmg2">
  	 <?php echo strip_tags(form_error('bangou')); ?>
  	</div>
  <?php } ?>
  </div>
  <div style="clear: both;">
</div>
<div id="bt">
	<div class="bt_left">
	<input type="image" src="<?php echo "$base"; ?>images/koushin.jpg">
	<input type="hidden" value="submit">
	</div>
	<div class="bt_right">
	<?php echo anchor('mgr_user', '<img src="'.$base.'/images/cxl.jpg" border="0"/>'); ?></div>
	</div>
  </form></td>
