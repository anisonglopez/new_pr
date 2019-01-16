<?php
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<?php
error_reporting(0);
if(isset($_POST["create"])) {
$target_dir = "file_upload/emp_img/";
$target_file = $target_dir . basename($_FILES["emp_pic"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;
    //upload emp image
    $check = getimagesize($_FILES["emp_pic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["emp_pic"]["tmp_name"], $target_file)) {
           // echo "The file ". basename( $_FILES["emp_pic"]["name"]). " has been uploaded.";
   date_default_timezone_set("Asia/Bangkok");
   $date = date('Y-m-d H:i:s');
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $strSQL = "INSERT INTO tm03_employee ";
   $strSQL .="(`EmplCode`, 
               `EmplType`, 
               `ProcCode`, 
               `OT_Cal_F`, 
               `Attn_Cal_F`, 
               `EmplTName`, 
               `EmplEName`, 
               `DeptCode`, 
               `PosiCode`, 
               `EnterDate`, 
               `ProbFlag`, 
               `ProbDate`, 
               `ResignDate`, 
               `BankCode`, 
               `BankAccCode`, 
               `Sex`, 
               `Salary`, 
               `L_C_Gross`, 
               `L_C_Tax`, 
               `L_C_SOC`, 
               `BranchCode`, 
               `CompLoan`, 
               `Marital`, 
               `MarriageNo`, 
               `MarriagedDate`, 
               `TaxID`, 
               `TaxCond`, 
               `SpouseName`, 
               `ChildInEduc`, 
               `ChildNotEduc`, 
               `Own_Fath_Red_F`, 
               `Own_Fath_ID`, 
               `Own_Moth_Red_F`, 
               `Own_Moth_ID`, 
               `SP_Fath_Red_F`, 
               `SP_Fath_ID`, 
               `SP_Moth_Red_F`, 
               `SP_Moth_ID`, 
               `Address`, 
               `PostalCode`, 
               `HomePhone`, 
               `Nationality`, 
               `Ethnic`, 
               `Religion`, 
               `BirthDate`, 
               `IDno`, 
               `Height`, 
               `Weight`, 
               `UM_Flag`, 
               `PF_Flag`, 
               `PF_MemNo`, 
               `PF_EnterDate`, 
               `PF_E_Rate`, 
               `AL_Rem_Hrs`, 
               `O_Shft_D_PM`, 
               `M_Shft_D_PM`, 
               `E_Shft_D_PM`, 
               `N_Shft_D_PM`, 
               `Attn_ALW_F`, 
               `Attn_ALW_Accum`, 
               `Attn_ALW_AccumNext`, 
               `SL_Day`, 
               `SysUpdDate`, 
               `SysUserID`, 
               `SysPgmID`, 
               `Feneral_F`, 
               `Cooperative_F`, 
               `MoneyLoan_F`, 
               `GHB_F`, 
               `AccMoneyLoan`, 
               `LoanType`, 
               `LoanAmt`, 
               `AccGHB`, 
               `GHBType`, 
               `GHBAmt`, 
               `UnionMemberAmt`, 
               `AwardAmt`, 
               `CooperativeAmt01`, 
               `CooperativeMemId01`, 
               `CooperativeUnit01`, 
               `CooperativeAmt02`, 
               `CooperativeMemId02`, 
               `CooperativeUnit02`,
               `emp_pic`) ";
   $strSQL .="VALUES ";
   $strSQL .="('".$_POST["EmplCode"]."', 
   '".$_POST["EmplType"]."', 
   '".$_POST["ProcCode"]."', 
   '".$_POST["OT_Cal_F"]."', 
   '".$_POST["Attn_Cal_F"]."', 
   '".$_POST["EmplTName"]."', 
   '".$_POST["EmplEName"]."', 
   '".$_POST["DeptCode"]."', 
   '".$_POST["PosiCode"]."', 
   '".$_POST["EnterDate"]."', 
   '".$_POST["ProbFlag"]."', 
   '".$_POST["ProbDate"]."', 
   '".$_POST["ResignDate"]."', 
   '".$_POST["BankCode"]."', 
   '".$_POST["BankAccCode"]."', 
   '".$_POST["Sex"]."', 
   '".$_POST["Salary"]."', 
   '".$_POST["L_C_Gross"]."', 
   '".$_POST["L_C_Tax"]."', 
   '".$_POST["L_C_SOC"]."', 
   '".$_POST["BranchCode"]."', 
   '".$_POST["CompLoan"]."', 
   '".$_POST["Marital"]."', 
   '".$_POST["MarriageNo"]."', 
   '".$_POST["MarriagedDate"]."', 
   '".$_POST["TaxID"]."', 
   '".$_POST["TaxCond"]."', 
   '".$_POST["SpouseName"]."', 
   '".$_POST["ChildInEduc"]."', 
   '".$_POST["ChildNotEduc"]."', 
   '".$_POST["Own_Fath_Red_F"]."', 
   '".$_POST["Own_Fath_ID"]."', 
   '".$_POST["Own_Moth_Red_F"]."', 
   '".$_POST["Own_Moth_ID"]."', 
   '".$_POST["SP_Fath_Red_F"]."', 
   '".$_POST["SP_Fath_ID"]."', 
   '".$_POST["SP_Moth_Red_F"]."', 
   '".$_POST["SP_Moth_ID"]."', 
   '".$_POST["Address"]."', 
   '".$_POST["PostalCode"]."', 
   '".$_POST["HomePhone"]."', 
   '".$_POST["Nationality"]."', 
   '".$_POST["Ethnic"]."', 
   '".$_POST["Religion"]."', 
   '".$_POST["BirthDate"]."', 
   '".$_POST["IDno"]."', 
   '".$_POST["Height"]."', 
   '".$_POST["Weight"]."', 
   '".$_POST["UM_Flag"]."', 
   '".$_POST["PF_Flag"]."', 
   '".$_POST["PF_MemNo"]."', 
   '".$_POST["PF_EnterDate"]."', 
   '".$_POST["PF_E_Rate"]."', 
   '".$_POST["AL_Rem_Hrs"]."', 
   '".$_POST["O_Shft_D_PM"]."', 
   '".$_POST["M_Shft_D_PM"]."', 
   '".$_POST["E_Shft_D_PM"]."', 
   '".$_POST["N_Shft_D_PM"]."', 
   '".$_POST["Attn_ALW_F"]."', 
   '".$_POST["Attn_ALW_Accum"]."', 
   '".$_POST["Attn_ALW_AccumNext"]."', 
   '".$_POST["SL_Day"]."', 
   '".$date."', 
   '".$_POST["user_login"]."', 
   'ATCS', 
   '".$_POST["Feneral_F"]."', 
   '".$_POST["Cooperative_F"]."', 
   '".$_POST["MoneyLoan_F"]."', 
   '".$_POST["GHB_F"]."', 
   '".$_POST["AccMoneyLoan"]."', 
   '".$_POST["LoanType"]."', 
   '".$_POST["LoanAmt"]."', 
   '".$_POST["AccGHB"]."', 
   '".$_POST["GHBType"]."', 
   '".$_POST["GHBAmt"]."', 
   '".$_POST["UnionMemberAmt"]."', 
   '".$_POST["AwardAmt"]."', 
   '".$_POST["CooperativeAmt01"]."', 
   '".$_POST["CooperativeMemId01"]."', 
   '".$_POST["CooperativeUnit01"]."', 
   '".$_POST["CooperativeAmt02"]."', 
   '".$_POST["CooperativeMemId02"]."', 
   '".$_POST["CooperativeUnit02"]."',
   '".$_FILES["emp_pic"]["name"]."')";
   $objQuery = mysqli_query($conn, $strSQL);
   $result = "";
   if($objQuery)
   {
       $result = 'ทำการบันทึกข้อมูลสำเร็จ';
       
   }
   else
   {
       $result = 'ขออภัย! ไม่สามารถทำการบันทึกข้อมูลได้';
       
       //header("Location: " . $_SERVER['REQUEST_URI']);
      // header("location: ../../user.php");
   }
 }
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    //upload image
    
       
   }
?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
    <?php echo $result ?>
    <br>
            <a href="employee.php">กลับ</a>
          
         

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">   
                 <?php include("includes/sidebar.php"); ?>
        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
