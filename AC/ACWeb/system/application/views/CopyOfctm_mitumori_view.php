<td valign="top">
<!-- <div class="title02">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="50%">見積確認リスト</td>
		<td width="50%" align="right"><?php echo anchor('ctm_mitumori_create', '新規見積依頼'); ?>&nbsp;&nbsp;</td>
      </tr>
    </table>
  </div> -->
  <div id="menu7">
	<div class="menuUtility"><?php echo anchor('ctm_mitumori_create', "<img src='".$base."images/_r24_c6.jpg' border=0>"); ?></div>
  </div>
<?php if(!empty($result_td)){?>
	  <script src="<?php echo $base;?>js/jquery-1.3.2.min.js" type="text/javascript"></script>
	  <script src="<?php echo $base;?>js/pagedtable.js" type="text/javascript"></script>
	  <script type="text/javascript">
		$(document).ready(function(){
			if($('#pagedtable').length >0)
				$('#pagedtable').pageable();
		});
	  </script>
    <table cellpadding="0" cellspacing="1" width="1026" bgcolor="#FFFFFF" height="20">
      <tr>
        <th><img alt="" src="<?php echo $base;?>images/esti1.gif"></th>
        <th><img alt="" src="<?php echo $base;?>images/esti2.gif"></th>
        <th><img alt="" src="<?php echo $base;?>images/esti3.gif"></th>
        <th><img alt="" src="<?php echo $base;?>images/esti4.gif"></th>
        <th><img alt="" src="<?php echo $base;?>images/esti5.gif"></th>
        <th><img alt="" src="<?php echo $base;?>images/esti6.gif"></th>
      </tr>
      </table>
     <table id="pagedtable" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999" width="1026">
      <?php foreach($result_td as $td){?>
      <tr align="center" bgcolor="#FFFFFF">
        <td width="140" height="35" style="border-left:1px solid #CCC;border-bottom: 1px solid #CCCCCC;"><?php echo date("Y年m月d日",strtotime($td['create_date']));?></td>
        <td width="320" style="border-left:1px solid #CCCCCC;border-bottom: 1px solid #CCCCCC;"><?php $add = explode(',',$td['ka_add2']); echo $td['ka_add1'].$add[0].$td['ka_add3'];?></td>
        <td width="320" style="border-left:1px solid #CCCCCC;border-bottom: 1px solid #CCCCCC;"><?php $add = explode(',',$td['todoke_add2']); echo $td['todoke_add1'].$add[0].$td['todoke_add3'];?></td>
        <td width="80" style="border-left:1px solid #CCCCCC;border-bottom: 1px solid #CCCCCC;"><?php if(empty($td['hensin']) || $td['hensin'] == 0) echo "未返信"; else echo number_format($td['kingaku']);?></td>
        <td width="80" style="border-left:1px solid #CCCCCC;border-bottom: 1px solid #CCCCCC;">
        <?php if($td['hensin'] == 1 ) { ?>
      	<?php echo anchor('ctm_mis_update/'.$td['id'], "<img src='".$base."images/kakunin.jpg' border=0>");?>
      	<?php } ?>
      	</td>
        <?php if($td['hensin'] == 0 ) { ?>
        <td width="79" style="border-left:1px solid #CCCCCC;border-bottom: 1px solid #CCCCCC;border-right: 1px solid #CCCCCC;"><?php echo anchor('ctm_mitumori/'.$td['id'],
         "<img src='".$base."images/sakujyo.jpg' border=0>",
        array('onclick' => 'javascript:if(window.confirm(\''.$deletemitumorimsg.'\')) return ture;else return false;'));
        ?></td>
        <?php } else { ?>
        <td width="5%" style="border-left:1px solid #CCCCCC;border-bottom: 1px solid #CCCCCC;border-right: 1px solid #CCCCCC;"></td>
        <?php } ?>
      </tr>

      <?php } ?>

    </table>

<?php } else { ?>

    <table border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" width=100%>
      <tr bgcolor="#D0F0F9" height="20">
        <th><img alt="" src="<?php echo $base;?>images/esti1.gif"></th>
        <th><img alt="" src="<?php echo $base;?>images/esti2.gif"></th>
        <th><img alt="" src="<?php echo $base;?>images/esti3.gif"></th>
        <th><img alt="" src="<?php echo $base;?>images/esti4.gif"></th>
        <th><img alt="" src="<?php echo $base;?>images/esti5.gif"></th>
        <th><img alt="" src="<?php echo $base;?>images/esti6.gif"></th>
      </tr>
    </table>

<?php } ?>

</td>