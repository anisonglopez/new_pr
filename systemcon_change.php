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
    $strSQL = "SELECT * FROM tm00_control WHERE auto_increment = '".$_GET["id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
        $Period_date = $rows["Period"];
        $ConvertPeriodDate = date("Ym", strtotime($Period_date));
        if ($rows["EmplType"] == M){
            $EmplString = "รายเดือน";
            $display = "display:show;";
        }
        else
        {
            $EmplString = "รายวัน";
            $display = "display:none;";
        }
    $output .= '<input type="hidden" name="id" value="'.$_GET["id"].'">
    <div class="row">
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">ประจำงวด : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="period" type="text" value="'.$rows["Period"].'" data-placement="top" required  class="form-control"  disabled/ >      
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">รอบ : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="term" type="number" value="'.$rows["Term"].'" data-placement="top" required  class="form-control"placeholder="ระบุรอบที่จ่าย" min="1" max="3" maxlength="1" disabled/>
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">วันที่จ่าย : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="paydate" type="date"value="'.$rows["PayDate"].'"  data-placement="top"  class="form-control"  maxlength="20" / >      
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
    <dl class="row">
            <dt class="col-sm-4 info-box-label">ประเภทพนักงาน : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <select class="form-control"  name="emp_type" required disabled   id="emp_type">
            <option value="'.$rows["EmplType"].'">'.$EmplString.'</option>   
            <option value="D">Daily Employee</option>
            <option value="M">Monthly Employee</option>
            </select>   
            </dd>
        </dl>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-12">
<!--Start-->
<div class="add-pad">
        <div class="title-header-info-box add-pad">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active " data-toggle="tab" href="#tab1" id="tabspecification" role="tab">Period</a>
                </li>
            </ul>
        </div>
        <div class="warpper-table">
            <div class="tab-content">
            <br/>
                <!-- ///////////////////////////////Period Control///////////////////////////////////////// -->
                <div class="tab-pane active" id="tab1">
                    <div class="header-info-content-box content-box-padding">
                        <div class="row">
                        <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">วันที่เริ่มคิดค่าจ้างจาก : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="salary_date_from" value="'.$rows["FmAttnDate"].'" type="date" data-placement="top" required  class="form-control" disabled/ >      
            </dd>
            <dt class="col-sm-1 info-box-label">ถึง : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="salary_date_to" type="date" value="'.$rows["ToAttnDate"].'" data-placement="top" required  class="form-control" disabled/ >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
    <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">วันที่เริ่มคิด OT จาก : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="overtime_date_from"  value="'.$rows["FmOVTDate"].'" type="date" data-placement="top" required  class="form-control" disabled/ >      
            </dd>
            <dt class="col-sm-1 info-box-label">ถึง : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="overtime_date_to"  value="'.$rows["ToOVTDate"].'" type="date" data-placement="top" required  class="form-control" disabled / >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
    <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">วันที่เริ่มคิดขาด ลา มาสาย เวลาเข้ากะ : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="lev_date_from" type="date" value="'.$rows["FmLevDate"].'" data-placement="top" required  class="form-control" disabled/ >      
            </dd>
            <dt class="col-sm-1 info-box-label">ถึง : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="lev_date_to" type="date" value="'.$rows["ToLevDate"].'"  data-placement="top" required  class="form-control" disabled / >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="Holiday" style="'.$display.'">
                <dl class="row">
                    <dt class="col-sm-3 info-box-label">วันหยุดของบริษัท (วัน) : </dt>
                    <dd class="col-sm-3 info-box-label">
                    <input name="Holiday" type="number" min="0" class="form-control" value="'.$rows["Holiday"].'"/ >      
                    </dd>
                    <dt class="col-sm-1 info-box-label"></dt>
                    <dd class="col-sm-3 info-box-label">
                  
                    </dd>
                    <dd class="col-sm-2 info-box-label"></dd>
                   </dl>
            </div>
<!-- ///////////////////////////////Period Control///////////////////////////////////////// -->                         
<!--END-->

</div>

         ';  
}  }
 ?>
 
        <div class="row">
<!-- Blog Entries Column -->
<div class="col-md-12">
            <h1>Change Prepare for Monthly Closing</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="systemcon_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="systemcon.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success">อัปเดตข้อมูล </button>
                    </div>
                    <div class="panel-body" onload="Holiday_Function()">
                    <?php  echo $output;?>
                    </div>
                </form>
<br>
</div>
<!-- Blog Sidebar Widgets Column -->
<!-- /.row -->

<?php include("includes/footer.php"); ?>

