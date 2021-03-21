<td valign="top"><div class="title02">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td><?php echo $formlabels['title'];?></td>
      </tr>
    </table>
  </div>
  <?php echo form_open_multipart('ctm_mis_confirm'); ?>
  <?php foreach($ps as $key => $value) {?>
   <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value;?>" />
  <?php } ?>
  <table class="kakunin" border="0" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF" width="80%" align="center">
   <tr style='word-break:break-all;mso-height-source:userset;height:15.0pt'>
   	<td colspan="2" bgcolor="#2DADEA" width="15%" align="center" height=31 style='color:white;word-break:break-all;border-top:1.5pt solid black;border-left:1.5pt solid black;'>引取日時</td>
   	<td colspan="2" bgcolor="#2DADEA" align="center" height=31 style='color:white;word-break:break-all;border-top:1.5pt solid black;border-left:.5pt solid black;'><?php echo $hiduke;?></td>
   	<td colspan="4" bgcolor="#2DADEA" align="center" height=31 style='color:white;word-break:break-all;border-top:1.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;'><font size="+1"><strong>「伝票ID」&nbsp;&nbsp;<?php echo $ps['sagyo_id1'];?>-<?php echo $ps['sagyo_id2'];?></strong></font></td>
   </tr>
   <tr style='word-break:break-all;mso-height-source:userset;height:15.0pt'>
   	<td rowspan="3" bgcolor="#2DADEA" align="center" width="5%" style='color:white;word-break:break-all;border-top:.5pt solid black;border-left:1.5pt solid black;'><strong>御<br/><br/>届<br/><br/>先</strong></td>
   	<td colspan="2" height="20" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>&nbsp;&nbsp;<?php echo $formlabels['denwa'];?><?php echo $ps['todoke_tel1'].'-'.$ps['todoke_tel2'].'-'.$ps['todoke_tel3'];?></td>
   	<td rowspan="3" bgcolor="#2DADEA" align="center" width="5%" style='color:white;word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><strong>荷<br/><br/>送<br/><br/>人</strong></td>
   	<td colspan="4" height="20" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;'>&nbsp;&nbsp;<?php echo $formlabels['denwa'];?><?php echo $ps['ka_tel1'].'-'.$ps['ka_tel2'].'-'.$ps['ka_tel3'];?></td>
   </tr>
   <tr style='word-break:break-all;mso-height-source:userset;height:15.0pt'>
   	<td colspan="2" height="80" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['jyusyo'];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $formlabels['yubin'];?><?php echo $ps['todoke_post'];?></font><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['todoke_add1'];?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['todoke_add2'].$ps['todoke_add22'];?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['todoke_add3'];?>
   	</td>
   	<td colspan="4" height="80" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;'>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['jyusyo']?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $formlabels['yubin'];?><?php echo $ps['ka_post'];?></font><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['ka_add1'];?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['ka_add2'].$ps['ka_add22'];?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['ka_add3'];?>
   	</td>
   </tr>
   <tr style='word-break:break-all;mso-height-source:userset;height:15.0pt'>
   	<td colspan="2" height="80" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['onamae'];?></font><br/>
   	<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['yubin'];?><?php echo $ps['todoke_post'];?></font><br/> -->
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['todoke_name1'];?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['todoke_name2'];?>&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $formlabels['sama'];?></strong><br/>

   	</td>
   	<td colspan="4" height="80" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;'>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['onamae'];?></font><br/>
   	<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['yubin'];?><?php echo $ps['ka_post'];?></font><br/> -->
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['ka_name1'];?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['ka_name2'];?>&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $formlabels['sama'];?></strong><br/>
   	</td>
   </tr>
   <tr>
   	<td valign="top" colspan="3" rowspan="3" width="50%" style='word-break:break-all;border-top:.5pt solid black;border-left:1.5pt solid black;border-bottom:1.5pt solid black;'>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['kiji'];?></font><br />
   	&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $hiccyaku;?><?php echo $formlabels['hiccyaku'];?><br />
   	<!-- <?php if($ps['bikou'] != '') {?>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['biko'];?></font><br />
   	&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['bikou'];?><br />
   	<?php }?> -->
   	<?php if($ps['tokki'] != '') {?>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['tokki'];?></font><br />
   	&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['tokki'];?><br />
   	<?php }?>
   	</td>
   	<td align="left" colspan="3" height="20" width="25%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>&nbsp;<font size="-1"><?php echo $formlabels['hinmei'];?><?php echo $ps['hinmei'];?></font></td>
   	<td align="left" colspan="2" height="20" width="25%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;'>&nbsp;<font size="-1"><?php echo $formlabels['hoken'];?><?php if(!empty($ps['hoken']))echo number_format($ps['hoken']);?></font></td>
   </tr>
   <tr>
   	<td colspan="2" bgcolor="#2DADEA" align="center" height="20" width="12%" style='color:white;word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>
   	<?php echo $formlabels['ka'];?></td>
   	<td width="12%" bgcolor="#2DADEA" align="center" height="20" style='color:white;word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $formlabels['pei'];?></td>
   	<td valign="top" align="center" rowspan="2" width="12%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:1.5pt solid black;'>
   	<?php echo $formlabels['kosuu'];?><br /><br /><br /><br />
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['kosuu'];?>&nbsp;<?php echo $formlabels['ko'];?>
   	</td>
   	<td rowspan="2" valign="top" align="center" width="12%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;border-bottom:1.5pt solid black;'>
   	<?php echo $formlabels['jyuryo'];?><br /><br /><br /><br />
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['jyuryo'];?>&nbsp;<?php echo $formlabels['kg'];?>
   	</td>
   </tr>
   <tr>
   	<td colspan="2" align="center" height="80" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:1.5pt solid black;'>
   	<?php if(!empty($ka)) { ?>
   	<?php echo $ka;?>
   	<?php } else { ?>
   	&nbsp;
   	<?php } ?>
   	</td>
   	<td align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:1.5pt solid black;'>
   	<?php if(!empty($siji)) { ?>
   	<?php echo $siji;?>
   	<?php } else { ?>
   	&nbsp;
   	<?php } ?>
   	</td>
   </tr>
  </table>
  <table width="80%" align="center">
   <tr>
    <td width="80%" align="center">
     <!--<input type="file" name="userfile"/>    -->     <font color="red"><strong><?php echo $uploaderror;?></strong></font>     <input type="hidden" name="file_name" value="<?php echo $file_name;?>" />     </td>
   </tr>
  </table>
  <div style="margin: 0 0 0 400px;">
  	<div style="float: left;margin: 0 10px;">
  		<input type="image" src="<?php echo "$base"; ?>/images/mt_r26_c2.jpg">
		<input type="hidden" value="submit"></div>
  	<div style="float: right;margin: 0 400px 0 0;">
  		<img src="<?php echo $base; ?>/images/mt_r1_c1.jpg" onclick="javascript:history.go(-1)" style="cursor: pointer;">
  	</div>
  </div>
  <?php echo form_close(); ?>
 </td>
