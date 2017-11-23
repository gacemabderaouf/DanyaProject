<?php

require "../config/db.php";


if (isset($_FILES['myFile'])) {
        $flName = $_FILES['myFile']['name']; 
        
        $flSelectQuery = "SELECT * FROM filetodownload WHERE `filetodownload`.name = \"$flName\"  ";
        $selectionResult = mysqli_query($conn, $flSelectQuery);
        
        $cpt=0;
        while($data=mysqli_fetch_assoc($selectionResult)){$cpt++;}

        if($cpt>0){
            $result = ["status" => "exist", "path" => $flName, "fileName" => substr($flName, 0, strpos($flName, "."))]; 
            echo json_encode($result);
        }
        else{

            if(move_uploaded_file($_FILES['myFile']['tmp_name'], "../uploads/". DIRECTORY_SEPARATOR . "files/". $_FILES['myFile']['name'])) {
            	
                	$sql = "INSERT INTO filetodownload VALUES(NULL, \"$flName\", NOW())";
        	    	$resultQuery = mysqli_query($conn,$sql);
        	    	$result = ["status" => "success", "path" => $flName, "fileName" => substr($flName, 0, strpos($flName, "."))];	
        	    	echo json_encode($result);
                }
              else {
                $result = ["status" => "failure"];  
                echo json_encode($result);
                }
        }
  

}




