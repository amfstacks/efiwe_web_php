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
<script>
    function fetchDailyTask(){
        try {
            $.ajax({
                url: '../api_ajax/fetchDailyTasks.php', // API endpoint
                method: 'POST',
                success: function (response) {
                    console.log(response);
                    if (response.success && response.data && response.data.length > 0) {
                        // Process the response data
                        var tasksData = response.data;

                        // Count the total tasks
                        var totalTasks = tasksData.length;

                        // Count the completed tasks
                        var completedTasks = 0;
                        tasksData.forEach(function(task) {
                            if (task.completed === true) {
                                completedTasks++;
                            }

                            if (task.type === 'topic' && task.topic_data) {
                                var topic = task.topic_data;
                                var taskData = {
                                    type: task.type,          // 'topic'
                                    subject_id: task.subject_id,
                                    subject: task.subject,
                                };
                                // Create a list item for the task
                                var listItem = `
                                <li class="media">
                                    <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-1.png">
<!--<i class="fas fa-tasks mr-3 rounded-caircle font-20 mt-1" ></i>-->

                                    <div class="media-body">
                                        <div class="media-title" id="taskTitle">${topic.topic}</div>
                                        <div class="text-job text-muted" id="taskType">topic</div>
                                    </div>
                                    <div class="media-progressbar">
                                        <div class="progress-text">0%</div>
                                        <div class="progress" data-height="6" style="height: 6px;">
                                            <div class="progress-bar bg-primary" data-width="0%" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                    <div class="media-cta">
                                        <button id="detailButton-${topic.id}" class="btn btn-outline-primary" onclick="saveTopicData('${encodeURIComponent(JSON.stringify(topic))}', '${encodeURIComponent(JSON.stringify(taskData))}')">Detail</button>
                                    </div>
                                </li>
                            `;

                                // Append the list item to the task list
                                $("#taskList").append(listItem);
                            }
                            else if (task.type === 'mock' ) {

                                var listItem = `
                                <li class="media">

<!--<i class="fas fa-tasks mr-3 rounded-caircle font-20 mt-1" ></i>-->
                                    <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-1.png">

                                    <div class="media-body">
                                        <div class="media-title" id="taskTitle">MOCK ${task.mock_week}</div>
                                        <div class="text-job text-muted" id="taskType">MOCK</div>
                                    </div>
                                    <div class="media-progressbar">
                                        <div class="progress-text">0%</div>
                                        <div class="progress" data-height="6" style="height: 6px;">
                                            <div class="progress-bar bg-primary" data-width="0%" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                    <div class="media-cta">
                                        <button  id="detailButton-${task.mock_week}" data-exam-id="${task.mock_week}" data-week="${task.mock_week}" data-instruction="${task.instruction}" data-duration="${task.duration}" data-totalquestions="${task.totalquestions}" class="btn btn-outline-primary start-exam" >Detail</button>
                                    </div>
                                </li>
                            `;

                                $("#taskList").append(listItem);


                            }



                        });

                        // Update the media-title div with the total and completed task counts
                        $("#dailyTaskTrack").text(completedTasks + "/" + totalTasks);
                    } else {
                        // If no data or response isn't successful
                        console.log("No tasks found or response wasn't successful.");
                    }
                },
                error: function (xhr, status, error) {
                    tryc('Warning', 'Could not sync JAMB mock data');
                }
            });
        }catch (e){

        }
    }
    $(document).ready(function() {


        fetchDailyTask();

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