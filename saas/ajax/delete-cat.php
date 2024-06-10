<?php
include "../inc/controller.php";
$app = new controller;
$cat_id = $app->post_request('id_del');
$cat_dec = base64_decode($cat_id);
// $co_id = $app->post_request('co_id');

if (isset($cat_id)) {
    $query = "DELETE FROM `category` WHERE `id` ='$cat_dec'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}