<td valign="top">
<div id="menu11"></div>
  <script src="<?php echo $base;?>js/jquery-1.3.2.min.js" type="text/javascript"></script>
  <script src="<?php echo $base;?>js/PrintArea.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.link').click(function(){ $.jPrintArea('#myPrintArea'); });
	});
	</script>
<div class="title01">
<table id="myPrintArea" height="800" border="0" width="1024" align="center">
 <tr>
  <td valign="top">
	<table class="kakunin" border="0" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF" width="100%" align="center">
 <tr>
  <td align="center" width="100%">
  <?php if($kubun == 1) {?>
  <font size="+2"><?php echo $formlabels['nouhin'];?></font>
  <?php } else {?>
  <font size="+1"><?php echo $formlabels['jyuryou'];?></font>
  <?php }?>
  </td>
 </tr>
 <tr>
  <td height="4"></td>
 </tr>
</table>
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%" bgcolor="#FFFFFF">
 <tr height="25">
  <th align="center" width="10%" style='border-top:1.5pt solid black;border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-right:.5pt solid black;'>
   <?php echo $formlabels['denpyoid'];?>
  </th>
  <td align="center" width="30%" style='border-top:1.5pt solid black;border-bottom:1.5pt solid black;border-right:1.5pt solid black;'>
   <?php echo $ps['sagyo_id1'];?>-<?php echo $ps['sagyo_id2'];?>
  </td>
  <td width="60%"></td>
 </tr>
</table>
<br />
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
 <tr height="25">
  <th align="center" width="10%" style='border-top:1.5pt solid black;border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-right:.5pt solid black;'>
   <?php echo $formlabels['syukabi'];?>
  </th>
  <td align="right" width="15%" style='border-top:1.5pt solid black;border-bottom:1.5pt solid black;border-right:.5pt solid black;'><?php echo $year;?></td>
  <td align="right" width="10%" style='border-top:1.5pt solid black;border-bottom:1.5pt solid black;border-right:.5pt solid black;'><?php echo $month;?></td>
  <td align="right" width="10%" style='border-top:1.5pt solid black;border-bottom:1.5pt solid black;border-right:1.5pt solid black;'><?php echo $day;?></td>
  <td width="15%"></td>
  <td align="center" bgcolor="#FFFFFF" width="10%" style='border-top:1.5pt solid black;border-left:1.5pt solid black;border-bottom:1.5pt solid black;'><?php echo $formlabels['unti'];?></td>
  <td align="center" bgcolor="#FFFFFF" width="40%" style='border-top:1.5pt solid black;border-left:.5pt solid black;border-bottom:1.5pt solid black;border-right:1.5pt solid black;'>元払&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;着払&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;代引</td>
 </tr>
</table>
<br />
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
 <tr>
  <th align="center" rowspan="9" width="10%" style='border-top:1.5pt solid black;border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-right:.5pt solid black;'>荷<br/><br/>送<br/><br/>人</th>
  <td width="10%" height="20" style='border-top:1.5pt solid black;border-bottom:.5pt solid black;'>&nbsp;<strong><?php echo $formlabels['tel'];?></strong></td>
  <td width="80%" style='border-top:1.5pt solid black;border-right:1.5pt solid black;border-bottom:.5pt solid black;'><?php echo $ps['ka_tel'];//substr($ps['ka_tel'],0,3).'-'.substr($ps['ka_tel'],3,4).'-'.substr($ps['ka_tel'],7,strlen($ps['ka_tel'])-7);?></td>
 </tr>
 <tr>
  <td colspan="2" width="90%" height="20" style='border-right:1.5pt solid black;'>&nbsp;<?php echo $formlabels['jyusyo'];?></td>
 </tr>
 <tr>
  <td width="10%" height="20"></td>
  <td width="80%" style='border-right:1.5pt solid black;'><?php echo $formlabels['yubin'];?><?php echo $ps['ka_post'];?></td>
 </tr>
 <tr>
  <td width="10%" height="20"></td>
  <td width="80%" style='border-right:1.5pt solid black;'><?php echo $ps['ka_add1'].$ps['ka_add2'];?></td>
 </tr>
 <tr>
  <td width="10%" height="20"></td>
  <td width="80%" style='border-right:1.5pt solid black;'><?php echo $ps['ka_add3'];?></td>
 </tr>
 <tr>
  <td width="90%" colspan="2" height="20" style='border-top:.5pt solid black;border-right:1.5pt solid black;'>&nbsp;<?php echo $formlabels['onamae'];?>
  </td>
 </tr>
 <tr>
  <td width="10%" height="20"></td>
  <td width="80%" height="20" style='border-right:1.5pt solid black;'><?php echo $ps['ka_name1'];?></td>
 </tr>
 <tr>
  <td width="10%" height="20"></td>
  <td width="80%" height="20" style='border-right:1.5pt solid black;'><?php echo $ps['ka_name2'];?></td>
 </tr>
 <tr>
  <td width="90%" colspan="2" align="right" height="20" style='border-right:1.5pt solid black;border-bottom:1.5pt solid black;'>
  <strong><?php echo $formlabels['sama'];?></strong>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 </tr>
