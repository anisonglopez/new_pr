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
<?php
if(isset($_POST["create"])) {
    $ConvertPeriodDate = date("Ym", strtotime($_POST["period"]));
    $SysPgmID = "FT04_PositionAllow";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tt04_positionallow ";
    $strSQL .="(`auto_increment`, 
    `EmplCode`, 
    `PosiCode`, 
    `PosiAllow`, 
    `Remark`, 
    `SysUpdDate`, 
    `SysUserID`, 
    `SysPgmID`) ";

    $strSQL .="VALUES ";

    $strSQL .="('',
  '".$_POST["EmplCode"]."',
  '".$_POST["PosiCode"]."',
  '".$_POST["PosiAllow"]."',
  '".$_POST["Remark"]."',
  '".$date."','".$_SESSION['UserID']."',
  '".$SysPgmID."' )";

     $objQuery = mysqli_query($conn, $strSQL);

    if($objQuery)
    {
        $result = 'ทำการบันทึกข้อมูลสำเร็จ';
    }
    else
    {
        $result = 'ขออภัย! ไม่สามารถทำการบันทึกข้อมูลได้';
    }
    }
}
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <?php echo $result; ?>
    <a href="positionallow.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
