<?php
session_start();
include('../config/config.php');

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // Hash the input password to compare with the DB
    $md5_password = md5($password);


    // 1. Authenticate against the Master Table
    $login_query = "SELECT * FROM auth WHERE email='$email' AND password='$md5_password' LIMIT 1";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $user_data = mysqli_fetch_assoc($login_query_run);
        $user_id = $user_data['id'];
        $role_as = $user_data['role_as'];

        // 2. If role is Seller (2), check approval status in seller table
        if ($role_as == 2) {
            $seller_check = "SELECT shop_status FROM bakers WHERE user_id='$user_id' LIMIT 1";
            $seller_run = mysqli_query($conn, $seller_check);
            $seller_row = mysqli_fetch_assoc($seller_run);

            if ($seller_row['shop_status'] == 0) {
                $_SESSION['message'] = "Your shop is pending approval. Please wait.";
                header("Location: login.php");
                exit(0);
            } elseif ($seller_row['shop_status'] == 2) {
                $_SESSION['message'] = "Your application was rejected.";
                header("Location: login.php");
                exit(0);
            } elseif ($seller_row['shop_status'] == 3) {
                $_SESSION['message'] = "Your account is blocked.";
                header("Location: login.php");
                exit(0);
            }
        }

        // 3. Set Session if all checks pass
        $_SESSION['auth'] = true;
        $_SESSION['role_as'] = $role_as; // 0=User, 1=Admin, 2=Seller
        $_SESSION['auth_user'] = [
            'id' => $user_id,
            'name' => $user_data['first_name'] . ' ' . $user_data['last_name'],
            'email' => $user_data['email']
        ];

        // 4. Redirect based on role
        if ($role_as == 1) {
            $_SESSION['message'] = "Welcome to Admin Panel";
            header("Location: ../admin/index.php");
        } elseif ($role_as == 2) {
            $_SESSION['message'] = "Welcome to Baker Dashboard";
            header("Location: ../seller/index.php");
        } else {
            $_SESSION['message'] = "Logged in Successfully";
            header("Location: ../index.php");
        }
        exit(0);
    } else {
        $_SESSION['message'] = "Invalid Email or Password";
        header("Location: login.php");
        exit(0);
    }
}
