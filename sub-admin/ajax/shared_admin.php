<?php
include "../inc/controller.php";
$app = new controller;
$shr = $app->post_request('shr');
$file = $app->post_request('shares');
$cat = $app->post_request('cat');
$file_name = $app->post_request('add_name');
$user_id = $app->post_request('encrypt');
$user_id_decode= base64_decode($user_id);
$c_id = $app->post_request('encrypt_c');
$c_id_decode= base64_decode($c_id);


$c_id_length = 13;
$c_ids = substr($c_id_decode, 0, $c_id_length);
$user_decoded = substr($user_id_decode, 0, $c_id_length);
if (isset($file_name)) {
    $query = "INSERT INTO `admin_share` (`id`, `file_id`, `shared_admin`, `added_input`, `user_id`,`company_id`,`category`,`file_path`)
    VALUES (NULL, '$file','$shr','$file_name','$user_decoded','$c_ids','$cat',(SELECT file_path FROM file_table WHERE id = '$file'))";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}
