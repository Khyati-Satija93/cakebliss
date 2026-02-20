<?php
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    echo "<script>alert('$message')</script>";
    unset($_SESSION['message']);
}
?>