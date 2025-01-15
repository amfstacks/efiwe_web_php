<?php
require_once __DIR__ . '/../functions/api.php';
require_once __DIR__ . '/../functions/auth.php';

// If the user is already logged in, redirect to dashboard
if (is_logged_in()) {
    header('Location: dashboard.php');
    exit();
}

require_once __DIR__ . '/../config/app_base.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo APP_NAME?> <?php echo htmlspecialchars(isset($page_title) ? $page_title : ''); ?></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

    <style>

        .image-container {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 0 20px 20px 0; /* Rounded corners for the container */
            overflow: hidden; /* Ensures the overlay and image are contained */
        }

        .image-container img.rounded-image {
            width: 100%; /* Make sure the image covers the container */
            height: auto; /* Maintain aspect ratio */
            display: block; /* Remove bottom space/gap */
        }

        .overlay-mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
            z-index: 1; /* Overlay must be above the image */
        }

        .centered-text {
            position: absolute;
            top: 50%; /* Position halfway down the parent */
            left: 50%; /* Position halfway across the parent */
            transform: translate(-50%, -50%); /* Offset the position to truly center the element */
            color: white; /* High contrast color */
            font-size: 24px; /* Adjust size as necessary */
            z-index: 2; /* Make sure the text is above the overlay */
            text-align: center; /* Ensure multi-line text is centered */
            width: 80%;
        }

    </style>
</head>