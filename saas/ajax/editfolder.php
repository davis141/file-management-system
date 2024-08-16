<?php
include "../inc/controller.php";
$app = new controller;
$u_id = $app->post_request('encrypt');
$folder_id = $app->post_request('folderid');
$new_folder_name = $app->post_request('folder_name');

if (isset($folder_id) && isset($new_folder_name)) {
    $query = "SELECT folder_name, user_id FROM `folders` WHERE `id` = '$folder_id'";
    $current_folder = $app->fetch_query($query);
    
    if ($current_folder) {
        $current_folder_name = $current_folder[0]['folder_name'];
        $user_id = $current_folder[0]['user_id'];
        $old_folder_path = "../folders/" . $user_id . "/" . $current_folder_name;
        $new_folder_path = "../folders/" . $user_id . "/" . $new_folder_name;
        if (file_exists($old_folder_path)) {
            rename($old_folder_path, $new_folder_path);
            $query = "UPDATE `folders` SET `folder_name` = '$new_folder_name' WHERE `id` = '$folder_id' AND user_id ='$u_id'";
            $update_result = $app->direct_insert($query);
            if ($update_result == "success") {
                echo "success";
            } else {
                echo "Error updating folder name in the database.";
            }
        } else {
            echo "Folder does not exist on the server!";
        }
    } else {
        echo "Folder not found in the database!";
    }
}