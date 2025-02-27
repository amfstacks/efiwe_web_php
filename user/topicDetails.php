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

<style>
    .main-content{
        /*padding-left: 15px !important;*/
        /*padding-top: 15px !important;*/
    }
    .question-container {
        max-width: 800px;
        margin: 1px auto;
        padding: 40px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        text-align: center;
    }

    .question-container h5 {
        background-color: #0066cc;
        color: #fff;
        padding: 15px;
        border-radius: 8px;
        /*margin: 20px auto;*/
        display: block;
        width: auto;
    }

    .options-list {
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }

    .options-list li {
        margin: 10px 0;
    }

    .options-list label {
        display: block;
        background-color: #f4f4f9;
        border: 2px solid #ccc;
        border-radius: 6px;
        padding: 15px;
        cursor: pointer;
        transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
        text-align: left;
    }

    .options-list label:hover {
        background-color: #cdd3d8;
        color: #fff;
        border-color: #cdd3d8;
    }

    .options-list input[type="radio"] {
        display: none; /* Hide checkboxes */
    }

    .options-list input[type="radio"]:checked + label {
        background-color: #6777ef;
        color: #fff;
        border-color: #6777ef;
        text-align: left;
    }

    .explanation {
        margin-top: 20px;
        font-size: 14px;
        color: #666;
    }

    .explanation strong {
        color: #333;
    }

    .options-list label.selected {
        background-color: #6777ef;
        color: #fff;
        border-color: #6777ef;
    }
    .navigation-numbers {
        text-align: center;
        margin-top: 20px;
    }

    .navigation-numbers button {
        margin: 3px;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f4f4f9;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .navigation-numbers button:hover {
        background-color: #cdd3d8;
    }

    .navigation-numbers button.active {
        background-color: #6777ef;
        color: #fff;
        border-color: #6777ef;
    }
    .navigation-numbers button.answered {
        background-color: #6777ef;
        color: #fff;
        border-color: #6777ef;
    }

    /* Remove highlighting for unselected options */
    .options-list label.selected {
        background-color: #6777ef;
        color: #fff;
        border-color: #6777ef;
    }

    .options-list label:not(.selected) {
        background-color: #f4f4f9;
        color: inherit;
        border-color: #ccc;
    }
    #go-back-btn {
        /*display: block;      !* Makes the <a> element a block-level element *!*/
        /*width: 100%;         !* Makes it occupy the full width of the container *!*/
        /*text-align: center;  !* Centers the text within the <a> element *!*/
    }
</style>
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
<!--                                            <p>Document Link: <span id="docLink"></span></p>-->

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
                                                                <div class="my-5">
                                                                    <div id="instruction">
                                                                        <div class="alert alert-light col-lg-8 mb-3">
                                                                            You can take the active recalls as many times as possible!
                                                                        </div>

                                                                        <button  class="btn btn-outline-primary" id="loadQuestionButton" onclick="loadActiveQuestions()" type="button">Click to load Active Recalls</button>
                                                                       <br> <i class="fas fa-spinner fa-spin font-30 mb-3 mt-4 " id="loader" style="display: none; maargin: auto !important;"></i>
                                                                    </div>

                                                                    <div id="spacedData" style="display: none">
                                                                        <center> <div class="progress mb-3 col-lg-6 p-l-5" data-height="10" style="height: 10px;">
                                                                                <div  id="progress-bar" class="progress-bar" role="progressbar" data-width="0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
                                                                            </div>
                                                                        </center>
                                                                    <center>   <div class="timer-container">
                                                                            <span id="timer" class="btn  btn-primary btn-lg font-15">60</span> seconds remaining
                                                                        </div>
                                                                    </center>
                                                                    <div class="container quiz-container">
                                                                        <div id="questionSlides">
                                                                            <!-- Questions will be dynamically inserted here -->
                                                                        </div>



                                                                        <!-- Feedback Modal -->

                                                                    </div>



                                                                </div>
                                                                </div>

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

<div class="modal fade" id="feedbackModal" >
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-body">
                <h3 id="feedbackMessage"></h3>
                <br>
                <p id="explanation"></p>
                <!--            <button  class="btn btn-success btn-lg w-100">Continue</button>-->
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary btn-lg  w-100 font-15" id="closeModalBtn" >Continue <i class="fas fa-check-circle"></i> </button>



            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="completeModal" >
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-body">
                <h3 id="completeFeedbackMessage"> </h3>
                <br>
                <h3 class="font-light mb-0" id="score_data">

                </h3>
                <br>
<span id="completedRemark"> </span>
                <p id="explanationa">
                    NOTE  <br>
                <h4>   You can take <b>Active Recalls</b> multiple times! </h4>
                </p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary btn-lg  w-100 font-15" id="completeCloseModalBtn" >Finish <i class="fas fa-check-circle"></i> </button>



            </div>
        </div>
    </div>
