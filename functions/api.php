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
function api_request($endpoint, $data = null, $method = 'POST', $accessToken = null) {
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
//var_dump($response);
//exit;
// Check for cURL errors
//    if (curl_errno($ch)) {
//        $error_msg = curl_error($ch);
//        curl_close($ch);
//        die("cURL Error: {$error_msg}");
//
//    }
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        if(strpos($error_msg, 'resolve host') !== false){
            $error_msg = 'Kindly check your network connection ' ;
        }
        return [
            "success" => false,
            "message" => " Error: {$error_msg}",
        ];
    }

// Close the cURL session
    curl_close($ch);

// Decode and display the response
//    var_dump($response);
return json_decode($response, true);
}
function api_request_get($endpoint, $data = null, $method = 'GET', $accessToken = null,$refreshToken = null) {
    // Construct the full URL with query parameters if provided
    if ($accessToken == '' || $accessToken == null) {
        return [
            "success" => false,
            "message" => "access token is missing",
        ];
    }
    if ($refreshToken == '' || $refreshToken == null) {
        return [
            "success" => false,
            "message" => "refresh token is missing",
        ];
    }
    $url = API_BASE_URL . $endpoint;

    if ($method === 'GET' && !empty($data)) {
        $url .= '?' . http_build_query($data);
    }

    // Initialize cURL session
    $ch = curl_init($url);

    // Set headers
    $headers = [
        'Accept: application/json' // Optional but recommended
    ];

    // Add Authorization header if accessToken is provided
    if ($accessToken) {
        $headers[] = 'Authorization: Bearer ' . $accessToken;
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Ensure the request method is GET
    curl_setopt($ch, CURLOPT_HTTPGET, true);

    // Return the response instead of printing
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);
//var_dump($response);
//exit;
    // Check for cURL errors
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        if(strpos($error_msg, 'resolve host') !== false){
            $error_msg = 'Kindly check your network connection ' ;
        }
        curl_close($ch);
        return [
            "success" => false,
            "message" => " Error: {$error_msg}",
        ];
    }

    // Close the cURL session
    curl_close($ch);

    // Decode and return the response as an associative array
    $decoded = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return [
            "success" => false,
            "message" => "Invalid JSON response.",
        ];
    }

    if (isset($decoded['error'])) {
        return [
            "success" => false,
            "message" => $decoded['error'],
        ];
    }

    if (isset($decoded['isNewToken']) && $decoded['isNewToken'] === true && isset($decoded['token'])) {
        // Update the session's idToken with the new token
        $_SESSION['user']['idToken'] = $decoded['token'];
    }

    return $decoded;
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

    return api_request_get('allsubjects', $data, 'GET', $accessToken,$refreshToken);
}
function fetch_subject_topics($uid,$subjectId, $refreshToken, $accessToken) {
    $data = [
        'uid' => $uid,
        'refreshToken' => $refreshToken,
        'subjectId' => $subjectId,
    ];

    return api_request_get('subjecttopics', $data, 'GET', $accessToken,$refreshToken);
}

function fetch_JambMockList($uid, $refreshToken, $accessToken) {
    $data = [
        'uid' => $uid,
        'refreshToken' => $refreshToken
    ];

    return api_request_get('getMocksList', $data, 'GET', $accessToken,$refreshToken);
}

function fetch_Mock_Questions($uid, $refreshToken, $accessToken,$mockWeek) {
    $data = [
        'uid' => $uid,
        'refreshToken' => $refreshToken,
        'mockWeek' => $mockWeek
    ];

    return api_request_get('fetchActualQuestions', $data, 'GET', $accessToken,$refreshToken);
}

function load_Mock_Questions($uid, $refreshToken, $accessToken,$mockWeek,$selectedSubjects) {
    $data = [
        'uid' => $uid,
        'refreshToken' => $refreshToken,
        'mockWeek' => $mockWeek,
        'mySubject' => $selectedSubjects
    ];

    return api_request_get('fetchMockQuestions', $data, 'GET', $accessToken,$refreshToken);
}
function fetch_Mock_Answers($uid, $refreshToken, $accessToken,$mockWeek) {
    $data = [
        'uid' => $uid,
        'refreshToken' => $refreshToken,
        'mockWeek' => $mockWeek
    ];

    return api_request_get('fetchAnswers', $data, 'GET', $accessToken,$refreshToken);
}

function api_request_post_($endpoint, $data = null, $method = 'POST', $accessToken = null,$refreshToken=null) {
    $url = API_BASE_URL . $endpoint;

//    $payload = json_encode($data);
    $cleanData = [];
    foreach ($data as $key => $value) {
        $cleanKey = rtrim($key);
        $cleanData[$cleanKey] = $value;
    }
//    $payload = http_build_query($cleanData);
//var_dump($payload);
//exit;
    $ch = curl_init($url);

    // Set the POST fields as JSON
    curl_setopt($ch, CURLOPT_POSTFIELDS, $cleanData);

    // Set headers
    $headers = [
//        'Content-Type: application/json',
//        'Content-Type: application/x-www-form-urlencoded',
        'Accept: application/json'
    ];

    // Add Authorization header if accessToken is provided
    if ($accessToken) {
        $headers[] = 'Authorization: Bearer ' . $accessToken;
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

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
        return [
            "success" => false,
            "message" => "cURL Error: {$error_msg}",
        ];
    }

    // Capture HTTP status code
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close the cURL session
    curl_close($ch);

    // Decode the JSON response
    $decoded = json_decode($response, true);

    // Handle JSON decode errors
//    if (json_last_error() !== JSON_ERROR_NONE) {
//        return [
//            "success" => false,
//            "message" => "Invalid JSON response.",
//            "http_status" => $http_status,
//            "raw_response" => $response,
//        ];
//    }

    // Check for API-level errors
    if (isset($decoded['error'])) {
        return [
            "success" => false,
            "message" => $decoded['error'],
            "http_status" => $http_status,
        ];
    }
//echo $data['uid'];
    return $decoded;
}

