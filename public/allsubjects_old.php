<?php
// public/allsubjects.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../functions/auth.php';
require_once __DIR__ . '/../functions/api.php';

require_login();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

//var_dump($user);
//exit;
// Retrieve the access token from the user session
$accessToken = isset($user['idToken']) ? 'Bearer ' . $user['idToken'] : '';
$refreshToken = isset($user['refreshToken']) ? 'Bearer ' . $user['refreshToken'] : '';

// Replace these with your actual examId and refreshToken
$examId = "X2j9hFD6O7RGAER6bn3b";
//$refreshToken = "AMf-vBxRqfDZ3mylSGKeOv4RIMaqem77Y9--EcOOUwOZkFAo8iVye6Kqgy9zgdJfSn7LmxKGvhgMer05Vp8GrNSmIMLxbs0MGcD3W292XCsRsGYyhWXKHfivtpiL1BgP3avYFtSS3cdjpyfv-YnZBekAZ4PbNoXHsjy9n7dTWgi6ehc9PvU6fo-IdubeRzcOt3AKWrLBkjrJL6WxfMe876UEf4_Ha7E29Q";

// Fetch all subjects from the API
$result = fetch_all_subjects($examId, $refreshToken, $accessToken);
//var_dump($result);
//exit;
$page_title = 'All Subjects';
include __DIR__ . '/../templates/header.php';
?>

<div class="dashboard-container">
    <h2>All Subjects</h2>
    <?php if ($result['success']): ?>
        <?php
        $subjects = isset($result['subjects']) ? $result['subjects'] : [];
        $user_email = isset($user['email']) ? $user['email'] : 'User';
        ?>
        <p>Welcome, <?php echo htmlspecialchars($user_email); ?>!</p>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Department</th>
                <th>FID</th>
                <th>Date Modified</th>
                <th>Icon</th>
                <th>Status</th>
                <th>Color</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($subjects as $subject): ?>
                <tr>
                    <td><?php echo htmlspecialchars(isset($subject['name']) ? $subject['name'] : 'N/A'); ?></td>
                    <td><?php echo htmlspecialchars(isset($subject['id']) ? $subject['id'] : 'N/A'); ?></td>
                    <td><?php echo htmlspecialchars(isset($subject['department']) ? $subject['department'] : 'N/A'); ?></td>
                    <td><?php echo htmlspecialchars(isset($subject['fid']) ? $subject['fid'] : 'N/A'); ?></td>
                    <td><?php echo htmlspecialchars(isset($subject['date_modified']) ? $subject['date_modified'] : 'N/A'); ?></td>
                    <td>
                        <?php if (!empty($subject['icon'])): ?>
                            <img src="<?php echo htmlspecialchars($subject['icon']); ?>" alt="<?php echo htmlspecialchars(isset($subject['name']) ? $subject['name'] : 'Icon'); ?>" width="50">
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars(isset($subject['status']) ? $subject['status'] : 'N/A'); ?></td>
                    <td>
                        <?php if (!empty($subject['color'])): ?>
                            <div style="width: 20px; height: 20px; background-color: <?php echo htmlspecialchars($subject['color']); ?>; border: 1px solid #000;"></div>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="dashboard.php" class="button">Back to Dashboard</a>
    <?php else: ?>
        <p class="error"><?php echo htmlspecialchars($result['message']); ?></p>
        <a href="dashboard.php" class="button">Back to Dashboard</a>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
