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
                <h1>ประมวลผลค่าจ้างประจำรอบ</h1>
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
                        <div class="row">
                                <dl class="row">
                                    <dt class="col-sm-2 info-box-label">Period : <span class="field-required">*</span></dt>
                                    <dd class="col-sm-2 info-box-label">
                                    <input name="AttnCode" type="text" data-placement="top" required  class="form-control" maxlength="5"/>      
                                    </dd>
                                    <dt class="col-sm-1 info-box-label">Term : <span class="field-required">*</span></dt>
                                    <dd class="col-sm-2 info-box-label">
                                    <input name="AttnCode" type="text" data-placement="top" required  class="form-control" maxlength="5"/>      
                                    </dd>
                                    <dt class="col-sm-2 info-box-label">Holiday : <span class="field-required">*</span></dt>
                                    <dd class="col-sm-2 info-box-label">
                                    <input name="AttnCode" type="text" data-placement="top" required  class="form-control" maxlength="5"/>      
                                    </dd>
                                </dl>

                                <dl class="row">
                                <dt class="col-sm-1"></dt>
                                    <dt class="col-sm-2 ">Function List  </dt>

                                        </div>
                            </div>
        <!-- สุด div -->
                    </div>
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