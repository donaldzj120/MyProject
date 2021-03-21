<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>

<body>

<table width="96%" border="0" cellpadding="3" cellspacing="0">

<tr><td valign="top"><!-- <div class="title02">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td><?php echo $formlabels['title'];?></td>
      </tr>
    </table>
  </div> -->
<script language="JavaScript">
var flag=false;
function DrawImage(ImgD){
 var image=new Image();
 image.src=ImgD.src;
 if(image.width>0 && image.height>0){
  flag=true;
  if(image.width/image.height>= 164/112){
   if(image.width>164){
    ImgD.width=164;
    ImgD.height=(image.height*164)/image.width;
   }else{
    ImgD.width=image.width;
    ImgD.height=image.height;
   }
   ImgD.alt=image.width+"x"+image.height;
  }
  else{
   if(image.height>112){
    ImgD.height=112;
    ImgD.width=(image.width*112)/image.height;
   }else{
    ImgD.width=image.width;
    ImgD.height=image.height;
   }
   ImgD.alt=image.width+"x"+image.height;
  }
 }
}
</script>
  <table class="kakunin" border="0" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF" width="80%" align="center">
   <tr style='word-break:break-all;mso-height-source:userset;height:15.0pt'>
   	<td colspan="2" bgcolor="#2DADEA" width="15%" align="center" height=31 style='color:white;word-break:break-all;border-top:1.5pt solid black;border-left:1.5pt solid black;'>引取日時</td>
   	<td colspan="2" bgcolor="#2DADEA" align="center" height=31 style='color:white;word-break:break-all;border-top:1.5pt solid black;border-left:.5pt solid black;'><?php echo $hiduke;?></td>
   	<td colspan="4" bgcolor="#2DADEA" align="center" height=31 style='color:white;word-break:break-all;border-top:1.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;'><font size="+1"><strong>伝票ID&nbsp;&nbsp;<?php echo $ps['sagyo_id1'];?>-<?php echo $ps['sagyo_id2'];?></strong></font></td>
   </tr>
   <tr style='word-break:break-all;mso-height-source:userset;height:15.0pt'>
   	<td rowspan="3" bgcolor="#2DADEA" align="center" width="5%" style='color:white;word-break:break-all;border-top:.5pt solid black;border-left:1.5pt solid black;'><strong>御<br/><br/>届<br/><br/>先</strong></td>
   	<td colspan="2" height="20" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>&nbsp;&nbsp;<?php echo $formlabels['denwa'];?><?php echo $ps['todoke_tel'];?></td>
   	<td rowspan="3" bgcolor="#2DADEA" align="center" width="5%" style='color:white;word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><strong>荷<br/><br/>送<br/><br/>人</strong></td>
   	<td colspan="4" height="20" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;'>&nbsp;&nbsp;<?php echo $formlabels['denwa'];?><?php echo $ps['ka_tel'];?></td>
   </tr>
   <tr style='word-break:break-all;mso-height-source:userset;height:15.0pt'>
   	<td colspan="2" height="80" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['jyusyo'];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $formlabels['yubin'];?><?php echo $ps['todoke_post'];?></font><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['todoke_add1'];?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo str_replace(',','',$ps['todoke_add2']);?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['todoke_add3'];?>
   	</td>
   	<td colspan="4" height="80" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;'>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['jyusyo']?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $formlabels['yubin'];?><?php echo $ps['ka_post'];?></font><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['ka_add1'];?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo str_replace(',','',$ps['ka_add2']);?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['ka_add3'];?>
   	</td>
   </tr>
   <tr style='word-break:break-all;mso-height-source:userset;height:15.0pt'>
   	<td colspan="2" height="80" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['onamae'];?></font><br/>
   	<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['yubin'];?><?php echo $ps['todoke_post'];?></font><br/> -->
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['todoke_name1'];?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['todoke_name2'];?>&nbsp;&nbsp;<strong><?php echo $formlabels['sama'];?></strong><br/>

   	</td>
   	<td colspan="4" height="80" width="40%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;'>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['onamae'];?></font><br/>
   	<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['yubin'];?><?php echo $ps['ka_post'];?></font><br/> -->
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['ka_name1'];?><br/>
   	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['ka_name2'];?>&nbsp;&nbsp;<strong><?php echo $formlabels['sama'];?></strong><br/>
   	</td>
   </tr>
   <tr>
   	<td valign="top" colspan="3" rowspan="6" width="50%" style='word-break:break-all;border-top:.5pt solid black;border-left:1.5pt solid black;border-bottom:1.5pt solid black;'>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['kiji'];?></font><br />
   	&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $hiccyaku;?><?php echo $formlabels['hiccyaku'];?><br />
   	<?php if($ps['tokki'] != '') {?>
   	&nbsp;&nbsp;<font size="-1"><?php echo $formlabels['tokki'];?></font><br />
   	&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ps['tokki'];?><br />
   	<?php }?>
   	</td>
   	<td align="left" colspan="3" height="20" width="25%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>&nbsp;<font size="-1"><?php echo $formlabels['hinmei'];?><?php echo $ps['hinmei'];?></font></td>
   	<td align="left" colspan="2" height="20" width="25%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;'>&nbsp;<font size="-1"><?php echo $formlabels['hoken'];?><?php echo number_format($ps['hoken']);?></font></td>
   </tr>
   <tr>
   	<td colspan="2" bgcolor="#2DADEA" align="center" height="20" width="12%" style='color:white;word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $formlabels['ka'];?></td>
   	<td width="12%" bgcolor="#2DADEA" align="center" height="20" style='color:white;word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $formlabels['pei'];?></td>
   	<?php if(!empty($filename)) {?>
   	<td align="center" colspan="2" rowspan="4" height="20" width="25%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;border-bottom:1.5pt solid black;'>
   	<img src="<?php echo "$base"; ?>/uploads/<?php echo $filename;?>" width="110" onload="javascript:DrawImage(this);"/>
   	</td>
   	<?php } else { ?>
   	<td align="center" colspan="2" rowspan="4" height="20" width="25%" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-right:1.5pt solid black;border-bottom:1.5pt solid black;'>&nbsp;</td>
   	<?php } ?>
   </tr>
   <tr>
   	<td colspan="2" align="center" height="30" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php if(!empty($ps['ka'])) {echo $ps['ka'];} else { echo '　';}?></td>
   	<td align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php if(!empty($ps['siji'])) { echo $ps['siji']; } else { echo '　'; }?></td>
   </tr>
   <tr>
    <td colspan="2" bgcolor="#2DADEA" align="center" height="20" style='color:white;word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>
   	<?php echo $formlabels['kosuu'];?>
   	</td>
   	<td align="center" bgcolor="#2DADEA" height="20" style='color:white;word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'>
   	<?php echo $formlabels['jyuryo'];?>
   	</td>
   </tr>
   <tr>
    <td colspan="2" align="center" height="30" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:1.5pt solid black;'>
   	<?php echo $ps['kosuu'];?>&nbsp;<?php echo $formlabels['ko'];?>
   	</td>
   	<td align="center" height="30" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:1.5pt solid black;'>
   	<?php echo $ps['jyuryo'];?>&nbsp;<?php echo $formlabels['kg'];?>
   	</td>
   </tr>
  </table><!--
  <table width="100%">
	<tr align="center">
		<td>
		 <input type="image" src="<?php //echo "$base"; ?>/images/button_toroku.gif">
		<input type="image" src="<?php //echo "$base"; ?>/images/bt_back.gif" onclick="javascript:history.back(-1)">
		<input type="hidden" value="submit"></td>
	</tr>
  </table>
 -->
 </td>
</tr>

</table>

</div>
</body></html>