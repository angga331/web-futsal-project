<?php
include '../db_connect.php';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit1'])) {
    $namaPenyewa = $_POST['namaPenyewa']; 
    $kontak_penyewa = $_POST['kontak_penyewa'];   
    $idlapang = $_POST['id_lapang'];  
    $namaTim = $_POST['namaTim'];
    $tanggalBooking = $_POST['tanggalBooking'];
    $waktuMulai = $_POST['waktuMulai'];
    $waktuSelesai = $_POST['waktuSelesai'];
    $photo_url = $_POST['photo_url'];   
    $jumlahanggota = $_POST['jumlahanggota'];

    // You may want to perform further validation on the data before proceeding

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
        mysqli_stmt_close($stmtTim);

        // Insert into 'penyewa' table
        $insertTimSql = "INSERT INTO penyewa (Nama_Penyewa, Kontak_Penyewa) VALUES (?, ?)";
        $stmtTim = mysqli_prepare($conn, $insertTimSql);
        mysqli_stmt_bind_param($stmtTim, "si", $namaPenyewa, $kontak_penyewa);
        mysqli_stmt_execute($stmtTim);
        mysqli_stmt_close($stmtTim);

        // Insert into 'booking' table
        $insertBookingSql = "INSERT INTO booking (id_lapangan, Tanggal_Booking, Waktu_Mulai, Waktu_Selesai, photo_url)
                            VALUES ('1', ?, ?, ?, ?)";
        $stmtBooking = mysqli_prepare($conn, $insertBookingSql);
        mysqli_stmt_bind_param($stmtBooking, "sssss",  $idlapang, $tanggalBooking, $waktuMulai, $waktuSelesai, $photo_url);

        if (mysqli_stmt_execute($stmtBooking)) {
            echo "<script>alert('Booking successful!');</script>";
        } else {
            echo "<script>alert('Error in booking. Please try again later.');</script>";
        }

        // Close the statement
        mysqli_stmt_close($stmtBooking);


    } else {
        echo "<script>alert('Team name already exists. Choose a different team name.');</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmtCheckTeam);
}

// Close the database connection
mysqli_close($conn);
?>
