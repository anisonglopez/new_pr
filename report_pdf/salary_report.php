<?php
//error_reporting(0);
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./../includes/login/login.php");
    exit();
}
?>
<?php 
include "../config/connect.php";
?>
<?php
require('../dependencies/fpdf181/fpdf.php');
define('FPDF_FONTPATH','../dependencies/fpdf181/font');
//select Database
$strSQL_query_systemcondition = "SELECT * from tm01_system_condition ";
$systemcondition_DATA = mysqli_query($conn, $strSQL_query_systemcondition);
while ($rows_systemcondition = mysqli_fetch_array($systemcondition_DATA)) {  
        $Owner_T_Name = $rows_systemcondition['Owner_T_Name'];
        // ประกาศตัวแปร เก็บค่าประกันสังคม
        $SOC_Rate = $rows_systemcondition['SOC_Rate'];
        $SOC_MX_Inc = $rows_systemcondition['SOC_MX_Inc'];
        $SOC_MN_Inc = $rows_systemcondition['SOC_MN_Inc'];

        $SOC_ResdALW_F = $rows_systemcondition['SOC_ResdALW_F'];
        $SOC_LiveALW_F = $rows_systemcondition['SOC_LiveALW_F'];
        $SOC_PosiALW_F = $rows_systemcondition['SOC_PosiALW_F'];
        $SOC_CommALW_F = $rows_systemcondition['SOC_CommALW_F'];
        $SOC_ShiftALW_F = $rows_systemcondition['SOC_ShiftALW_F'];
        $SOC_NoAbsALW_F = $rows_systemcondition['SOC_NoAbsALW_F'];
        $SOC_OthALW1_F = $rows_systemcondition['SOC_OthALW1_F'];
        $SOC_OthALW2_F = $rows_systemcondition['SOC_OthALW2_F'];
        $SOC_OthALW3_F = $rows_systemcondition['SOC_OthALW3_F'];
        $SOC_OthALW4_F = $rows_systemcondition['SOC_OthALW4_F'];
        $SOC_OthALW5_F = $rows_systemcondition['SOC_OthALW5_F'];
        $SOC_OthALW6_F = $rows_systemcondition['SOC_OthALW6_F'];
        $SOC_Expen1_F = $rows_systemcondition['SOC_Expen1_F'];
        $SOC_Expen2_F = $rows_systemcondition['SOC_Expen2_F'];
        $SOC_Expen3_F = $rows_systemcondition['SOC_Expen3_F'];
        $SOC_Expen4_F = $rows_systemcondition['SOC_Expen4_F'];
}

//end select database
class PDF extends FPDF
{
// Page header
function Header()
{
    $this->SetFont('Arial','B',15);
    // Move to the right
    //$this->Cell(80);
    // Title
    $this->Cell(0,10,iconv( 'UTF-8','TIS-620','test' ),0,1,"C");
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}
// Instanciation of inherited class
$pdf = new PDF( 'L' , 'mm' , 'A4' );
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++){
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
}
$pdf->Output();


// $pdf->Cell(0,10,iconv( 'UTF-8','TIS-620',$Owner_T_Name),0,1,"C");
// $pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','COMFIRMATION PAYROLL SLIP'),0,1,"C");
// $pdf->Cell( 0 , 10,iconv( 'UTF-8','TIS-620',$Owner_T_Name),0,1,"R");
//$pdf->Cell(40,10,'Hello World! - ทดสอบส่งออกเป็น pdf');
// $pdf->Output();
?>