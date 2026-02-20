<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: wishlist.php");
    exit;
}

$id = (int) $_GET['id'];

if ($id <= 0) {
    header("Location: wishlist.php");
    exit;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$found = false;

/*
    Check if same product already exists
    with empty customization
*/
foreach ($_SESSION['cart'] as $index => $item) {

    if (
        $item['product_id'] == $id &&
        $item['size'] == '' &&
        $item['message'] == '' &&
        $item['delivery_date'] == ''
    ) {
        $_SESSION['cart'][$index]['qty']++;
        $found = true;
        break;
    }
}

/* if not found, add new item */
if (!$found) {

    $_SESSION['cart'][] = array(
        'product_id' => $id,
        'qty' => 1,
        'size' => '',
        'message' => '',
        'delivery_date' => ''
    );
}

/* remove from wishlist */
if (isset($_SESSION['wishlist'][$id])) {
    unset($_SESSION['wishlist'][$id]);
}

header("Location: cart.php");
exit;
?>
