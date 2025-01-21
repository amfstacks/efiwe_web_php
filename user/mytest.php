<?php
$page_title = '|| My Tests';

require_once __DIR__ . '/../templates/loggedInc.php';


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



                                    <form  class="needs-validation" novalidate=""  id="profile-form"   enctype="multipart/form-data" >
                                        <div class="card-header">
                                            <h4> Select a Test</h4>
                                        </div>
                                        <div class="card-body">




                                            <div class="row">
                                                <div class="col-12 col-md-4 col-lg-4 mx-auto">
                                                    <div class="pricing">
                                                        <div class="pricing-title">
                                                            Spaced Repetition
                                                        </div>
                                                        <div class="pricing-padding">
                                                            <div class="h3 font-weight-bold">
                                                                <div>Spaced Repetition</div>
                                                            </div>
                                                            <div class="pricing-details">
                                                            </div>
                                                        </div>
                                                        <div class="pricing-cta bg-primary">
                                                            <a href="#" class="bg-primary text-white">Start <i class="fas fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 col-lg-4 mx-auto">
                                                    <div class="pricing pricing-highlight">
                                                        <div class="pricing-title">
                                                           Jamb Mock
                                                        </div>
                                                        <div class="pricing-padding">
                                                            <div class="h3 font-weight-bold">
                                                                <div>Jamb Mock</div>
                                                            </div>
                                                            <div class="pricing-details">
                                                            </div>
                                                        </div>
                                                        <div class="pricing-cta bg-primary" id="jmock">
                                                            <span  class="bg-primary text-white" >Start <i class="fas fa-arrow-right"></i></span>
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

        <?php
       include 'includes/footer.php';
       ?>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mockExamModal" tabindex="-1" aria-labelledby="mockExamModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mockExamModalLabel">Jamb Mock Exams</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Loader Section -->
                <div id="modal-loader" class="text-center">
                    <div class="loader"></div>
                    <p>Loading data...</p>
                </div>
                <!-- Mock Exams List Section -->
                <div id="mockExamsList" style="display: none;">
                    <div class="row" id="mockExams">
                        <!-- Populated List will appear here -->
                    </div>
<!--                    <ul id="mockExams" class="list-group">-->
                        <!-- Populated List will appear here -->
<!--                    </ul>-->
                </div>
            </div>
        </div>
    </div>
</div>


 <?php
include 'includes/footerjs.php';
?>
</body>
<script>
    $(document).ready(function() {
        // alert('aa');

        let selectedSubjects = [];
        // $("#jmock").on("click", function(event) {
            $(document).on('click', '#jmock', function() {
            // event.preventDefault();
            // alert('aa');
                $("#mockExamModal").modal('show');
                $("#modal-loader").show();
                $("#mockExamsList").hide(); // Hide the list initially

                // Fetch mock exams from the endpoint
                $.ajax({
                    url: '../api_ajax/get_mockList.php', // Replace with your actual endpoint
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        if (response.data && response.data.length > 0) {
                            // Hide the loader and show the mock exams list
                            $("#modal-loader").hide();
                            $("#mockExamsList").show();

                            // Clear any previous data in the list
                            $("#mockExams").empty();

                            // Populate the list with mock exam data
                            response.data.forEach(function(mockExam) {
                                var buttonHTML = '';
                                if (mockExam.hasTaken) {
                                    buttonHTML = `
                        <button class="btn btn-secondary" disabled>Exam Completed</button>
                    `;
                                } else {
                                    buttonHTML = `
                        <button class="btn btn-primary start-exam" data-exam-id="${mockExam.id}">Start Exam</button>
                    `;
                                }

                            //     var examHTML = `
                            //     <li class="list-group-item">
                            //         <h5>Week: ${mockExam.week}</h5>
                            //         <p><strong>Instruction:</strong> ${mockExam.instruction}</p>
                            //         <p><strong>Total Questions:</strong> ${mockExam.totalquestions}</p>
                            //         <p><strong>Duration:</strong> ${mockExam.duration} minutes</p>
                            //        ${buttonHTML}
                            //     </li>
                            // `;
                                var examHTML = `
                    <div class="col-md-6">
                        <div class="list-group-item">
                            <h5>Week: ${mockExam.week}</h5>
                            <p><strong>Instruction:</strong> ${mockExam.instruction}</p>
                            <p><strong>Total Questions:</strong> ${mockExam.totalquestions}</p>
                            <p><strong>Duration:</strong> ${mockExam.duration} minutes</p>
                            ${buttonHTML}
                        </div>
                    </div>
                `;
                                $("#mockExams").append(examHTML);
                            });
                        } else {
                            // In case no data is returned
                            $("#modal-loader").hide();
                            $("#mockExamsList").html("<p>No mock exams available.</p>").show();
                        }
                    },
                    error: function(xhr, status, error) {
                        // In case of error, hide the loader and show an error message
                        $("#modal-loader").hide();
                        $("#mockExamsList").html("<p>Error fetching data. Please try again later.</p>").show();
                    }
                });

        })

    });
</script>
<script>

    // tryc('success', 'Welcome '+user  );




</script>
<style>
    .pricing .pricing-cta span {
        display: block;
        padding: 20px 40px;
        background-color: #f3f6f8;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        border-radius: 0 0 3px 3px;
    }
</style>
</html>