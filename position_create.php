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
            <h1>Create Position</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="position_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="position.php">
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
      <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">รหัสตำแหน่ง : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiCode" type="text" data-placement="top" required  class="form-control" maxlength="4" />      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">ตำแหน่ง(ENG) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="PosiEDesc" type="text" data-placement="top" required  class="form-control" maxlength="50"  />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">ตำแหน่ง(TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="PosiTDesc" type="text" data-placement="top" required  class="form-control"  maxlength="50"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">เบี้ยเลี้ยงต่อเดือน : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="PosiALW" type="number" data-placement="top"  class="form-control" min="0"  maxlength="20" value="0" />   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">เบี้ยเลี้ยงต่อวัน (ช่วงเช้า) : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="M_ShftALW_D" type="number" data-placement="top"  class="form-control"  min="0"  maxlength="20" value="0"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">เบี้ยเลี้ยง/วัน(บ่าย) : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="E_ShftALW_D" type="number" data-placement="top"  class="form-control"  min="0"  maxlength="20" value="0"/>   
            </dd>
          </dl>
        </div> 
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">เบี้ยเลี้ยง/วัน(เย็น) : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="N_ShftALW_D" type="number" data-placement="top"  class="form-control"  min="0"  maxlength="20" value="0"/>   
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
