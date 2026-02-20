<?php
include('../config/config.php');

$action = $_POST['action'] ?? '';

// ACTION: UPDATE
if ($action === 'update') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['pastry_name']);
    $price = mysqli_real_escape_string($conn, $_POST['pastry_price']);
    $owner = mysqli_real_escape_string($conn, $_POST['bakery_owner']);

    $sql = "UPDATE pastries SET 
            pastry_name = '$name', 
            pastry_price = '$price', 
            bakery_owner = '$owner' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo mysqli_error($conn);
    }
    exit;
}

// ACTION: DELETE
if ($action === 'delete') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    if (mysqli_query($conn, "DELETE FROM pastries WHERE id = $id")) {
        echo "success";
    }
    exit;
}

// ACTION: TAKEDOWN (Stock 0)
if ($action === 'takedown') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    if (mysqli_query($conn, "UPDATE pastries SET pastry_stock = 0 WHERE id = $id")) {
        echo "success";
    }
    exit;
}

// ACTION: MAKE VISIBLE (Stock = 1)
if ($action === 'make_visible') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    // We update pastry_stock back to 1 to remove the 'flagged' status
    $sql = "UPDATE pastries SET pastry_stock = 1 WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo mysqli_error($conn);
    }
    exit;
}
?>