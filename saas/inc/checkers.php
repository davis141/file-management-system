<?php
session_start();
include_once __DIR__ . "/controller.php";
include_once __DIR__ . "/../sql/sql.php";  // Corrected path
$app = new controller();

// Check login status and user access level
if (!isset($_SESSION['login_user']) || $app->checkLogin() !== "logged") {
    $app->logout();
    header("Location: /file-management-system/saas/login.php");
    exit();
}

// Get user info
$users_ids = $_SESSION['email'];
$query = "SELECT id, access_level_id, full_name, email, user_id, about FROM user WHERE email='$users_ids'";

$userInfos = $app->fetch_query($query);
foreach ($userInfos as $userInfo);

$id = $userInfo['id'];
$user_id = $userInfo['user_id'];
$access_level_id = $userInfo['access_level_id'];
$full_name = $userInfo['full_name'];
$email = $userInfo['email'];
$about = $userInfo['about'];

if ($access_level_id != 1) {
    $app->logout();
    header("Location: /file-management-system/saas/login");
    exit();
}
