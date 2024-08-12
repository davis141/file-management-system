<?php
include "../inc/controller.php";
$app = new controller;

$folder_id = $app->post_request('id_del');

if ($folder_id) {
    $query = "SELECT folder_name FROM `folders` WHERE `id` = '$folder_id'";
    $folder = $app->fetch_query($query);

    if ($folder) {
        $folder_name = $folder[0]['folder_name'];
        $folder_path = "../../saas/doc_filefolders/" . $folder_name;
        if (file_exists($folder_path)) {
            function deleteFolder($dir) {
                if (!is_dir($dir)) {
                    return unlink($dir);
                }
                foreach (scandir($dir) as $item) {
                    if ($item == '.' || $item == '..') continue;
                    if (!deleteFolder($dir . DIRECTORY_SEPARATOR . $item)) {
                        return false;
                    }
                }
                return rmdir($dir);
            }
            if (deleteFolder($folder_path)) {
                $query = "DELETE FROM `folders` WHERE `id` = '$folder_id'";
                $delete_result = $app->direct_insert($query);

                if ($delete_result == "success") {
                    echo "success";
                } else {
                    echo "Error deleting folder from the database.";
                }
            } else {
                echo "Error deleting folder contents from the server.";
            }
        } else {
            echo "Folder does not exist on the server!";
        }
    } else {
        echo "Folder not found in the database!";
    }
}

