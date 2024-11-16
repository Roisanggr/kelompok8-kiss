<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $request_date = mysqli_real_escape_string($conn, $_POST['request_date']);

    // Query untuk mengambil user_id berdasarkan username
    $user_query = "SELECT id FROM users WHERE username='$username'";
    $user_result = mysqli_query($conn, $user_query);

    if (mysqli_num_rows($user_result) > 0) {
        $user = mysqli_fetch_assoc($user_result);
        $user_id = $user['id'];

        // Cek apakah sudah ada request pending
        $check_query = "SELECT * FROM maintenance_requests WHERE user_id='$user_id' AND status='Pending'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) == 0) {
            // Insert request baru
            $insert_query = "INSERT INTO maintenance_requests (user_id, name, request_date, status) VALUES ('$user_id', '$username', '$request_date', 'Pending')";
            if (mysqli_query($conn, $insert_query)) {
                // Redirect ke halaman index(log).html setelah berhasil
                header("Location: index(log).html");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('You already have a pending request!'); window.location.href = 'orders(log).html';</script>";
        }
    } else {
        echo "<script>alert('Invalid username!'); window.location.href = 'orders(log).html';</script>";
    }
}
?>
