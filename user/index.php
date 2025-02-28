<?php
$page_title = 'STUDENT || DASHBOARD';

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
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-sm-12 col-12 ">

                        <button type="button" class="btn btn-primary btn-icon icon-left m-b-15 w-100 align-left">
                            <!-- <i class="material-icons" style="vertical-align: top;">account_box</i> -->

                            <i class="fas fa-user-graduate"></i>
                            <span style="font-size: 13px;">DASHBOARD  <?php  echo $profileSet ?></span>
                        </button>

                    </div>

<!--                    <div class="col-xl-4 col-lg-4 col-sm-12 col-12">-->
<!---->
<!--                        <button type="button" class="btn btn-primary btn-icon icon-left m-b-15 float-right w-100 align-left">-->
<!---->
<!--                            <i class="fas fa-calendar-alt"></i>-->
<!--                            <span style="font-size: 13px;"> 2024/2025 : 2nd semester  </span>-->
<!--                        </button>-->
<!--                    </div>-->
                </div>
                <div class="row ">


                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-15"> <?php echo $surname." ". $firstName ?></h5>

                                                <!-- <h2 class="mb-3 font-18">1,287</h2> -->
                                                <p class="mb-3"><span class="col-orange">Full Name</span> </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">

                                                <img src="assets/img/user.png" alt="" class="rounded-circle author-box-picture">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="card">

                            <div class="card-body card-type-3">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-0"> Daily Tasks</h6>
<!--                                        <span class="font-weight-bold mb-0">450</span>-->
                                    </div>
                                    <div class="col-auto">
                                        <div class="card-circle l-bg-green-dark text-white">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                <ul class="list-unstyled list-unstyled-border">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="float-right">
<!--                                                <div class="font-weight-600 text-muted text-small">112 Sales</div>-->
                                            </div>
                                            <div class="media-title" id="dailyTaskTrack">0/0</div>
                                            <div class="mt-1">
<!--                                                <div class="budget-price bg-grey">-->
<!--                                                    <div class="budget-price-square bg-primary" data-width="61%" style="width: 61%;"></div>-->
<!--                                                </div>-->
                                                <div class="progress mb-3">
<!--                                                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50</div>-->
<!--                                                    <div class="progress-bar" role="progressbar" data-width="75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>-->
                                                    <div class="progress-bar" id="taskProgressBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>

                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6">
                        <div class="card l-bg-green">
                            <div class="card-statistic-3 float-right">
                                <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                                <div class="card-content">
                                    <h4 class="card-title">Total Points</h4>
                                    <span class="font-50" id="mytotalpoints"> ... </span>
                                   <br>
                                    <p class="mb-0 text-sm">

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daily Tasks</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder" id="taskList">
<!--                                    <li class="media">-->
<!--                                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-1.png">-->
<!--                                        <div class="media-body">-->
<!--                                            <div class="media-title" id="taskTitle"></div>-->
<!--                                            <div class="text-job text-muted" id="taskType">topic</div>-->
<!--                                        </div>-->
<!--                                        <div class="media-progressbar">-->
<!--                                            <div class="progress-text">30%</div>-->
<!--                                            <div class="progress" data-height="6" style="height: 6px;">-->
<!--                                                <div class="progress-bar bg-primary" data-width="30%" style="width: 30%;"></div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="media-cta">-->
<!--                                            <a href="#" class="btn btn-outline-primary">Detail</a>-->
<!--                                        </div>-->
<!--                                    </li>-->

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card mat-4 col-lg-6">
                        <div class="card-header">
                            <h4>My Subjects</h4>
                        </div>
                        <div class="card-body pb-0">
                            <div id="my-subjects-grid" class="row subjects-grid">


                            </div>

                        </div>
                    </div>







                </div>


            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                kjgvhug
            </div>
            <div class="footer-right">
            </div>
        </footer>    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Dear <b><?php echo $email; ?></b>,</h5>
                <hr>
            </div>
            <div class="modal-body">
                <div class="card-body text-center">
                    <h3 class="mt-0 text-bold">
                        Welcome to your dashboard.
                        <!-- <small class="text-muted">Welcome</small>  <small class="text-muted"> to your Dashboard.</small> -->

                        <!-- <small class="text-muted">With faded secondary text</small> -->
                    </h3>
                    <p class="lead mt-4">
                        Take a step forward by  setting up your Biodata and your JAMB Subjects.
                    </p>
                    <a href="profile-setup.php">     <button type="button" class="btn btn-primary" >  <i class="fa fa-spin fa-cog"></i> Setup  Biodata
                        </button></a>
                </div>


            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenterSub" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Dear <b><?php echo $firstName != ''  ? $firstName : $email; ?></b>,</h5>
                <hr>
            </div>
            <div class="modal-body">
                <div class="card-body text-center">
                    <h3 class="mt-0 text-bold">
                        <?php
                        if($trialDays <=0 && !$checkSub){
                            echo "Your trial days are exhausted";
                        }
                        else{
                        ?>
                        You have <?php echo $trialDays > 0 ? $trialDays." trial days " :$trialDays." trial day $checkSub"  ?>  left.
                        <?php
                        }?>

                    </h3>
                    <p class="lead mt-4">
                        Do not deny yourself an opportunity to pass your JAMB excellently!
                    </p>
                    <a href="sub-packages">     <button type="button" class="btn btn-primary btn-lg font-20" >  <i class="fa fa-spain fa-credit-card mr-1"></i> Subscribe Now
                        </button></a>
                </div>


            </div>

        </div>
    </div>
