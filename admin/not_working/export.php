<?php
require_once("../includes/connection.php");
require_once("../includes/functions.php");
require_once ('Classes/PHPExcel.php');

	date_default_timezone_set('GMT+1');
	$objPHPExcel = new PHPExcel();
	$export_set = get_all_registered();
	$entries = mysqli_num_rows($export_set);


	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue('A1', '#')
	            ->setCellValue('B1', 'Nombre')
	            ->setCellValue('C1', 'Apellidos')
	            ->setCellValue('D1', 'Ciudad')
	            ->setCellValue('E1', 'Centro')
	            ->setCellValue('F1', 'Cargo')
	            ->setCellValue('G1', 'Email')
	            ->setCellValue('H1', 'Telefono')
	            ->setCellValue('I1', 'Telefono secundario');


	while($export_data = mysqli_fetch_object( $export_set )){
					$objPHPExcel->setActiveSheetIndex(0)
			            ->setCellValue('A'.$entries, $export_data->id)
			            ->setCellValue('B'.$entries, $export_data->nombre)
			            ->setCellValue('C'.$entries, $export_data->primer_apellido." ".$export_data->segundo_apellido)
			            ->setCellValue('D'.$entries, $export_data->ciudad)
			            ->setCellValue('E'.$entries, $export_data->centro)
			            ->setCellValue('F'.$entries, $export_data->cargo)
			            ->setCellValue('G'.$entries, $export_data->email)
			            ->setCellValue('H'.$entries, $export_data->telefono)
			            ->setCellValue('I'.$entries, $export_data->telefono_secundario);
			            $entries++;

	}


	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel5) 
    ob_end_clean(); 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="bdSeminario'.date("d-m_H.i").'.xls"'); 
    header('Cache-Control: max-age=0'); 
    $objWriter->save('php://output');  
    exit;  

?>


