<?php
/*$path = ini_get("include_path");
$path .= ":";
$path .= "../ZendFramework/library";
ini_set("include_path",$path);
*/
// include auto-loader class
require_once 'BasicFunctions.php';
require_once 'SqlFunctions.php';
require_once 'Zend/Loader/Autoloader.php';
require_once 'Zend/Pdf/Image.php';

$mission_id = $_REQUEST['missionID'];

try {
	$result = GetMissionInfo($mission_id);

	$loader = Zend_Loader_Autoloader::getInstance();
	// create PDF
	$pdf = Zend_Pdf::load('../PDFSample/denpyou.pdf');
	$page = $pdf->pages[0];

	// define font resource
	$font = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA);
	// set font for page
	$fontJa = Zend_Pdf_Font::fontWithPath('../font/msmincho.ttf');

	$sagyou1 = "";
	$sagyou2 = "";
	$from_id = "";
	$fileName = "";
	$overDate = "";

	IF($row = mysql_fetch_array($result)){
		$sagyou1 = $row['mission_id'];
		$sagyou2 = $row['mission_id2'];
		$from_id = $row['from_id'];
		$fileName = $row['fileover'];
		$overDate = $row['over_date'];
	}

	$sagyou = GetSagyouInfo($sagyou1, $sagyou2, $from_id);

	IF($row = mysql_fetch_array($sagyou)){
		// write text to page
		//任務ID
		$page->setFont($fontJa, 11);

		IF($row['sagyo_id1'] != null && $row['sagyo_id2'] != null)
		{
			$page->drawText($row['sagyo_id1']."-".$row['sagyo_id2'], 360, 772, 'UTF-8');
		}

		$year = substr($row['sagyo_date'],0,4);

		$month = substr($row['sagyo_date'],5,2);

		$day = substr($row['sagyo_date'],8,2);

		$year = $year - 1988;

		//出荷日
		IF($row['sagyo_date'] != null)
		{
			$page->drawText('平成'.$year.'年'.$month.'月'.$day.'日', 90, 772, 'UTF-8');
		}

		//運賃
		//$page->drawText("　　元払　　着払　　代引　　", 402, 715, 'UTF-8');

		//荷送人
		IF($row['ka_tel'] != null)
		{
			$page->drawText($row['ka_tel'], 350, 753, 'UTF-8');
		}

		IF($row['ka_post'] != null)
		{
			$page->drawText("〒".$row['ka_post'], 350, 736, 'UTF-8');
		}

		IF($row['ka_add1'] != null)
		{
			$page->drawText($row['ka_add1'], 320, 722, 'UTF-8');
		}
		IF($row['ka_add2'] != null)
		{
			$page->drawText(str_replace(',','',$row['ka_add2']), 320, 708, 'UTF-8');
		}
		IF($row['ka_add3'] != null)
		{
			$page->drawText($row['ka_add3'], 320, 694, 'UTF-8');
		}
		IF($row['ka_name1'] != null)
		{
			$page->drawText($row['ka_name1'], 320, 655, 'UTF-8');
		}
		IF($row['ka_name2'] != null)
		{
			$page->drawText($row['ka_name2']."　様", 320, 641, 'UTF-8');
		}
		//出荷日
		/*
		IF($row['sagyo_date'] != null)
		{
			$page->drawText('平成'.$year.'年'.$month.'月'.$day.'日', 138, 525, 'UTF-8');
		}
		*/
		//届け先
		IF($row['todoke_tel'] != null)
		{
			$page->drawText($row['todoke_tel'], 85, 753, 'UTF-8');
		}
		IF($row['todoke_post'] != null)
		{
			$page->drawText("〒".$row['todoke_post'], 85, 736, 'UTF-8');
		}
		IF($row['todoke_add1'] != null)
		{
			$page->drawText($row['todoke_add1'], 60, 722, 'UTF-8');
		}
		IF($row['todoke_add2'] != null)
		{
			$page->drawText(str_replace(',','',$row['todoke_add2']), 60, 708, 'UTF-8');
		}
		IF($row['todoke_add3'] != null)
		{
			$page->drawText($row['todoke_add3'], 60, 694, 'UTF-8');
		}
		IF($row['todoke_name1'] != null)
		{
			$page->drawText($row['todoke_name1'], 60, 655, 'UTF-8');
		}
		IF($row['todoke_name2'] != null)
		{
			$page->drawText($row['todoke_name2']."　様", 60, 641, 'UTF-8');
		}
		//品名
		IF($row['hinmei'] != null)
		{
			$page->drawText($row['hinmei'], 320, 623, 'UTF-8');
		}
		//保険
		IF($row['hoken'] != null)
		{
			$page->drawText("\\".number_format($row['hoken']), 490, 623, 'UTF-8');
		}
		//数量
		IF($row['kosuu'] != null)
		{
			$page->drawText($row['kosuu']."個", 310, 535, 'UTF-8');
		}
		//重量
		IF($row['jyuryo'] != null)
		{
			$page->drawText($row['jyuryo']."KG", 385, 535, 'UTF-8');
		}
		//荷
		IF($row['ka'] != null)
		{
			$page->drawText($row['ka'], 300, 590, 'UTF-8');
		}
		//配達指示
		IF($row['siji'] != null)
		{
			$page->drawText($row['siji'], 360, 590, 'UTF-8');
		}
		$week = date('w', strtotime($row['hiccyaku1']));

		$hiccyaku = substr($row['hiccyaku1'], 5, 2).'月'.substr($row['hiccyaku1'], 8, 2).'日';

		if(substr($row['sagyo_time'], 0, 2) == '00' && substr($row['sagyo_time'], 3, 2) == '00')
		{
			$hiccyaku = $hiccyaku.'('.Week($week).')';
		}
		else
		{
			$hiccyaku = $hiccyaku.'('.Week($week).')'.' '.substr($row['sagyo_time'], 0, 5);
		}
		//記事欄
		IF($hiccyaku != null)
		{
			$page->drawText($hiccyaku." 必着", 30, 605, 'UTF-8');
		}
		//特記事項
		IF($row['tokki'] != null)
		{
			$arr = explode("\n", $row['tokki']);

			FOR($i = 0; $i < count($arr); $i++)
			{
				$page->drawText($arr[$i], 30, 575 - $i *16, 'UTF-8');
			}

			//$page->drawText($row['tokki'], 30, 195, 'UTF-8');
		}

		$temp = "";

		if($overDate != null && $overDate != "")
		{
			$temp = substr($overDate, 0, 4)."年".substr($overDate, 5, 2)."月".substr($overDate, 8, 2)."日　".substr($overDate, 11, 2)."時".substr($overDate, 14, 2)."分";
			$page->drawText($temp, 433, 605, 'UTF-8');
			$page->drawText("上記貨物確かに受領しました。", 433, 593, 'UTF-8');
		}

		if($fileName != null && $fileName != "")
		{
			// insert picture
			$image = Zend_Pdf_Image::imageWithPath('../uploads/'.$fileName);

			$page->drawImage($image, 433, 528, 573, 590);
		}

		//$image = Zend_Pdf_Image::imageWithPath($image);

		//$page->drawImage($image, 200, 200, 0, 0);

	}

	$pdf->save('../pdf/jyuryousho.pdf');
	header('Content-type: application/pdf');
	//header('filename=pdf');
	readfile('../pdf/jyuryousho.pdf');

	//echo 'SUCCESS: Document saved!';

} catch (Zend_Pdf_Exception $e) {
  die ('ERR PDF: ' . $e->getMessage());
} catch (Exception $e) {
  die ('ERR APP: ' . $e->getMessage());
}
?>