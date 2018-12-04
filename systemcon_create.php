<?php 
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>


        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-12">
            <h1>Create Prepare for Monthly Closing</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="systemcon_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="systemcon.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success">บันทึก </button>
                    </div>
                    <div class="panel-body">
      <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
      <div class="modal-body" >
      <br/>
      <div class="row">
      <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Period : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="period" type="month" data-placement="top" required  class="form-control" placeholder="ระบุ Username"  maxlength="20" title="กรุณาระบุชื่อผู้ใช้งานเป็นภาษาอังกฤษ" pattern="\w+"/ >      
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">รอบ : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="term" type="number" data-placement="top" required  class="form-control"placeholder="ระบุรอบที่จ่าย" min="1" max="3" maxlength="1"  pattern="\w+"  title="ระบุรหัสผ่านเป็นภาษาอังกฤษ 6 - 10 ตัวอักษร"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">วันที่จ่าย : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="paydate" type="date" data-placement="top"  class="form-control"  maxlength="20"/ >      
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                        <dl class="row">
                                <dt class="col-sm-4 info-box-label">ประเภทพนักงาน : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <select class="form-control"  name="emp_type" required>
                                <option value="">Select</option>   
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
                                <dt class="col-sm-3 info-box-label">Salary Date from : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="salary_date_from" type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dt class="col-sm-1 info-box-label">To : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="salary_date_to" type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dd class="col-sm-2 info-box-label"></dd>
                               </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-3 info-box-label">Overtime Date from : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="overtime_date_from" type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dt class="col-sm-1 info-box-label">To : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="overtime_date_to" type="date" data-placement="top" required  class="form-control" / >      
                                </dd>
                                <dd class="col-sm-2 info-box-label"></dd>
                               </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-3 info-box-label">Lev-Late-Shif Date from : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="lev_date_from" type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dt class="col-sm-1 info-box-label">To : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="lev_date_to" type="date" data-placement="top" required  class="form-control" / >      
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




            <!-- Blog Sidebar Widgets Column -->

        <?php include("includes/footer.php"); ?>
