<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seikyusyo  
{
	public $workbook;
	
	function __construct()
	{
		// PHPExcel libraries have to be in your include path !
		require_once('PHPExcel.php');
		require_once('PHPExcel/IOFactory.php');
	}
	
	function send($post, $seikyumeisai, $gokei, $file_name)
	{
		//So far so good, now let's create the writer
		$xl = new PHPExcel();

		$xl->setActiveSheetIndex(0);
		$sheet = $xl->getActiveSheet();
		$sheet->setTitle('フォーム');

		//(4)列の幅の設定
		$sheet->getColumnDimension('A')->setWidth(6.5);
		$sheet->getColumnDimension('B')->setWidth(4.2);
		$sheet->getColumnDimension('C')->setWidth(22);
		$sheet->getColumnDimension('D')->setWidth(22);
		$sheet->getColumnDimension('E')->setWidth(5.5);
		$sheet->getColumnDimension('F')->setWidth(5.5);
		$sheet->getColumnDimension('G')->setWidth(5.5);
		$sheet->getColumnDimension('H')->setWidth(11);
		$sheet->getColumnDimension('I')->setWidth(11);
		$sheet->getColumnDimension('J')->setWidth(11);
		$sheet->getColumnDimension('K')->setWidth(15.3);
		$sheet->getColumnDimension('L')->setWidth(11);
		$sheet->getColumnDimension('M')->setWidth(12);
		$sheet->getColumnDimension('N')->setWidth(15.7);
		
		$sheet->getRowDimension('1')->setRowHeight(28);
		$sheet->getRowDimension('2')->setRowHeight(17.25);
		$sheet->getRowDimension('3')->setRowHeight(17.25);
		$sheet->getRowDimension('4')->setRowHeight(17.25);
		$sheet->getRowDimension('5')->setRowHeight(17.25);
		$sheet->getRowDimension('6')->setRowHeight(17.25);
		$sheet->getRowDimension('7')->setRowHeight(17.25);
		$sheet->getRowDimension('8')->setRowHeight(17.25);
		$sheet->getRowDimension('9')->setRowHeight(17.25);
		$sheet->getRowDimension('10')->setRowHeight(5);
		$sheet->getRowDimension('11')->setRowHeight(17.25);
		$sheet->getRowDimension('12')->setRowHeight(17.25);
		$sheet->getRowDimension('13')->setRowHeight(17.25);
		$sheet->getRowDimension('14')->setRowHeight(28);
		$sheet->getRowDimension('15')->setRowHeight(17.25);
		
		//(5)Styleの設定
		$sheet->getDefaultStyle()->getFont()->setName('ＭＳ Ｐゴシック');
		$sheet->getDefaultStyle()->getFont()->setSize(11);
		
		$sheet->mergeCells('A1:D1');
		$sheet->mergeCells('A3:D3');
		$sheet->mergeCells('E2:K5');
		$sheet->mergeCells('L4:N4');
		$sheet->mergeCells('L6:N6');
		$sheet->mergeCells('L7:N7');
		$sheet->mergeCells('A7:D7');
		$sheet->mergeCells('A8:D8');
		$sheet->mergeCells('F6:G6');
		$sheet->mergeCells('F7:G7');
		$sheet->mergeCells('F8:G8');
		$sheet->mergeCells('I7:J7');
		$sheet->mergeCells('I8:J8');
		$sheet->mergeCells('F11:G11');
		$sheet->mergeCells('F12:G12');
		$sheet->mergeCells('F13:G13');
		$sheet->mergeCells('H11:K11');
		$sheet->mergeCells('H12:K12');
		$sheet->mergeCells('H13:K13');
		
		//Right,Left
		for ($i = 2; $i < 10; $i++)
		{
			$sheet->getStyle('K' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('E' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		}
		for ($i = 1; $i < 17; $i++)
		{
			$sheet->getStyle('N' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('A' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		}
		
		$sheet->getStyle('A16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('B16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('C16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('F16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('L16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('M16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('N16')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('N16')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		//Top
		$sheet->getStyle('E2')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('F2')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G2')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H2')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I2')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J2')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K2')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		$sheet->getStyle('A1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('B1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('C1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('F1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('L1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('M1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('N1')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		//Bottom
		$sheet->getStyle('E9')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('F9')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G9')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H9')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I9')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J9')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K9')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		$sheet->getStyle('A15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('B15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('C15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('F15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('L15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('M15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('N15')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		$sheet->getStyle('A16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('B16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('C16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('F16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('L16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('M16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('N16')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		//タイトルの設定
		$sheet->setCellValue('A1', $post['seikyusaki_name'].'  御中');
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$sheet->setCellValue('A3', $post['seikyusaki_jyusyo']);
		$sheet->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$sheet->setCellValue('E2', '請求金額　　　　'.number_format($post['seikyu_kingaku']).'円');
		$sheet->getStyle('E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('E2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->getStyle('E2')->getFont()->setSize(20);
		$sheet->getStyle('E2')->getFont()->setBold(true);
		$sheet->setCellValue('L4', '有限会社アカウントエクスプレス');
		$sheet->getStyle('L4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('L6', '東京都港区港南３－４－８－３１５');
		$sheet->getStyle('L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('L7', 'ＴＥＬ：03-5461-3855');
		$sheet->getStyle('L7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('A7', '＊毎々格別のご高配を賜り誠に有難うございます。');
		$sheet->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$sheet->setCellValue('A8', '　右記の通り御請求申し上げます。');
		$sheet->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$sheet->setCellValue('F6', '【内訳】');
		$sheet->getStyle('F6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('F7', '課税対象額：');
		$sheet->getStyle('F7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('F8', '消費税：');
		$sheet->getStyle('F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('I7', '非課税対象額（高速料）：');
		$sheet->getStyle('I7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('I8', '非課税対象額（駐車料）：');
		$sheet->getStyle('I8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('F11', '請求期間：');
		$sheet->getStyle('F11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('F12', '御支払方法：');
		$sheet->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('F13', '振込先：');
		$sheet->getStyle('F13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

		$sheet->setCellValue('H7', '￥'.number_format($post['kazei']));
		$sheet->getStyle('H7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('H8', '￥'.number_format($post['syohizei']));
		$sheet->getStyle('H8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('K7', '￥'.number_format($post['hikazei_kosouku']));
		$sheet->getStyle('K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('K8', '￥'.number_format($post['hikazei_cyusya']));
		$sheet->getStyle('K8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue('H11', $post['seikyu_from'].'～'.$post['seikyu_to']);
		$sheet->getStyle('H11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		if($post['sihara_kubun'] == 0)
		{
			$sheet->setCellValue('H12', '振込');
		}
		else
		{
			$sheet->setCellValue('H12', '');
		}
		$sheet->getStyle('H12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		if($post['furikomisaki'] == 0)
		{
			$sheet->setCellValue('H13', '○○銀行○○支店　口座番号xxxxxxxx');
		}
		else
		{
			$sheet->setCellValue('H13', '△△銀行△△支店　口座番号xxxxxxxx');
		}
		$sheet->getStyle('H13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		//明細の設定
		$sheet->setCellValue('A16', '日付');
		$sheet->getStyle('A16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('B16', '区分');
		$sheet->getStyle('B16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('C16', '集荷先');
		$sheet->getStyle('C16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('D16', '配達先');
		$sheet->getStyle('D16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('E16', '個数');
		$sheet->getStyle('E16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('F16', '重量');
		$sheet->getStyle('F16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('G16', '距離');
		$sheet->getStyle('G16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('H16', '基本料金');
		$sheet->getStyle('H16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('I16', '高速料');
		$sheet->getStyle('I16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('J16', '駐車料');
		$sheet->getStyle('J16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('K16', 'その他作業');
		$sheet->getStyle('K16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('L16', '作業費');
		$sheet->getStyle('L16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('M16', '小計');
		$sheet->getStyle('M16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('N16', '備考');
		$sheet->getStyle('N16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$i = 17;
		$kihon_gokei = 0;
		$kousoku_gokei = 0;
		$cyusya_kane_gokei = 0;
		$futai_kane_gokei = 0;
		$gokei = 0;
		foreach($seikyumeisai as $seikyu)
		{
			$sheet->getRowDimension($i)->setRowHeight(20);
			$sheet->setCellValue('A' . $i, $seikyu['recv_date']);
			$sheet->getStyle('A' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('A' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('A' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			switch($seikyu['kubun'])
			{
				case 1:
					$sheet->setCellValue('B' . $i, 'D/L');
					break;
				case 2:
					$sheet->setCellValue('B' . $i, 'P/U');
					break;
				case 3:
					$sheet->setCellValue('B' . $i, '作業');
					break;
				case 4:
					$sheet->setCellValue('B' . $i, '助手');
					break;
				default:
					$sheet->setCellValue('B' . $i, '');
					break;
			}
			$sheet->getStyle('B' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('B' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('B' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->setCellValue('C' . $i, $seikyu['ka_add1'].$seikyu['ka_add2'].$seikyu['ka_add2']);
			$sheet->getStyle('C' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('C' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('C' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->setCellValue('D' . $i, $seikyu['todoke_add1'].$seikyu['todoke_add2'].$seikyu['todoke_add3']);
			$sheet->getStyle('D' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('D' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('D' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->setCellValue('E' . $i, $seikyu['kosuu']);
			$sheet->getStyle('E' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('E' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('E' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->setCellValue('F' . $i, $seikyu['jyuryo']);
			$sheet->getStyle('F' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('F' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('F' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->setCellValue('G' . $i, $seikyu['kyori']);
			$sheet->getStyle('G' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('G' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('G' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->setCellValue('H' . $i, number_format($seikyu['kihon']));
			$kihon_gokei = $kihon_gokei + $seikyu['kihon'];
			$sheet->getStyle('H' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('H' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->setCellValue('I' . $i, number_format($seikyu['kousoku']));
			$kousoku_gokei = $kousoku_gokei + $seikyu['kousoku'];
			$sheet->getStyle('I' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('I' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('I' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->setCellValue('J' . $i, number_format($seikyu['cyusya_kane']));
			$cyusya_kane_gokei = $cyusya_kane_gokei + $seikyu['cyusya_kane'];
			$sheet->getStyle('J' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('J' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$temp = split(',',$seikyu['futai_sagyo']);
			$fs = '';
			for($j=0; $j<count($temp); $j++){
				switch($temp[$j])
				{
					case 1:
						$fs = $fs.'解梱'.'　';
						break;
					case 2:
						$fs = $fs.'同時引取'.'　';
						break;
					case 3:
						$fs = $fs.'残引'.'　';
						break;
					case 4:
						$fs = $fs.'作業'.'　';
						break;
					case 5:
						$fs = $fs.$seikyu['sonota'].'　';
						break;
					default:
						$fs = $fs. '';
						break;
				}
			}
			$sheet->setCellValue('K' . $i, $fs);
			$sheet->getStyle('K' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('K' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('K' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->setCellValue('L' . $i, number_format($seikyu['futai_kane']));
			$futai_kane_gokei = $futai_kane_gokei + $seikyu['futai_kane'];
			$sheet->getStyle('L' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('L' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('L' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->setCellValue('M' . $i, number_format($seikyu['kihon']+$seikyu['kousoku']+$seikyu['cyusya_kane']+$seikyu['futai_kane']));
			$sheet->getStyle('M' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('M' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('M' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->setCellValue('N' . $i, $seikyu['bikou']);
			$sheet->getStyle('N' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('N' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->getStyle('N' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('N' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$i = $i + 1;
		}
		$gokei = $kihon_gokei+$kousoku_gokei+$cyusya_kane_gokei+$futai_kane_gokei;
		$sheet->getStyle('A' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('B' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('C' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('F' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('L' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('M' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('N' . $i)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		$sheet->getStyle('A' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('B' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('C' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('F' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('L' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('M' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('N' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		$sheet->getStyle('A' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('B' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('C' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('F' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('L' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('M' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('N' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('N' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				
		$sheet->setCellValue('D' . $i, '明細合計');
		$sheet->setCellValue('H' . $i, number_format($kihon_gokei));
		$sheet->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('H' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('I' . $i, number_format($kousoku_gokei));
		$sheet->getStyle('I' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('I' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);	
		$sheet->setCellValue('J' . $i, number_format($cyusya_kane_gokei));
		$sheet->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('J' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('L' . $i, number_format($futai_kane_gokei));
		$sheet->getStyle('L' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('L' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('M' . $i, number_format($gokei));
		$sheet->getStyle('M' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('M' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
		$xl->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$xl->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$xl->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
		$xl->getActiveSheet()->getPageSetup()->setVerticalCentered(false);
		
		$writer = PHPExcel_IOFactory::createWriter($xl, 'Excel5');
		$writer->save("seikyusyo/" . $file_name);
	}
} 

?>