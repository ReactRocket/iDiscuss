<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "idiscusss";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    header("location: index.php");
}