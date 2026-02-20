<?php
include 'config.php';

$search = isset($_POST['search']) ? mysqli_real_escape_string($conn, $_POST['search']) : '';

$sql = "SELECT * FROM products WHERE productName LIKE '%$search%' OR price LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $i = 1;
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$i++.'</td>';
        echo '<td><img src="uploads/'.$row['image'].'" width="80" height="80" class="rounded shadow-sm"></td>';
        echo '<td>'.$row['productName'].'</td>';
        echo '<td>'.$row['description'].'</td>';
        echo '<td>₹'.$row['price'].'</td>';
        echo '<td>'.$row['category'].'</td>';
        echo '<td>'.$row['stock'].'</td>';
        echo '<td>'.$row['created_at'].'</td>';
        echo '<td>
            <a href="view_product.php?id='.$row['id'].'" class="btn btn-info btn-sm" title="View"><i class="bi bi-eye"></i></a>
            <a href="javascript:void(0);" class="btn btn-warning btn-sm" title="Edit" onclick="openEditModal('.$row['id'].')"><i class="bi bi-pencil-square"></i></a>
            <a href="delete_product.php?id='.$row['id'].'" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm(\'Are you sure you want to delete this product?\');"><i class="bi bi-trash"></i></a>
        </td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="9" class="text-center">No products found.</td></tr>';
}
?>
