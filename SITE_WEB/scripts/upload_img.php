<?php

require "../config/db.php";


if (isset($_FILES['myFile'])) {
        $imgName = $_FILES['myFile']['name']; 
        
        $imgSelectQuery = "SELECT * FROM images WHERE `images`.name = \"$imgName\"  ";
        $selectionResult = mysqli_query($conn, $imgSelectQuery);
        
        $cpt=0;
        while($data=mysqli_fetch_assoc($selectionResult)){$cpt++;}

        if($cpt>0){
            $result = ["status" => "exist", "path" => $imgName, "imageName" => substr($imgName, 0, strpos($imgName, "."))]; 
            echo json_encode($result);
        }
        else{

            if(move_uploaded_file($_FILES['myFile']['tmp_name'], "../uploads/". DIRECTORY_SEPARATOR . "images/". $_FILES['myFile']['name'])) {
            	
                	$sql = "INSERT INTO images VALUES(NULL, \"$imgName\", \"\", NOW())";
        	    	$resultQuery = mysqli_query($conn,$sql);
        	    	$result = ["status" => "success", "path" => $imgName, "imageName" => substr($imgName, 0, strpos($imgName, "."))];	
        	    	echo json_encode($result);
                }
              else {
                $result = ["status" => "failure"];  
                echo json_encode($result);
                }
        }
  

}




