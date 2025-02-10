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
                                    <a href="#" class="badge badge-light mb-4" id="go-back-btn">Go Back</a>
<!--                                    <button class="btn btn-lg btn-success font-20 mb-2">-->
<!--                                    </button>-->

                                    <form  class="needs-validation" novalidate=""  id="profile-form"   enctype="multipart/form-data" >
                                        <div class="card-header">
                                            <h4 class="btn btn-primary text-white"> <?php echo  $currentSubjectName?></h4>
                                            <hr>
                                        </div>
                                        <div class="card-body">


                                            <div id="topics-container">
                                                <h5>Topics</h5>
                                                <ul id="topics-list" class="list-group">
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
    function saveTopicData(topic) {
        // alert('saved');
        // Save the entire topic object to localStorage
        localStorage.setItem('currentTopic', JSON.stringify(topic));
    }
    $(document).ready(function() {
        function loadTopics(subjectId) {
            $('#topics-list').empty(); // Clear previous topics
            const skeletonLoader = $(`
            <div class="askeleton-loader topic-item"></div>
            <div class="askeleton-loader topic-item"></div>
            <div class="askeleton-loader topic-item"></div>
            <div class="askeleton-loader topic-item"></div>
        `);
            $('#topics-list').append(skeletonLoader);
            $('#topics-container').show(); // Show the topics container
            $.ajax({
                url: '../api_ajax/get_Topics.php', // Use the same API or a specific one for topics
                method: 'GET',
                data: { subjectId: subjectId }, // Pass subjectId to the API
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        const topics = response.topics || [];
                        $('#topics-list').empty();
                        if (topics.length === 0) {
                            $('#topics-list').append('<li>No topics available for this subject.</li>');
                        } else {
                            // Iterate through topics and display them
                            topics.forEach(topic => {
                                const topicItem = $(`
                                <li class="topic-item list-group-item col-lg-6">
<!--                                    <a href="${topic.video}" target="_blank">${topic.topic}</a>-->
                                    <a href="topicDetails"  onclick="saveTopicData('${encodeURIComponent(JSON.stringify(topic))}')" >${topic.topic}</a>
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

        loadTopics();
    });
</script>
<script>

    // tryc('success', 'Welcome '+user  );




</script>
<style>
    .askeleton-loader {
        width: 100%;
        height: 50px; /* Adjust based on your actual list item height */
        background: #e0e0e0;
        margin: 10px 0;
        border-radius: 4px;
        position: relative;
        overflow: hidden;
    }

    .askeleton-loader::after {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(200, 200, 200, 0.8) 50%, rgba(255, 255, 255, 0) 100%);
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% {
            left: -100%;
        }
        100% {
            left: 100%;
        }
    }
</style>
</html>