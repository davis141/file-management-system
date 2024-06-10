<?php
include "../inc/controller.php";
$app = new controller;
$full_name = $app->post_request('fullname');
$email = $app->post_request('email');
$password = $app->post_request('password');
$user_id = uniqid();
$company_id = uniqid();

// Hash the password using SHA-1
$hashed_password = sha1($password);

if (isset($full_name) && isset($email) && isset($hashed_password)) {
    $query = "INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `user_id`, `access_level_id`, `company_id`) VALUES (NULL, '$full_name', '$email', '$hashed_password', '$user_id', '1','$company_id')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}






