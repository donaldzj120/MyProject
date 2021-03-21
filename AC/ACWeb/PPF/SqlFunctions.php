<?php

$dbHost = "localhost";
$dbName = "te21130_AC";
$dbUser = "te21130_AC";
$dbPass = "ac091122";

/**
* 患者基本データの取得
* 患者ID
*/
function GetMissionInfo($id)
{
	global $dbHost;
	global $dbName;
	global $dbUser;
	global $dbPass;
	try
	{
		//
		$con = mysql_connect($dbHost,$dbUser,$dbPass) or die(mysql_error());

		if (!$con)
		{
			die("ERR".mysql_error());

			return;
		}
		//
		mysql_select_db($dbName) or die("ERR".mysql_error());
		//
		mysql_query("SET CHARACTER SET utf8");
		//

		$query = "SELECT id,mission_id,mission_id2,from_id,over_date,fileover FROM mission "
				." WHERE id = '"   .$id."'";

		$result = mysql_query($query);

		return $result;
	}
	catch(Exception $ex)
	{
		throw $ex;
	}
}

function GetSagyouInfo($id1, $id2, $from_id)
{
	global $dbHost;
	global $dbName;
	global $dbUser;
	global $dbPass;
	try
	{
		//
		$con = mysql_connect($dbHost,$dbUser,$dbPass) or die(mysql_error());

		if (!$con)
		{
			die("ERR".mysql_error());

			return;
		}
		//
		mysql_select_db($dbName) or die("ERR".mysql_error());
		//
		mysql_query("SET CHARACTER SET utf8");
		//

		$query = "SELECT * FROM sagyo WHERE sagyo_id1 = '".$id1."' AND sagyo_id2 = '".$id2."' AND from_id = '".$from_id."' ";

		$result = mysql_query($query);

		return $result;
	}
	catch(Exception $ex)
	{
		throw $ex;
	}
}

