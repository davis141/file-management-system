<?php
include "../inc/controller.php";
include "test2.php";
$app = new controller;
$file_name = $app->post_request('file_name');
$user_id = $app->post_request('encrypt');
$cat = $app->post_request('cat');
$user_id_decode= base64_decode($user_id);
$c_id = $app->post_request('encrypt_c');
$c_id_decode= base64_decode($c_id);

$c_id_length = 13;
$c_ids = substr($c_id_decode, 0, $c_id_length);
$user_decoded = substr($user_id_decode, 0, $c_id_length);
$file1 = "up_file";
@$img_path1 = upload_img($file1, $file_size_allowed, $min_size_compress, $ticket_pic);
if (empty($cat) || $cat == '0') {
    $cat = NULL;
}
$query = "INSERT INTO `file_table` (`id`, `file_path`, `file_name`, `user_id`, `status`, `category`, `company_id`, `to_admin`) VALUES (NULL, '$img_path1', '$file_name', '$user_decoded', '0', '$cat', '$c_ids','False')";
$get_category = $app->direct_insert($query);
if ($get_category == "success") {
    echo "success";
}