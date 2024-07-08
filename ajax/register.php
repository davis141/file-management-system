<?php
include "../inc/controller.php";
$app = new controller;

// Fetch post request data
$full_name = $app->post_request('fullname');
$email = $app->post_request('email');
$password = $app->post_request('password');

// Generate unique IDs for user and company
$user_id = uniqid();
$company_id = uniqid();

// Hash the password using SHA-1 (Note: SHA-1 is not recommended for password hashing. Consider using bcrypt or Argon2)
$hashed_password = sha1($password);

// Function to generate a session key
function generateKey() {
    return bin2hex(random_bytes(32)); // Generates a 32-character hex string
}

// Generate initial session key
$session_key = generateKey();

if (isset($full_name) && isset($email) && isset($hashed_password)) {
    // Insert user data along with the initial session key into the database
    $query = "INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `user_id`, `access_level_id`, `company_id`, `is_active`, `session_key`) VALUES (NULL, '$full_name', '$email', '$hashed_password', '$user_id', '1', '$company_id', TRUE, '$session_key')";
    $get_category = $app->direct_insert($query);
    if ($get_category == "success") {
        echo "success";
    } else {
        echo "failed to register";
    }
}








