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
$sql = "SELECT * FROM tm00_control ";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>Prepare for Monthly Closing</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="systemcon_create.php">
                        <button type="button" class="btn btn-success">สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">ประจำงวด</th>
                                    <th scope="col" style="text-align : center;">รอบ</th>
                                    <th scope="col" style="text-align : center;">ประเภทพนักงาน</th>
                                    <th scope="col" style="text-align : center;">วันที่เริ่มคิดค่าจ้าง</th>
                                    <th scope="col" style="text-align : center;">ถึง</th>
                                    <th scope="col" style="text-align : center;">วันที่จ่าย</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows['auto_increment'];
    $row1 = $rows['Period'];
    $row2 = $rows['Term'];
    $row3 = $rows['EmplType'];
    $row4 = $rows['FmAttnDate'];
    $row5 = $rows['ToAttnDate'];
    $row6 = $rows['PayDate'];
    if( $row3 == "D"){
      $row3 = "รายวัน";
    }
    else{
      $row3 = "รายเดือน";
    }
    if ($row6 == "0000-00-00"){
        $row6  = "";
    }
    else{
        $row6 = date("d/m/Y", strtotime($row6));
    }
  ?>
                                <tr>
                                <td><?php echo $row1; ?></td>
                                <td style="text-align: center;"><?php echo $row2; ?></td>
                                <td style="text-align: center;"><?php echo $row3; ?></td>
                                <td style="text-align: center;"><?php echo date("d/m/Y", strtotime($row4));?></td>
                                <td style="text-align: center;"><?php echo date("d/m/Y", strtotime($row5)); ?></td>
                                <td style="text-align: center;"><?php echo $row6?></td>
                                <td>
                                <center>
                                <a href="systemcon_change.php?id=<?php echo $id?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='systemcon_delete.php?id=<?php echo $id?>';}">
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
            "order": [[ 0, "desc" ]]
        });
    });
    </script>