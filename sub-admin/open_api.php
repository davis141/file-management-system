<?php
session_start();
include_once "inc/controller.php";
include "sql/sql.php";
$app = new controller;
$users_ids = $_SESSION['email'];
$user_log = $app->checkLogin();
if ($user_log == "logged") {
} else {
    echo '<script>window.location.href="login.php";</script>';
}
//Get user info
$query = "SELECT id, access_level_id, full_name, email, user_id, about, company_id FROM user WHERE email ='$users_ids' AND  company_id = (SELECT company_id WHERE email = '$users_ids')";

$userInfos = $app->fetch_query($query);
foreach ($userInfos as $userInfo);

$id = $userInfo['id'];
$user_id = $userInfo['user_id'];
$access_level_id = $userInfo['access_level_id'];
$full_name = $userInfo['full_name'];
$email = $userInfo['email'];
$about = $userInfo['about'];
$c_id = $userInfo['company_id'];
if ($access_level_id == 2) {
    echo '<script>window.location.href="dashboard.php";</script>';
// } elseif ($access_level_id == 2) {
//     echo '<script>window.location.href="sub_admin/dashboard.php";</script>';
} else{
    echo '<script>window.location.href="login.php";</script>';
} 


