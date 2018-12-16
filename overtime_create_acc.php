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
    $SysPgmID = "ATCS";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tt04_overtime ";
    $strSQL .="(EmplCode, AttnDate, OVT10, OVT15, OVT20, OVT25, OVT30, SpecialALW, SysUpdDate, SysUserID, SysPgmID) ";

    $strSQL .="VALUES ";

    $strSQL .="('".$_POST["EmplCode"]."',
  '".$_POST["AttnDate"]."',
  '".$_POST["OVT10"]."',
  '".$_POST["OVT15"]."',
  '".$_POST["OVT20"]."',
  '".$_POST["OVT25"]."',
  '".$_POST["OVT30"]."',
  '',
  '".$date."','".$_SESSION['UserID']."',
  '".$SysPgmID."' )";
     $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
    {
        $result = 'ทำการบันทึกข้อมูลสำเร็จ';
    }
    else
    {
        $result = 'ขออภัย!  ไม่สามารถทำการบันทึกข้อมูลได้';
    }
    }
}
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <?php echo $result; ?>
    <a href="overtime.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
