<td valign="top"><div class="title02">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td><?php echo $formlabels['title'];?></td>
      </tr>
    </table>
  </div>
  <?php echo form_open_multipart('mgr_seikyusyo_kakunin'); ?>
  <?php foreach($ps as $key => $value) {?>
   <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value;?>" />
  <?php } ?>
  <table border="0" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF" width="100%" align="center">
   <tr>
    <td colspan="4" align="left" width="25%" height="15">
    <strong><?php echo $ps['seikyusaki_name']?>&nbsp;&nbsp;<?php echo $formlabels['onaka'];?></strong></td>
    <td height="15"></td>
    <td height="15"></td>
    <td height="15"></td>
    <td height="15"></td>
    <td height="15"></td>
    <td height="15"></td>
    <td height="15"></td>
    <td height="15"></td>
    <td height="15"></td>
    <td height="15"></td>
   </tr>
   <tr>
    <td colspan="4" align="left" width="25%" height="15">
    <strong><?php echo $ps['seikyusaki_jyusyo']?></strong></td>
    <td colspan="7" rowspan="4" align="center" width="40%" height="60" style='word-break:break-all;border-top:2pt solid black;border-left:2pt solid black;border-right:2pt solid black;'>
    <font size="+2"><strong>
    <?php echo $formlabels['seikyukingaku'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($ps['seikyu_kingaku']);?>&nbsp;<?php echo $formlabels['en'];?>
    </strong></font></td>
    <td width="7%"　height="15"></td>
    <td width="10%"　height="15"></td>
    <td width="8%"　height="15"></td>
   </tr>
   <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td width="7%"　height="15"></td>
    <td width="10%"　height="15"></td>
    <td width="8%"　height="15"></td>
   </tr>
   <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td width="25%" colspan="3" align="right"　height="15"><?php echo $formlabels['name'];?></td>
   </tr>
   <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
   <tr>
    <td colspan="4" width="25%"><font size="-2"><?php echo $formlabels['bikou1'];?></font></td>
    <td width="2%" style='word-break:break-all;border-top:.5pt solid black;border-left:2pt solid black;'></td>
    <td align="right" style='word-break:break-all;border-top:.5pt solid black;'><?php echo $formlabels['nai'];?></td>
    <td style='word-break:break-all;border-top:.5pt solid black;'></td>
    <td style='word-break:break-all;border-top:.5pt solid black;'></td>
    <td style='word-break:break-all;border-top:.5pt solid black;'></td>
    <td style='word-break:break-all;border-top:.5pt solid black;'></td>
    <td style='word-break:break-all;border-top:.5pt solid black;border-right:2pt solid black;'></td>
    <td width="25%" colspan="3" align="right"　height="15"><?php echo $formlabels['jyusyo'];?></td>
   </tr>
   <tr>
    <td colspan="4" width="25%"><font size="-2"><?php echo $formlabels['bikou2'];?></font></td>
    <td width="2%" style='word-break:break-all;border-left:2pt solid black;'></td>
    <td align="right" width="17%"><?php echo $formlabels['kazei'];?></td>
    <td align="right" width="5%">&yen;&nbsp;<?php echo number_format($ps['kazei']);?></td>
    <td align="right" width="17%"><?php echo $formlabels['kousoku'];?></td>
    <td align="right" width="5%">&yen;&nbsp;<?php echo number_format($ps['hikazei_kosouku']);?></td>
    <td width="2%"></td>
    <td width="2%" style='word-break:break-all;border-right:2pt solid black;'></td>
    <td width="25%" colspan="3" align="right"　height="15"><?php echo $formlabels['tel'];?></td>
   </tr>
   <tr>
    <td colspan="4" width="25%"></td>
    <td width="2%" style='word-break:break-all;border-left:2pt solid black;border-bottom:2pt solid black;'></td>
    <td align="right" width="17%" style='word-break:break-all;border-bottom:2pt solid black;'><?php echo $formlabels['syouhizei'];?></td>
    <td align="right" width="5%" style='word-break:break-all;border-bottom:2pt solid black;'>&yen;&nbsp;<?php echo number_format($ps['syohizei']);?></td>
    <td align="right" width="17%" style='word-break:break-all;border-bottom:2pt solid black;'><?php echo $formlabels['cyusya'];?></td>
    <td align="right" width="5%" style='word-break:break-all;border-bottom:2pt solid black;'>&yen;&nbsp;<?php echo number_format($ps['hikazei_cyusya']);?></td>
    <td width="2%" style='word-break:break-all;border-bottom:2pt solid black;'></td>
    <td width="2%" style='word-break:break-all;border-bottom:2pt solid black;border-right:2pt solid black;'></td>
    <td width="25%"></td>
   </tr>
   <tr>
    <td height="15"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
   <tr>
    <td colspan="5" width="27%"></td>
    <td width="17%" align="right"><?php echo $formlabels['seikyukikan'];?></td>
    <td align="left" width="5%" colspan="4"><?php echo $ps['seikyu_from'];?>～<?php echo $ps['seikyu_to'];?></td>
    <td></td>
    <td width="2%"></td>
    <td width="2%"></td>
    <td width="25%"></td>
   </tr>
   <tr>
    <td colspan="5" width="27%"></td>
    <td width="17%" align="right"><?php echo $formlabels['siharawu'];?></td>
    <td align="left" width="5%" colspan="4"><?php echo $fulikomi_houhou[$ps['sihara_kubun']];?></td>
    <td></td>
    <td width="2%"></td>
    <td width="2%"></td>
    <td width="25%"></td>
   </tr>
   <tr>
    <td colspan="5" width="27%"></td>
    <td width="17%" align="right"><?php echo $formlabels['furikomi'];?></td>
    <td align="left" width="5%" colspan="4"><?php echo $fulikomi_saki[$ps['furikomisaki']];?></td>
    <td></td>
    <td width="2%"></td>
    <td width="2%"></td>
    <td width="25%"></td>
   </tr>
  </table>
  <br/>
  <br/>
  <table border="0" cellpadding="3" cellspacing="1" bgcolor="#999999" width=100%>
    <thead>
      <tr bgcolor="#D0F0F9">
        <?php 
			foreach($result_th as $th){
				echo '<th>'.$th.'</th>';
			}
		?>
      </tr>
      </thead>
    <tbody>
      <?php foreach($seikyumeisai as $td){?>
      <tr align="center" bgcolor="#FFFFFF">
        <td width="7%"><?php echo $td['recv_date'];?></td>
        <td width="4%"><?php echo $sagyo_kubun[$td['kubun']];?></td>
        <td width="15%" align="left"><?php echo $td['ka_add1'].$td['ka_add2'].$td['ka_add3'];?></td>
        <td width="15%" align="left"><?php echo $td['todoke_add1'].$td['todoke_add2'].$td['todoke_add3'];?></td>
        <td width="4%" align="right"><?php echo $td['kosuu'];?></td>
        <td width="4%" align="right"><?php echo $td['jyuryo'];?></td>
        <td width="4%" align="right"><?php echo $td['kyori'];?></td>
        <td width="6%" align="right"><?php echo number_format($td['kihon']);?></td>
        <td width="5%" align="right"><?php echo number_format($td['kousoku']);?></td>
        <td width="5%" align="right"><?php echo number_format($td['cyusya_kane']);?></td>
        <td width="8%" align="left">
        <?php if(!empty($td['futai_sagyo'])) {?>
	      <?php $fs = '';?>
	      <?php $temp = split(',',$td['futai_sagyo']);?>
	      <?php for($i=0;$i<count($temp);$i++){?>
	      <?php if($temp[$i] == 5) {
	      			$fs=$fs.$td['sonota'].' ';	
	      		}
	      		else
	      		{
	      			$fs=$fs.$sagyo_fudai[$temp[$i]].' ';
	      		}
	      ?>
	      <?php }?>
	      <?php echo $fs;?>
	      <?php }?></td>
        <td width="5%" align="right"><?php echo number_format($td['futai_kane']);?></td>
        <td width="5%" align="right"><?php echo number_format($td['kihon']+$td['kousoku']+$td['cyusya_kane']+$td['futai_kane']);?></td>
        <td width="13%" align="left"><?php echo $td['bikou'];?></td>
	  </tr>
      <?php } ?>
      <tr align="center" bgcolor="#FFFFFF">
        <td width="41%" colspan="4"><strong><?php echo $formlabels['gokei'];?></strong></td>
        <td width="4%" align="right"></td>
        <td width="4%" align="right"></td>
        <td width="4%" align="right"></td>
        <td width="6%" align="right"><strong>&yen;<?php echo number_format($gokei['kihon']);?></strong></td>
        <td width="5%" align="right"><strong>&yen;<?php echo number_format($gokei['kousoku']);?></strong></td>
        <td width="5%" align="right"><strong>&yen;<?php echo number_format($gokei['cyusya_kane']);?></strong></td>
        <td width="8%" align="left"></td>
        <td width="5%" align="right"><strong>&yen;<?php echo number_format($gokei['futai_kane']);?></strong></td>
        <td width="5%" align="right"><strong>&yen;<?php echo number_format($gokei['kihon']+$gokei['kousoku']+$gokei['cyusya_kane']+$gokei['futai_kane']);?></strong></td>
        <td width="13%" align="left"></td>
	  </tr>
      </tbody>
    </table>
  <table width="100%">
	<tr align="center">
		<td>
		<input type="image" src="<?php echo "$base"; ?>/images/button_toroku.gif">
		<!-- <a href="javascript:window.history.go(-1);"><input type="image" src="<?php echo "$base"; ?>/images/button_torikesi.gif" border="0"></a> --> 
		<input type="hidden" value="submit"></td>
	</tr>
  </table>
  </form>
 </td>
