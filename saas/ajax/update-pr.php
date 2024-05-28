<?php
include "../inc/controller.php";
$app = new controller;
$fullname = $app->post_request('full_name');
$bio = $app->post_request('bio');
$user_id = $app->post_request('idp');
$user_id_decode= base64_decode($user_id);

if (isset($fullname)) {
    $query = "UPDATE user SET `full_name` = '$fullname', `about` = '$bio' WHERE `user_id` = '$user_id_decode';";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




