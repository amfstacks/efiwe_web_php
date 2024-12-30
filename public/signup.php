<?php
//$url = 'https://fayabase.com/efiwe/api/signup';
//$data = [
//    'email' => 'test02@example.com',
//    'password' => 'SecurePass123'
//];
//$payload = http_build_query($data);
//
//$ch = curl_init($url);
//
//// Set the POST fields as URL-encoded form data
//curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
//
//// Set headers
//curl_setopt($ch, CURLOPT_HTTPHEADER, [
//    'Content-Type: application/x-www-form-urlencoded',
//    'Accept: application/json' // Optional but recommended
//]);
//
//// Ensure the request method is POST
//curl_setopt($ch, CURLOPT_POST, true);
//
//// Return the response instead of printing
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//// Execute the request
//$response = curl_exec($ch);
//
//// Check for cURL errors
//if (curl_errno($ch)) {
//    $error_msg = curl_error($ch);
//    curl_close($ch);
//    die("cURL Error: {$error_msg}");
//}
//
//// Close the cURL session
//curl_close($ch);
//
//// Decode and display the response
//var_dump($response);
//exit;
?>



<?php
// public/signup.php

require_once __DIR__ . '/../functions/api.php';
require_once __DIR__ . '/../functions/auth.php';

// If the user is already logged in, redirect to dashboard
if (is_logged_in()) {
    header('Location: dashboard.php');
    exit();
}

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    if (!$email) {
        $errors[] = 'Please enter a valid email address.';
    }

    if (empty($password)) {
        $errors[] = 'Please enter a password.';
    }

    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        // Call the signup API
//        echo $email;
//        echo $password;
        $result = signup($email, $password);
//var_dump($result);
//exit;
        if ($result['success']) {
            $success = $result['message'];
        } else {
            $errors[] = $result['message'];
        }
    }
}

$page_title = 'Sign Up';
include __DIR__ . '/../templates/header.php';
?>

<div class="form-container">
    <h2>Sign Up</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success">
            <?php echo $success; ?>
        </div>
    <?php else: ?>
        <form action="signup.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : ''); ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="signin.php">Sign in here</a>.</p>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
