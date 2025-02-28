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


unset($_SESSION['dailyDoneTaskGraded']);
header('Content-Type: application/json');
////
//echo ($_SESSION['dailyTaskRawData']);
//exit;
// Check if daily task data already exists in the session

if (isset($_SESSION['dailyDoneTaskGraded']) && $_SESSION['dailyDoneTaskGraded']) {
    if($_SESSION['dailyDoneTaskGradedDate'] == date('Y-m-d')){

        echo json_encode([
            "success" => false,
            "message" =>''
        ]);
        exit;
    }
}

    $result = gradeDoneDailyTasks($uid, $refreshToken, $accessToken);

    // Check if the result is successful and store it in the session
    if ($result['success']) {
        $_SESSION['dailyDoneTaskGraded'] = true;
        $_SESSION['dailyDoneTaskGradedDate'] = date('Y-m-d');
    }
    header('Content-Type: application/json');
    // Return the fresh data as JSON
    echo json_encode($result);




// Fetch all subjects from the API
//$result = fetchDailyTasks($uid, $refreshToken, $accessToken);
//
//// Return the result as JSON
//header('Content-Type: application/json');
////$getDailyTasks = json_encode($result);
//$getDailyTasks = $result;
//if($getDailyTasks['success']){
////    $_SESSION['dailyTaskRawData'] = $getDailyTasks['data'];
//    $_SESSION['dailyTaskRawData'] = $result;
//}
//
//echo json_encode($result);
?>
