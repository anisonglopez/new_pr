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
            <h1>Create User Profile</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="userprofile_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="userprofile.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success" id="create_submit_btn">บันทึก </button>
                    </div>
                    <div class="panel-body">
      <br/>
      <div class="row">
      <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-2 info-box-label">Username : <span class="field-required">*</span></dt>
                                <dd class="col-sm-4 info-box-label">
                                <input name="username" type="text" data-placement="top" required  class="form-control" placeholder="ระบุ Username"  maxlength="20" title="กรุณาระบุชื่อผู้ใช้งานเป็นภาษาอังกฤษ" pattern="\w+"/ >
                                    
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-2 info-box-label">Password : <span class="field-required">*</span></dt>
                                <dd class="col-sm-4 info-box-label">
                                <input id="password" name="password" type="password" data-placement="top" required  class="form-control"placeholder="ระบุรหัสผ่าน" minlength="6" maxlength="10"  pattern="\w+"  title="ระบุรหัสผ่านเป็นภาษาอังกฤษ 6 - 10 ตัวอักษร"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-2 info-box-label">Confirm Password : <span class="field-required">*</span></dt>
                                <dd class="col-sm-4 info-box-label">
                                <input id="confirm_password"  name="confirm_password" type="password" data-placement="top" required  class="form-control" placeholder="ระบุรหัสผ่านอีกครั้ง" minlength="5" maxlength="10" name="pwd2"/>
<span id='message'></span>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-2 info-box-label">ชื่อผู้ใช้งาน(EN) : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="descEN" type="text" data-placement="top"   class="form-control" placeholder="ระบุชื่อผู้ใช้งาน (EN)"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-2 info-box-label">ชื่อผู้ใช้งาน(TH) : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="descTH" type="text" data-placement="top"   class="form-control" placeholder="ระบุชื่อผู้ใช้งาน (TH)"/>
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
            <script src="dependencies/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
<script>
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    document.getElementById("create_submit_btn").disabled = false,    
    $('#message').html('รหัสผ่านสามารถเข้ากันได้').css('color', 'green');
  }
   else 
  document.getElementById("create_submit_btn").disabled = true,    
    $('#message').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
});
</script>


            <!-- Blog Sidebar Widgets Column -->

        <?php include("includes/footer.php"); ?>

