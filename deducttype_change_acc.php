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
    if($_POST["TaxCalFlag"] != 1)
  {
    $_POST["TaxCalFlag"] = 0;
  } 
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    $strSQL = "UPDATE tm02_deducttype ";
    $strSQL .= "SET DeductDesc='".$_POST["DeductDesc"]."',
    DeductTDesc='".$_POST["DeductTDesc"]."',
    DeductAmt='".$_POST["DeductAmt"]."',
    DeductAmt='".$_POST["DeductAmt"]."',
    DeductAmt2='".$_POST["DeductAmt2"]."',
    DeductAmt3='".$_POST["DeductAmt3"]."',
    DeductAmt4='".$_POST["DeductAmt4"]."',
    DeductAmt5='".$_POST["DeductAmt5"]."',
                    TaxCalFlag='".$_POST["TaxCalFlag"]."',SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."',
                    SysPgmID='".$_POST["SysPgmID"]."'";
    $strSQL .= " WHERE DeductCode = '".$_POST["id"]."'";
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
    <a href="deducttype.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
