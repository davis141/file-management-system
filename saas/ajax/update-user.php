<?php
include "../inc/controller.php";
$app = new controller;
$catname = $app->post_request('name');
$ename = $app->post_request('email');
$id = $app->post_request('idc');
$id_dec = base64_decode($id);

if (isset($catname)) {
    $query = "update user set full_name='$catname', email = '$ename' where id='$id_dec'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }
}
