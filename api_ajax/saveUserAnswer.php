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


$requestData = json_decode(file_get_contents('php://input'), true);

// Check if data was provided
if (!isset($requestData['questionId']) || !isset($requestData['userAnswer']) || !isset($requestData['rightOrWrong'])) {
    echo json_encode([
        "success" => false,
        "message" => "Missing required fields."
    ]);
    exit();
}
//var_dump($requestData);
//exit;

$questionId = trim($requestData['questionId']);
$userAnswer = trim($requestData['userAnswer']);
$rightOrWrong = trim($requestData['rightOrWrong']);
// Collect form data
//$questionId = isset($_POST['questionId']) ? trim($_POST['questionId']) : '';
//$userAnswer = isset($_POST['userAnswer']) ? trim($_POST['userAnswer']) : '';
//$rightOrWrong = isset($_POST['rightOrWrong']) ? trim($_POST['rightOrWrong']) : '';


// Validate required fields
$errors = [];


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
// Prepare data for the API
$profileData = [
    "questionId" => $questionId,
    "userAnswer" => $userAnswer,
    "rightOrWrong" => $rightOrWrong ? 1: 0,
    "uid" => $uid,
    "refreshtoken" => $refreshToken
];

//var_dump($profileData);
//exit();
// Send data to the API
$apiResponse = api_request_post('saveAnswer', $profileData, 'POST', $accessToken,$refreshToken);
//$apiResponse = api_request('profileSetup', $profileData, 'POST', $accessToken);

// Return the API response to the frontend
echo json_encode($apiResponse);
?>