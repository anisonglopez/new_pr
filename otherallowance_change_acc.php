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
    $SysPgmID = "FT04_OtherAllow";
    $strSQL = "UPDATE `tt04_otherallow` SET 
    `OthAllow1`= '".$_POST["OthAllow1"]."',
    `OthAllow2`= '".$_POST["OthAllow2"]."',
    `OthAllow3`= '".$_POST["OthAllow3"]."',
    `OthAllow4`= '".$_POST["OthAllow4"]."',
    `OthAllow5`= '".$_POST["OthAllow5"]."',
    `OthAllow6`= '".$_POST["OthAllow6"]."',
    `Remark`= '".$_POST["Remark"]."',
    `SysUpdDate`= '".$date."',
    `SysUserID`='".$_SESSION["UserID"]."' ";
    $strSQL .= " WHERE auto_increment = '".$_POST["id"]."'";
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
    <a href="otherallowance.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
