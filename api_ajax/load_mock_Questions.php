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
//$mockWeek = 1;
// Fetch all subjects from the API
$selectedSubjects = isset($_SESSION['userData']['subjectSelect']) ? $_SESSION['userData']['subjectSelect'] : [];

if(count($selectedSubjects) <4){
    echo json_encode([
        "success" => false,
        "message" => "subjects not up to 4."
    ]);
    return;
}

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

$result = load_Mock_Questions($uid, $refreshToken, $accessToken,$mockWeek,$selectedSubjects);

// Return the result as JSON
header('Content-Type: application/json');
echo json_encode($result);
?>
