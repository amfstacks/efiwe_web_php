<?php
$encodedData = '';


$page_title = ' My Mock Exam';

require_once __DIR__ . '/../templates/loggedInc.php';
if (isset($_SESSION['activeWeek'] )) {
    $encodedData = $_SESSION['activeWeek'] ;
    $activeInstruction = $_SESSION['activeInstruction'] ;
    $activeDuration = $_SESSION['activeDuration'] ;
    $activeTotalQuestions = $_SESSION['activeTotalQuestions'] ;
//   exit;
}
if(empty($encodedData)){
    exit('an error occurred');
}

?>
<style>
    .main-content{
        padding-left: 15px !important;
        padding-top: 15px !important;
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
<link rel="stylesheet" href="assets/tstyle/TimeCircles.css" />

<body>

<div class="loader"></div>
<div id="app">

    <div class="main-wrapper main-wrapper-1">


    <div class="navbar-bg d-print-none"></div>
    <?php
//    include 'includes/navbar.php';
//    include 'includes/sidebar.php';
    ?>

        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-12" id="profilesetup">
                            <div class="card">
                                <div class="card-header" style="display: flex;
    flex-direction: column;  /* Stacks the items vertically */
    align-items: flex-start;">
                                    <a href="#" class="badge badge-light mb-1" id="go-back-btn">Go Back</a>
                                    <h1><span class="badge badge-secondary">Jamb Mock Exam <?php echo $encodedData ?></span></h1>
                                </div>
                                <div class="padding-20 p5-padding-left-right">

    <!-- Container to hold the exam details and questions -->
    <div id="exam-details" class="col-lg-6">
        <button type="button" class="btn  btn-outline-primary btn-icon icon-left font-15 mb-4">
            <i class="fas fa-user-graduate font-10"></i> Instruction
        </button>

        <blockquote class="blockquote">
            <p class="mb-0"><?php echo $activeInstruction ?> </p>

        </blockquote>
<!--        <br>-->
        <span class="list-groupa-item d-flex justify-content-between align-items-center mb-1 col-lg-6 p-lr-0i">
            <h5>Total Questions</h5>
            <span class="badge badge-dark badge-pill"><?php echo $activeTotalQuestions ?> </span>
        </span>
        <span class="list-groupa-item d-flex justify-content-between align-items-center col-lg-6 p-lr-0i">
            <h5>Duration</h5>
            <span class="badge badge-dark badge-pill"><?php echo $activeDuration ?> minutes</span>
        </span>
        <button class="btn btn-primary start-exam btn-lg btn-lg mt-5" onclick="fetchMockQuestions(<?php echo $encodedData ?>)" disabled style="display: none">Start JAMB MOCK Exam</button>
    </div>
                                    <br>
    <button id="preloadQuestions" class="btn btn-primary btn-lg mt-5" >Click Here To PROCEED</button>
<!--    <button id="startMock" onclick="startMock()" disabled>Start Mock</button>-->
                                 <br>   <i class="fas fa-spinner fa-spin font-30 mb-3 mt-4 " id="loader" style="display: none; maargin: auto !important;"></i>

                                    <div class="alert alert-light col-lg-6" id="status" style="display: none; ">

                                    </div>
                                  <center>  <div id="exam_timer" data-timer="0" style="max-width:400px; width: 100%; height: 150px; display: none;"></div>
                                      <button type="button" name="complete" class="float-rigaht btn btn-success btn-lg consubmit " style="display: none"  id="subbutn">Finish Exam</button>

                                  </center>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div id="questions-container">
                                                <!-- Questions will be dynamically loaded here -->
                                            </div>
                                            <div class="navigation-buttons d-flex justify-content-center d-nonae no-padding-left-right mt-3" style="display: none  !important">
                                                <button id="prev-btn" class="btn btn-secondary btn-lg btn-icon icon-left mr-5" disabled>Previous <i class="fas fa-angle-double-left"></i> </button>
                                                <button id="next-btn" class="btn btn-primary btn-lg btn-icon icon-right ">Next  <i class="fas fa-angle-double-right"></i> </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div id="question-numbers" class="navigation-numbers">
                                                <!-- Buttons will be dynamically generated here -->
                                            </div>
                                        </div>

                                    </div>










                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

</div>
    <div class="modal fade" id="submission">
        <div class="modal-dialog ">

            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="question_modal_title">Confirm Submission</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <h5 align="center">
                        Are you sure you are done with this mock ?<br>
                        This action is not reversible !.
                    </h5>


                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary btn-sm delete" id="ok_submit" name="ok_submit">YES <i class="fas fa-check-circle"></i> </button>

                    <button type="button" class="btn btn-danger btn-sm " data-dismiss="modal">NOT YET <i class="fas fa-check-times"></i></button>


                </div>
            </div>


        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../scripts/general.js" ></script>
<script >

week = <?php echo $encodedData ?>;


$(document).ready(function(){

});
// saveMockData();
let currentQuestionIndex = 0;
let questions = [];
let userAnswers = {}; // Store user answers locally

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
// Fetch mock questions
function fetchMockQuestions(week) {
    $('#loader').show();
    enterFullScreen();
    $.ajax({
        url: `../api_ajax/get_mock_Questions.php`,
        method: 'GET',
        success: async function (data) {
            if (data.success) {
                questions = data.data;
                await initializeUserAnswers(); // Fetch and initialize user answers
                displayQuestion(currentQuestionIndex); // Display the first question
                generateQuestionNumbers(); // Generate numbered buttons
                updateQuestionNumbers(); // Highlight answered questions
                $('.start-exam').hide();
                $('#loader').hide();
                $('#exam-details').hide();
                $('#status').hide();
                $('#go-back-btn').hide();
                $('.navigation-buttons').show();


                saveMockData();
                processDailyTask(week,'mock','');

            } else {
                alert('Failed to fetch questions');
                $('#loader').hide();
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching questions:', error);
            alert('An error occurred while fetching the questions');
        },
    });
}

// Fetch and initialize user answers
async function initializeUserAnswers() {
    const serverAnswers = await fetchUserAnswers();
    updateUserAnswers(serverAnswers); // Update local userAnswers object
}


// Display a specific question
function displayQuestion(index) {
    const question = questions[index];
    let imageElement = '';

    if (question.image != null && question.image !== '') {
        imageElement = `<h5 class="bg-dark-gray"><img src="${question.image}" alt="Question Image" class="question-image" /></h5>`;
    }
    const questionElement = `
        <div class="question question-container no-padding-left-right" id="${question.questionid}">
            <span class="float-left font-weight-bold">Question ${index + 1}:</span><br>
            <h5 class="bg-dark-gray">${question.text}</h5>
${imageElement}
            <ul class="options-list">
                ${question.options
        .map(
            (option, i) => `
                    <li>
                        <input type="radio" name="question_${index}" value="${i}" id="question_${index}_option_${i}" data-answer="${i}" data-question-id="${question.questionid}" data-w="${question.answer}" class="option" />
                        <label for="question_${index}_option_${i}" class="p-x-3i">${option}</label>
                    </li>
                `
        )
        .join('')}
            </ul>
        </div>
    `;

    $('#questions-container').html(questionElement); // Render the question

    // Highlight the current question number
    $('#question-numbers button').removeClass('active');
    $(`#question-numbers button[data-index="${index}"]`).addClass('active');

    // Enable/disable navigation buttons
    $('#prev-btn').prop('disabled', index === 0);
    $('#next-btn').prop('disabled', index === questions.length - 1);

    // Display saved answer for the current question
    const savedAnswer = userAnswers[question.questionid];
    if (savedAnswer !== undefined) {
        $(`#question_${index}_option_${savedAnswer}`).prop('checked', true);
        $(`label[for="question_${index}_option_${savedAnswer}"]`).addClass('selected');
    }
}

// Generate numbered navigation buttons
function generateQuestionNumbers() {
    const numbersContainer = $('#question-numbers');
    numbersContainer.empty(); // Clear existing buttons

    questions.forEach((question, index) => {
        const button = $(`<button data-index="${index}">${index + 1}</button>`);
        button.on('click', function () {
            currentQuestionIndex = index;
            displayQuestion(currentQuestionIndex);
        });
        numbersContainer.append(button);
    });
}

// Update question numbers to highlight answered questions
function updateQuestionNumbers() {
    $('#question-numbers button').each(function () {
        const index = $(this).data('index');
        const questionId = questions[index].questionid;
        if (userAnswers[questionId] !== undefined) {
            $(this).addClass('answered'); // Highlight answered questions
        }
    });
}

function saveMockData() {
    $.ajax({
        url: "../api_ajax/saveMockData.php",
        method: "POST",
        success: function (data) {
            console.log(data)
            if (data.success) {
                if(data.data.canContinue === false){

                    $('.start-exam').show();
                    $('#loader').show();
                    $('#exam-details').show();
                    $('#status').show();
                    $('#go-back-btn').show();
                    $('.navigation-buttons').hide();
                    $('.navigation-buttons').hide();
                    $('.navigation-buttons').html('');
                    $('#questions-container').html('Jamb Mock  Exam Already Taken');
                    $('.navigation-numbers').html('');
                    $('#exam_timer').hide();
                    $('#exam_timer').html('');
                    return;
                }
                const timeDifference = data.data.timeDifference;

                // Ensure the timeDifference is a positive value
                // const timerValue = Math.abs(timeDifference); // Use absolute value
                const timerValue = Math.abs(20); // Use absolute value

                if(timerValue < 10){
                    endMockData();
                    // window.history.back();
                    return;
                }
                // Set the timer value to the #exam_timer element
                $('#exam_timer').attr('data-timer', timerValue);

                // Show the timer (if it was hidden)
                $('#exam_timer').show();


                $("#exam_timer").TimeCircles({
                    time:{
                        Days:{
                            show: false
                        },
                        Hours:{
                            show: true
                        }
                    }
                });
                $('.consubmit').show();
                let hasEnded = false;
                setInterval(function(){
                    var remaining_second = $("#exam_timer").TimeCircles().getTime();

                    if(remaining_second <= 2100){

                    };

                    if(remaining_second <= 0 && !hasEnded)
                    {
                        endMockData();
                        hasEnded = true;
                        // window.history.back();
                        return;
                    }

                    if(remaining_second < 10){
                        // endMockData();
                        // window.history.back();
                        return;
                    }
                }, 1000);
            } else {

            }
        },
        error: function (xhr, status, error) {
            console.error("Error preloading questions:", error);
        },
    });
}
function endMockData() {
    $('#ok_submit').addClass('btn-progress');
    $('.navigation-buttons').hide();
    $('.navigation-buttons').html('');
    $('#questions-container').html('submitting Exam');
    $('.navigation-numbers').html('');
    $('#exam_timer').hide();
    $('#exam_timer').html('');
// return;
    $.ajax({
        url: "../api_ajax/finishMock.php",
        method: "POST",
        data:{questionCount:questions.length},
        success: function (data) {
            console.log(data)
            $('#ok_submit').removeClass('btn-progress');
            if (data.success) {
                window.location.href = 'mockResult.php';

                return;

            } else {
                window.history.back();
                return;

            }
        },
        error: function (xhr, status, error) {
            $('#ok_submit').removeClass('btn-progress');
            console.error("Error preloading questions:", error);
        },
    });
}
// Fetch user answers from the server
async function fetchUserAnswers() {
    const response = await $.ajax({
        url: `../api_ajax/get_mock_Answers.php`,
        method: 'GET',
    });
    return response.data; // Adjust based on your actual response structure
}

// Update local userAnswers object with server data
function updateUserAnswers_(serverAnswers) {
    serverAnswers.forEach((answer) => {
        userAnswers[answer.questionId.stringValue] = answer.userAnswer.integerValue;
    });
}
function updateUserAnswers(serverAnswers) {
    serverAnswers.forEach((answer) => {
        if (answer.userAnswer.integerValue != -1) { // Only store valid answers
            userAnswers[answer.questionId.stringValue] = answer.userAnswer.integerValue;
        }
    });
}

// Save user answer locally and to the server
function saveAnswer(questionId, userAnswer, correctAnswer) {
    userAnswers[questionId] = userAnswer; // Save answer locally
    const rightOrWrong = userAnswer === correctAnswer;
    alert(rightOrWrong); //? remove

    // Update the UI for the current question
    $(`.options-list input[data-question-id="${questionId}"]`).each(function () {
        const label = $(`label[for="${this.id}"]`);
        if ($(this).val() == userAnswer) {
            label.addClass('selected'); // Highlight the selected answer
        } else {
            label.removeClass('selected'); // Remove highlight from other options
        }
    });

    // Update the numbered button for the answered question
    const questionIndex = questions.findIndex((q) => q.questionid === questionId);
    $(`#question-numbers button[data-index="${questionIndex}"]`).addClass('answered');

    // Send data to the server
    $.ajax({
        url: '../api_ajax/saveUserAnswer.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            questionId: questionId,
            userAnswer: userAnswer,
            rightOrWrong: rightOrWrong,
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

// Event listeners for navigation buttons
$('#prev-btn').on('click', function () {
    if (currentQuestionIndex > 0) {
        currentQuestionIndex--;
        displayQuestion(currentQuestionIndex);
    }
});

$('#next-btn').on('click', function () {
    if (currentQuestionIndex < questions.length - 1) {
        currentQuestionIndex++;
        displayQuestion(currentQuestionIndex);
    }
});

// Event listener for selecting an answer
$(document).on('click', '.option', function () {
    const questionId = $(this).data('question-id');
    const userAnswer = $(this).data('answer');
    const correctAnswer = $(this).data('w');
    saveAnswer(questionId, userAnswer, correctAnswer);
});

// Preload questions
$('#preloadQuestions').on('click', function () {
    const statusDiv = $('#status');
    tryc('info','Loading Questions for all of your JAMB subjects','', 'bottomCenter');
    statusDiv.text('Preloading questions...').show();
    $('#loader').show();
    $('#preloadQuestions').hide();
tryc('warning', 'This may take up to a minute.\n Please exercise Patience','','bottomCenter');
    $.ajax({
        url: '../api_ajax/load_mock_Questions.php',
        method: 'GET',
        data: { week: 0 },
        success: function (data) {
            if (data.success) {
                statusDiv.text('Questions preloaded successfully. You can now start the mock.');
                $('#startMock').prop('disabled', false);
                $('#loader').hide();
                $('#preloadQuestions').hide();
                $('.start-exam').prop('disabled', false).show();
            } else {
                statusDiv.text(`Failed to preload questions: ${data.message}`);
                $('#loader').hide();
            }
        },
        error: function (xhr, status, error) {
            $('#loader').hide();
            console.error('Error preloading questions:', error);
            statusDiv.text('An error occurred while preloading questions.');
        },
    });
});


$(document).on('click', '.consubmit', function(){
    question_id = $(this).attr('id');
    // reset_question_form();
    $('#submission').modal('show');

    $('#ok_submit').click(function(){

        endMockData();
    });


});

</script>
<?php
include 'includes/footerjs.php';
?>
<script src="assets/tstyle/TimeCircles.js"></script>

</body>