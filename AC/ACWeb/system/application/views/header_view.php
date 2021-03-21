<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $header['title']; ?></title>
<LINK REL=stylesheet HREF="<?php echo "$base$css"; ?>" TYPE="text/css">

<script LANGUAGE="javascript">
  function openwin($page)
  {window.open($page,"newwindow","height=600,width=850,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no, status=yes");}
</script>
<script LANGUAGE="javascript">
function nocopy()
{
event.returnValue=false;
}
</script>
<script>
function stop(){
return false;
}
document.oncontextmenu=stop;
</script>
</head>
<body onload="nocopy()">
<noscript>
<iframe src="*.htm"></iframe>
</noscript><div id="top"></div><div id="utility"><div class="left"><p><img src="<?php echo "$base"; ?>images/ac_r1_c1.jpg" width="286" height="60" alt="ロゴ" /></p></div><div class="left2"><p><img src="<?php echo "$base"; ?>images/ac_r2_c3.jpg" width="171" height="30" alt="サブタイトル" /></p></div><div class="right2"><form name="logout" method="post" action="<?php echo strip_tags($LogoutLink); ?>">	<p><input name="form" type="image" src="<?php echo "$base"; ?>images/ac_r2_c9.jpg"></p></form><!-- <p><img src="img/ac_r2_c9.jpg" width="120" height="30" alt="ログアウト" /></p> --></div><div class="right"><p><img src="<?php echo "$base"; ?>images/2.jpg" width="120" height="30" alt="ヘルプ" /></p></div></div>
<!-- <div class="header_02">
  <h1 class="header_01"><?php echo $header['title']; ?></h1>
  <div class="header_03"></div>
</div>
<div class="logout">
<form name="logout" method="post" action="<?php echo strip_tags($LogoutLink); ?>">	<input name="form" type="image" src="<?php echo "$base"; ?>images/ac_r2_c9.jpg"></form>
</div> -->
<div id="back">
<table width="1240" border="0" cellpadding="3" cellspacing="0" style="margin:0 auto;height:500px;">
<tr>