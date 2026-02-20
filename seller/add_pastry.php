<?php
session_start();
include("includes/config.php");


if (isset($_POST['addPastry'])) {

    $pname = $_POST['pastry_name'];
    $price = $_POST['pastry_price'];
    $description = $_POST['pastry_description'];
    $stock = isset($_POST['in_stock']) ? 1 : 0;

    $folder = "uploads/";
    $allowed_types = ['image/jpg', 'image/jpeg', 'image/png'];

    $image_names = [];

    // Loop through each uploaded file
    foreach ($_FILES['pastry_image']['name'] as $key => $image_name) {

        $image_tmp  = $_FILES['pastry_image']['tmp_name'][$key];
        $image_type = $_FILES['pastry_image']['type'][$key];
        $image_size = $_FILES['pastry_image']['size'][$key];

        // Validate type
        if (!in_array(strtolower($image_type), $allowed_types)) {
            echo "<script>alert('Only JPG, JPEG & PNG allowed');</script>";
            exit;
        }

        // Validate size (1MB)
        if ($image_size > 1000000) {
            echo "<script>alert('Each image must be less than 1MB');</script>";
            exit;
        }

        // Rename image to avoid duplicates
        $new_name = time() . "_" . rand(1000, 9999) . "_" . $image_name;

        if (move_uploaded_file($image_tmp, $folder . $new_name)) {
            $image_names[] = $new_name;
        }
    }

    // Convert array to comma-separated string
    $images = implode(',', $image_names);

    // Insert into database
    $insert_query = "
        INSERT INTO pastries (pastry_name, pastry_price, pastry_description, pastry_image, pastry_stock) 
        VALUES ('$pname', '$price', '$description', '$images', $stock)
    ";
    $result = mysqli_query($conn, $insert_query);
    if ($result) {
?>
        <script>
            alert("Product added successfully");
            window.location.href = "product.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error: ".mysqli_error($conn));
            window.location.href = "product.php";
        </script>
    <?php
    }
    ?>
<?php
}
?>