<?php
include "../inc/controller.php";
$app = new controller;
$category_name = $app->post_request('category_name');

if (isset($category_name)) {
    $query = "INSERT INTO `category` (`id`, `category_name`) VALUES (NULL, '$category_name')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}






