<?php
// public/save_profile.php

// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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


// Handle file upload for profile image
$profileUrl = '';
$setProfile = false;

if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profile']['tmp_name'];
    $fileName = $_FILES['profile']['name'];
    $fileSize = $_FILES['profile']['size'];
    $fileType = $_FILES['profile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Sanitize file name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // Check allowed file extensions
    $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileExtension, $allowedfileExtensions)) {
        // Directory in which the uploaded file will be moved
        $uploadFileDir = __DIR__ . '/../uploads/profile_images/';
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }
        $dest_path = $uploadFileDir . $newFileName;

        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            // Assuming you have a URL to access the uploaded image
            // Update this based on your server's configuration
            $profileUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/uploads/profile_images/' . $newFileName;
            $setProfile = true;
        } else {
            echo json_encode([
                "success" => false,
                "message" => "There was an error moving the uploaded file."
            ]);
            exit();
        }
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Upload failed. Allowed file types: " . implode(", ", $allowedfileExtensions)
        ]);
        exit();
    }
}

// Collect form data
$firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
$surname = isset($_POST['surname']) ? trim($_POST['surname']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$dob = isset($_POST['dob']) ? trim($_POST['dob']) : '';
$phoneNumber = isset($_POST['phoneNumber']) ? trim($_POST['phoneNumber']) : '';
$class = isset($_POST['class']) ? trim($_POST['class']) : '';
$exam = isset($_POST['exam']) ? trim($_POST['exam']) : '';
$state = isset($_POST['state']) ? trim($_POST['state']) : '';
$city = isset($_POST['lga']) ? trim($_POST['lga']) : '';
$homeaddress = isset($_POST['homeaddress']) ? trim($_POST['homeaddress']) : '';
$subjectSelect = isset($_POST['subjectSelect']) ? trim($_POST['subjectSelect']) : '';

// Validate required fields
$errors = [];


$exam = "X2j9hFD6O7RGAER6bn3b";
$email =  $user['email'];
$class = 'abc';
if (empty($firstname)) {
    $errors[] = "First name is required.";
}

if (empty($surname)) {
    $errors[] = "Surname is required.";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "A valid email is required.";
}

if (empty($dob)) {
    $errors[] = "Date of birth is required.";
}

if (empty($phoneNumber)) {
    $errors[] = "Phone number is required.";
}

if (empty($class)) {
    $errors[] = "Class is required.";
}

if (empty($exam)) {
    $errors[] = "Exam ID is required.";
}

if (empty($state)) {
    $errors[] = "State is required.";
}

if (empty($city)) {
    $errors[] = "City is required.";
}

if (empty($homeaddress)) {
    $errors[] = "Home address is required.";
}

if (empty($subjectSelect)) {
    $errors[] = "At least one subject must be selected.";
} else {
    // Ensure exactly four subjects are selected
    $selectedSubjects = array_map('trim', explode(',', $subjectSelect));
    $selectedSubjects = array_filter($selectedSubjects); // Remove empty values

    if (count($selectedSubjects) !== 4) {
        $errors[] = "Please select exactly 4 subjects.";
    }
}

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
// Prepare data for the API
$profileData = [
    "firstname" => $firstname,
    "surname" => $surname,
    "email" => $email,
    "dob" => $dob,
    "phoneNumber" => $phoneNumber,
    "class" => $class,
    "exam" => $exam,
    "state" => $state,
    "city" => $city,
    "homeaddress" => $homeaddress,
    "subjectSelect" => implode(", ", $selectedSubjects),
    "dateUpdated" => 1,
    "noOfProfileUpdate" => 0,
    "profile" => $profileUrl,
    "setProfile" => $setProfile,
    "totalpoints" => 0, // Assuming initial points
    "mock" => [],
    "activerecalltaken" => [],
    "spacedrepetition" => [],
    "spacedrepetitionAssigned" => [],
    "dailytask" => [],
    "dailyTaskGraded" => [],
    "dailyLogin" => [],
    "nodailyTask" => [],
    "dateRegistered" => date('c'), // ISO 8601 format
    "uid" => $uid,
    "refreshtoken" => $refreshToken
];

//var_dump($profileData);
//exit();
// Send data to the API
$apiResponse = api_request_post('profileSetup', $profileData, 'POST', $accessToken,$refreshToken);
//$apiResponse = api_request('profileSetup', $profileData, 'POST', $accessToken);

// Return the API response to the frontend
echo json_encode($apiResponse);
?>
