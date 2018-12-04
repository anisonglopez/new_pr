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
$sql = "SELECT * FROM tm02_branch";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>Branch</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="branch_create.php">
                        <button type="button" class="btn btn-success">สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">รหัสสาขา</th>
                                    <th scope="col">ชื่อสาขา (ENG)</th>
                                    <th scope="col">ชื่อสาขา (ไทย)</th>
                                    <th scope="col">เบอร์</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
  while ($rows = mysqli_fetch_array($DATA)) {
    $BranchCode = $rows['BranchCode'];
    $row1 = $rows['BranchEName'];
    $row2 = $rows['BranchTName'];
    $row3 = $rows['Address'];
    $row4 = $rows['PhoneNo'];
  ?>      
                                <tr>
         <td width="10%"><?php echo $BranchCode; ?></td>
      <td width="30%"><?php echo $row1; ?></td>
      <td width="30%"><?php echo $row2; ?></td>
      <td width="10%"><?php echo $row4; ?></td>
      <td><center>
      <a href="branch_change.php?BranchCode=<?php echo $BranchCode?>">
    <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
    </a>
    <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='branch_delete.php?BranchCode=<?php echo $BranchCode?>';}">
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