<?php
include "../inc/controller.php";
$app = new controller;
$dpt = $app->post_request('dpt');
$shr = $app->post_request('shr');
$file_name = $app->post_request('file_name');
$user_id = $app->post_request('encrypt');
$user_id_decode= base64_decode($user_id);

if (isset($file_name)) {
    $query = "INSERT INTO `file_shares` (`id`, `file_id`, `shared_with_user_id`, `add_input`, `user_id`, `file_path`)
    VALUES (NULL, '$dpt','$shr','$file_name','$user_id_decode',(SELECT file_path FROM file_table WHERE id = '$dpt'))";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}
