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
    $strSQL = "UPDATE tm00_control ";
    $strSQL .= "SET PayDate = '".($_POST["paydate"])."',
    Holiday = '".($_POST["Holiday"])."'";
    $strSQL .="WHERE auto_increment = '".$_POST["id"]."'";
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
    <a href="systemcon.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
