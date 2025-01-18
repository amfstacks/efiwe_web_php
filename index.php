<?php
header("location: user/");
exit;

git remote add origin https://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@github.com/amfstacks/efiwe_web_php.git
//// allsubjects.php
//
//// Function to fetch data from the API
//function fetch_all_subjects($examId, $refreshToken) {
//    // API Endpoint
//    $api_url = "https://fayabase.com/efiwe/api/allsubjects?examId={$examId}&refreshtoken={$refreshToken}";
//
//    // Initialize cURL
//    $ch = curl_init($api_url);
//    $accessToken = "Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6ImJkMGFlMTRkMjhkMTY1NzhiMzFjOGJlNmM4ZmRlZDM0ZDVlMWExYzEiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vZWZpd2VhcHAtODM0YjUiLCJhdWQiOiJlZml3ZWFwcC04MzRiNSIsImF1dGhfdGltZSI6MTczMzY2MTk1NiwidXNlcl9pZCI6Im0xYzdDYUFMa1BYbmdMY093R1owNk5zRTEyejIiLCJzdWIiOiJtMWM3Q2FBTGtQWG5nTGNPd0daMDZOc0UxMnoyIiwiaWF0IjoxNzMzNjc1Mjg5LCJleHAiOjE3MzM2Nzg4ODksImVtYWlsIjoiZW1wZW5lOEBnbWFpbC5jb21hYWFhIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJmaXJlYmFzZSI6eyJpZGVudGl0aWVzIjp7ImVtYWlsIjpbImVtcGVuZThAZ21haWwuY29tYWFhYSJdfSwic2lnbl9pbl9wcm92aWRlciI6InBhc3N3b3JkIn19.NZh8xoGnyu5kyIc7I-_3Na-GcQBDHx-fS3trcVsmAmoXiMOocofILwFsaW3MN8NOxT8sMMdeJI6LS-t0905GFdeiOHBOEKiXQDIQ0JZuEx5_a5FPW4HnU7GQvTm8DHlcwUgsRyc-xptpHcW0OHtaXmnHsh12E-u14Cv9Cw2m6GzWaDU3IkbNQNztQtxAIBUTNHd5CVGy5qDnrnXgP1ZlQvp77074r8H4Or-wCJ0ejSQrbqc2KXP_OrIdUA6H-oFfJsOZeZ0mAjhbXVaN2PHvVr9lasuCYR28PVFUzkARTfVbziRnSISeeCC85ybsi6P-2efDt5BQ62T5PwOGLPuQqQ";
//    // Set cURL options
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//
//    curl_setopt($ch, CURLOPT_HTTPHEADER, [
//        'Content-Type: application/json',
//        'Authorization: Bearer ' . $accessToken
//    ]);
//
//    // Execute cURL request
//    $response = curl_exec($ch);
//
//    // Check for cURL errors
//    if (curl_errno($ch)) {
//        $error_msg = curl_error($ch);
//        curl_close($ch);
//        return ['success' => false, 'message' => "cURL Error: {$error_msg}"];
//    }
//
//    // Get HTTP status code
//    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//    curl_close($ch);
//
//    // Decode JSON response
//    $data = json_decode($response, true);
//
//    // Handle response based on HTTP status code
//    if ($http_status === 200) {
//        return ['success' => true, 'data' => $data];
//    } else {
//        $error_message = isset($data['message']) ? $data['message'] : 'An error occurred while fetching subjects.';
//        return ['success' => false, 'message' => $error_message];
//    }
//}
//
//// Replace these with your actual examId and refreshToken
//$examId = "X2j9hFD6O7RGAER6bn3b";
//$refreshToken = "AMf-vBxRqfDZ3mylSGKeOv4RIMaqem77Y9--EcOOUwOZkFAo8iVye6Kqgy9zgdJfSn7LmxKGvhgMer05Vp8GrNSmIMLxbs0MGcD3W292XCsRsGYyhWXKHfivtpiL1BgP3avYFtSS3cdjpyfv-YnZBekAZ4PbNoXHsjy9n7dTWgi6ehc9PvU6fo-IdubeRzcOt3AKWrLBkjrJL6WxfMe876UEf4_Ha7E29Q";
//
//// Fetch all subjects from the API
// $result = fetch_all_subjects($examId, $refreshToken);
// var_dump($result)
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>All Subjects - My PHP Web App</title>-->
<!--    <link rel="stylesheet" href="styles/styles.css">-->
<!--</head>-->
<!--<body>-->
<!--    <div class="dashboard-container">-->
<!--        <h2>All Subjects</h2>-->
<!--        --><?php //if ($result['success']): ?>
<!--            --><?php //
//                $subjects = $result['data']['subjects'];
//                $user_email = "empenee8@gmail.comaaaa"; // Replace with dynamic user email if needed
//            ?>
<!--            <p>Welcome, --><?php //echo htmlspecialchars($user_email); ?><!--!</p>-->
<!--            <table>-->
<!--                <thead>-->
<!--                    <tr>-->
<!--                        <th>Name</th>-->
<!--                        <th>ID</th>-->
<!--                        <th>Department</th>-->
<!--                        <th>FID</th>-->
<!--                        <th>Date Modified</th>-->
<!--                        <th>Icon</th>-->
<!--                        <th>Status</th>-->
<!--                        <th>Color</th>-->
<!--                    </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                    --><?php //foreach ($subjects as $subject): ?>
<!--                        <tr>-->
<!--                            <td>--><?php //echo htmlspecialchars($subject['name']); ?><!--</td>-->
<!--                            <td>--><?php //echo htmlspecialchars($subject['id']); ?><!--</td>-->
<!--                            <td>--><?php //echo htmlspecialchars($subject['department']); ?><!--</td>-->
<!--                            <td>--><?php //echo htmlspecialchars($subject['fid']); ?><!--</td>-->
<!--                            <td>--><?php //echo htmlspecialchars($subject['date_modified']); ?><!--</td>-->
<!--                            <td>-->
<!--                                <img src="--><?php //echo htmlspecialchars($subject['icon']); ?><!--" alt="--><?php //echo htmlspecialchars($subject['name']); ?><!--" width="50">-->
<!--                            </td>-->
<!--                            <td>--><?php //echo htmlspecialchars($subject['status']); ?><!--</td>-->
<!--                            <td>-->
<!--                                <div style="width: 20px; height: 20px; background-color: --><?php //echo htmlspecialchars($subject['color']); ?>/*; border: 1px solid #000;"></div>*/
/*                            </td>*/
/*                        </tr>*/
/*                    */<?php //endforeach; ?>
<!--                </tbody>-->
<!--            </table>-->
<!--            <a href="dashboard.php" class="button">Back to Dashboard</a>-->
<!--        --><?php //else: ?>
<!--            <p class="error">--><?php //echo htmlspecialchars($result['message']); ?><!--</p>-->
<!--            <a href="dashboard.php" class="button">Back to Dashboard</a>-->
<!--        --><?php //endif; ?>
<!--    </div>-->
<!--</body>-->
<!--</html>-->
