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
    $strSQL = "UPDATE tm02_otherinc ";
    $strSQL .= "SET OthINCEDesc='".$_POST["OthINCEDesc"]."',OthINCTDesc='".$_POST["OthINCTDesc"]."',OthIncAmt='".$_POST["OthIncAmt"]."',TaxCalFlag='".$_POST["TaxCalFlag"]."'";
    $strSQL .= " WHERE OthINCCode = '".$_POST["id"]."'";
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
    <a href="empincome.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
