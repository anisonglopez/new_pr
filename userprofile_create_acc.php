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
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    $strSQL = "INSERT INTO tm01_user ";
    $strSQL .="(UserID, Password, UserEName, UserTName, SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".($_POST["username"])."', '".($_POST["password"])."', '".($_POST["descEN"])."',
 '".($_POST["descTH"])."', '".$date. "' , '" .$_POST["user_login"]."' , 'FM01_User' )";
     $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
    {
        $result = 'ทำการบันทึกข้อมูลสำเร็จ';
    }
    else
    {
        $result = 'ขออภัย! เนื่องจากมีชื่อผู้ใช้งานนี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้';
    }
    }
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <?php echo $result; ?>
    <a href="userprofile.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
