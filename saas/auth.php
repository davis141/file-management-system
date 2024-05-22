<?php
session_start();
include "inc/controller.php";
$app = new controller;
$email = (string) $app->post_request('email');
$password = (string) $app->post_request('password');
$hashed_password = sha1($password);
if (isset ($email, $hashed_password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "select email,password from user where email='$email' AND password='$hashed_password'";
        $result = $app->fetch_query($query);
        $validate_login = (int) count($result);
        if ($validate_login == 1) {
            session_regenerate_id();
            $emails = $_SESSION['email'] = $email; // Initializing Session
            $emails = $_SESSION['login_user'] = $email; // Initializing Session
            $secures = $_SESSION['e_secure'] = bin2hex(random_bytes(32));
            echo "success";
        } else {
            return 'invalid';
        }
    }
}
