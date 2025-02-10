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

                                            <h1>Topic Details</h1>
                                            <p>Topic ID: <span id="topicId"></span></p>
                                            <p>Topic Name: <span id="topicName"></span></p>
                                            <p>Video Link: <span id="videoLink"></span></p>
                                            <p>Document Link: <span id="docLink"></span></p>
                                            <p>Description: <span id="description"></span></p>

                                            <div id="topics-container" class="mt-3"">
                                                <h5>Topics Name</h5>

                                            </div>

                                            <div class="col-12 col-sm-12 col-lg-12 no-padding-left-right mt-3">
                                                <div class="carda">

                                                    <div class="card-boday">
                                                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                                                                   aria-controls="home" aria-selected="true">&nbsp; Video &nbsp; </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                                                                   aria-controls="profile" aria-selected="false">Pdf File</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab"
                                                                   aria-controls="contact" aria-selected="false">Active Recalls</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent2">
                                                            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                cillum dolore eu fugiat nulla pariatur.
                                                            </div>
                                                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                                                Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis
                                                                quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus.
                                                                Etiam ac vehicula eros, pharetra consectetur dui.
                                                            </div>
                                                            <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                                                Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa,
                                                                gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum
                                                                molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    const topicData = JSON.parse(localStorage.getItem('currentTopic'));
    console.log(localStorage.getItem('currentTopic'));
    if (topicData) {
        const topicName = topicData.topic;
        const videoLink = topicData.video;
        const docLink = topicData.doc;
        const description = topicData.description;

        // Display the data on the page
        document.getElementById('topicName').innerText = topicName;
        document.getElementById('videoLink').innerText = videoLink;
        document.getElementById('docLink').innerText = docLink;
        document.getElementById('description').innerText = description;
    } else {
        console.log("No topic data found in localStorage.");
    }

    $(document).ready(function() {

    });
</script>
<script>

    // tryc('success', 'Welcome '+user  );




</script>

</html>