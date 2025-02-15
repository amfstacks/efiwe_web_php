<?php

require_once __DIR__ . '/../functions/auth.php';
require_once __DIR__ . '/../functions/api.php';

// Start the session
//session_start();

// Set response header to JSON
header('Content-Type: application/json');
// Ensure the reference is passed in the callback URL
if (isset($_GET['reference'])) {
    $reference = $_GET['reference'];

    // Paystack secret key (same as in paystack_payment.php)
    $secretKey = 'sk_test_fdbad1bf0761399f90464bd283dbe5ab1b41548f';

    // Make a GET request to Paystack to verify the transaction
    $url = 'https://api.paystack.co/transaction/verify/' . $reference;

    // Initialize cURL to verify the payment
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $secretKey,
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Decode the response from Paystack
    $responseData = json_decode($response, true);

    // Check if the transaction was successful
    if ($responseData['status'] === true && $responseData['data']['status'] === 'success') {
        // Here you can process the payment (e.g., update database, send confirmation email)

        $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
        $uid = isset($user['localId']) ? $user['localId'] : '';
//echo $uid;
//exit;

// Extract accessToken and refreshToken
        $accessToken = isset($user['idToken']) ? $user['idToken'] : ''; //$_SESSION['user']['idToken']
        $refreshToken = isset($user['refreshToken']) ? $user['refreshToken'] : '';

//        var_dump($responseData['data']);

        if($_SESSION['sub_package'] == null || $_SESSION['sub_package'] == 0 || $_SESSION['sub_amount'] == null || $_SESSION['sub_amount'] == 0 ||$_SESSION['sub_duration'] ==null || $_SESSION['sub_duration'] ==0 ){

            echo json_encode([
                'error' => true,
            ]);
            exit;
        }
        $profileData = [
            "subid" => $_SESSION['sub_package'],
            "selectedAmount" => $_SESSION['sub_amount'],
            "subDur" => $_SESSION['sub_duration'],
            "referenceID" => $responseData['data']['reference'],
            "uid" => $uid,
            "refreshtoken" => $refreshToken
        ];

//        var_dump($profileData);
//        exit;
        $apiResponse = api_request_post('subscribeUser', $profileData, 'POST', $accessToken,$refreshToken);




//$apiResponse = api_request('profileSetup', $profileData, 'POST', $accessToken);

// Return the API response to the frontend
        $response = json_encode($apiResponse);

        $decodedResponse = json_decode($response, true);
        $success = $decodedResponse['success'];  // true
        $data = $decodedResponse['data'];
        $hasSubscription = $decodedResponse['hasSubscription'];
     if($success){
         $_SESSION['hasSubscription'] = $hasSubscription;
         if($data != null && $data != ''){
             $_SESSION['sub_expires'] = $data;
         }
     }

//        echo "Payment successful! Your payment reference is: " . $responseData['data']['reference'];
    } else {
        // Payment failed or was canceled
        echo "Payment failed. Please try again.";
    }
} else {
    echo "No reference provided.";
}
?>
