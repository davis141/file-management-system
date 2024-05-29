<?php
include "../inc/controller.php";
include "test2.php";
$app = new controller;
$file_name = $app->post_request('file_name');
$user_id = $app->post_request('encrypt');
$user_id_decode= base64_decode($user_id);
$file1 = "up_file";
@$img_path1 = upload_img($file1, $file_size_allowed, $min_size_compress, $ticket_pic);
$query = "INSERT INTO `file_table` (`id`, `file_path`, `file_name`, `user_id`, `status`) VALUES (NULL, '$img_path1', '$file_name', '$user_id_decode', '0')";
$get_category = $app->direct_insert($query);
if ($get_category == "success") {
    echo "success";
}




