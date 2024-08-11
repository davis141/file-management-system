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
$query = "SELECT id, access_level_id, full_name, email, user_id, about, company_id, is_active, session_key FROM user WHERE email ='$users_ids' AND company_id = (SELECT company_id FROM user WHERE email = '$users_ids')";

$userInfos = $app->fetch_query($query);
if (!empty($userInfos)) {
    $userInfo = $userInfos[0];

    $id = $userInfo['id'];
    $user_id = $userInfo['user_id'];
    $access_level_id = $userInfo['access_level_id'];
    $is_active = $userInfo['is_active'];
    $full_name = $userInfo['full_name'];
    $email = $userInfo['email'];
    $about = $userInfo['about'];
    $c_id = $userInfo['company_id'];
    $storedsession = $userInfo['session_key'];

    if ($access_level_id != 2) {
        $app->logout();
        header("Location: /file-management-system/login.php");
        exit();
    }
    if ($is_active != 1) {
        $app->logout();
        header("Location: /file-management-system/sub-admin/blocked.php");
        exit();
    }
    if ($storedsession == '') {
        $app->logout(); 
        $query = "DELETE FROM user WHERE user_id = '$user_id'";
        $del = $app->direct_insert($query);
        header("Location: /file-management-system/sub-admin/blocked.php");
        exit();
    }
} else {
    $app->logout();
    header("Location: /file-management-system/login.php");
    exit();
}

session_regenerate_id(true);
