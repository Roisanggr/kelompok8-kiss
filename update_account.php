<?php
session_start();
include 'config.php'; // Hubungkan ke database

// Pastikan user sudah login dan adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit;
}

// Ambil data dari form
$new_username = $_POST['username'];
$new_password = $_POST['password'];
$user_id = $_SESSION['user_id'];

// Perbarui data di database
$query = "UPDATE users SET username = '$new_username', password = '$new_password' WHERE id = '$user_id'";
if (mysqli_query($conn, $query)) {
    echo "Akun berhasil diperbarui!";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Redirect ke halaman profil setelah update
header("Location: profile(adm).html");
exit;
?>
