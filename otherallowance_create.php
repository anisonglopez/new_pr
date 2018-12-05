<?php 
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<?php
$sqlSysCon = "SELECT tm01_system_condition.Allow1_Name ,
tm01_system_condition.Allow2_Name, 
tm01_system_condition.Allow3_Name, 
tm01_system_condition.Allow4_Name, 
tm01_system_condition.Allow5_Name,
tm01_system_condition.Allow6_Name
FROM tm01_system_condition ";
$DATA_Sys_Con = mysqli_query($conn, $sqlSysCon);
while ($row = mysqli_fetch_array($DATA_Sys_Con)) {
 $allow1 = $row["Allow1_Name"];
 $allow2 = $row["Allow2_Name"];
 $allow3 = $row["Allow3_Name"];
 $allow4 = $row["Allow4_Name"];
 $allow5 = $row["Allow5_Name"];
 $allow6 = $row["Allow6_Name"];
}
?>

        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-12">
            <h1>Create Other Allowance</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="otherallowance_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
      <!-- ส่วนที่ต้องแก้ -->
                    <a href="otherallowance.php">
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

                        <div class="col-md-12">
                        </div>

                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label"><?php echo $allow1; ?> : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input type="number" name="OthAllow1" placeholder="ระบุ Count" class="form-control" min="0"  value="0"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label"><?php echo $allow2; ?> : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OthAllow2" type="number" data-placement="top" required  class="form-control" min="0"  value="0"/>
                                </dd>
                            </dl>
                        </div>      
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label"><?php echo $allow3; ?> : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OthAllow3" type="number" data-placement="top" required  class="form-control" min="0"  value="0"/>
                                </dd>
                            </dl>
                        </div>   
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label"><?php echo $allow4; ?> : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OthAllow4" type="number" data-placement="top" required  class="form-control" min="0"  value="0"/>
                                </dd>
                            </dl>
                        </div>   
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label"><?php echo $allow5; ?> : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OthAllow5" type="number" data-placement="top" required  class="form-control" min="0"  value="0"/>
                                </dd>
                            </dl>
                        </div>   
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label"><?php echo $allow6; ?> : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OthAllow6" type="number" data-placement="top" required  class="form-control" min="0"  value="0"/>
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
