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
if(isset($_GET["id"])) {    
    $strSQL = "SELECT tt04_commuteallow. * , tm03_employee.EmplTName FROM tt04_commuteallow, tm03_employee WHERE tt04_commuteallow.EmplCode = tm03_employee.EmplCode AND tt04_commuteallow.auto_increment ='".$_GET["id"]."' ";
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
        $auto_increment = $rows["auto_increment"];
        $EmplTName = $rows["EmplTName"];
        $CommCode = $rows["CommCode"];
        $CommAllow = $rows["CommAllow"];
        $Remark = $rows["Remark"];
$output = "";
    $output .= '<input type="hidden" name="id" value="'.$auto_increment.'">
    <div class="row">
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">พนักงาน : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">  
            <input  type="text" id="show_emp_name"  class="form-control" placeholder="ระบุพนักงาน" value="'.$EmplTName.'" disabled />
';

$output .='
            </dd>
        </dl>
    </div>
    <div class="col-md-12">
    </div>
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">รายการเบิก : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <select class="form-control"  name="CommCode" required>
            <option value="">Select</option>';
            $strSQL = "SELECT * FROM tm02_commutealw";
            $objQuery = mysqli_query($conn, $strSQL);
             while($objResuut = mysqli_fetch_array($objQuery))
             {
               if($objResuut["CommCode"] == $CommCode)
               {
                 $sel = "selected";
               }
               else
               {
                 $sel = "";
               }
               $output.='<option value="'.$objResuut["CommCode"].'" '.$sel.'>'.$objResuut["CommCode"].' - '.$objResuut["CommTDesc"].'</option>';
            
             }
             $output.='</select>      
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">CommAllow : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="CommAllow" value="'.$CommAllow.'" type="number" data-placement="top" required  class="form-control" min="1"  value="0"/>
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">Remark : </dt>
            <dd class="col-sm-8 info-box-label">
            <textarea  class="form-control"  rows="3" name="Remark" id="Remark" placeholder="ระบุหมายเหตุ">'.$Remark.'</textarea>
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
            <h1>แก้ไขข้อมูลรายการขอเบิกค่าเดินทาง</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="transcost_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="transcost.php">
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


