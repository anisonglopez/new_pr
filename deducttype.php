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
$sql = "SELECT * FROM tm02_deducttype";
$DATA = mysqli_query($conn, $sql);


?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1>Deduct Type</h1>
            <hr>
            
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="deducttype_create.php">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> สร้างใหม่</button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th scope="col">Description (EN)</th>
                                    <th scope="col">Description (TH)</th>
                                    <th scope="col" colspan="5">Amount</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

    while ($rows = mysqli_fetch_array($DATA)) {
        $DeductCode = $rows['DeductCode'];
        $row1 = $rows['DeductDesc'];
        $row2 = $rows['DeductTDesc'];
        $row3 = $rows['DeductAmt'];
        $row4 = $rows['DeductAmt2'];
        $row5 = $rows['DeductAmt3'];
        $row6 = $rows['DeductAmt4'];
        $row7 = $rows['DeductAmt5'];
        $row8 = $rows['TaxCalFlag'];
    if( $row8 == "1"){
      $row8 = '<span style="color :green; font-weight: 800;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
    }
    else{
      $row8 = '<span style="color :red; font-weight: 800;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
    }
  ?>
                                <tr>
                                <td><?php echo $row1; ?></td>
                                <td><?php echo $row2; ?></td>
                                <td style="text-align: center;"><?php echo $row3; ?></td>
                                <td style="text-align: center;"><?php echo $row4; ?></td>
                                <td style="text-align: center;"><?php echo $row5; ?></td>
                                <td style="text-align: center;"><?php echo $row6; ?></td>
                                <td style="text-align: center;"><?php echo $row7; ?></td>
                                <td style="text-align: center;"><?php echo $row8; ?></td>
                                <td>
                                <center>
                                <a href="deducttype_change.php?DeductCode=<?php echo $DeductCode?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='deducttype_delete.php?DeductCode=<?php echo $DeductCode?>';}">
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