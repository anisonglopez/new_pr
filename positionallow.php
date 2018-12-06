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
$sql = "SELECT tt04_positionallow.* , tm03_employee.EmplTName, tm03_employee.EmplType, tm02_position.PosiCode, tm02_position.PosiTDesc 
FROM tt04_positionallow 
JOIN tm03_employee ON tt04_positionallow.EmplCode=tm03_employee.EmplCode
JOIN tm02_position ON tt04_positionallow.PosiCode=tm02_position.PosiCode";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>เงินประจำตำแหน่ง</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="positionallow_create.php">
                        <button type="button" class="btn btn-success">สร้างใหม่</button>
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
                                    <th scope="col">รหัสตำแหน่ง</th>
                                    <th scope="col">ชื่อตำแหน่ง</th>
                                    <th scope="col">จำนวนเงิน</th>
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
    $PosiCode = $rows['PosiCode'];
    $PosiTDesc = $rows['PosiTDesc'];
    $Remark = $rows['Remark'];
    $PosiAllow = $rows['PosiAllow'];
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
                                <td><?php echo $PosiCode; ?></td>
                                <td><?php echo $PosiTDesc; ?></td>
                                <td><?php echo $PosiAllow; ?></td>
                                <td><?php echo $Remark; ?></td>
                                <td>
                                <center>
                                <a href="positionallow_change.php?id=<?php echo $id?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='positionallow_delete.php?id=<?php echo $id?>';}">
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