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
            <h1>Create Department</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="department_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="department.php">
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
            <dt class="col-sm-2 info-box-label">Department No : <span class="field-required">*</span></dt>
            <dd class="col-sm-2 info-box-label">
            <input name="DeptCode" type="text" data-placement="top" required  class="form-control" maxlength="5"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (ENG) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeptEDesc" type="text" data-placement="top" required  class="form-control" maxlength="100"  />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-2 info-box-label">Description (TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeptTDesc" type="text" data-placement="top"  required class="form-control"  maxlength="100"/>      
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
