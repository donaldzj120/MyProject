<td valign="top">
  <!-- <div class="title02">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="40%" align="left">配車表</td>
        <td width="60%" align="left"></td>
      </tr>
    </table>
  </div> -->
<div id="menu12">
<?php if ($authority == 1) { ?>
<div class="menuUtility">
<?php echo anchor('mgr_oshirase/oshirase_new/', "<img src='".$base."images/_r17_c3.jpg' border=0>"); ?>
</div>
<?php } ?>
</div>
<?php if(!empty($result_td)){?>
	  <script src="<?php echo $base;?>js/jquery-1.3.2.min.js" type="text/javascript"></script>
	  <script src="<?php echo $base;?>js/pagedtable.js" type="text/javascript"></script>
	  <script type="text/javascript">
		// <![CDATA[
		$(document).ready(function(){
			if($('#pagedtable').length >0)
				$('#pagedtable').pageable();
		});
	  </script>
    <table id="pagedtable" border="0" cellpadding="0" cellspacing="0" >
      <thead>
      <tr>
        <th><img alt="" src="<?php echo $base;?>images/oshirase1.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/oshirase2.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/jyoukyou7.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/user10.jpg"></th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($result_td as $td){?>
      <tr align="center" bgcolor="#FFFFFF" height="35">
        <td><?php echo $td['Create_Date'];?></td>
        <td align="left">&nbsp;<?php echo $td['Title'];?></td>
        <td><?php echo anchor('mgr_oshirase/oshirase_show/'.$td['ID'],"<img src='".$base."images/kakunin.jpg' border=0>");?></td>
        <td class="right_line"><?php if($authority == 1) { echo anchor('mgr_oshirase/oshirase_del/'.$td['ID'],"<img src='".$base."images/sakujyo.jpg' border=0>"); } ?></td>
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
<table id="pagedtable" cellpadding="0" cellspacing="0" >
<thead>
 <tr>
	<th><img alt="" src="<?php echo $base;?>images/oshirase1.jpg"></th>
	<th><img alt="" src="<?php echo $base;?>images/oshirase2.jpg"></th>
	<th><img alt="" src="<?php echo $base;?>images/jyoukyou7.jpg"></th>
	<th><img alt="" src="<?php echo $base;?>images/user10.jpg"></th>
 </tr>
 </thead>
</table>
<?php } ?>
</td>