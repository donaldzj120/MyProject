<!-- ▼MENU -->

<td valign="top" width="170px">
  <?php if($authority == 1 || $authority == 4) {?>
    <ul id="menu">
      <li><?php echo anchor("mgr_hyo",'配車表', array('class' => 'navi1'))?></li>
      <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
      <li><?php echo anchor("mgr_mission",'配送依頼情報', array('class' => 'navi2'))?></li>
      <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
      <li><?php echo anchor("mgr_kakunin",'配送状況確認', array('class' => 'navi3'))?></li>
      <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
      <li><?php echo anchor("mgr_user",'登録者管理', array('class' => 'navi4'))?></li>
      <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
	  <li><?php echo anchor("mgr_sagyo",'売上管理', array('class' => 'navi5'))?></li>
	  <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
	  <li><?php echo anchor("mgr_seikyusyo",'請求書作成', array('class' => 'navi6'))?></li>
	  <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
	  <li><?php echo anchor("mgr_mitumori",'見積確認', array('class' => 'navi7'))?></li>
	  <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
	  <li><?php echo anchor("mgr_shukkin",'出勤', array('class' => 'navi13'))?></li>
	  <?php if ($authority == 1) { ?>
	  <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
	  <li><?php echo anchor("mgr_oshirase",'お知らせ', array('class' => 'navi8'))?></li>
	  <?php } ?>
    </ul>
  <?php } else if($authority == 2) { ?>
    <ul id="menu">
      <li><?php echo anchor("mgr_hyo",'配車表', array('class' => 'navi1'))?></li>
      <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
      <li><?php echo anchor("mgr_mission",'配送依頼情報', array('class' => 'navi2'))?></li>
      <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
      <li><?php echo anchor("mgr_kakunin",'配送状況確認', array('class' => 'navi3'))?></li>
      <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
	  <li><?php echo anchor("mgr_shukkin",'出勤', array('class' => 'navi13'))?></li>
      <li><img src="<?php echo $base;?>images/menu_line.jpg" /></li>
	  <li><?php echo anchor("mgr_oshirase",'お知らせ', array('class' => 'navi8'))?></li>
    </ul>
  <?php } ?>
  <div class="nav_foot"></div>
  </td>
<!-- ▲MENU -->
