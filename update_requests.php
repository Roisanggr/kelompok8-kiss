<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_id = $_POST['request_id'];
    $status = $_POST['status'];

    $query = "UPDATE maintenance_requests SET status = '$status' WHERE id = $request_id";
    if (mysqli_query($conn, $query)) {
        header('Location: admin_requests.html');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
