<?php
session_start();
include '../config/config.php';

if (isset($_POST['placeOrderBtn'])) {
    
    // 1. Data from Frontend
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']); // Required for your auth/order tables
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
    $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);

    // 2. CHECK IF USER EXISTS in 'auth' table
    $checkUser = "SELECT id FROM auth WHERE email = '$email' LIMIT 1";
    $userRes = mysqli_query($conn, $checkUser);

    if (mysqli_num_rows($userRes) > 0) {
        $userData = mysqli_fetch_assoc($userRes);
        $user_id = $userData['id'];
    } else {
        // Create a guest/new account in 'auth' if not exists
        $tempPassword = password_hash('guest123', PASSWORD_DEFAULT);
        $insertUser = "INSERT INTO auth (firstname, email, password, role_as) 
                       VALUES ('$name', '$email', '$tempPassword', '0')";
        mysqli_query($conn, $insertUser);
        $user_id = mysqli_insert_id($conn);
    }

    // 3. CHECK CUSTOMER DETAILS (Address record)
    $checkCustDetail = "SELECT id FROM customers WHERE user_id = '$user_id' LIMIT 1";
    $custDetailRes = mysqli_query($conn, $checkCustDetail);

    if (mysqli_num_rows($custDetailRes) == 0) {
        // Insert details into customers table if missing
        $insertCustomer = "INSERT INTO customers (user_id, address, city, pincode) 
                           VALUES ('$user_id', '$address', '$city', '$pincode')";
        mysqli_query($conn, $insertCustomer);
    }

    // 4. GENERATE TRACKING & CALCULATE TOTAL
    $tracking_no = "CB" . rand(1111, 9999) . time();
    $total_price = 0;
    foreach ($_SESSION['cart'] as $item) {
        $p_id = $item['product_id'];
        $price_query = mysqli_query($conn, "SELECT pastry_price FROM pastries WHERE id = '$p_id'");
        $price_data = mysqli_fetch_assoc($price_query);
        $total_price += $price_data['pastry_price'] * $item['qty'];
    }

    // 5. INSERT INTO ORDERS TABLE
    $orderQuery = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, pincode, total_price, payment_mode, payment_id) 
                   VALUES ('$tracking_no', '$user_id', '$name', '$email', '$phone', '$address', '$pincode', '$total_price', '$payment_mode', '$payment_id')";

    $orderQueryRun = mysqli_query($conn, $orderQuery);

    if ($orderQueryRun) {
        $order_id = mysqli_insert_id($conn);

        // 6. INSERT ORDER ITEMS
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['product_id'];
            $qty = $item['qty'];

            $p_query = mysqli_query($conn, "SELECT pastry_price FROM pastries WHERE id = '$product_id'");
            $p_row = mysqli_fetch_assoc($p_query);
            $price = $p_row['pastry_price'];

            $items_query = "INSERT INTO order_items (order_id, product_id, qty, price) 
                            VALUES ('$order_id', '$product_id', '$qty', '$price')";
            mysqli_query($conn, $items_query);
        }

        unset($_SESSION['cart']);
        echo 201; // Success
    } else {
        echo 500; // Error
    }
}
?>