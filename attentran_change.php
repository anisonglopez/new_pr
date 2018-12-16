<?php
error_reporting(0);
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<?php

include "config/connect.php";
if(isset($_GET["id"])) {    
    $strSQL = "SELECT * , tm03_employee.EmplTName FROM tt04_attendance, tm03_employee WHERE tt04_attendance.EmplCode = tm03_employee.EmplCode AND auto_increment = '".$_GET["id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
    $output .= '<input type="hidden" name="id" value="'.$_GET["id"].'">
    <div class="row">
    <div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">พนักงาน : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">  
        <!-- <input name="show_emp_name" type="text" id="show_emp_name"  class="form-control" placeholder="ระบุพนักงาน"/> -->
        <input name="EmplCode" type="text" id="EmplCode" value="'.$rows["EmplTName"].'" class="form-control"  placeholder="ระบุพนักงาน" disabled/>
        </dd>
    </dl>
</div>
<div class="col-md-12">
 
</div>
<div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">วันที่ลา : </dt>
        <dd class="col-sm-8 info-box-label">
        <input type="date" name="AttnDate" placeholder="ระบุ Count" value="'.$rows["AttnDate"].'" class="form-control"/>
        </dd>
    </dl>
</div>
<div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">ประเภทการลา : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
            <select id="AttnCode" class="form-control"  name="AttnCode" required>
            <option value="">Select</option>   ';
            
            $strSQL_attn = "SELECT * FROM tm02_attncode";
            $objQuery_attn = mysqli_query($conn, $strSQL_attn);
             while($objResuut = mysqli_fetch_array($objQuery_attn))
             {
               if($objResuut["AttnCode"] == $rows["AttnCode"])
               {
                 $sel = "selected";
               }
               else
               {
                 $sel = "";
               }

               $output.='<option value="'.$objResuut["AttnCode"].'" '.$sel.'>'.$objResuut["AttnCode"].' - '.$objResuut["AttnTDesc"].'</option>';
             } 

             $output.=' </select>      
</dd>
    </dl>
</div>      
<div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">Time in : </dt>
        <dd class="col-sm-8 info-box-label">
        <input name="TIMEin" type="time" data-placement="top" required  class="form-control" min="1"  value="'.$rows["TIMEin"].'" id="TIMEin" />
        </dd>
    </dl>
</div>      
<div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">Time out : </dt>
        <dd class="col-sm-8 info-box-label">
        <input name="TIMEout" type="time" data-placement="top" required  class="form-control" min="1"  value="'.$rows["TIMEout"].'" id="TIMEout" />
        </dd>
    </dl>
</div>      
<div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">ชั่วโมงการลา(ชม.) : <span class="field-required">*</span>
        <p><small>รวมเวลาพักเที่ยง</small></p></dt>
        
        <dd class="col-sm-8 info-box-label">
        <input name="Hours" type="number" data-placement="top" required  class="form-control" min="1"  value="'.$rows["Hours"].'" required id="hours" placeholder="0.00" step="any"/>
        </dd>
    </dl>
</div>      
<div class="col-md-12"></div>
';
if ($rows["Ded_Flag"] == 1){
    $DedFlagckk = "checked";
  }
$output.='
<div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">Deduct Flag : </dt>
        <dd class="col-sm-8">
        <div class="material-switch">
        <input id="Ded_Flag" name="Ded_Flag" type="checkbox" value="1" '. $DedFlagckk.'/>
            <label for="Ded_Flag" class="label-success"></label>
        </div>
        </dd>
    </dl>
    </div>  

     <div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">อัตราหัก : </dt>
        <dd class="col-sm-8 info-box-label">
        <input id="Ded_Rate" name="Ded_Rate" type="number" data-placement="top" value="'.$rows["Ded_Rate"].'" required  class="form-control" min="0"  value="0"/>
        </dd>
    </dl>
</div>     

        

</div>

         ';  
}  }
 ?>
 
        <div class="row">
<!-- Blog Entries Column -->
<div class="col-md-12">
            <h1>แก้ไขการลา</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="attentran_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="attentran.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success">อัปเดตข้อมูล </button>
                    </div>
                    <div class="panel-body">
                    <?php  echo $output;?>
                    </div>
                </form>
<br>
</div>
<!-- Blog Sidebar Widgets Column -->
<!-- /.row -->

<?php include("includes/footer.php"); ?>

<script>
                    $(document).ready(function(){
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
                                $.ajax({  
                                            url:"ajax_attncode.php",  
                                                method:"post",  
                                                data:{attncode:attncode},  
                                                success:function(data){          
                                                        var obj = JSON.parse(data);          
                                                        if(obj.Ded_Flag == 1){
                                                            document.getElementById("Ded_Flag").checked = true;
                                                            document.getElementById("Ded_Rate").value = obj.Ded_Rate;
                                                        }
                                                        else{
                                                            document.getElementById("Ded_Flag").checked = false;
                                                            document.getElementById("Ded_Rate").value = obj.Ded_Rate;
                                                        }
                                                },
                                                error: function (jqXHR, exception) {
                                                    document.write(exception);
                                                }
                                        });  
    
                            });
                    });
                   
        </script>


