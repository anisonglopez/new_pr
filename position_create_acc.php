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
    $SysPgmID = "FM02_Position";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_position ";
    $strSQL .="(PosiCode, PosiEDesc, PosiTDesc, 
                PosiALW, FareALW_PD, M_ShftALW_D, E_ShftALW_D, 
                N_ShftALW_D, SysUpdDate, SysUserID, 
                SysPgmID) ";

    $strSQL .="VALUES ";

    $strSQL .="('".$_POST["PosiCode"]."',
  '".$_POST["PosiEDesc"]."',
  '".$_POST["PosiTDesc"]."',
  '".$_POST["PosiALW"]."',
  '"."0"."',
  '".$_POST["M_ShftALW_D"]."',
  '".$_POST["E_ShftALW_D"]."',
  '".$_POST["N_ShftALW_D"]."',
  '".$date."','".$_SESSION['UserID']."',
  '".$SysPgmID."' )";

     $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
    {
        $result = 'ทำการบันทึกข้อมูลสำเร็จ';
    }
    else
    {
        $result = 'ขออภัย! เนื่องจากมีรหัสตำแหน่ง นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้';
    }
    }
}
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <?php echo $result; ?>
    <a href="position.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
