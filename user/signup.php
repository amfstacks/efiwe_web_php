<?php
$page_title = 'Sign Up';

require_once __DIR__ . '/../templates/authHeader.php';


$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    if (!$email) {
        $errors[] = 'Please enter a valid email address.';
    }

    if (empty($password)) {
        $errors[] = 'Please enter a password.';
    }

    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        // Call the signup API
//        echo $email;
//        echo $password;
        $result = signup($email, $password);
//var_dump($result);
//exit;
        if ($result['success']) {
            $success = $result['message'];

            $result = signin($email, $password);

            if ($result['success']) {
                // Assuming the API returns user data including accessToken
                $user_data = $result['data'];
                login_user($user_data);
//                header('Location: /');
                header('Location: index');

                exit();
            }
        } else {
            $errors[] = $result['message'];
        }
    }
}
?>





<body>
  <div class="loader"></div>
  <div id="app">
      <section class="section" id="logsection">

          <div class="container mt-5" style="
    max-width: 100% !important;
    margin: 0px;
    margin-right: 0px;
">
              <center>

                  <h4 class="aml-5 mt-2 text-muted"><img src="assets/img/logo.png" style="height:50px" class="mr-1"> <br class="break-line-mobile"> <?php echo APP_NAME?> </h4>

                  <hr class="w-50">
              </center>
              <div class="row m-t-25">

                  <div class="col-12 col-sm-12 col-md-6 col-lg-6  col-xl-6 bg-whaite p5-padding-left-right">


                      <div class="image-container">
                          <span class="overlay-mask"></span>
                          <img src="../assets/images/abb.jpg" style="heiaght:50px;width: 100%;height: 100%; object-fit: cover;" class="mr-1">
                          <div class="centered-text"><h2 class="text-white text-center">Start Your Journey to a GAINFUL ADMISSION!</h2></div>

                      </div>
                  </div>
                  <div class="col-12 col-sm-8  col-md-6  col-lg-6 col-xl-5 p5-padding-left-right">



                      <div class="carad card-sauccess">
                          <div class="card-heaader">
                              <!-- <h4>Login</h4> -->
                              <!-- <button class="btn btn-primary" id="swal-5a">Launch</button> -->
                              <h5 class="mt-0 mb-1"></h5>
                          </div>
                          <div class="card-body no-padding-left-right">


                              <form method="POST" action="#" class="needs-validation" novalidate="" id="logform">



                                  <center class="m-b-20 col-indaigo text-muted">
                                      <i class="fas fa-user-graduate font-50 btn-outline-primary"></i>
                                      <br><br>
                                      <b> JAMBITE SIGNUP </b>


                                      <hr style="width: 40%;">
                                  </center>
                                  <?php if (!empty($errors)): ?>
<!--                                      <div class="alert alert-danger"><p><b>Do not send money to anyone for admission purposes.</b><br> All payments should be made through official school channels. The school is not responsible for payments made to unauthorized persons.</p></div>-->
                                      <div class="alert alert-danger">
                                          <ul>
                                              <?php foreach ($errors as $error): ?>
                                                  <li><?php echo htmlspecialchars($error); ?></li>
                                              <?php endforeach; ?>
                                          </ul>
                                      </div>
                                  <?php endif; ?>

                                  <?php if ($success): ?>
                                  <div class="success">
                                      <?php echo $success; ?>
                                  </div>
                                  <?php endif; ?>

                                  <div class="form-group floating-addon">
                                      <label for="email">Email</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text">
                                                  <i class="fas fa-user-alt"></i>
                                                  <!-- <i class="material-icons">lock</i> -->
                                              </div>
                                          </div>
                                          <input id="lusername" type="text" class="form-control" name="email" tabindex="1" required autofocus>

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

                                      <div class="invalid-feedback">
                                          please fill in your password
                                      </div>
                                  </div>

                                  <div class="form-group floating-addon ">

                                      <label for="password" class="control-label">Password Again</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text">
                                                  <i class="fas fa-lock"></i>
                                                  <!-- <i class="material-icons">lock</i> -->
                                              </div>
                                          </div>
                                          <input id="lpassword" type="password" class="form-control" name="confirm_password" tabindex="2" required>


                                      </div>

                                      <div class="invalid-feedback">
                                          please fill in your password
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <button type="submit" id="submitlog" class="btn btn-primary btn-lg btn-block" tabindex="4" >
                                          Register
                                      </button>
                                  </div>

                                  <div class="mb-4 text-muted text-center " style=" border:solid 1px; padding:10px;">
                                     Already have an account ? <a href="login.php" class="text-success" style="cursor: pointer;"> Login</a>
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


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>