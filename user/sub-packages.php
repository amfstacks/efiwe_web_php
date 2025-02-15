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
                                    <form class="needs-validation" novalidate="" id="profile-form" enctype="multipart/form-data">
                                        <div class="card-header">
                                            <h4> Select a Subscription Package</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-md-4 col-lg-4 mx-auto">
                                                    <div class="pricing">
                                                        <div class="pricing-title">
                                                            Basic Plan
                                                        </div>
                                                        <div class="pricing-padding">
                                                            <div class="h3 font-weight-bold">
                                                                <div><span id="price-display">3,000 </span><br><small>Basic Plan</small></div>
                                                            </div>
                                                            <div class="pricing-details">
                                                                <a href="#" class="btn btn-outline-primary bg-primary text-white" id="one-month-btn">1 month</a>
                                                                <a href="#" class="btn btn-outline-primary" id="three-month-btn">3 months</a>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-cta bg-primary">
                                                            <a href="#" class="bg-primary text-white" id="subscribe-btn">Subscribe <i class="fas fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 col-lg-4 mx-auto">
                                                    <div class="pricing pricing-highlight">
                                                        <div class="pricing-title">
                                                            Premium Plan
                                                        </div>
                                                        <div class="pricing-padding">
                                                            <div class="h3 font-weight-bold">
                                                                <div><span id="price-displayPremium">20,000 </span><br><small>Premium Plan</small></div>
                                                            </div>
                                                            <div class="pricing-details">
                                                                <a href="#" class="btn btn-outline-primary bg-primary text-white" id="pone-month-btn">1 month</a>
                                                                <a href="#" class="btn btn-outline-primary" id="pthree-month-btn">3 months</a>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-cta bg-primary" id="jmock">
                                                            <a href="#" class="bg-primary text-white" id="premium-subscribe-btn">Subscribe <i class="fas fa-arrow-right"></i></a>
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

<!-- Paystack Integration -->
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    $(document).ready(function() {
        let priceDisplay = $("#price-display");
        let oneMonthBtn = $("#one-month-btn");
        let threeMonthBtn = $("#three-month-btn");
        let subscribeBtn = $("#subscribe-btn");

        let selectedPackage = 'Basic';
        let selectedDuration = 1;  // Default: 1 month
        let selectedAmount = 3000;  // Default: 20,000

        // Update price and toggle button styles for Basic Plan
        oneMonthBtn.on('click', function(e) {
            e.preventDefault();
            selectedDuration = 1;
            selectedAmount = 3000;
            priceDisplay.html('3,000');
            oneMonthBtn.addClass('bg-primary text-white').removeClass('btn-outline-primary');
            threeMonthBtn.addClass('btn-outline-primary').removeClass('bg-primary text-white');
        });

        threeMonthBtn.on('click', function(e) {
            e.preventDefault();
            selectedDuration = 3;
            selectedAmount = 8500;
            priceDisplay.html('8,500');
            threeMonthBtn.addClass('bg-primary text-white').removeClass('btn-outline-primary');
            oneMonthBtn.addClass('btn-outline-primary').removeClass('bg-primary text-white');
        });

        let ppriceDisplay = $("#price-displayPremium");
        let poneMonthBtn = $("#pone-month-btn");
        let pthreeMonthBtn = $("#pthree-month-btn");
        let premiumSubscribeBtn = $("#premium-subscribe-btn");

        // Update price and toggle button styles for Premium Plan
        poneMonthBtn.on('click', function(e) {
            e.preventDefault();
            selectedPackage = 'Premium';
            selectedDuration = 1;
            selectedAmount = 20000;
            ppriceDisplay.html('20,000');
            poneMonthBtn.addClass('bg-primary text-white').removeClass('btn-outline-primary');
            pthreeMonthBtn.addClass('btn-outline-primary').removeClass('bg-primary text-white');
        });

        pthreeMonthBtn.on('click', function(e) {
            e.preventDefault();
            selectedPackage = 'Premium';
            selectedDuration = 3;
            selectedAmount = 55000;
            ppriceDisplay.html('55,000');
            pthreeMonthBtn.addClass('bg-primary text-white').removeClass('btn-outline-primary');
            poneMonthBtn.addClass('btn-outline-primary').removeClass('bg-primary text-white');
        });

        // Trigger Paystack payment on Subscribe button click
        subscribeBtn.on('click', function(e) {
            e.preventDefault();


        });

        // Trigger Paystack payment for Premium Plan
        premiumSubscribeBtn.on('click', function(e) {
            e.preventDefault();


        });
    });
</script>

</body>
</html>
