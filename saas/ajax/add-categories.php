<?php
include "../inc/controller.php";
$app = new controller;
$category_name = $app->post_request('category_name');
$category_id = $app->post_request('c_id');
$cat_id_decode= base64_decode($category_id);

if (isset($category_name)) {
    $query = "INSERT INTO `category` (`id`, `category_name`, `company_id`) VALUES (NULL, '$category_name', '$cat_id_decode')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}






