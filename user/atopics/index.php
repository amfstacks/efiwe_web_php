<?php
//require_once __DIR__ . '/../../templates/loggedInc.php';
require_once __DIR__ . '/../../templates/loggedInc.php';


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

                                    <button class="btn btn-lg btn-success font-20 mb-2">
                                        </button>

                                    <form  class="needs-validation" novalidate=""  id="profile-form"   enctype="multipart/form-data" >
                                        <div class="card-header">
                                            <h4> Update your Biodata</h4>
                                        </div>
                                        <div class="card-body">





                                            <hr>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label>
                                                        <h5> Select your 4 JAMB Subjects:</h5>
                                                    </label>
                                                    <div id="subjects-grid" class="subjects-grid rowa">
                                                        <p id="preload-subject" class="info-message" style="display: none;">loading subjects..</p>
                                                        <!-- Subjects will be dynamically inserted here -->
                                                    </div>
                                                    <p id="subject-error" class="alert alert-danger alert-dismissible show fade mt-4 text-white font-weight-bold" style="display: none;">Please select exactly 4 subjects.</p>
                                                </div>

                                            </div>



                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" id="submit-button" class="btn btn-icon icon-left btn-primary btn-lg"> <i class="fas fa-save"></i>Save Profile</button>
                                        </div>
                                    </form>
                                    <div id="form-success" class="success-message" style="display: none;">
                                        Profile saved successfully!
                                    </div>
<!--                                    <div id="form-error" class="error-message" style="display: none;">-->
<!--                                        Failed to save profile. Please try again.-->
<!--                                    </div>-->
                                    <div id="form-error" class="alert alert-danger alert-has-icon col-lg-6 col-sm-12" style="display: none;">
                                        <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
                                        <div class="alert-body">
                                            <div class="alert-title">Error</div>
                                            <span id="form-error-text">Failed to save profile. Please try again.</span>
                                        </div>
                                    </div>

                                </div>
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



 <?php
include 'includes/footerjs.php';
?>
<script src="assets/js/lga.min.js"></script>
</body>
<script>
    $(document).ready(function() {
        let selectedSubjects = [];

        // Function to fetch and display subjects
        function loadSubjects() {
            $('#preload-subject').show();
            $.ajax({
                url: '../api_ajax/get_subjects.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#preload-subject').hide();
                    if (response.success) {
                        const subjects = response.subjects || [];
                        const subjectsGrid = $('#subjects-grid');

                        if (subjects.length === 0) {
                            subjectsGrid.append('<p>No subjects available.</p>');
                            return;
                        }

                        // Iterate through subjects and create cards
                        subjects.forEach(subject => {
                            const subjectCard = $(`
                            <div class="subject-card col-lg-3 col-md-6 col-sm-4" data-id="${subject.fid}" data-color="${convertColor(subject.color)}">
                                <img src="${subject.icon}" alt="${subject.name}" class="subject-icon">
                                <p class="subject-name">${subject.name}</p>
                            </div>
                        `);

                            // Append to grid
                            subjectsGrid.append(subjectCard);
                        });

                        // Add click event listener to subject cards
                        $('.subject-card').on('click', function() {
                            const subjectId = $(this).data('id');
                            const subjectColor = $(this).data('color');

                            if ($(this).hasClass('selected')) {
                                // Deselect the subject
                                $(this).removeClass('selected').css('background-color', '');
                                selectedSubjects = selectedSubjects.filter(id => id !== subjectId);
                                $(this).find('.subject-name').css({
                                    'font-weight': 'normal',
                                    'color': 'black'
                                });
                            } else {
                                if (selectedSubjects.length >= 4) {
                                    alert('You can only select up to 4 subjects.');
                                    return;
                                }
                                // Select the subject
                                $(this).addClass('selected').css('background-color', subjectColor);
                                selectedSubjects.push(subjectId);
                                $(this).find('.subject-name').css({
                                    'font-weight': 'bold',
                                    'color': 'white'
                                });
                            }

                            // Hide or show error message based on selection
                            if (selectedSubjects.length !== 4) {
                                $('#subject-error').show();
                            } else {
                                $('#subject-error').hide();
                            }
                        });
                    } else {
                        alert('Failed to load subjects: ' + response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    subjectsGrid.append('<p>Failed to load subjects. Please reload page.</p>');
                    alert('Failed to load subjects. Please try again later.');
                    console.error('AJAX Error:', textStatus, errorThrown);
                    $('#preload-subject').hide();

                }
            });
        }

        // Function to convert color from "0xff75380D" to "rgb(117, 56, 13)"
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

        // Function to escape HTML special characters to prevent XSS
        function htmlspecialchars(text) {
            return $('<div>').text(text).html();
        }

        // Handle form submission
        $('#profile-form').on('submit', function(e) {
            e.preventDefault();

            // Validate subject selection
            if (selectedSubjects.length !== 4) {
                $('#subject-error').show();
                return;
            } else {
                $('#subject-error').hide();
            }

            // Prepare form data
            const formData = new FormData(this);
            formData.append('subjectSelect', selectedSubjects.join(', '));

            // Disable the submit button to prevent multiple submissions

            $('#submit-button').addClass("btn-progress", "disabled").text('Saving...');
            $('#form-error').hide();
            $.ajax({
                url: '../api_ajax/save_profile.php',
                method: 'POST',
                data: formData,
                contentType: false, // Important for file uploads
                processData: false, // Important for file uploads
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#form-success').show().delay(3000).fadeOut();
                        $('#form-error').hide();
                        // Optionally, redirect to another page
                        window.location.href = 'index.php';
                    } else {
                        $('#form-error').show();
                        $('#form-error-text').text(response.message || 'Failed to save profile.').show();
                        $('#form-success').hide();
                    }
                    // Re-enable the submit button
                    // $('#submit-button').prop('disabled', false).text('Save Profile');
                    $('#submit-button').removeClass("btn-progress", "disabled").text('Save Profile');

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#form-error').show();
                    $('#form-error-text').text('An error occurred while saving your profile. Please try again.').show();
                    $('#form-success').hide();
                    console.error('AJAX Error:', textStatus, errorThrown);
                    // Re-enable the submit button
                    // $('#submit-button').prop('disabled', false).text('Save Profile');
                    $('#submit-button').removeClass("btn-progress", "disabled").text('Save Profile');

                }
            });
        });

        // Load subjects on page load
        loadSubjects();
    });
</script>
<script>

    // tryc('success', 'Welcome '+user  );




</script>
<style>
    .profile-setup-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .subjects-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .subject-card {
        width: 150px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .subject-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .subject-card.selected {
        /*border: 2px solid #000;*/
    }

    .subject-icon {
        width: 50px;
        height: 50px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    .error-message {
        color: red;
        font-size: 0.9em;
    }

    .success-message {
        color: green;
        font-size: 1em;
        margin-top: 15px;
    }

    button {
        padding: 10px 20px;
        font-size: 1em;
    }
</style>
</html>