</table>
<br />
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
  <tr height="25">
  <th align="center" width="10%" style='border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;'><?php echo $formlabels['syukabi'];?></th>
  <td align="right" width="15%" style='border-left:.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;'><?php echo $year;?></td>
  <td align="right" width="10%" style='border-left:.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;'><?php echo $month;?></td>
  <td align="right" width="10%" style='border-left:.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'><?php echo $day;?></td>
  <td align="right" width="55%"></td>
 </tr>
</table>
<br />
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
 <tr>
  <th align="center" rowspan="9" width="10%" style='border-top:1.5pt solid black;border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-right:.5pt solid black;'>御<br/><br/>届<br/><br/>先</th>
  <td width="10%" height="20" style='border-top:1.5pt solid black;border-bottom:.5pt solid black;'>&nbsp;<strong><?php echo $formlabels['tel'];?></strong></td>
  <td width="80%" style='border-top:1.5pt solid black;border-right:1.5pt solid black;border-bottom:.5pt solid black;'>
  <?php echo $ps['todoke_tel'];//substr($ps['todoke_tel'],0,3).'-'.substr($ps['todoke_tel'],3,4).'-'.substr($ps['todoke_tel'],7,strlen($ps['todoke_tel'])-7);?></td>
 </tr>
 <tr>
  <td colspan="2" width="90%" height="20" style='border-right:1.5pt solid black;'>&nbsp;<?php echo $formlabels['jyusyo']?></td>
 </tr>
 <tr>
  <td width="10%" height="20"></td>
  <td width="80%" style='border-right:1.5pt solid black;'><?php echo $formlabels['yubin'];?><?php echo $ps['todoke_post'];?></td>
 </tr>
 <tr>
  <td width="10%" height="20"></td>
  <td width="80%" style='border-right:1.5pt solid black;'><?php echo $ps['todoke_add1'].$ps['todoke_add2'];?></td>
 </tr>
 <tr>
  <td width="10%" height="20"></td>
  <td width="80%" style='border-right:1.5pt solid black;'><?php echo $ps['todoke_add3'];?></td>
 </tr>
 <tr>
  <td width="90%" colspan="2" height="20" style='border-top:.5pt solid black;border-right:1.5pt solid black;'>&nbsp;<?php echo $formlabels['onamae']?>
  </td>
 </tr>
 <tr>
  <td width="10%" height="20"></td>
  <td width="80%" height="20" style='border-right:1.5pt solid black;'><?php echo $ps['todoke_name1'];?></td>
 </tr>
 <tr>
  <td width="10%" height="20"></td>
  <td width="80%" height="20" style='border-right:1.5pt solid black;'><?php echo $ps['todoke_name2'];?></td>
 </tr>
 <tr>
  <td colspan="2" width="90%" align="right" height="20" style='border-right:1.5pt solid black;border-bottom:1.5pt solid black;'>
  <strong><?php echo $formlabels['sama'];?></strong>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 </tr>
