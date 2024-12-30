<?php
// public/signin.php

require_once __DIR__ . '/../functions/api.php';
require_once __DIR__ . '/../functions/auth.php';

// If the user is already logged in, redirect to dashboard
if (is_logged_in()) {
    header('Location: dashboard.php');
    exit();
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!$email) {
        $errors[] = 'Please enter a valid email address.';
    }

    if (empty($password)) {
        $errors[] = 'Please enter your password.';
    }

    if (empty($errors)) {
        // Call the signin API
        $result = signin($email, $password);

        if ($result['success']) {
            // Assuming the API returns user data including accessToken
            $user_data = $result['data'];
            login_user($user_data);
            header('Location: dashboard.php');
            exit();
        } else {
            $errors[] = $result['message'];
        }
    }
}

$page_title = 'Sign In';
include __DIR__ . '/../templates/header.php';
?>

<div class="form-container">
    <h2>Sign In</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="signin.php" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : ''); ?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Sign In</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
