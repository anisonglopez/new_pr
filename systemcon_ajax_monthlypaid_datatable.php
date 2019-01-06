<?php
//error_reporting(0);
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php 
include "config/connect.php";
?>
<?php
    $ConvertPeriodDate = date("Ym", strtotime($_POST["period"]));
    $SysPgmID = "FT05_PrepareMonthlyData";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm00_control ";
    $strSQL .="(Period, Term, EmplType, FmAttnDate, ToAttnDate, FmOVTDate, ToOVTDate, FmLevDate, ToLevDate,  PayDate, SysUpdDate, SysUserID, SysPgmID, Holiday) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$ConvertPeriodDate."', '".($_POST["term"])."', '".($_POST["EmplType"])."',
 '".($_POST["salary_date_from"])."', '".($_POST["salary_date_to"])."', '".($_POST["overtime_date_from"])."', '".($_POST["overtime_date_to"])."', 
 '".($_POST["lev_date_from"])."', '".($_POST["lev_date_to"])."', '".($_POST["paydate"])."', 
 '".$date. "' , '" .$_SESSION['UserID']."' , '".$SysPgmID."' , '".$_POST["Holiday"]."')";
    //$strSQL .="('".mysqli_real_escape_string($_POST["period"])."', '"($_POST["term"])."', '".mysqli_real_escape_string($_POST["emp_type"])."', '".($_POST["salary_date_from"])."', '".$_POST["salary_date_to"]. "' , '" .$_POST["overtime_date_from"]."' ,'" .$_POST["overtime_date_to"]."' , '" .$_POST["user_login"]."' , 'FM01_User' )";
    $objQuery = mysqli_query($conn, $strSQL);

    $strSQL_query_systemcondition = "SELECT * from tm01_system_condition ";
    $systemcondition_DATA = mysqli_query($conn, $strSQL_query_systemcondition);
    while ($rows_systemcondition = mysqli_fetch_array($systemcondition_DATA)) {  
            $Cola = $rows_systemcondition['LiveALW_PM'];
    }
    // Insert Monthly Emp data
    $strSQL_query_emp = "SELECT * from tm03_employee where EmplType ='".$_POST["EmplType"]."' AND ProcCode = 1 ";
