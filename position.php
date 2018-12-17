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
$sql = "SELECT * FROM tm02_position";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>ตำแหน่งงาน</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="position_create.php">
                        <button type="button" class="btn btn-success">สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">รหัสตำแหน่ง </th>
                                    <th scope="col">ตำแหน่ง (ENG)</th>
                                    <th scope="col">ตำแหน่ง (TH))</th>                          
                                    <th scope="col">เบี้ยเลี้ยง/วัน(เช้า)</th>
                                    <th scope="col">เบี้ยเลี้ยง/วัน(บ่าย)</th>
                                    <th scope="col">เบี้ยเลี้ยง/วัน(เย็น)</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
  while ($rows = mysqli_fetch_array($DATA)) {
    $PosiCode = $rows['PosiCode'];
    $row1 = $rows['PosiEDesc'];
    $row2 = $rows['PosiTDesc'];
    
    $row4 = $rows['M_ShftALW_D'];
    $row5 = $rows['E_ShftALW_D'];
    $row6 = $rows['N_ShftALW_D'];
  ?>
                                <tr>
                                <td><?php echo $PosiCode; ?></td>
                                <td><?php echo $row1; ?></td>
                                <td><?php echo $row2; ?></td>                   
                                <td style="text-align: center;"><?php echo $row4; ?></td>
                                <td style="text-align: center;"><?php echo $row5; ?></td>
                                <td style="text-align: center;"><?php echo $row6; ?></td>
                                <td>
                                <center>
                                <a href="position_change.php?PosiCode=<?php echo $PosiCode?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='position_delete.php?PosiCode=<?php echo $PosiCode?>';}">
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