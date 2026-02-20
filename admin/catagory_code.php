<?php
include ('../config/config.php');

if(isset($_POST['save_category'])){

    // Sanitize input data
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $occasion      = mysqli_real_escape_string($conn, $_POST['occasion']);
    
    // Handle dietary tags (joining array into a string)
    $dietary_tags = isset($_POST['dietary_tags']) ? implode(", ", $_POST['dietary_tags']) : "";

    // Handle File Upload
    $image_name = $_FILES['category_image']['name'];
    $tmp_name   = $_FILES['category_image']['tmp_name'];
    $upload_path = "uploads/" . time() . "_" . $image_name; // unique filename

    // if (move_uploaded_file($tmp_name, $upload_path)) {
        
    //     $query = "INSERT INTO category (Cat_name, img, occasion, tags) 
    //               VALUES ('$category_name', '$upload_path', '$occasion', '$dietary_tags')";

    //     if (mysqli_query($conn, $query)) {
    //         echo json_encode(['status' => 200, 'message' => 'Category added successfully!']);
    //     } else {
    //         echo json_encode(['status' => 500, 'message' => 'Database error: ' . mysqli_error($conn)]);
    //     }
    // } else {
    //     echo json_encode(['status' => 400, 'message' => 'Failed to upload image.']);
    // }
    if (move_uploaded_file($tmp_name, $upload_path)) {
        
        $query = "INSERT INTO category (Cat_name, img, occasion, tags) 
                  VALUES ('$category_name', '$upload_path', '$occasion', '$dietary_tags')";

        if (mysqli_query($conn, $query)) {
            echo "<script>(Category added successfully!)";
            header("Location: category.php"); 
        } else {
            echo "<script>(Database error: " . mysqli_error($conn) . ")</script>";
            header("Location: category.php");
        }
    } else {
        echo "<script>(Failed to upload image.)</script>";
        header("Location: category.php");
    }
}
?>