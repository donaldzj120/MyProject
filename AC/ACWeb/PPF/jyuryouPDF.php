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
	$pdf = Zend_Pdf::load('../PDFSample/jyuryousho.pdf');
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
		$page->setFont($fontJa, 13);

		IF($row['sagyo_id1'] != null && $row['sagyo_id2'] != null)
		{
			$page->drawText($row['sagyo_id1']."-".$row['sagyo_id2'], 138, 742, 'UTF-8');
		}

		$year = substr($row['sagyo_date'],0,4);

		$month = substr($row['sagyo_date'],5,2);

		$day = substr($row['sagyo_date'],8,2);

		$year = $year - 1988;

		//出荷日
		IF($row['sagyo_date'] != null)
		{
			$page->drawText('平成'.$year.'年'.$month.'月'.$day.'日', 138, 715, 'UTF-8');
		}

		//運賃
		$page->drawText("　　元払　　着払　　代引　　", 402, 715, 'UTF-8');

		//荷送人
		IF($row['ka_tel'] != null)
		{
			$page->drawText($row['ka_tel'], 180, 688, 'UTF-8');
		}

		IF($row['ka_post'] != null)
		{
			$page->drawText("〒".$row['ka_post'], 180, 674, 'UTF-8');
		}

		IF($row['ka_add1'] != null)
		{
			$page->drawText($row['ka_add1'], 138, 660, 'UTF-8');
		}
		IF($row['ka_add2'] != null)
		{
			$page->drawText(str_replace(',','',$row['ka_add2']), 138, 640, 'UTF-8');
		}
		IF($row['ka_add3'] != null)
		{
			$page->drawText($row['ka_add3'], 138, 620, 'UTF-8');
		}
		IF($row['ka_name1'] != null)
		{
			$page->drawText($row['ka_name1']." ".$row['ka_name2'], 138, 565, 'UTF-8');
		}
		//出荷日
		IF($row['sagyo_date'] != null)
		{
			$page->drawText('平成'.$year.'年'.$month.'月'.$day.'日', 138, 525, 'UTF-8');
		}
		//届け先
		IF($row['todoke_tel'] != null)
		{
			$page->drawText($row['todoke_tel'], 180, 499, 'UTF-8');
		}
		IF($row['todoke_post'] != null)
		{
			$page->drawText("〒".$row['todoke_post'], 180, 485, 'UTF-8');
		}
		IF($row['todoke_add1'] != null)
		{
			$page->drawText($row['todoke_add1'], 138, 470, 'UTF-8');
		}
		IF($row['todoke_add2'] != null)
		{
			$page->drawText(str_replace(',','',$row['todoke_add2']), 138, 450, 'UTF-8');
		}
		IF($row['todoke_add3'] != null)
		{
			$page->drawText($row['todoke_add3'], 138, 430, 'UTF-8');
		}
		IF($row['todoke_name1'] != null)
		{
			$page->drawText($row['todoke_name1']." ".$row['todoke_name2'], 138, 375, 'UTF-8');
		}
		//品名
		IF($row['hinmei'] != null)
		{
			$page->drawText($row['hinmei'], 138, 336, 'UTF-8');
		}
		//保険
		IF($row['hoken'] != null)
		{
			$page->drawText("\\".number_format($row['hoken']), 425, 336, 'UTF-8');
		}
		//数量
		IF($row['kosuu'] != null)
		{
			$page->drawText($row['kosuu']."個", 138, 307, 'UTF-8');
		}
		//重量
		IF($row['jyuryo'] != null)
		{
			$page->drawText($row['jyuryo']."KG", 380, 307, 'UTF-8');
		}
		//荷
		IF($row['ka'] != null)
		{
			$page->drawText($row['ka'], 138, 280, 'UTF-8');
		}
		//配達指示
		IF($row['siji'] != null)
		{
			$page->drawText($row['siji'], 138, 255, 'UTF-8');
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
		//特記事項
		IF($hiccyaku != null)
		{
			$page->drawText($hiccyaku." 必着", 138, 227, 'UTF-8');
		}
		//特記事項
		IF($row['tokki'] != null)
		{
			$arr = explode("\n", $row['tokki']);

			FOR($i = 0; $i < count($arr); $i++)
			{
				$page->drawText($arr[$i], 30, 195 - $i *16, 'UTF-8');
			}

			//$page->drawText($row['tokki'], 30, 195, 'UTF-8');
		}

		$temp = "";

		if($overDate != null && $overDate != "")
		{
			$temp = substr($overDate, 0, 4)."年".substr($overDate, 5, 2)."月".substr($overDate, 8, 2)."日　".substr($overDate, 11, 2)."時".substr($overDate, 14, 2)."分";
			$page->drawText($temp, 405, 185, 'UTF-8');
		}

		if($fileName != null && $fileName != "")
		{
			// insert picture
			$image = Zend_Pdf_Image::imageWithPath('../uploads/'.$fileName);

			$page->drawImage($image, 380, 80, 560, 155);
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