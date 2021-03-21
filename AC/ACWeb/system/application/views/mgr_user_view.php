<td valign="top"><!-- <div class="title02">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="50%">登録者管理</td>
		<td width="50%" align="right"><?php echo anchor('mgr_user_create', $userviewcrt); ?>&nbsp;&nbsp;</td>
      </tr>
    </table>
  </div> --><div id="menu3"><div class="menuUtility"><?php echo anchor('mgr_user_create', "<img src='".$base."images/_r17_c3.jpg' border=0>"); ?></div></div>
<?php if(!empty($result_td)){?>
	  <script src="<?php echo $base;?>js/jquery-1.3.2.min.js" type="text/javascript"></script>
	  <script src="<?php echo $base;?>js/pagedtable.js" type="text/javascript"></script>
	  <script type="text/javascript">
		// <![CDATA[
		$(document).ready(function(){
			if($('#pagedtable').length >0)
				$('#pagedtable').pageable();
		});
		// ]]>
	  </script>
    <table id="pagedtable" cellpadding="0" cellspacing="0">	 <thead>
      <tr>
        <th><img alt="" src="<?php echo $base;?>images/user1.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user2.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user3.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user4.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user5.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user6.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user7.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user8.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user9.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user10.jpg"></th>
      </tr>      </thead>      <tbody>
      <?php foreach($result_td as $td){?>
      <tr align="center" bgcolor="#FFFFFF">
        <td height="32"><?php echo $td['user_id'];?></td>
        <td><?php if($td['authority'] == 3) echo $dlstatusText[$td['status']];?></td>
        <td><?php echo $authorityText[$td['authority']];?></td>
        <td><?php echo $td['username'];?></td>
        <td><?php echo $td['email'];?></td>
        <td><?php echo $td['user_phone1'];?></td>
        <td><?php echo $td['user_info1'];?></td>
        <td><?php echo $td['car_info1'];?></td>
        <!---<td><?php echo $td['create_date'];?></td>
        <td><?php echo $td['modify_date'];?></td>-->
        <td><?php echo anchor('mgr_user_update/'.$td['id'], "<img src='".$base."images/shuusei.jpg' border=0>"); ?></td>
        <td class="right_line"><?php echo anchor('mgr_user/'.$td['id'],
         "<img src='".$base."images/sakujyo.jpg' border=0>",
        array('onclick' => 'javascript:if(window.confirm(\''.$deleteusermsg.'\')) return ture;else return false;'));
        ?></td>
      </tr>
      <?php } ?>	      </tbody>
    </table>	<table border="0" width="100%">	 <tr>	  <td align="center"><?php echo $pageindex; ?>	  </td>	 </tr>	</table>
<?php } else { ?>
    <table id="pagedtable" cellpadding="0" cellspacing="0">
      <tr>
        <th><img alt="" src="<?php echo $base;?>images/user1.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user2.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user3.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user4.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user5.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user6.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user7.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user8.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user9.jpg"></th>        <th><img alt="" src="<?php echo $base;?>images/user10.jpg"></th>
      </tr>
    </table>
<?php } ?>
</td>