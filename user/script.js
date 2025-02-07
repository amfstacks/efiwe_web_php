const API_URL = 'https://your-api-endpoint.com/spacedActualQuestions'; // Replace with your actual API URL
let currentIndex = 0;
let timer;
let timeRemaining = 60;
let isAnswered = false;
let questions = [];

// Initialize Swiper.js
const swiper = new Swiper('.swiper-container', {
    direction: 'horizontal',
    loop: false,
    pagination: { el: '.swiper-pagination' },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    on: {
        slideChange: function () {
            if (currentIndex >= questions.length) return;
            resetTimer();
        }
    }
});

// Fetch questions from API
function loadQuestionsFromAPI() {
    $.ajax({
        url: `../api_ajax/get_spaced_Questions.php`, // Your API URL
        method: 'GET',
        success: function (response) {
            if (response.success && response.data) {
                questions = response.data;
                loadQuestions();
                startTimer();
            } else {
                alert("Error loading questions: " + response.message);
            }
        },
        error: function (err) {
            console.error('API request failed:', err);
            alert("Failed to load questions.");
        }
    });
}

// Dynamically load the questions into the swiper
function loadQuestions() {
    const questionSlides = document.getElementById('questionSlides');
    questions.forEach((question, index) => {
        const slide = document.createElement('div');
        slide.classList.add('swiper-slide');
        slide.innerHTML = `
            <div class="question">
                <h2>${question.text}</h2>
                <div class="options">
                    ${question.options.map((option, i) => `
                        <button class="option-btn" onclick="selectAnswer('${question.answer}', '${option}', ${index})">${option}</button>
                    `).join('')}
                </div>
            </div>
        `;
        questionSlides.appendChild(slide);
    });
}

// Handle answer selection
function selectAnswer(correctAnswer, selectedAnswer, index) {
    if (isAnswered) return; // Prevent multiple answers for the same question

    isAnswered = true;
    const feedbackMessage = document.getElementById('feedbackMessage');
    const explanation = document.getElementById('explanation');
    const modal = document.getElementById('feedbackModal');

    if (selectedAnswer === correctAnswer) {
        feedbackMessage.textContent = "Correct Answer!";
        explanation.textContent = questions[index].explanation;
    } else {
        feedbackMessage.textContent = "Incorrect Answer!";
        explanation.textContent = `Correct Answer: ${correctAnswer}\nExplanation: ${questions[index].explanation}`;
    }

    modal.style.display = 'flex';
}

// Close the feedback modal
document.getElementById('closeModalBtn').addEventListener('click', () => {
    const modal = document.getElementById('feedbackModal');
    modal.style.display = 'none';
    isAnswered = false;
    currentIndex++;
    if (currentIndex < questions.length) {
        swiper.slideTo(currentIndex);
        resetTimer();
    }
});

// Timer logic
function startTimer() {
    timer = setInterval(() => {
        if (timeRemaining <= 0) {
            clearInterval(timer);
            selectAnswer(questions[currentIndex].answer, '', currentIndex); // Automatically move to next question if time is up
        } else {
            document.getElementById('timer').textContent = timeRemaining;
            timeRemaining--;
        }
    }, 1000);
}

function resetTimer() {
    timeRemaining = 60;
    startTimer();
}

// Initialize the quiz on load
loadQuestionsFromAPI();
