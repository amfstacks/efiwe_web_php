<?php
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

                                    <button class="btn btn-lg btn-success font-20 mb-2">
                                        Matric Number: BM/A24/002</button>

                                    <form  class="needs-validation" novalidate=""  id="bioform" action="func/biodata.php" method="POST" enctype="multipart/form-data" >
                                        <div class="card-header">
                                            <h4> Update your Biodata</h4>
                                        </div>
                                        <div class="card-body">





                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>First Name:</label>
                                                    <input type="text" class="form-control" id="firstname" name="firstname" >
                                                    <div class="invalid-feedback">
                                                        Please fill in your first name
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6 col-12">
                                                    <label>Surname:</label>
                                                    <input type="text" class="form-control" id="surname" name="surname" >
                                                    <div class="invalid-feedback">
                                                        Please fill in your surname
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-6 col-12">
                                                    <label>Gender</label>
                                                    <select class="form-control col-12 select2" style="width: 100%;" id="gender" name="gender" required>
                                                        <option value="">Select your gender</option>

                                                        <option value="1" >Male</option>
                                                        <option value="2" selected>Female</option>


                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select your gender
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Phone Number</label>
                                                    <input type="number" placeholder="Enter your Phone Number"class="form-control" id="phoneNumber" name="phoneNumber"  required>
                                                    <div class="invalid-feedback">
                                                        Please fill in your contact number
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">



                                                <div class="form-group col-md-6 col-12">
                                                    <label>State of Origin</label>
                                                    <select onchange="toggleLGA(this);"  class="form-control col-12 select2" style="width: 100%;" id="state" name="state"  required>
                                                                           <option value=""> Select State </option>

                                                        <option value="Abia">Abia</option>
                                                        <option value="Adamawa">Adamawa</option>
                                                        <option value="AkwaIbom">AkwaIbom</option>
                                                        <option value="Anambra">Anambra</option>
                                                        <option value="Bauchi">Bauchi</option>
                                                        <option value="Bayelsa">Bayelsa</option>
                                                        <option value="Benue">Benue</option>
                                                        <option value="Borno">Borno</option>
                                                        <option value="Cross River">Cross River</option>
                                                        <option value="Delta">Delta</option>
                                                        <option value="Ebonyi">Ebonyi</option>
                                                        <option value="Edo">Edo</option>
                                                        <option value="Ekiti">Ekiti</option>
                                                        <option value="Enugu">Enugu</option>
                                                        <option value="FCT">FCT</option>
                                                        <option value="Gombe">Gombe</option>
                                                        <option value="Imo">Imo</option>
                                                        <option value="Jigawa">Jigawa</option>
                                                        <option value="Kaduna">Kaduna</option>
                                                        <option value="Kano">Kano</option>
                                                        <option value="Katsina">Katsina</option>
                                                        <option value="Kebbi">Kebbi</option>
                                                        <option value="Kogi">Kogi</option>
                                                        <option value="Kwara">Kwara</option>
                                                        <option value="Lagos">Lagos</option>
                                                        <option value="Nasarawa">Nasarawa</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Ogun">Ogun</option>
                                                        <option value="Ondo">Ondo</option>
                                                        <option value="Osun">Osun</option>
                                                        <option value="Oyo">Oyo</option>
                                                        <option value="Plateau">Plateau</option>
                                                        <option value="Rivers">Rivers</option>
                                                        <option value="Sokoto">Sokoto</option>
                                                        <option value="Taraba">Taraba</option>
                                                        <option value="Yobe">Yobe</option>
                                                        <option value="Zamfara">Zamafara</option>


                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select your state
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-6 ">
                                                    <label class="control-label">LGA of Origin</label>
                                                    <select name="lga" id="lga" class="form-control select2 select-lga" required>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select your Local Government Area
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-6 col-12">
                                                    <label>Date Of Birth</label>
                                                    <input type="date" class="form-control" value="2002-05-26"  name="dob" id="dob">

                                                    <div class="invalid-feedback">
                                                        Please select your Date Of Birth
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-12">

                                                    <label>Home Address:</label>
                                                    <textarea class="form-control"  id="homeaddress" name="homeaddress"  value="" required ></textarea>
                                                    <div class="invalid-feedback">

                                                    </div>
                                                </div>

                                            </div>

                                            <hr>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label>Select 4 Subjects:</label>
                                                    <div id="subjects-grid" class="subjects-grid">
                                                        <p id="preload-subject" class="info-message" style="display: none;">loading subjects..</p>
                                                        <!-- Subjects will be dynamically inserted here -->
                                                    </div>
                                                    <p id="subject-error" class="error-message" style="display: none;">Please select exactly 4 subjects.</p>
                                                </div>

                                            </div>



                                        </div>
                                        <div class="card-footer text-right">
                                        </div>
                                    </form>

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
                    subjectsGrid.append('<p>Failed to load subjects. Please reload page.</p>');
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