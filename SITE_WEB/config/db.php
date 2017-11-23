<?php
/**
 * Created by 0m3ga-K0d3r.
 * User: root
 * Date: 2/11/17
 * Time: 4:20 PM
 */




$USER = "root";
$PASSWORD = ""; 
$HOST = "localhost";
$DB_NAME = "project_db";


$conn = mysqli_connect($HOST,$USER,$PASSWORD,$DB_NAME);

if (!$conn) {
    die("Connection Error: " . mysqli_connect_error());
}
