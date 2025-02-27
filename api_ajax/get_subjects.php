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

// Extract accessToken and refreshToken
$accessToken = isset($user['idToken']) ? $user['idToken'] : '';
 $refreshToken = isset($user['refreshToken']) ? $user['refreshToken'] : '';

// Define your examId
$examId = "X2j9hFD6O7RGAER6bn3b";
if (isset($_SESSION['mySubjects']) && !empty($_SESSION['mySubjects']['subjects'])) {
    header('Content-Type: application/json');
//    echo "from session";
    echo (json_encode($_SESSION['mySubjects']));
    exit;

}

// Fetch all subjects from the API
$result = fetch_all_subjects($examId, $refreshToken, $accessToken);

//? complete
if ($result['success']) {
    $_SESSION['mySubjects'] = ($result);
//    var_dump($_SESSION['mySubjects']);
//    exit;
}

// Return the result as JSON
header('Content-Type: application/json');
echo json_encode($result);
?>
