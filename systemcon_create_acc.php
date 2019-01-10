<?php
//error_reporting(0);
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<h1>แสดงข้อมูลการเปิดรอบการคำนวณ</h1>
<hr>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <a href="systemcon.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                    </div>
                    <div class="panel-body">
      <div class="modal-body" >
      <br/>
      <div class="row">
      <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ประจำงวด : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input  type="text" value="<?php  echo date("Ym", strtotime($_POST["period"]));?>"class="form-control" disabled/ >      
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">รอบ : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <select class="form-control"  name="term" required onchange="SP_Moth_Red_F_create_function()" disabled>
                                <option value=""><?php echo $_POST['term']; ?></option>   
                                </select>   
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">วันที่จ่าย : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="paydate" type="date" value="<?php echo $_POST['paydate'] ?>" disabled class="form-control"  maxlength="20"/ >      
                                </dd>
                            </dl>
                        </div>
                        <?php 
                                if ($_POST["EmplType"] == "M"){
                                    $EmplString = "รายเดือน";
                                    $display = "display:none;";
                                }
                                else
                                {
                                    $EmplString = "รายวัน";
                                    $display = "display:show;";
                                }
                        ?>
                        <div class="col-md-6">
                        <dl class="row">
                                <dt class="col-sm-4 info-box-label">ประเภทพนักงาน : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <select class="form-control"  name="EmplType" required  disabled>
                                <option value=""><?php echo  $EmplString;?></option>   
                                <option value="D">รายวัน</option>
                                <option value="M">รายเดือน</option>
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
                                        <a class="nav-link active " data-toggle="tab" href="#tab1" id="tabspecification" role="tab">รายละเอียดการเปิดรอบการคำนวณ</a>
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
                                <input name="salary_date_from" value="<?php echo $_POST['salary_date_from'] ?>" disabled type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dt class="col-sm-1 info-box-label">ถึง : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="salary_date_to" value="<?php echo $_POST['salary_date_to'] ?>" disabled type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dd class="col-sm-2 info-box-label"></dd>
                               </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-3 info-box-label">วันที่เริ่มคิด OT จาก : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="overtime_date_from" value="<?php echo $_POST['overtime_date_from'] ?>" disabled type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dt class="col-sm-1 info-box-label">ถึง : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="overtime_date_to" value="<?php echo $_POST['overtime_date_to'] ?>" disabled  type="date" data-placement="top" required  class="form-control" / >      
                                </dd>
                                <dd class="col-sm-2 info-box-label"></dd>
                               </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-3 info-box-label">วันที่เริ่มคิดขาด ลา มาสาย เวลาเข้ากะ : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="lev_date_from" value="<?php echo $_POST['lev_date_from'] ?>" disabled type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dt class="col-sm-1 info-box-label">ถึง : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="lev_date_to" value="<?php echo $_POST['lev_date_to'] ?>" disabled type="date" data-placement="top" required  class="form-control" / >      
                                </dd>
                                <dd class="col-sm-2 info-box-label"></dd>
                               </dl>
                        </div>

                        <div class="col-md-12"  style="<?php echo $display; ?>">
                            <dl class="row">
                                <dt class="col-sm-3 info-box-label">วันหยุดของบริษัท (วัน) : </dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="Holiday" type="number" min="0" class="form-control" value="<?php echo  $_POST['Holiday'];?>" disabled/ >      
                                </dd>
                                <dt class="col-sm-1 info-box-label"></dt>
                                <dd class="col-sm-3 info-box-label">
                              
                                </dd>
                                <dd class="col-sm-2 info-box-label"></dd>
                               </dl>
                        </div>
                                            </div>
                                        </div>
                                    </div>
         <!-- ///////////////////////////////Period Control///////////////////////////////////////// -->     

<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
    <input type="hidden" value="<?php echo $_POST['period'] ?>" id="period" />
    <input type="hidden" value="<?php echo $_POST['term'] ?>" id="term" />
    <input type="hidden" value="<?php echo $_POST['EmplType'] ?>" id="EmplType" />
    <input type="hidden" value="<?php echo $_POST['salary_date_from'] ?>" id="salary_date_from" />
    <input type="hidden" value="<?php echo $_POST['salary_date_to'] ?>" id="salary_date_to" />
    <input type="hidden" value="<?php echo $_POST['overtime_date_from'] ?>" id="overtime_date_from" />
    <input type="hidden" value="<?php echo $_POST['overtime_date_to'] ?>" id="overtime_date_to" />
    <input type="hidden" value="<?php echo $_POST['lev_date_from'] ?>" id="lev_date_from" />
    <input type="hidden" value="<?php echo $_POST['lev_date_to'] ?>" id="lev_date_to" />
    <input type="hidden" value="<?php echo $_POST['paydate'] ?>" id="paydate" />
    <input type="hidden" value="<?php echo $_POST['Holiday'] ?>" id="Holiday" />
    <!--  ajax ส่งค่ากลับ-->
    <div id="loading-image" style="display:none; text-align: center;" >
                            <img src="img/loading_gif/flat-progress-bar-stripe-loader.gif" /> กรุณารอซักครู่.... ระบบกำลังโหลดข้อมูล
                        </div>           
                        <div id="table_detail"></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
       <!--  ajax ส่งค่ากลับ-->

    <!-- Blog Sidebar Widgets Column -->
<!-- /.row -->
<?php include("includes/footer.php"); ?>
<script>
$(document).ready(function() {
    var period=document.getElementById("period").value; 
    var term=document.getElementById("term").value; 
    var EmplType=document.getElementById("EmplType").value; 
    var salary_date_from=document.getElementById("salary_date_from").value; 
    var salary_date_to=document.getElementById("salary_date_to").value; 
    var overtime_date_from=document.getElementById("overtime_date_from").value; 
    var overtime_date_to=document.getElementById("overtime_date_to").value; 
    var lev_date_from=document.getElementById("lev_date_from").value; 
    var lev_date_to=document.getElementById("lev_date_to").value; 
    var paydate=document.getElementById("paydate").value; 
    var Holiday=document.getElementById("Holiday").value; 

    $.ajax({  
            url:"systemcon_ajax_monthlypaid_datatable.php",  
                method:"post",  
                data:{period:period,
                    term:term,
                    EmplType:EmplType,
                    salary_date_from:salary_date_from,
                    salary_date_to:salary_date_to,
                    overtime_date_from:overtime_date_from,
                    overtime_date_to:overtime_date_to,
                    lev_date_from:lev_date_from,
                    lev_date_to:lev_date_to,
                    paydate:paydate,
                    Holiday:Holiday},   
                    beforeSend: function() {
                        $("#loading-image").show();
                    },
                success:function(data){          
                    $('#table_detail').html(data);  
                    $("#loading-image").hide();
                },
                error: function (jqXHR, exception) {
                    document.write(exception);
                }
        });  
 });
</script>

