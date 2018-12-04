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
if(isset($_GET["UserID"])) {    
    $strSQL = "SELECT * FROM tm01_user WHERE UserID = '".$_GET["UserID"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
        $UserID = $rows["UserID"];
        $UserTName = $rows["UserTName"];
        $UserEName = $rows["UserEName"];
}  }
 ?>
 
        <div class="row">
<!-- Blog Entries Column -->
<div class="col-md-12">
            <h1>Change User Profile</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="userprofile_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="userprofile.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success" id="update_submit_btn">อัปเดตข้อมูล </button>
                    </div>
                    <div class="panel-body">
                    <input type="hidden" name="id" value="'.$_GET["UserID"].'">
    <br>
    <div class="row">
    <div class="col-md-12">
    <dl class="row">
        <dt class="col-sm-2 info-box-label">Username : <span class="field-required">*</span></dt>
        <dd class="col-sm-4 info-box-label">
        <input name="" value="<?php echo $UserID ?>" type="text" data-placement="top" required  disabled class="form-control" placeholder="ระบุ Username"  maxlength="20" title="กรุณาระบุชื่อผู้ใช้งานเป็นภาษาอังกฤษ" pattern="\w+"/ >
            <input name="username" value="<?php echo $UserID ?>" type="hidden" />
        </dd>
    </dl>
</div>
<div class="col-md-12">
    <dl class="row">
        <dt class="col-sm-2 info-box-label">Password : <span class="field-required">*</span></dt>
        <dd class="col-sm-4 info-box-label">
        <input id="password" name="password" type="password" data-placement="top" required  class="form-control"placeholder="ระบุรหัสผ่าน" minlength="6" maxlength="10"  pattern="\w+"  title="ระบุรหัสผ่านเป็นภาษาอังกฤษ 6 - 10 ตัวอักษร"/>
        </dd>
    </dl>
</div>
<div class="col-md-12">
    <dl class="row">
        <dt class="col-sm-2 info-box-label">Confirm Password : <span class="field-required">*</span></dt>
        <dd class="col-sm-4 info-box-label">
        <input id="confirm_password"  name="confirm_password" type="password" data-placement="top" required  class="form-control" placeholder="ระบุรหัสผ่านอีกครั้ง" minlength="5" maxlength="10" name="pwd2"/>
<span id="message"></span>
        </dd>
    </dl>
</div>
<div class="col-md-12">
    <dl class="row">
        <dt class="col-sm-2 info-box-label">ชื่อผู้ใช้งาน(EN) : </dt>
        <dd class="col-sm-8 info-box-label">
        <input name="descTH"  value="<?php echo $UserEName ?>"  type="text" data-placement="top"   class="form-control" placeholder="ระบุชื่อผู้ใช้งาน (EN)"/>
        </dd>
    </dl>
</div>
<div class="col-md-12">
    <dl class="row">
        <dt class="col-sm-2 info-box-label">ชื่อผู้ใช้งาน(TH) : </dt>
        <dd class="col-sm-8 info-box-label">
        <input name="descEN" value="<?php echo $UserTName ?>"  type="text" data-placement="top"   class="form-control" placeholder="ระบุชื่อผู้ใช้งาน (TH)"/>
        </dd>
    </dl>
</div>       
<!-- สุด div -->

</div>
                    </div>
                </form>
<br>
</div>
<!-- Blog Sidebar Widgets Column -->
<!-- /.row -->
<script src="dependencies/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
<script>
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    document.getElementById("update_submit_btn").disabled = false,    
    $('#message').html('รหัสผ่านสามารถเข้ากันได้').css('color', 'green');
  }
   else 
  document.getElementById("update_submit_btn").disabled = true,    
    $('#message').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
});
</script>
<?php include("includes/footer.php"); ?>


