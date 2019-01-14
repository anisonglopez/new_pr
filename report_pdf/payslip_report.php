<?php
error_reporting(0);
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

     //ฝั่งซ้าย
     global $WkDay;
     global $Salary;
     global $OthALW6;
     global $PosiAllow;
     global $OthALW1;
     global $SL_Hrs;
     global $ResdALW;
     global $LiveAllow;
     global $OthALW4;
     global $ShiftALW;
     global $SpecialALW;
     global $expense4;
     global $expense3;
     global $SumFeneral;
     global $LevHrs;
     global $LevAmt;
     global $P_Fund_E;
     global $SocTaxAmt;
     global $Amt_TaxAmtCompLoan;
     global $DedFenera;
     global $DedCooperative;
     global $DedMoneyLoan;
     global $DedGHB;
     global $OthDedAmt;
     global $Rem_Hr;
        //ฝั่งขวา
     global $OVT10HR;   
     global $OVT10;
     global $OVT15HR;
     global $OVT15;
     global $OVT20;
     global $OVT20HR;
     global $OVT30;
     global $OVT30HR;
     global $OthALW3;
     global $NoAbsALW;
     global $OthALW5;
     global $CommAllow;
     global $OthALW2;
     global $OthIncAmt;
     global $TotalIncome;
     global $TotalDeduct;
     global $grendtotal;
     global $Y_Inc;
     global $Y_PFund;
     global $Y_Soc;
     global $Y_Tax;

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
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    ค่าจ้าง / เงินเดือน'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',$WkDay),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','วัน'),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($Salary,2)),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','วันหยุด (1)'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',$OVT10HR),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','ชั่วโมง'),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OVT10,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    บวกค่าจ้าง / เงินเดือน'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OthALW6,2)),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','ค่าล่วงเวลา'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',$OVT15HR),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','ชั่วโมง'),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OVT15,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    ค่าตำแหน่ง'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($PosiAllow,2)),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','วันหยุด (2)'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',$OVT20HR),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','ชั่วโมง'),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OVT20,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    ค่าเทคนิค'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OthALW1,2)),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','ค่าล่วงเวลาวันหยุด'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',$OVT30HR),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','ชั่วโมง'),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OVT30,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    ลาป่วย'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',$SL_Hrs),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','วัน'),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($ResdALW,2)),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บวกค่าล่วงเวลา'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OthALW3,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    ค่าครองชีพ'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($LiveAllow,2)),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','ค่าเบี้ยขยัน'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($NoAbsALW,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    ค่าอาหาร'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OthALW4,2)),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','ค่าดูแลสวน/แม่บ้าาน'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OthALW5,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    ค่าทำงานกะ'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($ShiftALW,2)),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','ค่าน้ำมันรถ'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($CommAllow,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    คืนเงินพักร้อน'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',number_format($Rem_Hr)),0,0,'R');
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','ชั่วโมง'),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($SpecialALW,2)),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','โบนัส'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OthALW2,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    '),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620',''),0,0,'L'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','รายได้อื่น ๆ'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($OthIncAmt,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 

    // ด้านล่าง
    $this->Ln(15);
    $this->SetFont('angsa','',12);
    $this->Cell(35,10,iconv( 'UTF-8','TIS-620','    เงินบำรุงสมาชิกสหภาพ ฯ'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',number_format($expense4,2)),0,0,'R'); 
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620','สหภาพฯ เสียชีวิต'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',number_format($expense3,2)),0,0,'R'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620','รวม'),0,0,'R'); 
    $this->Cell(20,10,iconv( 'UTF-8','TIS-620',number_format($SumFeneral,2)),0,0,'R'); 
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->SetFont('angsa','',14);
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','รวมเงินได้'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($TotalIncome,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->SetFont('angsa','',12);
    $this->Cell(35,5,iconv( 'UTF-8','TIS-620','    ลา / ขาดงาน'),0,0,'L'); 
    $this->Cell(15,5,iconv( 'UTF-8','TIS-620',number_format($LevHrs,2)),0,0,'R'); 
    $this->Cell(20,5,iconv( 'UTF-8','TIS-620','ชั่วโมง'),0,0,'L'); 
    $this->Cell(30,5,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(20,5,iconv( 'UTF-8','TIS-620',number_format($LevAmt,2)),0,0,'R'); 
    $this->Cell(30,5,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->SetFont('angsa','',14);
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','รวมรายการหัก'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($TotalDeduct,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->SetFont('angsa','',12);
    $this->Cell(35,2,iconv( 'UTF-8','TIS-620','    เงินกองทุนสำรองเลี้ยงชีพ'),0,0,'L'); 
    $this->Cell(65,2,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(20,2,iconv( 'UTF-8','TIS-620',number_format($P_Fund_E,2)),0,0,'R'); 
    $this->Cell(30,2,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->SetFont('angsa','',14);
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','เงินได้สุทธิ'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($grendtotal,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->SetFont('angsa','',12);
    $this->Cell(35,-1,iconv( 'UTF-8','TIS-620','    ประกันสังคม'),0,0,'L'); 
    $this->Cell(65,-1,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(20,-1,iconv( 'UTF-8','TIS-620',number_format($SocTaxAmt,2)),0,0,'R'); 
    $this->Cell(30,-1,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->SetFont('angsa','',14);
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620',''),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'L'); 
    $this->Ln(8);
    $this->SetFont('angsa','',12);
    $this->Cell(35,-4,iconv( 'UTF-8','TIS-620','    ภาษี'),0,0,'L'); 
    $this->Cell(65,-4,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(20,-4,iconv( 'UTF-8','TIS-620',number_format($Amt_TaxAmtCompLoan,2)),0,0,'R'); 
    $this->Cell(30,-4,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->SetFont('angsa','',14);
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','เงินได้'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($Y_Inc,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->SetFont('angsa','',12);
    $this->Cell(35,-7,iconv( 'UTF-8','TIS-620','    ฌาปนกิจสงเคราะห์'),0,0,'L'); 
    $this->Cell(65,-7,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(20,-7,iconv( 'UTF-8','TIS-620',number_format($DedFenera,2)),0,0,'R'); 
    $this->Cell(30,-7,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->SetFont('angsa','',14);
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','กองทุนสำรองเลี้ยงชีพ'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($Y_PFund,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->SetFont('angsa','',12);
    $this->Cell(35,-10,iconv( 'UTF-8','TIS-620','    สหกรณ์ออมทรัพย์'),0,0,'L'); 
    $this->Cell(65,-10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(20,-10,iconv( 'UTF-8','TIS-620',number_format($DedCooperative,2)),0,0,'R'); 
    $this->Cell(30,-10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->SetFont('angsa','',14);
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','ประกันสังคม'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($Y_Soc,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->SetFont('angsa','',12);
    $this->Cell(35,-13,iconv( 'UTF-8','TIS-620','    ชำระเงินกู้สินเชื่อเงินสด'),0,0,'L'); 
    $this->Cell(65,-13,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(20,-13,iconv( 'UTF-8','TIS-620',number_format($DedMoneyLoan,2)),0,0,'R'); 
    $this->Cell(30,-13,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->SetFont('angsa','',14);
    $this->Cell(30,10,iconv( 'UTF-8','TIS-620','ภาษี'),0,0,'L'); 
    $this->Cell(15,10,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620',''),0,0,'C'); 
    $this->Cell(60,10,iconv( 'UTF-8','TIS-620',number_format($Y_Tax,2)),0,0,'R'); 
    $this->Cell(10,10,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->SetFont('angsa','',12);
    $this->Cell(35,-16,iconv( 'UTF-8','TIS-620','    ชำระเงินกู้ที่อยู่อาศัย'),0,0,'L'); 
    $this->Cell(65,-16,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(20,-16,iconv( 'UTF-8','TIS-620',number_format($DedGHB,2)),0,0,'R'); 
    $this->Cell(30,-16,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
    $this->Ln(8);
    $this->SetFont('angsa','',12);
    $this->Cell(35,-19,iconv( 'UTF-8','TIS-620','    รายการหัก อื่น ๆ'),0,0,'L'); 
    $this->Cell(65,-19,iconv( 'UTF-8','TIS-620',''),0,0,'R'); 
    $this->Cell(20,-19,iconv( 'UTF-8','TIS-620',number_format($OthDedAmt,2)),0,0,'R'); 
    $this->Cell(30,-19,iconv( 'UTF-8','TIS-620','บาท'),0,0,'L'); 
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

                    //for ($i=0;$i<mysqli_num_rows($emp_DATA);$i++) {
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
                             //ฝั่งซ้าย
                             $WkDay =$objResult_empl["Work_Days"];
                             $Salary =$objResult_empl["Salary"];
                             $OthALW6 =$objResult_empl["OthALW6"];
                             $PosiAllow =$objResult_empl["PosiAllow"];
                             $SL_Hrs =  ( $objResult_empl["SL_Hrs"] == NULL) ? '0' : $objResult_empl["SL_Hrs"];
                             $OthALW1 =$objResult_empl["OthALW1"];
                             $ResdALW =$objResult_empl["ResdALW"];
                             $LiveAllow =$objResult_empl["LiveAllow"];
                             $OthALW4 =$objResult_empl["OthALW4"];
                             $ShiftALW =$objResult_empl["ShiftALW"];
                             $SpecialALW =$objResult_empl["SpecialALW"];
                             $Rem_Hr =$objResult_empl["Rem_Hr"];
                             $expense4 =$objResult_empl["expense4"];
                             $expense3 =$objResult_empl["expense3"];
                             $SumFeneral = "0";
                             $LevHrs =$objResult_empl["LevHrs"];
                             $LevAmt =$objResult_empl["LevAmt"];
                             $P_Fund_E =$objResult_empl["P_Fund_E"];
                             $SocTaxAmt =$objResult_empl["SocTaxAmt"];
                             $Amt_TaxAmtCompLoan =$objResult_empl["Amt_TaxAmtCompLoan"];
                             $DedFenera =$objResult_empl["DedFenera"];
                             $DedCooperative =$objResult_empl["DedCooperative"];
                             $DedMoneyLoan =$objResult_empl["DedMoneyLoan"];
                             $DedGHB =$objResult_empl["DedGHB"];
                             $OthDedAmt =$objResult_empl["OthDedAmt"];

                             //ฝั่งขวา
                             $OVT10HR =$objResult_empl["OVT10HR"];
                             $OVT10 =$objResult_empl["OVT10"];
                             $OVT15HR =$objResult_empl["OVT15HR"];
                             $OVT15 =$objResult_empl["OVT15"];
                             $OVT20 =$objResult_empl["OVT20"];
                             $OVT20HR =$objResult_empl["OVT20HR"];
                             $OVT30 =$objResult_empl["OVT30"];
                             $OVT30HR =$objResult_empl["OVT30HR"];
                             $OthALW3 =$objResult_empl["OthALW3"];
                             $NoAbsALW =$objResult_empl["NoAbsALW"];
                             $OthALW5 =$objResult_empl["OthALW5"];
                             $CommAllow =$objResult_empl["CommAllow"];
                             $OthALW2 =$objResult_empl["OthALW2"];
                             $OthIncAmt =$objResult_empl["OthIncAmt"];
                             $TotalIncome =$objResult_empl["TotalIncome"];
                             $TotalDeduct =$objResult_empl["TotalDeduct"];
                             $grendtotal ="0";
                             $Y_Inc =$objResult_empl["Y_Inc"];
                             $Y_PFund =$objResult_empl["Y_PFund"];
                             $Y_Soc =$objResult_empl["Y_Soc"];
                             $Y_Tax =$objResult_empl["Y_Tax"];

                            //echo $EmplCode;
                            $pdf->AddFont('angsa','','angsa.php');
                            $pdf->AliasNbPages();
                            $headerVisible="false";
                            $pdf->AddPage();
                            $pdf->Empl_Salaly_detail();    
                        }
 
                        //$EmplCode = $objResult_emplData["EmplCode"];
                       
                //    }
}
// for($i=1;$i<=10;$i++){
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
// }
$pdf->SetTitle('Pay Slip');

$file_name = "payroll_payslip_period".$period."_term".$term."_".$todate."";
$pdf->Output('',' '.$file_name.'.pdf');


// $pdf->Cell(0,10,iconv( 'UTF-8','TIS-620',$Owner_T_Name),0,1,"C");
// $pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','COMFIRMATION PAYROLL SLIP'),0,1,"C");
// $pdf->Cell( 0 , 10,iconv( 'UTF-8','TIS-620',$Owner_T_Name),0,1,"R");
//$pdf->Cell(40,10,'Hello World! - ทดสอบส่งออกเป็น pdf');
// $pdf->Output();
?>