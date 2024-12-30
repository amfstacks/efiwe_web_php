<?php
// templates/header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars(isset($page_title) ? $page_title : 'My PHP Web App'); ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<header>
    <h1>My PHP Web App</h1>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="allsubjects.php">All Subjects</a>
        <?php if (is_logged_in()): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="signin.php">Sign In</a>
            <a href="signup.php">Sign Up</a>
        <?php endif; ?>
    </nav>
</header>
<main>
