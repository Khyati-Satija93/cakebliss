<?php
session_start();
include('../config/config.php');

if(isset($_POST['register_btn'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // MD5 Encryption
    $md5_password = md5($password); 
    
    $role = $_POST['role']; 
    $role_as = ($role == 'seller') ? 2 : 0;

    // Check if email exists
    $check_email = "SELECT email FROM auth WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($check_email_run) > 0) {
        $_SESSION['message'] = "Email already registered.";
        header("Location: registration.php");
        exit(0);
    }

    // Begin Transaction to prevent partial registration
    mysqli_begin_transaction($conn);

    try {
        // 1. Insert into Master Auth Table
        $query_auth = "INSERT INTO auth (firstname, lastname, email, password, role_as) 
                       VALUES ('$fname', '$lname', '$email', '$md5_password', '$role_as')";
        
        if(!mysqli_query($conn, $query_auth)) {
            throw new Exception("Auth error: " . mysqli_error($conn));
        }

        $user_id = mysqli_insert_id($conn);

        // 2. Only if Seller, insert into Bakers Table
        if($role_as == 2) {
            $bakery_name = mysqli_real_escape_string($conn, $_POST['shop_name']);
            
            // Check if bakery name was actually provided
            if(empty($bakery_name)) {
                throw new Exception("Please provide a Bakery Name.");
            }

            $query_baker = "INSERT INTO bakers (user_id, bakery_name, shop_status) 
                             VALUES ('$user_id', '$bakery_name', '0')";
            
            if(!mysqli_query($conn, $query_baker)) {
                throw new Exception("Baker profile error: " . mysqli_error($conn));
            }
        }

        mysqli_commit($conn);
        
        $_SESSION['message'] = ($role_as == 2) ? "Registration Successful! Wait for Admin approval." : "Registration Successful!";
        header("Location: login.php");
        exit(0);

    } catch (Exception $e) {
        mysqli_rollback($conn);
        $_SESSION['message'] = "Failed: " . $e->getMessage();
        header("Location: registration.php");
        exit(0);
    }
}
?>