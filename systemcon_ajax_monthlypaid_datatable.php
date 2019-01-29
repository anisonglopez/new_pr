<?php
error_reporting(0);
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
    if($objQuery)
    {
        $strSQL_query_systemcondition = "SELECT * from tm01_system_condition ";
    $systemcondition_DATA = mysqli_query($conn, $strSQL_query_systemcondition);
    while ($rows_systemcondition = mysqli_fetch_array($systemcondition_DATA)) {  
            $Cola = $rows_systemcondition['LiveALW_PM'];
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
            $term =  $_POST["term"];
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

            $Attn_Cal_F = $rows['Attn_Cal_F'];
            $CompLoan = $rows['CompLoan'];
            $CountPayLeave = 0;
            $CountLate = 0;
            $CountAbsent = 0;
            $LateHrs = 0;
            $LevHrs = 0;
            $strSQL_query_attendance = "SELECT AttnCode, Ded_Flag, Ded_Rate, sum(Hours) as Hours  from tt04_attendance where 
            AttnDate BETWEEN '$lev_date_from' AND '$lev_date_to'  
            AND EmplCode = $EmplCode group by EmplCode ,AttnCode";
            $attendance_DATA = mysqli_query($conn, $strSQL_query_attendance);
            while ($rows_attendance = mysqli_fetch_array($attendance_DATA)) {  
                        $Ded_Flag = $rows_attendance['Ded_Flag'];
                        $Hours = $rows_attendance['Hours'];
                        $AttnCode = $rows_attendance['AttnCode'];
                        $Ded_Rate = $rows_attendance['Ded_Rate'];
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
           // echo $strSQL_query_attendance;
            $CountPayLeave = $CountPayLeave; // ok
            $CountLate = $CountLate; //ok
            $CountShft = $O_Shft_D_PM + $M_Shft_D_PM + $E_Shft_D_PM +  $N_Shft_D_PM ;
            $CountPayTotal = $CountHoliday +$CountPayLeave +$CountShft - $CountLate ;
            $Work_Days = $CountPayTotal;  //ok
            $Work_Days = ($EmplType == "M" ? 30 : $Work_Days);
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
            $PosiAllow = 0;
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

            $strSQL_query_ShiftALW = "SELECT * from tm02_position WHERE PosiCode = '$PosiCode'";
            //echo  $strSQL_query_ShiftALW;
            $ShiftALW_DATA = mysqli_query($conn, $strSQL_query_ShiftALW);
            if(mysqli_num_rows($ShiftALW_DATA) > 0){
                    while ($rows_ShiftALW = mysqli_fetch_array($ShiftALW_DATA)) {  
                        $Posi_M_ShftALW_D = $rows_ShiftALW['M_ShftALW_D'];
                        $Posi_E_ShftALW_D = $rows_ShiftALW['E_ShftALW_D'];
                        $Posi_N_ShftALW_D = $rows_ShiftALW['N_ShftALW_D'];
                        //$Posi_M_Shft_ALW_D = $rows_ShiftALW['M_ShftALW_D'];
                }
            }
            else{
                $Posi_M_ShftALW_D = 0;
                $Posi_E_ShftALW_D = 0;
                $Posi_N_ShftALW_D = 0;
            }
            $ShiftALW = ($Posi_M_ShftALW_D * $M_Shft_D_PM) + ($Posi_E_ShftALW_D * $E_Shft_D_PM) + ($N_Shft_D_PM * $Posi_N_ShftALW_D) ; //ok

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
           // echo $strSQL_query_OT;
            while ($rows_OT = mysqli_fetch_array($OT_DATA)) {  
                $overtime_OVT10 = $rows_OT['OVT10'];
                $overtime_OVT15 = $rows_OT['OVT15'];
                $overtime_OVT20 = $rows_OT['OVT20'];
                $overtime_OVT25 = $rows_OT['OVT25'];
                $overtime_OVT30 = $rows_OT['OVT30'];
            }
            if($OT_Cal_F != 0){
                if($EmplType == "D"){
                    $Amt_T = $Salary / $Hr_work_D;
                }            
                else{
                    $Amt_T = $Salary / ( $Hr_work_M * 30 ) ;
                }
            }
            $OVT10HR =$overtime_OVT10  ;
            $OVT10 = round($OVT10HR * $Amt_T * 1 , 2);

            $OVT15HR =$overtime_OVT15 ;
            $OVT15 = round($OVT15HR * $Amt_T * 1.5, 2);

            $OVT20HR = $overtime_OVT20 ;
            $OVT20= round($OVT20HR * $Amt_T * 2.0, 2);

            $OVT25HR = $overtime_OVT25 ;
            $OVT25 = round($OVT25HR * $Amt_T * 2.5, 2);

            $OVT30HR =  $overtime_OVT30 ;
            $OVT30 =  round($OVT30HR * $Amt_T * 3.0, 2);
            // Ok
            // จำนวนชั่วโมงพักร้อน
            $SpecialALW = "0";
           // $SpecialALW = ($AL_Rem_Hrs * $Salary) / $Hr_work_M;

            // รายได้ก่อนหักภาษี
            $IncBfAmt = 0; // ก่อนคิด Tax
            $IncAfAmt = 0; // หลังคิด Tax
            $CompLoan = $CompLoan;
            $strSQL_query_DeductAmount = "SELECT  sum(Amount) as Amount 
             from tt04_otherdeduct WHERE TaxCalFlag = 1 AND Emplcode = '$EmplCode' ";
             $OtherDeduct_DATA = mysqli_query($conn, $strSQL_query_DeductAmount);
             $Deduct_Amount = 0;
             while ($rows_OtherDeduct = mysqli_fetch_array($OtherDeduct_DATA)) {  
                 $Deduct_Amount = $rows_OtherDeduct['Amount'];
             }
            $DedBfAmt = $Deduct_Amount;

            $strSQL_query_DeductAmount = "SELECT  sum(Amount) as Amount 
            from tt04_otherdeduct WHERE TaxCalFlag = 0 AND Emplcode = '$EmplCode' ";
            $OtherDeduct_DATA = mysqli_query($conn, $strSQL_query_DeductAmount);
            $Deduct_Amount = 0;
            while ($rows_OtherDeduct = mysqli_fetch_array($OtherDeduct_DATA)) {  
                $Deduct_Amount = $rows_OtherDeduct['Amount'];
            }
            $DedAfAmt =  $Deduct_Amount ;

            $sum_Inc = $IncBfAmt + $IncAfAmt  + $CompLoan + $DedBfAmt +  $DedAfAmt;
            if($sum_Inc > 0){
                $IncBfAmt = round( $IncBfAmt , 2);
                $IncAfAmt = round( $IncAfAmt , 2);
                $DedBfAmt = round( $DedBfAmt , 2);
                $DedAfAmt = round( $DedAfAmt , 2);
            }
            if($Attn_Cal_F == 1){
                $strSQL_query_attendance2 = "SELECT AttnCode, Ded_Flag, Ded_Rate, Hours  from tt04_attendance where 
                AttnDate BETWEEN '$lev_date_from' AND '$lev_date_to'  
                AND EmplCode = $EmplCode ";
                $attendance2_DATA = mysqli_query($conn, $strSQL_query_attendance2);
                while ($rows_attendance2 = mysqli_fetch_array($attendance2_DATA)) {  
                            $Ded_Flag = $rows_attendance2['Ded_Flag'];
                            $Hours = $rows_attendance2['Hours'];
                            $AttnCode = $rows_attendance2['AttnCode'];
                            $Ded_Rate = $rows_attendance2['Ded_Rate'];
                            if($Ded_Flag != 0 ){
                                    if($AttnCode == "L"){
                                        $LateHrs = $LateHrs + ($Hours * $Ded_Rate / 100);
                                    }
                                    else{
                                        $LevHrs = $LevHrs +  ($Hours * $Ded_Rate / 100);
                                    }
                            }
                            
                }
            }

            $LevAmt = $LateHrs;
            $LateAmt = $LevHrs ;

            // ประกันสังคม ดึงค่าจาก System Config  ประกาศตัวแปรไว้ด้านบนแล้ว
            $SOC_ResdALW_F_result = ($SOC_ResdALW_F== 1) ? $ResdALW  : 0;
            $SOC_CommALW_F_result = ($SOC_CommALW_F== 1) ? $CommAllow : 0;
            $SOC_LiveALW_F_result = ($SOC_LiveALW_F== 1) ? $LiveAllow : 0;
            $SOC_PosiALW_F_result = ($SOC_PosiALW_F== 1) ? $PosiAllow : 0;
            $SOC_Shift_F_result = ($SOC_ShiftALW_F== 1) ? $ShiftALW : 0;
            $SOC_NoAbs_F_result = ($SOC_NoAbsALW_F== 1) ?  $NoAbsALW  : 0;
            $SOC_OthALW1_result = ($SOC_OthALW1_F== 1) ? $OthALW1  : 0;
            $SOC_OthALW2_result = ($SOC_OthALW2_F== 1) ? $OthALW2  : 0;
            $SOC_OthALW3_result = ($SOC_OthALW3_F== 1) ? $OthALW3  : 0;
            $SOC_OthALW4_result = ($SOC_OthALW4_F== 1) ? $OthALW4  : 0;
            $SOC_OthALW5_result = ($SOC_OthALW5_F== 1) ? $OthALW5  : 0;
            $SOC_OthALW6_result = ($SOC_OthALW6_F== 1) ? $OthALW6  : 0;
            //expense
            $SOC_Expen1_result = ($SOC_Expen1_F== 1) ? $OthExpense1  : 0;
            $SOC_Expen2_result = ($SOC_Expen2_F== 1) ? $OthExpense2  : 0;
            $SOC_Expen3_result = ($SOC_Expen3_F== 1) ? $OthExpense3  : 0;
            $SOC_Expen4_result = ($SOC_Expen4_F== 1) ? $OthExpense4  : 0;
//echo $SOC_LiveALW_F_result;
            $M_Inc = $SOC_ResdALW_F_result + $SOC_CommALW_F_result + $SOC_LiveALW_F_result + $SOC_PosiALW_F_result +
            $SOC_Shift_F_result +  $SOC_NoAbs_F_result + $SOC_NoAbs_F_result +  $SOC_OthALW1_result +
            $SOC_OthALW2_result +  $SOC_OthALW3_result +  $SOC_OthALW4_result +  $SOC_OthALW5_result +  $SOC_OthALW6_result +
            $SOC_Expen1_result  + $SOC_Expen2_result  + $SOC_Expen3_result  + $SOC_Expen4_result + $SpecialALW  ;
            // ค่าประกันสังคม
            if($term == 2) {
                $M_Inc = $M_Inc + $Salary;
            }
            $Soc_Amt = $M_Inc * $SOC_Rate / 100;
            if($Soc_Amt != NULL){
                    if($Soc_Amt > $SOC_MX_Inc){
                        $Soc_Amt = $SOC_MX_Inc;
                    }
                    if($Soc_Amt < $SOC_MN_Inc){
                        $Soc_Amt = $SOC_MN_Inc;
                    }
            }

            $SocNetINC = round($M_Inc, 2);
            $SocTaxAmt = round($Soc_Amt) ;
            $format_date_Soc = date("Y-m", strtotime($_POST["period"]));
            $SocSttDate = ($term== 1) ? "$format_date_Soc-01"   : "$format_date_Soc-16";

            $P_Fund_E = 0;
            $P_Fund_C = 0;
            $TaxAmt = 0;
            $TaxAmtComp = 0;
            $TaxBfBonusAmt = 0;
            $BonusTaxAmt = 0;
            $BonusTaxAmtComp = 0;
            $DedFeneral = 0;
            $DedCooperative = 0;
            $DedMoneyLoan = 0;
            $DedGHB = 0;
            $SysUpdDate = $date;
            $SysUserID = $_SESSION['UserID'];
            $SysPgmID = $SysPgmID;

            $sql_insert_data_prepare_monthly_closing = "INSERT INTO tt05_monthlypaid(Period,
             Term, 
             EmplCode, 
             EmplType, 
             Salary, 
             Salary_decrypt, 
             Work_Days, 
             Sick_days, 
             CountHoliday, 
             CountPayLeave, 
             CountShift, 
             CountLate, 
             Salary_Cal, 
             ResdALW, 
             LiveAllow, 
             PosiAllow, 
             CommAllow, 
             ShiftALW, 
             NoAbsALW, 
             NoAbsALW_Accum_Level, 
             NoAbsALW_Accum_Paid, 
             OthALW1, 
             OthALW2, 
             OthALW3, 
             OthALW4, 
             OthALW5, 
             OthALW6, 
             OthExpense1, 
             OthExpense2, 
             OthExpense3, 
             OthExpense4, 
             OVT10HR, 
             OVT10, 
             OVT15HR, 
             OVT15, 
             OVT20HR, 
             OVT20, 
             OVT25HR, 
             OVT25, 
             OVT30HR, 
             OVT30, 
             SpecialALW, 
             IncBfAmt, 
             IncAfAmt, 
             DedBfAmt, 
             DedAfAmt, 
             LevAmt, 
             LateAmt, 
             CompLoan, 
             SocNetINC, 
             SocTaxAmt, 
             SocSttDate, 
             P_Fund_E, 
             P_Fund_C, 
             TaxAmt, 
             TaxAmtComp,
              TaxBfBonusAmt, 
              BonusTaxAmt, 
              BonusTaxAmtComp, 
              DedFeneral, 
              DedCooperative, 
              DedMoneyLoan, 
              DedGHB, 
              SysUpdDate, 
              SysUserID, 
              SysPgmID) VALUES ('$ConvertPeriodDate',
              '$term',
              '$EmplCode',
              '$EmplType',
              '$Salary',
              '',
              '$Work_Days',
              '$Sick_days',
              '$CountHoliday',
              '$CountPayLeave',
              '$CountShft',
              '$CountLate',
              '$Salary_Cal',
              '$ResdALW',
              '$LiveAllow',
              '$PosiAllow',
              '$CommAllow',
              '$ShiftALW',
              '$NoAbsALW',
              '$NoAbsALW_Accum_Level',
              '$NoAbsALW_Accum_Paid',
              '$OthALW1',
              '$OthALW2',
              '$OthALW3', 
              '$OthALW4', 
              '$OthALW5', 
              '$OthALW6', 
              '$OthExpense1', 
              '$OthExpense2', 
              '$OthExpense3', 
              '$OthExpense4', 
              '$OVT10HR', 
              '$OVT10', 
              '$OVT15HR', 
              '$OVT15', 
              '$OVT20HR', 
              '$OVT20', 
              '$OVT25HR', 
              '$OVT25', 
              '$OVT30HR', 
              '$OVT30', 
              '$SpecialALW', 
              '$IncBfAmt', 
              '$IncAfAmt', 
              '$DedBfAmt', 
              '$DedAfAmt', 
              '$LevAmt', 
              '$LateAmt', 
              '$CompLoan', 
              '$SocNetINC', 
              '$SocTaxAmt', 
              '$SocSttDate', 
              '$P_Fund_E', 
              '$P_Fund_C', 
              '$TaxAmt', 
              '$TaxAmtComp',
              '$TaxBfBonusAmt', 
              '$BonusTaxAmt', 
              '$BonusTaxAmtComp', 
              '$DedFeneral', 
              '$DedCooperative', 
              '$DedMoneyLoan', 
              '$DedGHB', 
              '$SysUpdDate', 
              '$SysUserID', 
              '$SysPgmID')";
            
            $objQuery_emp_detail = mysqli_query($conn, $sql_insert_data_prepare_monthly_closing);
            if($objQuery_emp_detail){
                $output=  'ทำการจัดเตรียมข้อมูลสำเร็จ';
                $output.= '<p> แสดงรายการข้อมูลพนักงาน</p>';
        
                $sql_select_prepare_emp_closing = "SELECT tt05_monthlypaid.* ,  tm03_employee.EmplTName ,tm02_department.DeptEDesc
                FROM tt05_monthlypaid 
                JOIN tm03_employee ON tm03_employee.EmplCode = tt05_monthlypaid.EmplCode 
                JOIN tm02_department ON tm03_employee.DeptCode = tm02_department.DeptCode 
                WHERE tt05_monthlypaid.Period='$ConvertPeriodDate' AND tt05_monthlypaid.Term='$term' AND tt05_monthlypaid.EmplType='$EmplType' " ;
              
                $emp_closing_DATA = mysqli_query($conn, $sql_select_prepare_emp_closing);
                $output.= '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                                            <tr>
                                            <th scope="col">รหัสพนักงาน</th>
                                            <th scope="col" style="text-align : center;">ชื่อพนักงาน</th>
                                            <th scope="col" style="text-align : center;">แผนก</th>
                                            <th scope="col" style="text-align : center;">เงินเดือน</th>
                                            <th scope="col" style="text-align : center;">จำนวนวันทำงาน(วัน)</th>
                                            <th scope="col" style="text-align : center;">วันที่ลาป่วย</th>
                                            <th scope="col" style="text-align: center;">วันหยุดที่จ่ายเงิน</th>
                                            <th scope="col" style="text-align: center;">เงินค่าครองชีพ</th>
                                            <th scope="col" style="text-align: center;">เงินประจำตำแหน่ง</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
        
                                        while ($rows = mysqli_fetch_array($emp_closing_DATA)) {
                                            $EmplCode = $rows['EmplCode'];
                                            $EmplTName = $rows['EmplTName'];
                                            //$EmplType = ($rows['EmplType'] == 'M') ? "รายเดือน" : "รายวัน";
                                            $DeptEDesc = $rows['DeptEDesc'];
                                            $Salary = $rows['Salary'];
                                            $Work_Days = $rows['Work_Days'];
                                            $Sick_days = $rows['Sick_days'];
                                            $CountHoliday = $rows['CountHoliday'];
                                            $LiveAllow = $rows['LiveAllow'];
                                            $PosiAllow = $rows['PosiAllow'];
        
                                            $output.='  <tr>
                                            <td style="text-align: center;"> '.$EmplCode.'</td>
                                            <td >'.$EmplTName.'</td>
                                            <td>'.$DeptEDesc.'</td>
                                            <td style="text-align: center;">'.$Salary.'</td>
                                            <td style="text-align: center;">'.$Work_Days.'</td>
                                            <td style="text-align: center;">'.$Sick_days.'</td>
                                            <td style="text-align: center;">'.$CountHoliday.'</td>
                                            <td style="text-align: center;">'.$LiveAllow.'</td>
                                            <td style="text-align: center;">'.$PosiAllow.'</td>
                                        </tr>';
                                        }
        
                $output.='
                                        </tbody>
                </table>' ;
            }
            else{
                $output= 'ขออภัย!  ไม่สามารถทำรายการได้';
            }
    }
       // echo  'ทำการบันทึกข้อมูลสำเร็จ';
    }
    else
    {
        $output= 'ขออภัย! เนื่องจากมีรหัส Period นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้';
    }

    }
echo $output;
?>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            "order": [[ 0, "desc" ], [ 1, 'desc' ]]
        });
    });
    </script>