<?php
session_start();

if (isset($_POST['confirmLogoutBtn'])) {
    session_destroy();
    header("Location: ../pages/login.php");
}
?>