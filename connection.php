<?php
$username = "root"; // username
$password = "";      //  password
$server   = "localhost";   //  server
$dbname   = "library";      // database

$connect = new mysqli($server, $username, $password, $dbname);

if ($connect->connect_error) {
    die("error:" . $conn->connect_error);
    exit();
}   
?>