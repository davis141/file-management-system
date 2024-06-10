<?php
include "../inc/controller.php";
$app = new controller;
$dpt = $app->post_request('dpt');
$full_name = $app->post_request('full_name');
$email = $app->post_request('email');
$password = $app->post_request('password');
$hashed_password = sha1($password);
$c_id = $app->post_request('encrypt_c');
$c_id_decode= base64_decode($c_id);
$user_id = $app->post_request('encrypt');
$user_id_decode= base64_decode($user_id);
$c_id_length = 13;
$c_ids = substr($c_id_decode, 0, $c_id_length);
$users = substr($user_id_decode, 0, $c_id_length);
if (isset($full_name)) {
    $query = "INSERT INTO `user` (`id`, `company_id`,`access_level_id`,`full_name`, `password`, `user_id`, `email`)
    VALUES (NULL,'$c_ids','$dpt','$full_name', '$hashed_password', '$users', '$email')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}