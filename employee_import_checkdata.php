<?php
 if(isset($_POST["file"])){
     echo "hello";
		$filename=$_FILES["file"]["tmp_name"];		
        $row = 0;
 
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
                 if ($row > 0){
                    echo $getData[0];
                    echo "<br>";
                    echo $getData[1];
                 }
              
                $row++;
	         }
			
	         fclose($file);	
		 }
	}	 
 
 
 ?>