</div>



<div class="modal fade" id="changepass" tabindex="-1" role="dialog"
     aria-labelledby="changepassTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="formModal"></h5>

              </div> -->
            <div class="modal-body">
                <h5 class="modal-title" id="formModal">Dear <b>OLAIFA </b>,</h5>
                <hr class="mb-0">
                <div class="card-body ">

                    <p class="lead mta-1">
                        For safety, it's highly recommended you  achange your password from the default password.

                    </p>
                    <a href="changepass.php">  <button  id="a" type="button" class="btn btn-primary"  >  <i class="fa fa-spin fa-cog"></i> Click here to change password now
                        </button></a>
                </div>


            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="dailyLogin" tabindex="-1" role="dialog"
     aria-labelledby="changepassTitle" aria-hidden="true" data-keyboard="true" data-backdarop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="formModal"></h5>

              </div> -->
            <div class="modal-body">
                <h5 class="modal-title" id="formModal">Keep it up!  <b>Daily LOGIN rewards unlocked!</b></h5>
                <hr class="mb-0">
                <div class="card-body ">

                    <p class="lead mta-1">

                        <center>
                        <i class="fa fa-award font-50 text-success align-center centered"></i>
                    </center>
                    <p id="dailyLoginMessage" class="lead mta-1 h4"> Stay consistent and watch your progress grow!</p>

                    </p>
                     <button  id="a" type="button" class="btn btn-primary w-100"  >  <i class="fa fa-window-close faa-cog"></i> close
                        </button>
                </div>


            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="dailyTasks" tabindex="-1" role="dialog"
     aria-labelledby="changepassTitle" aria-hidden="true" data-keyboard="true" data-backdarop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="formModal"></h5>

              </div> -->
            <div class="modal-body">
                <h5 class="modal-title" id="formModal">YOU ARE ON  A <b>🌟 BLAST! 🌟</b></h5>
                <hr class="mb-0">
                <div class="card-body ">

                    <p class="lead mta-1">

                        <center>
                        <i class="fa fa-award font-50 text-success align-center centered"></i>
                    </center>
                    <p id="dailyLoginMessage" class="lead mta-1 h4"> You’ve just completed all your daily tasks, and that’s a huge step toward acing your JAMB exam. Every question you practiced, every topic you reviewed, and every hour you dedicated today brings you closer to your dream score.</p>

                    </p>
                     <button  id="a" type="button" class="btn btn-primary w-100"  >  <i class="fa fa-window-close faa-cog"></i> close
                        </button>
                </div>


            </div>

        </div>
    </div>
</div>



<?php
include 'includes/footerjs.php';
?>
</body>
<script src="../scripts/general.js" ></script>
<script>

    $(document).ready(function(){
        // $("#dailyTasks").modal('show');
    });
</script>
<?php
if ($profileSet == 0){
?>
<script>
    $(document).ready(function(){
        $("#exampleModalCenter").modal('show');
        tryc("info", "Set up your Bio-Data");
    });

</script>

    <?php

}
?>

