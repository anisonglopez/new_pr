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
    if($_POST["TaxCalFlag"] != 1)
    {
      $_POST["TaxCalFlag"] = 0;
    } 
    $SysPgmID = "FM02_OtherINC";
      date_default_timezone_set("Asia/Bangkok");
      $date = date('Y-m-d H:i:s');
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $strSQL = "INSERT INTO tm02_otherinc ";
      $strSQL .="(OthINCCode, OthINCEDesc, OthINCTDesc, OthIncAmt, TaxCalFlag, SysUpdDate, SysUserID, SysPgmID) ";
      $strSQL .="VALUES ";
      $strSQL .="('".$_POST["OthINCCode"]."',
                '".$_POST["OthINCEDesc"]."',
                '".$_POST["OthINCTDesc"]."',
                '".$_POST["OthIncAmt"]."',
                '".$_POST["TaxCalFlag"]."',
                '".$date. "' , '" .$_POST["user_login"]."' , '" .$SysPgmID ."' )";
  
      $objQuery = mysqli_query($conn, $strSQL);
      if($objQuery)
      {
          $result = 'ทำการบันทึกข้อมูลสำเร็จ';
          
      }
      else
      {
          $result = 'ขออภัย! ไม่สามารถทำการบันทึกข้อมูลได้';
          
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
    <a href="empincome.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
