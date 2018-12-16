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
                <h1>ประมวลผลค่าจ้างประจำรอบ</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-2 info-box-label">Period : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="date" name="AttnDate"  class="form-control" />
                                </dd>
                                <dt class="col-sm-1 info-box-label">Term : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="number" name="AttnDate"  class="form-control" />
                                </dd>
                                <dt class="col-sm-1 info-box-label">Holiday : </dt>
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
                                <th colspan="2">Function List</th>
                                </tr>
                                    <tr>
                                     <th scope="col" width="15%"><input type="checkbox"/>  Select All</th>
                                    <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>Salary Calculation Transaction</td> 
                                 </tr>
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>Post Allowance - Express Transaction</td> 
                                 </tr>   
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>Post Other Income and Deduct Transaction</td> 
                                 </tr>  
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>Post Attendance Transaction</td> 
                                 </tr>    
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>Post Overtime Transaction</td> 
                                 </tr>      
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>Provident Fund Calculation Transaction</td> 
                                 </tr>      
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>Social Security Calculation Transaction</td> 
                                 </tr>          
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>Monthly Tax Calculation Transaction</td> 
                                 </tr>          
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox"/> </td>
                                    <td>Reset Diligent Level</td> 
                                 </tr>        
                                </tbody>
                                <thead>
                                        <tr>
                                        <th colspan="2">Option</th>
                                        </tr>    
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="text-align : center;"><input type="checkbox" disabled/> </td>
                                    <td>Annual Leave Remaining Refund Calculation (2nd Trem of Jan)</td> 
                                 </tr>  
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox" disabled/> </td>
                                    <td>Union Member Fee Calculation (2nd Term of Dec)</td> 
                                 </tr>  
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox" disabled/> </td>
                                    <td>Bonus Calculation (Pay Bonus)</td> 
                                 </tr>  
                                 <tr>
                                    <td style="text-align : center;"><input type="checkbox" disabled/> </td>
                                    <td>Bonus Tax Calculation</td> 
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
                                            <dt class="col-sm-2 info-box-label">Criteria</dt>
                                        </dl>
                                </div>    

                                 <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Employee From : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="date" name="AttnDate"  class="form-control" />
                                </dd>
                                <dt class="col-sm-1 info-box-label">to : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="number" name="AttnDate"  class="form-control" />
                                </dd>
                            </dl>
                        </div>      

                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Department From : <span class="field-required">*</span></dt>
                                <dd class="col-sm-2">
                                <input type="date" name="AttnDate"  class="form-control" />
                                </dd>
                                <dt class="col-sm-1 info-box-label">to : <span class="field-required">*</span></dt>
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