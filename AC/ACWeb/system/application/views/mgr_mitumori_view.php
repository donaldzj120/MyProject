<td valign="top">
<!-- <div class="title02">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="50%">見積確認リスト</td>
		<td width="50%" align="right"></td>
      </tr>
    </table>
  </div> -->
<div id="menu14">
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
    <table id="pagedtable" border="0" cellpadding="0" cellspacing="0" >
      <thead>
      <tr>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_1.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_2.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_3.jpg"></th>
        <?php if(empty($td['hensin']) || $td['hensin'] == 0) { ?>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_6.jpg"></th>
        <?php } else { ?>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_4.jpg"></th>
        <?php } ?>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_5.jpg"></th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($result_td as $td){?>
      <tr align="center" bgcolor="#FFFFFF">
        <td><?php echo date("Y年m月d日",strtotime($td['create_date']));?></td>
        <td><?php $add = explode(',',$td['ka_add2']); echo $td['ka_add1'].$add[0].$td['ka_add3'];?></td>
        <td><?php $add = explode(',',$td['todoke_add2']); echo $td['todoke_add1'].$add[0].$td['todoke_add3'];?></td>
        <td>
        <?php if(empty($td['hensin']) || $td['hensin'] == 0) { ?>
        <?php echo anchor('mgr_mitumori_update/'.$td['id'], "<img src='".$base."images/_r23_c3.jpg' border=0>"); ?>
        <?php } else { ?>
        <?php echo number_format($td['kingaku']);?>
        <?php } ?>
        </td>
        <td class="right_line">
        <?php if(empty($td['hensin']) || $td['hensin'] == 1) { ?>
        <?php echo anchor('mgr_mitumori_confirm/'.$td['id'], "<img src='".$base."images/kakunin.jpg' border=0>"); ?>
        <?php } ?>
        </td>
      </tr>

      <?php } ?>
	</tbody>
    </table>
    <table border="0" width="100%">
	 <tr>
	  <td align="center"><?php echo $pageindex; ?>
	  </td>
	 </tr>
	</table>
<?php } else { ?>

    <table id="pagedtable" border="0" cellpadding="0" cellspacing="0" >
      <thead>
      <tr>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_1.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_2.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_3.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_4.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/mitsumori_5.jpg"></th>
      </tr>
      </thead>
    </table>

<?php } ?>

</td>