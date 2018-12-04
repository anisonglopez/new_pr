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
            <h1>Create Branch</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="branch_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="branch.php">
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
            <dt class="col-sm-2 info-box-label">รหัสสาขา : <span class="field-required">*</span></dt>
            <dd class="col-sm-4  info-box-label">
            <input name="BranchCode" type="text" data-placement="top" required  class="form-control" maxlength="20" pattern="\w+"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">ชื่อสาขา(ENG) :<span class="field-required">*</span> </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="BranchEName" type="text" data-placement="top" required  class="form-control"/>
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">ชื่อสาขา(TH) :<span class="field-required">*</span> </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="BranchTName" type="text" data-placement="top" required  class="form-control" />      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">ที่อยู่ : </dt>
            <dd class="col-sm-8 info-box-label">
						<textarea class="form-control" rows="5" name="Address" id="comment"></textarea>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">เบอร์โทรศัพท์ : </dt>
            <dd class="col-sm-4 info-box-label">
	<input name="PhoneNo" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
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
