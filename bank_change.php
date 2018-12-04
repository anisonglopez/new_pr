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
if(isset($_GET["bankcode"])) {    
    $strSQL = "SELECT * FROM tm02_bank WHERE bankcode = '".$_GET["bankcode"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
    $output .= '<input type="hidden" name="id" value="'.$_GET["bankcode"].'">
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">รหัสธนาคาร : <span class="field-required">*</span></dt>
            <dd class="col-sm-2 info-box-label">
            <input name="bankcode" type="text" value="'.$rows["bankcode"].'" data-placement="top" required  class="form-control" disabled/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">ชื่อธนาคาร(ENG) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="BankEName" type="text" value="'.$rows["BankEName"].'" data-placement="top" required  class="form-control" maxlength="100" />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">ชื่อธนาคาร(TH) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="BankTName" type="text" value="'.$rows["BankTName"].'" data-placement="top"  class="form-control"  maxlength="100"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">ที่อยู่ : </dt>
            <dd class="col-sm-8 info-box-label">
            <textarea class="form-control" rows="5" name="Address" id="comment">'.$rows["Address"].'</textarea>       
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">เบอร์โทรศัพท์ : </dt>
            <dd class="col-sm-5 info-box-label">
            <input name="PhoneNo" type="text" value="'.$rows["PhoneNo"].'" data-placement="top"  class="form-control"  maxlength="50"/>      
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
            <h1>Change Bank</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="bank_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="bank.php">
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