/**
* 保険書確認データの取得
* 患者ID
*/
function GetHokenshoKakuninInfo($kanjyaID)
{
	global $dbHost;
	global $dbName;
	global $dbUser;
	global $dbPass;
	try
	{
		//
		$con = mysql_connect($dbHost,$dbUser,$dbPass) or die(mysql_error());

		if (!$con)
		{
			die("ERR".mysql_error());

			return;
		}
		//
		mysql_select_db($dbName) or die("ERR".mysql_error());
		//
		mysql_query("SET CHARACTER SET utf8");
		//

		$query = "SELECT * FROM dtb_hokensho_kakunin "
				." WHERE KANJYA_ID = '"   .$kanjyaID."'";

		$result = mysql_query($query);

		return $result;
	}
	catch(Exception $ex)
	{
		throw $ex;
	}
}
/**
* 傷病データの取得
* 患者ID
*/
function GetShoubyouInfo($kanjyaID)
{
	global $dbHost;
	global $dbName;
	global $dbUser;
	global $dbPass;
	try
	{
		//
		$con = mysql_connect($dbHost,$dbUser,$dbPass) or die(mysql_error());

		if (!$con)
		{
			die("ERR".mysql_error());

			return;
		}
		//
		mysql_select_db($dbName) or die("ERR".mysql_error());
		//
		mysql_query("SET CHARACTER SET utf8");
		//
		$query = "SELECT * FROM dtb_shoubyou "
				." WHERE KANJYA_ID = '"   .$kanjyaID."'"
				." AND   SAKUJYO_FURAGU = 0";

		$result = mysql_query($query);

		return $result;
	}
	catch(Exception $ex)
	{
		throw $ex;
	}
}
/**
* 使用薬剤データの取得
* 患者ID
*/
function GetShiyouYakuzaiInfo($kanjyaID)
{
	global $dbHost;
	global $dbName;
	global $dbUser;
	global $dbPass;
	try
	{
		//
		$con = mysql_connect($dbHost,$dbUser,$dbPass) or die(mysql_error());

		if (!$con)
		{
			die("ERR".mysql_error());

			return;
		}
		//
		mysql_select_db($dbName) or die("ERR".mysql_error());
		//
		mysql_query("SET CHARACTER SET utf8");
		//
		$query = "SELECT * FROM dtb_shiyou_yakuzai "
				." WHERE KANJYA_ID = '"   .$kanjyaID."'"
				." AND   SAKUJYO_FURAGU = 0";

		$result = mysql_query($query);

		return $result;
	}
	catch(Exception $ex)
	{
		throw $ex;
	}
}
/**
* 入院診療計画書データの取得
* 患者ID、検索日付
*/
function GetNyuuinShinryouKeikakushoInfo($kanjyaID, $hiduke)
{
	global $dbHost;
	global $dbName;
	global $dbUser;
	global $dbPass;
	try
	{
		//
		$con = mysql_connect($dbHost,$dbUser,$dbPass) or die(mysql_error());

		if (!$con)
		{
			die("ERR".mysql_error());

			return;
		}
		//
		mysql_select_db($dbName) or die("ERR".mysql_error());
		//
		mysql_query("SET CHARACTER SET utf8");
		//
		$query = "SELECT "
				." nsh.NENGOU, "
				." nsh.NEN, "
				." nsh.GETU, "
				." nsh.HI, "
				." nsh.KENSAKU_HIDUKE, "
				." nsh.BYOUTOU, "
				." nsh.SHUJIIIGAI_TANTOUSHA, "
				." nsh.SHIEN_TANTOUSHA, "
				." nsh.BYOUMEI, "
				." nsh.SHOUJYOU, "
				." nsh.TIRYOU_KEIKAKU, "
				." nsh.KENSAKU_NITTEI, "
				." nsh.SHUJYUTU_NITTEI, "
				." nsh.NYUUIN_KIKAN_FROM_NENGOU, "
				." nsh.NYUUIN_KIKAN_FROM_NEN, "
				." nsh.NYUUIN_KIKAN_FROM_GETU, "
				." nsh.NYUUIN_KIKAN_FROM_HI, "
				." nsh.NYUUIN_KIKAN_TO_NENGOU, "
				." nsh.NYUUIN_KIKAN_TO_NEN, "
				." nsh.NYUUIN_KIKAN_TO_GETU, "
				." nsh.NYUUIN_KIKAN_TO_HI, "
				." nsh.KANGO_KEIKAKU, "
				." nsh.RHBR_KEIKAKU, "
				." nsh.ZAITAKU_SHIENKEIKAKU, "
				." nsh.KINOU_HYOUKA, "
				." kj.SHIMEI1, "
				." kj.SHIMEI2 "
				." FROM dtb_nyuuinshinryou_keikakusho as nsh "
				." LEFT JOIN dtb_kanjya as kj ON nsh.KANJYA_ID = kj.KANJYA_ID "
				." 		AND kj.SAKUJYO_FURAGU = 0 AND kj.KANJYA_ID = '"   .$kanjyaID."'"
				." WHERE nsh.KANJYA_ID = '"   .$kanjyaID."'"
				." AND   nsh.KENSAKU_HIDUKE = '"   .$hiduke."'"
				." AND   nsh.SAKUJYO_FURAGU = 0";

		$result = mysql_query($query);

		return $result;
	}
	catch(Exception $ex)
	{
		throw $ex;
	}
}
/**
* 入院アナムネデータの取得
* 患者ID、検索日付
*/
function GetNyuuinAnamuneInfo($kanjyaID, $hiduke)
{
	global $dbHost;
	global $dbName;
	global $dbUser;
	global $dbPass;
	try
	{
		//
		$con = mysql_connect($dbHost,$dbUser,$dbPass) or die(mysql_error());

		if (!$con)
		{
			die("ERR".mysql_error());

			return;
		}
		//
		mysql_select_db($dbName) or die("ERR".mysql_error());
		//
		mysql_query("SET CHARACTER SET utf8");
		//
		$query = "SELECT "
				." anamune.NENGOU, "
				." anamune.NEN, "
				." anamune.GETU, "
				." anamune.HI, "
				." anamune.JI, "
				." anamune.BUN, "
				." anamune.KENSAKU_HIDUKE, "
				." anamune.SHUSO, "
				." anamune.KEIKA, "
				." anamune.KT, "
				." anamune.MYAKU, "
				." anamune.SEI_FUSEI, "
				." anamune.NYUUIN_KEIKEN, "
				." anamune.NYUUIN_KEIKEN_BIKOU, "
				." anamune.BP_K, "
				." anamune.BP_T, "
				." anamune.KUSURI, "
				." anamune.KUSURI_BIKOU, "
				." anamune.REKI, "
				." anamune.SHOUGAI1, "
				." anamune.SHOUGAI2, "
				." anamune.SHOUGAI3, "
				." anamune.SHOUGAI4, "
				." anamune.SHOUGAI1_BIKOU, "
				." anamune.SHOUGAI2_BIKOU, "
				." anamune.SHOUGAI3_BIKOU, "
				." anamune.SHOUGAI4_BIKOU, "
				." anamune.SHOKUYOKU, "
				." anamune.SHOKUYOKU_BIKOU, "
				." anamune.SAKE, "
				." anamune.SAKE_RYOU, "
				." anamune.SAKE_KAI, "
				." anamune.TABAKO, "
				." anamune.TABAKO_BIKOU, "
				." anamune.BEN1, "
				." anamune.BEN2, "
				." anamune.NYOU, "
				." anamune.SUIMIN, "
				." anamune.SUIMIN_BIKOU, "
				." anamune.ARERUGI, "
				." anamune.ARERUGI_BIKOU1, "
				." anamune.ARERUGI_BIKOU2, "
				." anamune.SHOUGAISHA_TECHOU, "
				." anamune.SHOUGAISHA_KYU, "
				." kj.SHIMEI1, "
				." kj.SHIMEI2, "
				." kj.FURIGANA1, "
				." kj.FURIGANA2, "
				." kj.SEINENGAPPI_NENGOU, "
				." kj.SEINENGAPPI_NEN, "
				." kj.SEINENGAPPI_GETU, "
				." kj.SEINENGAPPI_HI, "
				." kj.DENWA1, "
				." kj.DENWA2, "
				." kj.DENWA3, "
				." kj.SHIMEI2, "
				." kj.SHIMEI1, "
				." kj.SHIMEI2, "
				." FROM dtb_nyuuin_anamune as anamune "
				." LEFT JOIN dtb_kanjya as kj ON nsh.KANJYA_ID = kj.KANJYA_ID "
				." 		AND kj.SAKUJYO_FURAGU = 0 AND kj.KANJYA_ID = '"   .$kanjyaID."'"
				." WHERE nsh.KANJYA_ID = '"   .$kanjyaID."'"
				." AND   nsh.KENSAKU_HIDUKE = '"   .$hiduke."'"
				." AND   nsh.SAKUJYO_FURAGU = 0";

		$result = mysql_query($query);

		return $result;
	}
	catch(Exception $ex)
	{
		throw $ex;
	}
}
?>