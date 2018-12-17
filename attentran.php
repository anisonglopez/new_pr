<?php 
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
            <div class="col-md-12">
                <h1>ประวัติการลงเวลา</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="attentran_create.php">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div id="loading-image" style="display:none; text-align: center;" >
                            <img src="img/loading_gif/flat-progress-bar-stripe-loader.gif" /> กรุณารอซักครู่.... ระบบกำลังโหลดข้อมูล
                        </div>           
                        <div id="table_detail"></div>
                           
                            <!-- /.table-responsive -->
         </div>

    </div>

    <!-- Blog Sidebar Widgets Column -->
<?php include("includes/footer.php"); ?>
<script>
$(document).ready(function() {
    $.ajax({  
            url:"attentran_ajax_datatable.php",  
                method:"post",  
                data:{},  
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
