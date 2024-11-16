<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();
include 'config.php';

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa user di database
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Validasi password langsung
if ($user && $password == $user['password']) { // Bandingkan langsung tanpa hash
    // Set session untuk login user
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['username'] = $user['username'];

    // Redirect berdasarkan role
    if ($user['role'] == 'admin') {
        header("Location: index(adm).html");
    } else {
        header("Location: index(log).html");
    }
    exit;
} else {
    echo "Username atau password salah!";
}
?>

