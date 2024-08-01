<?php
include '../db_connect.php';

// Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($conn->connect_error) {
    die("Koneksi error: " . $conn->connect_error);
}

// Query untuk mengambil data lapangan
$query = "SELECT * FROM lapangan where ID_Lapangan = 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" ;
        echo "08:00 - 17:00";
        echo "</td>";
        echo "<td>Rp " . number_format($row["Tarif_Sewa_Per_Jam"], 0, ',', '.') . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" ;
        echo "1700 - 22:00";
        echo "</td>";
        echo "<td>Rp " . number_format($row["Tarif_Sewa_Per_Jam"], 0, ',', '.') . "</td>";
        echo "</tr>";
        echo "</tbody>";
    }
} else {
    echo "<tr><td colspan='7'>Tidak ada data ditemukan</td></tr>";
}