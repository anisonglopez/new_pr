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
if(isset($_GET["DeductCode"])) {    
    $strSQL = "SELECT * FROM tm02_deducttype WHERE DeductCode = '".$_GET["DeductCode"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
   $taxflag =  ($rows["TaxCalFlag"] == 1 ? 'checked' : ''); 
    $output .= '<input type="hidden" name="id" value="'.$_GET["DeductCode"].'">
    <br>
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (EN) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeductDesc" type="text" value="'.$rows["DeductDesc"].'" data-placement="top" required  class="form-control" maxlength="50" />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeductTDesc" type="text" value="'.$rows["DeductTDesc"].'" data-placement="top"  class="form-control"  maxlength="50"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount_1 : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="DeductAmt" type="number" value="'.$rows["DeductAmt"].'" data-placement="top"  class="form-control"  min="0"maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount_2 : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="DeductAmt2" type="number" value="'.$rows["DeductAmt2"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount_3 : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="DeductAmt3" type="number" value="'.$rows["DeductAmt3"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount_4 : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="DeductAmt4" type="number" value="'.$rows["DeductAmt4"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount_5 : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="DeductAmt5" type="number" value="'.$rows["DeductAmt5"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Tax Calculate Flag : </dt>
            <dd class="col-sm-2">
            <div class="material-switch">
            <input id="TaxCalFlag" name="TaxCalFlag" type="checkbox" value="1" 
            '.$taxflag .'/>
             <label for="TaxCalFlag" class="label-success"></label>
         </div>  
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
            <h1>Change Deduct Type</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="deducttype_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="deducttype.php">
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


