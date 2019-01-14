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
//end select database
include "../config/connect.php";
        $strSQL_query_systemcondition = "SELECT * from tm01_system_condition ";
        $systemcondition_DATA = mysqli_query($conn, $strSQL_query_systemcondition);
        while ($rows_systemcondition = mysqli_fetch_array($systemcondition_DATA)) {  
                $Owner_T_Name = $rows_systemcondition['Owner_T_Name'];
        }
        $period = $_GET["Period"];
        $term = $_GET["Term"];
        $DeptCode_from = ( $_GET["DeptCode_from"] == NULL) ? '00000' : $_GET["DeptCode_from"];
        $DeptCode_to = ( $_GET["DeptCode_to"] == NULL) ? '99999' : $_GET["DeptCode_to"];
        $EmplCode_from =  ( $_GET["EmplCode_from"] == NULL) ? '00000' : $_GET["EmplCode_from"];
        $EmplCode_to =  ( $_GET["EmplCode_to"] == NULL) ? '99999' : $_GET["EmplCode_to"];
        $user_login = $_SESSION["UserID"];
        $convert_date = substr($period, 0, 4) .'-'. substr($period, 4,2);
        $month_string =  date("F", strtotime($convert_date));
        $year_string =  date("Y", strtotime($convert_date));
        date_default_timezone_set("Asia/Bangkok");
        $todate = date("d/m/Y");
        $totime = date("H:i");
