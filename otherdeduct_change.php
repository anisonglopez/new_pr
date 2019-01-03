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
    $strSQL = "SELECT tt04_otherdeduct.* , tm03_employee.EmplTName, tm03_employee.EmplType,tm02_deducttype.DeductTDesc
    FROM tt04_otherdeduct
    JOIN tm03_employee ON tt04_otherdeduct.EmplCode=tm03_employee.EmplCode
    JOIN tm02_deducttype ON tt04_otherdeduct.DeductCode=tm02_deducttype.DeductCode";
    $strSQL .= " WHERE auto_increment = '".$_GET["id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
        $id = $rows['auto_increment'];
        $EmplCode = $rows['EmplCode'];
        $EmplTName = $rows['EmplTName'];
        $EmplType = $rows['EmplType'];
        $DeductCode = $rows['DeductCode'];
        $DeductTDesc = $rows['DeductTDesc'];
        $count = $rows['count'];
        $Remark = $rows['Remark'];
        $Amount = $rows['Amount'];
        $TaxCalFlag = $rows['TaxCalFlag'];
        $checked = ($rows['TaxCalFlag'] == '1') ? "checked" : "";
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
        <dt class="col-sm-4 info-box-label">เลือกประเภทการหักเงิน : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
        <select class="form-control"  name="DeductCode" required>';
        $strSQL = "SELECT * FROM tm02_deducttype";
        $objQuery = mysqli_query($conn, $strSQL);
         while($objResuut = mysqli_fetch_array($objQuery))
         {
         
           if($objResuut["DeductCode"] == $DeductCode)
           {
             $sel = "selected";
           }
           else
           {
             $sel = "";
           }

         $output.='<option value="'.$objResuut["DeductCode"].'" '.$sel.'>'.$objResuut["DeductCode"].' - '.$objResuut["DeductTDesc"].'</option>';
         }
            $output.=' </select>      
        </dd>
    </dl>
</div>
<!--
<div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">Count : </dt>
        <dd class="col-sm-8 info-box-label">
        <input type="text" name="count" value="'.$count.'" placeholder="ระบุ Count" class="form-control"/>
        </dd>
    </dl>
</div>
-->
<div class="col-md-6">
    <dl class="row">
        <dt class="col-sm-4 info-box-label">จำนวนเงินที่หัก : </dt>
        <dd class="col-sm-8 info-box-label">
        <input name="Amount" type="number" value="'.$Amount.'" data-placement="top" required  class="form-control" min="1"  value="0"/>
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
<div class="col-md-12">
    <dl class="row">
        <dt class="col-sm-2 info-box-label">นำไปคำนวณภาษี : </dt>
        <dd class="col-sm-2">
        <div class="material-switch">
        <input id="TaxCalFlag" name="TaxCalFlag" type="checkbox" '.$checked .'  value="1"/>
            <label for="TaxCalFlag" class="label-success"></label>
        </div>
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
            <h1>แก้ไขรายการหัก</h1>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <form class="form-inline"  method="post"  action="otherdeduct_change_acc.php" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" name="update"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
                    <a href="otherdeduct.php">
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


