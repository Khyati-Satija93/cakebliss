<?php
include("includes/config.php");

$id = $_POST['pastry_id'];
$name = $_POST['pastry_name'];
$price = $_POST['pastry_price'];
$description = $_POST['pastry_description'];
$stock = isset($_POST['in_stock']) ? 1 : 0;

$imageQuery = "";

// If new images uploaded
if (!empty($_FILES['pastry_image']['name'][0])) {

    $images = [];

    foreach ($_FILES['pastry_image']['name'] as $key => $img) {
        $tmp = $_FILES['pastry_image']['tmp_name'][$key];
        $newName = time() . "_" . $img;
        move_uploaded_file($tmp, "uploads/" . $newName);
        $images[] = $newName;
    }

    $imageString = implode(',', $images);
    $imageQuery = ", pastry_image='$imageString'";
}

$query = "
UPDATE pastries SET
pastry_name='$name',
pastry_price='$price',
pastry_description='$description',
pastry_stock='$stock'
$imageQuery
WHERE id='$id'
";
$result = mysqli_query($conn, $query);
if ($result) {
    ?>
    <script>
        alert("Product updated successfully");
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