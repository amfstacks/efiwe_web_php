<?php
$url = 'https://fayabase.com/efiwe/api/profileSetup';
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

// Extract accessToken and refreshToken
$accessToken = isset($user['idToken']) ? $user['idToken'] : '';
$profileData = [
    "firstname" => "Test fn",
    "surname" => "lkjh",
    "email" => "empene8@gmail.comaaaaa",
    "dob" => "2025-01-16",
    "phoneNumber" => "8034107132",
    "class" => "Math 101",
    "exam" => "456783765333",
    "state" => "California",
    "city" => "Los Angeles",
    "homeaddress" => "1234 Elm Street, Apt 5",
    "subjectSelect" => "2,7,5,1",
    "dateUpdated" => 1,
    "noOfProfileUpdate" => 0,
    "profile" => "", // No profile image
    "setProfile" => false,
    "totalpoints" => 0,
    "dateRegistered" => date('c'),
    "uid" => "MfJ1YqTZ1TNIngx6polUvkZl4Jl2",
    "refreshtoken" => "AMf-vBx3bcH7tiZGcZP0gTjK30HgJSTN52vqgXU6lNvincKQD25xOug17gpaWGFzMt_RxvX24-gfecrkk1zykXg7DHr0sNcSztxKij5DpK7YrgttdUwbSZorNwIh5G9Wvsw7tLJ2S7fSxJb2s0j339yzACZTnIi3noZ0tenHBRRCoJPJTFmIwPrFO6E4R1HZQh0aZEyHz51YFPERRYtwfcLwKzZcbDoSHg"
];
$payload = http_build_query($profileData);
$ch = curl_init($url);

// Set the POST fields as an associative array for multipart/form-data
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set headers
$headers = [
    'Accept: application/json' // Optional but recommended
];
$headers[] = 'Authorization: Bearer ' . $accessToken;
// Add Authorization header if needed
// $headers[] = 'Authorization: Bearer ' . $accessToken;

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Ensure the request method is POST
curl_setopt($ch, CURLOPT_POST, true);

// Return the response instead of printing
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Capture HTTP status code
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    echo "HTTP Status: " . $http_status . "\n";
    echo "Response: " . $response;
}

// Close the cURL session
curl_close($ch);
?>
