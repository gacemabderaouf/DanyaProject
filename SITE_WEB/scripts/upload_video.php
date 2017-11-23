<?php

require "../config/db.php";


if (isset($_FILES['myFile'])) {
        $vdName = $_FILES['myFile']['name']; 
        
        $flSelectQuery = "SELECT * FROM videos WHERE `videos`.name = \"$vdName\"  ";
        $selectionResult = mysqli_query($conn, $flSelectQuery);
        
        $cpt=0;
        while($data=mysqli_fetch_assoc($selectionResult)){$cpt++;}

        if($cpt>0){
            $result = ["status" => "exist", "path" => $vdName, "videoName" => substr($vdName, 0, strpos($vdName, "."))]; 
            echo json_encode($result);
        }
        else{

            if(move_uploaded_file($_FILES['myFile']['tmp_name'], "../uploads/". DIRECTORY_SEPARATOR . "videos/". $_FILES['myFile']['name'])) {
            	
                	$sql = "INSERT INTO videos VALUES(NULL, \"$vdName\", NOW())";
        	    	$resultQuery = mysqli_query($conn,$sql);
        	    	$result = ["status" => "success", "path" => $vdName, "videoName" => substr($vdName, 0, strpos($vdName, "."))];	
        	    	echo json_encode($result);
                }
              else {
                $result = ["status" => "failure"];  
                echo json_encode($result);
                }
        }
  

}




