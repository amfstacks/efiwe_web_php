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

<script >

    // Function to fetch and display mock questions based on the selected week
    function fetchMockQuestions(week) {
        // Fetch data from the API endpoint, passing the week as a parameter
        fetch(`../api_ajax/get_mock_Questions.php`)
        // url: '../api_ajax/get_mockList.php',
            .then(response => response.json())
            .then(data => {
                // Check if the response is successful
                if (data.success) {
                    displayMockQuestions(data.data);
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
            <h5>Question ${index + 1}: ${question.text}</h5>
            <ul class="options-list">
                ${question.options.map((option, i) => `
                    <li>
                        <input type="radio" name="question_${index}" value="${i}" id="question_${index}_option_${i}" />
                        <label for="question_${index}_option_${i}">${option}</label>
                    </li>
                `).join('')}
            </ul>
            <p><strong>Explanation:</strong> ${question.explanation || 'No explanation provided.'}</p>
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
            userId: 'USER_ID_HERE', // Replace with actual user ID
        };

        $.ajax({
            url: '/saveUserAnswer',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(responseData) {
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
    $('#question_1_option_1').on('click', function() {
        saveAnswer('questionId_12345', 1, 2); // Save answer (userAnswer = 1, correctAnswer = 2)
    });

</script>
</body>
</html>
