<?php

$path = ini_get("include_path");
$path .= ":";
$path .= "../ZendFramework/library";
ini_set("include_path",$path);

function getNengouStr($nengou)
  {
	$nengouStr = "";
	//年号変換
	switch ($nengou)
	{
		case 1:
		  $nengouStr = "明治";
		  break;
		case 2:
		  $nengouStr = "大正";
		  break;
		case 3:
		  $nengouStr = "昭和";
		  break;
		case 4:
		  $nengouStr = "平成";
		  break;
		default:
		  $nengouStr = "不明";
	}

	return $nengouStr;
  }

  	function Week($week)
	{
		switch($week)
		{
			case 0:
				$yobi = '日';
				break;
			case 1:
				$yobi = '月';
				break;
			case 2:
				$yobi = '火';
				break;
			case 3:
				$yobi = '水';
				break;
			case 4:
				$yobi = '木';
				break;
			case 5:
				$yobi = '金';
				break;
			case 6:
				$yobi = '土';
				break;
		}
		return $yobi;
	}
function splitStrToArray($str,$x,$y,$lenth)
  {
  	  $str = str_replace("\r\n","",$str);
  	  $arrayCount = floor(strlen($str)/$lenth);
  	  $arrayStr = array();

  	for ($i=0; $i<=$arrayCount; $i++)
  	{
		$arrayStr[$i] = array($x,$y-$i*15,mb_substr($str,$i*$lenth,$lenth,'UTF-8'));
  	}
  	  return $arrayStr;
  }

function seinengappi($nengou, $nen, $getu, $hi)
{
	$now = date('Ymd');
	//$birthday = "19810817";

	$birthday = warekiToYear(getNengouStr($nengou).$nen."年".$getu."月".$hi."日", 'UTF-8');
	//return $birthday;
	return (int)(($now - $birthday)/10000);
}

/**
* warekiToYear('平成23年10月24日', 'UTF-8')
* warekiToYear('H23年10月24日', 'UTF-8')
* warekiToYear('H23-10-24.', 'UTF-8')
* warekiToYear('H23.10.24.', 'UTF-8')
* 和暦年月日を西暦年月日に変換する *
* @param string $strYmd 西暦の年月日
* @param string $encoding 文字エンコーディング
* @return string 西暦年月日(OK) / NULL(NG)
* @exception Exception
* @cation 年号、年、月、日の順になっている必要がある */
function warekiToYear($strYmd, $encoding = NULL){
	try {
		$judgeNengos = array(
			'明治' => array('nengo' => '明治', 'start' => '1868-09-08', 'end' => '1912-07-29', 'baseYear' => 1867),
			'大正' => array('nengo' => '大正', 'start' => '1912-07-30', 'end' => '1926-12-24', 'baseYear' => 1911),
			'昭和' => array('nengo' => '昭和', 'start' => '1926-12-25', 'end' => '1989-01-07', 'baseYear' => 1925),
			'平成' => array('nengo' => '平成', 'start' => '1989-01-08', 'end' => '9999-12-31', 'baseYear' => 1988));        				        $judgeNengos['m'] =& $judgeNengos['明治'];
		$judgeNengos['t'] =& $judgeNengos['大正'];
		$judgeNengos['s'] =& $judgeNengos['昭和'];
		$judgeNengos['h'] =& $judgeNengos['平成'];

		// エンコーディング指定なし
		if ($encoding === NULL) {
			// 内部エンコーディングを使用
			$encoding = mb_internal_encoding();
		}

		// 元年を1年に変換
		$strYmd = str_replace('元', '1', $strYmd);

		// 空白文字類を半角スペースに変換
		$strYmd = preg_replace('/\s/is', ' ', $strYmd);
		if ($strYmd === FALSE) {
			throw new Exception('空白文字類の置換に失敗しました。');
		}

		// a：「全角」英数字を「半角」に変換
		// s：「全角」スペースを「半角」に変換
		$strYmd = mb_convert_kana($strYmd, 'as', $encoding);

		// 大文字を小文字に変換
		$strYmd = strtolower($strYmd);
		// 年号部分が存在しない場合
		$matches = NULL;

		if (! preg_match('/明治|大正|昭和|平成|m|t|s|h/is', $strYmd, $matches)) {
			throw new Exception('未定義の年号です。');
		}

		// 年号
		$nengo = $matches[0];
		if (! array_key_exists($nengo, $judgeNengos)) {
			throw new Exception('不正な年号です。');
		}

		// 年号部分を削除
		$strYmd = str_replace($nengo, '', $strYmd);

		// 数字以外を半角スペースに変換
		$strYmd = preg_replace('/[^\d]+/', ' ', $strYmd);
		if ($strYmd === FALSE) {
			throw new Exception('数字以外の置換に失敗しました。');
		}

		list($wareki, $month, $day) = sscanf($strYmd, '%s %s %s');

		// 2桁0埋め
		$month = sprintf('%02d', $month);
		$day = sprintf('%02d', $day);
		if (! preg_match('/\d{1,2}/', $wareki)) {
			throw new Exception('不正な和歴です。');
		}

		if ($wareki <= 0) {
			throw new Exception('年は1以上を指定してください。');
		}
		$judgeNengo = $judgeNengos[$nengo];

		// 西暦変換
		$year = $wareki + $judgeNengo['baseYear'];
		$ymd = "$year-$month-$day";
		$bMatch = FALSE;

		foreach ($judgeNengos as $nengos) {
			if ($nengos['start'] <= $ymd && $ymd <= $nengos['end']) {
				$bMatch = TRUE;
				break;
			}
		}
		if (! $bMatch) {
			throw new Exception('範囲外の年月日です。');
		}

		// 日付の妥当性を検証
		if (! checkdate($month, $day, $year)) {
			throw new Exception('不正な年月日です。');
		}

		//return $ymd;
		return $year.$month.$day;
	} catch (Exception $e) {
		// 例外メッセージを出力
		return $e->getMessage();
	}
}

/**
 * 全角、半角混在の長さ取得
*/
function GetStrLen($str, $encode='UTF-8') {
	$len = 0;
	$count = mb_strwidth($str, $encode);
	for ($i=0; $i<$count; $i++) {
		$s = substr($str, $i, 1);
		$l = strlen(bin2hex($s)) / 2;
		if ($l==1) {
			$len++;
		}
		else {
			$len = $len + 2;
		}
	}
	return $len;
}

/**
* 年号、年、月と日の組合
*/
function GetNengappiKumiai($nengou, $nen, $getu, $hi)
{
	$ngp = getNengouStr($nengou).$nen."年".$getu."月".$hi."日";

	return $ngp;
}

?>