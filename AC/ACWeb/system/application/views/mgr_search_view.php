<td valign="top"><div class="title02">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="100%">任務情報</td>
      </tr>
    </table>
  </div>
  <!-- 20091025 search form start -->
  <script src="<?php echo $base;?>js/WebCalendar.js" type="text/javascript"></script>
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
  <center>
  <?php echo form_open('mgr_search'); ?>
  <table border="0" cellspacing="1" width="50%" align="center" bgcolor="#999999">
   <tr>
    <th align="right" height="20" width="20%" bgcolor="#D0F0F9">任務ID:</th>
    <td align="left" width="50%" bgcolor="#FFFFFF">
  <input type="text" name="mission_id" value="<?php echo $post['mission_id'];?>" size="10"></input>
  -
  <input type="text" name="mission_id2" value="<?php echo $post['mission_id2'];?>" size="10"></input>
	</td>
	<td width="30%" bgcolor="#FFFFFF" align="left">
    <select name="mission_status">
	  <option value ="" <?php switch($post['mission_status']){case '':echo 'selected';break;}?> >全て表示</option>
	  <option value ="1" <?php switch($post['mission_status']){case 1:echo 'selected';break;}?> >新着</option>
	  <option value ="2" <?php switch($post['mission_status']){case 2:echo 'selected';break;}?> >実行中</option>
	  <option value ="3" <?php switch($post['mission_status']){case 3:echo 'selected';break;}?> >完了</option>
	</select>
    </td>
   </tr>
   <tr>
    <th align="right" height="20" width="20%" bgcolor="#D0F0F9">日付:</th>
    <td align="left" width="50%" bgcolor="#FFFFFF">
    <input type="text" name="search_date" onclick="SelectDate(this,'yyyy\-MM\-dd')" readonly size="12" value="<?php echo $post['search_date']; ?>">
  	-
  	<input readonly type="text" name="search_date2" onclick="SelectDate(this,'yyyy\-MM\-dd')" readonly size="12" value="<?php echo $post['search_date2']; ?>">
	</td>
	<td width="30%" bgcolor="#FFFFFF" align="right">
    </td>
   </tr>
   <tr>
	<td colspan="3" width="30%" bgcolor="#FFFFFF" align="right">
    <input type="image" src="<?php echo "$base"; ?>/images/button_kensaku.gif"> 
		<input type="hidden" value="submit">
    </td>
   </tr>
  </table><br/>
  
<!--   <h3>任務ID : 
  <input type="text" name="mission_id" value="<?php //echo $post['mission_id'];?>" size="10"></input>
  -
  <input type="text" name="mission_id2" value="<?php //echo $post['mission_id2'];?>" size="10"></input></h3>
   <select name="mission_status">
  <option value ="" <?php //switch($post['mission_status']){case '':echo 'selected';break;}?> >全て表示</option>
  <option value ="1" <?php //switch($post['mission_status']){case 1:echo 'selected';break;}?> >新着</option>
  <option value ="2" <?php //switch($post['mission_status']){case 2:echo 'selected';break;}?> >実行中</option>
  <option value ="3" <?php //switch($post['mission_status']){case 3:echo 'selected';break;}?> >完了</option>
  </select>
  <input type="text" name="search_date" size="10" value="<?php //echo $post['search_date']; ?>">
  -
  <input readonly type="text" name="search_date2" size="10" value="<?php //echo $post['search_date2']; ?>">
 
  <input type="submit" value="検索">  -->
  </form></center>
  <!-- 20091025 search form end -->
  <?php if($showtb){?>
    <table id="pagedtable" border="0" cellpadding="3" cellspacing="1" bgcolor="#999999" width=100%>
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
        <td width="10%"><?php echo $td['mission_id'].'-'.$td['mission_id2'];?></td>
        <td width="5%"><?php echo $td['fenpei_id'];?></td>
        <td width="7%"><?php echo $td['zhixing_id'];?></td>
        <td width="6%"><?php echo $statusText[$td['mission_status']];?></td>
        <td width="6%"><?php if($td['del_status'] == 1) echo '取消中';?></td>
        <td width="10%"><?php echo $td['recv_date'];?></td>
        <td width="10%"><?php echo $td['fenpei_date'];?></td>
        <td width="10%"><?php echo $td['over_date'];?></td>
		<td width="10%"><?php 
		if(!empty($td['filename'])){
			echo anchor($downurl.$td['filename'],$td['filename']);
		}else{
			echo anchor('mgr_mission_show/'.$td['id'],'詳細');
		}
		?></td>
        <td width="5%"><?php if(!empty($td['fileover']))echo anchor($upurl.$td['fileover'],'下載');?></td>
        <td width="5%"><?php if(!empty($td['siryo']))echo anchor($siryo.$td['siryo'],'下載');?></td>
		<td width="10%"><?php 
		if($td['del_status'] == 1){ 
			echo anchor('mgr_mission/deletemis/'.$td['id'], 
						'[削除]&nbsp',
						array('onclick' => 'javascript:if(window.confirm(\''.$deletemismsg.'\')) return ture;else return false;')
				);
			echo anchor('mgr_mission/canceldelmis/'.$td['id'], 
						'[取消]&nbsp',
						array('onclick' => 'javascript:if(window.confirm(\''.$cancelmismsg.'\')) return ture;else return false;')
				);
			
      	}?></td>
	</tr>
      <?php } ?>
      </tbody>
    </table>
<?php } ?>
    
</td>
