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
                <h1>Import Employee</h1>
            <hr>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <p>
                        <a href="employee.php">
                        <button type="button" class="btn btn-info">กลับ </button>
                        </a>

                        <button class="btn">
                        <input type="file" name="file" id="file"   size="20"/>
                        </button>
                        <button type="submit" id="submit_import" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                        </p>

                        <a href="employee_create.php">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> ยืนยันการนำเข้าข้อมูล</button>
                        </a>
                        <a href="employee_create.php">
                        <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>ยกเลิกการนำเข้าข้อมูล</button>
                        </a>
                        <a href="employee_create.php">
                        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> </button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">Emp ID</th>
                                    <th scope="col">Employee Type</th>
                                    <th scope="col">Name - Lastname</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">อายุ</th>
                                    <th scope="col">เงินเดือน</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                <tr>
      <td class="mx-2"><?php echo $EmplCode; ?></td>
      <td style="text-align: center;"><?php echo $EmplType; ?></td>
      <td><?php echo $EmplTName; ?></td>
      <td><?php echo $DeptTDesc;?></td>
      <td><?php echo $PosiTDesc; ?></td>
      <td><?php echo $BirthDate;?></td>
      <td><?php echo $Salary;?></td>
      <td><center>
      <a href="employee_change.php?EmplCode=<?php echo $EmplCode?>">
    <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
    </a>
    <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='employee_delete.php?EmplCode=<?php echo $EmplCode?>';}">
  <button  class="btn btn-danger delete_id"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
  </a>
  </center>
  </td>
    </tr>

                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <p id=detail></p>
         </div>

</div>
            <!-- Blog Sidebar Widgets Column -->
        <!-- /.row -->
        <?php include("includes/footer.php"); ?>
        <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
   
   <script>
                    $(document).ready(function(){
                            $( submit_import ).on( "click", function() { 
                                var file_data = $('#file').prop('files')[0];  
                                console.log(file_data);
                                $.ajax({  
                                                url:"employee_import_checkdata.php",  
                                                method:"post",  
                                                data:{file_data:file_data},         
                                                success:function(data){             
                                                        $('#detail').html(data);  
                                                },
                                                error: function (jqXHR, exception) {
                                                    document.write(exception);
                                                }
                                        });  
    
                            });
                    });
                   
        </script>
        
  <!-- Script Delete-->
