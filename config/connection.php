<?php
$host = "localhost";
$user = "root";
$pw = "";
$dbname = "pondok";

try {
    $conn = new PDO("mysql:host=localhost;dbname=pondok", $user,$pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$con = mysqli_connect("localhost", "root", "" ,"pondok");
?>