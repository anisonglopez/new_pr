<?php
require('../dependencies/fpdf181/fpdf.php');
define('FPDF_FONTPATH','../dependencies/fpdf181/font');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',16);
$pdf->Cell(0,20,iconv( 'UTF-8','TIS-620','Hello World ทดสอบการส่งออก Pdf'),0,1,"C");
//$pdf->Cell(40,10,'Hello World! - ทดสอบส่งออกเป็น pdf');
$pdf->Output();
?>