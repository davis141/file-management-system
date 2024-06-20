<?php
session_start();
include_once __DIR__ . "/../inc/controller.php";

$app = new controller();
$app->logout();

header("Location:/file-management-system/user/login.php");
exit();