</table>
<br />
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
  <tr height="25">
  <th align="center" width="10%" style='border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;'><?php echo $formlabels['hm'];?></th>
  <td align="left" width="40%" style='border-left:.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'>&nbsp;<?php echo $ps['hinmei'];?></td>
  <td width="10%"></td>
  <td align="center" width="15%" style='border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;'>&nbsp;<?php echo $formlabels['hoken'];?></td>
  <td align="right" width="25%" style='border-left:.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'>&yen;<?php echo number_format($ps['hoken']);?>&nbsp;</td>
 </tr>
</table>
<br />
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
  <tr height="25">
  <th align="center" width="10%" style='border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;'><?php echo $formlabels['suuryo'];?></th>
  <td align="right" width="15%" style='border-left:.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'><?php echo $ps['kosuu'];?><?php echo $formlabels['ko'];?>&nbsp;</td>
  <td width="10%"></td>
  <th align="center" width="10%" style='border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;'><?php echo $formlabels['jl'];?></th>
  <td align="right" width="15%" style='border-left:.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'><?php echo $ps['jyuryo'];?><?php echo $formlabels['kg'];?>&nbsp;</td>
  <td width="40%"></td>
 </tr>
</table>
<br />
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
  <tr height="25">
  <th align="center" width="20%" style='border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;'><?php echo $formlabels['hz'];?></th>
  <td align="left" width="80%" style='border-left:.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'>&nbsp;<?php echo $ps['ka'];?></td>
 </tr>
</table>
<br />
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
  <tr height="25">
  <th align="center" width="20%" style='border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;'><?php echo $formlabels['pei'];?></th>
  <td align="left" width="80%" style='border-left:.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'>&nbsp;<?php echo $ps['siji'];?></td>
 </tr>
</table>
<br />
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
 <tr height="25">
  <th align="center" width="20%" style='border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;'><?php echo $formlabels['tokki'];?></th>
  <td align="left" width="80%" style='border-left:.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'>&nbsp;<?php echo $hiccyaku;?><?php echo $formlabels['hiccyaku'];?></td>
 </tr>
</table>
<br />
<?php if($kubun == 1) {?>
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
 <tr>
  <td width="70%" height="100" style='border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'>
  &nbsp;&nbsp;</td>
  <td width="30%">
  </td>
 </tr>
</table>
<?php } else { ?>
<table class="kakunin" border="0" cellpadding="1" cellspacing="0" width="100%">
 <tr>
  <td rowspan="5" width="65%" style='border-left:1.5pt solid black;border-bottom:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'>
  &nbsp;&nbsp;</td>
  <td rowspan="5" width="3%">
  </td>
  <td width="32%" height="20" align="center" style='border-left:1.5pt solid black;border-top:1.5pt solid black;border-right:1.5pt solid black;'>
  <font size="+1"><strong><?php echo $formlabels['in'];?></strong></font>
  </td>
 </tr>
 <tr>
  <td width="32%" height="20" align="center" style='border-left:1.5pt solid black;border-right:1.5pt solid black;'>
  <font size="-1"><?php echo $formlabels['jyoki'];?></font>
  </td>
 </tr>
 <tr>
  <td width="32%" height="20" align="right" style='border-left:1.5pt solid black;border-right:1.5pt solid black;'>
  <?php echo $formlabels['nengapi'];?>&nbsp;
  </td>
 </tr>
 <tr>
  <td width="32%" height="20" align="right" style='border-left:1.5pt solid black;border-right:1.5pt solid black;'>
  <?php echo $formlabels['jibun'];?>&nbsp;
  </td>
 </tr>
 <tr>
  <td width="32%" align="right" style='border-left:1.5pt solid black;border-right:1.5pt solid black;border-bottom:1.5pt solid black;'>
	&nbsp;&nbsp;
  </td>
 </tr>
</table>
<?php }?>
 </tr>
</table>
<table width="100%">
 <tr>
  <td align="center">
  <a href="#" class="link"><img src="<?php echo "$base"; ?>/images/button_insatu.GIF" border="0"></a>
  <input type="image" src="<?php echo "$base"; ?>/images/button_torikesi.gif" onclick="javascript:history.go(-1)"></td>
 </tr>
</table>
</div>
</td>
