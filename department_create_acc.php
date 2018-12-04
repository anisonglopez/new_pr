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
   $SysPgmID = "FM02_Department";
   date_default_timezone_set("Asia/Bangkok");
   $date = date('Y-m-d H:i:s');
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $strSQL = "INSERT INTO tm02_department ";
   $strSQL .="(DeptCode, DeptEDesc, DeptTDesc, 
               SysUpdDate, SysUserID, SysPgmID) ";
   $strSQL .="VALUES ";
   $strSQL .="('".$_POST["DeptCode"]."','".$_POST["DeptEDesc"]."','".$_POST["DeptTDesc"]."',
               '".$date."','".$_SESSION['UserID']."','".$SysPgmID."')";
   //$strSQL .="('".mysqli_real_escape_string($_POST["period"])."', '"($_POST["term"])."', '".mysqli_real_escape_string($_POST["emp_type"])."', '".($_POST["salary_date_from"])."', '".$_POST["salary_date_to"]. "' , '" .$_POST["overtime_date_from"]."' ,'" .$_POST["overtime_date_to"]."' , '" .$_POST["user_login"]."' , 'FM01_User' )";
   $objQuery = mysqli_query($conn, $strSQL);
   if($objQuery)
   {
       $result = 'ทำการบันทึกข้อมูลสำเร็จ';
   }
   else
   {
       $result = 'ขออภัย! เนื่องจากมีรหัสแผนก นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้';
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
    <a href="department.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
