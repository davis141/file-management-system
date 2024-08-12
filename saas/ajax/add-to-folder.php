<?php
include "../inc/controller.php";
$app = new controller;
$folder_id = $app->post_request('shr');
$file_id = $app->post_request('dpt');

if (isset($folder_id)) {
    $query = "UPDATE file_table SET folder_id = '$folder_id' WHERE id = '$file_id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}



