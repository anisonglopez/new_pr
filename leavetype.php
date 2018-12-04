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
$sql = "SELECT * FROM tm02_attncode";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>Leave Type</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="leavetype_create.php">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">Leave Type No</th>
                                    <th scope="col">Description (EN)</th>
                                    <th scope="col">Description (TH)</th>
                                    <th scope="col">อัตราหัก</th>
                                    <th scope="col">Deduct Flag</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
  while ($rows = mysqli_fetch_array($DATA)) {
    $AttnCode = $rows['AttnCode'];
    $row1 = $rows['AttnEDesc'];
    $row2 = $rows['AttnTDesc'];
    $row3 = $rows['Ded_Rate'];
    $row4 = $rows['Ded_Flag'];
    if( $row4 == "1"){
      $row4 = '<span style="color :green; font-weight: 800;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
    }
    else{
      $row4 = '<span style="color :red; font-weight: 800;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
    }
  ?>
                                <tr>
                                <td style="text-align: center;"><?php echo $AttnCode; ?></td>
                                <td><?php echo $row1; ?></td>
                                <td><?php echo $row2; ?></td>
                                <td style="text-align: center;"><?php echo $row3; ?></td>
                                <td style="text-align: center;"><?php echo $row4; ?></td>
                                <td>
                                <center>
                                <a href="leavetype_change.php?AttnCode=<?php echo $AttnCode?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='leavetype_delete.php?AttnCode=<?php echo $AttnCode?>';}">
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