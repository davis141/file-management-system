<?php
include "../inc/controller.php";
$app = new controller;
$cat_id = $app->post_request('id_del');
if (isset($cat_id)) {
    $query = "delete from category where id ='$cat_id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}





