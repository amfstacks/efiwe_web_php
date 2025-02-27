function processDailyTask(topicId,type,update){
    try {
        $.ajax({
            url: '../api_ajax/processDailyTasks.php', // API endpoint
            method: 'POST',
            data:{topicId:topicId,type: type, update:update},
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
                                    <div class="media-body">
                                        <div class="media-title" id="taskTitle">${topic.topic}</div>
                                        <div class="text-job text-muted" id="taskType">topic</div>
                                    </div>
                                    <div class="media-progressbar">
                                        <div class="progress-text">30%</div>
                                        <div class="progress" data-height="6" style="height: 6px;">
                                            <div class="progress-bar bg-primary" data-width="30%" style="width: 30%;"></div>
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
                                    <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-1.png">
                                    <div class="media-body">
                                        <div class="media-title" id="taskTitle">MOCK ${task.mock_week}</div>
                                        <div class="text-job text-muted" id="taskType">MOCK</div>
                                    </div>
                                    <div class="media-progressbar">
                                        <div class="progress-text">30%</div>
                                        <div class="progress" data-height="6" style="height: 6px;">
                                            <div class="progress-bar bg-primary" data-width="30%" style="width: 30%;"></div>
                                        </div>
                                    </div>
                                    <div class="media-cta">
                                        <button  id="detailButton-${task.mock_week}" data-exam-id="${task.mock_week}" data-week="${task.mock_week}" data-instruction="${task.instruction}" data-duration="${task.duration}" data-totalquestions="${task.totalquestions}" class="btn btn-outline-primary start-exam" >Detail</button>
                                    </div>
                                </li>
                            `;

                            $("#taskList").append(listItem);


                        }
                        else if (task.type === 'ar' ) {

                            var listItem = `
                                <li class="media">
                                    <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-1.png">
                                    <div class="media-body">
                                        <div class="media-title" id="taskTitle">Spaced Repetition</div>
                                        <div class="text-job text-muted" id="taskType">Spaced Repetition</div>
                                    </div>
                                    <div class="media-progressbar">
                                        <div class="progress-text">30%</div>
                                        <div class="progress" data-height="6" style="height: 6px;">
                                            <div class="progress-bar bg-primary" data-width="30%" style="width: 30%;"></div>
                                        </div>
                                    </div>
                                    <div class="media-cta">
                                        <button   class="btn btn-outline-primary start-exam" >Detail</button>
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

                            var progress = 0;  // Default progress if neither video nor recall are taken

                            if (task.active_recall_taken === true) {
                                progress = 50;   // Progress is 50% if only active recall is taken
                            }
                            if (task.video_watched === true) {
                                progress = 50;   // Progress is 50% if only active recall is taken
                            }
                            if (task.video_watched === true && task.active_recall_taken === true) {
                                progress = 100;  // Full progress if both video and recall are done
                            }




                            var topic = task.topic_data;
                            var taskData = {
                                type: task.type,          // 'topic'
                                subject_id: task.subject_id,
                                subject: task.subject,
                            };
                            // Create a list item for the task
                            var listItem = `
                                <li class="media">
                                    <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/todo.png">
                                    <div class="media-body">
                                        <div class="media-title" id="taskTitle">${topic.topic}</div>
                                        <div class="text-job text-muted" id="taskType">topic</div>
                                    </div>
                                    <div class="media-progressbar">
                                        <div class="progress-text">${progress}%</div>
            <div class="progress" data-height="6" style="height: 6px;">
                <div class="progress-bar bg-primary" data-width="${progress}%" style="width: ${progress}%;"></div>
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
                            var progress = 0;
                            if (task.completed === true) {
                                progress = 100;
                            }
                            var listItem = `
                                <li class="media">
                                    <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/jamb.png">
                                    <div class="media-body">
                                        <div class="media-title" id="taskTitle">JAMB MOCK ${task.mock_week}</div>
                                        <div class="text-job text-muted" id="taskType">MOCK</div>
                                    </div>
                                    <div class="media-progressbar">
                                        <div class="progress-text">${progress}%</div>
                                        <div class="progress" data-height="6" style="height: 6px;">
                                            <div class="progress-bar bg-primary" data-width="${progress}%" style="width: ${progress}%;"></div>
                                        </div>
                                    </div>
                                    <div class="media-cta">
                                  ${progress === 100 ?
                                `<button class="btn btn-outline-success" disabled>Done</button>` :
                                `<button id="detailButton-${task.mock_week}" 
                            data-exam-id="${task.mock_week}" 
                            data-week="${task.mock_week}" 
                            data-instruction="${task.instruction}" 
                            data-duration="${task.duration}" 
                            data-totalquestions="${task.totalquestions}" 
                            class="btn btn-outline-primary start-exam">Detail</button>`
                            }
            </div>
                                    </div>
                                </li>
                            `;

                            $("#taskList").append(listItem);


                        }
                        else if (task.type === 'ar' ) {
                            var progress = 0;
                            if (task.completed === true) {
                                progress = 100;
                            }
                            var listItem = `
                                <li class="media">
                                    <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/jamb.png">
                                    <div class="media-body">
                                        <div class="media-title" id="taskTitle">JAMB DAILY SPACED REPETITION</div>
                                        <div class="text-job text-muted" id="taskType">Spaced Repetition</div>
                                    </div>
                                    <div class="media-progressbar">
                                        <div class="progress-text">${progress}%</div>
                                        <div class="progress" data-height="6" style="height: 6px;">
                                            <div class="progress-bar bg-primary" data-width="${progress}%" style="width: ${progress}%;"></div>
                                        </div>
                                    </div>
                                    <div class="media-cta">
                                        <a href="spacedRepetition"   class="btn btn-outline-primary " >Detail</a>
                                    </div>
                                </li>
                            `;

                            $("#taskList").append(listItem);


                        }



                    });

                    // Update the media-title div with the total and completed task counts
                    $("#dailyTaskTrack").text(completedTasks + "/" + totalTasks);
                    const completionPercentage = (completedTasks / totalTasks) * 100;
                    $("#taskProgressBar").css("width", completionPercentage + "%");
                    $("#taskProgressBar").attr("aria-valuenow", completionPercentage); // Optional: Update the aria-valuenow for accessibility

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

function saveTopicData(topic, taskData) {
    // alert('saved');
    // Save the entire topic object to localStorage
    localStorage.setItem('currentTopic', topic);

    const parsedTaskData = JSON.parse(decodeURIComponent(taskData));
    $.ajax({
        url:'../api_ajax/save_subject_to_session.php', // PHP file that handles saving session data
        method: 'POST',
        data: parsedTaskData,
        success: function(response) {
            // alert(response);
            const result = JSON.parse(response);
            // If the data was saved successfully, navigate to topicDetails
            if (result.success) {
                // alert(response);

                window.location.href = "topicDetails"; // Redirect to the topic details page
            } else {
                console.error("Failed to save session data");
            }
        },
        error: function(xhr, status, error) {
            console.error("Error saving session data:", error);
        }
    });


}