class PDF extends FPDF
{
    //Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}
//Colored table
function FancyTable($data)
{
	//Color and font restoration
    // $this->SetFillColor(224,235,255);
    $w=array(30,100,75,75);
	$this->SetTextColor(0);
	$this->SetFont('');
	//Data
	$fill=false;
	foreach($data as $row)
	{
        $this->Cell($w[0],10,iconv('UTF-8','TIS-620',$row['EmplCode']),'LR',0,'C');
        $this->Cell($w[1],10,iconv('UTF-8','TIS-620','    '.$row['EmplTName']),'LR',0,'L');
        $this->Cell($w[2],10,iconv('UTF-8','TIS-620','.................................................................'),'LR',0,'C');
        $this->Cell($w[3],10,iconv('UTF-8','TIS-620','.................................................................'),'LR',0,'C');
		// $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		// $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
		// $this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
		// $this->Cell($w[4],6,($row[4]),'LR',0,'R',$fill);
		// $this->Cell($w[5],6,($row[5]),'LR',0,'R',$fill);
		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(array_sum($w),0,'','T');
}
// Page header
function Header()
{
    global $headerVisible;
if($headerVisible=="true")
{
//My header codes

        global $period;
        global $Owner_T_Name;
        global $user_login;
        global $convert_date;
        global $month_string;
        global $year_string;
        global $todate;
        global $totime;
        global $EmplType;
        global $DeptCode;
        global $DeptEDesc;
        $EmplString = ( $EmplType == "M") ? 'รายเดือน' : "รายวัน";
        //echo $convert_date;
        //echo $period;

        //echo $month_string;
    $this->SetFont('angsa','',20);
    // Move to the right
    //$this->Cell(80);
    // Title
    $this->Cell(0,10,iconv( 'UTF-8','TIS-620',$Owner_T_Name ),0,1,"C");
    $this->Cell(0,5,iconv( 'UTF-8','TIS-620','CONFIRMATION PAYROLL SLIP' ),0,1,"C");
    $this->SetFont('angsa','',15);
    $this->Cell(0,10,iconv( 'UTF-8','TIS-620','ประจำเดือน '.$month_string. ' / ' .$year_string ),0,1,"C");
    $this->SetY( 10 );
    $this->SetFont('angsa','',12);
    $this->Cell(0,10,iconv( 'UTF-8','TIS-620','ผู้พิมพ์ '.$user_login),0,1,"R");
    $this->Cell(0,3,iconv( 'UTF-8','TIS-620','วันที่พิมพ์ '.$todate),0,1,"R");
    $this->Cell(0,10,iconv( 'UTF-8','TIS-620','เวลาที่พิมพ์ '.$totime),0,1,"R");

    // Line break
    $this->Ln(5);
    $this->SetFont('angsa','',14);

    $this->Cell(0,10,iconv( 'UTF-8','TIS-620','ประเภทพนักงาน       '.$EmplString.'       แผนก   '.$DeptCode.'    '.$DeptEDesc.' '),0,1,"L");
    	//Colors, line width and bold font
	$this->SetFillColor(255,255,255);
	$this->SetTextColor(0);
	$this->SetDrawColor(0,0,0);
	$this->SetLineWidth(0);
	$this->SetFont('angsa','',14);

    	//Header
	$w=array(30,100,75,75);
    $this->SetFont('angsa','',14);  
    $this->SetTextColor(0,0,0); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','รหัสพนักงาน'),1,0,'C'); 
    $this->Cell(100,10,iconv( 'UTF-8','TIS-620','ชื่อ - สกุล'),1,0,'C'); 
    $this->Cell(75,10,iconv( 'UTF-8','TIS-620','ลายมือชื่อ'),1,0,'C'); 
    $this->Cell(75,10,iconv( 'UTF-8','TIS-620','หมายเหตุ'),1,0,'C'); 
    $this->Ln();
}  
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('angsa','',14);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
function Empl_Salaly_detail(){
    global $EmplCode;
    global $DeptEDesc;
    global $EmplTName;
    global $PayDate;
    global $BankAccCode;
    global $BankCode;
    
    $this->SetFont('angsa','',18);
    $this->Cell(0,0,iconv( 'UTF-8','TIS-620','      รหัสพนักงาน :  '.$EmplCode.' ' ),0,1,"L");
    $this->Ln(8);
    $this->Cell(0,0,iconv( 'UTF-8','TIS-620','      ชื่อพนักงาน :  '.$EmplTName.' ' ),0,10,"L");
    $this->Ln(8);
    $this->Cell(0,0,iconv( 'UTF-8','TIS-620','      ฝ่าย / แผนก :  '.$DeptEDesc.' ' ),0,10,"L");
    $this->SetY( 10 );
    $this->Cell(0,0,iconv( 'UTF-8','TIS-620','     วันที่จ่ายเงิน :  '.$PayDate.' ' ),0,10,"R");
    $this->Ln(8);
    $this->Cell(0,0,iconv( 'UTF-8','TIS-620','     เลขที่บัญชี :  '.$BankAccCode.' ' ),0,10,"R");
    $this->Ln(8);
    $this->Cell(0,0,iconv( 'UTF-8','TIS-620','     ธนาคาร :  '.$BankCode.' ' ),0,10,"R");
    $this->Ln(8);
	$w=array(30,100,75,75);
    $this->SetFont('angsa','',14);  
    $this->SetTextColor(0,0,0); 
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620','รหัสพนักงาน'),1,0,'C'); 
    $this->Cell(100,10,iconv( 'UTF-8','TIS-620','ชื่อ - สกุล'),1,0,'C'); 
    $this->Cell(75,10,iconv( 'UTF-8','TIS-620','ลายมือชื่อ'),1,0,'C'); 
    $this->Cell(75,10,iconv( 'UTF-8','TIS-620','หมายเหตุ'),1,0,'C'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','รหัสพนักงาน'),1,0,'C'); 
    $this->Cell(100,10,iconv( 'UTF-8','TIS-620','ชื่อ - สกุล'),1,0,'C'); 
    $this->Cell(75,10,iconv( 'UTF-8','TIS-620','ลายมือชื่อ'),1,0,'C'); 
    $this->Cell(75,10,iconv( 'UTF-8','TIS-620','หมายเหตุ'),1,0,'C'); 
}
}
// Instanciation of inherited class
$pdf = new PDF( 'L' , 'mm' , 'A4' );
//$header=array('รหัสพนักงาน','ชื่อ - สกุล','ลายมือชื่อ','หมายเหตุ');
//Data loading
//*** Load MySQL Data ***//
$str_empl_dep = "SELECT  DISTINCT tm03_employee.DeptCode, tm02_department.DeptEDesc , tt05_monthlypaid.EmplType
FROM tt05_monthlypaid 
JOIN tm03_employee ON tt05_monthlypaid.EmplCode=tm03_employee.EmplCode
JOIN tm02_department ON tm02_department.DeptCode=tm03_employee.DeptCode
WHERE   Period = '$period' 
AND Term = '$term' 
AND tm03_employee.DeptCode BETWEEN '$DeptCode_from' AND '$DeptCode_to'
ORDER BY  EmplType DESC , tm03_employee.DeptCode ASC ";
$empldep_DATA = mysqli_query($conn, $str_empl_dep);
while($objResult_emplDep = mysqli_fetch_array($empldep_DATA))
{
                $EmplType = $objResult_emplDep["EmplType"];
                $DeptCode = $objResult_emplDep["DeptCode"];
                $DeptEDesc = $objResult_emplDep["DeptEDesc"];
                            $strSQL_query_emp = "SELECT tt05_monthlypaid. * , tm03_employee.EmplTName ,tm03_employee.EmplType, tm03_employee.DeptCode
                            FROM tt05_monthlypaid
                            JOIN tm03_employee ON tt05_monthlypaid.EmplCode=tm03_employee.EmplCode
                            JOIN tm02_department ON tm02_department.DeptCode=tm03_employee.DeptCode
                            Where tt05_monthlypaid.Period = '$period' 
                            AND  tt05_monthlypaid.Term = '$term' 
                           AND tm03_employee.DeptCode = '$DeptCode'
                            AND tm03_employee.EmplCode BETWEEN '$EmplCode_from' AND '$EmplCode_to' 
                            AND tt05_monthlypaid.EmplType = '$EmplType' 
                            ORDER BY  tm03_employee.EmplCode ASC";
                            $emp_DATA = mysqli_query($conn, $strSQL_query_emp);
                            $resultData = array();
                            $headerVisible="true";
                    $pdf->AddFont('angsa','','angsa.php');
                    $pdf->AliasNbPages();
                    $pdf->AddPage();
                    $pdf->SetFont('angsa','',14);
                            for ($i=0;$i<mysqli_num_rows($emp_DATA);$i++) {
                                $result = mysqli_fetch_array($emp_DATA);
                                array_push($resultData,$result);
                            }
                            
                    $pdf->FancyTable($resultData);

                    for ($i=0;$i<mysqli_num_rows($emp_DATA);$i++) {
                        $strSQL_query_emp = "SELECT tt05_monthlypaid. * , tm03_employee.EmplTName ,tm03_employee.EmplType, tm03_employee.DeptCode, tm00_control.PayDate,
                        tm03_employee.BankAccCode, tm03_employee.BankCode
                            FROM tt05_monthlypaid
                            JOIN tm03_employee ON tt05_monthlypaid.EmplCode=tm03_employee.EmplCode
                            JOIN tm02_department ON tm02_department.DeptCode=tm03_employee.DeptCode
                            JOIN tm00_control ON tt05_monthlypaid.Period=tm00_control.Period AND tt05_monthlypaid.Term=tm00_control.Term AND  tt05_monthlypaid.EmplType=tm00_control.EmplType
                            Where tt05_monthlypaid.Period = '$period' 
                            AND  tt05_monthlypaid.Term = '$term' 
                           AND tm03_employee.DeptCode = '$DeptCode'
                            AND tm03_employee.EmplCode BETWEEN '$EmplCode_from' AND '$EmplCode_to' 
                            AND tt05_monthlypaid.EmplType = '$EmplType' 
                            ORDER BY  tm03_employee.EmplCode ASC";

                            $emp_DATA = mysqli_query($conn, $strSQL_query_emp);
                        while($objResult_empl = mysqli_fetch_array($emp_DATA))
                        {
                             $EmplCode =$objResult_empl["EmplCode"];
                             $EmplTName =$objResult_empl["EmplTName"];
                             $EmplTName =$objResult_empl["EmplTName"];
                             $PayDate =  ( $objResult_empl["PayDate"] == "0000-00-00") ? 'ไม่ได้ระบุค่า' : date("d-m-Y", strtotime($objResult_empl["PayDate"]));
                             $BankAccCode =  ( $objResult_empl["BankAccCode"] == NULL) ? 'ไม่ได้ระบุค่า' :$objResult_empl["BankAccCode"];
                             $BankCode =  ( $objResult_empl["BankCode"] == NULL) ? 'ไม่ได้ระบุค่า' : $objResult_empl["BankCode"];
                            //echo $EmplCode;
                        }
                        //$EmplCode = $objResult_emplData["EmplCode"];
                        $pdf->AddFont('angsa','','angsa.php');
                        $pdf->AliasNbPages();
                        $headerVisible="false";
                        $pdf->AddPage();
 
                        $pdf->Empl_Salaly_detail();

                        $pdf->SetFont('angsa','',14);       
                }
}
// for($i=1;$i<=10;$i++){
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
// }



$pdf->Output();


// $pdf->Cell(0,10,iconv( 'UTF-8','TIS-620',$Owner_T_Name),0,1,"C");
// $pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','COMFIRMATION PAYROLL SLIP'),0,1,"C");
// $pdf->Cell( 0 , 10,iconv( 'UTF-8','TIS-620',$Owner_T_Name),0,1,"R");
//$pdf->Cell(40,10,'Hello World! - ทดสอบส่งออกเป็น pdf');
// $pdf->Output();
?>