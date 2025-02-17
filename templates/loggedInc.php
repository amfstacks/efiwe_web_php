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
$hasActiveSubscription = false;
$hasCheckedSubscription = false;
$hasCheckedTrial = false;
if(isset($_SESSION['profileSet']) && $_SESSION['profileSet']){
    $profileSet = true;
}

if(isset($_SESSION['hasCheckedSubscription']) && $_SESSION['hasCheckedSubscription']){
    $hasCheckedSubscription = true;
}
if(isset($_SESSION['hasCheckedTrial']) && $_SESSION['hasCheckedTrial']){
    $hasCheckedTrial = true;
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
//echo $uid;
//echo "<br>";
//echo $accessToken;
//echo "<br>";
//echo $refreshToken;
//var_dump($userData['subjectSelect']);
//exit;


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
require_once __DIR__ . '/../config/app_base.php';
$selectedSubjects = isset($_SESSION['userData']['subjectSelect']) ? $_SESSION['userData']['subjectSelect'] : [];
//exit;
$dateRegistered = isset($_SESSION['userData']['dateRegistered']) ? $_SESSION['userData']['dateRegistered'] : '';






    if($dateRegistered != ''){
        $_SESSION['trialDays']  = isTrialActive($dateRegistered,TRIAL_ALLOW_DAYS);
        if($_SESSION['trialDays']){
            $hasActiveSubscription = true;
            $_SESSION['hasActiveSubscription']  = true;
            $_SESSION['hasCheckedSubscription'] = true;
            $hasCheckedSubscription = true;
        }
        else{
//            $hasActiveSubscription = false;
//            $_SESSION['hasActiveSubscription']  = false;
//            $hasCheckedSubscription = false;

        }
    }
    else{
        $_SESSION['trialDays'] = false;
    }

if(!$hasCheckedSubscription){
if(!$_SESSION['trialDays']) {
    $queryParams = [
        'uid' => $uid,
        'refreshtoken' => $refreshToken
    ];
    $response = api_request_get_bool('hasSub', $queryParams, 'GET', $accessToken, $refreshToken);
//    var_dump($response);
 $checkSubStat = $response['success'];

    if ($checkSubStat == 'true') {
//        echo "here__";

        $_SESSION['hasActiveSubscription'] = true;
    } else {
//        echo "here";
        $_SESSION['hasActiveSubscription'] = false;
    }
    $_SESSION['hasCheckedSubscription'] = true;
//echo $response;
//    exit;
}
}
//echo $dateRegistered;
//echo $_SESSION['trialDays'];
  $checkSub = $_SESSION['hasActiveSubscription'];
$trialDays = isset($_SESSION['trialDays']) ? $_SESSION['trialDays'] : 0;
//exit;

//echo $_SESSION['trialDays'];
//exit;




?>

<script>
    // Ensure that the selectedSubjects variable is defined before using it
    var mySelectedSubjects = <?php echo json_encode($selectedSubjects); ?>;
</script>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo APP_NAME_DISPLAY?> <?php echo htmlspecialchars(isset($page_title) ? $page_title : ''); ?></title>
    <!-- General CSS Files -->
<!--    <link rel="stylesheet" href="assets/css/app.min.css">-->
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/assets/css/app.min.css">
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/assets/bundles/bootstrap-social/bootstrap-social.css">

    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/assets/bundles/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/assets/bundles/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/assets/bundles/select2/dist/css/select2.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>//assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />


</head>