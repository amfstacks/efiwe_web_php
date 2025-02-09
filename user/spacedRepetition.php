<?php
$encodedData = '';


$page_title = ' Spaced Repetition';

require_once __DIR__ . '/../templates/loggedInc.php';


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
                                    <h1><span class="badge badge-secondary">Spaced Repetition </span></h1>
                                </div>

                                <div class="container" id="spacedInstruction" >
                                    <h4>

                                    </h4>
                                    <div class="alert alert-danger alert-dismissible show fade col-lg-6">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                            Read the following instructions carefully!
                                        </div>
                                    </div>
                                    <blockquote class="blockquote">
                                        <p class="mb-0">   Spaced repetition can be taken just twice in a day!
                                        <br>Be sure  you are ready  before starting
                                        </p>

                                    </blockquote>
                                    <div class="alert alert-danger col-lg-6" id="errorAjaxDisplay" style="display: none">
                                        This is a danger alert.
                                    </div>
                                    <button class="btn btn-primary start-exam m-b-10" onclick="loadQuestionsFromAPI()"  style="displaay: none">Start My Spaced Repetition</button>
                               <br>
                                </div>
<div id="spacedData" style="display: none">
                               <center> <div class="progress mb-3 col-lg-6 p-l-5" data-height="10" style="height: 10px;">
                                    <div  id="progress-bar" class="progress-bar" role="progressbar" data-width="0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
                                </div>
                               </center>

                                <!--                                <div id="exam_timer" data-timer="0" style="max-width:400px; width: 100%; height: 150px; display: none;"></div>-->

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
                    </div></div>
            </section>
        </div>
<!--        data-bs-backdrop="static" data-bs-keyboard="false"-->
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
    </div>


