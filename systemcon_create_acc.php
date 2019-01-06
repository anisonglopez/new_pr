<?php
//error_reporting(0);
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("includes/header.php"); ?>

<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
    <input type="text" value="<?php echo $_POST['period'] ?>" id="period" />
    <input type="text" value="<?php echo $_POST['term'] ?>" id="term" />
    <input type="text" value="<?php echo $_POST['EmplType'] ?>" id="EmplType" />
    <input type="text" value="<?php echo $_POST['salary_date_from'] ?>" id="salary_date_from" />
    <input type="text" value="<?php echo $_POST['salary_date_to'] ?>" id="salary_date_to" />
    <input type="text" value="<?php echo $_POST['overtime_date_from'] ?>" id="overtime_date_from" />
    <input type="text" value="<?php echo $_POST['overtime_date_to'] ?>" id="overtime_date_to" />
    <input type="text" value="<?php echo $_POST['lev_date_from'] ?>" id="lev_date_from" />
    <input type="text" value="<?php echo $_POST['lev_date_to'] ?>" id="lev_date_to" />
    <input type="text" value="<?php echo $_POST['paydate'] ?>" id="paydate" />
    <input type="text" value="<?php echo $_POST['Holiday'] ?>" id="Holiday" />
    <a href="systemcon.php">กลับ</a>
    <!--  ajax ส่งค่ากลับ-->
    <div id="loading-image" style="display:none; text-align: center;" >
                            <img src="img/loading_gif/flat-progress-bar-stripe-loader.gif" /> กรุณารอซักครู่.... ระบบกำลังโหลดข้อมูล
                        </div>           
                        <div id="table_detail"></div>
    </div>
       <!--  ajax ส่งค่ากลับ-->

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
         <?php include("includes/sidebar.php"); ?>

</div>
<!-- /.row -->
<?php include("includes/footer.php"); ?>
<script>
$(document).ready(function() {
    var period=document.getElementById("period").value; 
    var term=document.getElementById("term").value; 
    var EmplType=document.getElementById("EmplType").value; 
    var salary_date_from=document.getElementById("salary_date_from").value; 
    var salary_date_to=document.getElementById("salary_date_to").value; 
    var overtime_date_from=document.getElementById("overtime_date_from").value; 
    var overtime_date_to=document.getElementById("overtime_date_to").value; 
    var lev_date_from=document.getElementById("lev_date_from").value; 
    var lev_date_to=document.getElementById("lev_date_to").value; 
    var paydate=document.getElementById("paydate").value; 
    var Holiday=document.getElementById("Holiday").value; 

    $.ajax({  
            url:"systemcon_ajax_monthlypaid_datatable.php",  
                method:"post",  
                data:{period:period,
                    term:term,
                    EmplType:EmplType,
                    salary_date_from:salary_date_from,
                    salary_date_to:salary_date_to,
                    overtime_date_from:overtime_date_from,
                    overtime_date_to:overtime_date_to,
                    lev_date_from:lev_date_from,
                    lev_date_to:lev_date_to,
                    paydate:paydate,
                    Holiday:Holiday},   
                    beforeSend: function() {
                        $("#loading-image").show();
                    },
                success:function(data){          
                    $('#table_detail').html(data);  
                    $("#loading-image").hide();
                },
                error: function (jqXHR, exception) {
                    document.write(exception);
                }
        });  
 });
</script>

