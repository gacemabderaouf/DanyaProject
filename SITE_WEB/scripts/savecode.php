<?php
/**
 * Created by 0m3ga-K0d3r.
 * User: root
 * Date: 2/17/17
 * Time: 5:15 PM
 */


require "../config/db.php";

// Let's Assume it's an AJAX call

if (isset($_POST["websiteName"]) && isset($_POST["websiteDescription"]) && isset($_POST["websiteCategory"]) && isset($_POST["websiteContent"])) {
    $result = [];
    $websiteName = $_POST["websiteName"];
    $websiteDescription = $_POST["websiteDescription"];
    $websiteCategory = $_POST["websiteCategory"];
    $websiteContent = $_POST["websiteContent"];
    $insertQuery = "INSERT INTO savedwebsites VALUES(NULL, '$websiteName' , '$websiteContent' , '$websiteDescription' , NOW(), 'aliens.jpg', '$websiteCategory')";
    $runQuery = mysqli_query($conn, $insertQuery);
    if ($runQuery) {
        $result["status"] = "success";
    } else {
        $result["status"] = "error";
    }

    echo json_encode($result);

}