</div>

</div>



<?php
include 'includes/footerjs.php';
//include '../scripts/general.js';
?>
</body>
<script src="../scripts/general.js" ></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script>
var subjectId = "<?php echo $currentSubjectId ?>";  //BRUici1R3kf9w4OhTkTT BRUici1R3kf9w4OhTkTT_K3wOskJhlIgeFeO7aC39
var topicId = '';


let currentIndex = 0;
let timer;
let timeRemaining = 60;
let timeRemainingRefresh = 60;
let isAnswered = false;
let questions = [];
let correctlyAnswer = 0;
let hasPlayed = false;


    function initializePage() {
        const topicData = getTopicDataFromLocalStorage();
        if (topicData) {
            displayTopicDetails(topicData);
            setTimeout(() => {
                // lazyLoadYouTubeVideo(topicData.video);
                onYouTubeIframeAPIReady(topicData.video);
                embedPDFViewer(topicData.doc);
            },100)
        } else {
            tryc('Error', 'Error','No topic data found.');
            console.error("No topic data found.");
        }
    }

    function displayTopicDetails(topicData) {
        document.getElementById('topicName').innerText = topicData.topic;
        document.getElementById('videoLink').innerText = topicData.video;
        // document.getElementById('docLink').innerText = topicData.doc;
        topicId = topicData.id;
    }
let player;
    function lazyLoadYouTubeVideo_(videoLink) {
        const videoId = extractYouTubeVideoId(videoLink);
        if (videoId) {
            const placeholder = document.getElementById('youtube-placeholder');
            setTimeout(() => {
                const iframe = document.createElement('iframe');
                iframe.width = "100%";
                iframe.height = "400";
                iframe.src = `https://www.youtube.com/embed/${videoId}?enablejsapi=1`;
                iframe.frameborder = "0";
                iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
                iframe.allowfullscreen = true;
                iframe.loading = "lazy";

                placeholder.innerHTML = '';
                placeholder.appendChild(iframe);
                // onYouTubeIframeAPIReady(videoId);
            }, 1000); // Delay loading by 1 second
        } else {
            console.error("Invalid YouTube video link.");
        }
    }
