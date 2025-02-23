<?php
// Start the session
session_start();

//var_dump($_POST);
//exit;
if (isset($_POST['subject_id'])) {
    $_SESSION['currentSubjectId'] = $_POST['subject_id'];
    $_SESSION['currentSubjectName'] = $_POST['subject'];
//    echo $_SESSION['currentSubjectName'];
//    echo "<br>";
//    echo $_SESSION['currentSubjectId'];
//    echo 'subject stored successfully'; // Response to confirm the session is set

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Required data missing']);
//    echo 'Error: Week data not provided';
}
?>
