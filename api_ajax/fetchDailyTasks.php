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


//unset($_SESSION['dailyTaskRawData']);
header('Content-Type: application/json');
////
//echo ($_SESSION['dailyTaskRawData']);
//exit;
// Check if daily task data already exists in the session
if (isset($_SESSION['dailyTaskRawData']) && !empty($_SESSION['dailyTaskRawData']['data'])) {
    // Extract today's date
    $todayDate = date('Y-m-d');

    // Loop through the data and check if any task has today's assigned date
    $taskFoundForToday = false;
    foreach ($_SESSION['dailyTaskRawData']['data'] as $task) {
        if (isset($task['assigned_date']) && $task['assigned_date'] === $todayDate) {
            $taskFoundForToday = true;
            break;
        }
    }

    // If we found a task for today, use the session data
    if ($taskFoundForToday) {
        // No need to fetch from server, use session data
        header('Content-Type: application/json');
        echo (json_encode($_SESSION['dailyTaskRawData']));
    } else {
        // If no task for today, fetch fresh data from the server
        $result = fetchDailyTasks($uid, $refreshToken, $accessToken);

        // Check if the result is successful and store it in the session
        if ($result['success']) {
            $_SESSION['dailyTaskRawData'] =json_encode($result);
        }
        header('Content-Type: application/json');
        // Return the fresh data as JSON
        echo json_encode($result);
    }
} else {
//    echo "here";
    // If session data doesn't exist, fetch fresh data from the server
    $result = fetchDailyTasks($uid, $refreshToken, $accessToken);

    // Check if the result is successful and store it in the session
    if ($result['success']) {
        $_SESSION['dailyTaskRawData'] = ($result);
    }
    header('Content-Type: application/json');
    // Return the fresh data as JSON
    echo json_encode($result);
}



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
