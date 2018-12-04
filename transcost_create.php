<?php 
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<script type="text/javascript" src="dependencies/autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="dependencies/autocomplete/autocomplete.css"  type="text/css"/>
<?php include("includes/header.php"); ?>
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-12">
            <h1>Create Transpotation Cost</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="transcost_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="transcost.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success">บันทึก </button>
                    </div>
                    <div class="panel-body">
      <div class="row">
      <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Employee Name : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">  
                                <!-- <input name="show_emp_name" type="text" id="show_emp_name"  class="form-control" placeholder="ระบุพนักงาน"/> -->
                                <!-- <input name="EmplCode" type="text" id="EmplCode" value="" class="form-control"  placeholder="ระบุพนักงาน"/> -->
                                <input name="EmplTName" type="text" id="EmplTName" class="form-control" required placeholder="ระบุพนักงาน" />
                <input name="EmplCode" type="hidden" id="EmplCode" value="" />
                <script type="text/javascript">
				function make_autocom(autoObj,showObj){
					var mkAutoObj=autoObj; 
					var mkSerValObj=showObj; 
					new Autocomplete(mkAutoObj, function() {
						this.setValue = function(id) {		
							document.getElementById(mkSerValObj).value = id;
						}
						if ( this.isModified )
							this.setValue("");
						if ( this.value.length < 1 && this.isNotClick ) 
							return ;	
						return "employee_autocomplete.php?q=" +encodeURIComponent(this.value);
					});	
				}	
				 
				// การใช้งาน
				// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
				make_autocom("EmplTName","EmplCode");
				</script>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">CommAllow : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="CommAllow" type="number" data-placement="top" required  class="form-control" min="1"  value="0"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">CommCode : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input type="text" name="CommCode" placeholder="ระบุ CommCode" class="form-control"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Remark : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <textarea  class="form-control" rows="3" name="Remark" id="Remark" placeholder="ระบุหมายเหตุ"></textarea>
                                </dd>
                            </dl>
                        </div>  
        <!-- สุด div -->
                    </div>
                    </div>
                    </div>
                    </div>
    
            
          
         

            
            </div>




            <!-- Blog Sidebar Widgets Column -->

        <?php include("includes/footer.php"); ?>
