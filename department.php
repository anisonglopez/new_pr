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
$sql = "SELECT * FROM tm02_department";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>Department</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="department_create.php">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">Dep No</th>
                                    <th scope="col">Description (EN)</th>
                                    <th scope="col">Description (TH)</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

    while ($rows = mysqli_fetch_array($DATA)) {
            $DeptCode = $rows['DeptCode'];
            $row1 = $rows['DeptEDesc'];
            $row2 = $rows['DeptTDesc'];
  ?>
                                <tr>
                                <td><?php echo $DeptCode; ?></td>
                                <td><?php echo $row1; ?></td>
                                <td><?php echo $row2; ?></td>
                                <td>
                                <center>
                                <a href="department_change.php?DeptCode=<?php echo $DeptCode?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='department_delete.php?DeptCode=<?php echo $DeptCode?>';}">
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