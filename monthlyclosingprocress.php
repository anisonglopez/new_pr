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
                <h1>ประมวลผลค่าจ้างประจำรอบ</h1>
            <hr>
            <p> inprogress</p>
          

        <!-- สุด div -->

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