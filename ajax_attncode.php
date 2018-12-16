<?php
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./includes/login/login.php");
    exit();
}
?>
<?php
if(isset($_POST["attncode"])) {
    include("config/connect.php"); 
    error_reporting(0);
    $strSQL = "SELECT * FROM tm02_attncode WHERE AttnCode = '".$_POST["attncode"]."'";   
    $objQuery = mysqli_query($conn, $strSQL);
    while($objResuut = mysqli_fetch_array($objQuery))
    {
        $myObj->Ded_Flag = $objResuut["Ded_Flag"];
        $myObj->Ded_Rate = $objResuut["Ded_Rate"];
        $myJSON = json_encode($myObj);
        echo $myJSON;
    }

    // $myObj->name = "John";
    // $myObj->age = 30;
    // $myObj->city = "New York";
    
    // $myJSON = json_encode($myObj);
    
    // echo $myJSON;
}

?>