function api_request_post__($endpoint, $data = null, $method = 'POST', $accessToken = null, $refreshToken = null) {
    $url = API_BASE_URL . $endpoint;

    // Remove trailing spaces from keys
    $cleanData = [];
//    foreach ($data as $key => $value) {
//        $cleanKey = rtrim($key); // Removes trailing spaces
//        $cleanData[$cleanKey] = $value;
//    }
    $payload = http_build_query($data);
    $ch = curl_init($url);

    // Set the POST fields as an associative array for multipart/form-data
    $data = json_encode($data);
    var_dump($data);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Set headers
//    $headers = [
//        'Accept: application/json' // Optional but recommended
//    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
//        'Content-Type: application/x-www-form-urlencoded',
        'Accept: application/json' // Optional but recommended
    ]);
    // Add Authorization header if accessToken is provided
    if ($accessToken) {
        $headers[] = 'Authorization: Bearer ' . $accessToken;
    }

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
        $error_msg = curl_error($ch);
        curl_close($ch);
        return [
            "success" => false,
            "message" => "cURL Error: {$error_msg}",
            "http_status" => $http_status
        ];
    }

    // Close the cURL session
    curl_close($ch);

    // Decode the JSON response
    $decoded = json_decode($response, true);

    // Handle JSON decode errors
//    if (json_last_error() !== JSON_ERROR_NONE) {
//        return [
//            "success" => false,
//            "message" => "Invalid JSON response.",
//            "http_status" => $http_status,
//            "raw_response" => $response
//        ];
//    }

    // Check for API-level errors
//    if (isset($decoded['error'])) {
//        return [
//            "success" => false,
//            "message" => $decoded['error'],
//            "http_status" => $http_status
//        ];
//    }

    // Return the decoded response
    return $decoded;
}
function api_request_post___($endpoint, $data = null, $method = 'POST', $accessToken = null, $refreshToken = null) {
    $url = API_BASE_URL . $endpoint;

    // Remove trailing spaces from keys
    $cleanData = [];
    foreach ($data as $key => $value) {
        $cleanKey = rtrim($key); // Removes trailing spaces
        $cleanData[$cleanKey] = $value;
    }
//    $cleanData = json_encode($cleanData);
//var_dump($cleanData);
    $ch = curl_init($url);

    // Set the POST fields as an associative array for multipart/form-data
    curl_setopt($ch, CURLOPT_POSTFIELDS, $cleanData);

    // Set headers
    $headers = [
        'Accept: application/json' // Optional but recommended
    ];

    // Add Authorization header if accessToken is provided
    if ($accessToken) {
        $headers[] = 'Authorization: Bearer ' . $accessToken;
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded',
//        'Accept: application/json' // Optional but recommended
    ]);
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
        $error_msg = curl_error($ch);
        curl_close($ch);
        return [
            "success" => false,
            "message" => "cURL Error: {$error_msg}",
            "http_status" => $http_status
        ];
    }

    // Close the cURL session
    curl_close($ch);

    // Decode the JSON response
    $decoded = json_decode($response, true);
    var_dump($response);
    var_dump($decoded);
    exit;
    // Handle JSON decode errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        return [
            "success" => false,
            "message" => "Invalid JSON response.",
            "http_status" => $http_status,
            "raw_response" => $response
        ];
    }

    // Check for API-level errors
    if (isset($decoded['error'])) {
        return [
            "success" => false,
            "message" => $decoded['error'],
            "http_status" => $http_status
        ];
    }

    // Return the decoded response
    return $decoded;
}

function api_request_post($endpoint, $data = null, $method = 'POST', $accessToken = null, $refreshToken = null) {
    $url = API_BASE_URL . $endpoint;

    // Remove trailing spaces from keys
    $cleanData = [];
    foreach ($data as $key => $value) {
        $cleanKey = rtrim($key); // Removes trailing spaces
        $cleanData[$cleanKey] = $value;
    }

    // Build the form-urlencoded payload
    $payload = http_build_query($cleanData);

    $ch = curl_init($url);

    // Set the POST fields as a URL-encoded string
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    // Build headers array
    $headers = [
        'Content-Type: application/x-www-form-urlencoded',
        'Accept: application/json' // Indicates expected response format
    ];

    // Add Authorization header if accessToken is provided
    if ($accessToken) {
        $headers[] = 'Authorization: Bearer ' . $accessToken;
    }

    // Set headers correctly without overwriting
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
        $error_msg = curl_error($ch);
        curl_close($ch);
        if(strpos($error_msg, 'resolve host') !== false){
            $error_msg = 'Kindly check your network connection ' ;
        }
        return [
            "success" => false,
            "message" => "cURL Error: {$error_msg}",
            "http_status" => $http_status
        ];
    }

    // Close the cURL session
    curl_close($ch);

    // Decode the JSON response
    $decoded = json_decode($response, true);

//    // For debugging purposes, display the raw response and decoded data
//    var_dump($response);
//    var_dump($decoded);
//    exit;

    if (json_last_error() !== JSON_ERROR_NONE) {
        return [
            "success" => false,
            "message" => "Invalid JSON response.",
            "http_status" => $http_status,
            "raw_response" => $response
        ];
    }

    // Check for API-level errors
    if (isset($decoded['error'])) {
        return [
            "success" => false,
            "message" => $decoded['error'],
            "http_status" => $http_status
        ];
    }

    // Return the decoded response
    // Return the decoded response
    return $decoded;
}


?>
