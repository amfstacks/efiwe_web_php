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
<!--                                            <iframe-->
<!--                                                    src="https://drive.google.com/file/d/1aff0BbNCVoRNKaOsl_ggkKGbs4xu7mEm/preview"-->
<!--                                                    width="100%"-->
<!--                                                    height="600px"-->
<!--                                                    style="border: none;"-->
<!--                                                    allow="autoplay"-->
<!--                                            ></iframe>-->
                                            <h5 id="topicName">Topic Details</h5>
                                            <p>Topic ID: <span id="topicId"></span></p>
                                            <p>Topic Name: <span id="topicName"></span></p>
<!--                                            <p>Video Link: <span id="videoLink"></span></p>-->
                                            <p>Document Link: <span id="docLink"></span></p>

                                            <p>Document Link: <span id="docLink"></span></p>
                                            <div id="pdf-viewer" style="width: 100%; height: 600px; border: 1px solid #ccc;"></div>

                                            <!-- Placeholder for the PDF viewer -->
                                            <div id="pdf-placeholder" style="width: 100%; height: 400px; background-color: #e0e0e0; text-align: center; line-height: 400px;">
                                                <span>Loading PDF...</span>
                                            </div>
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
<h6>Video Link</h6>
                                                                <div id="youtube-placeholder" style="width: 100%; height: 400px; background-color: #e0e0e0; text-align: center; line-height: 400px;">
                                                                    <span>Loading video...</span>
                                                                </div>
                                                                <span id="videoLink"></span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js" integrity="sha512-ml/QKfG3+Yes6TwOzQb7aCNtJF4PUyha6R3w8pSTo/VJSywl7ZreYvvtUso7fKevpsI+pYVVwnu82YO0q3V6eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js" integrity="sha512-OuQv2WCzY1YTE7Xw2TZzI1zVzWQvzZ5e6/QvJ6wF+FLpL/9kdt2Pz0+0q6v1q4QvQZ5nT6JN3Z5l5z5z5z5z5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    // function getDetails(){
    //     try
    //     {
    //         const encodedTopicData = localStorage.getItem('currentTopic');
    //         const topicData = JSON.parse(decodeURIComponent(encodedTopicData));
    //
    //         if (topicData) {
    //             // console.log(topicData);
    //             // alert(topicData.video);
    //             const topicName = topicData.topic;
    //             const videoLink = topicData.video;
    //             const docLink = topicData.doc;
    //             const description = topicData.description;
    //             document.getElementById('topicName').innerText = topicName;
    //             document.getElementById('videoLink').innerText = videoLink;
    //             document.getElementById('docLink').innerText = docLink;
    //             document.getElementById('description').innerText = description;
    //             // alert(`Topic: ${topicName}\nVideo: ${videoLink}\nDoc: ${docLink}`);
    //
    //             if (videoLink) {
    //                 embedYouTubeVideo(videoLink);
    //             } else {
    //                 console.log("No video link found.");
    //             }
    //             if (docLink) {
    //                 embedPDFViewer(docLink);
    //             } else {
    //                 console.log("No document link found.");
    //             }
    //         } else {
    //             console.log("No topic data found in localStorage.");
    //         }
    //     }
    //     catch (e){
    //         tryc('Error', 'Error', 'Could not get topic\'s details')
    //     }
    //
    // }
    //
    // //pdf
    // function embedPDFViewer(docLink) {
    //     // If a valid docLink is found
    //     if (docLink) {
    //         const iframe = document.createElement('iframe');
    //         iframe.width = "100%";
    //         iframe.height = "600"; // Adjust the height as needed
    //         iframe.src = docLink;  // Directly use the PDF link
    //         iframe.frameborder = "0";
    //         iframe.style.border = "none";
    //
    //         // Hide the placeholder and insert the iframe
    //         document.getElementById('pdf-placeholder').style.display = 'none';
    //         document.getElementById('docLink').appendChild(iframe);
    //     }  else {
    //         console.log("No document link found.");
    //     }
    // }
    //
    // //youtube
    // function embedYouTubeVideo(videoLink) {
    //     // Extract the YouTube video ID from the URL
    //     const videoId = extractYouTubeVideoId(videoLink);
    //
    //     // If a valid video ID is found
    //     if (videoId) {
    //         const iframe = document.createElement('iframe');
    //         iframe.width = "100%";
    //         iframe.height = "400";
    //         iframe.src = `https://www.youtube.com/embed/${videoId}`;
    //         iframe.frameborder = "0";
    //         iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
    //         iframe.allowfullscreen = true;
    //         iframe.loading = "lazy";
    //
    //         document.getElementById('videoLink').innerHTML = '';
    //         document.getElementById('youtube-placeholder').style.display = 'none';
    //         document.getElementById('videoLink').appendChild(iframe);
    //     } else {
    //         console.log("Invalid YouTube video link.");
    //     }
    // }
    // function extractYouTubeVideoId(url) {
    //     const regex = /(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=))([a-zA-Z0-9_-]{11})(?:[^\w&\?=]*|$)|(?:https?:\/\/(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]{11}))/;
    //     const match = url.match(regex);
    //     return match ? match[1] || match[2] : null;
    // }
    // getDetails();


    function getDetails() {
        try {
            const encodedTopicData = localStorage.getItem('currentTopic');
            const topicData = JSON.parse(decodeURIComponent(encodedTopicData));

            if (topicData) {
                const topicName = topicData.topic;
                const videoLink = topicData.video;
                const docLink = topicData.doc;
                const description = topicData.description;

                // Display topic details
                document.getElementById('topicName').innerText = topicName;
                document.getElementById('videoLink').innerText = videoLink;
                document.getElementById('docLink').innerText = docLink;
                document.getElementById('description').innerText = description;

                // Lazy-load YouTube video
                if (videoLink) {
                    embedYouTubeVideo(videoLink);
                } else {
                    console.log("No video link found.");
                }

                // Display PDF URL and embed PDF viewer
                if (docLink) {
                    // embedPDFViewer(docLink);
                } else {
                    console.log("No document link found.");
                }
            } else {
                console.log("No topic data found in localStorage.");
            }
        } catch (e) {
            console.error('Error:', e);
        }
    }

    // Function to embed YouTube video (lazy-loaded)
    function embedYouTubeVideo(videoLink) {
        const videoId = extractYouTubeVideoId(videoLink);

        if (videoId) {
            const placeholder = document.getElementById('youtube-placeholder');
            placeholder.innerHTML = '<span>Loading video...</span>';

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
            }, 1000); // Adjust the delay as needed
        } else {
            console.log("Invalid YouTube video link.");
        }
    }

    // Function to extract YouTube video ID
    function extractYouTubeVideoId(url) {
        const regex = /(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=))([a-zA-Z0-9_-]{11})(?:[^\w&\?=]*|$)|(?:https?:\/\/(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]{11}))/;
        const match = url.match(regex);
        return match ? match[1] || match[2] : null;
    }

    // Function to display PDF URL and embed PDF viewer
    // function embedPDFViewer(docLink) {
    //     const pdfPlaceholder = document.getElementById('pdf-placeholder');
    //     const docLinkElement = document.getElementById('docLink');
    //
    //     if (docLink) {
    //         // Display the PDF URL as a clickable link
    //         docLinkElement.innerHTML = `<a href="${docLink}" target="_blank">${docLink}</a>`;
    //
    //         // Optionally, embed the PDF using Google Docs Viewer
    //         const iframe = document.createElement('iframe');
    //         iframe.width = "100%";
    //         iframe.height = "600";
    //         iframe.src = `https://docs.google.com/viewer?url=${encodeURIComponent(docLink)}&embedded=true`;
    //         iframe.frameborder = "0";
    //         iframe.style.border = "none";
    //
    //         pdfPlaceholder.style.display = 'none';
    //         pdfPlaceholder.appendChild(iframe);
    //     } else {
    //         console.log("No document link found.");
    //     }
    // }
    function embedPDFViewerb(docLink) {
        const pdfViewerContainer = document.getElementById('pdf-viewer');

        if (docLink) {
            // Initialize PDF.js
            pdfjsLib.getDocument(docLink).promise.then(pdfDoc => {
                console.log("PDF loaded successfully.");

                // Render the first page
                pdfDoc.getPage(1).then(page => {
                    const scale = 1.5; // Adjust the scale as needed
                    const viewport = page.getViewport({ scale });

                    // Create a canvas element to render the PDF page
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Append the canvas to the container
                    pdfViewerContainer.innerHTML = ''; // Clear any previous content
                    pdfViewerContainer.appendChild(canvas);

                    // Render the PDF page into the canvas
                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport,
                    };
                    page.render(renderContext);
                });
            }).catch(error => {
                console.error("Error loading PDF:", error);
                pdfViewerContainer.innerHTML = '<p>Failed to load PDF. Please check the link.</p>';
            });
        } else {
            console.log("No document link found.");
            pdfViewerContainer.innerHTML = '<p>No PDF document available.</p>';
        }
    }
    function embedPDFViewer(docLink) {
        const pdfViewerContainer = document.getElementById('pdf-viewer');

        if (docLink) {
            // Initialize PDF.js
            pdfjsLib.getDocument(docLink).promise.then(pdfDoc => {
                console.log("PDF loaded successfully.");

                // Render the first page
                pdfDoc.getPage(1).then(page => {
                    const scale = 1.5; // Adjust the scale as needed
                    const viewport = page.getViewport({ scale });

                    // Create a canvas element to render the PDF page
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Append the canvas to the container
                    pdfViewerContainer.innerHTML = ''; // Clear any previous content
                    pdfViewerContainer.appendChild(canvas);

                    // Render the PDF page into the canvas
                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport,
                    };
                    page.render(renderContext);
                });
            }).catch(error => {
                console.error("Error loading PDF:", error);
                pdfViewerContainer.innerHTML = '<p>Failed to load PDF. Please check the link.</p>';
            });
        } else {
            console.log("No document link found.");
            pdfViewerContainer.innerHTML = '<p>No PDF document available.</p>';
        }
    }
    const pdfUrl = "https://drive.google.com/file/d/1aff0BbNCVoRNKaOsl_ggkKGbs4xu7mEm/preview"; // Use the preview link
    embedPDFViewer(pdfUrl);
    // Call getDetails on page load
    getDetails();
    $(document).ready(function() {

    });
</script>
<script>

    // tryc('success', 'Welcome '+user  );




</script>

</html>