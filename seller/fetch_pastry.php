<?php
include('includes/config.php');

if(isset($_POST['pastry_id'])) {

    $id = $_POST['pastry_id'];

    $query = "SELECT * FROM pastries WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        echo json_encode(mysqli_fetch_assoc($result));
    }
}
?>
