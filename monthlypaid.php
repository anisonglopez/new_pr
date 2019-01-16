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
$sql = "SELECT tt05_monthlypaid.* , tm03_employee.EmplTName, tm03_employee.EmplType, tm02_department.DeptEDesc
FROM tt05_monthlypaid
JOIN tm03_employee ON tt05_monthlypaid.EmplCode=tm03_employee.EmplCode
JOIN tm02_department ON tm02_department.DeptCode=tm03_employee.DeptCode";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>ปรับปรุงรายการ</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <!-- <a href="otherdeduct_create.php">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> สร้างใหม่</button>
                        </a> -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">ประจำงวด</th>
                                    <th scope="col">รอบ</th>
                                    <th scope="col">ประเภทพนักงาน</th>
                                    <th scope="col">รหัสพนักงาน</th>
                                    <th scope="col">ชื่อพนักงาน</th>
                                    <th scope="col">แผนก</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows['auto_increment'];
    $Period = $rows['Period'];
    $Term = $rows['Term'];
    $EmplCode = $rows['EmplCode'];
    $EmplTName = $rows['EmplTName'];
    $EmplType = $rows['EmplType'];
    $DeptEDesc = $rows['DeptEDesc'];
    if( $EmplType == "D"){
        $EmplType = "รายวัน";
      }
      else{
        $EmplType = "รายเดือน";
      }
  ?>
                                <tr>
                                <td style="text-align: center;"><?php echo $Period; ?></td>
                                <td><?php echo $Term; ?></td>
                                <td><?php echo $EmplType; ?></td>
                                <td><?php echo $EmplCode; ?></td>
                                <td><?php echo $EmplTName; ?></td>
                                <td><?php echo $DeptEDesc; ?></td>
                                <td>
                                <center>
                                <a href="monthlypaid_change.php?id=<?php echo $id?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='monthlypaid_delete.php?id=<?php echo $id?>';}">
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
<?php include("includes/footer.php"); ?>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            "order": [[ 0, "desc" ], [ 1, 'desc' ]]
        });
    });
    </script>