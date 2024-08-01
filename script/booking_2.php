<?php
include '../db_connect.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit2'])) {
    $namaPenyewa = $_POST['nama_penyewa']; 
    $kontak_penyewa = $_POST['kontak_penyewa'];   
    $idlapang2 = 2;
    $namaTim = $_POST['namaTim'];
    $tanggalBooking = $_POST['tanggalBooking'];
    $waktuMulai = $_POST['waktuMulai'];
    $waktuSelesai = $_POST['waktuSelesai'];
    $photo_url = $_POST['photo_url'];   
    $jumlahanggota = $_POST['jumlahanggota'];
    $status_booking = 'Belum Lunas';

    // Check if the team name already exists
    $checkTeamSql = "SELECT ID_Tim FROM tim WHERE Nama_Tim = ?";
    $stmtCheckTeam = mysqli_prepare($conn, $checkTeamSql);
    mysqli_stmt_bind_param($stmtCheckTeam, "s", $namaTim);
    mysqli_stmt_execute($stmtCheckTeam);
    mysqli_stmt_store_result($stmtCheckTeam);

    if (mysqli_stmt_num_rows($stmtCheckTeam) == 0) {
        // Insert into 'tim' table
        $insertTimSql = "INSERT INTO tim (Nama_Tim, Jumlah_Anggota_Tim) VALUES (?, ?)";
        $stmtTim = mysqli_prepare($conn, $insertTimSql);
        mysqli_stmt_bind_param($stmtTim, "si", $namaTim, $jumlahanggota);
        mysqli_stmt_execute($stmtTim);

        // Get the last inserted ID for tim
        $idTim = mysqli_insert_id($conn);

        // Close the statement
        mysqli_stmt_close($stmtTim);

        // Insert into 'penyewa' table
        $insertPenyewaSql = "INSERT INTO penyewa (Nama_Lengkap_Penyewa, Kontak_Penyewa) VALUES (?, ?)";
        $stmtPenyewa = mysqli_prepare($conn, $insertPenyewaSql);
        mysqli_stmt_bind_param($stmtPenyewa, "si", $namaPenyewa, $kontak_penyewa);
        mysqli_stmt_execute($stmtPenyewa);

        // Get the last inserted ID for penyewa
        $idPenyewa = mysqli_insert_id($conn);

        // Close the statement
        mysqli_stmt_close($stmtPenyewa);

        // Insert into 'booking' table
        $insertBookingSql = "INSERT INTO booking (ID_Penyewa, ID_Tim, ID_Lapangan, Tanggal_Booking, Waktu_Mulai, Waktu_Selesai, photo_url, Status_Booking)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtBooking = mysqli_prepare($conn, $insertBookingSql);
        mysqli_stmt_bind_param($stmtBooking, "iiisssss", $idPenyewa, $idTim, $idlapang2, $tanggalBooking, $waktuMulai, $waktuSelesai, $photo_url, $status_booking);

        if (mysqli_stmt_execute($stmtBooking)) {
            echo "<script>alert('Booking successful!');</script>";
            header("Location: ../pages/lapangan.php");
        } else {
            echo "<script>alert('Error in booking. Please try again later.');</script>";
            header("Location: ../pages/lapangan.php");
        }

        // Close the statement
        mysqli_stmt_close($stmtBooking);

    } else {
        echo "<script>alert('Team name already exists. Choose a different team name.');</script>";
        header("Location: ../pages/lapangan.php");
    }

    // Close the statement
    mysqli_stmt_close($stmtCheckTeam);
}

// Close the database connection
mysqli_close($conn);
?>
