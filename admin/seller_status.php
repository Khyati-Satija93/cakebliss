<?php
include('../config/config.php');

if (isset($_POST['seller_id'], $_POST['status'])) {
    $id = (int) $_POST['seller_id'];
    $status = (int) $_POST['status'];

    // Updated to allow 0(pending), 1(active), 2(rejected), 3(blocked) as per your database image
    if (in_array($status, [0, 1, 2, 3])) {
        $query = "UPDATE bakers SET shop_status = $status WHERE id = $id";

        if (mysqli_query($conn, $query)) {
            echo "success";
            exit;
        } else {
            echo "error";
            exit;
        }
    } else {
        echo "invalid_status";
        exit;
    }
} else {
    echo "missing_data";
    exit;
}
?>