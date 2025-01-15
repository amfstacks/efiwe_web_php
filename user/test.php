


<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Applicant Login</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->

    <style>

        .image-container {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 0 20px 20px 0; /* Rounded corners for the container */
            overflow: hidden; /* Ensures the overlay and image are contained */
        }

        .image-container img.rounded-image {
            width: 100%; /* Make sure the image covers the container */
            height: auto; /* Maintain aspect ratio */
            display: block; /* Remove bottom space/gap */
        }

        .overlay-mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
            z-index: 1; /* Overlay must be above the image */
        }

        .centered-text {
            position: absolute;
            top: 50%; /* Position halfway down the parent */
            left: 50%; /* Position halfway across the parent */
            transform: translate(-50%, -50%); /* Offset the position to truly center the element */
            color: white; /* High contrast color */
            font-size: 24px; /* Adjust size as necessary */
            z-index: 2; /* Make sure the text is above the overlay */
            text-align: center; /* Ensure multi-line text is centered */
            width: 80%;
        }

    </style>
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <meta title="">
    <meta description="">
    <script>

        function isValidEmailAddress(emailAddress) {
            var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            return pattern.test(emailAddress);
        };
    </script>
    <script>




    </script>
</head>

<body class="bg-white">
<div class="loader"></div>
<div id="app">

    <section class="section" id="logsection">

        <div class="container mt-5" style="
    max-width: 100% !important;
    margin: 0px;
    margin-right: 0px;
">
            <center>

                <h4 class="aml-5 mt-2 text-muted"><img src="assets/img/logo.png" style="height:50px" class="mr-1"> <br class="break-line-mobile"> YAGONGWO COLLEGE OF NURSING SCIENCES</h4>

                <hr class="w-50">
            </center>
            <div class="row m-t-25">

                <div class="col-12 col-sm-12 col-md-6 col-lg-6  col-xl-6 bg-white">


                    <div class="image-container">
                        <span class="overlay-mask"></span>
                        <img src="../img/e2.jpg" style="heiaght:50px;width: 100%;height: 100%; object-fit: cover;" class="mr-1">
                        <div class="centered-text"><h2 class="text-white text-center">Start Your Journey to a Rewarding Nursing Career Today!</h2></div>

                    </div>
                </div>
                <div class="col-12 col-sm-8  col-md-6  col-lg-6 col-xl-5 ">



                    <div class="carad card-sauccess">
                        <div class="card-heaader">
                            <!-- <h4>Login</h4> -->
                            <!-- <button class="btn btn-primary" id="swal-5a">Launch</button> -->
                            <h5 class="mt-0 mb-1"></h5>
                        </div>
                        <div class="card-body">


                            <form method="POST" action="#" class="needs-validation" novalidate="" id="logform">



                                <center class="m-b-20 col-indaigo text-muted">
                                    <i class="fas fa-user-graduate font-50 text-success"></i>
                                    <br><br>
                                    <b> APPLICANT LOGIN </b>


                                    <hr style="width: 40%;">
                                </center>
                                <div class="form-group floating-addon">
                                    <label for="email">Username || Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user-alt"></i>
                                                <!-- <i class="material-icons">lock</i> -->
                                            </div>
                                        </div>
                                        <input id="lusername" type="text" class="form-control" name="text" tabindex="1" required autofocus>

                                    </div>
                                    <!-- <input id="lusername" type="text" class="form-control" name="text" tabindex="1" required autofocus> -->
                                    <div class="invalid-feedback">
                                        Please fill in your username or userID
                                    </div>
                                </div>
                                <div class="form-group floating-addon ">

                                    <label for="password" class="control-label">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                                <!-- <i class="material-icons">lock</i> -->
                                            </div>
                                        </div>
                                        <input id="lpassword" type="password" class="form-control" name="password" tabindex="2" required>


                                    </div>

                                    <!-- <input id="lpassword" type="password" class="form-control" name="password" tabindex="2" required> -->
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="submitlog" class="btn btn-primary btn-lg btn-block" tabindex="4" disabled>
                                        Login
                                    </button>
                                </div>

                                <div class="mb-4 text-muted text-center " style=" border:solid 1px; padding:10px;">
                                    New Applicant? <a href="login.php" class="text-success" style="cursor: pointer;"> Apply here</a>
                                </div>
                                <!-- <div class="input-group">
                                  <div class="input-group-prepend" style="border-right: none !important;">
                                    <div class="input-group-text form-control" style="border-right: none !important;">
                                      <i class="fas fa-phone"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control phone-number" style="border-left: none !important;">
                                </div> -->
                            </form>

                            <!-- <div class="mt-5 text-muted text-center" style=" border:solid 1px; padding:10px;"> -->
                            <!-- Don't have an account? <a id="regswitch" class="text-warning" style="cursor: pointer;">Create One</a> -->

                            <!-- </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>
<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>
</body>


</html>