function lazyLoadYouTubeVideo(videoLink) {
    const videoId = extractYouTubeVideoId(videoLink);
    if (videoId) {
        const placeholder = document.getElementById('youtube-placeholder');
        setTimeout(() => {
            const playerDiv = document.createElement('div');
            playerDiv.id = 'youtube-player';
            placeholder.innerHTML = '';
            placeholder.appendChild(playerDiv);

            new YT.Player('youtube-player', {
                height: '400',
                width: '100%',
                videoId: videoId,
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }, 1000); // Delay loading by 1 second
    } else {
        console.error("Invalid YouTube video link.");
    }
}

function onYouTubeIframeAPIReady(videoId) {
    lazyLoadYouTubeVideo(videoId);
}
function onPlayerReady(event) {
}
function onPlayerStateChange(event) {
    // Check if the video is playing
    if(!hasPlayed) {
        if (event.data === YT.PlayerState.PLAYING) {

            hasPlayed = true;
            processDailyTask(topicId,'topic','video');

        }
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
        const pdfPlaceholder = document.getElementById('pdf-placeholder');
        if(docLink == ''){
            pdf-placeholder.html('Pdf not available');
            return;
        }
        // const pdfViewerContainer = document.getElementById('pdf-viewer');
        const pdfViewerContainer = document.getElementById('pdf-iframe');

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



function loadActiveQuestions() {

    if(subjectId == '' || topicId == ''){
        tryc('error', 'Error with topic data, Please try again in few seconds');
        return;
    }


    $('#loader').show();
    let subtop = subjectId+'_'+topicId;

// alert(topicId);

    $('#errorAjaxDisplay').hide();
    $('#loadQuestionButton').prop('disabled', true);
    resetActiveRecall();
    // return;
    $.ajax({
        url: `../api_ajax/get_active_recalls_Questions.php`, // Your API URL
        method: 'GET',
        data:{subTop:subtop},
        success: function (response) {
            $('#loader').hide();
            $('#loadQuestionButton').prop('disabled', false);

            if (response.success && response.data) {
                if(Array.isArray(response.data) && response.data.length > 1) {
                    questions = response.data;
                    loadQuestions();
                    startTimer();
                    $('#instruction').hide();
                    $('#spacedData').show();
                    enterFullScreen();
                    processDailyTask(topicId,'topic','ar');
                }
                else {
                    $('#loadQuestionButton').prop('disabled', false);

                    $('#spacedInstruction').show();
                    $('.start-exam').removeClass('btn-progress');
                    tryc('error','Error','Questions not found', 'bottomCenter');
                    $('#errorAjaxDisplay').text('Questions not found').show();


                }
            } else {
                $('#loader').hide();
                $('#loadQuestionButton').prop('disabled', false);

                tryc('error','Error',response.message, 'bottomCenter');
                $('#spacedInstruction').show();
                $('.start-exam').removeClass('btn-progress');
                $('#errorAjaxDisplay').text(response.message).show();
            }
        },
        error: function (err) {
            $('#loader').hide();
            $('#loadQuestionButton').prop('disabled', false);

            console.error('API request failed:', err);
            // alert("Failed to load questions.");
            $('#spacedInstruction').show();
            $('.start-exam').removeClass('btn-progress');
            $('#errorAjaxDisplay').text(err).show();
        }
    });
}

function enterFullScreen() {
    if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen().catch((err) => {
            console.error("Failed to enter full-screen mode:", err);
        });
    } else if (document.documentElement.mozRequestFullScreen) { // Firefox
        document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) { // Chrome, Safari, and Opera
        document.documentElement.webkitRequestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) { // IE/Edge
        document.documentElement.msRequestFullscreen();
    }
}
function loadQuestions() {
    const questionSlides = $('#questionSlides');
    questions.forEach((question, index) => {
        const slide = $(`
                <div class="question question-container no-padding-left-right" id="question${index}" style="display: block">
                    <div class="question">

                        <h5 class="bg-dark-gray">${question.text}</h5>
                        <div class="options options-list">
                            ${question.options.map((option, i) => `
 <li>
                        <input type="radio" name="question_${index}" value="${i}" id="question_${index}_option_${i}" onclick="selectAnswer('${question.answer}', '${i}', ${index},${question.consecutiveCorrectAttempts})" data-answer="${i}" data-question-id="${question.questionid}" data-w="${question.answer}" class="option" />
                        <label for="question_${index}_option_${i}" class="p-x-3i">${option}</label>
                    </li>
<!--                                <button class="option-btn btn" onclick="selectAnswer('${question.answer}', '${i}', ${index},${question.consecutiveCorrectAttempts})">${option}</button><br>-->
                            `).join('')}
                        </div>
                    </div>
                </div>
            `);
        questionSlides.append(slide);
    });
    showQuestion(currentIndex);
}

// Show the current question
function showQuestion(index) {
    $(".question-container").hide(); // Hide all questions
    $(`#question${index}`).show(); // Show the current question
}




// Handle answer selection
let modal; // Declare modal outside of any function to maintain its reference
let completeModal; // Declare modal outside of any function to maintain its reference

// Initialize the Bootstrap modal only once
const modalElement = document.getElementById('feedbackModal');
modal = new bootstrap.Modal(modalElement, {
    backdrop: 'static',  // Prevent modal from closing when clicking outside
    keyboard: false      // Prevent modal from closing when pressing ESC key
});// Initialize the Bootstrap modal only once
const completeModalElement = document.getElementById('completeModal');
completeModal = new bootstrap.Modal(completeModalElement, {
    backdrop: 'static',  // Prevent modal from closing when clicking outside
    keyboard: false      // Prevent modal from closing when pressing ESC key
});
function selectAnswer(correctAnswer, selectedAnswer, index,consecutiveCorrectAttempts = 0) {
    if (isAnswered){
tryc('warning','no multiple entries');
        return; // Prevent multiple answers for the same question
    }

    isAnswered = true;
    const feedbackMessage = $('#feedbackMessage');
    const explanation = $('#explanation');
    // $('#feedbackModal').addClass('fade');
    // const modal = $('#feedbackModal');
    // alert(selectedAnswer);
    // alert(correctAnswer);
    // alert(questions[index].questionid);
    let answerText =  questions[index].options[correctAnswer];
    // alert(answerText);
    var isCorrectAnswerSelected = false;
    if ((selectedAnswer != '' )&& (selectedAnswer == correctAnswer)) {
        feedbackMessage.text("Correct Answer!");
        explanation.text(questions[index].explanation);
        isCorrectAnswerSelected = true;
        correctlyAnswer++;
    } else {
        feedbackMessage.text("Incorrect Answer!");
        // explanation.text(`Correct Answer: ${correctAnswer}\nExplanation: ${questions[index].explanation}`);
        explanation.html(`<b>Correct Answer: </b>${answerText}<br><b>Explanation:</b> ${questions[index].explanation}`);
        isCorrectAnswerSelected = false;

    }

    // modal.show();
    // const modalElement = document.getElementById('feedbackModal');
    //
    // // Initialize the Bootstrap modal with custom options
    // const modal = new bootstrap.Modal(modalElement, {
    //     backdrop: 'static',  // Prevent modal from closing when clicking outside
    //     keyboard: false      // Prevent modal from closing when pressing ESC key
    // });
    modal.show();
    // modal.modal('show');
    clearInterval(timer);  // Stop the timer
    try{

        updateProgressBar();
    }
    catch (e){

    }

    if(selectedAnswer == ''){
        return;
    }

    $.ajax({
        url: '../api_ajax/saveUserAnswerActive.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            questionId: questions[index].questionid,
            userAnswer: selectedAnswer,
            rightOrWrong: isCorrectAnswerSelected,
            consecutiveCorrectAttempts: consecutiveCorrectAttempts,
        }),
        success: function (responseData) {
            if (responseData.success) {
                console.log('Answer saved successfully!');
            } else {
                tryc('error','Error','Answer not saved, kindly ensure you have a good network connection', 'bottomCenter');
                console.log('Error saving answer:', responseData.error);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        },
    });


}

// Close the feedback modal
$('#closeModalBtn').on('click', () => {
    // const modal = $('#feedbackModal');

    // modal.modal('hide');
    modal.hide();
    // modal.hide();
    isAnswered = false;
    currentIndex++;
    if (currentIndex < questions.length) {
        showQuestion(currentIndex);
        resetTimer();  // Start the timer again after closing the modal
    }
    if(currentIndex >=questions.length){
        completeModal.show();
        $('#spacedData').hide();
        $('#instruction').show();
        $('#completeFeedbackMessage').text('Active Mock Completed');


        const feedbacks = [
            { range: [0, 30], feedback: "Needs improvement. Please try again." },
            { range: [31, 40], feedback: "Below average. Keep practicing." },
            { range: [41, 50], feedback: "Not bad, but you can do better!" },
            { range: [51, 60], feedback: "Decent. Keep going!" },
            { range: [61, 70], feedback: "Good job, but there's room for improvement." },
            { range: [71, 80], feedback: "Great work! Keep it up." },
            { range: [81, 90], feedback: "Excellent! You're doing really well." },
            { range: [91, 100], feedback: "Perfect! You nailed it!" }
        ];

        const percentage = (correctlyAnswer / questions.length) * 100;
        let selectedFeedback = '';
        for (let i = 0; i < feedbacks.length; i++) {
            if (percentage >= feedbacks[i].range[0] && percentage <= feedbacks[i].range[1]) {
                selectedFeedback = feedbacks[i].feedback;
                break;
            }
        }
let alert = 'info';
        if (percentage > 40 && percentage < 60) {
            alertType = 'warning';
        } else if (percentage >= 60) {
            alertType = 'success';
        } else if (percentage < 40) {
            alertType = 'danger';
        }
        $('#score_data').text( correctlyAnswer +' / '+ questions.length);

        $('#completedRemark').html(`
    <div class="alert alert-${alertType}">
        ${selectedFeedback}
    </div>
`);


        tryc('success', 'Active recall Completed');
    }
});
$('#completeCloseModalBtn').on('click', () => {

    $('#completeFeedbackMessage').text('Active Mock Completed');

    // modal.modal('hide');
    completeModal.hide();
    // modal.hide();

});

function resetActiveRecall(){
    currentIndex = 0;
     timeRemaining = 60;
     timeRemainingRefresh = 60;
     isAnswered = false;
     questions = [];
     correctlyAnswer = 0;
    progress = 0;
    const progressBar = document.getElementById('progress-bar');
    progressBar.style.width = `${progress}%`;

    // Update the progress text (the percentage inside the bar)
    progressBar.innerHTML = `${Math.round(progress)}%`;
    $('input[type="radio"]').prop('checked', false);
}

// Timer logic
function startTimer() {
    timer = setInterval(() => {
        if (timeRemaining <= 0) {
            clearInterval(timer);
            selectAnswer(questions[currentIndex].answer, '', currentIndex,questions[currentIndex].consecutiveCorrectAttempts);
        } else {
            $('#timer').text(timeRemaining);
            timeRemaining--;
        }
    }, 1000);
}

function resetTimer() {
    timeRemaining = timeRemainingRefresh;
    startTimer();
}
function updateProgressBar() {
    const totalQuestions = questions.length;
    const answeredQuestions = currentIndex + 1; // Increment by 1 because the index starts from 0
    const progress = (answeredQuestions / totalQuestions) * 100;

    // Update progress bar
    // document.getElementById('progress').value = progress;
    //


    const progressBar = document.getElementById('progress-bar');
    progressBar.style.width = `${progress}%`;

    // Update the progress text (the percentage inside the bar)
    progressBar.innerHTML = `${Math.round(progress)}%`;
    // Optionally, show percentage
    console.log(`Progress: ${Math.round(progress)}%`);
}

    // document.addEventListener('DOMContentLoaded', initializePage);
</script>
<script>



</script>

</html>