<?php
include "../inc/controller.php";
$app = new controller;
$folder_name = $app->post_request('folder_name');
$c_id = $app->post_request('encrypt_c');
$u_id = $app->post_request('encrypt');

if (isset($folder_name)) { 
    $folder_path = "../folders/" . $folder_name;
    if (!file_exists($folder_path)) {
        mkdir($folder_path, 0777, true);
        $query = "INSERT INTO `folders` (`id`, `folder_name`, `company_id`, `user_id`) VALUES (NULL, '$folder_name', '$c_id', '$u_id')";
        $insert_result = $app->direct_insert($query);
        if ($insert_result == "success") {
            echo "success";
        } else {
            echo "Error inserting folder data into database.";
        }
    } else {
        echo "Folder already exists!";
    }
}

