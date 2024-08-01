<?php
ob_start(); // Memulai output buffering
session_start(); // Memulai sesi

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penyewaan_futsal";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menangkap data yang dikirim dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];

// Mempersiapkan statement untuk mencegah injeksi SQL
$stmt = $conn->prepare("SELECT * FROM login WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    // Memeriksa kata sandi
    if ($data['password'] == $password) {
        // Kata sandi cocok
        $_SESSION['username'] = $username;
        $_SESSION['Pengguna'] = $data['Pengguna']; // Menggunakan nilai dari database

        // Pengalihan berdasarkan tipe pengguna
        if ($data['Pengguna'] == "User") {
            echo $data['Pengguna'];
            header("Location: http://localhost/FrontendWebFutsal/pages/lapangan.php", true, 303);
        } elseif ($data['Pengguna'] == "Admin") {
                echo $data['Pengguna'];
                header("Location: http://localhost/FrontendWebFutsal/admin/admin.php", true, 303);
        } else {
            header("location: http://localhost/FrontendWebFutsal/pages/login.php?pesan=gagal");
        }
    } else {
        // Kata sandi tidak cocok
        header("location: http://localhost/FrontendWebFutsal/pages/login.php?pesan=gagal");
    }
} else {
    // Pengguna tidak ditemukan
    header("location: http://localhost/FrontendWebFutsal/pages/login.php?pesan=gagal");
}

$conn->close(); // Menutup koneksi
exit(); // Menghentikan eksekusi lebih lanjut
?>
