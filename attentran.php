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
                        <button class="btn btn-success" data-toggle="modal" data-target="#modal_import">Import</button>
                        <a href="file_import/attendance_file_import.csv" download>
                        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> ดาวน์โหลดไฟล์นำเข้า</button>
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


<!--Modal Create-->
<div class="modal fade" id="modal_import" tabindex="-1" role="dialog" aria-labelledby="modal_create_label" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 700px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="modal_create_label">นำเข้าประวัติการลงเวลา</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="attentran_import_checkdata.php" method="post"  enctype="multipart/form-data">    
      <div class="modal-body" >
                 <p>กรุณาเลือกไฟล์ นามสกุล .Csv</p>   
                <p> 
                            <input type="hidden" name="import"/>
                            <input type="file" name="file"  required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                    </p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit_import" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">ตรวจสอบความถูกต้อง</button>
      </div> 
      </form>
    </div>
  </div>
<!--Modal Create-->