<?php
// functions/auth.php

session_start();

/**
 * Checks if the user is logged in.
 *
 * @return bool True if logged in, false otherwise.
 */
function is_logged_in() {
//    return true;
    return isset($_SESSION['user']);
}

/**
 * Redirects to the signin page if the user is not logged in.
 */
function require_login() {
    if (!is_logged_in()) {
        header('Location: login');
        exit();
    }
}

/**
 * Logs in the user by storing user data in the session.
 *
 * @param array $user_data The user data to store.
 */
function login_user($user_data) {
    $_SESSION['user'] = $user_data;
}

function isTrialActive($dateRegistered, $trialDays = 3){

    $dateRegistered = new DateTime($dateRegistered);

    // Get the current date and time
    $currentDate = new DateTime();

    // Calculate the difference in days
    $interval = $dateRegistered->diff($currentDate);

    // Get the number of days between the two dates
    $daysElapsed = $interval->days;

    // Calculate the remaining days of the trial
    $daysLeft = $trialDays - $daysElapsed;

    // If the trial period has expired (i.e., daysLeft <= 0), return 0
    if ($daysLeft <= 0) {
        return 0;
    }

    // Return the remaining days of the trial
    return $daysLeft;

}

/**
 * Logs out the user by clearing the session.
 */
function logout_user() {
    session_unset();
    session_destroy();
    header('Location: login');
    exit();
}
?>