//    echo $strSQL_query_emp;
    $monthly_DATA = mysqli_query($conn, $strSQL_query_emp);
        while ($rows = mysqli_fetch_array($monthly_DATA)) {    
            $EmplCode = $rows['EmplCode'];
            $Salary = $rows['Salary'];
            $SL_Day = $rows['SL_Day'];
            $ProbFlag = $rows['ProbFlag'];
            $EmplType = $rows['EmplType'];
            $PosiCode = $rows['PosiCode'];
            // work day
            $CountHoliday = $_POST['Holiday'];
            $lev_date_from = $_POST['lev_date_from'];
            $lev_date_to = $_POST['lev_date_to'];
            //ข้อมูล OT
            $overtime_date_from = $_POST['overtime_date_from'];
            $overtime_date_to = $_POST['overtime_date_to'];
            // ข้อมูลกะเข้างาน
            $O_Shft_D_PM = $rows['O_Shft_D_PM'];
            $M_Shft_D_PM = $rows['M_Shft_D_PM'];
            $E_Shft_D_PM = $rows['E_Shft_D_PM'];
            $N_Shft_D_PM = $rows['N_Shft_D_PM'];
            // SpeacialAllowance
            $AL_Rem_Hrs = $rows['AL_Rem_Hrs'];
            $OT_Cal_F = $rows['OT_Cal_F'];
            $Hr_work_D = 8;
            $Hr_work_M = 7.5;

            $CountPayLeave = 0;
            $CountLate = 0;
            $CountAbsent = 0;
            $strSQL_query_attendance = "SELECT AttnCode, Ded_Flag, Ded_Rate, sum(Hours) as Hours  from tt04_attendance where 
            AttnDate BETWEEN '$lev_date_from' AND '$lev_date_to'  
            AND EmplCode = $EmplCode group by EmplCode ,AttnCode";
            $attendance_DATA = mysqli_query($conn, $strSQL_query_attendance);
            while ($rows_attendance = mysqli_fetch_array($attendance_DATA)) {  
                        $Ded_Flag = $rows_attendance['Ded_Flag'];
                        $Hours = $rows_attendance['Hours'];
                        $AttnCode = $rows_attendance['AttnCode'];
                        if ($Ded_Flag != 0 ) {
                            $CountPayLeave = $Hours;
                        }
                        elseif($AttnCode == "L"){
                            $CountLate = $Hours;
                        }
                        elseif($AttnCode == "A"){
                            $CountAbsent = $Hours;
                        }
            }
            $CountPayLeave = $CountPayLeave; // ok
            $CountLate = $CountLate; //ok
            $CountShft = $O_Shft_D_PM + $M_Shft_D_PM + $E_Shft_D_PM +  $N_Shft_D_PM ;
            $CountPayTotal = $CountHoliday +$CountPayLeave +$CountShft - $CountLate ;
            $Work_Days = $CountPayTotal;  //ok
            // work day
            $Sick_days = 0; //ok
            $Salary_Cal = $Salary; //ok
            $ResdALW = $Salary * $SL_Day;
            if($ProbFlag == 0){
                    if($EmplType == "D"){
                        $LiveAllow = $Cola / 2;
                    }
                    else{
                        $LiveAllow = $Cola;
                    }
            }
            $LiveAllow = $LiveAllow; //ok

            $strSQL_query_position = "SELECT * from tt04_positionallow Where EmplCode =  '$EmplCode'";
            $position_DATA = mysqli_query($conn, $strSQL_query_position);
            while ($rows_position = mysqli_fetch_array($position_DATA)) {  
                        $PosiAllow = $rows_position['PosiAllow'];
            }
            if($EmplType == "D"){
                $PosiAllow = $PosiAllow / 2;
            }
            else{
                $PosiAllow = $PosiAllow;
            }
            $PosiAllow = $PosiAllow;

            $strSQL_query_commallow = "SELECT Emplcode , sum(CommAllow) as CommAllow From tt04_commuteallow group by Emplcode having EmplCode = '$EmplCode'";
            //echo  $strSQL_query_commallow;
            $commallow_DATA = mysqli_query($conn, $strSQL_query_commallow);
            while ($rows_commallow = mysqli_fetch_array($commallow_DATA)) {  
                        $CommAllow = $rows_position['CommAllow'];
            }
            $CommAllow = $CommAllow; //ok

            $strSQL_query_ShfttALW = "SELECT * from tm02_position WHERE PosiCode = '$PosiCode'";
            //echo  $strSQL_query_ShfttALW;
            $ShfttALW_DATA = mysqli_query($conn, $strSQL_query_ShfttALW);
            if(mysqli_num_rows($ShfttALW_DATA) > 0){
                    while ($rows_ShfttALW = mysqli_fetch_array($ShfttALW_DATA)) {  
                        $Posi_M_ShftALW_D = $rows_ShfttALW['M_ShftALW_D'];
                        $Posi_E_ShftALW_D = $rows_ShfttALW['E_ShftALW_D'];
                        $Posi_N_ShftALW_D = $rows_ShfttALW['N_ShftALW_D'];
                        //$Posi_M_Shft_ALW_D = $rows_ShfttALW['M_ShftALW_D'];
                }
            }
            else{
                $Posi_M_ShftALW_D = 0;
                $Posi_E_ShftALW_D = 0;
                $Posi_N_ShftALW_D = 0;
            }
            $ShfttALW = ($Posi_M_ShftALW_D * $M_Shft_D_PM) + ($Posi_E_ShftALW_D * $E_Shft_D_PM) + ($N_Shft_D_PM * $Posi_N_ShftALW_D) ; //ok

            // not Complete
            $NoAbsALW = "";
            $NoAbsALW_Accum_Level = "";
            $NoAbsALW_Accum_Paid = "";
            // not Complete

            // Other Allowance
            $strSQL_query_OtherAllowance = "SELECT  sum(OthAllow1) as OthAllow1  , 
            sum(OthAllow2) as OthAllow2 ,
            sum(OthAllow3) as OthAllow3 ,
            sum(OthAllow4) as OthAllow4 , 
            sum(OthAllow5) as OthAllow5 ,
            sum(OthAllow6) as OthAllow6 
            from tt04_otherallow WHERE EmplCode = '$EmplCode' ";
            $OtherAllowance_DATA = mysqli_query($conn, $strSQL_query_OtherAllowance);
            if(mysqli_num_rows($OtherAllowance_DATA) > 0){
                while ($rows_OtherAllowance = mysqli_fetch_array($OtherAllowance_DATA)) {  
                    $OthALW1 = $rows_OtherAllowance['OthAllow1'];
                    $OthALW2 = $rows_OtherAllowance['OthAllow2'];
                    $OthALW3 = $rows_OtherAllowance['OthAllow3'];
                    $OthALW4 = $rows_OtherAllowance['OthAllow4'];
                    $OthALW5 = $rows_OtherAllowance['OthAllow5'];
                    $OthALW6 = $rows_OtherAllowance['OthAllow6'];
                }
            }
             // Other Allowance
            // Other Expense
            $OthExpense1 = 0;
            $OthExpense2 = 0;
            $OthExpense3 = 0;
            $OthExpense4 = 0;
            // Other Expense
            $strSQL_query_OT = "SELECT sum(OVT10) as OVT10,
               sum(OVT15) as OVT15,
               sum(OVT20) as OVT20,
               sum(OVT25) as OVT25,
               sum(OVT30) as OVT30
               from tt04_overtime where 
            AttnDate BETWEEN '$overtime_date_from' AND '$overtime_date_to'  
            AND EmplCode = '$EmplCode' ";
            $OT_DATA = mysqli_query($conn, $strSQL_query_OT);
            while ($rows_OT = mysqli_fetch_array($OT_DATA)) {  
                $OVT10 = $rows_OT['OVT10'];
                $OVT15 = $rows_OT['OVT15'];
                $OVT20 = $rows_OT['OVT20'];
                $OVT25 = $rows_OT['OVT25'];
                $OVT30 = $rows_OT['OVT30'];
            }
            if($OT_Cal_F != 0){
                if($EmplType == "D"){
                    $Amt_T = $Salary / $Hr_work_D;
                }            
                else{
                    $Amt_T = ($Salary / $Hr_work_M) * 30 ;
                }
            }
            $OVT10HR = "";


            $OVT10 = "";
            $OVT15HR = "";
            $OVT15 = "";
            $OVT20HR = "";
            $OVT20= "";
            $OVT25HR = "";
            $OVT25 = "";
            $OVT30HR = "";
            $OVT30 = "";

            // จำนวนชั่วโมงพักร้อน
            $SpecialALW = "0";
           // $SpecialALW = ($AL_Rem_Hrs * $Salary) / $Hr_work_M;
            


            $IncBfAmt = "";
            $IncAfAmt = "";
            $DedBfAmt = "";
            $DedAfAmt = "";
            $LevAmt = "";
            $LateAmt = "";
            $CompLoan = "";
            $SocNetINC = "";
            $SocTaxAmt = "";
            $SocSttDate = "";
            $P_Fund_E = "";
            $P_Fund_C = "";
            $TaxAmt = "";
            $TaxAmtComp = "";
            $TaxBfBonusAmt = "";
            $BonusTaxAmt = "";
            $BonusTaxAmtComp = "";
            $DedFeneral = "";
            $DedCooperative = "";
            $DedMoneyLoan = "";
            $DedGHB = "";
            $SysUpdDate = "";
            $SysUserID = "";
            $SysPgmID = "";
    }
// echo $strSQL_query_emp;


    if($objQuery)
    {
        echo  'ทำการบันทึกข้อมูลสำเร็จ';
    }
    else
    {
        echo 'ขออภัย! เนื่องจากมีรหัส Period นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้';
    }
    }

?>