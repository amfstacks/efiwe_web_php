<?php
// functions/api.php

require_once __DIR__ . '/../config/config.php';

/**
 * Makes an HTTP request to the specified API endpoint.
 *
 * @param string $endpoint The API endpoint (e.g., 'signin').
 * @param array|null $data The data to send with the request.
 * @param string $method The HTTP method ('GET', 'POST', etc.).
 * @param string|null $accessToken The access token for authorization.
 *
 * @return array The API response.
 */
function api_request($endpoint, $data = null, $method = 'GET', $accessToken = null) {
    $url = API_BASE_URL . $endpoint;

    $payload = http_build_query($data);

    $ch = curl_init($url);

// Set the POST fields as URL-encoded form data
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded',
        'Accept: application/json' // Optional but recommended
    ]);

// Ensure the request method is POST
    curl_setopt($ch, CURLOPT_POST, true);

// Return the response instead of printing
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
    $response = curl_exec($ch);

// Check for cURL errors
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        die("cURL Error: {$error_msg}");
    }

// Close the cURL session
    curl_close($ch);

// Decode and display the response
//    var_dump($response);
return json_decode($response, true);
}
function api_request_old($endpoint, $data = null, $method = 'GET', $accessToken = null) {
    $url = API_BASE_URL . $endpoint;

    // Append query parameters for GET requests
    if ($method === 'GET' && !empty($data)) {
        $url .= '?' . http_build_query($data);
    }
    $payload = http_build_query($data);


    $ch = curl_init();
    if ($method === 'POST' && !empty($data)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_POST, true);
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded',
        'Accept: application/json' // Optional but recommended
    ]);

//    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $headers = ['Content-Type: application/json'];

    if ($accessToken) {
        $headers[] = 'Authorization: ' . $accessToken;
    }

//    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//var_dump($data) ;
//echo '<br>data';
//    if ($method !== 'GET') {
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
//        if (!empty($data)) {
//            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
//        }
//    }

    $response = curl_exec($ch);
//    var_dump($response) ;
    $response = json_decode($response, true);
    curl_close($ch);
    return $response;
//    if (curl_errno($ch)) {
//        $error_msg = curl_error($ch);
//        curl_close($ch);
//        return ['success' => false, 'message' => "cURL Error: {$error_msg}"];
//    }
//
//    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//    curl_close($ch);
//
//    $decoded = json_decode($response, true);
//
//    if ($http_status >= 200 && $http_status < 300) {
//        return ['success' => true, 'data' => $decoded];
//    } else {
//        $error_message = isset($decoded['message']) ? $decoded['message'] : 'An error occurred.';
//        return ['success' => false, 'message' => $error_message];
//    }
}

/**
 * Signs up a new user.
 *
 * @param string $email The user's email.
 * @param string $password The user's password.
 * @param array $additionalData Any additional data required by the API.
 *
 * @return array The API response.
 */
function signup($email, $password, $additionalData = []) {
    $data = array_merge([
        'email' => $email,
        'password' => $password
    ], $additionalData);

    return api_request('signup', $data, 'POST');
}

/**
 * Signs in a user.
 *
 * @param string $email The user's email.
 * @param string $password The user's password.
 *
 * @return array The API response.
 */
function signin($email, $password) {
    $data = [
        'email' => $email,
        'password' => $password
    ];

    return api_request('signin', $data, 'POST');
}

/**
 * Fetches all available subjects.
 *
 * @param string $examId The exam ID.
 * @param string $refreshToken The refresh token.
 * @param string $accessToken The access token for authorization.
 *
 * @return array The API response.
 */
function fetch_all_subjects($examId, $refreshToken, $accessToken) {
    $data = [
        'examId' => $examId,
        'refreshToken' => $refreshToken
    ];

    return api_request('allsubjects', $data, 'GET', $accessToken);
}
?>
