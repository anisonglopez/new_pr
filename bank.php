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
$sql = "SELECT * FROM tm02_bank";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>ข้อมูลธนาคาร</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="bank_create.php">
                        <button type="button" class="btn btn-success">สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">รหัสธนาคาร</th>
                                    <th scope="col">ชื่อธนาคาร (ENG)</th>
                                    <th scope="col">ชื่อธนาคาร (TH)</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
  while ($rows = mysqli_fetch_array($DATA)) {
    $bankcode = $rows['bankcode'];
    $row1 = $rows['BankEName'];
    $row2 = $rows['BankTName'];
    $row3 = $rows['PhoneNo'];
  ?>      
                                <tr>
                                <td><?php echo $bankcode; ?></td>
                                <td><?php echo $row1; ?></td>
                                <td><?php echo $row2; ?></td>
                                <td><?php echo $row3; ?></td>
      <td><center>
      <a href="bank_change.php?bankcode=<?php echo $bankcode?>">
    <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
    </a>
    <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='bank_delete.php?bankcode=<?php echo $bankcode?>';}">
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