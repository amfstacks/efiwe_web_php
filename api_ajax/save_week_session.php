<?php
// Start the session
session_start();

// Check if 'week' is received via POST
if (isset($_POST['week'])) {
    $_SESSION['activeWeek'] = $_POST['week']; // Store the week in session
    echo 'Week stored successfully'; // Response to confirm the session is set
} else {
    echo 'Error: Week data not provided';
}
?>
