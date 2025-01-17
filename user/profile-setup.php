<?php
require_once __DIR__ . '/../templates/loggedInc.php';


?>
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>STUDENT || HOME</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">

    <link rel="stylesheet" href="assets/bundles/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />


</head>

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

                </div>
                <div class="row ">


                    <form id="profile-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" id="firstname" name="firstname" required>
                        </div>

                        <div class="form-group">
                            <label for="surname">Surname:</label>
                            <input type="text" id="surname" name="surname" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" id="dob" name="dob" required>
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber">Phone Number:</label>
                            <input type="tel" id="phoneNumber" name="phoneNumber" required>
                        </div>

                        <div class="form-group">
                            <label for="class">Class:</label>
                            <input type="text" id="class" name="class" required>
                        </div>

                        <div class="form-group">
                            <label for="exam">Exam ID:</label>
                            <input type="text" id="exam" name="exam" required>
                        </div>

                        <div class="form-group">
                            <label for="state">State:</label>
                            <input type="text" id="state" name="state" required>
                        </div>

                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" id="city" name="city" required>
                        </div>

                        <div class="form-group">
                            <label for="homeaddress">Home Address:</label>
                            <textarea id="homeaddress" name="homeaddress" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="profile">Profile Image:</label>
                            <input type="file" id="profile" name="profile" accept="image/*">
                        </div>

                        <!-- Subjects Selection -->
                        <div class="form-group">
                            <label>Select 4 Subjects:</label>
                            <div id="subjects-grid" class="subjects-grid">
                                <!-- Subjects will be dynamically inserted here -->
                            </div>
                            <p id="subject-error" class="error-message" style="display: none;">Please select exactly 4 subjects.</p>
                        </div>

                        <button type="submit" id="submit-button">Save Profile</button>
                    </form>

                    <!-- Success and Error Messages -->
                    <div id="form-success" class="success-message" style="display: none;">
                        Profile saved successfully!
                    </div>
                    <div id="form-error" class="error-message" style="display: none;">
                        Failed to save profile. Please try again.
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
                        Take a step forward by  setting up your Biodata.
                    </p>
                    <a href="biodata.php">     <button type="button" class="btn btn-primary" >  <i class="fa fa-spin fa-cog"></i> Setup  Biodata
                        </button></a>
                </div>


            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="setupsubject" tabindex="-1" role="dialog"
     aria-labelledby="setupsubjectTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="formModal"></h5>

              </div> -->
            <div class="modal-body">
                <h5 class="modal-title" id="formModal">Dear <b> </b>,</h5>
                <hr class="mb-0">
                <div class="card-body ">
                    <!-- <h3 class="text-center"> welcome to your <b>dashboard</b> </h3> -->
                    <!-- <hr> -->
                    <!-- <div class="row">
                        <div class="form-group col-12">

                        </div>
                      </div> -->

                    <!-- <small class="text-muted">With faded secondary text</small> -->

                    <p class="lead mta-1">
                        Welcome to your  dashboard,
                        <br> <small>Check for  assessments Schedule for your dated assessments !</small>
                    </p>
                    <button  id="a" type="button" class="btn btn-primary"  data-dismiss="modal" >  <i class="fa fa-spin fa-cog"></i> Go to Dashboard
                    </button>
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

<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>

<script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>

<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/datatables.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
<script src="assets/js/page/toastr.js"></script>

<!-- Page Specific JS File -->
<script src="assets/js/page/index.js"></script>
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script></body>
<script>
    $(document).ready(function() {
        let selectedSubjects = [];

        // Function to fetch and display subjects
        function loadSubjects() {
            $.ajax({
                url: '../api_ajax/get_subjects.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
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
                            <div class="subject-card" data-id="${subject.fid}" data-color="${convertColor(subject.color)}">
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
                            } else {
                                if (selectedSubjects.length >= 4) {
                                    alert('You can only select up to 4 subjects.');
                                    return;
                                }
                                // Select the subject
                                $(this).addClass('selected').css('background-color', subjectColor);
                                selectedSubjects.push(subjectId);
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
                    alert('Failed to load subjects. Please try again later.');
                    console.error('AJAX Error:', textStatus, errorThrown);
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
            $('#submit-button').prop('disabled', true).text('Saving...');

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
                        // window.location.href = 'dashboard.php';
                    } else {
                        $('#form-error').text(response.message || 'Failed to save profile.').show();
                        $('#form-success').hide();
                    }
                    // Re-enable the submit button
                    $('#submit-button').prop('disabled', false).text('Save Profile');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#form-error').text('An error occurred while saving your profile. Please try again.').show();
                    $('#form-success').hide();
                    console.error('AJAX Error:', textStatus, errorThrown);
                    // Re-enable the submit button
                    $('#submit-button').prop('disabled', false).text('Save Profile');
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
        border: 2px solid #000;
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