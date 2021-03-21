<td valign="top"><div class="title02">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td>配車</td>
      </tr>
    </table>
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
	
		
		// ]]>
	  </script>
  <?php echo form_open('mission'); ?>
    <table id="pagedtable" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999" width=100%><thead>
      <tr bgcolor="#D0F0F9" height="20">
        <?php 
		foreach($result_th as $th){
			echo '<th>'.$th.'</th>';
		}
		?>
      </tr>	      </thead>      <tbody>
      <?php foreach($result_td as $td){?>
      <tr align="center" bgcolor="#FFFFFF">
        <td width="20%" height="15"><?php echo $td['username'];?></td>
        <td width="10%"><?php echo $dlstatusText[$td['status']];?></td>
        <td width="55%"><?php echo $td['car_info1'];?></td>
        <td width="15%">
        <?php echo anchor('mgr_dtb_mis_select/'.$td['id'].'/con', '<img src="'.$base.'/images/button_bunpai.gif" border="0"/>'); ?>
        </td>
      </tr>
      <?php } ?>	</tbody>
    </table>    <table border="0" width="100%">	 <tr>	  <td align="center"><?php echo $pageindex; ?>	  </td>	 </tr>	</table>
<?php } else { ?>
<table border="0" cellpadding="0" cellspacing="1" bgcolor="#999999" width=100%>
 <tr bgcolor="#D0F0F9" height="20">
        <?php 
	foreach($result_th as $th){
		echo '<th>'.$th.'</th>';
	}
	?>
 </tr>
</table>
<?php }?>
  </form></td>
