<?php
include "../inc/controller.php";
$app = new controller;
$catname = $app->post_request('category_name');
$id = $app->post_request('idc');

if (isset($catname)) {
    $query = "update category set category_name='$catname' where id='$id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}




