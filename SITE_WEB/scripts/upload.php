<?php



if (isset($_FILES['myFile'])) {
    if(move_uploaded_file($_FILES['myFile']['tmp_name'], "../uploads/images". DIRECTORY_SEPARATOR . "images/". $_FILES['myFile']['name'])) {

        $result = ["status" => "success", "path" => $_FILES['myFile']['name']];

        echo json_encode($result);
    }
    else {

    }

}




