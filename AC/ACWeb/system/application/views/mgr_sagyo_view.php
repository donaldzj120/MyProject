<td valign="top"><!-- <div class="title02">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="20%" align="left">売上集計</td>
        <?php foreach($year_list as $yl){?>
        <td width="<?php echo $nendo_width; ?>%" align="center">
        <?php echo anchor('mgr_sagyo_nendo/' . $yl['nendo'], $yl['nendo']); ?>
        </td>
        <?php } ?>
		<td width="20%" align="right"><?php echo anchor('mgr_sagyo_create', $sagyo_tuika); ?>&nbsp;&nbsp;</td>
      </tr>
    </table>
  </div> --><div id="menu5"><div class="menuUtility"><?php echo anchor('mgr_sagyo_create', "<img src='".$base."images/new.jpg' border=0>"); ?></div><div class="nendoUtility"><?php foreach($year_list as $yl){?><?php echo anchor('mgr_sagyo_nendo/' . $yl['nendo'], $yl['nendo'], array('style'=>'margin:0 10px;font-size:16px;')); ?><?php } ?></div></div>
    <table cellpadding="0" cellspacing="0" id="mgr_table">
      <tr>
        <th><img alt="" src="<?php echo $base;?>images/uri1.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/uri2.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/uri3.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/uri4.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/uri5.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/uri6.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/uri7.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/uri8.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/uri9.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/uri10.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/uri11.jpg"></th>
      </tr>
      <?php foreach($result_td as $td){?>
      <tr align="center" bgcolor="#FFFFFF">
        <td height="35"><?php echo $td['year'];?></td>
        <td><?php echo $td['month'];?></td>
        <td><?php echo number_format($td['gosu']);?>&nbsp;&nbsp;個</td>
        <td><?php echo number_format($td['jyuryo']);?>&nbsp;&nbsp;KG</td>
        <td><?php echo number_format($td['kyori']);?>&nbsp;&nbsp;KM</td>
		<td>&yen;&nbsp;<?php echo number_format($td['kyori_kane']);?>&nbsp;&nbsp;</td>
        <td>&yen;&nbsp;<?php echo number_format($td['futai_kane']);?>&nbsp;&nbsp;</td>
        <td>&yen;&nbsp;<?php echo number_format($td['kousoku']);?>&nbsp;&nbsp;</td>
        <td>&yen;&nbsp;<?php echo number_format($td['cyusya_kane']);?>&nbsp;&nbsp;</td>
        <td>&yen;&nbsp;<?php echo number_format($td['gokei']);?>&nbsp;&nbsp;</td>
        <td class="right_line"><?php echo anchor('mgr_sagyo_meisai/' . $td['year'] . '/' .$td['month'] . '/' . 32,  "<img src='".$base."images/kakunin.jpg' border=0>"); ?></td>
      </tr>
      <?php } ?>
    </table>
    <br />
    <table border="0" cellpadding="0" cellspacing="1" bgcolor="#999999" width="40%" align="right">
     <tr bgcolor="#FFFFFF">
      <th bgcolor="#2EAEEB" width="60%" height="25">
      <font size="+1" color="white"><strong><?php echo $nendo;?>年度売上合計</strong></font>
      </th>
      <td bgcolor="#FFFFFF" width="40%" align="center">
      <font size="+1"><strong><?php echo number_format($nd_gokei);?>&nbsp;円</strong></font>
      </td>
     </tr>
    </table>
</td>