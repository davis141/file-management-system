<?php
include "../inc/controller.php";
$app = new controller;
$id = $app->post_request('id_del');
if (isset($id)) {
    $query = "delete from file_table where id ='$id'";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    }

} else {

}





