<?php
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<?php
include "config/connect.php";
if(isset($_GET["id"])) {    
    $strSQL = "DELETE FROM tt04_otherdeduct ";
    $strSQL .="WHERE auto_increment = '".$_GET["id"]."' ";
    $objQuery = mysqli_query($conn, $strSQL);
    $result = "";
    if($objQuery)
  {
    $result = 'ทำการลบข้อมูลสำเร็จ';
    //   echo '<script>window.location.href="employee.php"</script>';
     // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
    //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
  }
  else
  {
    $result = 'ไม่สามารถทำการลบข้อมูลได้';
  }
 } 
?>
        <div class="row">
<!-- Blog Entries Column -->
<div class="col-md-8">
<?php echo $result ?>
<br>
<a href="otherdeduct.php">กลับ</a>
</div>
<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">   
     <?php include("includes/sidebar.php"); ?>
</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>


