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
  <div id="menu1">
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
        <th><img alt="" src="<?php echo $base;?>images/ji_user.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/5ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/6ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/7ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/8ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/9ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/10ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/11ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/12ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/13ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/14ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/15ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/16ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/17ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/18ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/19ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/20ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/21ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/22ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/23ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/0ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/1ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/2ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/3ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/4ji.jpg"></th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($result_td as $td){?>
      <?php $lines = preg_split("/,/", $td['fenpei_date']);?>
      <!-- <?php foreach ($lines as $line){ echo $line; echo "aaa"; }?> -->
      <tr align="center" bgcolor="#FFFFFF">
        <td><?php echo $td['username'];?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "05"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "06"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "07"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "08"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "09"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "10"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "11"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "12"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "13"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "14"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "15"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "16"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "17"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "18"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "19"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "20"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "21"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "22"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "23"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "00"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "01"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "02"){ echo $line; }else{ echo " ";}}?></td>
        <td><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "03"){ echo $line; }else{ echo " ";}}?></td>
        <td class="right_line"><?php foreach ($lines as $line){ if(substr($line, 0, 2) == "04"){ echo $line; }else{ echo " ";}}?></td>
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
        <th><img alt="" src="<?php echo $base;?>images/ji_user.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/5ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/6ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/7ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/8ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/9ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/10ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/11ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/12ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/13ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/14ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/15ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/16ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/17ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/18ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/19ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/20ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/21ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/22ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/23ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/0ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/1ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/2ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/3ji.jpg"></th>
        <th><img alt="" src="<?php echo $base;?>images/4ji.jpg"></th>
      </tr>
 </thead>
</table>
<?php } ?>
</td>