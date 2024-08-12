<?php
include "../inc/controller.php";
$app = new controller;

$folder_id = $app->post_request('folderid');
$new_folder_name = $app->post_request('folder_name');

if (isset($folder_id) && isset($new_folder_name)) {
    $query = "SELECT folder_name FROM `folders` WHERE `id` = '$folder_id'";
    $current_folder = $app->fetch_query($query);
    
    if ($current_folder) {
        $current_folder_name = $current_folder[0]['folder_name'];
        $old_folder_path = "../../saas/doc_filefolders/" . $current_folder_name;
        $new_folder_path = "../../saas/doc_filefolders/" . $new_folder_name;
        if (file_exists($old_folder_path)) {
            rename($old_folder_path, $new_folder_path);
            $query = "UPDATE `folders` SET `folder_name` = '$new_folder_name' WHERE `id` = '$folder_id'";
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