<?php
session_start();
include_once __DIR__ . "/controller.php";
include_once __DIR__ . "/../sql/sql.php";  
$app = new controller();

// Check login status and user access level
if (!isset($_SESSION['login_user']) || !isset($_SESSION['company_id']) || $app->checkLogin() !== "logged") {
    $app->logout();
    header("Location: /file-management-system/login.php");
    exit();
}

// Get user info
$users_ids = $_SESSION['email'];
$query = "SELECT id, access_level_id, full_name, email, user_id, about, company_id, is_active FROM user WHERE email ='$users_ids' AND  company_id = (SELECT company_id WHERE email = '$users_ids')";

$userInfos = $app->fetch_query($query);
foreach ($userInfos as $userInfo);

$id = $userInfo['id'];
$user_id = $userInfo['user_id'];
$access_level_id = $userInfo['access_level_id'];
$is_active = $userInfo['is_active'];
$full_name = $userInfo['full_name'];
$email = $userInfo['email'];
$about = $userInfo['about'];
$c_id = $userInfo['company_id'];
$storedsession = $userInfo['session_key'];

if ($access_level_id != 3) {
    header("Location: /file-management-system/login");
}
if ($is_active != 1) {
    $app->logout();
    header("Location: /file-management-system/user/blocked");
    exit();
}

if ($storedsession == '') {
    $app->logout(); // Kill the session
    $query = "DELETE FROM user WHERE user_id = '$user_id'";
    $del = $app->direct_insert($query); // Delete user record
    header("Location: /file-management-system/user/blocked");
    exit();
}