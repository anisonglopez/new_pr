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
    $SysPgmID = "FM02_Department";
    $strSQL = "UPDATE tm02_department ";
    $strSQL .= "SET DeptEDesc='".$_POST["DeptEDesc"]."',DeptTDesc='".$_POST["DeptTDesc"]."',SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."',
                    SysPgmID='".$SysPgmID ."'";
    $strSQL .= " WHERE DeptCode = '".$_POST["id"]."'";
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
    <a href="department.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
