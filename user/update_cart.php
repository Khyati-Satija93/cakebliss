<?php
session_start();

if (!isset($_GET['id']) || !isset($_GET['action'])) {
    header("Location: cart.php");
    exit;
}

$id = (int) $_GET['id'];     // this is cart index 
$action = $_GET['action'];

if (!isset($_SESSION['cart'][$id])) {
    header("Location: cart.php");
    exit;
}

if ($action === "increase") {

    $_SESSION['cart'][$id]['qty']++;

} elseif ($action === "decrease") {

    $_SESSION['cart'][$id]['qty']--;

    if ($_SESSION['cart'][$id]['qty'] <= 0) {
        unset($_SESSION['cart'][$id]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // index array
    }

} elseif ($action === "remove") {

    unset($_SESSION['cart'][$id]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); // index array
}

header("Location: cart.php");
exit;
?>
