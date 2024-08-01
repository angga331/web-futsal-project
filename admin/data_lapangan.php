<?php
include '../db_connect.php';

// Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($conn->connect_error) {
    die("Koneksi error: " . $conn->connect_error);
}

// Query untuk mengambil data lapangan
$query = "SELECT * FROM lapangan";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID_Lapangan"] . "</td>";
        echo "<td>" . $row["Lapangan"] . "</td>";
        echo "<td>" . $row["Kualitas_Lapangan"] . "</td>";
        echo "<td>Rp " . number_format($row["Tarif_Sewa_Per_Jam"], 0, ',', '.') . "</td>";
        echo "<td>Rp " . number_format($row["Tarif_Sewa_Per_Jam"], 0, ',', '.') . "</td>";
        
        // Menampilkan status lapangan
        echo "<td>" . $row["Status"] . "</td>";
        
        echo "<td>";
        echo '<button class="btn btn-primary btn-sm edit-lapangan-button" data-id="' . $row["ID_Lapangan"] . '" data-name="' . $row["Lapangan"] . '" data-kualitas="' . $row["Kualitas_Lapangan"] . '" data-harganormal="' . $row["Tarif_Sewa_Per_Jam"] . '" data-status="' . $row["Status"] . '" data-bs-toggle="modal" data-bs-target="#editLapanganModal">Edit</button>';
      
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>Tidak ada data ditemukan</td></tr>";
}

if (isset($_POST['updateLapangan'])) {
    $lapanganId = $_POST['editLapanganId'];
    $lapanganName = $_POST['editLapanganName'];
    $kualitasLapangan = $_POST['editKualitasLapangan'];
    $hargaJamNormal = $_POST['editHargaJamNormal'];
    $statusLapangan = $_POST['editStatusLapangan'];

    // Query to update lapangan data
    $updateQuery = "UPDATE lapangan SET Lapangan = ?, Kualitas_Lapangan = ?, Tarif_Sewa_Per_Jam = ?, Status = ? WHERE ID_Lapangan = ?";

    // Prepare statement
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssdss", $lapanganName, $kualitasLapangan, $hargaJamNormal, $statusLapangan, $lapanganId);

    if ($stmt->execute()) {
        $stmt->close();
        // Redirect ke halaman admin setelah berhasil mengedit lapangan
        header("Location: admin.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Mengekspor data admin ke CSV
if (isset($_GET['export'])) {
    // Set header untuk download file CSV
 header('Content-Type: text/csv; charset=utf-8');
 header('Content-Disposition: attachment; filename=data_admin.csv');
 
 // Membuka file output
 $output = fopen("php://output", "w");
 
 // Menulis header kolom ke file CSV
 fputcsv($output, array('No', 'Lapangan', 'Kualitas Lapangan' ,'Tarif Sewa Per Jam', 'Status'));
 
 // Query untuk mengambil data admin
 $result = $conn->query("SELECT Lapangan, Kualitas_Lapangan, Tarif_Sewa_Per_Jam, Status FROM Lapangan ORDER BY ID_Lapangan");
 
 // Inisialisasi counter untuk nomor urut
 $no = 1;
 
 // Menulis data ke file CSV
 while ($row = $result->fetch_assoc()) {
     // Array data dengan nomor urut otomatis
     $data = array($no, $row['Lapangan'], $row['Kualitas_Lapangan'] ,$row['Tarif_Sewa_Per_Jam'], $row['Status']);
     
     // Menulis baris data ke file CSV
     fputcsv($output, $data);
     
     // Meningkatkan counter
     $no++;
 }
 
 fclose($output);
 exit();}


$conn->close();
