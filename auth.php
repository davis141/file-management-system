<?php
session_start();
include "inc/controller.php";
$app = new controller;
$email = (string) $app->post_request('email');
$password = (string) $app->post_request('password');
$hashed_password = sha1($password);

if (isset($email, $hashed_password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "SELECT email, password, user_id FROM user WHERE email='$email' AND password ='$hashed_password' AND company_id = (SELECT company_id FROM user WHERE email = '$email' AND password = '$hashed_password')";
        $result = $app->fetch_query($query);
        $validate_login = (int) count($result);
        if ($validate_login == 1) {
            $userInfo = $result[0]; // Assuming $result is an array of user info
            session_regenerate_id();
            $_SESSION['email'] = $email; // Initializing Session
            $_SESSION['company_id'] = $email; 
            $_SESSION['login_user'] = $email; // Initializing Session
            $_SESSION['session_key'] = $email;
            $_SESSION['user_id'] = $userInfo['user_id']; // Ensure user_id is set
            $_SESSION['e_secure'] = bin2hex(random_bytes(32));
            echo "success";
        } else {
            return 'invalid';
        }
    }
}

