<?php
// public/save_profile.php

// Enable error reporting for debugging (disable in production)
include "errorini.php";

// Include necessary functions
require_once __DIR__ . '/../functions/auth.php';
require_once __DIR__ . '/../functions/api.php';

// Start the session
//session_start();

// Set response header to JSON
header('Content-Type: application/json');

// Ensure the user is logged in
if (!is_logged_in()) {
    echo json_encode([
        "success" => false,
        "message" => "Unauthorized access. Please log in."
    ]);
    exit();
}

// Retrieve user data from the session
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

// Extract user UID
$uid = isset($user['localId']) ? $user['localId'] : '';

// Validate UID
if (empty($uid)) {
    echo json_encode([
        "success" => false,
        "message" => "User identifier is missing."
    ]);
    exit();
}



// Check if data was provided


$exam = "X2j9hFD6O7RGAER6bn3b";
$email =  $user['email'];
$class = 'abc';



// If there are validation errors, return them
if (!empty($errors)) {
    echo json_encode([
        "success" => false,
        "message" => implode(" ", $errors)
    ]);
    exit();
}
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

// Extract accessToken and refreshToken
$accessToken = isset($user['idToken']) ? $user['idToken'] : '';
$refreshToken = isset($user['refreshToken']) ? $user['refreshToken'] : '';
//echo $rightOrWrong;
//exit;
// Prepare data for the API $_SESSION['activeWeek']
$mockWeek = 0;
if (isset($_SESSION['activeWeek'] )) {
    $mockWeek = $_SESSION['activeWeek'] ;
}

if(!$mockWeek){
    echo json_encode([
        "success" => false,
        "message" => "missing week"
    ]);
    exit();
}
$profileData = [
    "mockWeek" => $mockWeek,
    "uid" => $uid,
    "refreshtoken" => $refreshToken
];

//var_dump($profileData);
//exit();
// Send data to the API
$apiResponse = api_request_post('endUserMockWeek', $profileData, 'POST', $accessToken,$refreshToken);
//$apiResponse = api_request('profileSetup', $profileData, 'POST', $accessToken);

// Return the API response to the frontend
echo json_encode($apiResponse);
?>
