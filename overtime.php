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
$sql = "SELECT tt04_overtime.* , tm03_employee.EmplTName, tm03_employee.EmplType
FROM tt04_overtime
JOIN tm03_employee ON tt04_overtime.EmplCode=tm03_employee.EmplCode";
$DATA = mysqli_query($conn, $sql);

?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>รายการทำงานล่วงเวลา</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="overtime_create.php">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">วันที่</th>
                                    <th scope="col">รหัสพนักงาน</th>
                                    <th scope="col">ชื่อพนักงาน</th>
                                    <th scope="col">ประเภทพนักงาน</th>
                                    <th scope="col">OVT10</th>
                                    <th scope="col">OVT15</th>
                                    <th scope="col">OVT20</th>
                                    <th scope="col">OVT25</th>
                                    <th scope="col">OVT30</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows['auto_increment'];
    $AttnDate = $rows['AttnDate'];
    $AttnDate = date('d-m-Y', strtotime($AttnDate));
    $Sort_Attndate = date('Ymd', strtotime($AttnDate));
    $EmplCode = $rows['EmplCode'];
    $EmplTName = $rows['EmplTName'];
    $EmplType = $rows['EmplType'];
    $OVT10 = $rows['OVT10'];
    $OVT15 = $rows['OVT15'];
    $OVT20 = $rows['OVT20'];
    $OVT25 = $rows['OVT25'];
    $OVT30 = $rows['OVT30'];
    // $DeductTDesc = $rows['DeductTDesc'];
    // $Remark = $rows['Remark'];
    // $Amount = $rows['Amount'];
    // $TaxCalFlag = $rows['TaxCalFlag'];
    if( $EmplType == "D"){
        $EmplType = "รายวัน";
      }
      else{
        $EmplType = "รายเดือน";
      }
  ?>
                                <tr>
                                <td><span class='hide'><?php echo $Sort_Attndate; ?></span><?php echo $AttnDate; ?></td>
                                <td style="text-align: center;"><?php echo $EmplCode; ?></td>
                                <td><?php echo $EmplTName; ?></td>
                                <td><?php echo $EmplType; ?></td>
                                <td><?php echo $OVT10; ?></td>
                                <td><?php echo $OVT15 ; ?></td>
                                <td><?php echo $OVT20; ?></td>
                                <td><?php echo $OVT25; ?></td>
                                <td><?php echo $OVT30; ?></td>
                                <td>
                                <center>
                                <a href="overtime_change.php?id=<?php echo $id?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='overtime_delete.php?id=<?php echo $id?>';}">
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
            responsive: true ,
            "order": [[ 0, "desc" ]]
            
        });
    });
    </script>