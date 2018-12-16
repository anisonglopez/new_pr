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
    $strSQL = "SELECT * , tm03_employee.EmplTName FROM tt04_overtime, tm03_employee WHERE tt04_overtime.EmplCode = tm03_employee.EmplCode AND auto_increment = '".$_GET["id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
    $output .= '<input type="hidden" name="id" value="'.$_GET["id"].'">
    <div class="row">
    <div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">Employee Name : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">  
        <!-- <input name="show_emp_name" type="text" id="show_emp_name"  class="form-control" placeholder="ระบุพนักงาน"/> -->
        <input name="EmplCode" type="text" id="EmplCode" value="'.$rows["EmplTName"].'" class="form-control"  placeholder="ระบุพนักงาน" disabled/>
        </dd>
    </dl>
</div>
<div class="col-md-12">
 
</div>
<div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">วันที่ : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input type="date" name="AttnDate"  class="form-control" required value="'.$rows["AttnDate"].'"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">OVT10 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OVT10" type="number" data-placement="top"  class="form-control"  min="0"  maxlength="20" value="'.$rows["OVT10"].'"/>   
                                </dd>
                            </dl>
                        </div>  
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">OVT15 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OVT15" type="number" data-placement="top"  class="form-control"  min="0"  maxlength="20" value="'.$rows["OVT15"].'"/>   
                                </dd>
                            </dl>
                        </div>  
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">OVT20 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OVT20" type="number" data-placement="top"  class="form-control"  min="0"  maxlength="20" value="'.$rows["OVT20"].'"/>   
                                </dd>
                            </dl>
                        </div>  
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">OVT25 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OVT25" type="number" data-placement="top"  class="form-control"  min="0"  maxlength="20" value="'.$rows["OVT25"].'"/>   
                                </dd>
                            </dl>
                        </div>  
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">OVT30 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OVT30" type="number" data-placement="top"  class="form-control"  min="0"  maxlength="20" value="'.$rows["OVT30"].'"/>   
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
            <h1>Change Overtime</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="overtime_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="overtime.php">
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


