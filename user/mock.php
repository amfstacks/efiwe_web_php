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
        display: inline-block;
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


                                    <div class="question-item">

                                        <div class="question-container bg-seconadary badge-liaght" id="0kqO2oMTIm7MWFOpwtvk">
                                            <span class="float-left font-weight-bold">Question 2:</span>
                                            <h5 class="bg-dark-gray"> The man was able to persuade his willful and obstinate daughter to follow the career he chose for her?</h5>

                                           <ul class="options-list">

                                                <li>
                                                    <input type="radio" name="question_1" value="0" id="question_1_option_0" data-answer="0" data-question-id="0kqO2oMTIm7MWFOpwtvk" data-w="1" class="option">
                                                    <label for="question_1_option_0">intelligent but arrogant</label>
                                                </li>

                                                <li>
                                                    <input type="radio" name="question_1" value="1" id="question_1_option_1" data-answer="1" data-question-id="0kqO2oMTIm7MWFOpwtvk" data-w="1" class="option">
                                                    <label for="question_1_option_1">unyielding and obdurate</label>
                                                </li>

                                                <li>
                                                    <input type="radio" name="question_1" value="2" id="question_1_option_2" data-answer="2" data-question-id="0kqO2oMTIm7MWFOpwtvk" data-w="1" class="option">
                                                    <label for="question_1_option_2">secure and odious</label>
                                                </li>

                                                <li>
                                                    <input type="radio" name="question_1" value="3" id="question_1_option_3" data-answer="3" data-question-id="0kqO2oMTIm7MWFOpwtvk" data-w="1" class="option">
                                                    <label for="question_1_option_3">hardworking and intelligent</label>
                                                </li>

                                            </ul>
                                            <p><strong>Explanation:</strong> No explanation provided.</p>
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
<div class="question question-container" id="${question.questionid}">
 <span class="float-left font-weight-bold">Question ${index + 1}:</span>
            <h5 class="bg-dark-gray"> ${question.text}</h5>
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
// console.log(data);
// return;
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
        const response = await fetch(`../api_ajax/get_mock_Answers.php?week=${encodeURIComponent(week)}`);

        const data = await response.json();
// console.log(data.data);
        return data.data; // Adjust based on your actual response structure
    }

function updateQuestionsWithAnswers(questions, userAnswers) {
    questions.forEach((question, index) => {
        const userAnswer = userAnswers.find(
            (answer) => answer.questionId.stringValue == question.questionid
        );

        // If the user has answered this question, pre-fill the selected answer
        if (userAnswer) {
            const userAnswerValue = userAnswer.userAnswer.integerValue;

            // Select the radio button
            const selectedOption = document.querySelector(
                `#question_${index}_option_${userAnswerValue}`
            );
            if (selectedOption) {
                selectedOption.checked = true; // Mark the radio button as checked

                // Highlight the associated label
                const labelElement = document.querySelector(
                    `label[for="question_${index}_option_${userAnswerValue}"]`
                );
                if (labelElement) {
                    labelElement.classList.add("selected");
                }
            }
        }
    });

    // Add an event listener for handling radio button clicks
    document.querySelectorAll(".options-list input[type='radio']").forEach((radioButton) => {
        radioButton.addEventListener("click", (event) => {
            const questionName = radioButton.name; // e.g., "question_0"

            // Remove 'selected' class from all options of the same question
            document.querySelectorAll(`input[name="${questionName}"]`).forEach((input) => {
                const label = document.querySelector(`label[for="${input.id}"]`);
                if (label) {
                    label.classList.remove("selected");
                }
            });

            // Add 'selected' class to the newly clicked option
            const label = document.querySelector(`label[for="${radioButton.id}"]`);
            if (label) {
                label.classList.add("selected");
            }
        });
    });
}


function updateQuestionsWithAnswers___(questions, userAnswers) {
    questions.forEach((question, index) => {
        const userAnswer = userAnswers.find(
            (answer) => answer.questionId.stringValue == question.questionid
        );

        // If the user has answered this question, pre-fill the selected answer
        if (userAnswer) {
            const userAnswerValue = userAnswer.userAnswer.integerValue;

            // Select the radio button
            const selectedOption = document.querySelector(
                `#question_${index}_option_${userAnswerValue}`
            );
            if (selectedOption) {
                selectedOption.checked = true; // Mark the radio button as checked

                // Highlight the associated label
                const labelElement = document.querySelector(
                    `label[for="question_${index}_option_${userAnswerValue}"]`
                );
                if (labelElement) {
                    labelElement.classList.add("selected");
                }
            }
        }
    });
}

function updateQuestionsWithAnswers__(questions, userAnswers) {
    questions.forEach((question, index) => {
        const userAnswer = userAnswers.find(
            (answer) => answer.questionId.stringValue == question.questionid
        );

        // If the user has answered this question, pre-fill the selected answer
        if (userAnswer) {
            const userAnswerValue = userAnswer.userAnswer.integerValue;
            const selectedOption = document.querySelector(
                `#question_${index}_option_${userAnswerValue}`
            );
            if (selectedOption) {
                selectedOption.checked = true; // Mark the radio button as checked
                const labelElement = selectedOption.nextElementSibling;
                if (labelElement) {
                    labelElement.classList.add("selected"); // Add a class to highlight the option if needed
                }
            }
        }
    });
}
    function updateQuestionsWithAnswers_(questions, userAnswers) {
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