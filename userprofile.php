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
$sql = "SELECT * FROM tm01_user";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>User Profile</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="userprofile_create.php">
                        <button type="button" class="btn btn-success">สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">รหัสผู้ใช้งาน</th>
                                    <th scope="col">ชื่อผู้ใช้งาน (EN)</th>
                                    <th scope="col">ชื่อผู้ใช้งาน (TH)</th>
                                    <th scope="col">วันที่เข้าใช้งานระบบล่าสุด</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
  while ($rows = mysqli_fetch_array($DATA)) {
    $UserID = $rows['UserID'];
    $row2 = $rows['UserEName'];
    $row3 = $rows['UserTName'];
    $row4 = $rows['LastLogon'];
  ?>
                                <tr>
                                <td><?php echo $UserID; ?></td>
                                <td><?php echo $row2; ?></td>
                                <td><?php echo $row3; ?></td>
                                <td><?php echo $row4; ?></td>
                                <td>
                                <center>
                                <a href="userprofile_change.php?UserID=<?php echo $UserID?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='userprofile_delete.php?UserID=<?php echo $UserID?>';}">
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