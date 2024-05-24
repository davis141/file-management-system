<?php
include "../inc/controller.php";
$app = new controller;
$fullname = $app->post_request('full_name');
$bio = $app->post_request('bio');
$user_id = $app->post_request('idp');

if (isset($fullname)) {
    $query = "UPDATE user SET `full_name` = '$fullname', `about` = '$bio' WHERE `user_id` = '$user_id';";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




