<?php
$page_title = '|| Subscription packages';

require_once __DIR__ . '/../templates/loggedInc.php';
$queryParams = [
    'uid' => $uid,
    'refreshtoken' => $refreshToken
];
$response = api_request_get('subData', $queryParams, 'GET', $accessToken, $refreshToken);

$amount = '';
$duration = '';
$end_date = '';
$package = '';

$errorWithFetch = true;
if ($response['success']) {
    $subdata = $response['data'];
    $amount =  $subdata['amount'];
    $duration =  $subdata['duration'];
    $end_date =  $subdata['end_date']['date'];

    $end_date_string = isset($subdata['end_date']['date']) ? $subdata['end_date']['date'] : '';  // e.g., "2025-05-16 13:13:47.000000"

if($end_date_string != '') {
    $end_date = new DateTime($end_date_string);

// Format the date to a user-friendly format (e.g., May 16, 2025 at 1:13 PM)
    $end_date = $end_date->format('F j, Y \a\t g:i A');

// Output the formatted date

}

    $package =  $subdata['package'];
//    var_dump($subdata);
    $errorWithFetch = false;
}
//var_dump($end_date);
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
                                    <form class="needs-validation" novalidate="" id="profile-form" enctype="multipart/form-data">
                                        <div class="card-header">
                                            <?php
                                            if($errorWithFetch){
                                            ?>
                                            <div class="col-lg-6">
                                                <div class="carda">
                                                    <div class="card-bodya card-type-3">
                                                        <div class="row">
                                                            <div class="col">
                                                                YOUR SUBSCRIPTION<br>
                                                                <span class="btn btn-lg btn-primary font-20 m-r-20"><?php echo $package?> plan <br></span>
                                                                <div class="font-weight-bold mt-1 h3">₦<?php echo $amount?><small><p class="mt-0 mb-0 text-muted text-sm">
                                                                            <span class="text-warning mr-2"> Expires</span>
                                                                            <span class="text-nowrap"><?php echo $end_date ?></span>
                                                                        </p></small></div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            else{
                                                echo '   <div class="alert alert-danger">
                                                Error fetching Subscription 
                    </div>';
                                            }
                                            ?>

                                        </div>
                                        <div class="card-body">
                                            <h4 class="mb-5"> Select a Subscription Package</h4>

                                            <div class="row">

                                                <div class="col-12 col-md-4 col-lg-4 mx-auto">
                                                    <div class="pricing">
                                                        <div class="pricing-title">
                                                            Basic Plan
                                                        </div>
                                                        <div class="pricing-padding">
                                                            <div class="h3 font-weight-bold">
                                                                <div><span id="price-display">₦3,000 </span><br><small>Basic Plan</small></div>
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
                                                                <div><span id="price-displayPremium">₦20,000 </span><br><small>Premium Plan</small></div>
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
        let selectedAmount = 3000;
        let pselectedPackage = 'Premium';
        let pselectedDuration = 1;  // Default: 1 month
        let pselectedAmount = 20000;  // Default: 20,000

        // Update price and toggle button styles for Basic Plan
        oneMonthBtn.on('click', function(e) {
            e.preventDefault();
            selectedDuration = 1;
            selectedAmount = 3000;
            priceDisplay.html('₦3,000');
            oneMonthBtn.addClass('bg-primary text-white').removeClass('btn-outline-primary');
            threeMonthBtn.addClass('btn-outline-primary').removeClass('bg-primary text-white');
        });

        threeMonthBtn.on('click', function(e) {
            e.preventDefault();
            selectedDuration = 3;
            selectedAmount = 8500;
            priceDisplay.html('₦8,500');
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
            pselectedPackage = 'Premium';
            pselectedDuration = 1;
            pselectedAmount = 20000;
            ppriceDisplay.html('₦20,000');
            poneMonthBtn.addClass('bg-primary text-white').removeClass('btn-outline-primary');
            pthreeMonthBtn.addClass('btn-outline-primary').removeClass('bg-primary text-white');
        });

        pthreeMonthBtn.on('click', function(e) {
            e.preventDefault();
            pselectedPackage = 'Premium';
            pselectedDuration = 3;
            pselectedAmount = 55000;
            ppriceDisplay.html('₦55,000');
            pthreeMonthBtn.addClass('bg-primary text-white').removeClass('btn-outline-primary');
            poneMonthBtn.addClass('btn-outline-primary').removeClass('bg-primary text-white');
        });

        // Trigger Paystack payment on Subscribe button click
        subscribeBtn.on('click', function(e) {
            e.preventDefault();
            subscribeBtn.addClass('btn-progress');
            // return;
            fetch('paystack_payment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ amount: selectedAmount,duration:selectedDuration,package:selectedPackage })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        // Redirect the user to the Paystack payment page (no public key required)
                        window.location.href = data.authorization_url;
                    } else {
                        alert("Error initializing payment");
                    }
                    subscribeBtn.removeClass('btn-progress');
                });

        });

        // Trigger Paystack payment for Premium Plan
        premiumSubscribeBtn.on('click', function(e) {
            e.preventDefault();
//             alert(pselectedPackage);
//             alert(pselectedDuration);
//             alert(pselectedAmount);
// return;
            subscribeBtn.addClass('btn-progress');

            fetch('paystack_payment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ amount: pselectedAmount,duration:pselectedDuration,package:pselectedPackage })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        // Redirect the user to the Paystack payment page (no public key required)
                        window.location.href = data.authorization_url;
                    } else {
                        alert("Error initializing payment");
                    }
                    subscribeBtn.removeClass('btn-progress');

                });
        });
    });
</script>

</body>
</html>
