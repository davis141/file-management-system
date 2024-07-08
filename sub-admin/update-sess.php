<?php
session_start();
include_once __DIR__ . "/inc/controller.php";
include_once __DIR__ . "/sql/sql.php";
$app = new controller();

function generateKey() {
    return bin2hex(random_bytes(32)); // Generates a 32-character hex string
}

header('Content-Type: application/json'); // Set JSON header

if (isset($_SESSION['user_id'])) {
    $newSessionKey = generateKey();
    $user_id = $_SESSION['user_id'];
    $updateQuery = "UPDATE user SET session_key = '$newSessionKey' WHERE user_id = '$user_id'";
    
    if ($app->run_query($updateQuery)) {
        $_SESSION['session_key'] = $newSessionKey;
        echo json_encode(['success' => true, 'newKey' => $newSessionKey]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}

