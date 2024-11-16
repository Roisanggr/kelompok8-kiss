<?php
session_start();
include 'config.php'; // File koneksi ke database

// Pastikan user adalah admin yang sedang login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit;
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Masukkan data user baru ke database
$query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
if (mysqli_query($conn, $query)) {
    echo "User berhasil ditambahkan!";
    header("Location: profile(adm).html");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
