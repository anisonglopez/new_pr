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
    $strSQL = "SELECT tt04_positionallow.* , tm03_employee.EmplTName ,tm03_employee.EmplType
    FROM tt04_positionallow
    JOIN tm03_employee ON tt04_positionallow.EmplCode=tm03_employee.EmplCode 
    WHERE auto_increment = '".$_GET["id"]."'"; 
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
      $id = $rows['auto_increment'];
      $EmplCode = $rows['EmplCode'];
      $EmplTName = $rows['EmplTName'];
      $PosiAllow = $rows["PosiAllow"];
      $PosiCode = $rows["PosiCode"];
      $Remark = $rows["Remark"];
    $output .= '<input type="hidden" name="id" value="'.$_GET["id"].'">
    <br>
    <div class="row">
    <div class="col-md-6">
                          <dl class="row">
                              <dt class="col-sm-4 info-box-label">พนักงาน : <span class="field-required">*</span></dt>
                              <dd class="col-sm-8 info-box-label">  
                              <input name="EmplTName" type="text" id="EmplTName" class="form-control" required placeholder="ระบุพนักงาน" value="'.$EmplTName.'" disabled />
              <input name="EmplCode" type="hidden" id="EmplCode" value="" />
                              </dd>
                          </dl>
                      </div>


                      <div class="col-md-6">
                          <dl class="row">
                          <dt class="col-sm-4 info-box-label">Position : <span class="field-required">*</span></dt>
                     <dd class="col-sm-8 info-box-label">
                     <select class="form-control"  name="PosiCode" required>';
                     $strSQL = "SELECT * FROM tm02_position";
                          $objQuery = mysqli_query($conn, $strSQL);
                          while($objResuut = mysqli_fetch_array($objQuery))
                          {
                          
                            if($objResuut["PosiCode"] == $PosiCode)
                            {
                              $sel = "selected";
                            }
                            else
                            {
                              $sel = "";
                            }

                          $output.='<option value="'.$objResuut["PosiCode"].'" '.$sel.'>'.$objResuut["PosiCode"].' - '.$objResuut["PosiTDesc"].'</option>';
                          }
                          
                     $output .='
                      </select>    
                      </dd>  
                      </div>
                      <div class="col-md-6">
                          <dl class="row">
                              <dt class="col-sm-4 info-box-label">จำนวนเงิน : </dt>
                              <dd class="col-sm-8 info-box-label">
                              <input name="PosiAllow" type="number" data-placement="top" required  class="form-control" min="0"  value="'.$PosiAllow.'"/>
                              </dd>
                          </dl>
                      </div>      
                      <div class="col-md-6">
                          <dl class="row">
                              <dt class="col-sm-4 info-box-label">Remark : </dt>
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
            <h1>Change Position Allowance</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="positionallow_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="positionallow.php">
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


