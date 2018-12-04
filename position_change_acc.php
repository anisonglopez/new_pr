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
if(isset($_POST["update"]))  {
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    $SysPgmID = "FM02_Position";
    $strSQL = "UPDATE tm02_position ";
    $strSQL .= "SET PosiEDesc='".$_POST["PosiEDesc"]."',PosiTDesc='".$_POST["PosiTDesc"]."',PosiALW='".$_POST["PosiALW"]."',
                    FareALW_PD='".$_POST["FareALW_PD"]."',M_ShftALW_D='".$_POST["M_ShftALW_D"]."',E_ShftALW_D='".$_POST["E_ShftALW_D"]."',
                    N_ShftALW_D='".$_POST["N_ShftALW_D"]."',SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."',
                    SysPgmID='". $SysPgmID."'";
    $strSQL .= " WHERE PosiCode = '".$_POST["id"]."'";
        $objQuery = mysqli_query($conn, $strSQL);    
         if($objQuery)
       {
           $result = 'ทำการแก้ไขข้อมูลสำเร็จ';
           //echo '<script>window.location.href="user.php"</script>';
       }
       else
       {
           $result = 'ขออภัย! ไม่สามารถทำการอัปเดตข้อมูลได้';
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
