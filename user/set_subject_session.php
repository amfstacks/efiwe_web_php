<?php
session_start();

if (isset($_POST['subjectId']) && isset($_POST['subjectName'])) {
  echo  $_SESSION['currentSubjectId'] = $_POST['subjectId'];
   echo  $_SESSION['currentSubjectName'] = $_POST['subjectName'];
}
?>
