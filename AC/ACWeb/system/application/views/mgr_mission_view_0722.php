<td valign="top"><div class="title02">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div class="point"></div></td>
        <td width="50%">配送依頼情報</td>
        <td width="50%" align="right">
		<?php echo $new; ?>
		<?php echo $doing; ?>
		<?php echo $over; ?>
		<!--<?php //echo $del; ?>-->
		<?php echo $all; ?>
		</td>
      </tr>
    </table>
  </div>
   
<?php echo form_open('mgr_mission/searchid'); ?>
  <table border="0" cellspacing="0" width="100%" align="right" bgcolor="#999999">
   <tr>
    <td width="55%" bgcolor="#FFFFFF"></td>
    <th align="right" height="20" width="10%" bgcolor="#FFFFFF">伝票ID:</th>
    <td width="25%" bgcolor="#FFFFFF">
    <input type="text" name="mission_id" value="<?php echo $post['mission_id'];?>" size="12" maxlength="7"></input>
	  -
	<input type="text" name="mission_id2" value="<?php echo $post['mission_id2'];?>" size="12" maxlength="8"></input>
	</td>
	<!-- <td width="10%" bgcolor="#FFFFFF">
    <select name="mission_status">
	  <option value ="" <?php switch($post['mission_status']){case '':echo 'selected';break;}?> >全て表示</option>
	  <option value ="1" <?php switch($post['mission_status']){case 1:echo 'selected';break;}?> >新着</option>
	  <option value ="2" <?php switch($post['mission_status']){case 2:echo 'selected';break;}?> >実行中</option>
	  <option value ="3" <?php switch($post['mission_status']){case 3:echo 'selected';break;}?> >完了</option>
	</select>
    </td> -->
    <td width="10%" bgcolor="#FFFFFF"><input type="image" src="<?php echo "$base"; ?>/images/button_kensaku.gif"> 
		<input type="hidden" value="submit"></td>
   </tr>
   </table><br><br>
   </form>
   <?php if(!empty($result_td)) {?>
      <script src="<?php echo $base;?>js/jquery-1.3.2.min.js" type="text/javascript"></script>
	  <script src="<?php echo $base;?>js/pagedtable.js" type="text/javascript"></script>
	  <script type="text/javascript">	
		// <![CDATA[
		<?php if(!isset($pagination)) {?>
		$(document).ready(function(){
			if($('#pagedtable').length > 0)
				$('#pagedtable').pageable();
		});
		<?php }?>
		// ]]>
	  </script>
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
	  <?php echo form_open('mgr_mission/dtb_confirm',array('name' => 'dtb'.$td['id'])); ?>
        <td width="9%"><?php echo $td['mission_id'].'-'.$td['mission_id2'];?></td>
        <td width="5%"><?php echo $td['fenpei_id'];?></td>
        <td width="7%"><?php if($td['mission_status'] > 0) echo $td['zhixing_id']; else echo form_dropdown($td['id'], $dl, '-');?></td>
        <td width="7%"><?php if($td['del_status'] == 1)echo $statusText[3];else echo $statusText[$td['mission_status']];?></td>
        <!-- <td width="6%"><?php if($td['del_status'] == 1) echo '取消中';?></td> -->
        <td width="12%"><?php echo $td['recv_date'];?></td>
        <td width="12%"><?php echo $td['fenpei_date'];?></td>
        <!-- <td width="12%"><?php echo $td['over_date'];?></td>-->
		<td width="10%"><?php 
		if(!empty($td['filename'])){
			echo anchor($downurl.$td['filename'],$td['filename'], array('target' => '_blank'));
		}else{
			echo anchor('mgr_mission_show/'.$td['id'],'確認');
		}
		?></td>
        <td width="5%"><?php if(!empty($td['fileover']))echo anchor($upurl.$td['fileover'],'ダウンロード', array('target' => '_blank'));?></td>
        <td width="5%"><?php if(!empty($td['siryo']))echo anchor($siryo.$td['siryo'],'ダウンロード', array('target' => '_blank'));?></td>
		<td width="5%"><?php 
		if($td['del_status'] == 1){ 
			echo anchor('mgr_mission/deletemis/'.$td['id'], 
						'[削除]&nbsp',
						array('onclick' => 'javascript:if(window.confirm(\''.$deletemismsg.'\')) return ture;else return false;')
				);
			echo anchor('mgr_mission/canceldelmis/'.$td['id'], 
						'[取消]&nbsp',
						array('onclick' => 'javascript:if(window.confirm(\''.$cancelmismsg.'\')) return ture;else return false;')
				);
			
      	}
		if($td['mission_id2'] == 'FAX'){ 
			echo anchor('mgr_mission/deletemis/'.$td['id'], 
						'[削除]&nbsp',
						array('onclick' => 'javascript:if(window.confirm(\''.$deletemismsg.'\')) return ture;else return false;')
				);
			
      	}?></td>
      	<td width="6%">
      	<?php if ($td['mission_status'] == 0) { ?>
      	<a href="javascript:document.<?php echo 'dtb'.$td['id']; ?>.submit();">配送確認</a>
      	<?php } else { ?>
      	<?php } ?>
      	</td>
	  <?php echo form_close(); ?>
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
	<table id="pagedtable" border="0" cellpadding="3" cellspacing="1" bgcolor="#999999" width=100%>
      <tr bgcolor="#D0F0F9">
        <?php 
			foreach($result_th as $th){
				echo '<th>'.$th.'</th>';
			}
		?>
      </tr>
	</table>
	<?php }?>
   <?php if(isset($pagination)) echo $pagination;?>
</td>
