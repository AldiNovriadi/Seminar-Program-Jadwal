<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smkn";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}
