<?php
// public/dashboard.php

require_once __DIR__ . '/../functions/auth.php';
require_once __DIR__ . '/../functions/api.php';

require_login();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

// Extract UID and Refresh Token
$uid = isset($user['localId']) ? $user['localId'] : '';
$refreshToken = isset($user['refreshToken']) ? $user['refreshToken'] : '';
$accessToken = isset($user['idToken']) ? $user['idToken'] : '';

// Check if UID is available
if (empty($uid)) {
    echo json_encode([
        "success" => false,
        "message" => "User identifier is missing."
    ]);
    exit();
}

// API Endpoint
$apiUrl = 'https://fayabase.com/efiwe/api/userDetails';

// Build the query parameters
$queryParams = http_build_query([
    'uid' => $uid,
    'refreshtoken' => $refreshToken
]);
if ($accessToken) {
    $headers[] = 'Authorization: Bearer ' . $accessToken;
}
// Complete URL with query parameters
$fullUrl = $apiUrl . '?' . $queryParams;

// Initialize cURL
$ch = curl_init($fullUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response instead of outputting
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json'
]);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// Execute the request
$response = curl_exec($ch);

// Capture HTTP status code
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Check for cURL errors
if (curl_errno($ch)) {
    $error_msg = curl_error($ch);
    curl_close($ch);
    echo json_encode([
        "success" => false,
        "message" => "cURL Error: {$error_msg}",
        "http_status" => $http_status
    ]);
    exit();
}

// Close the cURL session
curl_close($ch);

// Decode the JSON response
$decodedResponse = json_decode($response, true);

// Check for JSON decode errors
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid JSON response.",
        "http_status" => $http_status,
        "raw_response" => $response
    ]);
    exit();
}

// Check API-level success
if (!$decodedResponse['success']) {
    echo json_encode([
        "success" => false,
        "message" => $decodedResponse['message'],
        "code" => $decodedResponse['code']
    ]);
    exit();
}

// Extract user data
$userData = $decodedResponse['data'];

// Optional: Store token if needed
$isNewToken = $decodedResponse['isNewToken'];
$newToken = $decodedResponse['token'];

// Update session with new token if applicable
if ($isNewToken && !empty($newToken)) {
    $_SESSION['user']['idToken'] = $newToken;
}

// Set page title
$page_title = 'Dashboard';
include __DIR__ . '/../templates/header.php';
?>

<div class="dashboard-container">
    <h2>Dashboard</h2>
    <p>Welcome, <?php echo htmlspecialchars(isset($userData['firstname']) ? $userData['firstname'] : 'User'); ?>!</p>
    <?php
    if(isset($userData) && !empty($userData)) {



    ?>
    <div class="user-details">
        <h3>Your Details:</h3>
        <ul>
            <li><strong>First Name:</strong> <?php echo htmlspecialchars($userData['firstname']); ?></li>
            <li><strong>Surname:</strong> <?php echo htmlspecialchars($userData['surname']); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></li>
            <li><strong>Date of Birth:</strong> <?php echo htmlspecialchars($userData['dob']); ?></li>
            <li><strong>Phone Number:</strong> <?php echo htmlspecialchars($userData['phoneNumber']); ?></li>
            <li><strong>Class:</strong> <?php echo htmlspecialchars($userData['class']); ?></li>
            <li><strong>Exam:</strong> <?php echo htmlspecialchars($userData['exam']); ?></li>
            <li><strong>State:</strong> <?php echo htmlspecialchars($userData['state']); ?></li>
            <li><strong>City:</strong> <?php echo htmlspecialchars($userData['city']); ?></li>
            <li><strong>Home Address:</strong> <?php echo htmlspecialchars($userData['homeaddress']); ?></li>
            <li><strong>Subjects Selected:</strong> <?php echo htmlspecialchars(implode(", ", $userData['subjectSelect'])); ?></li>
            <li><strong>Total Points:</strong> <?php echo htmlspecialchars($userData['totalpoints']); ?></li>
            <li><strong>Date Registered:</strong> <?php echo htmlspecialchars($userData['dateRegistered']); ?></li>
            <li><strong>Profile Set:</strong> <?php echo $userData['setProfile'] ? 'Yes' : 'No'; ?></li>
        </ul>
    </div>
    <?php
    }
   else {
       echo "<a href='profile_setup.php'>fill Biodata</a>";
   }


    ?>
    <div class="dashboard-actions">
        <a href="allsubjects.php" class="button">View All Subjects</a>
        <a href="logout.php" class="button">Logout</a>
    </div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
