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
                                                <div class="col-12 col-md-4 col-lg-4">
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
                                                <div class="col-12 col-md-4 col-lg-4">
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
                                                        <div class="pricing-cta bg-primary">
                                                            <a href="#" class="bg-primaary text-white">Start <i class="fas fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




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
</body>
<script>
    $(document).ready(function() {
        let selectedSubjects = [];


    });
</script>
<script>

    // tryc('success', 'Welcome '+user  );




</script>
</html>