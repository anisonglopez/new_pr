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
            <h1>เพิ่มประเภทรายได้</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="empincome_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="empincome.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success">บันทึก </button>
                    </div>
                    <div class="panel-body">
                    <form class="form-horizontal" name="create" method="post"  action="branch_create_acc.php" enctype="multipart/form-data" autocomplete="off">
      <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
      <div class="modal-body" >
      <br/>
      <div class="row">
      <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">รหัสประเภทรายได้ : <span class="field-required">*</span></dt>
            <dd class="col-sm-2 info-box-label">
            <input name="OthINCCode" type="text" data-placement="top" required  class="form-control" maxlength="20"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">คำอธิบาย (EN) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="OthINCEDesc" type="text" data-placement="top" required  class="form-control" maxlength="100" />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">คำอธิบาย (TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="OthINCTDesc" type="text" data-placement="top" required  class="form-control"  maxlength="100"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">จำนวนเงิน : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="OthIncAmt" type="number" data-placement="top" min="0"  class="form-control"   value="0"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">คำนวณภาษี: </dt>
            <dd class="col-sm-2 ">
						 <div class="material-switch">
               <input id="TaxCalFlag" name="TaxCalFlag" type="checkbox" value="1"/>
                <label for="TaxCalFlag" class="label-success"></label>
            </div>
            </dd>
          </dl>
        </div> 
                    </div>
                    </div>
                    </div>
                    </div>
    
            
          
         

            </div>
            </div>




            <!-- Blog Sidebar Widgets Column -->

        <?php include("includes/footer.php"); ?>
