<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Exam</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <!-- Container to hold the exam details and questions -->
    <div id="exam-details">
        <h2>Week: 1</h2>
        <p><strong>Instruction:</strong> Prior to starting the exam, it is imperative to thoroughly read and comprehend all provided instructions...</p>
        <p><strong>Total Questions:</strong> 120</p>
        <p><strong>Duration:</strong> 120 minutes</p>

        <!-- Start Exam button that triggers question fetching -->
        <button class="btn btn-primary start-exam" onclick="fetchMockQuestions(1)">Start Exam</button>
    </div>

    <div id="questions-container">
        <!-- Questions will be dynamically loaded here -->
    </div>
</div>
<?php
include 'includes/footerjs.php';
?>
<script >

    // Function to fetch and display mock questions based on the selected week
    function fetchMockQuestions(week) {
        // Fetch data from the API endpoint, passing the week as a parameter
        fetch(`../api_ajax/get_mock_Questions.php`)
        // url: '../api_ajax/get_mockList.php',
            .then(response => response.json())
            .then(async data => {
                // Check if the response is successful
                if (data.success) {
                    displayMockQuestions(data.data);
                    const userAnswers = await fetchUserAnswers();
                    console.log(userAnswers);
                    updateQuestionsWithAnswers(data.data, userAnswers);
                } else {
                    alert('Failed to fetch questions');
                }
            })
            .catch(error => {
                console.error('Error fetching questions:', error);
                alert('An error occurred while fetching the questions');
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
</body>
</html>
