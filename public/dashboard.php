<?php
// public/dashboard.php

require_once __DIR__ . '/../functions/auth.php';
require_once __DIR__ . '/../functions/api.php';

require_login();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
//var_dump($_SESSION['user']);
// You can retrieve additional user data here if needed
echo $uid = isset($user['localId']) ? $user['localId'] : '';

$page_title = 'Dashboard';
include __DIR__ . '/../templates/header.php';
?>

<div class="dashboard-container">
    <h2>Dashboard</h2>
    <p>Welcome, <?php echo htmlspecialchars(isset($user['email']) ? $user['email'] : 'User'); ?>!</p>
    <a href="allsubjects.php" class="button">View All Subjects</a>
    <a href="logout.php" class="button">Logout</a>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
