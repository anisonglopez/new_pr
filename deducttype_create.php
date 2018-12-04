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
            <h1>Create Deduct Type</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="deducttype_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="deducttype.php">
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
            <dt class="col-sm-2 info-box-label">Description (EN) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeductDesc" type="text" data-placement="top" required  class="form-control" maxlength="20"  />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeductTDesc" type="text" data-placement="top"  required  class="form-control"  maxlength="20"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount_1 : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="DeductAmt" type="number" data-placement="top"  class="form-control"  min="0" required  value="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount_2 : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="DeductAmt2" type="number" data-placement="top"  class="form-control"  min="0" required  value="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount_3 : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="DeductAmt3" type="number" data-placement="top"  class="form-control"  min="0" required  value="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount_4 : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="DeductAmt4" type="number" data-placement="top"  class="form-control"  min="0" required  value="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Amount_5 : </dt>
            <dd class="col-sm-2 info-box-label">
						<input name="DeductAmt5" type="number" data-placement="top"  class="form-control"  min="0" required  value="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Tax Calculate Flag : </dt>
            <dd class="col-sm-2">
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
