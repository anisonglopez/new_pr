 <?php 
session_start();
error_reporting(0);
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<?php
 if(isset($_POST["import"])){
        $filename=$_FILES["file"]["tmp_name"];		
        $row = 0;
	}	 
 ?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>ตรวจสอบความถูกต้องของข้อมูล</h1>
            <hr>
            
            <form action="attentran_import_importdata.php" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="attentran.php">
                        <button type="button" class="btn btn-success">กลับ</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">รหัสพนักงาน</th>
                                    <th scope="col">ชื่อพนักงาน (map)</th>
                                    <th scope="col" width="10%">วันที่</th>
                                    <th scope="col">รหัสการลา</th>
                                    <th scope="col">ชื่อการลา (map)</th>
                                    <th scope="col">เวลาเข้างาน</th>
                                    <th scope="col">เวลาออกงาน</th>
                                    <th scope="col"  width="5%">จำนวนชั่วโมง</th>
                                    <th scope="col"  width="5%">Ded_Flag</th>
                                    <th scope="col">อัตราหัก</th>
                                    <th scope="col" style="text-align: center;">ผลการวิเคราะห์</th>
                                    </tr>
                                </thead>
                                <tbody>
                              
                                <?php
		 if($_FILES["file"]["size"] > 0)
		 {
              $file = fopen($filename, "r");
              $error_sum = 0;
              $pass_sum = 0;
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
                 if ($row > 0){
                     $error_flag = 0;
                     //พนง
                    $EmplCode = $getData[0];
                    if ($EmplCode == NULL){
                        $EmplCode = "<p style='color: red;'>error ข้อมูลหายไป</p>";
                        $error_flag = 1;
                    }
                    //วันที่
                    $AttnDate = $getData[1];
                    if ($AttnDate == NULL){
                        $AttnDate = "<p style='color: red;'>error ข้อมูลหายไป</p>";
                        $error_flag = 1;
                    }else{
                        $AttnDate =  date('d-m-Y', strtotime($AttnDate));
                    }
                    //รหัสการลา
                    $AttnCode = $getData[2];
                    $AttnCode = ($AttnCode== NULL) ? "<p style='color: red;'>error ข้อมูลหายไป</p>" : $AttnCode;
                    //เวลาเข้า
                    $TIMEin = $getData[3];
                    $TIMEin = ($TIMEin== NULL or "NULL") ? "00:00:00" : date('h:i:s', strtotime($TIMEin));
                    //เวลาออก
                    $TIMEout = $getData[4];
                    $TIMEout = ($TIMEout== NULL or "NULL") ? "00:00:00" : date('h:i:s', strtotime($TIMEout));
                    //ชั่วโมง
                    $Hours = $getData[5];
                    $Hours = ($Hours== NULL) ? "<p style='color: red;'>error ข้อมูลหายไป</p>" : $Hours;
                    //ชั่วโมง
                    $Ded_Flag = $getData[6];
                    $Ded_Flag = ($Ded_Flag== NULL) ? "<p style='color: red;'>error ข้อมูลหายไป</p>" : $Ded_Flag;
                    //rate
                    $Ded_Rate = $getData[7];
                    $Ded_Rate = ($Ded_Rate== NULL) ? "<p style='color: red;'>error ข้อมูลหายไป</p>" : $Ded_Rate;
                    //check empno map
                   $emplcode_check_sql = "SELECT tm03_employee.EmplTName 
                   FROM tm03_employee WHERE  tm03_employee.EmplCode=  '".$EmplCode."'";
                   $emplcode_check_data = mysqli_query($conn, $emplcode_check_sql);
                   $empl_name_check = mysqli_fetch_array($emplcode_check_data);
                   $empl_name = $empl_name_check['EmplTName'];
                   if ($empl_name == NULL){
                    $empl_name = "<p style='color: red;'>error ไม่พบรหัสพนักงานในระบบ</p>";
                    $error_flag = 1;
                }
                   // check attncode map
                   $attncode_check_sql = "SELECT tm02_attncode.AttnTDesc 
                   FROM tm02_attncode WHERE  tm02_attncode.AttnCode= '".$AttnCode."' ";
                   $attncode_check_data = mysqli_query($conn, $attncode_check_sql);
                   $attn_name_check = mysqli_fetch_array($attncode_check_data);
                   $attn_name = $attn_name_check['AttnTDesc'];
                   if ($attn_name == NULL){
                    $attn_name = "<p style='color: red;'>error ไม่พบรหัสการลาในระบบ</p>";
                    $error_flag = 1;
                }

                   $Import_result = "";
                   if($error_flag == 1){
                    $Import_result = "<p style='color:red;'> ไม่อนุญาติให้นำเข้าระบบ</p>";
                    $error_sum += 1;
                   }
                   else{
                    $Import_result = "<p style='color:green;'> ผ่าน</p>";
                    $pass_sum += 1;
                   }
?>

<tr>
                    <td style="text-align: center;"><?php echo $EmplCode  ;?></td>
                    <td><?php echo $empl_name  ;?> </td>
                    <td><?php echo $AttnDate  ;?></td>
                    <td style="text-align: center;"><?php echo $AttnCode  ;?> </td>
                    <td><?php echo $attn_name  ;?></td>
                    <td style="text-align: center;"><?php echo $TIMEin  ;?> </td>
                    <td style="text-align: center;"><?php echo $TIMEout  ;?></td>
                    <td style="text-align: center;"><?php echo $Hours  ;?></td>
                    <td style="text-align: center;"><?php echo $Ded_Flag  ;?></td>
                    <td style="text-align: center;"><?php echo $Ded_Rate  ;?></td>
                    <td style="text-align: center;"><?php echo $Import_result ?></td>
                    
                    <input type="hidden" name="EmplCode[]" value="<?php echo $EmplCode ?>"/>
                    <input type="hidden" name="AttnDate[]" value="<?php echo $AttnDate ?>"/>
                    <input type="hidden" name="AttnCode[]" value="<?php echo $AttnCode ?>"/>
                    <input type="hidden" name="TIMEin[]" value="<?php echo $TIMEin ?>"/>
                    <input type="hidden" name="TIMEout[]" value="<?php echo $TIMEout ?>"/>
                    <input type="hidden" name="Hours[]" value="<?php echo $Hours ?>"/>
                    <input type="hidden" name="Ded_Flag[]" value="<?php echo $Ded_Flag ?>"/>
                    <input type="hidden" name="Ded_Rate[]" value="<?php echo $Ded_Rate ?>"/>
 </tr>


<?php 	    
 }
 
 $row++;     
} 
$error_flag = 1;
fclose($file);	
}else
{
    $error_flag = 1;
  
}
?>                     
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <br>
                            <div class="col-md-12">
                            <center>
                                    <h4>ผลการวิเคราะห์</h4>
                                    <p>ข้อมูลทั้งหมด = <?php  echo $row - 1;?> แถว</p>
                                    <p >จำนวนแถวที่สามารถนำเข้าระบบได้ = <?php echo $pass_sum ;?> แถว</p>
                                    <p>จำนวนแถวที่ไม่อนุญาตินำเข้าระบบ = <?php echo  $error_sum ;?> แถว</p>
                                    <?php 
                            $accept_import = "";
                                if($error_flag == 1){
                                    $accept_import = "<p style='color:red;'> ไม่อนุญาติใหันำเข้าระบบ เนื่องจากมีข้อมูลไม่เรียบร้อย กรุณานำไฟล์เข้าระบบใหม่อีกครั้ง !</p>";
                                }
                                else
                                {
                                    $accept_import = '<input name="import_to_system" type="submit" class="btn btn-success btn-lg btn-block" value="Import to System"/>';
                                }
                            ?>
                              
                            <p><?php echo  $accept_import ;?></p>
                            
                                    </center>
                            </div>     
         </div>

    </div>
    

    <!-- Blog Sidebar Widgets Column -->
<?php include("includes/footer.php"); ?>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
            "order": [[ 10, "desc" ]]
        });
    });
    </script>