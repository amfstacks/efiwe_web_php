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
                                        This is a light alert.
                                    </div>
    <div id="questions-container">
        <!-- Questions will be dynamically loaded here -->
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
    preloadMockQuestions();
});
    // Function to fetch and display mock questions based on the selected week
    function fetchMockQuestions(week) {
        $('#loader').show();
        // Fetch data from the API endpoint, passing the week as a parameter
        fetch(`../api_ajax/get_mock_Questions.php?week=${encodeURIComponent(week)}`)
        // url: '../api_ajax/get_mockList.php',
            .then(response => response.json())
            .then(async data => {
                // Check if the response is successful
                if (data.success) {
                    displayMockQuestions(data.data);
                    $('.start-exam').hide();
                    $('#loader').hide();
                    $('#exam-details').hide();
                    const userAnswers = await fetchUserAnswers();
                    // console.log(userAnswers);
                    updateQuestionsWithAnswers(data.data, userAnswers);
                    saveMockData();

                } else {
                    alert('Failed to fetch questions');
                    $('#loader').hide();

                }
            })
            .catch(error => {
                console.error('Error fetching questions:', error);
                alert('An error occurred while fetching the questions');
            });
    }

    function preloadMockQuestions() {
        const statusDiv = $("#status");
tryc('info','Loading Questions','', 'bottomCenter');
        $.ajax({
            url: "../api_ajax/load_mock_Questions.php",
            method: "GET",
            data: { week: week },
            beforeSend:function (){
                statusDiv.text("Preloading questions...").show();
                $('#loader').show();

            },
            success: function (data) {
                if (data.success) {
                    statusDiv.text("Questions preloaded successfully. You can now start the mock.");
                    $("#startMock").prop("disabled", false);
                    $('#loader').hide();
                    $('#preloadQuestions').hide();
                    $('.start-exam').prop("disabled", false).show();

                } else {
                    statusDiv.text(`Failed to preload questions: ${data.message}`);
                    $('#loader').hide();

                }
            },
            error: function (xhr, status, error) {
                $('#loader').hide();
                console.error("Error preloading questions:", error);
                statusDiv.text("An error occurred while preloading questions.");
            },
        });
    }
    function saveMockData() {


        $.ajax({
            url: "../api_ajax/saveMockdata.php",
            method: "POST",
            success: function (data) {
                console.log(data)
                if (data.success) {
                } else {

                }
            },
            error: function (xhr, status, error) {
                console.error("Error preloading questions:", error);
            },
        });
    }

    // Function to display the fetched questions dynamically
    function displayMockQuestions(questions) {
        const questionsContainer = document.getElementById('questions-container');
        questionsContainer.innerHTML = ''; // Clear existing questions

        // Loop through the questions and display them with their options
        questions.forEach((question, index) => {
            const questionElement = document.createElement('div');
            questionElement.classList.add('question-item');
            questionElement.innerHTML = `
<div class="question" id="${question.questionid}">
            <h5>Question ${index + 1}: ${question.text}</h5>
            <ul class="options-list">
                ${question.options.map((option, i) => `
                    <li>
                        <input type="radio" name="question_${index}" value="${i}" id="question_${index}_option_${i}" data-answer="${i}" data-question-id="${question.questionid}" data-w="${question.answer}" class="option" />
                        <label for="question_${index}_option_${i}">${option}</label>
                    </li>
                `).join('')}
            </ul>
            <p><strong>Explanation:</strong> ${question.explanation || 'No explanation provided.'}</p>
</div>
        `;
            questionsContainer.appendChild(questionElement);
        });
    }

    // Function to handle answer submission
    function saveAnswer(questionId, userAnswer, correctAnswer) {
        // Determine if the answer is correct
        const rightOrWrong = userAnswer === correctAnswer;

        // Send data to the server
        const data = {
            questionId: questionId,
            userAnswer: userAnswer,
            rightOrWrong: rightOrWrong,
        };

        $.ajax({
            url: '../api_ajax/saveUserAnswer.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(responseData) {
                console.log(responseData);
                if (responseData.success) {
                    console.log('Answer saved successfully!');
                } else {
                    console.log('Error saving answer:', responseData.error);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    // Example: User selecting an answer for a question

    async function fetchUserAnswers() {
        const response = await fetch(`../api_ajax/get_mock_Answers.php`);

        const data = await response.json();
// console.log(data.data);
        return data.data; // Adjust based on your actual response structure
    }
    function updateQuestionsWithAnswers(questions, userAnswers) {
        questions.forEach((question) => {
            // alert(userAnswers);
            const userAnswer = userAnswers.find(answer => answer.questionId.stringValue == question.questionid);
// alert(userAnswer);
            // If the user has answered this question, pre-fill the selected answer
            if (userAnswer) {
                const userAnswerValue = userAnswer.userAnswer.integerValue;
                const selectedOption = document.querySelector(`#question_${questions.indexOf(question)}_option_${userAnswerValue}`);
                if (selectedOption) {
                    selectedOption.checked = true;
                }
            }
        });
    }

    $(document).on('click', '.option', function() {
        // Get the question ID and the user's selected answer
        var questionId = $(this).data('question-id');
        var userAnswer = $(this).data('answer'); // The selected answer (1, 2, 3, 4, etc.)
        var correctAnswer = $(this).data('w'); // The selected answer (1, 2, 3, 4, etc.)
// alert(questionId);
// alert(userAnswer);
        // Assume the correct answer is available (e.g., stored in a data attribute or variable)
        // var finalAnswer = userAnswer==correctAnswer;
        // alert(finalAnswer);
        // This function should return the correct answer for the question
        //
        // // Save the answer (dynamically calls saveAnswer)
        saveAnswer(questionId, userAnswer, correctAnswer);
    });

</script>
<?php
include 'includes/footerjs.php';
?>
</body>