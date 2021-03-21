<td valign="top"><!-- <div class="title02">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="20%" align="left"><?php echo $seikyusyo;?></td>
        <td width="60%" align="left"></td>
		<td width="20%" align="right"><?php echo anchor('mgr_seikyusyo_meisai', $seikyusyo_sakusei); ?>&nbsp;&nbsp;</td>
      </tr>
    </table>
  </div> --><div id="menu13"><div class="menuUtility"><?php echo anchor('mgr_seikyusyo_meisai', "<img src='".$base."images/_r17_c3.jpg' border=0>"); ?></div></div>
<?php if(!empty($result_td)){?>
	  <script src="<?php echo $base;?>js/jquery-1.3.2.min.js" type="text/javascript"></script>	  <script src="<?php echo $base;?>js/pagedtable.js" type="text/javascript"></script>	  <script type="text/javascript">		// <![CDATA[		$(document).ready(function(){			if($('#pagedtable').length >0)				$('#pagedtable').pageable();		});	  </script>
    <table id="pagedtable" border="0" cellpadding="0" cellspacing="0" >      <thead>      <tr>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_1.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_2.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_3.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_4.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_5.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_6.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_7.jpg"></th>      </tr>      </thead>      <tbody>
      <?php foreach($result_td as $td){?>
      <tr align="center" bgcolor="#FFFFFF">
        <td><?php echo $td['seikyu_hiduke'];?></td>
        <td><?php echo $td['seikyu_from'];?><br/><?php echo '~'.$td['seikyu_to'];?></td>
        <td><?php echo $td['seikyusaki_name'];?></td>
        <td><?php echo $td['seikyusaki_jyusyo'];?></td>
        <td><?php echo number_format($td['seikyu_kingaku']).'円';?></td>
        <td><?php if(!empty($td['file']))echo anchor($siryo.$td['file'],"<img src='".$base."images/kakunin.jpg' border=0>");?></td>
        <td class="right_line">
        <?php echo anchor('mgr_seikyu_del/'.$td['id'],"<img src='".$base."images/sakujyo.jpg' border=0>",
        array('onclick' => 'javascript:if(window.confirm(\''.$deleteusermsg.'\')) return ture;else return false;'));
        ?>
        </td>
      </tr>
      <?php } ?>     </tbody>
    </table>
<?php } else { ?>
<table id="pagedtable" border="0" cellpadding="0" cellspacing="0" >
      <thead>      <tr>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_1.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_2.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_3.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_4.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_5.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_6.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/seikyuusho_7.jpg"></th>      </tr>      </thead>
</table>
<?php } ?>
</td>