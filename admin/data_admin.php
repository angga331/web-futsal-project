<?php

include '../db_connect.php';
session_start();

// Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($conn->connect_error) {
    die("Koneksi error: " . $conn->connect_error);
}

// Proses form tambah admin
if (isset($_POST['submit'])) {
    $adminName = $_POST["adminName"];
    $adminPhone = $_POST["adminPhone"];

    // Query untuk menambah data
    $insertQuery = "INSERT INTO admin (nama_admin, no_telepon) VALUES (?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ss", $adminName, $adminPhone);

    if ($stmt->execute()) {
        echo "Data admin berhasil ditambahkan";
        $stmt->close();
        // Refresh page or redirect to the admin page to reflect the new entry
        header("Location: admin.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}

//Menampilkan admin
$query = "SELECT * FROM admin";
$result = $conn->query($query);


if ($result->num_rows > 0) {
    $row_number = 1; // Inisialisasi nomor urut
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row_number . "</td>"; // Menampilkan nomor urut
        echo "<td>" . $row['nama_admin'] . "</td>";
        echo "<td>" . $row['no_telepon'] . "</td>";
        echo "<td>";
        echo '<button class="btn btn-primary btn-sm edit-button" data-id="'.$row['id'].'" data-name="'.$row['nama_admin'].'" data-phone="'.$row['no_telepon'].' "data-bs-target="#editAdminModal"">Edit</button>';
        echo '<button class="btn btn-danger btn-sm delete-button" data-id="' . $row['id'] . '" data-bs-target="#confirmDeleteModal"" >Hapus</button>';
        echo "</tr>";

        $row_number++; // Menambah nomor urut untuk baris berikutnya
    }
    
} else {
    echo "<tr><td colspan='4'>No data found</td></tr>";
}

// Proses update admin
if (isset($_POST['update'])) {
    $adminId = $_POST["adminId"];
    $adminName = $_POST["editAdminName"]; // Pastikan ini sesuai dengan 'name' di form modal
    $adminPhone = $_POST["editAdminPhone"]; // Pastikan ini sesuai dengan 'name' di form modal

    // Query untuk update data
    $updateQuery = "UPDATE admin SET nama_admin = ?, no_telepon = ? WHERE id = ?";

    // Prepare statement
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssi", $adminName, $adminPhone, $adminId);

    if ($stmt->execute()) {
        echo "Data admin berhasil diupdate";
        $stmt->close();
        // Redirect ke halaman admin
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
fputcsv($output, array('No', 'Nama Admin', 'No Telepon'));

// Query untuk mengambil data admin
$result = $conn->query("SELECT nama_admin, no_telepon FROM admin ORDER BY id");

// Inisialisasi counter untuk nomor urut
$no = 1;

// Menulis data ke file CSV
while ($row = $result->fetch_assoc()) {
    // Array data dengan nomor urut otomatis
    $data = array($no, $row['nama_admin'], $row['no_telepon']);
    
    // Menulis baris data ke file CSV
    fputcsv($output, $data);
    
    // Meningkatkan counter
    $no++;
}

fclose($output);
exit();}


if (isset($_POST['deleteId'])) {
    $deleteId = $_POST['deleteId'];

    // Buat query untuk menghapus data berdasarkan ID
    $deleteQuery = "DELETE FROM admin WHERE id = ?";

    // Prepare statement
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $deleteId);

    if ($stmt->execute()) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
