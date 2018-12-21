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
            <h1>สร้างข้อมูลการลงเวลา</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline" name="create" method="post"  action="attentran_create_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
      <!-- ส่วนที่ต้องแก้ -->
                    <a href="attentran.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success">บันทึก </button>
                    </div>
                    <div class="panel-body">
      <br/>
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
                                <dt class="col-sm-4 info-box-label">วันที่ลงเวลา : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input type="date" name="AttnDate" placeholder="ระบุ Count" class="form-control"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ประเภทการลา : </dt>
                                <dd class="col-sm-8 info-box-label">
                                    <select id="AttnCode" class="form-control"  name="AttnCode" >
                                    <option value="">Select</option>   
                                        <?php
                                        $strSQL = "SELECT * FROM tm02_attncode";
                                        $objQuery = mysqli_query($conn, $strSQL);
                                        while($objResuut = mysqli_fetch_array($objQuery))
                                        {
                                        ?>
                                            <option value="<?=$objResuut["AttnCode"];?>"><?=$objResuut["AttnCode"]." - ".$objResuut["AttnTDesc"];?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>      
                       </dd>
                            </dl>
                        </div>      
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Time in : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="TIMEin" type="time" data-placement="top" required  class="form-control" min="1"  value="08:00" id="TIMEin" />
                                </dd>
                            </dl>
                        </div>      
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Time out : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="TIMEout" type="time" data-placement="top" required  class="form-control" min="1"  value="17:30" id="TIMEout" />
                                </dd>
                            </dl>
                        </div>      
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ชั่วโมงการลา(ชม.) : <span class="field-required">*</span>
                                <p><small>รวมเวลาพักเที่ยง</small></p></dt>
                                
                                <dd class="col-sm-8 info-box-label">
                                <input name="Hours" type="number" data-placement="top" required  class="form-control" min="1"  value="0.00" required id="hours" placeholder="0.00" step="any"/>
                                </dd>
                            </dl>
                        </div>      
                        <div class="col-md-12"></div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Deduct Flag : </dt>
                                <dd class="col-sm-8">
                                <div class="material-switch">
                                <input id="Ded_Flag" name="Ded_Flag" type="checkbox" value="1"/>
                                    <label for="Ded_Flag" class="label-success"></label>
                                </div>
                                </dd>
                            </dl>
                            </div>  

                             <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">อัตราหัก : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input id="Ded_Rate" name="Ded_Rate" type="number" data-placement="top" required  class="form-control" min="0"  value="0" disabled/>
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
        <script>
                    $(document).ready(function(){
                        $( window ).on( "load", function() { 
                                var time_in = document.getElementById("TIMEin").value.split(':');
                                time_in = time_in[0] + '.' +time_in[1];
                                var time_out = document.getElementById("TIMEout").value.split(':');
                                time_out = time_out[0] + '.' + time_out[1];
                                var hours = time_out - time_in;
                                document.getElementById("hours").value = hours.toFixed(2);
                            });
                            $( TIMEin ).on( "change", function() { 
                                var time_in = document.getElementById("TIMEin").value.split(':');
                                time_in = time_in[0] + '.' +time_in[1];
                                var time_out = document.getElementById("TIMEout").value.split(':');
                                time_out = time_out[0] + '.' + time_out[1];
                                var hours = time_out - time_in;
                                document.getElementById("hours").value = hours.toFixed(2);
                            });
                            $( TIMEout ).on( "change", function() { 
                                var time_in = document.getElementById("TIMEin").value.split(':');
                                time_in = time_in[0] + '.' +time_in[1];
                                var time_out = document.getElementById("TIMEout").value.split(':');
                                time_out = time_out[0] + '.' + time_out[1];
                                var hours = time_out - time_in;
                                document.getElementById("hours").value = hours.toFixed(2);
                            });
                            $( AttnCode ).on( "change", function() { 
                                var attncode = document.getElementById("AttnCode").value;
                                if (attncode == ""){
                                document.getElementById("Ded_Flag").checked = false;
                               document.getElementById("Ded_Rate").value = 0;
                               Ded_Rate.disabled = "disabled";
                                }else{
                                    $.ajax({  
                                            url:"ajax_attncode.php",  
                                                method:"post",  
                                                data:{attncode:attncode},  
                                                success:function(data){          
                                                        var obj = JSON.parse(data);          
                                                        if(obj.Ded_Flag == 1){
                                                            document.getElementById("Ded_Flag").checked = true;
                                                            document.getElementById("Ded_Rate").value = obj.Ded_Rate;
                                                            Ded_Rate.disabled = "";
                                                        }
                                                        else{
                                                            document.getElementById("Ded_Flag").checked = false;
                                                            document.getElementById("Ded_Rate").value = obj.Ded_Rate;
                                                            Ded_Rate.disabled = "disabled";
                                                        }
                                                },
                                                error: function (jqXHR, exception) {
                                                    document.write(exception);
                                                }
                                        });  
                                }
                            });
                            
                            $( Ded_Flag ).on( "change", function() { 
                                var Ded_Flag = document.getElementById("Ded_Flag")
                                    if(Ded_Flag.checked == true){
                                        document.getElementById("Ded_Rate").value = 100
                                        Ded_Rate.disabled = "";
                                    }
                                    else{
                                        document.getElementById("Ded_Rate").value = 0
                                        Ded_Rate.disabled = "disabled";
                                    }
                            });
                    });
                   
        </script>
