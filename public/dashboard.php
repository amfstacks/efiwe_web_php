<?php
// public/dashboard.php

require_once __DIR__ . '/../functions/auth.php';
require_once __DIR__ . '/../functions/api.php';

require_login();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

// Extract UID and Refresh Token
$uid = isset($user['localId']) ? $user['localId'] : '';
$refreshToken = isset($user['refreshToken']) ? $user['refreshToken'] : '';
$accessToken = isset($user['idToken']) ? $user['idToken'] : '';

// Check if UID is available
if (empty($uid)) {
    echo json_encode([
        "success" => false,
        "message" => "User identifier is missing."
    ]);
    exit();
}

// API Endpoint
//$apiUrl = 'https://fayabase.com/efiwe/api/userDetails';
$queryParams = [
    'uid' => $uid,
    'refreshtoken' => $refreshToken
];
$response = api_request_get('userDetails',$queryParams, 'GET', $accessToken, $refreshToken);
//var_dump($response);
//exit;
////todo save this to constant or include file
////todo note
//// Build the query parameters
//$queryParams = http_build_query([
//    'uid' => $uid,
//    'refreshtoken' => $refreshToken
//]);
////note
//if ($accessToken) {
//    $headers[] = 'Authorization: Bearer ' . $accessToken;
//}
//// Complete URL with query parameters
//$fullUrl = $apiUrl . '?' . $queryParams;
//
//// Initialize cURL
//$ch = curl_init($fullUrl);
//
//// Set cURL options
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response instead of outputting
//curl_setopt($ch, CURLOPT_HTTPHEADER, [
//    'Accept: application/json'
//]);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//// Execute the request
//$response = curl_exec($ch);
//
//// Capture HTTP status code
//$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//
//// Check for cURL errors
//if (curl_errno($ch)) {
//    $error_msg = curl_error($ch);
//    curl_close($ch);
//    echo json_encode([
//        "success" => false,
//        "message" => "cURL Error: {$error_msg}",
//        "http_status" => $http_status
//    ]);
//    exit();
//}
//
//// Close the cURL session
//curl_close($ch);
//
//// Decode the JSON response
//$decodedResponse = json_decode($response, true);
//
//// Check for JSON decode errors
//if (json_last_error() !== JSON_ERROR_NONE) {
//    echo json_encode([
//        "success" => false,
//        "message" => "Invalid JSON response.",
//        "http_status" => $http_status,
//        "raw_response" => $response
//    ]);
//    exit();
//}
//
//// Check API-level success
//if (!$decodedResponse['success']) {
//    echo json_encode([
//        "success" => false,
//        "message" => $decodedResponse['message'],
//        "code" => $decodedResponse['code']
//    ]);
//    exit();
//}

// Extract user data
if ($response['success']) {
    $userData = $response['data'];
    $selectedSubjects = isset($userData['subjectSelect']) ? $userData['subjectSelect'] : [];

// Optional: Store token if needed
    $isNewToken = $response['isNewToken'];
    $newToken = $response['token'];

// Update session with new token if applicable
    if ($isNewToken && !empty($newToken)) {
        $_SESSION['user']['idToken'] = $newToken;
    }
}

// Set page title
$page_title = 'Dashboard';
include __DIR__ . '/../templates/header.php';
?>
<script>
    // Ensure that the selectedSubjects variable is defined before using it
    var mySelectedSubjects = <?php echo json_encode($selectedSubjects); ?>;
