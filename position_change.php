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
if(isset($_GET["PosiCode"])) {    
    $strSQL = "SELECT * FROM tm02_position WHERE PosiCode = '".$_GET["PosiCode"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
        $ConvertPeriodDate = date("Y-m", strtotime($rows["Period"]));
    $output .= '<input type="hidden" name="id" value="'.$_GET["PosiCode"].'">
    <br>
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">รหัสตำแหน่ง : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiCode" type="text" value="'.$rows["PosiCode"].'" data-placement="top" required  class="form-control"  disabled/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">ตำแหน่ง(ENG) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="PosiEDesc" type="text" value="'.$rows["PosiEDesc"].'" data-placement="top" required  class="form-control" maxlength="50"  />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">ตำแหน่ง(TH) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="PosiTDesc" type="text" value="'.$rows["PosiTDesc"].'" data-placement="top"  required class="form-control"  maxlength="20"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">เบี้ยเลี้ยง/เดือน : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="PosiALW" value="'.$rows["PosiALW"].'" type="number" data-placement="top"  class="form-control" min="0"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">เบี้ยเลี้ยง/วัน(เช้า) : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="M_ShftALW_D" value="'.$rows["M_ShftALW_D"].'" type="number" data-placement="top"  class="form-control" min="0"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">เบี้ยเลี้ยง/วัน(บ่าย) : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="E_ShftALW_D" value="'.$rows["E_ShftALW_D"].'" type="number" data-placement="top"  class="form-control" min="0"  maxlength="20"/>   
            </dd>
          </dl>
        </div> 
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">เบี้ยเลี้ยง/วัน(เย็น) : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="N_ShftALW_D" value="'.$rows["N_ShftALW_D"].'" type="number" data-placement="top"  class="form-control" min="0"  maxlength="20"/>   
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
            <h1>แก้ไขตำแหน่งงาน</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="position_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="position.php">
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


