<?php 
	session_start();
	include "../config/connect.php";
	
	$strSQL = "SELECT * FROM tm01_user WHERE UserID = '".mysqli_real_escape_string($conn, $_POST['txtUsername'])."' 
	and Password = '".mysqli_real_escape_string($conn, $_POST['txtPassword'])."'";
	$objQuery = mysqli_query($conn, $strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
            echo "<script language='javascript'>alert('ชื่อผู้ใช้งาน รหัสผ่านไม่ถูกต้อง')
			window.location = './login/login.php';
            </script>";
            //header("location:./login/login.php");
	}
	
	else
	{
		
       // echo "Username and Password Ok!";
            $_SESSION["UserID"] = $objResult["UserID"];
            //$_SESSION["Status"] = $objResult["Status"];
            date_default_timezone_set("Asia/Bangkok");
            $date = date('Y-m-d H:i:s');
            $strSQL = "UPDATE tm01_user SET LastLogon = '".$date ."' WHERE UserID = '".$_SESSION["UserID"]."' ";
$objQuery = mysqli_query($conn, $strSQL);
            session_write_close();		
            header("location: ./../index.php");
		/*	if($objResult["Status"] == "ADMIN")
			{
				header("location:admin_page.php");
			}
			else
			{
				header("location:user_page.php");
            }
            */
	}
	mysqli_close($conn);
?>