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
            <h1>Create Leave Type</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="leavetype_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
      <!-- ส่วนที่ต้องแก้ -->
                    <a href="leavetype.php">
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
      <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Leave Type No : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="AttnCode" type="text" data-placement="top" required  class="form-control" maxlength="5"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (EN) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="AttnEDesc" type="text" data-placement="top" required  class="form-control" maxlength="50"  />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="AttnTDesc" type="text" data-placement="top"  required  class="form-control"  maxlength="50"/>      
            </dd>
          </dl>
        </div>

				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">อัตราหัก : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="Ded_Rate" type="number" data-placement="top"  class="form-control"  min="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Deduct Flag : </dt>
            <dd class="col-sm-8 ">
            <div class="material-switch ">
               <input id="Ded_Flag" name="Ded_Flag" type="checkbox" value="1"/>
                <label for="Ded_Flag" class="label-success"></label>
            </div>
            </dd>
          </dl>
        </div>      
        <!-- สุด div -->
                    </div>
                    </div>
                    </div>
                    </div>
    
            
          
         

            </div>
            </div>




            <!-- Blog Sidebar Widgets Column -->

        <?php include("includes/footer.php"); ?>
