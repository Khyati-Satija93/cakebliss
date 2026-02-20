<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: shop.php");
    exit;
}

$id = (int) $_GET['id'];

if ($id <= 0) {
    header("Location: shop.php");
    exit;
}

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

// Store product id as key
$_SESSION['wishlist'][$id] = 1;

header("Location: wishlist.php");
exit;
?>