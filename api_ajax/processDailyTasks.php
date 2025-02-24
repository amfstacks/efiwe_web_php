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

$topicId = isset($_POST['topicId']) ? $_POST['topicId'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';
$update = isset($_POST['update']) ? $_POST['update'] : '';
//$topicId = 'fRxmJou23M3M4Oc9yw3h';
$todayDate = date('Y-m-d'); // Current date
$activeRecallTaken = true;

updateTaskData($type, $topicId, $update);



function updateTaskData($type, $id, $updateValue) {
    global  $accessToken;
    global  $refreshToken;
    global  $uid;
    $todayDate = date('Y-m-d');
    $updatedTaskData = null;
    // Check if daily task data exists in the session
    if (isset($_SESSION['dailyTaskRawData']['data'])) {
        $tasks = $_SESSION['dailyTaskRawData']['data']; // Get daily tasks from session

        // Iterate through each task
        foreach ($tasks as &$task) {
            // Check if the task is assigned for today
            if (isset($task['assigned_date']) && $task['assigned_date'] === $todayDate) {
                // Process task based on its type
                if ($type === 'topic' && isset($task['topic_id']) && $task['topic_id'] === $id) {
                    // If type is 'topic', check the specific update ('ar' or 'video')
                    if ($updateValue === 'ar') {
                        // Update active_recall_taken to true
                        $task['active_recall_taken'] = true;
                    } elseif ($updateValue === 'video') {
                        // Update video_watched to true
                        $task['video_watched'] = true;
                    }

                    // After updating, check if both active_recall_taken and video_watched are true
                    if ($task['active_recall_taken'] === true && $task['video_watched'] === true) {
                        // Set completed to false if both are true
                        $task['completed'] = true;
                    }
                    $updatedTaskData = [
                        'uid' => $uid,  // Assuming you have the userId in the session
                        'documentId' => $task['document_id'],  // Document ID from the task
                        'activeRecallTaken' => $task['active_recall_taken'],
                        'videoWatched' => $task['video_watched'],
                        'completed' => $task['completed']
                    ];
                    break;

                } elseif ($type === 'mock' && isset($task['mock_week']) && $task['mock_week'] == $id) {
                    // If type is 'mock', update the completed status where mock_week matches
                    if ($updateValue === '') {
                        // Set completed to true for the matching mock week
                        $task['completed'] = true;
                    }
                    $updatedTaskData = [
                        'uid' => $uid,  // Assuming you have the userId in the session
                        'documentId' => $task['document_id'],  // Document ID from the task
                        'activeRecallTaken' => $task['active_recall_taken'],
                        'videoWatched' => $task['video_watched'],
                        'completed' => $task['completed']
                    ];
                    break;
                }
            }
        }

        // After processing, update session data with modified tasks
        $_SESSION['dailyTaskRawData']['data'] = $tasks;
    }

    if ($updatedTaskData !== null) {
// Send data to the API using the 'updateDailyTask' endpoint
        $apiResponse = api_request_post('updateDailyTask', $updatedTaskData, 'POST', $accessToken, $refreshToken);
        echo json_encode($apiResponse);

    }
}


var_dump($_SESSION['dailyTaskRawData']['data']);






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
