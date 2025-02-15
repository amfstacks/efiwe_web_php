<?php
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
        echo "Payment successful! Your payment reference is: " . $responseData['data']['reference'];
    } else {
        // Payment failed or was canceled
        echo "Payment failed. Please try again.";
    }
} else {
    echo "No reference provided.";
}
?>
