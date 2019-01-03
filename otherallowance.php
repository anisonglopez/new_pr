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
$sql = "SELECT tt04_otherallow.* , tm03_employee.EmplTName ,tm03_employee.EmplType
FROM tt04_otherallow
JOIN tm03_employee ON tt04_otherallow.EmplCode=tm03_employee.EmplCode";
$DATA = mysqli_query($conn, $sql);

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
                <h1>รายได้อื่น ๆ</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="otherallowance_create.php">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">รหัสพนักงาน</th>
                                    <th scope="col">ชื่อพนักงาน</th>
                                    <th scope="col">ประเภทพนักงาน</th>
                                    <th scope="col"><?php echo $allow1 ?></th>
                                    <th scope="col"><?php echo $allow2 ?></th>
                                    <th scope="col"><?php echo $allow3 ?></th>
                                    <th scope="col"><?php echo $allow4 ?></th>
                                    <th scope="col"><?php echo $allow5 ?></th>
                                    <th scope="col"><?php echo $allow6 ?></th>
                                    <th scope="col">หมายเหตุ</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows['auto_increment'];
    $EmplCode = $rows['EmplCode'];
    $EmplTName = $rows['EmplTName'];
    $EmplType = $rows['EmplType'];
    $Remark = $rows['Remark'];
    $OthAllow1 = $rows['OthAllow1'];
    $OthAllow2 = $rows['OthAllow2'];
    $OthAllow3 = $rows['OthAllow3'];
    $OthAllow4 = $rows['OthAllow4'];
    $OthAllow5 = $rows['OthAllow5'];
    $OthAllow6 = $rows['OthAllow6'];
    if( $EmplType == "D"){
        $EmplType = "รายวัน";
      }
      else{
        $EmplType = "รายเดือน";
      }
  ?>
                                <tr>
                                <td style="text-align: center;"><?php echo $EmplCode; ?></td>
                                <td><?php echo $EmplTName; ?></td>
                                <td><?php echo $EmplType; ?></td>
                                <td><?php echo $OthAllow1; ?></td>
                                <td><?php echo $OthAllow2; ?></td>
                                <td><?php echo $OthAllow3; ?></td>
                                <td><?php echo $OthAllow4; ?></td>
                                <td><?php echo $OthAllow5; ?></td>
                                <td><?php echo $OthAllow6; ?></td>
                                <td><?php echo $Remark; ?></td>
                                <td>
                                <center>
                                <a href="otherallowance_change.php?id=<?php echo $id?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='otherallowance_delete.php?id=<?php echo $id?>';}">
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
            responsive: true
        });
    });
    </script>