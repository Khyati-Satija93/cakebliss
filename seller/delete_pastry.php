<?php
session_start();
include('includes/config.php');
$id = $_GET['id'];
$sql = "DELETE FROM pastries WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    ?>
    <script>
        alert("Product deleted successfully");
        window.location.href = "product.php";
    </script>
    <?php
} else {
    ?>
    <script>
        alert("Error: " . mysqli_error($conn));
        window.location.href = "product.php";
    </script>
    <?php
}
?>

