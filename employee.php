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
$sql = "SELECT tm03_employee.EmplCode,tm03_employee.BirthDate,tm03_employee.Salary, tm03_employee.EmplType, tm03_employee.EmplTName, tm02_department.DeptTDesc, tm02_position.PosiTDesc, tm03_employee.Sex  ";
$sql .= "FROM tm03_employee ";
$sql .= "INNER JOIN tm02_department ON tm03_employee.DeptCode=tm02_department.DeptCode ";
 $sql .= "INNER JOIN tm02_position ON tm03_employee.PosiCode=tm02_position.PosiCode ";
$sql .= "ORDER BY EmplCode ASC ";
$DATA = mysqli_query($conn, $sql);
function getAge($birthday) {
    $then = strtotime($birthday);
    return(floor((time()-$then)/31556926));
    }
?>
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>Employee</h1>
            <hr>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="employee_create.php">
                        <button type="button" class="btn btn-success">คลิกเพื่อสร้างพนักงานใหม่ </button>
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
                                <?php
while ($rows = mysqli_fetch_array($DATA)) {
    $EmplCode = $rows['EmplCode'];
    $EmplType = $rows['EmplType'];
    $EmplTName = $rows['EmplTName'];
    $DeptTDesc = $rows['DeptTDesc'];
    $PosiTDesc = $rows['PosiTDesc'];
    $Sex = $rows['Sex'];
    $dateB=$rows['BirthDate'];
    $BirthDate = getAge($dateB);
    $Salary=$rows['Salary'];

    if( $EmplType == "D"){
      $EmplType = "รายวัน";
    }
    else{
      $EmplType = "รายเดือน";
    }
    if( $Sex == "F"){
      $Sex = "หญิง";
    }
    elseif($Sex =="M"){
      $Sex = "ชาย";
    }


                                ?>            
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
<?php } ?>
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
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
   

        
  <!-- Script Delete-->
