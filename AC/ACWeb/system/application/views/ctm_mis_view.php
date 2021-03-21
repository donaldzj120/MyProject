<td valign="top">
  <!-- <div class="title02">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="50%">ご依頼の配送状況</td>
        <td width="50%" align="right">
		<!--<?php echo $new; ?> -->
		<!--<?php echo $doing; ?> -->
		<!--<?php echo $over; ?> -->
		<!-- <?php echo $del; ?> -->
		<!--<?php echo $all; ?>&nbsp;&nbsp;-->
		<!--</td>
      </tr>
    </table>
  </div> -->
  <div id="menu6">
	<div class="menuUtility"><?php echo $all; ?></div>
	<div class="menuUtility"><?php echo $over; ?></div>
	<div class="menuUtility"><?php echo $doing; ?></div>
	<div class="menuUtility"><?php echo $new; ?></div>
   </div>
<?php echo form_open('ctm_mis/searchid'); ?>
  <table border="0" cellspacing="0" width="1026" bgcolor="#FFFFFF" style="margin-top:5px;">
   <tr>
    <td width="55%" bgcolor="#FFFFFF"></td>
    <th align="right" height="20" width="10%" bgcolor="#FFFFFF">伝票ID:</th>
    <td width="25%" bgcolor="#FFFFFF">
    <input type="text" name="mission_id" value="<?php echo $post['mission_id'];?>" size="8" maxlength="7"></input>
	  -
	<input type="text" name="mission_id2" value="<?php echo $post['mission_id2'];?>" size="9" maxlength="8"></input>
	</td>
	<!-- <td width="10%" bgcolor="#FFFFFF">
    <select name="mission_status">
	  <option value ="" <?php switch($post['mission_status']){case '':echo 'selected';break;}?> >全て表示</option>
	  <option value ="1" <?php switch($post['mission_status']){case 1:echo 'selected';break;}?> >新着</option>
	  <option value ="2" <?php switch($post['mission_status']){case 2:echo 'selected';break;}?> >実行中</option>
	  <option value ="3" <?php switch($post['mission_status']){case 3:echo 'selected';break;}?> >完了</option>
	</select>
    </td> -->
    <td width="10%" bgcolor="#FFFFFF">
    	<input type="image" src="<?php echo "$base"; ?>/images/r6_c8.jpg">
		<input type="hidden" value="submit"></td>
   </tr>
   </table>
   <?php echo form_close(); ?>
   <?php if(!empty($result_td)){?>
	<!-- <div id="ct">
	<img src="<?php echo $base;?>images/ct.jpg" width="1026" /></div> -->
    <table id="pagedtable" cellpadding="0" cellspacing="0" width="1026" style="margin-top:0px;">
    	<tr>
    		<th><img alt="" src="<?php echo $base;?>images/ct1.jpg"></th>
    		<th colspan="2"><img alt="" src="<?php echo $base;?>images/ct2.jpg"></th>
    		<th colspan="2"><img alt="" src="<?php echo $base;?>images/ct3.jpg"></th>
    		<th rowspan="2"><img alt="" src="<?php echo $base;?>images/ct9.jpg"></th>
    		<th rowspan="2"><img alt="" src="<?php echo $base;?>images/ct10.jpg"></th>
    		<th rowspan="2"><img alt="" src="<?php echo $base;?>images/ct11.jpg"></th>
    	</tr>
    	<tr>
    		<th><img alt="" src="<?php echo $base;?>images/ct4.jpg"></th>
    		<th><img alt="" src="<?php echo $base;?>images/ct5.jpg"></th>
    		<th><img alt="" src="<?php echo $base;?>images/ct6.jpg"></th>
    		<th><img alt="" src="<?php echo $base;?>images/ct7.jpg"></th>
    		<th><img alt="" src="<?php echo $base;?>images/ct8.jpg"></th>
    	</tr>
      <?php $i = 1;?>
      <?php foreach($result_td as $td){?>
      <?php if ($i % 2 == 0) { ?>
     <tr bgcolor="#CFFEDB">
	 <?php } else { ?>
	 <tr bgcolor="#FFFFFF">
	 <?php } ?>
        <td style="word-break:break-all;"><?php echo $td['sid1'].'-'.$td['sid2'];?></td>
        <!-- <td width="31%" align="left"><?php echo $td['add1'].$td['add2'].$td['add3'];?></td> -->        <td colspan="2" style="word-break:break-all;"><?php $add = explode(',',$td['add2']);echo $td['add1'].$add[0];//.$td['add3'];?></td>        <!-- <td width="31%" align="left"><?php echo $td['tadd1'].$td['tadd2'].$td['tadd3'];?></td> -->        <td colspan="2"  style="word-break:break-all;"><?php $tadd = explode(',',$td['tadd2']); echo $td['tadd1'].$tadd[0];//$td['tadd2'].$td['tadd3'];?></td>
        <td rowspan="2" align="center" style="word-break:break-all;"><?php
        $atts = array(
              'width'      => '850',
              'height'     => '600',
              'top'      => '0',
              'left'     => '0',
              'toolbar' => 'no',
              'menubar' => 'no',
              'scrollbars' => 'no',
              'resizable' => 'no',
              'location' => 'no',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '0',
              'screeny'    => '0'
            );
             echo anchor_popup('ctm_mission_show/'.$td['mid'], "<img src='".$base."images/kakunin.jpg' border=0>", $atts);?></td>
        <td rowspan="2" align="center" style="word-break:break-all;"><?php if($td['mission_status'] < 2) echo anchor('ctm_mis_update/'.$td['id'], "<img src='".$base."images/shuusei.jpg' border=0>");?></td>
        <td rowspan="2" align="center" style="word-break:break-all;" class="right_line"><?php
        if($td['mission_status'] < 2){
	        if($td['del_status'] == 1){	        	//echo 'キャンセル中';	    	}else {	        	echo anchor('ctm_mis/deletemis/'.$td['mid'],	        			 "<img src='".$base."images/sakujyo.jpg' border=0>",	        			array('onclick' => 'javascript:if(window.confirm(\''.$cancelmismsg.'\')) return ture;else return false;')	        	);	        }      }?></td>
      </tr>
      <?php if ($i % 2 == 0) { ?>
     <tr height="20" bgcolor="#CFFEDB">
	 <?php } else { ?>
	 <tr height="20" bgcolor="#FFFFFF">
	 <?php } ?>
      	<td align="center" style="word-break:break-all;"><?php if($td['del_status'] == 1)echo $statusText[3];else echo $statusText[$td['mission_status']];?></td>
      	<td style="word-break:break-all;"><?php echo $td['name1'].$td['name2'];?></td>
      	<td style="word-break:break-all;"><?php echo $td['tel'];?></td>
      	<td style="word-break:break-all;"><?php echo $td['tname1'].$td['tname2'];?></td>
      	<td style="word-break:break-all;"><?php echo $td['ttel'];?></td>
      </tr>
      <?php $i = $i + 1;?>
      <?php } ?>
    </table>
    <?php } else { ?>
     <table id="pagedtable" cellpadding="0" cellspacing="0" width="1026" style="margin-top:0px;">
    	<tr>
    		<th><img alt="" src="<?php echo $base;?>images/ct1.jpg"></th>
    		<th colspan="2"><img alt="" src="<?php echo $base;?>images/ct2.jpg"></th>
    		<th colspan="2"><img alt="" src="<?php echo $base;?>images/ct3.jpg"></th>
    		<th rowspan="2"><img alt="" src="<?php echo $base;?>images/ct9.jpg"></th>
    		<th rowspan="2"><img alt="" src="<?php echo $base;?>images/ct10.jpg"></th>
    		<th rowspan="2"><img alt="" src="<?php echo $base;?>images/ct11.jpg"></th>
    	</tr>
    	<tr>
    		<th><img alt="" src="<?php echo $base;?>images/ct4.jpg"></th>
    		<th><img alt="" src="<?php echo $base;?>images/ct5.jpg"></th>
    		<th><img alt="" src="<?php echo $base;?>images/ct6.jpg"></th>
    		<th><img alt="" src="<?php echo $base;?>images/ct7.jpg"></th>
    		<th><img alt="" src="<?php echo $base;?>images/ct8.jpg"></th>
    	</tr>
    </table>
    <?php }?>
    <?php if(isset($pagination)) echo $pagination; ?>
</td>
