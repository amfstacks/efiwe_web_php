<?php
require_once __DIR__ . '/../templates/loggedInc.php';

$currentSubjectId = isset($_SESSION['currentSubjectId']) ? $_SESSION['currentSubjectId'] : null;
$currentSubjectName = isset($_SESSION['currentSubjectName']) ? $_SESSION['currentSubjectName'] : null;

// Ensure the subject is set, otherwise redirect to an error page or show a message
if (!$currentSubjectId || !$currentSubjectName) {
    // Optionally, redirect to a 404 or show an error
    header("Location: index"); // Or any other fallback page
    exit();
}
$currentSubjectName = strtoupper($currentSubjectName);

?>


<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg d-print-none"></div>
        <?php
        include 'includes/navbar.php';
        include 'includes/sidebar.php';
        ?>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-12" id="profilesetup">
                            <div class="card">

                                <div class="padding-20">
                                    <a href="#" class="badge badge-light" id="go-back-btn">Go Back</a>
<!--                                    <button class="btn btn-lg btn-success font-20 mb-2">-->
<!--                                    </button>-->

                                    <form  class="needs-validation" novalidate=""  id="profile-form"   enctype="multipart/form-data" >
                                        <div class="card-header">
                                            <h4 class="btn btn-primary text-white"> <?php echo  $currentSubjectName?></h4>
                                            <hr>
                                        </div>
                                        <div class="card-body">


                                            <div id="topics-container">
                                                <h4>Topics</h4>
                                                <ul id="topics-list">
                                                    <!-- Topics will be dynamically inserted here -->
                                                </ul>
                                            </div>







                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <footer class="main-footer">
            <div class="footer-left">
                kjgvhug
            </div>
            <div class="footer-right">
            </div>
        </footer>    </div>
</div>



<?php
include 'includes/footerjs.php';
?>
<script src="assets/js/lga.min.js"></script>
</body>
<script>
    $(document).ready(function() {
        function loadTopics(subjectId) {
            $('#topics-list').empty(); // Clear previous topics
            $('#topics-container').show(); // Show the topics container
            $.ajax({
                url: '../api_ajax/get_Topics.php', // Use the same API or a specific one for topics
                method: 'GET',
                data: { subjectId: subjectId }, // Pass subjectId to the API
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        const topics = response.topics || [];

                        if (topics.length === 0) {
                            $('#topics-list').append('<li>No topics available for this subject.</li>');
                        } else {
                            // Iterate through topics and display them
                            topics.forEach(topic => {
                                const topicItem = $(`
                                <li class="topic-item">
                                    <a href="${topic.video}" target="_blank">${topic.topic}</a>
                                </li>
                            `);
                                $('#topics-list').append(topicItem);
                            });
                        }
                    } else {
                        alert('Failed to load topics: ' + response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Failed to load topics. Please try again later.');
                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });
        }

        // loadTopics();
    });
</script>
<script>

    // tryc('success', 'Welcome '+user  );




</script>
<style>
    .profile-setup-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .subjects-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .subject-card {
        width: 150px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .subject-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .subject-card.selected {
        /*border: 2px solid #000;*/
    }

    .subject-icon {
        width: 50px;
        height: 50px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    .error-message {
        color: red;
        font-size: 0.9em;
    }

    .success-message {
        color: green;
        font-size: 1em;
        margin-top: 15px;
    }

    button {
        padding: 10px 20px;
        font-size: 1em;
    }
</style>
</html>