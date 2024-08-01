<?php
include '../db_connect.php';

// Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($conn->connect_error) {
    die("Koneksi error: " . $conn->connect_error);
}

//Menampilkan member
$query = "SELECT * FROM penyewa";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row_number = 1; // Inisialisasi nomor urut
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row_number . "</td>";
        echo "<td>" . $row['Nama_Lengkap_Penyewa'] . "</td>";
        echo "<td>" . $row['Kontak_Penyewa'] . "</td>";
        echo "<td>";
        echo '<button class="btn btn-primary btn-sm edit-member-button" data-id="'.$row['ID_Penyewa'].'" data-name="'.$row['Nama_Lengkap_Penyewa'].'" data-phone="'.$row['Kontak_Penyewa'].'" data-bs-toggle="modal" data-bs-target="#editMemberModal">Edit</button>';
    
        echo "</td>";
        echo "</tr>";

        $row_number++; // Menambah nomor urut untuk baris berikutnya
    }
} else {
    echo "<tr><td colspan='4'>No data found</td></tr>";
}

// Proses update member
if (isset($_POST['updateMember'])) { // Pastikan ini sesuai dengan 'name' submit button di form modal
    $memberId = $_POST["memberId"];
    $memberName = $_POST["editMemberName"]; // Pastikan ini sesuai dengan 'name' di form modal
    $memberPhone = $_POST["editMemberPhone"]; // Pastikan ini sesuai dengan 'name' di form modal

    // Query untuk update data
    $updateQuery = "UPDATE penyewa SET Nama_Lengkap_Penyewa = ?, Kontak_Penyewa = ? WHERE ID_Penyewa = ?";

    // Prepare statement
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssi", $memberName, $memberPhone, $memberId);

    if ($stmt->execute()) {
        echo "Data member berhasil diupdate";
        $stmt->close();
        // Redirect ke halaman member
        header("Location: admin.php"); // Sesuaikan dengan URL yang benar
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Mengekspor data admin ke CSV
if (isset($_GET['export'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data_admin.csv');

    // Membuat file output
    $output = fopen("php://output", "w");

    // Menulis header kolom ke file CSV
    fputcsv($output, array('ID', 'Nama Lengkap Penyewa', 'Kontak Penyewa'));

    // Query untuk mengambil data admin
    $query = "SELECT ID_Penyewa, Nama_Lengkap_Penyewa, Kontak_Penyewa FROM penyewa ORDER BY ID_Penyewa";
    $result = $conn->query($query);

  // Inisialisasi counter untuk nomor urut
$no = 1;

// Menulis data ke file CSV
while ($row = $result->fetch_assoc()) {
    // Array data dengan nomor urut otomatis
    $data = array($no, $row['Nama_Lengkap_Penyewa'], $row['Kontak_Penyewa']);
    
    // Menulis baris data ke file CSV
    fputcsv($output, $data);
    
    // Meningkatkan counter
    $no++;
}

    fclose($output);
    exit();
}
    




$conn->close();
