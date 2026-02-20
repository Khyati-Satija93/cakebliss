<?php
session_start();
include '../config/config.php';

if (isset($_POST['product_id']) && isset($_POST['qty'])) {

    $product_id = (int) $_POST['product_id'];
    $qty = (int) $_POST['qty'];

    $size = isset($_POST['size']) ? htmlspecialchars($_POST['size']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
    $delivery_date = isset($_POST['delivery_date']) ? $_POST['delivery_date'] : '';

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = array(
        'product_id' => $product_id,
        'qty' => $qty,
        'size' => $size,
        'message' => $message,
        'delivery_date' => $delivery_date
    );

    echo "success";
    exit;
}

echo "error";
exit;
?>
