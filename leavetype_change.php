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
if(isset($_GET["AttnCode"])) {    
    $strSQL = "SELECT * FROM tm02_attncode WHERE AttnCode = '".$_GET["AttnCode"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
   $deductFlg =  ($rows["Ded_Flag"] == 1 ? 'checked' : ''); 
   $disabled =  ($rows["Ded_Flag"] == 1 ? '' : 'disabled'); 
    $output .= '<input type="hidden" name="id" value="'.$_GET["AttnCode"].'">
    <br>
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Leave Type : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="AttnCode" type="text" value="'.$rows["AttnCode"].'" data-placement="top" required  class="form-control" maxlength="5" disabled />      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (EN) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="AttnEDesc" type="text" value="'.$rows["AttnEDesc"].'" data-placement="top" required  class="form-control" maxlength="50" />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="AttnTDesc" type="text" value="'.$rows["AttnTDesc"].'" data-placement="top" required  class="form-control"  maxlength="50"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
        <dl class="row">
          <dt class="col-sm-2 info-box-label">หักเงิน : </dt>
          <dd class="col-sm-8">
          <div class="material-switch ">
          <input id="Ded_Flag" name="Ded_Flag" type="checkbox" value="1" onchange="Ded_Flag_Func()"
          '.$deductFlg.'/>
           <label for="Ded_Flag" class="label-success"></label>
       </div>
          </dd>
        </dl>
      </div>

				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">อัตราหัก (%) : </dt>
            <dd class="col-sm-2 info-box-label">
						<input id="Ded_Rate" name="Ded_Rate" type="number" value="'.$rows["Ded_Rate"].'" data-placement="top"  class="form-control"min="0" '.$disabled.'/>   
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
            <h1>Change Leave Type</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="leavetype_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="leavetype.php">
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

<script>
  function Ded_Flag_Func() {
    var Ded_Flag = document.getElementById("Ded_Flag");
    var Ded_Rate = document.getElementById("Ded_Rate");
    if (Ded_Flag.checked == true){
        Ded_Rate.disabled = "";
        Ded_Rate.value = "100";

    } else {
      Ded_Rate.disabled = "disabled";
      Ded_Rate.value = "0";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}
</script>


