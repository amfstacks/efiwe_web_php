<?php

require_once __DIR__ . '/../functions/auth.php';
require_once __DIR__ . '/../functions/api.php';

require_login();
//$user = $_SESSION['user'];
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
$userData = isset($_SESSION['userData']) ? $_SESSION['userData'] : [];
$uid = isset($user['localId']) ? $user['localId'] : '';
$refreshToken = isset($user['refreshToken']) ? $user['refreshToken'] : '';
$accessToken = isset($user['idToken']) ? $user['idToken'] : '';
$profileSet = false;
if(isset($_SESSION['profileSet']) && $_SESSION['profileSet']){
    $profileSet = true;
}
//var_dump( $_SESSION['user']);
// Check if UID is available
if (empty($uid)) {
    echo json_encode([
        "success" => false,
        "message" => "User identifier is missing."
    ]);
    exit();
}

if(!$profileSet) {
    $queryParams = [
        'uid' => $uid,
        'refreshtoken' => $refreshToken
    ];
    $response = api_request_get('userDetails', $queryParams, 'GET', $accessToken, $refreshToken);
//var_dump($response);
//exit;
    if ($response['success']) {
        $userDataFetch = $response['data'];
        if (!empty($userDataFetch)) {
            if (isset($userDataFetch['setProfile']) && $userDataFetch['setProfile'] === true) {
                $profileSet = true;
                $_SESSION['profileSet'] = true;
            }
        }
        $_SESSION['userData'] = $userDataFetch;
        $userData = $userDataFetch;
        $selectedSubjects = isset($userDataFetch['subjectSelect']) ? $userDataFetch['subjectSelect'] : [];

// Optional: Store token if needed
        $isNewToken = $response['isNewToken'];
        $newToken = $response['token'];

// Update session with new token if applicable
        if ($isNewToken && !empty($newToken)) {
            $_SESSION['user']['idToken'] = $newToken;
        }
    } else {
        $profileErrorMessage = $response['message'];
        if (strpos($profileErrorMessage, 'not found')) {
            $profileSet = false;
        }
    }
}
//echo var_dump($profileSet);
//echo var_dump($_SESSION['userData']);
////exit;
//var_dump($user);
//exit;

$firstName = isset($userData['firstname']) ? $userData['firstname'] : '-';
$surname = isset($userData['surname']) ? $userData['surname'] : '-';
$email = isset($user['email']) ? $user['email'] : '-';
?>


