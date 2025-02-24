<?php

require_once __DIR__ . '/../functions/auth.php';
require_once __DIR__ . '/../functions/api.php';
// Ensure the request is coming via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    // Receive the data (amount) sent from the frontend
    $data = json_decode(file_get_contents("php://input"), true);
    $amount = $data['amount'];
    $duration = $data['duration'];
    $package = $data['package'];
$_SESSION['sub_amount'] = $amount;
$_SESSION['sub_duration'] = $duration;
    $_SESSION['sub_package'] = $package;
    // Validate the amount (e.g., ensure it's greater than 0)
    if ($amount <= 0 || !is_numeric($amount)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid payment amount.']);
        exit;
    }
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $uid = isset($user['localId']) ? $user['localId'] : '';
//echo $uid;
//exit;

// Extract accessToken and refreshToken
    $accessToken = isset($user['idToken']) ? $user['idToken'] : ''; //$_SESSION['user']['idToken']
    $refreshToken = isset($user['refreshToken']) ? $user['refreshToken'] : '';
    $modifiedUid = substr($uid, 6);
    $currentTime = date("His");
    //? test very well

    $uniqueReference = $modifiedUid . $currentTime;
    $profileData = [
        "subid" => $_SESSION['sub_package'],
        "selectedAmount" => $_SESSION['sub_amount'],
        "subDur" => $_SESSION['sub_duration'],
        "referenceID" => $uniqueReference,
        "uid" => $uid,
        "refreshtoken" => $refreshToken
    ];

//        var_dump($profileData);
//        exit;
    //? add log
    try {
        $apiResponse = api_request_post('subscribeUserLog', $profileData, 'POST', $accessToken, $refreshToken);
    }catch (Exception $e){
    }


    // Paystack secret key (should never be exposed on the frontend)
    $secretKey = 'sk_test_fdbad1bf0761399f90464bd283dbe5ab1b41548f';

    $email = isset($user['email']) ? $user['email'] : 'amfstacks@gmail.com';
    // Prepare the request to Paystack to initialize the transaction
    $url = 'https://api.paystack.co/transaction/initialize';
    $base = 'http://localhost/pro/efiweweb/user/';
//    $base = 'https://fayabase.com/efiweweb/user/';
    $fields = [
        'amount' => $amount * 100, // Paystack expects the amount in kobo (multiply by 100)
        'email' => $email, // Replace with the customer's email
        'callback_url' => $base.'callbackUrl.php', // Your callback URL after payment
        'reference' => $uniqueReference, // Your callback URL after payment
    ];
    //? test very well
    $_SESSION['reference'] = $uniqueReference;

    // Use cURL to make the API call to Paystack
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $secretKey,
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Decode the Paystack response
    $responseData = json_decode($response, true);

    // If the request was successful, return the authorization URL
    if ($responseData['status'] === true) {
        echo json_encode([
            'status' => 'success',
            'authorization_url' => $responseData['data']['authorization_url'],
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Unable to initialize payment',
        ]);
    }
}
?>
