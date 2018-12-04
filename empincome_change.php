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
if(isset($_GET["OthINCCode"])) {    
    $strSQL = "SELECT * FROM tm02_otherinc WHERE OthINCCode = '".$_GET["OthINCCode"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
      $taxflag =  ($rows["TaxCalFlag"] == 1 ? 'checked' : ''); 
    $output .= '<input type="hidden" name="id" value="'.$_GET["OthINCCode"].'">
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Income No  : <span class="field-required">*</span></dt>
            <dd class="col-sm-2 info-box-label">
            <input name="OthINCCode" type="text" value="'.$rows["OthINCCode"].'" data-placement="top" required  class="form-control" disabled/ >      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (EN) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="OthINCEDesc" type="text" value="'.$rows["OthINCEDesc"].'" data-placement="top" required  class="form-control" maxlength="100"/>
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (TH) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="OthINCTDesc" type="text" value="'.$rows["OthINCTDesc"].'" data-placement="top"  class="form-control"  maxlength="100"/ >      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="OthIncAmt" type="number" value="'.$rows["OthIncAmt"].'" data-placement="top"  class="form-control" min="0"/ >   
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
                        </div>
                    </div>
                </div>
                       
<!--END-->

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
                    <form class="form-inline"  method="post"  action="empincome_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="empincome.php">
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


