<?php
session_start();

if (!empty($_SESSION['wishlist'])) {
    foreach ($_SESSION['wishlist'] as $id => $v) {

        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = 1;
        } else {
            $_SESSION['cart'][$id]++;
        }
    }

    unset($_SESSION['wishlist']);
}

header("Location: cart.php");
exit;
?>