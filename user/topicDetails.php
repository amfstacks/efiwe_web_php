<?php
require_once __DIR__ . '/../templates/loggedInc.php';

$currentSubjectId = isset($_SESSION['currentSubjectId']) ? $_SESSION['currentSubjectId'] : null;
$currentSubjectName = isset($_SESSION['currentSubjectName']) ? $_SESSION['currentSubjectName'] : null;
//echo $currentSubjectId;
//exit;
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

                                            <h5 id="topicName"><small>loading ...</small></h5>


                                            <div id="topics-container" class="mt-3"">
<!--                                                <h5>Topics Name</h5>-->
                                            <p>Document Link: <span id="docLink"></span></p>

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
<h6>Video Link</h6>
                                                                <div id="youtube-placeholder" style="width: 100%; height: 400px; background-color: #e0e0e0; text-align: center; line-height: 400px;">
                                                                    <span>Loading video...</span>
                                                                </div>
                                                                <span id="videoLink"></span>
                                                            </div>
                                                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">

                                                                <div id="pdf-viewer" style="width: 100%; height: 600px; border: 1px solid #ccc;">
                                                                    <div id="pdf-placeholder" style="width: 100%; height: 100%; background-color: #e0e0e0; text-align: center; line-height: 600px;">
                                                                        <span>Loading PDF...</span>
                                                                    </div>
                                                                    <iframe
                                                                            id="pdf-iframe"
                                                                            src=""
                                                                            width="100%"
                                                                            height="100%"
                                                                            style="border: none; display: none;"
                                                                            allow="autoplay"
                                                                    ></iframe>
                                                                </div>
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
</body>
<script>
var subjectId = "<?php echo $currentSubjectId ?>";  //BRUici1R3kf9w4OhTkTT BRUici1R3kf9w4OhTkTT_K3wOskJhlIgeFeO7aC39
var topicId = ''; //K3wOskJhlIgeFeO7aC39

    function initializePage() {
        const topicData = getTopicDataFromLocalStorage();
        if (topicData) {
            displayTopicDetails(topicData);
            lazyLoadYouTubeVideo(topicData.video);
            embedPDFViewer(topicData.doc);
        } else {
            tryc('Error', 'Error','No topic data found.');
            console.error("No topic data found.");
        }
    }

    function displayTopicDetails(topicData) {
        document.getElementById('topicName').innerText = topicData.topic;
        document.getElementById('videoLink').innerText = topicData.video;
        document.getElementById('docLink').innerText = topicData.doc;
        topicId = topicData.id;
    }

    function lazyLoadYouTubeVideo(videoLink) {
        const videoId = extractYouTubeVideoId(videoLink);
        if (videoId) {
            const placeholder = document.getElementById('youtube-placeholder');
            setTimeout(() => {
                const iframe = document.createElement('iframe');
                iframe.width = "100%";
                iframe.height = "400";
                iframe.src = `https://www.youtube.com/embed/${videoId}`;
                iframe.frameborder = "0";
                iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
                iframe.allowfullscreen = true;
                iframe.loading = "lazy";

                placeholder.innerHTML = '';
                placeholder.appendChild(iframe);
            }, 1000); // Delay loading by 1 second
        } else {
            console.error("Invalid YouTube video link.");
        }
    }

    // Function to get topic data from localStorage
    function getTopicDataFromLocalStorage() {
        try {
            const encodedTopicData = localStorage.getItem('currentTopic');
            return JSON.parse(decodeURIComponent(encodedTopicData));
        } catch (error) {
            console.error("Error parsing topic data:", error);
            return null;
        }
    }

    // Function to embed YouTube video (lazy-loaded)

    // Function to extract YouTube video ID
    function extractYouTubeVideoId(url) {
        const regex = /(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=))([a-zA-Z0-9_-]{11})(?:[^\w&\?=]*|$)|(?:https?:\/\/(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]{11}))/;
        const match = url.match(regex);
        return match ? match[1] || match[2] : null;
    }

    function embedPDFViewer(docLink) {
        // const pdfViewerContainer = document.getElementById('pdf-viewer');
        const pdfViewerContainer = document.getElementById('pdf-iframe');
        const pdfPlaceholder = document.getElementById('pdf-placeholder');
        docLink =   convertToPreviewLink(docLink);
        // pdfViewerContainer.src(docLink)
        pdfViewerContainer.src = docLink;

        setTimeout(() => {
            pdfViewerContainer.src = docLink; // Set the iframe src
            pdfViewerContainer.style.display = 'block'; // Show the iframe
            pdfPlaceholder.style.display = 'none';

        }, 10000);
        return;
    }

    $(document).ready(function() {
        setTimeout(() => {
            initializePage();

        }, 3000);


    });
    function convertToPreviewLink(downloadLink) {
        // Extract the file ID from the download link
        const fileIdMatch = downloadLink.match(/[&?]id=([^&]+)/);
        if (fileIdMatch && fileIdMatch[1]) {
            const fileId = fileIdMatch[1];
            // Construct the preview link
            return `https://drive.google.com/file/d/${fileId}/preview`;
        } else {
            console.error("Invalid Google Drive download link.");
            return null;
        }
    }
    // document.addEventListener('DOMContentLoaded', initializePage);
</script>
<script>



</script>

</html>