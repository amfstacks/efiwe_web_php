<?php
$page_title = '|| My Tests';

require_once __DIR__ . '/../templates/loggedInc.php';

//echo USEMOCKDEFAULT;
//exit;
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
                                            <h4> Daily Tasks </h4>
                                        </div>
                                        <div class="card-body">




                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-lg-12">
                                                    <div class="carda">

                                                        <div class="card-body">
                                                            <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder" id="taskList">


                                                            </ul>
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




 <?php
include 'includes/footerjs.php';
?>
</body>
<script src="../scripts/general.js" ></script>

<script>

    $(document).ready(function() {


        fetchDailyTask();
        $(document).on('click', '.start-exam', function() {
            // alert('a');
            // return;
            var week = $(this).data('week'); // Get the week value from the button
            var instruction = $(this).data('instruction');
            var duration = $(this).data('duration');
            var totalQuestions = $(this).data('totalquestions');
            $.ajax({
                url: '../api_ajax/save_week_session.php', // PHP file to save week in session
                type: 'POST',
                data: { week: week, instruction:instruction, duration:duration,totalQuestions:totalQuestions },
                success: function(response) {
                    // After saving the session, redirect to mock.php
                    window.location.href = 'mockb.php'; // Redirect to mock.php without GET parameters
                },
                error: function() {
                    alert('Failed to save week to session.');
                }
            });
        });
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