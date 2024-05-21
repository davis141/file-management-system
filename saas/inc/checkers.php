<?php
session_start();
include_once "config/controller.php";
include "sql/sql.php";
$app = new controller;
$users_ids = $_SESSION['email'];
$user_log = $app->checkLogin();
if ($user_log == "logged") {
    // echo "ok";
} else {
    $app->logout();
    echo '<script>window.location.href="../sign-in";</script>';
}
//Get user info
$query = "select id,access_level_id,username,photo,staff_id from staffs_accounts where email_address='$users_ids'";
$userInfos = $app->fetch_query($query);
foreach ($userInfos as $userInfo);
// var_dump($userInfo);
$id = $userInfo['id'];
$access_level_id = $userInfo['access_level_id']; //access
$username = $userInfo['username']; //username
$photo = $userInfo['photo']; //photo
$staff_ids = $userInfo['staff_id']; //photo

if($access_level_id==1){

}else{
    $app->logout();
    echo '<script>window.location.href="../sign-in";</script>';
}

