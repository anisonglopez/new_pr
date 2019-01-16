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
    $strSQL = "SELECT tt05_monthlypaid.* , tm03_employee.EmplTName, tm03_employee.EmplType, tm02_department.DeptEDesc
    FROM tt05_monthlypaid
    JOIN tm03_employee ON tt05_monthlypaid.EmplCode=tm03_employee.EmplCode
    JOIN tm02_department ON tm02_department.DeptCode=tm03_employee.DeptCode
    WHERE tt05_monthlypaid.auto_increment = ".$_GET["id"]." ";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
        $EmplType = $rows["EmplType"];
        $Term = $rows["Term"];
        $Salary = $rows["Salary"];
        if( $EmplType == "D"){
            $EmplType = "รายวัน";
          }
          else{
            $EmplType = "รายเดือน";
          }
        
    $output .= '<input type="hidden" name="id" value="'.$_GET["id"].'">
    <br>
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">รหัสพนักงาน : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="EmplCode" type="text" value="'.$rows["EmplCode"].' - '.$rows["EmplTName"].'"    class="form-control" maxlength="5" disabled />      
            </dd>
          </dl>
        </div>
        <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">ประจำงวด : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="period" type="number" value="'.$rows["Period"].'" disabled  class="form-control" min="1"  value="0"/>
            </dd>
        </dl>
    </div>  
        <div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">รอบ : </dt>
        <dd class="col-sm-8 info-box-label">
        <input name="EmplType" type="text" value="'.$Term.'"  disabled  class="form-control" />
        </dd>
    </dl>
</div>      
<div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">ประเภทพนักงาน : </dt>
        <dd class="col-sm-8 info-box-label">
        <input name="EmplType" type="text" value="'.$EmplType.'"  disabled  class="form-control" />
        </dd>
    </dl>
</div>   
<div class="col-md-6">
<dl class="row">
    <dt class="col-sm-4 info-box-label">เงินเดือน : </dt>
    <dd class="col-sm-8 info-box-label">
    <input name="Salary" type="number" value="'.$Salary.'" disabled  class="form-control"/>
    </dd>
</dl>
</div>      
</div>
<!--Start-->
<div class="add-pad">
        <div class="title-header-info-box add-pad">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active " data-toggle="tab" href="#tab1" id="tabspecification" role="tab">รายรับ</a>
                </li>
                <li class="nav-item">
                <a class="nav-link  " data-toggle="tab" href="#tab2" id="tabexpense role="tab">รายจ่าย</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  " data-toggle="tab" href="#tab3" id="tabspecification" role="tab">รายการหัก</a>
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
                        <p><h3>Overtime</h3></p>
        <dl class="row">
            <dt class="col-sm-3 info-box-label">1.0 : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="OVT10HR" value="'.$rows["OVT10HR"].'" type="number" step="any"   class="form-control" / >      
            </dd>
            <dt class="col-sm-1 info-box-label">1.5 : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="OVT15HR" type="number" value="'.$rows["OVT15HR"].'" step="any"      class="form-control" / >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
    <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">2.0 : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="OVT20HR"  value="'.$rows["OVT20HR"].'" type="number" step="any"     class="form-control" / >      
            </dd>
            <dt class="col-sm-1 info-box-label">2.5 : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="OVT25HR"  value="'.$rows["OVT25HR"].'" type="number"  step="any"    class="form-control"  / >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
    <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">3.0 : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="OVT30HR" type="number" value="'.$rows["OVT30HR"].'"  step="any"    class="form-control" / >      
            </dd>
            <dt class="col-sm-1 info-box-label"> O.T. Adjust : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="OVT30HR" type="number" value="'.$rows["OVT30HR"].'"  step="any"    class="form-control" / >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
                        </div>
                    </div>
                </div>
                
<!-- ///////////////////////////////Period Control///////////////////////////////////////// -->   

<!-- ///////////////////////////////Period Control///////////////////////////////////////// -->
                <div class="tab-pane " id="tab2">
                    <div class="header-info-content-box content-box-padding">
                        <div class="row">
                        <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">วันที่เริ่มคิดค่าจ้างจาก : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="salary_date_from" value="'.$rows["FmAttnDate"].'" type="date"    class="form-control" disabled/ >      
            </dd>
            <dt class="col-sm-1 info-box-label">ถึง : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="salary_date_to" type="date" value="'.$rows["ToAttnDate"].'"    class="form-control" disabled/ >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
    <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">วันที่เริ่มคิด OT จาก : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="overtime_date_from"  value="'.$rows["FmOVTDate"].'" type="date"    class="form-control" disabled/ >      
            </dd>
            <dt class="col-sm-1 info-box-label">ถึง : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="overtime_date_to"  value="'.$rows["ToOVTDate"].'" type="date"    class="form-control" disabled / >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
    <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">วันที่เริ่มคิดขาด ลา มาสาย เวลาเข้ากะ : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="lev_date_from" type="date" value="'.$rows["FmLevDate"].'"    class="form-control" disabled/ >      
            </dd>
            <dt class="col-sm-1 info-box-label">ถึง : </dt>
            <dd class="col-sm-3 info-box-label">
            <input name="lev_date_to" type="date" value="'.$rows["ToLevDate"].'"     class="form-control" disabled / >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
                        </div>
                    </div>
                </div>
               
<!-- ///////////////////////////////Period Control///////////////////////////////////////// -->   

</div>
      </div>
       
        

</div>

         ';  
}  }
 ?>
 
        <div class="row">
<!-- Blog Entries Column -->
<div class="col-md-12">
            <h1>แก้ไขปรับปรุงรายการ</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="monthlypaid_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="monthlypaid.php">
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


