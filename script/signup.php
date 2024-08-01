<?php
include '../db_connect.php';
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $no_telepon = $_POST['no_telepon'];

    if ($password == $confirmpassword) {
        $sql = "SELECT * FROM login WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO login (username, password, no_telepon)
                    VALUES ('$username', '$password', '$no_telepon')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $username = "";
                $_POST['password'] = "";
                $_POST['confirmpassword'] = "";
                $_POST['no_telepon'] ="";

                $_SESSION['signup_success_message'] = 'Akun telah berhasil dibuat!';

                header("Location: ../pages/login.php");
                exit();
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Username Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
?>
