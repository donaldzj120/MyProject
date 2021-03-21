<td valign="top"><div class="title02">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="50%" align="left">売上明細</td>
		<td width="50%" align="right"><?php echo anchor('mgr_sagyo_create', $sagyo_tuika); ?>&nbsp;&nbsp;</td>
      </tr>
    </table>
  </div>
  <table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" width="100%">
   <tr>
    <td width="10%" align="left"><?php echo $year ?>年<?php echo $month ?>月</td>
    <?php foreach($result_date as $td) { ?>
    <td align="left" width="3%">
	<?php if ($click_day == $td['day']) { ?>
	<font color="red"><strong>
	<?php echo anchor('mgr_sagyo_meisai/' . $year . '/' . $month . '/' . $td['day'], $td['day'] . '日'); ?>
	</strong></font>
	<?php } else { ?>
	<?php echo anchor('mgr_sagyo_meisai/' . $year . '/' . $month . '/' . $td['day'], $td['day'] . '日'); ?>
	<?php } ?>
	</td>
    <?php } ?>
    <td align="left"></td>
   </tr>
  </table>
  <table border="0" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF" width="100%">
   <tr height=20 style='word-break:break-all;mso-height-source:userset;height:15.0pt' bgcolor="#D0F0F9">
      <td rowspan=2 width="17%" align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['niukejin']?></td>
      <td rowspan=2 width="15%" align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['egyou']?></td>
      <td colspan=2 width="5%" align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['jikan']?></td>
      <td rowspan=2 width="5%" align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['gosu']?></td>
      <td rowspan=2 width="5%" align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['kubun']?></td>
      <td rowspan=2 width="6%" align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['kyori']?></td>
      <td rowspan=2 width="14%" align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['futai_sagyo']?></td>
      <td rowspan=2 width="6%" align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['kousoku']?></td>
      <td rowspan=2 width="7%" align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['gokei']?></td>
      <td colspan=2 width="15%" align="center" rowspan=2 style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['biko']?></td>
	  <td rowspan=2 width="5%" align="center" style='word-break:break-all;border-top:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-left:.5pt solid black;'><?php echo $result_th['syusei']?></td>
	 </tr>
     <tr height=11 style='word-break:break-all;mso-height-source:userset;height:8.25pt' bgcolor="#D0F0F9">
      <td colspan=2 rowspan=2 height=22 align="center" style='word-break:break-all;border-left:.5pt solid black;height:16.5pt'><?php echo $result_th['sitei']?></td>
     </tr>
     <tr height=11 style='word-break:break-all;mso-height-source:userset;height:8.25pt' bgcolor="#D0F0F9">
      <td rowspan=2 align="center" height=31 style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;height:23.25pt;'><?php echo $result_th['jyusyo']?></td>
      <td rowspan=2 align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'><?php echo $result_th['kwe_no']?></td>
      <td rowspan=2 align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'><?php echo $result_th['jyuryo']?></td>
      <td style='word-break:break-all;border-left:.5pt solid black;'>　</td>
      <td rowspan=2 align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'><?php echo $result_th['kyori_kane']?></td>
      <td rowspan=2 align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'><?php echo $result_th['futai_kane']?></td>
      <td rowspan=2 align="center" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'><?php echo $result_th['cyusya_kane']?></td>
      <td style='word-break:break-all;border-left:.5pt solid black;'></td>
      <td rowspan=2 align="center" style='word-break:break-all;border-left:.5pt solid black;border-bottom:.5pt solid black;'></td>
      <td style='word-break:break-all;'></td>
	  <td rowspan=2 align="center" style='word-break:break-all;border-left:.5pt solid black;border-bottom:.5pt solid black;border-right:.5pt solid black;'><?php echo $result_th['sakujyo']?></td>
     </tr>
     <tr height=20 style='word-break:break-all;mso-height-source:userset;height:15.0pt' bgcolor="#D0F0F9">
      <td colspan=2 height=20 align="center" style='word-break:break-all;border-left:.5pt solid black;border-bottom:.5pt solid black;
      height:15.0pt'><?php echo $result_th['hicyaku']?></td>
      <td style='word-break:break-all;border-left:.5pt solid black;border-bottom:.5pt solid black;'>　</td>
      <td style='word-break:break-all;border-left:.5pt solid black;border-bottom:.5pt solid black;'>　</td>
      <td style="border-bottom:.5pt solid black;">　</td>
     </tr>
	 <?php $i = 1;?>
     <?php foreach($result_td as $td){?>
	 <?php if ($i % 2 == 0) { ?>
     <tr height="20" style='word-break:break-all;mso-height-source:userset;height:15.0pt' bgcolor="#CFFEDB">
	 <?php } else { ?>
	 <tr height="20" style='word-break:break-all;mso-height-source:userset;height:15.0pt'>
	 <?php } ?>
      <td width="17%" align="left" style='word-break:break-all;border-left:.5pt solid black;'>
	  &nbsp;<?php echo $td['ka_name1'].$td['ka_name2'];?></td>
      <td width="15%" align="left" style='word-break:break-all;border-left:.5pt solid black;'>
      <?php echo $td['egyou'];?>&nbsp;</td>
      <td colspan=2 width="5%" align="center" style='word-break:break-all;border-left:.5pt solid black;'>
	  <!-- <?php echo substr($td['hiccyaku1'], 5 ,2);?>月<?php echo substr($td['hiccyaku1'], 8 ,2);?>日<br /> --><?php echo substr($td['jikan'], 0 ,5);?></td>
      <td width="5%" align="right" style='word-break:break-all;border-left:.5pt solid black;'>
      <?php echo $td['kosuu'];?>&nbsp;</td>
      <td width="5%" align="center" valign="middle" style='word-break:break-all;border-left:.5pt solid black;'>
      <?php if(!empty($td['kubun'])) echo $sagyo_kubun[$td['kubun']];?></td>
      <td width="6%" align="right" style='word-break:break-all;border-left:.5pt solid black;'>
      <?php echo number_format($td['kyori']);?>&nbsp;KM&nbsp;</td>
      <td width="14%" align="left" style='word-break:break-all;border-left:.5pt solid black;'>
      &nbsp;<?php if(!empty($td['futai_sagyo'])) {?>
      <?php $fs = '';?>
      <?php $temp = split(',',$td['futai_sagyo']); ?>
      <?php for($j=0;$j<count($temp);$j++){?>
      <?php if($temp[$j] == 5) {
      			$fs=$fs.$td['sonota'].' ';	
      		}
      		else
      		{
      			$fs=$fs.$sagyo_fudai[$temp[$j]].' ';
      		}
      ?>
      <?php }?>
      <?php echo $fs;?>
      <?php }?>
      </td>
      <td width="6%" align="right" style='word-break:break-all;border-left:.5pt solid black;'>
      &yen;&nbsp;<?php echo number_format($td['kousoku']);?>&nbsp;</td>
      <td width="7%" align="right" valign="middle" style='word-break:break-all;border-left:.5pt solid black;'>
      &yen;&nbsp;<?php echo number_format($td['gokei']);?>&nbsp;</td>
      <td colspan=2 width="15%" align="left" style='word-break:break-all;border-left:.5pt solid black;'>&nbsp;<?php echo $td['bikou'];?></td>
	  <td colspan=2 width="5%" align="center" style='word-break:break-all;border-left:.5pt solid black;border-right:.5pt solid black;'><?php echo anchor('mgr_sagyo_update/' . $td['id'], $result_th['syusei']); ?></td>
     </tr>
     <?php if ($i % 2 == 0) { ?>
     <tr height="20" style='word-break:break-all;mso-height-source:userset;height:8.25pt' bgcolor="#CFFEDB">
     <?php } else { ?>
     <tr height="20" style='word-break:break-all;mso-height-source:userset;height:8.25pt'>
     <?php } ?>
      <td align="left" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'>&nbsp;<?php $add = explode(',',$td['ka_add2']); echo $td['ka_add1'].$add[0];//$td['ka_add2'].$td['ka_add3'];?></td>
      <td align="right" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'><?php echo $td['sagyo_id1'].'-'.$td['sagyo_id2'];?>&nbsp;</td>
      <td colspan=2 width="5%" align="center" style='word-break:break-all;border-left:.5pt solid black;border-bottom:.5pt solid black;'>
	  指&nbsp;&nbsp;必</td>
      <td align="right" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'><?php echo $td['jyuryo'];?>&nbsp;KG&nbsp;</td>
      <td style='word-break:break-all;border-left:.5pt solid black;border-bottom:.5pt solid black;'>　</td>
      <td align="right" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'>&yen;&nbsp;<?php echo number_format($td['kyori_kane']);?>&nbsp;</td>
      <td align="right" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'>&nbsp;&yen;&nbsp;<?php echo number_format($td['futai_kane']);?></td>
      <td align="right" style='word-break:break-all;border-top:.5pt solid black;border-left:.5pt solid black;border-bottom:.5pt solid black;'>&yen;&nbsp;<?php echo number_format($td['cyusya_kane']);?>&nbsp;</td>
      <td style='word-break:break-all;border-left:.5pt solid black;border-bottom:.5pt solid black;'>　</td>
      <td align="center" style='word-break:break-all;border-left:.5pt solid black;border-bottom:.5pt solid black;'>　</td>
      <td style='word-break:break-all;border-bottom:.5pt solid black;'>　</td>
	  <td align="center" style='word-break:break-all;border-left:.5pt solid black;border-right:.5pt solid black;border-bottom:.5pt solid black;border-top:.5pt solid black;'>
	  <?php echo anchor('mgr_sagyo_delete/' . $td['id'] . '/' . $year . '/' . $month . '/' . $click_day, $result_th['sakujyo'], array('onclick' => 'javascript:if(window.confirm(\''.$deletesagyomsg.'\')) return ture;else return false;'));  ?></td>
     </tr>
     <?php $i = $i + 1;?>
     <?php } ?>
    </table>
    </td>
   </tr>
  </table>
  <?php echo form_open('mgr_sagyo_meisai'); ?>
  <input type="hidden" name="mode" value="excel" />
  <input type="hidden" name="year" value="<?php echo $year ?>" />
  <input type="hidden" name="month" value="<?php echo $month ?>" />
  <input type="hidden" name="day" value="<?php echo $click_day ?>" />
  <table width="100%">
   <tr>
	<td width="100%" align="center">
      <input type="image" src="<?php echo "$base"; ?>/images/button_excel.gif">
	  <input type="hidden" value="submit">
	</td>
   </tr>
  </table>
  </form>
</td>