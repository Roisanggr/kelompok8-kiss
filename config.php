<?php
$servername = "sql203.infinityfree.com"; // MySQL Hostname
$username = "if0_37683447"; // MySQL Username
$password = "Y9Tq4H8z2E"; // MySQL Password
$dbname = "if0_37683447_db_users"; // MySQL Database Name

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
