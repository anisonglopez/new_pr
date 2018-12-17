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
 if(isset($_POST["import_to_system"])){
for($i=0;$i<count($_POST["EmplCode"]);$i++)
// loop add data
{
                    if(trim($_POST["EmplCode"][$i]) != "")
                    {
                        $EmplCode = $_POST["EmplCode"][$i];
                        $AttnDate = $_POST["AttnDate"][$i];
                        $AttnDate =  date('Y-m-d', strtotime($AttnDate));
                        $AttnCode = $_POST["AttnCode"][$i];
                        $TIMEin = $_POST["TIMEin"][$i];
                        $TIMEout = $_POST["TIMEout"][$i];
                        $Hours = $_POST["Hours"][$i];
                        $Ded_Flag = $_POST["Ded_Flag"][$i];
                        $Ded_Rate = $_POST["Ded_Rate"][$i];
                        $SysPgmID = "Import_ATCS";
                        date_default_timezone_set("Asia/Bangkok");
                        $date = date('Y-m-d H:i:s');
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $strSQL = "INSERT INTO tt04_attendance ";
                        $strSQL .="(EmplCode, AttnDate, AttnCode, TIMEin, TIMEout, Hours, Ded_Flag, Ded_Rate, SysUpdDate, SysUserID, SysPgmID) ";
                        $strSQL .="VALUES ";
                        $strSQL .="('".$EmplCode."',
                        '".$AttnDate."'
                        ,'".$AttnCode."',
                        '". $TIMEin."',
                        '". $TIMEout."',
                        '".$Hours."',
                        '". $Ded_Flag."',
                        '". $Ded_Rate."',
                        '".$date."',
                        '".$_SESSION['UserID']."',
                        '".$SysPgmID ."')";
                        
                        $objQuery = mysqli_query($conn, $strSQL);
                        if($objQuery)
                        {
                            $result = 'ทำการบันทึกข้อมูลสำเร็จ';
                        }
                        else
                        {
                            $result = 'ขออภัย! ไม่สามารถทำการบันทึกข้อมูลได้';
                            //header("Location: " . $_SERVER['REQUEST_URI']);
                           // header("location: ../../user.php");
                        }
                        //echo $strSQL;
                    }
                    }
                }
 }
?>
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <?php echo $result; ?>
    <a href="attentran.php">กลับ</a>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>