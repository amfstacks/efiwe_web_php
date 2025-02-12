<?php
// public/get_subjects.php

// Start the session
session_start();
//sleep(10);
// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
//error_reporting(E_ALL);

// Include necessary functions
require_once __DIR__ . '/../functions/auth.php';
require_once __DIR__ . '/../functions/api.php';

// Check if the user is logged in
if (!is_logged_in()) {
    http_response_code(401); // Unauthorized
    echo json_encode([
        "success" => false,
        "message" => "Unauthorized access. Please log in."
    ]);
    exit();
}

// Retrieve user data from the session
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
$uid = isset($user['localId']) ? $user['localId'] : '';

// Extract accessToken and refreshToken
$accessToken = isset($user['idToken']) ? $user['idToken'] : '';
 $refreshToken = isset($user['refreshToken']) ? $user['refreshToken'] : '';

// Define your examId
$examId = "X2j9hFD6O7RGAER6bn3b";
// Fetch all subjects from the API
$mySubject = isset($_GET['subTop'])? $_GET['subTop'] : '';
//$mySubject = '';
$result = fetch_ActiveRecall_Questions($uid, $refreshToken, $accessToken,$mySubject);


// Return the result as JSON
header('Content-Type: application/json');
$result = json_encode($result);
$resultDecode = json_decode($result,true);

if($resultDecode['success'] == false){
   echo $result;
   exit();
}

$hastakenBefore = isset($resultDecode['hastakenBefore']) ? $resultDecode['hastakenBefore'] : false;
$_SESSION['hastakenBefore'] = $hastakenBefore;
//$_SESSION['hastakenBefore'] = 'abc';
$resultTwo = fetch_ActiveRecallActual_Questions($uid, $refreshToken, $accessToken,$mySubject);
echo json_encode($resultTwo);


?>
