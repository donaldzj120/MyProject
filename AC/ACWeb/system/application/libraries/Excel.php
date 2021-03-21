<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel  
{
	public $workbook;
	
	function __construct()
	{
		// PHPExcel libraries have to be in your include path !
		require_once('PHPExcel.php');
		require_once('PHPExcel/IOFactory.php');
	}
	
	function send($sagyo_list, $file_name, $year, $day)
	{
		//So far so good, now let's create the writer

		$xl = new PHPExcel();

		$xl->setActiveSheetIndex(0);
		$sheet = $xl->getActiveSheet();
		$sheet->setTitle($day.'日');

		//(4)列の幅の設定
		$sheet->getColumnDimension('A')->setWidth(3.13);
		$sheet->getColumnDimension('B')->setWidth(18.13);
		$sheet->getColumnDimension('C')->setWidth(17.50);
		$sheet->getColumnDimension('D')->setWidth(2.5);
		$sheet->getColumnDimension('E')->setWidth(2.5);
		$sheet->getColumnDimension('F')->setWidth(5.63);
		$sheet->getColumnDimension('G')->setWidth(4);
		$sheet->getColumnDimension('H')->setWidth(10.63);
		$sheet->getColumnDimension('I')->setWidth(22.88);
		$sheet->getColumnDimension('J')->setWidth(10.63);
		$sheet->getColumnDimension('K')->setWidth(8.38);
		$sheet->getColumnDimension('L')->setWidth(8.38);
		$sheet->getColumnDimension('M')->setWidth(8.38);
		
		$sheet->getRowDimension('1')->setRowHeight(18.75);
		$sheet->getRowDimension('2')->setRowHeight(7.5);
		$sheet->getRowDimension('3')->setRowHeight(15);
		$sheet->getRowDimension('4')->setRowHeight(8.25);
		$sheet->getRowDimension('5')->setRowHeight(8.25);
		$sheet->getRowDimension('6')->setRowHeight(15);
		$sheet->getRowDimension('7')->setRowHeight(24.75);
		$sheet->getRowDimension('8')->setRowHeight(24.75);
		$sheet->getRowDimension('9')->setRowHeight(24.75);
		$sheet->getRowDimension('10')->setRowHeight(24.75);
		$sheet->getRowDimension('11')->setRowHeight(24.75);
		$sheet->getRowDimension('12')->setRowHeight(24.75);
		$sheet->getRowDimension('13')->setRowHeight(24.75);
		$sheet->getRowDimension('14')->setRowHeight(24.75);
		$sheet->getRowDimension('15')->setRowHeight(24.75);
		$sheet->getRowDimension('16')->setRowHeight(24.75);
		$sheet->getRowDimension('17')->setRowHeight(24.75);
		$sheet->getRowDimension('18')->setRowHeight(24.75);
		$sheet->getRowDimension('19')->setRowHeight(24.75);
		$sheet->getRowDimension('20')->setRowHeight(24.75);
		$sheet->getRowDimension('21')->setRowHeight(24.75);
		$sheet->getRowDimension('22')->setRowHeight(24.75);
		$sheet->getRowDimension('23')->setRowHeight(24.75);
		$sheet->getRowDimension('24')->setRowHeight(24.75);
		
		//(5)Styleの設定
		$sheet->getDefaultStyle()->getFont()->setName('ＭＳ Ｐゴシック');
		$sheet->getDefaultStyle()->getFont()->setSize(11);
		
		$sheet->mergeCells('A1:B1');
		$sheet->mergeCells('C1:H1');
		$sheet->mergeCells('L1:M1');
		$sheet->mergeCells('A3:A6');
		$sheet->mergeCells('B3:B4');
		$sheet->mergeCells('B5:B6');
		$sheet->mergeCells('C3:C4');
		$sheet->mergeCells('C5:C6');
		$sheet->mergeCells('D3:E3');
		$sheet->mergeCells('D4:E5');
		$sheet->mergeCells('D6:E6');
		$sheet->mergeCells('F3:F4');
		$sheet->mergeCells('F5:F6');
		$sheet->mergeCells('G3:G4');
		$sheet->mergeCells('G5:G6');
		$sheet->mergeCells('H3:H4');
		$sheet->mergeCells('H5:H6');
		$sheet->mergeCells('I3:I4');
		$sheet->mergeCells('I5:I6');
		$sheet->mergeCells('J3:J4');
		$sheet->mergeCells('J5:J6');
		$sheet->mergeCells('K3:K4');
		$sheet->mergeCells('K5:K6');
		$sheet->mergeCells('L3:M4');
		$sheet->mergeCells('L5:M6');
		$sheet->mergeCells('L7:M8');
		$sheet->mergeCells('L9:M10');
		$sheet->mergeCells('L11:M12');
		$sheet->mergeCells('L13:M14');
		$sheet->mergeCells('L15:M16');
		$sheet->mergeCells('L17:M18');
		$sheet->mergeCells('L19:M20');
		$sheet->mergeCells('L21:M22');
		$sheet->mergeCells('L23:M24');
		$sheet->mergeCells('A23:G24');
		$sheet->mergeCells('K23:K24');
		$sheet->mergeCells('A7:A8');
		$sheet->mergeCells('A9:A10');
		$sheet->mergeCells('A11:A12');
		$sheet->mergeCells('A13:A14');
		$sheet->mergeCells('A15:A16');
		$sheet->mergeCells('A17:A18');
		$sheet->mergeCells('A19:A20');
		$sheet->mergeCells('A21:A22');
		$sheet->mergeCells('K7:K8');
		$sheet->mergeCells('K9:K10');
		$sheet->mergeCells('K11:K12');
		$sheet->mergeCells('K13:K14');
		$sheet->mergeCells('K15:K16');
		$sheet->mergeCells('K17:K18');
		$sheet->mergeCells('K19:K20');
		$sheet->mergeCells('K21:K22');
		$sheet->mergeCells('D7:E7');
		$sheet->mergeCells('D9:E9');
		$sheet->mergeCells('D11:E11');
		$sheet->mergeCells('D13:E13');
		$sheet->mergeCells('D15:E15');
		$sheet->mergeCells('D17:E17');
		$sheet->mergeCells('D19:E19');
		$sheet->mergeCells('D21:E21');

		//Right
		for ($i = 3; $i < 23; $i++)
		{
			$sheet->getStyle('M' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('K' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('J' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('I' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('H' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('G' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('F' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('E' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('C' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('B' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('A' . $i)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('A' . $i)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		}
		$sheet->getStyle('A23')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('A24')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G23')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G24')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G23')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G24')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H23')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H24')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I23')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I24')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J23')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J24')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K23')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K24')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('M23')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('M24')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		//Bottom
		for ($i = 2; $i < 23; $i++)
		{
			$sheet->getStyle('B' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('C' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('F' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('H' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('I' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('J' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$sheet->getStyle('K' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			if ($i % 2 == 0)
			{
				$sheet->getStyle('A' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$sheet->getStyle('G' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$sheet->getStyle('L' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$sheet->getStyle('M' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			}
			if ($i > 6)
			{
				$sheet->getStyle('D' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$sheet->getStyle('E' . $i)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			}
		}
		$sheet->getStyle('D2')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E2')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D3')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E3')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D5')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E5')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D6')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E6')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H23')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I23')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J23')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('A24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('B24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('C24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('D24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('E24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('F24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('G24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('H24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('I24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('J24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('K24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('L24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$sheet->getStyle('M24')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

		//(6)タイトルの設定
		$sheet->setCellValue('A1', $year);
		$sheet->setCellValue('C1', '');
		$sheet->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('I1', '作業明細');
		$sheet->getStyle('I1')->getFont()->setBold(true);
		$sheet->getStyle('I1')->getFont()->setSize(15);
		
		$sheet->setCellValue('B3', '荷 受 人');
		$sheet->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('B3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('B5', '住　　所');
		$sheet->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('B5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('C3', '扱い営業所');
		$sheet->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('C5', 'ＫＷＥ原票Ｎｏ.');
		$sheet->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('C5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('D3', '時間');
		$sheet->getStyle('D3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('D3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('D4', '指定');
		$sheet->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('D4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('D6', '必着');
		$sheet->getStyle('D6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('D6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('F3', '個数');
		$sheet->getStyle('F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('F3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('F5', '重量');
		$sheet->getStyle('F5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('F5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('G3', '区分');
		$sheet->getStyle('G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('G3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('H3', '距　　離');
		$sheet->getStyle('H3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('H3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('H5', '距離運賃');
		$sheet->getStyle('H5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('H5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('I3', '付　帯　作　業');
		$sheet->getStyle('I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('I3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('I5', '付　帯　料　金');
		$sheet->getStyle('I5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('I5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('J3', '高 速');
		$sheet->getStyle('J3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('J3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('J5', '駐 車 料 金');
		$sheet->getStyle('J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('J5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('K3', '運賃合計');
		$sheet->getStyle('K3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('K3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('L3', '備　　考');
		$sheet->getStyle('L3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('L3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('A23', '備考');
		$sheet->getStyle('A23')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$sheet->getStyle('A23')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
		
		$i = 7;
		$sum_kousoku = 0;
		$sum_gokei = 0;
		$sum_kyori_kane = 0;
		$sum_futai_kane = 0;
		$sum_cyusya_kane = 0;
		foreach($sagyo_list as $sagyo)
		{
			$sheet->setCellValue('B' . $i, $sagyo['ka_name1'].$sagyo['ka_name2']);
			$sheet->getStyle('B' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('B' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('C' . $i, $sagyo['egyou']);
			$sheet->getStyle('C' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('C' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('D' . $i, substr($sagyo['jikan'], 0 ,5));
			$sheet->getStyle('D' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('F' . $i, $sagyo['kosuu']);
			$sheet->getStyle('F' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('F' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			switch($sagyo['kubun'])
			{
				case 1:
					$sheet->setCellValue('G' . $i, 'D/L');
					break;
				case 2:
					$sheet->setCellValue('G' . $i, 'P/U');
					break;
				case 3:
					$sheet->setCellValue('G' . $i, '作業');
					break;
				case 4:
					$sheet->setCellValue('G' . $i, '助手');
					break;
				default:
					$sheet->setCellValue('G' . $i, '');
					break;
			}
			//$sheet->setCellValue('G' . $i, $sagyo['kubun']);
			$sheet->getStyle('G' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('G' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('H' . $i, $sagyo['kyori'] . 'KM');
			$sheet->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('H' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$temp = split(',',$sagyo['futai_sagyo']);
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
						$fs = $fs.$sagyo['sonota'].'　';
						break;
					default:
						$fs = $fs. '';
						break;
				}
			}
			/*
			switch($sagyo['futai_sagyo'])
			{
				case 1:
					$sheet->setCellValue('I' . $i, '解梱');
					break;
				case 2:
					$sheet->setCellValue('I' . $i, '同時引取');
					break;
				case 3:
					$sheet->setCellValue('I' . $i, '残引');
					break;
				case 4:
					$sheet->setCellValue('I' . $i, '作業');
					break;
				case 5:
					$sheet->setCellValue('I' . $i, 'その他');
					break;
				default:
					$sheet->setCellValue('I' . $i, '');
					break;
			}*/
			$sheet->setCellValue('I' . $i, $fs);
			$sheet->getStyle('I' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('I' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('J' . $i, number_format($sagyo['kousoku']));
			$sheet->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('J' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('K' . $i, number_format($sagyo['gokei']));
			$sheet->getStyle('K' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('K' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('L' . $i, $sagyo['bikou']);
			$sheet->getStyle('L' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('L' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$i = $i + 1;
			$sheet->setCellValue('B' . $i, $sagyo['ka_add1'].$sagyo['ka_add2'].$sagyo['ka_add3']);
			$sheet->getStyle('B' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('B' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('C' . $i, $sagyo['sagyo_id1'].'-'.$sagyo['sagyo_id2']);
			$sheet->getStyle('C' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('C' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('D' . $i, '指');
			$sheet->getStyle('D' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('E' . $i, '必');
			$sheet->getStyle('E' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('E' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('F' . $i, $sagyo['jyuryo'] . 'KG');
			$sheet->getStyle('F' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('F' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('H' . $i, number_format($sagyo['kyori_kane']));
			$sheet->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('H' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('I' . $i, number_format($sagyo['futai_kane']));
			$sheet->getStyle('I' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('I' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$sheet->setCellValue('J' . $i, number_format($sagyo['cyusya_kane']));
			$sheet->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('J' . $i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$i = $i + 1;
			$sum_kousoku = $sum_kousoku + $sagyo['kousoku'];
			$sum_gokei = $sum_gokei + $sagyo['gokei'];
			$sum_kyori_kane = $sum_kyori_kane + $sagyo['kyori_kane'];
			$sum_futai_kane = $sum_futai_kane + $sagyo['futai_kane'];
			$sum_cyusya_kane = $sum_cyusya_kane + $sagyo['cyusya_kane'];
		}
		
		$sheet->setCellValue('H24', number_format($sum_kyori_kane));
		$sheet->getStyle('H24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('H24')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('I24', number_format($sum_futai_kane));
		$sheet->getStyle('I24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('I24')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('J23', number_format($sum_kousoku));
		$sheet->getStyle('J23')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('J23')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('J24', number_format($sum_cyusya_kane));
		$sheet->getStyle('J24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('J24')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$sheet->setCellValue('K23', number_format($sum_gokei));
		$sheet->getStyle('K23')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$sheet->getStyle('K23')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
		$xl->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$xl->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$xl->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
		$xl->getActiveSheet()->getPageSetup()->setVerticalCentered(false);

		$writer = PHPExcel_IOFactory::createWriter($xl, 'Excel5');
		$writer->save("excel/" . $file_name);
	}
} 

?>