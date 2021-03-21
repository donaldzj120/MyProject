<td valign="top"><div class="title02">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="100%">お客様よこそう</td>
      </tr>
    </table>
  </div>
  
  <!-- 20091025 search form start -->
  <script src="<?php echo $base;?>js/WebCalendar.js" type="text/javascript"></script>
  <script src="<?php echo $base;?>js/jquery-1.3.2.min.js" type="text/javascript"></script>
  <script src="<?php echo $base;?>js/pagedtable.js" type="text/javascript"></script>
  <script type="text/javascript" class="code">	
	// <![CDATA[
	$(document).ready(function(){
		if($('#pagedtable').length >0)
			$('#pagedtable').pageable();
	});

	
	// ]]>
  </script>    
  <center>
  <?php echo form_open('ctm_search'); ?>
  <table border="0" cellspacing="1" width="50%" align="center" bgcolor="#999999">
   <tr>
    <th align="right" height="20" width="20%" bgcolor="#D0F0F9">任務ID:</th>
    <td width="50%" bgcolor="#FFFFFF">
    <input type="text" name="mission_id" value="<?php echo $post['mission_id'];?>" size="12" maxlength="7"></input>
	  -
	<input type="text" name="mission_id2" value="<?php echo $post['mission_id2'];?>" size="12" maxlength="8"></input>
	</td>
	<td width="30%" bgcolor="#FFFFFF">
    <select name="mission_status">
	  <option value ="" <?php switch($post['mission_status']){case '':echo 'selected';break;}?> >全て表示</option>
	  <option value ="1" <?php switch($post['mission_status']){case 1:echo 'selected';break;}?> >新着</option>
	  <option value ="2" <?php switch($post['mission_status']){case 2:echo 'selected';break;}?> >実行中</option>
	  <option value ="3" <?php switch($post['mission_status']){case 3:echo 'selected';break;}?> >完了</option>
	  <option value ="4" <?php switch($post['mission_status']){case 4:echo 'selected';break;}?> >取消中</option>
	</select>
    </td>
   </tr>
   <tr>
    <th align="right" height="20" width="20%" bgcolor="#D0F0F9">日付:</th>
    <td width="50%" bgcolor="#FFFFFF">
    <input type="text" name="search_date" onclick="SelectDate(this,'yyyy\-MM\-dd')" readonly="true" size="12" value="<?php echo $post['search_date']; ?>">
  	-
  	<input readonly type="text" name="search_date2" onclick="SelectDate(this,'yyyy\-MM\-dd')" readonly="true" size="12" value="<?php echo $post['search_date2']; ?>">
	</td>
	<td width="30%" bgcolor="#FFFFFF">
    <select name="datetime">
	  <option value ="" <?php switch($post['datetime']){case '':echo 'selected';break;}?> ></option>
	  <option value ="1" <?php switch($post['datetime']){case 1:echo 'selected';break;}?> >受注日時</option>
	  <option value ="2" <?php switch($post['datetime']){case 2:echo 'selected';break;}?> >分配日時</option>
	  <option value ="3" <?php switch($post['datetime']){case 3:echo 'selected';break;}?> >完了日時</option>
	</select>
    </td>
   </tr>
  </table>
    <p><input type="image" src="<?php echo "$base"; ?>/images/button_kensaku.gif"> 
		<input type="hidden" value="submit"></p><br/>
  <!-- <h3>任務ID : 
  <input type="text" name="mission_id" value="<?php echo $post['mission_id'];?>" size="10"></input>
  -
  <input type="text" name="mission_id2" value="<?php echo $post['mission_id2'];?>" size="10"></input></h3>
   <select name="mission_status">
  <option value ="" <?php //switch($post['mission_status']){case '':echo 'selected';break;}?> >全て表示</option>
  <option value ="1" <?php //switch($post['mission_status']){case 1:echo 'selected';break;}?> >新着</option>
  <option value ="2" <?php //switch($post['mission_status']){case 2:echo 'selected';break;}?> >実行中</option>
  <option value ="3" <?php //switch($post['mission_status']){case 3:echo 'selected';break;}?> >完了</option>
  </select>
  <input type="text" name="search_date" size="10" value="<?php //echo $post['search_date']; ?>">
  -
  <input readonly type="text" name="search_date2" size="10" value="<?php //echo $post['search_date2']; ?>">
 
  <input type="submit" value="検索"> -->
  </form></center>
  <!-- 20091025 search form end -->
    <?php if($showtb){?>
    <table  id="pagedtable" border="0" cellpadding="3" cellspacing="1" bgcolor="#999999" width=100%>
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
      <?php foreach($result_td as $td){?>
      <tr align="center" bgcolor="#FFFFFF">
        <td width="10%"><?php echo $td['sid1'].'-'.$td['sid2'];?></td>
        <td width="6%"><?php echo $statusText[$td['mission_status']];?></td>
        <td width="15%"><?php echo $td['name1'].' '.$td['name2'];?></td>
        <td width="15%"><?php echo $td['add1'].' '.$td['add2'].' '.$td['add3'];?></td>
        <td width="8%"><?php echo substr($td['tel'],0,3).'-'.substr($td['tel'],3,4).'-'.substr($td['tel'],7,strlen($td['tel'])-7);?></td>
        <td width="15%"><?php echo $td['tname1'].' '.$td['tname2'];?></td>
        <td width="15%"><?php echo $td['tadd1'].' '.$td['tadd2'].' '.$td['tadd3'];?></td>
        <td width="8%"><?php echo substr($td['ttel'],0,3).'-'.substr($td['ttel'],3,4).'-'.substr($td['ttel'],7,strlen($td['ttel']));?></td>
        <td width="4%"><?php echo anchor('ctm_mission_show/'.$td['id'],'詳細');?></td>
        <td width="4%"><?php 
        if($td['mission_status'] != 2){
	        if($td['del_status'] == 1) 
	        	echo '取消中';
	        else 
	        	echo anchor('ctm_mis/deletemis/'.$td['mid'],
	        			'取消',
	        			array('onclick' => 'javascript:if(window.confirm(\''.$cancelmismsg.'\')) return ture;else return false;')
	        	);
        }?></td>
      </tr>
      <?php } ?>
      </tbody>
    </table>
  <?php } ?>
</td>
