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
    $SysPgmID = "FM02_Branch";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_branch ";
    $strSQL .="(BranchCode, BranchEName, BranchTName,Address,PhoneNo,
                SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["BranchCode"]."','".$_POST["BranchEName"]."','".$_POST["BranchTName"]."','".$_POST["Address"]."','".$_POST["PhoneNo"]."',
                '".$date."','".$_SESSION['UserID']."','".$SysPgmID."')";
    $objQuery = mysqli_query($conn, $strSQL);
    $result = "";
    if($objQuery)
    {
        $result = 'ทำการบันทึกข้อมูลสำเร็จ';
    }
    else
    {
        $result = '<script>alert("ขออภัย! เนื่องจากมี รหัส นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
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
    <a href="branch.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
