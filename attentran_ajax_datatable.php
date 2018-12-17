<?php 
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php include("config/connect.php"); ?>
<?php 
$sql = "SELECT tt04_attendance.* , tm03_employee.EmplTName, tm03_employee.EmplType,tm02_attncode.AttnTDesc
FROM tt04_attendance
JOIN tm03_employee ON tt04_attendance.EmplCode=tm03_employee.EmplCode
JOIN tm02_attncode ON tt04_attendance.AttnCode=tm02_attncode.AttnCode";
$DATA = mysqli_query($conn, $sql);


?>

 <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                <thead>
                                    <tr>
                                    <th scope="col">วันที่ลา</th>
                                    <th scope="col">รหัสพนักงาน</th>
                                    <th scope="col">ชื่อพนักงาน</th>
                                    <th scope="col">ประเภทพนักงาน</th>
                                    <th scope="col">ประเภทการลา</th>
                                    <th scope="col">จำนวน(ชม.)</th>
                                    <th scope="col">หักเงิน</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      
    <?php
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows['auto_increment'];
    
    $AttnDate = $rows['AttnDate'];
    $AttnDate = date('d-m-Y', strtotime($AttnDate));
    $Sort_Attndate = date('Ymd', strtotime($AttnDate));
    $EmplCode = $rows['EmplCode'];
    $EmplTName = $rows['EmplTName'];
    $EmplType = $rows['EmplType'];
    $AttnTDesc = $rows['AttnTDesc'];
    $Hours = $rows['Hours'];
    $Ded_Flag = $rows['Ded_Flag'];
    // $DeductTDesc = $rows['DeductTDesc'];
    // $Remark = $rows['Remark'];
    // $Amount = $rows['Amount'];
    // $TaxCalFlag = $rows['TaxCalFlag'];
    if( $Ded_Flag == "1"){
      $Ded_Flag = '<span style="color :green; font-weight: 800;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
    }
    else{
      $Ded_Flag = '<span style="color :red; font-weight: 800;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
    }
    if( $EmplType == "D"){
        $EmplType = "รายวัน";
      }
      else{
        $EmplType = "รายเดือน";
      }
  ?>
                                <tr>
                                <td><span class='hide'><?php echo $Sort_Attndate; ?></span><?php echo $AttnDate; ?></td>
                                <td style="text-align: center;"><?php echo $EmplCode; ?></td>
                                <td><?php echo $EmplTName; ?></td>
                                <td><?php echo $EmplType; ?></td>
                                <td><?php echo $AttnTDesc; ?></td>
                                <td><?php echo $Hours ; ?></td>
                                <td><?php echo $Ded_Flag; ?></td>
                                <td>
                                <center>
                                <a href="attentran_change.php?id=<?php echo $id?>">
                                <button  class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                                </a>
                                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='attentran_delete.php?id=<?php echo $id?>';}">
                            <button  class="btn btn-danger delete_id"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                            </a>
                            </center>
                            </td>
                            </tr>
<?php } ?>                          
                                </tbody>
                                </table>                  
                                <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true ,
            "order": [[ 0, "desc" ]]
        });
    });
    </script>