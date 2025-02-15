<?php
$page_title = '|| Subscription packages';

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
                                            <h4> Select a Subscription Package</h4>
                                        </div>
                                        <div class="card-body">




                                            <div class="row">
                                                <div class="col-12 col-md-4 col-lg-4 mx-auto">
                                                    <div class="pricing">
                                                        <div class="pricing-title">
                                                            Basic  Plan
                                                        </div>
                                                        <div class="pricing-padding">
                                                            <div class="h3 font-weight-bold">
                                                                <div><span id="price-display">3,000 </span><br><small>Basic Plan</small></div>
                                                            </div>
                                                            <div class="pricing-details">
<!--                                                                1 Month-->
                                                                <a href="#" class="btn btn-outline-primary bg-primary text-white" id="one-month-btn" >1 month</a>
                                                                <a href="#" class="btn btn-outline-primary"  id="three-month-btn">3 months</a>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-cta bg-primary">
                                                            <a href="#" class="bg-primary text-white">Subscribe <i class="fas fa-arrow-right"></i></a>
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




 <?php
include 'includes/footerjs.php';
?>
</body>
<script>
    $(document).ready(function() {


        let priceDisplay = $("#price-display");
        let oneMonthBtn = $("#one-month-btn");
        let threeMonthBtn = $("#three-month-btn");

        // Initially set the price and button styles
        let currentPrice = 3000;
        priceDisplay.html('3,000');

        // On 1 Month button click
        oneMonthBtn.on('click', function(e) {
            e.preventDefault();
            // Set the price for 1 month
            currentPrice = 3000;
            priceDisplay.html('3,000');

            // Toggle button styles
            oneMonthBtn.addClass('bg-primary text-white').removeClass('btn-outline-primary');
            threeMonthBtn.addClass('btn-outline-primary').removeClass('bg-primary text-white');
        });

        // On 3 Months button click
        threeMonthBtn.on('click', function(e) {
            e.preventDefault();
            // Set the price for 3 months
            currentPrice = 8500;
            priceDisplay.html('8,500');

            // Toggle button styles
            threeMonthBtn.addClass('bg-primary text-white').removeClass('btn-outline-primary');
            oneMonthBtn.addClass('btn-outline-primary').removeClass('bg-primary text-white');
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