<?php
include "../inc/controller.php";
$app = new controller;
$email = $app->post_request('email');
// $password = $app->post_request('password');
$cpassword = $app->post_request('cpassword');
$updated_hash = sha1($cpassword);
if (isset($email,$updated_hash)) {
     $query = "UPDATE user SET `password`='$updated_hash' WHERE `email`='$email'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