<!-- Bootstrap JS and Popper.js -->
<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>-->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<?php
include 'includes/footerjs.php';
?>
    <script>
        const API_URL = 'https://your-api-endpoint.com/spacedActualQuestions'; // Replace with your actual API URL
        let currentIndex = 0;
        let timer;
        let timeRemaining = 60;
        let timeRemainingRefresh = 60;
        let isAnswered = false;
        let questions = [];


        // let dataQ =  [
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "1Ab3qA2ww5uBgJeD2uOJ",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. 0.85 PN-m-2",
        //             "B. 0.86 PN-m-2",
        //             "C. 1.16 PN-m-2",
        //             "D. 1.18 PN-m-2"
        //         ],
        //         "text": "A gas at pressure PNm−2\n and temperature 27°C is heated to 77°C at constant volume. The new pressure is",
        //         "explanation": "At constant volume,\n\nP1T1\n = P2T2\n\n\nP27+273\n = P277+273\n300P2=350P\n\n\nP2 = 1.16 PNm−2",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T21:42:27.576Z",
        //         "consecutiveCorrectAttempts": "1"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "1B4bDG31ynEjKtAVdh9V",
        //         "week": "1",
        //         "answer": 1,
        //         "options": [
        //             "Daniel",
        //             "Esau",
        //             "Jacob",
        //             "Nathaniel"
        //         ],
        //         "text": "Who sold his birthright for a plate of pottage?",
        //         "explanation": "Esau sold his birthright for a plate of pottage. This incident is recorded in Genesis 25:29-34, where Esau, coming in from the field hungry, exchanges his birthright, which entitled him to the privileges of the firstborn, for a plate of pottage that Jacob, his brother, had prepared.",
        //         "type": "mock",
        //         "timestamp": "2024-09-07T12:41:58.339Z",
        //         "consecutiveCorrectAttempts": "1"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "1GqzzQHdHK0q18LLTx1C",
        //         "week": "1",
        //         "answer": 0,
        //         "options": [
        //             "accent",
        //             "assent",
        //             "access",
        //             "ascent"
        //         ],
        //         "text": "The governor rejected the bill and withheld his ____________?",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T15:07:10.935Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "UaSQMQzLCGbZW3T95B8IKjZQPXb2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "1"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "uRr4BkxeAlMkcDRYWF6E",
        //         "week": "1",
        //         "answer": 0,
        //         "options": [
        //             "A. cross-elasticity of demand",
        //             "B. elasticity of supply",
        //             "C. competitive demand",
        //             "D. composite demand"
        //         ],
        //         "text": "16. The effect on the demand for product A caused by a change in the price of product B is called",
        //         "type": "mock",
        //         "timestamp": "2024-09-15T15:21:54.049Z",
        //         "explanation": "Cross-elasticity measures how demand for one good changes when another good's price changes.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "uXgB9esinw24z0dpMscC",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. 80 cal",
        //             "B. 10 cal",
        //             "C. 8 cal",
        //             "D. 800 cal"
        //         ],
        //         "text": "The latent heat of fusion of ice is 80cal g-1. How much heat is required to change 10g of ice at QoC into water at the same temperature?",
        //         "explanation": "Quantity of heat = ml\n\n= 10 x 80\n\n= 800 cal",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T21:41:10.203Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "ulvRdvQRkYmkWeba3nOl",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. reiterated",
        //             "B. reviewed",
        //             "C. restated",
        //             "D. recited"
        //         ],
        //         "text": "Choose the word/expression which best completes each sentence :\nDuring the inaugural address, the president .... the activities of his government for the past four years",
        //         "explanation": "The word that best completes the sentence is:\n\nB. reviewed.",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:59:14.183Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "uprJcvVl6oH6oo93epRh",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. The Agricultural Bank",
        //             "B. The Industrial Bank",
        //             "C. The Central Bank",
        //             "D. The co-operative Bank"
        //         ],
        //         "text": "35. Which of these financial institutions cannot provide direct loans to individuals?",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:39:37.200Z",
        //         "explanation": "The Central Bank typically does not offer direct loans to individuals.\n",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "uq7mjjn3LpHdVab9o4p0",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. He stood up to receive the applause",
        //             "B. The audience stood up and applauded as he finished his speech",
        //             "C. Both he and the audience stood up at the end of his speech",
        //             "D. He stood up to make the speech"
        //         ],
        //         "text": "Choose the option nearest in meaning to the quoted words:\n\"He got a standing ovation for his speech\"",
        //         "explanation": "The option nearest in meaning to \"standing ovation\" is:\n\nB. The audience stood up and applauded as he finished his speech.",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:43:11.328Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "usCNT1olRSAxfU1mKPhI",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. Cash",
        //             "B. Money at call",
        //             "C. Treasury bills",
        //             "D. Reserve fund"
        //         ],
        //         "text": "27. Which of the following is not an asset of a commercial bank?",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:29:43.371Z",
        //         "explanation": "Money at call is typically a liability, as it's an amount owed to customers who can demand it at short notice.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "uslBj6PPEchFgTeqzd7J",
        //         "week": "1",
        //         "answer": 0,
        //         "options": [
        //             "0.01cm",
        //             "0.5cm",
        //             "1.0cm",
        //             "2.0cm"
        //         ],
        //         "text": "What is the least possible error in using rule graduated in centimeters?",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.849Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "v2fIz8kB29deyfc6iVtw",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. excise duty",
        //             "B. company tax",
        //             "C. import duty",
        //             "D. export duty"
        //         ],
        //         "text": "14. Which of the following is not an indirect tax",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:11:26.536Z",
        //         "explanation": "Indirect taxes are those collected from transactions (e.g., VAT, excise duties), while company tax is a direct tax.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "vM3T9EViYakQUlLsDl5F",
        //         "week": "1",
        //         "answer": 2,
        //         "options": [
        //             "A. that a country is buying more than it is selling",
        //             "B. that a country is selling more than it is buying",
        //             "C. a government is spending more than it takes in taxation",
        //             "D. a government is spending less than it takes in taxation"
        //         ],
        //         "text": "2.A budget deficit means",
        //         "type": "mock",
        //         "timestamp": "2024-09-15T14:57:12.172Z",
        //         "explanation": "A deficit occurs when expenditures exceed revenue.\n",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "viykQbZULS7ariz6n4QZ",
        //         "week": "1",
        //         "answer": 33,
        //         "options": [
        //             "meter rule",
        //             "Venier Callipers",
        //             "Micro Meter screw guage",
        //             "Lever Balance"
        //         ],
        //         "text": "An instrument whose accuracy is 0.05cm is the",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.887Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "vkZCjd52tcsZQgvspYcc",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. commutators",
        //             "B. transistors",
        //             "C. valves and diodes",
        //             "D. transformers"
        //         ],
        //         "text": "The electric supply from Kainji Dam is transmitted at high voltages of the order hundreds of kilovolts but is converted to domestic use of about 220 volts by",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T22:04:04.666Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "w6DyebJagPleFi0p0gqy",
        //         "week": "1",
        //         "answer": 1,
        //         "options": [
        //             "kgm-3 s-2",
        //             "kgm-1 s-2",
        //             "kgm3s-2",
        //             "kgm2 s-2"
        //         ],
        //         "text": "The correct unit of Energy Density is",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.866Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "wf2UF1sOpuj5V1NRdZcf",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. changing the position of a good in time as, for example. holding stocks of goods until they are required",
        //             "B. the provision of some kind of service e.g. retailing",
        //             "C. changing the form of a good from the raw material to the finished product",
        //             "D. the use of goods and services to satisfy individual wants"
        //         ],
        //         "text": "3. Production covers all but one of the following activities:",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T08:57:06.695Z",
        //         "explanation": "Consumption (not production) satisfies wants.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "xBxlqD5Bqm35u0iRJWT3",
        //         "week": "1",
        //         "answer": 2,
        //         "options": [
        //             "0.27",
        //             "0.14",
        //             "0.09",
        //             "0.03"
        //         ],
        //         "text": "The external and internal diameters of a tube are measured as (32± 2)mm and (21± 1)mm respectively. Determine the percentage error in the thickness of the tube.",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.852Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "xGaU7l5ocXqrp9lwBcJL",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "A. glanced at",
        //             "B. viewed",
        //             "C. observed",
        //             "D. gazed at"
        //         ],
        //         "text": "Choose the option nearest in meaning to the quoted statement or words:\nHe \"took a quick look\" at the poor man, shook his head and took to his heels",
        //         "explanation": "The option nearest in meaning to \"took a quick look\" is:\n\nA. glanced at.",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:55:27.760Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "xXNm4eF9BvXLJv7PyI2e",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. the number of turns in the coil",
        //             "B. the strength of the magnet",
        //             "C. the speed at which the magnet is moved",
        //             "D. all of the above"
        //         ],
        //         "text": "A magnet is moved through a coil of wire. The e.m.f. produced in the wire depends on",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T21:56:22.887Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "y1snZTeyL9PVIfeEkUYY",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "A. the boy was knocked down by a car",
        //             "B. a car knocked the boy down",
        //             "C. the boy was hit down by car",
        //             "D. a car collided with the boy"
        //         ],
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-09-10T11:39:26.860Z",
        //         "text": "Choose the expression or word which best complete each sentence:\nWalking down the street ....",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "yY4fvB22Pq7164UCOIAs",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. He was weak and unable to enforce his authority",
        //             "B. He was partial and unfair in dispensing justice",
        //             "C. He was simple minded to a fault",
        //             "D. He was slow to act"
        //         ],
        //         "text": "Choose the option nearest in meaning to the quoted words:\n\nAs he was a \"gullible leader\" his followers took advantage of him",
        //         "explanation": "someone is said to be Gullible when they can be easily persuaded to believe something or easily fooled",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:22:45.817Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "youq0GqjNrTmST4O7hOO",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. be generous",
        //             "B. be friendly to young people",
        //             "C. like young people",
        //             "D. be hard to please"
        //         ],
        //         "text": "Choose the correct option that completes the following sentence:\n\nThe young teacher was surprised that his promotion was approved by the old inspector who is generally known to .......",
        //         "explanation": "The full sentence is: \"The young teacher was surprised that his promotion was approved by the old inspector who is generally known to be hard to please.\"\n\nSomeone who is hard to please is demanding",
        //         "type": "mock",
        //         "timestamp": "2024-09-11T12:02:27.072Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "ys8IuVx6MC1tluPfYpXg",
        //         "week": "1",
        //         "answer": 2,
        //         "options": [
        //             "I and II",
        //             "I and III",
        //             "II and III",
        //             "II and IV"
        //         ],
        //         "text": "I. Electrical Potential. II. Torque. III. Kinetic Energy. IV Momentum. Which of the quantities listed above are vectors?",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.884Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "zD6xAkQfRgI27Bg4eR4a",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. incredulous",
        //             "B. credible",
        //             "C. incredible",
        //             "D. credulous"
        //         ],
        //         "text": "Choose the option nearest in meaning to the quoted words:\nThe story told by the suspect was \"difficult to believe\"",
        //         "explanation": "The option nearest in meaning to \"difficult to believe\" is:\n\nC. incredible.",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:39:16.386Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "zGe2wpX2vLRfGV70cWQf",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. a brain trust",
        //             "B. a tribunal",
        //             "C. an inquiring",
        //             "D. a task force"
        //         ],
        //         "text": "Choose the expression or word which best complete each sentences:\n\nThe Nigerian society of Engineers has set up .... to study the nation's problems",
        //         "explanation": "The full sentence is: \"The Nigerian Society of Engineers has set up a task force to study the nation's problems.\"",
        //         "type": "mock",
        //         "timestamp": "2024-09-11T11:56:54.567Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "zHwfmjSzMMI8gYH5B8Yk",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "A. Private ownership of factors of production",
        //             "B. The right to organize factors for productive purposes",
        //             "C. The right to make private profit",
        //             "D. Government's control of the mobility of"
        //         ],
        //         "text": "32. Which of these would not be included in the fundamental principles of a free enterprise economy?",
        //         "type": "mock",
        //         "timestamp": "2024-09-15T15:47:44.263Z",
        //         "explanation": "In a free market, factors of production (land, labor, capital) move freely without government restriction.\n",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "zZMRfbUPvGe8vTTGoZJb",
        //         "week": "1",
        //         "answer": 1,
        //         "options": [
        //             "A. a regressive tax",
        //             "B. a progressive tax",
        //             "C. a proportional tax",
        //             "D. an indirect tax"
        //         ],
        //         "text": "18. A tax which takes a higher percentage from higher incomes is called",
        //         "type": "mock",
        //         "timestamp": "2024-09-15T15:23:39.605Z",
        //         "explanation": "Progressive taxation increases with income level.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "zdhFSFiatud8zKXGmzAn",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. mass of the solid compared to the mass of an equal volume of water",
        //             "B. amount of water displaced when a unit mass of thesolid is immersed in it",
        //             "C. weight per unit volume of the solid",
        //             "D. mass per unit volume of the solid"
        //         ],
        //         "text": "The density of a solid is defined as the",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T21:32:23.209Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "zgqHzFMhFjYZbWKwt9ao",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. 838m",
        //             "B. 3350m",
        //             "C. 670m",
        //             "D. 1675m"
        //         ],
        //         "text": "An air force jet flying with a speed of 335ms-1 went past an anti-aircraft gun. How far is the aircraft 5s later when the gun was fired?",
        //         "explanation": "Distance covered = speed x time\n= 335 x 5\n= 1675m",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T21:05:39.113Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "zpMNBO9JuaGPhEHVxbHQ",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. the birth rate is high",
        //             "B. the death rate is low",
        //             "C. the growth rate is high",
        //             "D. the population is increasing more than the resources of the country"
        //         ],
        //         "text": "19. The country will be over populated when",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:17:12.973Z",
        //         "explanation": "Overpopulation happens when resources can't sustain the population adequately.",
        //         "consecutiveCorrectAttempts": "1"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "lYXbA1RoVylGTHSBOEQt",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "Antioch",
        //             "Joppa",
        //             "Jerusalem",
        //             "The Temple"
        //         ],
        //         "text": "Where were the disciples first called christian?",
        //         "type": "mock",
        //         "timestamp": "2024-09-08T16:55:21.520Z",
        //         "explanation": "The correct answer is: Antioch.\n\n  The disciples were first called Christians in Antioch, as recorded in Acts 11:26:\n\n\"And when he had found him, he brought him to Antioch. So it was that for a whole year they assembled with the church and taught a great many people. And the disciples were first called Christians in Antioch.\"\n\nThis name was likely given by outsiders to describe followers of Jesus Christ. The term \"Christian\" means \"follower of Christ\" or \"belonging to Christ.\"",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "li0OaSR34znCqhSrBBQ6",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "Oscilatory motion",
        //             "Rotational motion",
        //             "Circular motion",
        //             "Random motion"
        //         ],
        //         "text": "The motion of smoke particles from a chimny is typical of",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.908Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "UaSQMQzLCGbZW3T95B8IKjZQPXb2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "lvtIO1uvgcfupJc93fyr",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "A. the lowest cost of producing goods",
        //             "B. the cost of production of the most efficient firm in an industry",
        //             "C. the cost of production of the most inefficient firm in an industry",
        //             "D. the cost of production of the last or extra unit of goods produced by a firm"
        //         ],
        //         "text": "26. Marginal cost is",
        //         "type": "mock",
        //         "timestamp": "2024-09-15T15:37:39.278Z",
        //         "explanation": "Marginal cost measures the additional cost of producing one more unit.\n",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "lwhKcifZ7U963Rd6uIXA",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "Solomon",
        //             "Jeroboam",
        //             "Rehoboam",
        //             "Absalom"
        //         ],
        //         "text": "My father chastised you with whips,but i will chastise you with scorpion\". Who said this?",
        //         "type": "mock",
        //         "timestamp": "2024-09-08T16:30:16.170Z",
        //         "explanation": "The phrase, \"My father chastised you with whips, but I will chastise you with scorpions,\" was said by Rehoboam (1 Kings 12:11).\n\nRehoboam, the son of Solomon, made this statement when the people of Israel asked him to lighten the heavy yoke that Solomon had placed on them. Rehoboam's harsh response led to the division of the kingdom, with ten tribes rebelling and forming the northern kingdom of Israel, while only Judah and Benjamin remained loyal to him.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "m1yXYPuVszPbwL2GVJnV",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. 36oF",
        //             "B. 68oF",
        //             "C. 11.1oF",
        //             "D. 43.1oF"
        //         ],
        //         "text": "A temperature 20°C is the same as",
        //         "explanation": "212°F ... 100°C\n\nθ\n°F ... 20°C\n\n32°F ... 0°C\n\nθ−32212−32\n = 20−0100−0\n180 = 5(θ\n - 32)\n\n5θ\n = 180 + 160 = 340\n\nθ\n = 68°F",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T21:39:52.557Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "mYOVynjzV0mnl6cSXNCU",
        //         "week": "1",
        //         "answer": 1,
        //         "options": [
        //             "Energy",
        //             "Momentum",
        //             "Surface Tension",
        //             "Pressure"
        //         ],
        //         "text": "The physical quantity that has the same dimensions as impulse is",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.860Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "UaSQMQzLCGbZW3T95B8IKjZQPXb2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "mZIXX1TlLB7ATy6rCKkJ",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "he broke down the altar of Baal",
        //             "he defeated the Midianites",
        //             "he sacrificed to Baal",
        //             "the people did not like him"
        //         ],
        //         "text": "Gideon was called Jerubbaal because",
        //         "type": "mock",
        //         "timestamp": "2024-09-08T16:18:47.448Z",
        //         "explanation": "Gideon was called Jerubbaal because he broke down the altar of Baal (Judges 6:32).\n\nThe name \"Jerubbaal\" means \"Let Baal contend,\" which was given to Gideon after he destroyed the altar of Baal in his father's house. The people of the town were angry and wanted to kill him for this act, but Gideon's father, Joash, defended him, saying that if Baal was truly a god, he could contend for himself.\n\nThis action marked the beginning of Gideon's role as a judge and leader of Israel.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "mkUJ0hVEbYKQQtuUDYfq",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "A. humanitarian",
        //             "B. humanist",
        //             "C. humanity",
        //             "D. humanistic"
        //         ],
        //         "text": "Choose the expression or word which best complete each sentences:\nThe governor commended the society's .... services to the nation",
        //         "explanation": "The full sentence is: \"The governor commended the society's humanitarian services to the nation.\"",
        //         "type": "mock",
        //         "timestamp": "2024-09-11T11:50:32.152Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "mxtBLilGSuWj7IGkDbDX",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "Micro-meter screwguage",
        //             "Pair of Dividers",
        //             "Meter rule",
        //             "Pair of Venier Calipers"
        //         ],
        //         "text": "The inner diameter of a small test-tube can be measured accurately using a",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.862Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "UaSQMQzLCGbZW3T95B8IKjZQPXb2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "nMSyIeredyd1teGk1uTD",
        //         "week": "1",
        //         "answer": 0,
        //         "options": [
        //             "ML2T-3",
        //             "ML4T-3",
        //             "MLT-2",
        //             "MLT-3"
        //         ],
        //         "text": "The dimension of Power is",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.891Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "UaSQMQzLCGbZW3T95B8IKjZQPXb2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "nTh6QpIHwEUp4j332bXY",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "Joshua",
        //             "Hosea",
        //             "Amos",
        //             "Gideon"
        //         ],
        //         "text": ".....made the following statement:\"But as for me and my house,we will serve the Lord\"",
        //         "type": "mock",
        //         "timestamp": "2024-09-08T16:15:05.862Z",
        //         "explanation": "The statement \"But as for me and my house, we will serve the Lord\" was made by Joshua (Joshua 24:15).\n\nJoshua made this declaration during a speech to the Israelites, urging them to choose whom they would serve, whether the gods of their ancestors or the true God. He personally committed his household to serving the Lord, setting an example for the people to follow.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "nYPFArjfgDn0ogHRDWC5",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. the idea is firmly fixed through repetition",
        //             "B. the person suddenly comes upon the idea",
        //             "C. the person thinks over the idea",
        //             "D. the idea yields concrete result"
        //         ],
        //         "text": "Choose the option nearest in meaning to the underlined statement or words:\nOne of the stages of the creative process is the \"incubation period\"",
        //         "explanation": "The option nearest in meaning to the \"incubation period\" in the creative process is:\n\nC. the person thinks over the idea.",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:57:04.381Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "nh6oi4dxfDCnYkp1J1sY",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "A. Money in the tills of the bank",
        //             "B. Money at call",
        //             "C. Treasury certificates",
        //             "D. Bills of exchange"
        //         ],
        //         "text": "33. Which of the following assets of a commercial bank does not yield revenue?",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:37:39.683Z",
        //         "explanation": "Cash in tills does not generate revenue.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "nzM0Vm7huE4OaSQKbtJ4",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "A. trade done by people in villages",
        //             "B. exchange of goods for money",
        //             "C. international trade",
        //             "D. exchange of goods for goods"
        //         ],
        //         "text": "39. By 'trade by barter', we mean",
        //         "type": "mock",
        //         "timestamp": "2024-09-15T15:56:40.731Z",
        //         "explanation": "Barter trade is a system where goods and services are exchanged directly without using money. This was common in ancient economies before the introduction of currency.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "o3hnF8vYIMjCc2y4AbQL",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. like charges repel each other",
        //             "B. a charged particle is deflected by an eletric field",
        //             "C. like charges are arranged on the same line of force",
        //             "D. a positively charged particle can travel in only one direction at any time"
        //         ],
        //         "text": "Why is it impossible for the lines of force of an electric field to cross one another?",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T22:01:48.514Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "oW2hNXFDkMmrj46RPZps",
        //         "week": "1",
        //         "answer": 2,
        //         "options": [
        //             "Slantingly towards the left on the markings",
        //             "Slantingly towards the right of the markings",
        //             "Vertically downwards on the markings",
        //             "Vertically upwards on the markings"
        //         ],
        //         "text": "In order to remove the error of parallax when taking measurement with a meter rule the eye should be focused",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.876Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "p5Jxo0PkcBBA1zhwXLag",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. the total cost of production",
        //             "B. the extra cost of producing one additional unit of output",
        //             "C. the cost of producing a unit of output",
        //             "D. variable cost"
        //         ],
        //         "text": "15. Average Cost is",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:12:43.199Z",
        //         "explanation": "Average cost is total cost divided by the number of units produced.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "pFHvFRla6KWPaohDCTzm",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. the tension in the string decreases as the solid is lifted",
        //             "B. the mass of the solid has increased",
        //             "C. the solid apparently weighs less when completely immersed in water than when partially immersed",
        //             "D. part of the solid still in water is exerting more force on the string"
        //         ],
        //         "text": "A solid suspended by a piece of string is completely immersed in water. On attempting to lift the solid out of the water, the string breaks when the solid is partly out of the water. This is because",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T21:33:55.698Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "piB7sI426s0RsH5Oc1wk",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. inheritance",
        //             "B. remnants",
        //             "C. legacies",
        //             "D. evidence"
        //         ],
        //         "text": "Choose the word/expression which best completes each sentence:\nThe giant hydro-electric project is among the .... of colonial rule in Southern Africa.",
        //         "explanation": "The complete sentence would be: \"The giant hydro-electric project is among the legacies of colonial rule in Southern Africa.\"\n\nA \"legacy\" refers to something left behind or inherited from the past, often used in the context of historical or cultural influence. In this case, the hydro-electric project is seen as one of the enduring outcomes or legacies of colonial rule in Southern Africa.",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:58:05.973Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "q9mGNHF9kflF6jzlTSzR",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "1.0mm",
        //             "0.5mm",
        //             "0.1mm",
        //             "0.1m"
        //         ],
        //         "text": "What is the least possible error encountered when taking measurment with a meter rule?",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.878Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "s5pxHWNoVjhleR9c6qss",
        //         "week": "1",
        //         "answer": 0,
        //         "options": [
        //             "1.88cm",
        //             "1.80cm",
        //             "1.28cm",
        //             "1.97mm"
        //         ],
        //         "text": "What is the reading of a Vernier Scale above",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.832Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "s8lOdQaVWRL9ATynE1IQ",
        //         "week": "1",
        //         "answer": 0,
        //         "options": [
        //             "Distance",
        //             "Displacement",
        //             "Mass",
        //             "Temperature"
        //         ],
        //         "text": "A quantity which requires magnitude and Direction to be specified",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.880Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "svaCu2g4acaIGuKo2SFo",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A.there are many sellers and a few buyers",
        //             "B.goods are sold at different prices",
        //             "C. entry is not blocked, but no one cares to enter",
        //             "D. none of above"
        //         ],
        //         "text": "32. Pure monopoly describes a market where",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:36:42.967Z",
        //         "explanation": "Pure monopoly is characterized by a single seller with no close substitutes.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "t6Sm8RBhnAIKVR1hEYjk",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "I and II only",
        //             "I, II, and III only",
        //             "I, II and IV only",
        //             "I and III only"
        //         ],
        //         "text": "\tWhich of the following is the correct SI units of the quantities indicated (I) N (Force) (II) 〖Nm〗^(-1)  Torque (III) Watt (Power) (IV) 〖Kgms〗^(-2)  (Momentum) ",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.893Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "tHy75vOhj4Y7kSlf9Gk3",
        //         "week": "1",
        //         "answer": 1,
        //         "options": [
        //             "A. personal income minus personal saving",
        //             "B. personal income minus taxes",
        //             "C. national income minus depreciation",
        //             "D. exports minus imports"
        //         ],
        //         "text": "25. Disposable income is the same thing as",
        //         "type": "mock",
        //         "timestamp": "2024-09-15T15:33:54.211Z",
        //         "explanation": "Disposable income is the money left after tax deductions.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "tIfQuf1uLgjsC1CouYgj",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. a change in real income",
        //             "B. changes in the technique of production",
        //             "C. a change of fashion or taste",
        //             "D. changes in the price of the commodity itself"
        //         ],
        //         "text": "5. One of the reasons why the conditions of supply of a commodity may change is",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:01:38.033Z",
        //         "explanation": "Better technology improves efficiency and increases supply.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "txQwmR2Ybf6Ei8YvlkXO",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. would not be",
        //             "B. would have not be",
        //             "C. would not been",
        //             "D. would not have been"
        //         ],
        //         "explanation": "The correct option is ''would not have been''.\n\nWould is a conditional mood. “Have + been” marks the past tense. As you may know, conditional grammar expresses an idea that is not real. It didn't happen",
        //         "type": "mock",
        //         "timestamp": "2024-09-10T11:34:29.070Z",
        //         "text": "Choose the expression or word which best complete each sentence:\n\nIf he had left home earlier, he .... late",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "u7jAr0EIE5U5ZAzP2Vwj",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. the interest rate charged on bank loans",
        //             "B. the general price level",
        //             "C. the size of a country's gold stock",
        //             "D. the level of economic development in a country"
        //         ],
        //         "text": "20. The value of money is generally measured by reference to",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:20:24.407Z",
        //         "explanation": "The value of money is inversely related to the price level; when prices rise, money's value falls.\n",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "uAb6hno73SMI8H7aG1KM",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. around",
        //             "B. in about",
        //             "C. during",
        //             "D. for"
        //         ],
        //         "text": "Choose the word/expression which best completes each sentence:\nHe played the piano .... an hour or two",
        //         "explanation": "The choice \"for\" is used to indicate the duration of an action. In this case, the sentence expresses how long he played the piano. So, \"for\" is the appropriate preposition to convey the duration of time. The correct sentence would be \"He played the piano for an hour or two,\" meaning he played the piano throughout the duration of one or two hours.",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T19:04:22.346Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "uDCfaJT4j5WZc3IYsjSo",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. visible trade",
        //             "B. invisible trade",
        //             "C. balance of payments",
        //             "D. balance of trade"
        //         ],
        //         "text": "22.The total value of goods and services sold and bought by a country across its border during a given period, usually a year, is known as",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:22:38.043Z",
        //         "explanation": "It records all economic transactions between residents of a country and the rest of the world.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "guVKkI5DZt5phbxT3q9l",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. provided",
        //             "B. should in case",
        //             "C. although",
        //             "D. in case"
        //         ],
        //         "text": "Choose the word/expression which best completes each sentence:\nWe ought to stay away .... the robbers come back",
        //         "explanation": "The word that best completes the sentence is:\n\nD. in case",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T13:04:19.997Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "hdII5mgH5qhpFj3fmdQu",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. bitterness",
        //             "B. dislike",
        //             "C. criticism",
        //             "D. indignation"
        //         ],
        //         "text": "Choose the option nearest in meaning to the quoted word:\nDo you have the same \"aversion\" as I do for way film?",
        //         "explanation": "Aversion simply means a strong dislike for something or someone.\n\nThe option nearest in meaning from the given options is option B ''dislike''.",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:32:27.977Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "hehjdsiQwOx6uvbqutlS",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. regulates supply and demand",
        //             "B.rations the consumers",
        //             "C.rewards the producers",
        //             "D. allocates scarce resources"
        //         ],
        //         "text": "40. The price mechanism",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:47:23.504Z",
        //         "explanation": "The price mechanism helps in distributing scarce resources efficiently.\n",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "hhAEVqFgUy23LpweAkGj",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. Company income tax",
        //             "B. Capital tax",
        //             "C. Purchase tax",
        //             "D. Personal income tax"
        //         ],
        //         "text": "11. Which of the following is not a direct tax?",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:08:16.343Z",
        //         "explanation": "Direct taxes are levied on income and profits, while purchase tax is an indirect tax collected at the point of sale.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "hzIvouFSrm5HMIYdg8YN",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. Wages earned by doctors",
        //             "B.Rent paid to landlords",
        //             "C. Indirect taxes",
        //             "D. Undistributed company profits"
        //         ],
        //         "text": "34. Which of the following is not a component of National Income at factor cost?",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:38:51.441Z",
        //         "explanation": "Indirect taxes are not included in National Income at factor cost.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "i1blnohjX3ydkBb0nnxE",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "saviour",
        //             "anointed",
        //             "son of David",
        //             "son of God"
        //         ],
        //         "text": "The title Christ means",
        //         "explanation": "The title \"Christ\" means \"anointed.\" It is derived from the Greek word \"Christos,\" which translates the Hebrew word \"Messiah.\" In both Greek and Hebrew, the term carries the significance of being consecrated or anointed, often referring to a chosen and divinely appointed person for a specific role or task.",
        //         "type": "mock",
        //         "timestamp": "2024-09-08T16:56:44.908Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "iBI8S5YZtbFG8FZhFtMW",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. whether could she meet him later",
        //             "B. could she meet him later",
        //             "C. if she could meet him later",
        //             "D. she could meet him later"
        //         ],
        //         "text": "Choose the expression or word which best complete each sentences:\nJane asked James ....",
        //         "explanation": "The full sentence is: \"Jane asked James if she could meet him later.\"",
        //         "type": "mock",
        //         "timestamp": "2024-09-11T10:35:52.441Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "iEiQE38ajr8X1XqtRjsi",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. careful",
        //             "B. precise",
        //             "C. accurate",
        //             "D. exact"
        //         ],
        //         "text": "Choose the option nearest in meaning to the quoted words:\nHis summary of the meeting was \"brief and to the point\"",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:28:25.755Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "iJa9Al2glgOoj4mqlgv6",
        //         "week": "1",
        //         "answer": 1,
        //         "options": [
        //             "A. graded commodities like wheat, coffee etc. are sold and bought",
        //             "B. currencies are sold and bought",
        //             "C. treasury bills are sold and bought",
        //             "D. Government bonds are sold and bought"
        //         ],
        //         "text": "14. The Foreign Exchange Market is a market where",
        //         "type": "mock",
        //         "timestamp": "2024-09-15T15:19:10.308Z",
        //         "explanation": "It facilitates currency exchange.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "iZH27KqCABGBsoosWGaC",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. I'm living",
        //             "B. I'd be living",
        //             "C. I'll live",
        //             "D. I'll have lived"
        //         ],
        //         "explanation": "The correct option is D. The statement 'By the end of this year, i will have lived in this town for eleven years' is a future perfect tense. A future perfect tense is a combination of future time and the present perfect tense. This means, the speaker has been living and still lives in the town, and by the end of the year it will be eleven years since he started living in the town.",
        //         "type": "mock",
        //         "timestamp": "2024-09-10T11:33:04.944Z",
        //         "text": "Choose the expression or word which best complete each sentence:\n\nBy the end of this year, .... in this town for eleven years",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "icjKxQmmn5FLeGk6R6k6",
        //         "week": "1",
        //         "answer": 1,
        //         "options": [
        //             "He is his friend",
        //             "Of his importunity",
        //             "He has awaken him",
        //             "He is sorry for him"
        //         ],
        //         "text": "In the parable of the friend at the midnight, the man will get up and assist him because",
        //         "type": "mock",
        //         "timestamp": "2024-09-07T13:18:57.368Z",
        //         "explanation": "  In the Parable of the Friend at Midnight, the man will get up and assist his friend because of his importunity.\n\n    In this parable, a man visits his friend at midnight, seeking three loaves of bread to offer to an unexpected guest. Despite the late hour and the inconvenience, the friend inside initially refuses, citing the locked door and his family being in bed. However, due to the persistent and shameless boldness of the visitor, the friend eventually agrees to help. This is highlighted in Luke 11:8:\n\n\"I tell you, though he will not get up and give him anything because he is his friend, yet because of his impudence he will rise and give him whatever he needs.\" \n\n\n   Note: The term \"impudence\" (or \"importunity\" in some translations) refers to shameless persistence or boldness. This quality compels the friend to act, not out of friendship, but because of the relentless and unabashed request.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "iepDIMnpfkT9uFTZSjyz",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. at",
        //             "B. of",
        //             "C. from",
        //             "D. with"
        //         ],
        //         "text": "Choose the expression or word which best complete each sentences:\n\nIf the company had any delay at the customs office, it was .... their own making",
        //         "explanation": "The full sentence is: \"If the company had any delay at the customs office, it was of their own making.\"",
        //         "type": "mock",
        //         "timestamp": "2024-09-11T10:50:28.058Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "iotAUtJq8rcpGNd8SwhU",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "A. the index of refraction only",
        //             "B. the angle of incidence as well as the index of refraction",
        //             "C. the angle of incidence only",
        //             "D. the thickness of the prism"
        //         ],
        //         "text": "The angular dispersion of a prism depends on",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T22:17:51.674Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "ioz6qlTAVU5hMGL3iAOL",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "Jews and Gentiles should eat separately",
        //             "Gentiles should abstain from alcohol",
        //             "Gentiles should be circumcised",
        //             "Gentiles should abstain from what is strangled"
        //         ],
        //         "text": "One of the resolution of the Jerusalem council was",
        //         "explanation": "You must abstain from things sacrificed to idols, from blood, from things strangled, and from fornication. Acts 15:29",
        //         "type": "mock",
        //         "timestamp": "2024-09-08T17:05:23.621Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "isk4GnPRE98QYtuFvFKI",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. i",
        //             "B. ii",
        //             "C. iii",
        //             "D. iv"
        //         ],
        //         "text": "The following are some units \ni. Ns \nii. Mm \niii. Nm−2\niv. JKg−1\nwhat are the units of latent heat?",
        //         "explanation": "L=specific latent heat of a substance\n \nL = QM\ni.e unit is JKg−1",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T21:44:35.308Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "iwxsMgcKEmEyBVEP3tjB",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "gave the same amonut to all",
        //             "gave more to those called first",
        //             "gave more to those called last",
        //             "did not do what he has promised"
        //         ],
        //         "text": "In the parable of the labourers in the vineyard the owner",
        //         "type": "mock",
        //         "timestamp": "2024-09-08T16:48:03.600Z",
        //         "explanation": "The correct answer is: \"Gave the same amount to all.\"\n\nThe Parable of the Labourers in the Vineyard is found in Matthew 20:1-16. In the story, a landowner hires workers at different times of the day—some early in the morning, some at midday, and others in the late afternoon. However, when it was time to pay them, he gave each worker the same wage, regardless of how long they had worked.  \"And when evening came, the owner of the vineyard said to his foreman, ‘Call the laborers and pay them their wages, beginning with the last, up to the first.’ And when those hired about the eleventh hour came, each of them received a denarius. Now when those hired first came, they thought they would receive more, but each of them also received a denarius.\" (Matthew 20:8-10, ESV)\n\nMeaning of the Parable:\nThis parable teaches about God’s grace and generosity.\nThe wages symbolize eternal life, which God gives freely to all who come to Him, whether early or late in life.\nIt challenges human ideas of fairness by showing that God's ways are different from human ways.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "jQ2BEWfLT00lSDtEYJUk",
        //         "week": "1",
        //         "answer": 1,
        //         "options": [
        //             "-1,1,2",
        //             "1,1,-2",
        //             "1,-1,2",
        //             "-1,1,-2"
        //         ],
        //         "text": "At what respective values of X, Y and Z would the unit of force, the newton, be dimensionally equivalent to MxLyTz?",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.859Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "UaSQMQzLCGbZW3T95B8IKjZQPXb2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "jh1M7ez8nGgfOjVm8JMF",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "compassionate and loving",
        //             "revealing himself to us",
        //             "present everywhere",
        //             "all knowing"
        //         ],
        //         "text": "The story of the prodigal son indicate that God is",
        //         "type": "mock",
        //         "timestamp": "2024-09-08T16:58:29.738Z",
        //         "explanation": "The correct answer is: \"God is compassionate and loving.\"\n\n  The story of the Prodigal Son is found in Luke 15:11-32. It tells of a younger son who took his inheritance, wasted it on reckless living, and later returned home in repentance. Instead of punishing him, the father ran to embrace him, forgave him, and welcomed him back with a feast.\n\nThis parable illustrates God’s compassion, love, and willingness to forgive sinners who repent. Just as the father in the story showed unconditional love, so does God toward those who turn back to Him.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "k1LLqO1SLvKqrRWfkBxn",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. the foreign exchange rate",
        //             "B. deflation",
        //             "C. exchange control",
        //             "D. none of the above"
        //         ],
        //         "text": "28. The lowering of the exchange rate between a country's currency and other currencies is known as",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:31:36.762Z",
        //         "explanation": "The correct term is \"devaluation\" or \"depreciation.\"",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "k4KevSffwqXUteEiEWxH",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "A. newspaper",
        //             "B. paper for printing",
        //             "C. printers' salaries and wages",
        //             "D. fines for publishing libels"
        //         ],
        //         "text": "Choose the option nearest in meaning to the quoted word:\nPublishers say that \"newsprint\" has become more expensive",
        //         "explanation": "The option nearest in meaning to \"newsprint\" is:\n\nB. paper for printing.",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:40:41.391Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "k8NbaQdtpu0e7rY6d44r",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. Ordinary shares",
        //             "B. Preference shares",
        //             "C. Cumulative preference shares",
        //             "D. Debentures"
        //         ],
        //         "text": "23. Which of the following types of capital is not rewarded by means of dividends?",
        //         "type": "mock",
        //         "timestamp": "2024-09-17T09:24:28.782Z",
        //         "explanation": "Debenture holders receive interest, not dividends.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "kAhmNsA5jPTWt8ePuq4h",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "A. from",
        //             "B. of",
        //             "C. for",
        //             "D. with"
        //         ],
        //         "explanation": "The complete sentence is: \"My little boy is suffering from jaundice.\"",
        //         "type": "mock",
        //         "timestamp": "2024-09-10T11:30:24.191Z",
        //         "text": "Choose the expression or word which best complete each sentence:\nMy little boy is suffering .... jaundice",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "kCQIaXDB15i7NF6EwOC2",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "A. blown up",
        //             "B. blown down",
        //             "C. blown off",
        //             "D. blown over"
        //         ],
        //         "explanation": "The complete sentence is: \"The bridge connecting the two cities was blown up by the enemy.\"",
        //         "type": "mock",
        //         "timestamp": "2024-09-10T11:28:58.938Z",
        //         "text": "Choose the expression or word which best complete each sentence:\nThe bridge connecting the two cities was .... by the enemy",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "kuIKpVGDxEKNjHscvWVJ",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. 170ms-1",
        //             "B. 136ms-1",
        //             "C. 340ms-1",
        //             "D. 680ms-1"
        //         ],
        //         "text": "A herdsman yelling out to fellow herdsman heard his voice reflected by cliff 4s later. What is the velocity of sound in air if the cliff is 680m away?",
        //         "explanation": "Velocity = distance/time\n\n\necho time = halt total time\n\n= 12\n x 4 = 25\n\nvelocity = 680/2\n\n\n= 340ms-1",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T22:13:29.073Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "kybijPeKADRBj7H1efYg",
        //         "week": "1",
        //         "answer": 0,
        //         "options": [
        //             "A. X and Y are complementary goods",
        //             "B. X and Y are  substitute goods",
        //             "C. X and Y are independent goods",
        //             "D. X and Y are jointly supplied"
        //         ],
        //         "text": "35. If consumer's demand for product X increases as the price of product Y decreases, we can be fairly certain that",
        //         "type": "mock",
        //         "timestamp": "2024-09-15T15:51:11.834Z",
        //         "explanation": "Complementary goods are products that are used together, such as cars and gasoline. When the price of one decreases, the demand for the other increases because they are consumed jointly.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "l1xXfEkitnn37R6mRsVu",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "Amos",
        //             "Hosea",
        //             "Micah",
        //             "Ezekiel"
        //         ],
        //         "text": "The Prophet who was with the exiles of 597 BC in Babylon was",
        //         "type": "mock",
        //         "timestamp": "2024-09-07T13:34:31.997Z",
        //         "explanation": "Ezekiel was a priest and prophet who was among the first group of exiles taken to Babylon in 597 BC, during the reign of King Jehoiachin. He was deported along with approximately 10,000 other Jews, including King Jehoiachin himself. This event is recorded in 2 Kings 24:14:\n\n\"He carried into exile all the officers and fighting men, and all the craftsmen and artisans—a total of ten thousand. Only the poorest people of the land were left.\"\n\nIn Babylon, Ezekiel received his prophetic call and began his ministry, delivering messages from God to the exiled Israelites. His prophecies are recorded in the Book of Ezekiel, which includes visions, symbolic actions, and oracles concerning the fate of Judah, Jerusalem, and the nations.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "l8sEgDw9qoq5mpGBKqJn",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. hypothetical",
        //             "B. essential",
        //             "C. hypocritical",
        //             "D. necessary"
        //         ],
        //         "text": "Choose the expression or word which best complete each sentences:\nAfter our series of quarrels, it would be ....to pretend that i have any more regard for him",
        //         "explanation": "The full sentence is: \"After our series of quarrels, it would be hypocritical to pretend that I have any more regard for him.\"",
        //         "type": "mock",
        //         "timestamp": "2024-09-11T10:42:49.307Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "lHwwWBhrqAQE3rzpPoTk",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. 10 ohms",
        //             "B. 1 ohms",
        //             "C. zero",
        //             "D. infinite"
        //         ],
        //         "text": "In a D.C. circuit, a 10 microfarad (mf) capacitor is placed in series with a 10 0hm resistor. The total resistance of the combination is",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T21:59:15.467Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "1oJlwLsfeG2JoQsOT5tP",
        //         "questionid": "lN119RXazkl3t47xQMov",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "A. increase",
        //             "B. remain constant",
        //             "C. fluctuate",
        //             "D. decrease"
        //         ],
        //         "text": "28. As consumption of beer increases, its marginal utility to a drinker will",
        //         "type": "mock",
        //         "timestamp": "2024-09-15T15:41:09.882Z",
        //         "explanation": "The law of diminishing marginal utility states that additional consumption leads to reduced satisfaction.\n",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "lVzf7KYnqHli36FtHE1c",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "Newton",
        //             "Watt",
        //             "Joule",
        //             "Second"
        //         ],
        //         "text": "Which of the following is a fundamental unit?",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.836Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "UaSQMQzLCGbZW3T95B8IKjZQPXb2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "fLrPNTFCGFS7T4bYYvc6",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "I and II only",
        //             "I and III only",
        //             "I, II and III only",
        //             "I, III and IV only"
        //         ],
        //         "text": "I.Force (N) II.torque (Nm-1) III.Current (A) IV.power (W). Which of the above are the correct S.I unit of the qunatities indicated?",
        //         "explanation": "",
        //         "type": "mock",
        //         "timestamp": "2024-02-07T14:52:01.871Z",
        //         "users": [
        //             "lALqIGowQPfyEvt55QSSQHY8mwS2",
        //             "BsB92FedbdYYgE7nUjp1sggWWFV2",
        //             "Cfg4lYumf9eN48g4awccYqdq1zC2",
        //             "UaSQMQzLCGbZW3T95B8IKjZQPXb2",
        //             "4b3QRTJRL5eU3OwkPFq72owtaRv2"
        //         ],
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "fUDqhOiVpu53UEKxstnZ",
        //         "week": "1",
        //         "options": [
        //             "Disorder in Isreal after the fall of Jeroboam II",
        //             "Razin's attack of Judah",
        //             "Ahaz's conspiracy with Rezin",
        //             "Samaria being besieged and sacked"
        //         ],
        //         "text": "The fall of the Northern Kingdom was due to",
        //         "type": "mock",
        //         "timestamp": "2024-09-07T14:17:19.103Z",
        //         "answer": 3,
        //         "explanation": "The fall of the Northern Kingdom of Israel culminated in the siege and capture of its capital, Samaria, by the Assyrian Empire. This event marked the definitive end of the kingdom. The Assyrians, under King Shalmaneser V, initiated the siege, which lasted for about three years. After Shalmaneser's death, his successor, Sargon II, completed the conquest around 720 BCE. Following the capture, a significant portion of the Israelite population was deported, leading to the dispersion of the so-called \"Ten Lost Tribes.\"",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "fhQbjAui8gG9Q4I1pjK9",
        //         "week": "2",
        //         "answer": 1,
        //         "options": [
        //             "The King of Assyriah",
        //             "the King of Babylon",
        //             "the King of Egypt",
        //             "The Phillistines"
        //         ],
        //         "text": "The kingdom of Judah was finally defeated by",
        //         "type": "mock",
        //         "timestamp": "2024-09-08T16:35:02.937Z",
        //         "explanation": "The kingdom of Judah was finally defeated by the King of Babylon, specifically King Nebuchadnezzar. This occurred after a siege of Jerusalem, leading to the city's fall in 586 BC (2 Kings 25:1-21). The Babylonians destroyed the temple and carried many of the people into exile, marking the beginning of the Babylonian Captivity.\n\n   The other options—Assyria, Egypt, and the Philistines—were involved in different conflicts, but it was Babylon that conquered Judah in the end.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "BRUici1R3kf9w4OhTkTT",
        //         "questionid": "fntTSe3k7f8X6uO63NNO",
        //         "week": "2",
        //         "answer": 3,
        //         "options": [
        //             "A. exists only when there is relative motion or tendency for motion",
        //             "B. acts so as to oppose the motion",
        //             "C. depends on the normal reaction between the two surfaces",
        //             "D. has all of these characteristics"
        //         ],
        //         "text": "The frictional force between two bodies?",
        //         "explanation": "Frictional force is the opposing force that is created between two surfaces that try to move in the same direction or that try to move in opposite directions.\n\nThe main purpose of a frictional force is to create resistance to the motion of one surface over the other surface.",
        //         "type": "mock",
        //         "timestamp": "2024-10-03T21:03:46.726Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "fvnmSHhKN7dj4Z0DQR9N",
        //         "week": "1",
        //         "answer": 3,
        //         "options": [
        //             "The miracle worker",
        //             "The lion of Judah",
        //             "The giver of the laws",
        //             "The father of the faithful"
        //         ],
        //         "text": "Abraham is portrayed in the bible as",
        //         "type": "mock",
        //         "timestamp": "2024-09-07T12:29:36.779Z",
        //         "explanation": "Abraham is portrayed in the Bible as the \"father of the faithful\" due to his exemplary faith and unwavering trust in God. His life serves as a model of faithfulness for believers.\n\nIn the New Testament, the Apostle Paul emphasizes Abraham's role as the father of all who believe. In Romans 4:11, Paul states that Abraham is \"the father of all who believe but have not been circumcised, in order that righteousness might be credited to them.\" This highlights that Abraham's faith was credited to him as righteousness, making him a spiritual ancestor to all who exhibit faith, regardless of their cultural or religious background.\n\nSimilarly, in Galatians 3:6-9, Paul writes, \"So those who rely on faith are blessed along with Abraham, the man of faith.\" This passage underscores that believers who exhibit faith are considered spiritual descendants of Abraham, sharing in the blessings promised to him.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "gGnudZbH15Ltj5QxoMS7",
        //         "week": "2",
        //         "answer": 0,
        //         "options": [
        //             "Jeremiah",
        //             "Isaiah",
        //             "Ezekiel",
        //             "Amos"
        //         ],
        //         "text": "\"Bring your necks under the yoke of the king of Babylon and serve him and his people and live\" who gave this advice?",
        //         "type": "mock",
        //         "timestamp": "2024-09-08T16:20:00.115Z",
        //         "explanation": "The advice, \"Bring your necks under the yoke of the king of Babylon and serve him and his people and live,\" was given by Jeremiah (Jeremiah 27:12).\n\nJeremiah advised the people of Judah to submit to Babylonian rule as part of God's plan, warning them that resisting would lead to destruction. This message was contrary to the false prophets of the time who promised deliverance from Babylon.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "Sqn3YPikF2m4lm9qsPoM",
        //         "questionid": "gMsk5TvEpGXqm1lfc7gt",
        //         "week": "2",
        //         "answer": 2,
        //         "options": [
        //             "A. Large",
        //             "B. huge",
        //             "C. warm",
        //             "D. placid"
        //         ],
        //         "text": "Choose the option nearest in meaning to the quoted statement or words:\nHe has a \"big heart\" but he inept at following a witty conversion",
        //         "explanation": "The option nearest in meaning to \"He has a big heart\" in the context of someone being warm or kind-hearted is:\n\nC. warm.",
        //         "type": "mock",
        //         "timestamp": "2024-09-12T12:54:08.547Z",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "gQGXxoT01sIMgD11WbI5",
        //         "week": "1",
        //         "answer": 0,
        //         "options": [
        //             "Rebekah",
        //             "Rachel",
        //             "Leah",
        //             "Bilhah"
        //         ],
        //         "text": "Who was Isaac's wife?",
        //         "type": "mock",
        //         "timestamp": "2024-09-07T13:24:44.147Z",
        //         "explanation": "In the biblical text, Isaac, the son of Abraham and Sarah, was married to Rebekah. Their union is detailed in the Book of Genesis, specifically in Genesis 24. Abraham, seeking a wife for Isaac from his own kin, sent his servant to find a suitable bride. The servant encountered Rebekah at a well in Nahor, and after confirming her suitability through a series of events, he brought her back to Isaac. Upon meeting, Isaac and Rebekah were married, and she became his wife. \n",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "gS9Oa65yEjoPeSE6QxMd",
        //         "week": "1",
        //         "answer": 1,
        //         "options": [
        //             "Elizabeth",
        //             "Mary",
        //             "Joahnna",
        //             "Sussanna"
        //         ],
        //         "text": "Martha's sister was called",
        //         "type": "mock",
        //         "timestamp": "2024-09-07T13:13:40.140Z",
        //         "explanation": "Martha and Mary were the sisters of Lazarus, and they are prominently featured in the Gospels, particularly in the stories found in Luke 10:38-42 and John 11:1-44. In these passages, Mary is known for sitting at Jesus' feet to listen to His teachings, while Martha was busy with preparations.",
        //         "consecutiveCorrectAttempts": "0"
        //     },
        //     {
        //         "selectedSubjectId": "QRu4n3IlJ9Ss4pRgSNl5",
        //         "questionid": "gZEh95TGA57mFRWnD8Yx",
        //         "week": "1",
        //         "answer": 2,
        //         "options": [
        //             "It was in their constitution",
        //             "Their former king was killed in battle",
        //             "They desired to be like the heathen nations around them",
        //             "They were tired of military regime"
        //         ],
        //         "text": "The children of Israel asked Samuel for a king because",
        //         "type": "mock",
        //         "timestamp": "2024-09-07T12:40:30.819Z",
        //         "explanation": "The request for a king by the children of Israel is found in 1 Samuel 8. In this passage, the people express their desire to have a king like the other nations. They wanted to be led by a visible, earthly king instead of relying solely on the leadership of judges and on God as their ultimate authority. Samuel, the prophet, was displeased with their request, but God instructed him to grant their desire and so he did obeying God.",
        //         "consecutiveCorrectAttempts": "0"
        //     }
        // ];
        // Fetch questions from API
        function loadQuestionsFromAPI() {

            // questions = dataQ;
            // loadQuestions();
            // startTimer();

            $('.start-exam').addClass('btn-progress');
            $('#errorAjaxDisplay').hide();
            // return;
            $.ajax({
                url: `../api_ajax/get_spaced_Questions.php`, // Your API URL
                method: 'GET',
                success: function (response) {
                    if (response.success && response.data) {
                        questions = response.data;
                        loadQuestions();
                        startTimer();
                        $('#spacedInstruction').hide();
                        $('#spacedData').show();
                    } else {
                        tryc('error','Error',response.message, 'bottomCenter');
                        $('#spacedInstruction').show();
                        $('.start-exam').removeClass('btn-progress');
                        $('#errorAjaxDisplay').text(response.message).show();
                    }
                },
                error: function (err) {
                    console.error('API request failed:', err);
                    alert("Failed to load questions.");
                }
            });
        }

        // function getSpacedRepetition() {
        //     $.ajax({
        //         url: "../api_ajax/saveSpacedRepetionDetails.php",
        //         method: "POST",
        //         data:{questionCount:questions.length},
        //         success: function (data) {
        //             console.log(data)
        //             if (data.success) {
        //
        //             } else {
        //
        //             }
        //         },
        //         error: function (xhr, status, error) {
        //             console.error("Error preloading questions:", error);
        //         },
        //     });
        // }


        // Dynamically load the questions into the container
        function loadQuestions() {
            const questionSlides = $('#questionSlides');
            questions.forEach((question, index) => {
                const slide = $(`
                <div class="question question-container no-padding-left-right" id="question${index}">
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

        // Initialize the Bootstrap modal only once
        const modalElement = document.getElementById('feedbackModal');
        modal = new bootstrap.Modal(modalElement, {
            backdrop: 'static',  // Prevent modal from closing when clicking outside
            keyboard: false      // Prevent modal from closing when pressing ESC key
        });
        function selectAnswer(correctAnswer, selectedAnswer, index,consecutiveCorrectAttempts) {
            if (isAnswered) return; // Prevent multiple answers for the same question

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
                url: '../api_ajax/saveUserAnswerSpaced.php',
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
        });

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

        // Initialize the quiz on load
        // loadQuestionsFromAPI();
    </script>
<script src="assets/tstyle/TimeCircles.js"></script>

</body>
</html>
