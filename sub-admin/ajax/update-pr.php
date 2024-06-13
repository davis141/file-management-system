<?php
include "../inc/controller.php";
$app = new controller;
$fullname = $app->post_request('full_name');
$bio = $app->post_request('bio');
$email = $app->post_request('email');
$user_id = $app->post_request('idp');
$user_id_decode= base64_decode($user_id);

$c_id = $app->post_request('idc');
$c_id_length = 13; // Example length of the original $c_id

// Decode the base64 string
$decoded_string = base64_decode($c_id);

// Extract the $c_id using the known length of $c_id
$c_ids = substr($decoded_string, 0, $c_id_length);
$user_decoded = substr($user_id_decode, 0, $c_id_length);
if (isset($fullname)) {
    $query = "UPDATE user SET `full_name` = '$fullname', `about` = '$bio', `email` = '$email' WHERE `user_id` = '$user_decoded' AND company_id = '$c_ids'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