<?php
if ($trialDays < TRIAL_ALLOW_DAYS && !$checkSub){
    ?>
    <script>
        $(document).ready(function(){
            $("#exampleModalCenterSub").modal('show');
            tryc("info","Subscribe Now", "Your trial days are over");
        });
    </script>

    <?php

}
?>
<script>
    function convertColor(colorHex) {
        // Remove '0x' prefix
        let hex = colorHex.replace(/^0x/, '');
        // Ensure it's in RRGGBB format
        if (hex.length === 8) {
            hex = hex.substring(2);
        }
        const bigint = parseInt(hex, 16);
        const r = (bigint >> 16) & 255;
        const g = (bigint >> 8) & 255;
        const b = bigint & 255;
        return `rgb(${r}, ${g}, ${b})`;
    }

    function loadMySubjects() {
        const mySubjectsGrid = $('#my-subjects-grid');
        mySubjectsGrid.html(`
        <div class="col-6 col-sm-3 col-lg-6 mb-4 ">
            <div class="rectangle skeleton-loader">
                <div class="icon"></div>
                <div class="title"></div>
            </div>
        </div>
        <div class="col-6 col-sm-3 col-lg-6 mb-4 skeleton-loaader">
            <div class="rectangle skeleton-loader">
                <div class="icon"></div>
                <div class="title"></div>
            </div>
        </div>
        <div class="col-6 col-sm-3 col-lg-6 mb-4 skeleton-loadaer">
            <div class="rectangle skeleton-loader">
                <div class="icon"></div>
                <div class="title"></div>
            </div>
        </div>
        <div class="col-6 col-sm-3 col-lg-6 mb-4 skeletaon-loader">
            <div class="rectangle skeleton-loader">
                <div class="icon"></div>
                <div class="title"></div>
            </div>
        </div>
    `);
        $.ajax({
            url: '../api_ajax/get_subjects.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    const subjects = response.subjects || [];
                    const selectedSubjectIds = mySelectedSubjects || [];
                    mySubjectsGrid.empty();
                    if (selectedSubjectIds.length === 0) {
                        mySubjectsGrid.append('<p>No subjects selected.</p>');
                    } else {
                        // Iterate through the selectedSubjectIds and find matching subjects
                        selectedSubjectIds.forEach(function(subjectId) {
                            const subject = subjects.find(sub => sub.fid === subjectId);
                            if (subject) {
                                const subjectCard = $(`

                                <div class="col-6 col-sm-3 col-lg-6 mb-4 mysubjectCard" data-id="${subject.fid}">
                                    <div class="rectangle">
                                       <div class="icon"> <img src="${subject.icon}" alt="${subject.name}" class="subject-icon"></div>
 <div class="title">${subject.name}</div>
                                    </div>
                                </div>

                            `);
                                subjectCard.find('.rectangle').css('background-color', convertColor(subject.color));



                                // Append the card to the selected subjects grid
                                mySubjectsGrid.append(subjectCard);
                            }
                        });
                    }

                    // Optionally, you can remove or mark the selected subjects from the all subjects grid
                    // to prevent duplication or highlight them as already selected
                    // This part is optional based on your design preference
                } else {
                    alert('Failed to load subjects: ' + response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Failed to load subjects. Please try again later.');
                console.error('AJAX Error:', textStatus, errorThrown);
            }
        });
    }
    // tryc('success', 'Welcome '+user  );
    // function saveTopicData(topic, taskData) {
    //     // alert('saved');
    //     // Save the entire topic object to localStorage
    //     localStorage.setItem('currentTopic', topic);
    //
    //     const parsedTaskData = JSON.parse(decodeURIComponent(taskData));
    //     $.ajax({
    //         url:'../api_ajax/save_subject_to_session.php', // PHP file that handles saving session data
    //         method: 'POST',
    //         data: parsedTaskData,
    //         success: function(response) {
    //             // alert(response);
    //             const result = JSON.parse(response);
    //             // If the data was saved successfully, navigate to topicDetails
    //             if (result.success) {
    //                 // alert(response);
    //
    //                 window.location.href = "topicDetails"; // Redirect to the topic details page
    //             } else {
    //                 console.error("Failed to save session data");
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error("Error saving session data:", error);
    //         }
    //     });
    //
    //
    // }
function getMyTotalPoints(){
    $.ajax({
        url: '../api_ajax/getTotalPoints.php', // API endpoint
        method: 'GET', // Using GET method, can be POST if needed
        success: function(response) {
            // Parse the response JSON if it's in JSON format
            const dataResponse = response;
            if (dataResponse.success && dataResponse.data.totalPointsFetched !== undefined) {
                // Update the total points in the HTML
                $('#mytotalpoints').text(dataResponse.data.totalPointsFetched);
            }
            silentMockFetch();
        },
        error: function(xhr, status, error) {
            console.error("Error fetching total points:", error);
            // Optionally, handle the error, e.g., show a message or default value
            $('#mytotalpoints').text('Error');
        }
    });
}
function gradeDailyLogin(){
    $.ajax({
        url: '../api_ajax/gradeDailyScore.php', // API endpoint
        method: 'POST', // Using GET method, can be POST if needed
        success: function(response) {
            // Parse the response JSON if it's in JSON format
            const dataResponse = response;
            if (dataResponse.success) {
                var points = dataResponse.data ?? '';
                $("#dailyLogin").modal('show');
              tryc("success", points+" DAILY BONUS AWARDED");
            }
            getMyTotalPoints();

        },
        error: function(xhr, status, error) {
            console.error("Error fetching total points:", error);
            getMyTotalPoints();
        }
    });
}

function silentMockFetch(){
        try {
            $.ajax({
                url: '../api_ajax/updateUserMockFromSource.php', // API endpoint
                method: 'POST', // Using GET method, can be POST if needed
                success: function (response) {
                    // alert(response);
                },
                error: function (xhr, status, error) {
                    tryc('Warning', 'Could not sync JAMB mock data');
                }
            });
        }catch (e){

        }
}

    $(document).ready(function() {
        // Call loadMySubjects after the page has finished loading
        loadMySubjects();
        $(document).on('click', '.mysubjectCard', function() {
            const subjectId = $(this).data('id');
            const subjectName = $(this).find('.title').text();

            // Trigger the session store using an AJAX request
            $.ajax({
                url: 'set_subject_session.php',
                method: 'POST',
                data: { subjectId: subjectId, subjectName: subjectName },
                success: function(response) {
                    // history.pushState(null, null, window.location.href);
                    // After successful session setting, redirect to the topics page
                    window.location.href = 'topics';  // Redirect without query params
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        });
        gradeDailyLogin();
        fetchDailyTask();
        gradeDailyDoneLogin();
        // $(".start-exam").on('click', function() {
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
<style>

     .subject-icon {
        width: 50px;
        height: 50px;
    }
</style>
</html>