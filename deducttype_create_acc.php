<?php
error_reporting(0);
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<?php if(isset($_POST["create"])) {
   if($_POST["TaxCalFlag"] != 1)
   {
     $_POST["TaxCalFlag"] = 0;
   } 
     $ConvertPeriodDate = date("Ym", strtotime($_POST["period"]));
     $SysPgmID = "TM02_DeductType";
     date_default_timezone_set("Asia/Bangkok");
     $date = date('Y-m-d H:i:s');
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $strSQL = "INSERT INTO tm02_deducttype ";
     $strSQL .="(DeductDesc, DeductTDesc, 
                 DeductAmt, 
                 DeductAmt2, 
                 DeductAmt3, 
                 DeductAmt4, 
                 DeductAmt5, 
                 TaxCalFlag, 
                 SysUpdDate, 
                 SysUserID, 
                 SysPgmID) ";
     $strSQL .="VALUES ";
     $strSQL .="('".$_POST["DeductDesc"]."',
     '".$_POST["DeductTDesc"]."',
     '".$_POST["DeductAmt"]."',
     '".$_POST["DeductAmt2"]."',
     '".$_POST["DeductAmt3"]."',
     '".$_POST["DeductAmt4"]."',
     '".$_POST["DeductAmt5"]."',
     '".$_POST["TaxCalFlag"]."',
     '".$date."','".$_SESSION['UserID']."',
     '".$SysPgmID."')";
     //$strSQL .="('".mysqli_real_escape_string($_POST["period"])."', '"($_POST["term"])."', '".mysqli_real_escape_string($_POST["emp_type"])."', '".($_POST["salary_date_from"])."', '".$_POST["salary_date_to"]. "' , '" .$_POST["overtime_date_from"]."' ,'" .$_POST["overtime_date_to"]."' , '" .$_POST["user_login"]."' , 'FM01_User' )";
     $objQuery = mysqli_query($conn, $strSQL);
     if($objQuery)
     {
         $result = 'ทำการบันทึกข้อมูลสำเร็จ';
     }
     else
     {
         $result = 'ขออภัย! เนื่องจากมีรหัส นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้';
         //header("Location: " . $_SERVER['REQUEST_URI']);
        // header("location: ../../user.php");
     }
     }
 }
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <?php echo $result; ?>
    <a href="deducttype.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
