<?php
$encodedData = '';
if (isset($_GET['data'])) {
    $encodedData = $_GET['data'];
}

$page_title = $encodedData .'|| My Tests';

require_once __DIR__ . '/../templates/loggedInc.php';

if(empty($encodedData)){
    exit('an error occurred');
}

?>
<style>
    .question-container {
        max-width: 800px;
        margin: 50px auto;
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
        margin: 5px;
        padding: 10px 15px;
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

        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-12" id="profilesetup">
                            <div class="card">
                                <div class="card-header">
                                    <h1><span class="badge badge-secondary">Jamb Mock Exam <?php echo $encodedData ?></span></h1>
                                </div>
                                <div class="padding-20 p5-padding-left-right">


    <!-- Container to hold the exam details and questions -->
    <div id="exam-details" class="col-lg-6">
        <button type="button" class="btn btn-primary btn-icon icon-left font-15 mb-4">
            <i class="fas fa-user-graduate font-10"></i> Instruction
        </button>

        <blockquote class="blockquote">
            <p class="mb-0">Prior to starting the exam, it is imperative to thoroughly read and comprehend all provided instructions..</p>

        </blockquote>
<!--        <br>-->
        <span class="list-groupa-item d-flex justify-content-between align-items-center mb-1 col-lg-6 p-lr-0i">
            <h5>Total Questions</h5>
            <span class="badge badge-dark badge-pill">120</span>
        </span>
        <span class="list-groupa-item d-flex justify-content-between align-items-center col-lg-6 p-lr-0i">
            <h5>Duration</h5>
            <span class="badge badge-dark badge-pill">120 minutes</span>
        </span>
        <button class="btn btn-primary start-exam" onclick="fetchMockQuestions(<?php echo $encodedData ?>)" disabled style="display: none">Start Exam</button>
    </div>
                                    <br>
    <button id="preloadQuestions" class="btn btn-primary" >Click Here To PROCEED</button>
<!--    <button id="startMock" onclick="startMock()" disabled>Start Mock</button>-->
                                 <br>   <i class="fas fa-spinner fa-spin font-30 mb-3 mt-4 " id="loader" style="display: none; maargin: auto !important;"></i>

                                    <div class="alert alert-light col-lg-6" id="status" style="display: none; ">

                                    </div>
    <div id="questions-container">
        <!-- Questions will be dynamically loaded here -->
    </div>


                                    <div id="question-numbers" class="navigation-numbers">
                                        <!-- Buttons will be dynamically generated here -->
                                    </div>

                                    <div class="navigation-buttons">
                                        <button id="prev-btn" class="btn btn-secondary" disabled>Previous</button>
                                        <button id="next-btn" class="btn btn-primary">Next</button>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

</div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script >

week = <?php echo $encodedData ?>;


$(document).on('click', '#preloadQuestions', function() {
    // preloadMockQuestions();
});

let currentQuestionIndex = 0;
let questions = [];
let userAnswers = {}; // Store user answers locally


// Fetch mock questions
function fetchMockQuestions(week) {
    $('#loader').show();
    $.ajax({
        url: `../api_ajax/get_mock_Questions.php?week=${encodeURIComponent(week)}`,
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
                saveMockData();
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
    const questionElement = `
        <div class="question question-container" id="${question.questionid}">
            <span class="float-left font-weight-bold">Question ${index + 1}:</span><br>
            <h5 class="bg-dark-gray">${question.text}</h5>
            <ul class="options-list">
                ${question.options
        .map(
            (option, i) => `
                    <li>
                        <input type="radio" name="question_${index}" value="${i}" id="question_${index}_option_${i}" data-answer="${i}" data-question-id="${question.questionid}" data-w="${question.answer}" class="option" />
                        <label for="question_${index}_option_${i}">${option}</label>
                    </li>
                `
        )
        .join('')}
            </ul>
            <p><strong>Explanation:</strong> ${question.explanation || 'No explanation provided.'}</p>
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

// Fetch user answers from the server
async function fetchUserAnswers() {
    const response = await $.ajax({
        url: `../api_ajax/get_mock_Answers.php?week=${encodeURIComponent(week)}`,
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
    statusDiv.text('Preloading questions...').show();
    $('#loader').show();

    $.ajax({
        url: '../api_ajax/load_mock_Questions.php',
        method: 'GET',
        data: { week: week },
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

</script>
<?php
include 'includes/footerjs.php';
?>
</body>