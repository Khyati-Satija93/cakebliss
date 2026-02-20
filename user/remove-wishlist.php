<?php
session_start();

$id = $_GET['id'];

unset($_SESSION['wishlist'][$id]);

header("Location: wishlist.php");
exit;
?>