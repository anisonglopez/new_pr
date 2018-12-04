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
$sql = "SELECT * FROM tm02_otherinc";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>Employee Income</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="empincome_create.php">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">Income No</th>
                                    <th scope="col">Description (EN)</th>
                                    <th scope="col">Description (TH)</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

    while ($rows = mysqli_fetch_array($DATA)) {
        $OthINCCode = $rows['OthINCCode'];
        $OthINCEDesc = $rows['OthINCEDesc'];
        $OthINCTDesc = $rows['OthINCTDesc'];
        $OthINCAmt = $rows['OthIncAmt'];
        $TaxCalFlag = $rows['TaxCalFlag'];
        if( $TaxCalFlag == "1"){
            $TaxCalFlag = '<span style="color :green; font-weight: 800;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
          }
          else{
            $TaxCalFlag = '<span style="color :red; font-weight: 800;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
          }

  ?>
                                <tr>
                                    <td><?php echo $OthINCCode; ?></td>
                                    <td><?php echo $OthINCEDesc; ?></td>
                                    <td><?php echo $OthINCTDesc; ?></td>
                                    <td><?php echo $OthINCAmt; ?></td>
                                    <td style="text-align:center;"><?php echo $TaxCalFlag; ?></td>
                                <td>
                                <center>
                                <a href="empincome_change.php?OthINCCode=<?php echo $OthINCCode?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='empincome_delete.php?OthINCCode=<?php echo $OthINCCode?>';}">
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