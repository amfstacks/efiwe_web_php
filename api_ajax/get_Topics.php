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
//$subjectId = "Sqn3YPikF2m4lm9qsPoM";
//$uid = "6ta6rmIRBMTgrWL1KdljDlj8dd02";

$currentSubjectId = isset($_SESSION['currentSubjectId']) ? $_SESSION['currentSubjectId'] : null;

// Ensure the subject is set, otherwise redirect to an error page or show a message
if (!$currentSubjectId) {
    // Optionally, redirect to a 404 or show an error
    echo json_encode([
        "success" => false,
        "message" => "Please select a subject."
    ]);
    exit();
}

// Fetch all subjects from the API
$result = fetch_subject_topics($uid,$currentSubjectId, $refreshToken, $accessToken);

// Return the result as JSON
header('Content-Type: application/json');
echo json_encode($result);
?>