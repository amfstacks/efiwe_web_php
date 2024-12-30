<?php
// public/allsubjects.php

// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include necessary functions
require_once __DIR__ . '/../functions/auth.php';
require_once __DIR__ . '/../functions/api.php';

// Ensure the user is logged in
require_login();

// Retrieve user data from the session
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

// Extract user email for display
$user_email = isset($user['email']) ? $user['email'] : 'User';

$page_title = 'All Subjects';
include __DIR__ . '/../templates/header.php';
?>

<div class="dashboard-container">
    <h2>All Subjects</h2>
    <p>Welcome, <?php echo htmlspecialchars($user_email); ?>!</p>

    <!-- Loading Indicator -->
    <div id="loading" style="display: none;">
        <p>Loading subjects...</p>
    </div>

    <!-- Error Message Container -->
    <div id="error-message" class="error" style="display: none;">
        <p></p>
    </div>

    <!-- Subjects Table -->
    <table id="subjects-table">
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
        <!-- Subjects will be dynamically inserted here -->
        </tbody>
    </table>

    <a href="dashboard.php" class="button">Back to Dashboard</a>
</div>

<!-- Include jQuery via CDN -->
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"-->
<!--        integrity="sha256-/xUj+3OJ8QKnGxJ6F+GBUzwbfhNvNijPzkHJRZxYjv4="-->
<!--        crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        // alert('a');
        // Function to fetch and display subjects
        function loadSubjects() {
            // Show the loading indicator
            $('#loading').show();
            $('#error-message').hide();
            $('#subjects-table tbody').empty();

            $.ajax({
                url: '../api_ajax/get_subjects.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Hide the loading indicator
                    $('#loading').hide();
                    console.log(response.code);
                    if (response.success) {
                        var subjects = response.subjects || [];


                        if (subjects.length === 0) {
                            $('#subjects-table tbody').append('<tr><td colspan="8">No subjects found.</td></tr>');
                            return;
                        }

                        // Iterate through subjects and append to the table
                        $.each(subjects, function(index, subject) {
                            var iconHtml = subject.icon ? '<img src="' + subject.icon + '" alt="' + (subject.name || 'Icon') + '" width="50">' : 'N/A';
                            var colorHtml = subject.color ? '<div style="width: 20px; height: 20px; background-color: ' + subject.color + '; border: 1px solid #000;"></div>' : 'N/A';

                            var row = '<tr>' +
                                '<td>' + htmlspecialchars(subject.name || 'N/A') + '</td>' +
                                '<td>' + htmlspecialchars(subject.id || 'N/A') + '</td>' +
                                '<td>' + htmlspecialchars(subject.department || 'N/A') + '</td>' +
                                '<td>' + htmlspecialchars(subject.fid || 'N/A') + '</td>' +
                                '<td>' + htmlspecialchars(subject.date_modified || 'N/A') + '</td>' +
                                '<td>' + iconHtml + '</td>' +
                                '<td>' + htmlspecialchars(subject.status || 'N/A') + '</td>' +
                                '<td>' + colorHtml + '</td>' +
                                '</tr>';

                            $('#subjects-table tbody').append(row);
                        });
                    } else {
                        // Display error message from the response
                        $('#error-message p').text(response.message || 'An error occurred.');
                        $('#error-message').show();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Hide the loading indicator
                    $('#loading').hide();

                    // Display a generic error message
                    $('#error-message p').text('Failed to load subjects. Please try again later.');
                    $('#error-message').show();

                    // Optional: Log the error details for debugging
                    // console.error('AJAX Error:', textStatus, errorThrown);
                }
            });
        }

        // Function to escape HTML special characters to prevent XSS
        function htmlspecialchars(text) {
            return $('<div>').text(text).html();
        }

        // Load subjects on page load
        loadSubjects();
    });
</script>

<?php include __DIR__ . '/../templates/footer.php'; ?>
