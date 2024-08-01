<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penyewaan_futsal";

// Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($conn->connect_error) {
    die("Koneksi error: " . $conn->connect_error);
}

$conn->close();

?>
