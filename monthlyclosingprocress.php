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
                <h1>ประมวลผลค่าจ้าง</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-2 info-box-label">ประจำงวดที่ : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="date" name="AttnDate"  class="form-control" />
                                </dd>
                                <dt class="col-sm-1 info-box-label">รอบการคำนวณ : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="number" name="AttnDate"  class="form-control" />
                                </dd>
                                <dt class="col-sm-1 info-box-label">จำนวนวันหยุด : </dt>
                                <dd class="col-sm-2">
                                <input type="number" name="AttnDate"  class="form-control" />
                                </dd>
                            </dl>
                        </div>                 
                                <!--คั่นกลาง-->
                                <div class="col-md-2">
                                </div>
                        <div class="col-md-8">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                <th colspan="2">เลือกฟังก์ชั่น</th>
                                </tr>
                                    <tr>
                                     <th scope="col" width="15%"><input type="checkbox"/>  Select All</th>
                                    <th scope="col" style="text-align: center;">คำอธิบาย</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>Salary Calculation Transaction</td> 
                                 </tr>
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>คำนวณรายได้/รายจ่าย</td> 
                                 </tr>   
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>คำนวณรายได้อื่นๆ/รายการหัก</td> 
                                 </tr>  
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>ประมวล รายการ ขาด ลา มาสาย</td> 
                                 </tr>    
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>ประมวลผลค่าล่วงเวลา</td> 
                                 </tr>      
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>คำนวณเงินกองทุนสำรองเลี้ยงชีพ</td> 
                                 </tr>      
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>คำนวณเงินประกันสังคม</td> 
                                 </tr>          
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>คำนวณการหักเงินภาษีรายได้</td> 
                                 </tr>          
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>รีเซ็ทระดับเบี้ยขยันสะสม</td> 
                                 </tr>        
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>คำนวณระดับเบี้ยขยันสะสม</td> 
                                 </tr>        
                                </tbody>
                                <thead>
                                        <tr>
                                        <th colspan="2">เงื่อนไข</th>
                                        </tr>    
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="text-align : center;"><input type="checkbox" disabled/> </td>
                                    <td>คำนวณคืนเงินพักร้อนคงเหลือ</td> 
                                 </tr>  
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox" disabled/> </td>
                                    <td>คำนวณการหักเงินสหภาพ</td> 
                                 </tr>  
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox" disabled/> </td>
                                    <td>คำนวณเงินโบนัส</td> 
                                 </tr>  
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox" disabled/> </td>
                                    <td>คำนวณภาษีโบนัส</td> 
                                 </tr>  
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

         </div>
                                   <!--คั่นกลาง-->
                                   <div class="col-md-2">
                                </div>
                                <div class="col-md-12">
                                        <dl class="row">
                                            <dt class="col-sm-2 info-box-label">เงื่อนไขการประมวลผล</dt>
                                        </dl>
                                </div>    

                                 <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">จากรหัสพนักงาน : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="date" name="AttnDate"  class="form-control" />
                                </dd>
                                <dt class="col-sm-1 info-box-label">ถึง : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="number" name="AttnDate"  class="form-control" />
                                </dd>
                            </dl>
                        </div>      

                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">จากรหัสแผนก : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="date" name="AttnDate"  class="form-control" />
                                </dd>
                                <dt class="col-sm-1 info-box-label">ถึง : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="number" name="AttnDate"  class="form-control" />
                                </dd>
                            </dl>
                        </div>    

                         <div class="col-md-12">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success btn-lg btn-block" value="Start"/>
                            </div>
                            <div class="col-md-6">
                                <input type="reset" class="btn btn-danger btn-lg btn-block" value="Reset"/>
                            </div>
                        </div>         
                               
         </div>

    </div>


    <!-- Blog Sidebar Widgets Column -->
<?php include("includes/footer.php"); ?>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>