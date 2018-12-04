<?php
//error_reporting(0);
		//mysqli_select_db("payrolldb");
		//mysqli_query("SET CHARACTER SET utf8");
		//mysqli_query('SET CHARACTER SET tis620'); 
		
		//mysqli_query("SET character_set_results=utf8");
		//mysqli_query("SET character_set_client=utf8");
		//mysqli_query("SET character_set_connection=utf8");

	$serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "payrolldb";
   $charSet = "utf8";
  
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		die();
	}
	else
	{
		//echo "Database Connected.";
	}

	mysqli_set_charset($conn,$charSet);
	//mysqli_close($conn);
?>