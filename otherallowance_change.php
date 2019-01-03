<?php
error_reporting(0);
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>
<?php
include "config/connect.php";
if(isset($_GET["id"])) {    
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

    $strSQL = "SELECT tt04_otherallow.* , tm03_employee.EmplTName ,tm03_employee.EmplType
    FROM tt04_otherallow
    JOIN tm03_employee ON tt04_otherallow.EmplCode=tm03_employee.EmplCode";
    $strSQL .= " WHERE auto_increment = '".$_GET["id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    
    while ($rows = mysqli_fetch_array($objQuery)) {    
        $id = $rows['auto_increment'];
        $EmplCode = $rows['EmplCode'];
        $EmplTName = $rows['EmplTName'];
        $OthAllow1 = $rows["OthAllow1"];
        $OthAllow2 = $rows["OthAllow2"];
        $OthAllow3 = $rows["OthAllow3"];
        $OthAllow4 = $rows["OthAllow4"];
        $OthAllow5 = $rows["OthAllow5"];
        $OthAllow6 = $rows["OthAllow6"];
        $Remark = $rows["Remark"];
    
    $output .= '<input type="hidden" name="id" value="'.$_GET["id"].'">
    <br>
    <div class="row">
    <div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">พนักงาน : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">  
        <input name="EmplTName" value="'.$EmplTName.'" type="text" class="form-control" required placeholder="ระบุพนักงาน"  disabled/>
        <input name="EmplCode" type="hidden" id="EmplCode" value="" />
        </dd>
    </dl>
</div>
<div class="col-md-12">
    
</div>
<div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label"> '.$allow1.' : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input type="number" name="OthAllow1" class="form-control" min="0"  value="'.$OthAllow1.'"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">'.$allow2.' : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OthAllow2" type="number" data-placement="top" required  class="form-control" min="0"  value="'.$OthAllow2.'"/>
                                </dd>
                            </dl>
                        </div>      
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">'.$allow3.' : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OthAllow3" type="number" data-placement="top" required  class="form-control" min="0"  value="'.$OthAllow3.'"/>
                                </dd>
                            </dl>
                        </div>   
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">'.$allow4.' : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OthAllow4" type="number" data-placement="top" required  class="form-control" min="0"  value="'.$OthAllow4.'"/>
                                </dd>
                            </dl>
                        </div>   
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">'.$allow5.' : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OthAllow5" type="number" data-placement="top" required  class="form-control" min="0"  value="'.$OthAllow5.'"/>
                                </dd>
                            </dl>
                        </div>   
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">'.$allow6.' : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="OthAllow6" type="number" data-placement="top" required  class="form-control" min="0"  value="'.$OthAllow6.'"/>
                                </dd>
                            </dl>
                        </div>   
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">หมายเหตุ : </dt>
                                <dd class="col-sm-8 info-box-label">
                                 <textarea  class="form-control" rows="3" name="Remark" id="Remark" placeholder="ระบุหมายเหตุ">'.$Remark.'</textarea>
                                </dd>
                            </dl>
                        </div>   
                        </div>   

         ';  
}  }
 ?>
 
        <div class="row">
<!-- Blog Entries Column -->
<div class="col-md-12">
            <h1>แก้ไขข้อมูลรายได้อื่น ๆ</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="otherallowance_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="otherallowance.php">
                        <button type="button" class="btn btn-info">กลับ</button>
                        </a>    
                        <button type="submit" class="btn btn-success">อัปเดตข้อมูล </button>
                    </div>
                    <div class="panel-body">
                    <?php  echo $output;?>
                    </div>
                </form>
<br>
</div>
<!-- Blog Sidebar Widgets Column -->
<!-- /.row -->

<?php include("includes/footer.php"); ?>