</script>
<div class="dashboard-container">
    <h2>Dashboard</h2>
    <p>Welcome, <?php echo htmlspecialchars(isset($userData['firstname']) ? $userData['firstname'] : 'User'); ?>!</p>
    <?php
    if(isset($userData) && !empty($userData)) {

//note

    ?>
    <div class="user-details">
        <h3>Your Details:</h3>
        <ul>
            <li><strong>First Name:</strong> <?php echo htmlspecialchars($userData['firstname']); ?></li>
            <li><strong>Surname:</strong> <?php echo htmlspecialchars($userData['surname']); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></li>
            <li><strong>Date of Birth:</strong> <?php echo htmlspecialchars($userData['dob']); ?></li>
            <li><strong>Phone Number:</strong> <?php echo htmlspecialchars($userData['phoneNumber']); ?></li>
            <li><strong>Class:</strong> <?php echo htmlspecialchars($userData['class']); ?></li>
<!--            <li><strong>Exam:</strong> --><?php //echo htmlspecialchars($userData['exam']); ?><!--</li>-->
            <li><strong>State:</strong> <?php echo htmlspecialchars($userData['state']); ?></li>
            <li><strong>City:</strong> <?php echo htmlspecialchars($userData['city']); ?></li>
            <li><strong>Home Address:</strong> <?php echo htmlspecialchars($userData['homeaddress']); ?></li>
            <li><strong>Subjects Selected:</strong> <?php echo htmlspecialchars(implode(", ", $userData['subjectSelect'])); ?></li>
            <li><strong>Total Points:</strong> <?php echo htmlspecialchars($userData['totalpoints']); ?></li>
            <li><strong>Date Registered:</strong> <?php echo htmlspecialchars($userData['dateRegistered']); ?></li>
            <li><strong>Profile Set:</strong> <?php echo $userData['setProfile'] ? 'Yes' : 'No'; ?></li>
        </ul>
    </div>

        <!-- Section to Display Selected Subjects -->
        <div class="selected-subjects-section">
            <h3>Your Selected Subjects:</h3>
            <div id="my-subjects-grid" class="subjects-grid">
                <!-- Selected subjects will be dynamically inserted here -->
            </div>
        </div>

        <!-- Existing All Subjects Section -->
        <div class="all-subjects-section">
            <h3>All Available Subjects:</h3>
            <div id="subjects-grid" class="subjects-grid">
                <!-- All subjects will be dynamically inserted here -->
            </div>
        </div>
    <?php
    }
   else {
       echo "<a href='profile_setup.php'>fill Biodata</a>";
   }


    ?>
    <div class="dashboard-actions">
        <a href="allsubjects.php" class="button">View All Subjects</a>
        <a href="logout.php" class="button">Logout</a>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Function to convert color codes if needed (assuming convertColor is defined elsewhere)
    function convertColor(colorHex) {
        // Remove '0x' prefix
        let hex = colorHex.replace(/^0x/, '');
        // Ensure it's in RRGGBB format
        if (hex.length === 8) {
            hex = hex.substring(2);
        }
        const bigint = parseInt(hex, 16);
        const r = (bigint >> 16) & 255;
        const g = (bigint >> 8) & 255;
        const b = bigint & 255;
        return `rgb(${r}, ${g}, ${b})`;
    }

    function loadMySubjects() {
        $.ajax({
            url: '../api_ajax/get_subjects.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    const subjects = response.subjects || [];
                    const selectedSubjectIds = mySelectedSubjects || [];
                    const mySubjectsGrid = $('#my-subjects-grid');
                    if (selectedSubjectIds.length === 0) {
                        mySubjectsGrid.append('<p>No subjects selected.</p>');
                    } else {
                        // Iterate through the selectedSubjectIds and find matching subjects
                        selectedSubjectIds.forEach(function(subjectId) {
                            const subject = subjects.find(sub => sub.fid === subjectId);
                            if (subject) {
                                const subjectCard = $(`
                                <div class="subject-card">
                                    <div class="subject-info">
                                        <img src="${subject.icon}" alt="${subject.name}" class="subject-icon">
                                        <p class="subject-name">${subject.name}</p>
                                    </div>
                                </div>
                            `).css('background-color', convertColor(subject.color));

                                // Append the card to the selected subjects grid
                                mySubjectsGrid.append(subjectCard);
                            }
                        });
                    }

                    // Optionally, you can remove or mark the selected subjects from the all subjects grid
                    // to prevent duplication or highlight them as already selected
                    // This part is optional based on your design preference
                } else {
                    alert('Failed to load subjects: ' + response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Failed to load subjects. Please try again later.');
                console.error('AJAX Error:', textStatus, errorThrown);
            }
        });
    }

    $(document).ready(function() {
        // Call loadMySubjects after the page has finished loading
        loadMySubjects();

    });
</script>
<style>
    /* Style for selected subjects in the 'my-subjects-grid' */
    .selected-subjects-section {
        margin-bottom: 30px;
    }

    .selected-subjects-section .subjects-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .selected-subjects-section .subject-card {
        width: 150px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        text-align: center;
        background-color: #f9f9f9; /* Default background color */
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .selected-subjects-section .subject-card .subject-icon {
        width: 50px;
        height: 50px;
    }

    .selected-subjects-section .subject-card .subject-name {
        margin-top: 10px;
        font-weight: bold;
    }

    /* Style for all subjects grid */
    .all-subjects-section .subjects-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .all-subjects-section .subject-card {
        width: 150px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        text-align: center;
        background-color: #f9f9f9; /* Default background color */
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .all-subjects-section .subject-card:hover {
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    }

    .all-subjects-section .subject-card.already-selected {
        background-color: #d3ffd3; /* Light green for already selected subjects */
        cursor: default;
    }

    .all-subjects-section .subject-card.selected {
        border: 2px solid #4CAF50;
        background-color: #a5d6a7; /* Darker green when selected */
    }

    .all-subjects-section .subject-card .subject-icon {
        width: 50px;
        height: 50px;
    }

    .all-subjects-section .subject-card .subject-name {
        margin-top: 10px;
        font-weight: bold;
    }

    /* Optional: Style for error message */
    #subject-error {
        color: red;
        display: none;
        margin-top: 10px;
    }

</style>
<?php include __DIR__ . '/../templates/footer.php'; ?>

<!--//new push -->