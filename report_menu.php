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
                <h1>รายงาน</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                       <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                     <th scope="col" width="15%" style="text-align: center;">  </th>
                                    <th scope="col" style="text-align: center;">คำอธิบาย</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="text-align : center;">   
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_salary_report"><span class="glyphicon glyphicon-download" aria-hidden="true"></span> ดาวน์โหลด</button>
                                    </td>
                                    <td>รายงานการจ่ายเงินประจำเดือน (Salary Report)</td> 
                                 </tr>
                                 <tr>
                                    <td style="text-align : center;">   
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_pay_slip"><span class="glyphicon glyphicon-download" aria-hidden="true"></span> ดาวน์โหลด</button>
                                    <!-- Button trigger modal -->
                                    </td>
                                    <td>พิมพ์ใบจ่ายเงิน (Pay Slip)</td> 
                                 </tr>
                                 
                                </tbody>
                                </table>
                                
                            <!-- /.table-responsive -->
         </div>
    </div>
    <?php include("includes/footer.php"); ?>
    <!-- Blog Sidebar Widgets Column -->

<!-- Modal -->
<div class="modal fade" id="modal_salary_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">รายงานการจ่ายเงินประจำเดือน (Salary Report)</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Download</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_pay_slip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">พิมพ์ใบจ่ายเงิน (Pay Slip)</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="report_pdf/payslip_report.php" method="get" target="_blank">
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                    <dl class="row">
                    <dt class="col-sm-2 info-box-label">ประจำงวด : <span class="field-required">*</span></dt>
                    <dd class="col-sm-4 info-box-label">
                    <select class="form-control"  name="Period" required>
                         <option value="">Select</option>   
                          <?php
                          $strSQL = "SELECT DISTINCT Period  FROM tm00_control ORDER BY  Period DESC";
                         $objQuery = mysqli_query($conn, $strSQL);
                          while($objResuut = mysqli_fetch_array($objQuery))
                          {
                          ?>
                            <option value="<?=$objResuut["Period"];?>"><?=$objResuut["Period"]?></option>
                          <?php
                          }
                          ?>
                        </select>      
                    </dd>
                </dl>
            </div>
            <div class="col-md-12"> 
            <dl class="row">
                    <dt class="col-sm-2 info-box-label">รอบ : <span class="field-required">*</span></dt>
                    <dd class="col-sm-4 info-box-label">
                    <select class="form-control"  name="Term" required>
                         <option value="">Select</option>   
                         <option value="1">1</option>   
                         <option value="2">2</option>   
                        </select>      
                    </dd>
                </dl>
            </div>

             <div class="col-md-12"> 
            <dl class="row">
                    <dt class="col-sm-2 info-box-label">รหัสแผนก จาก : </dt>
                    <dd class="col-sm-4 info-box-label">
                    <select class="form-control"  name="DeptCode_from" >
                         <option value="">Select</option>   
                          <?php
                          $strSQL = "SELECT * FROM tm02_department";
                         $objQuery = mysqli_query($conn, $strSQL);
                          while($objResuut = mysqli_fetch_array($objQuery))
                          {
                          ?>
                            <option value="<?=$objResuut["DeptCode"];?>"><?=$objResuut["DeptCode"]." - ".$objResuut["DeptTDesc"];?></option>
                          <?php
                          }
                          ?>
                        </select>          
                    </dd>
                    <dt class="col-sm-1 info-box-label">ถึง : </dt>
                    <dd class="col-sm-4 info-box-label">
                    <select class="form-control"  name="DeptCode_to" >
                         <option value="">Select</option>   
                          <?php
                          $strSQL = "SELECT * FROM tm02_department Order by DeptCode DESC";
                         $objQuery = mysqli_query($conn, $strSQL);
                          while($objResuut = mysqli_fetch_array($objQuery))
                          {
                          ?>
                            <option value="<?=$objResuut["DeptCode"];?>"><?=$objResuut["DeptCode"]." - ".$objResuut["DeptTDesc"];?></option>
                          <?php
                          }
                          ?>
                        </select>          
                    </dd>
                </dl>
            </div>

            <div class="col-md-12"> 
            <dl class="row">
                    <dt class="col-sm-2 info-box-label">รหัสพนักงาน จาก : </dt>
                    <dd class="col-sm-4 info-box-label">
                    <input name="EmplCode_from" type="text" data-placement="top"   class="form-control" maxlength="5" placeholder="00000" />      
                    </dd>
                    <dt class="col-sm-1 info-box-label">ถึง : </dt>
                    <dd class="col-sm-4 info-box-label">
                    <input name="EmplCode_to" type="text" data-placement="top"   class="form-control" maxlength="5" placeholder="99999" />      
                    </dd>
                </dl>
            </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Download</button>
        </form>
      </div>
    </div>
  </div>
</div>



