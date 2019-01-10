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
            <h1>สร้างรายการทำงานล่วงเวลา</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="overtime_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="overtime.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success">บันทึก </button>
                    </div>
                    <div class="panel-body">
      <div class="row">
      <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">พนักงาน : <span class="field-required">*</span></dt>
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
                        <div class="col-md-12">
                            
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">วันที่คิดโอที : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input type="date" name="AttnDate"  class="form-control" required/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">1.0: </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OVT10" type="number" data-placement="top"  class="form-control"  min="0"  step="any" value="0"/>   
                                </dd>
                            </dl>
                        </div>  
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">1.5 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OVT15" type="number" data-placement="top"  class="form-control"  min="0" step="any"  value="0"/>   
                                </dd>
                            </dl>
                        </div>  
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">2.0 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OVT20" type="number" data-placement="top"  class="form-control"  min="0"  step="any"  value="0"/>   
                                </dd>
                            </dl>
                        </div>  
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">2.5 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OVT25" type="number" data-placement="top"  class="form-control"  min="0"  step="any"  value="0"/>   
                                </dd>
                            </dl>
                        </div>  
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">3.0 : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OVT30" type="number" data-placement="top"  class="form-control"  min="0"  step="any"  value="0"/>   
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
