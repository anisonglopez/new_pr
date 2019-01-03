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
include "config/connect.php";
if(isset($_GET["DeptCode"])) {    
    $strSQL = "SELECT * FROM tm02_department WHERE DeptCode = '".$_GET["DeptCode"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
    $output .= '<input type="hidden" name="id" value="'.$_GET["DeptCode"].'">
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">รหัสแผนก/ฝ่าย : <span class="field-required">*</span></dt>
            <dd class="col-sm-2 info-box-label">
            <input name="DeptCode" type="text" value="'.$rows["DeptCode"].'" data-placement="top" required  class="form-control" disabled/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">คำอธิบาย (EN) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeptEDesc" type="text" value="'.$rows["DeptEDesc"].'" data-placement="top" required  class="form-control" maxlength="100" />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">คำอธิบาย (TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeptTDesc" type="text" value="'.$rows["DeptTDesc"].'" data-placement="top" required  class="form-control"  maxlength="100"/>      
            </dd>
          </dl>
        </div>

</div>

         ';  
}  }
 ?>
 
        <div class="row">
<!-- Blog Entries Column -->
<div class="col-md-12">
            <h1>แก้ไขแผนก/ฝ่าย</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="department_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="department.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success">อัปเดตข้อมูล </button>
                    </div>
                    <div class="panel-body">
                    <?php  echo $output;?>
                    </div>
                </form>
<br>
</div>
<!-- Blog Sidebar Widgets Column -->
<!-- /.row -->

<?php include("includes/footer.php"); ?>


