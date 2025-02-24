


<!DOCTYPE html>
<html lang="en">


<!-- profile.html  21 Nov 2019 03:49:30 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Profile</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/css/app.min.css">
    <link rel="stylesheet" href="../assets/bundles/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="../assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../assets/bundles/izitoast/css/iziToast.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />
    <style>
        /* Select2 specific class to set 100% width */
        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            width: 100%;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
        }

    </style>
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg d-print-none"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                    <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                            <i data-feather="maximize"></i>
                        </a></li>
                    <li class="w-100 text-center">
                        <center>
                            <h4 class="ml-5 mt-2 navmobile"><img src="../assets/img/logo.png" style="height:50px" class="mr-1">YAGONGWO COLLEGE OF <br class="mobile-break"> NURSING SCIENCES</h4>
                        </center>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav navbar-right">

                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                                             class="nav-link nav-link-lg message-toggle"><i data-feather="bell" class="bell"></i>
                        <span class="badge headerBadge1">
              3</span> </a>

                    <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                 class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
                               </a> -->

                    <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                        <div class="dropdown-header">
                            3 Notifications                <div class="float-right">
                                <a href="#"></a>
                            </div>
                        </div>
                        <!-- <div class="dropdown-list-content dropdown-list-icons"> -->
                        <div class="dropdown-list-content dropdown-list-message">
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="#">.... </a>
                        </div>
                    </div>
                </li>
                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="a" src="uploads/12324310a4ca04db55624b73a75276f4d03c9cimg.jpg"
                                                                                                         class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title">Hello  </div>
                        <a href="biodata.php" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
                        </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                            Activities
                            <!-- </a> <a href="biodata.php?message=setting" class="dropdown-item has-icon"> <i class="fas fa-cog"></i> -->
                        </a> <a href="biodata.php" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                            Biodata
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav><div class="main-sidebar sidebar-style-2 bg-primarya d-print-none">
            <aside id="sidebar-wrapper ">
                <div class="sidebar-brand bg-warniang" style="
    border-bottom: 1px solid #eadbdb;
">
                    <a href="index.php"> <img alt="YCNS" src="../assets/img/logo.png" class="header-logo" /> <span
                                class="logo-name">YCNS</span>
                        <!-- <hr> -->
                    </a>
                </div>
                <ul class="sidebar-menu ">
                    <li class="menu-header">Main</li>
                    <li class="dropdown active">
                        <a href="index.php" class="nav-link"><i class="

              fas fa-chart-area"></i><span>Dashboard</span></a>
                    </li>

                    <!-- <li class="dropdown">
                      <a href="#" class="menu-toggle nav-link has-dropdown"><i
                          data-feather="briefcase"></i><span>Widgets</span></a>
                      <ul class="dropdown-menu">
                        <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                        <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
                      </ul>
                    </li> -->


                    <li><a class="nav-link" href="#"><i class="fas fa-chalkboard"></i><span>My Classroom</span></a></li>
                    <li><a class="nav-link" href="subject.php"><i class="fas fa-book-reader"></i><span>My Courses</span></a></li>

                    <li><a class="nav-link" href="noticeboard.php"><i class="fas fa-clipboard"></i><span>Notice Board</span></a></li>
                    <li><a class="nav-link" href="result.php"><i class="fas fa-clipboard"></i><span>Result</span></a></li>

                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="
fas fa-clipboard-list"></i><span>Exam</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="allexam_timetable.php">Time table</a></li>
                            <!--<li><a class="nav-link" href="enrol.php">Enrol</a></li>-->
                            <li><a class="nav-link" href="all_enrol.php">Take Exams</a></li>

                        </ul>
                    </li>

                    <!-- <li class="dropdown">
                      <a href="#" class="menu-toggle nav-link has-dropdown"><i class="
                      fas fa-chart-line"></i><span>Performance</span></a>
                      <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Result</a></li>
                        <li><a class="nav-link" href="#">Analysis</a></li>



                      </ul>
                    </li> -->

                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="
              fas fa-user-graduate "></i><span>My Account</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="biodata.php">Biodata</a></li>
                            <li><a class="nav-link" href="signature.php">My Signature</a></li>
                            <li><a class="nav-link" href="changepass.php">Change Password</a></li>



                        </ul>
                    </li>
                </ul>
            </aside>
        </div>





        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-4" id="userdetails">
                            <div class="card author-box">
                                <div class="card-header">
                                    <h4>Personal Details</h4>
                                </div>
                                <div class="card-body">

                                    <div class="author-box-center">
                                        <img alt="image" src="uploads/12324310a4ca04db55624b73a75276f4d03c9cimg.jpg" class="rounded-circle author-box-picture">
                                        <div class="clearfix"></div>
                                        <div class="author-box-name">
                                            <a href="#"> </a>
                                        </div>
                                        <!-- <div class="author-box-job">Change Passport</div> -->
                                        <a href="#changepassport"  data-toggle="modal" >   <small> <span class="badge badge-primary">Change Passport</span></small></a>
                                    </div>
                                    <div class="author-box-description align-center">
                                        <p>
                                            Watching movies, Reading
                                        </p>
                                    </div>
                                    <div class="py-4">
                                        <p class="clearfix">
                        <span class="float-left">
                         Full name
                        </span>
                                            <span class="float-right text-muted">
                        OLAIFA RAMOTA OLUWABUKOLA                        </span>
                                        </p>
                                        <!-- <p class="clearfix">
                                            <span class="float-left">
                                             Payment Status
                                            </span>
                                            <span class="float-right text-muted">
                                            <span class='text-success'>  Paid <i class='fas fa-check-circle'></i> </span>                        </span>
                                          </p> -->
                                        <!-- <p class="clearfix">
                                            <span class="float-left">
                                             Trainee ID
                                            </span>
                                            <span class="float-right text-muted">
                                            BM/A24/002                        </span>
                                          </p> -->
                                        <p class="clearfix">
                        <span class="float-left">
                         Department
                        </span>
                                            <span class="float-right text-muted">
                        Basic Midwifery                        </span>
                                        </p>
                                        <p class="clearfix">
                        <span class="float-left">
                         Gender
                        </span>
                                            <span class="float-right text-muted">
                        Female                        </span>
                                        </p>
                                        <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                                            <span class="float-right text-muted">
                        09028602460                        </span>
                                        </p>
                                        <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                                            <span class="float-right text-muted">
                        romotolaifa@gmail.com
                        </span>
                                        </p>
                                        <p class="clearfix">
                        <span class="float-left">
                          Religion
                        </span>
                                            <span class="float-right text-muted">
                        Islam
                        </span>
                                        </p>
                                        <p class="clearfix">

                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-12 col-lg-8" id="profilesetup">
                            <div class="card">
                                <div class="padding-20">

                                    <button class="btn btn-lg btn-success font-20 mb-2">
                                        Matric Number: BM/A24/002</button>

                                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                               aria-selected="true">Status</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                                               aria-selected="false">Profile</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content tab-bordered" id="myTab3Content">
                                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12 align-center">

                                                    <div class="author-box-center padding-20">
                                                        ACTIVE<br>
                                                        <i class="fas fa-check-circle  font-50 col-green" ></i>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>

                                        <div class="tab-pane fade " id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                            <form  class="needs-validation" novalidate=""  id="bioform" action="func/biodata.php" method="POST" enctype="multipart/form-data" >
                                                <div class="card-header">
                                                    <h4> Update your Biodata</h4>
                                                </div>
                                                <div class="card-body">





                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Full Name</label>
                                                            <input type="text" class="form-control" name="ln"  value="OLAIFA RAMOTA OLUWABUKOLA" disabled>
                                                            <div class="invalid-feedback">
                                                                Please fill in your last name
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


                                                    </div>
                                                    <div class="row">


                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Email</label>

                                                            <input type="email" placeholder="Enter your email" class="form-control" id="mail" name="mail" value="romotolaifa@gmail.com" required >
                                                            <!-- <div class="invalid-feedback">
                                                              Please fill in your email
                                                            </div> -->
                                                        </div>
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Phone Number</label>
                                                            <input type="number" placeholder="Enter your Phone Number"class="form-control" id="pno" name="pno" value="09028602460" required>
                                                            <div class="invalid-feedback">
                                                                Please fill in your contact number
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Religion</label>
                                                            <select class="form-control col-12 select2" style="width: 100%;" id="religion" name="religion" required>
                                                                <option value='Islam'>  Islam</option>                      <option value="">Select your religion</option>

                                                                <option value="Christian">Christian</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Others">Others</option>


                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select your religion
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6 col-12">
                                                            <label>State of Origin</label>
                                                            <select onchange="toggleLGA(this);"  class="form-control col-12 select2" style="width: 100%;" id="sor" name="sor"  required>
                                                                <!-- <option value="">.....</option> -->
                                                                <option value='Ogun'>  Ogun</option>                      <option value=""> Select State </option>

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
                                                                Please select your religion
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Blood Group</label>
                                                            <select class="form-control col-12 select2" style="width: 100%;" id="bg" name="bg" required>
                                                                <option value='A+'>  A+</option>                      <option value="">Select your blood group</option>

                                                                <option value="A+" >A+</option>
                                                                <option value="A-">A-</option>
                                                                <option value="B+">B+</option>
                                                                <option value="B-">B-</option>
                                                                <option value="AB+">AB+</option>
                                                                <option value="AB-">AB-</option>
                                                                <option value="O+">O+</option>
                                                                <option value="O-">O-</option>


                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select your blood group
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Department</label>
                                                            <input type="text" class="form-control" value=" Basic Midwifery " id="dept" disabled name="dept">

                                                        </div>
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Matric Number</label>
                                                            <input type="tel" class="form-control" value="BM/A24/002" disabled name="sid">


                                                            <input type="hidden" class="form-control" value="100"  name="ulv">
                                                            <!--//new-->

                                                        </div>
                                                        <div class="form-group col-md-6 col-12">

                                                            <label>Bio ( <small>a bit about you</small> )</label>
                                                            <!-- <textarea
                                                              class="form-control" >

                                                              </textarea> -->
                                                            <textarea class="form-control"  id="bio" name="bio"  value="" required >Watching movies, Reading </textarea>
                                                            <div class="invalid-feedback">
                                                                Say a bit about yourself?
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--  <div class="row">-->

                                                    <input type="hidden" class="form-control" id="profile-img" name="update" value="update" >                           <!--  </div>-->

                                                </div>
                                                <div class="card-footer text-right">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <div class="modal fade" id="changepassport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Passport : <b><span id="userstdidb"></span></b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="passportForm" enctype="multipart/form-data"  method="POST">
                        <div class="modal-body">
                            <div class="form-group col-md-12 col-12">
                                <img src="" id="currentimage" height="100px" class="img-responsive m-b-15" style="height: 100px ! important" />
                                <br>
                                <label>Select a new passport (<small>Max size: 200kb</small>) </label>
                                <input type="file" class="form-control" id="profile-imgb" name="image" required>
                                <img src="" id="profile-img-tagb" height="100px" class="img-responsive" style="height: 100px ! important" />
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary" id="passportchangeProceed">Update Passport</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                kjgvhug
            </div>
            <div class="footer-right">
            </div>
        </footer>    </div>
</div>
<!-- General JS Scripts -->
<script src="../assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="../assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="../assets/bundles/izitoast/js/iziToast.min.js"></script>
<script src="../assets/js/page/toastr.js"></script>
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="../assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/lga.min.js"></script>
</body>

<script>
    $(document).ready(function() {
            //   jQuery.noConflict();
            // alert('a');


            $("#bioform").on('submit', function(e) {
                var gender = $("#gender").val();
                var mail = $("#mail").val();
                var pno = $("#pno").val();
                var dob = $("#dob").val();
                var bg = $("#bg").val();
                var state = $("#sor").val();
                var lga = $("#lga").val();
                var bio = $("#bio").val();
                var religion = $("#religion").val();
                var imgup = $("#profile-img").val();

                if (gender == '' || mail == '' || pno == '' || state == '' || bio == '' || religion == '' || imgup == '' || dob == '' || bg == '' || lga == '') {
                    tryc("error", "ALL FIELDS ARE COMPULSORY");
                    return false;
                }

                e.preventDefault();
                $("#bioform").addClass("was-validated");

                $.ajax({
                    url: "func/biodata.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    timeout: 40000,
                    beforeSend: function() {
                        $('#subm').attr('disabled', 'disabled');
                        $('#subm').text('please wait...');
                        $('#subm').addClass("btn-progress disabled");
                    },
                    success: function(data) {
                        data = data.trim();
                        if (data == 'go') {
                            $('#subm').attr('disabled', 'disabled');
                            $('#subm').text('Biodata saved...');
                            $('#subm').addClass("btn-success");
                            $('#subm').removeClass("btn-progress btn-primary");
                            tryc("success", "BIODATA SAVED", "");
                            setTimeout(function() {
                                window.location.href = "index.php?act=bios";
                            }, 1000);
                        }

                        else if(data=='emptyfields')
                        {
                            $('#subm').attr('disabled', false);

                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");
                            // invalid file format.
                            $('#subm').text('Retry');

                            tryc("warning","SOME COMPULSORY FIELDS ARE EMPTY", "");

                        }
                        else if(data=='emailexist')
                        {
                            $('#subm').attr('disabled', false);
                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");

                            $('#subm').text('Retry');
                            $('#subm').attr('disabled', false);
                            tryc("error","Email  exists, Please enter a different email address", "");
                            //   alert(data);
                            //  // invalid file format.
                            //  $("#err").html("Invalid File !").fadeIn();
                        }
                        else if(data=='pnoexist')
                        {
                            $('#subm').attr('disabled', false);
                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");

                            $('#subm').text('Retry');
                            $('#subm').attr('disabled', false);
                            tryc("error","Phone number exists, Please enter a different phone number", "");
                            //   alert(data);
                            //  // invalid file format.
                            //  $("#err").html("Invalid File !").fadeIn();
                        }
                        else if(data=='invalidimage')
                        {
                            $('#subm').attr('disabled', false);

                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");
                            // invalid file format.
                            $('#subm').text('save');
                            tryc("warning","INVALID PASSPORT", "select a valid image for your passport");

                        }
                        else if(data=='imagenotuploaded')
                        {
                            $('#subm').attr('disabled', false);

                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");
                            $('#subm').text('save');
                            tryc("error","Passport Error", "your image is not uploaded, pls try again");

                        }
                        else if(data=='imagesizer')
                        {
                            $('#subm').attr('disabled', false);

                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");
                            $('#subm').text('Retry...');
                            tryc("error","Large Imagesize", "your image is too large,\n select an image of less than 200kb");
// alert('largeimage');
                        }
                        else if(data=='empty')
                        {
                            $('#subm').attr('disabled', false);
                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");

                            $('#subm').text('save');
                            tryc("error","EMPTY DATA", "");
                            //   alert(data);
                            //  // invalid file format.
                            //  $("#err").html("Invalid File !").fadeIn();
                        }

                        else if (data == 'update') {
                            $('#subm').attr('disabled', 'disabled');
                            $('#subm').text('Biodata updated...');
                            $('#subm').addClass("btn-success");
                            $('#subm').removeClass("btn-progress btn-primary");
                            tryc("success", "BIODATA UPDATED", "");
                        } else {
                            $('#subm').attr('disabled', false);
                            $('#subm').removeClass("btn-progress");
                            $('#subm').addClass("btn-primary");
                            tryc("error", "ERROR", "");
                            $('#subm').text('Retry');
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        if (textStatus == 'timeout') {
                            tryc("warning", "Your internet connection seems to be slow, please try again");
                            $('#subm').attr("disabled", false);
                            $('#subm').removeClass("btn-progress").addClass("btn-primary").text("Retry");
                        }
                        xhr.abort();
                    }
                });
            });


            $("#bioformbb").on('submit',(function(e) {
                // alert('a');return false;




                // var fn=$("#fn").val();

                var gender=$("#gender").val();
                var mail=$("#mail").val();
                var pno=$("#pno").val();
                var dob=$("#dob").val();
                var bg=$("#bg").val();

                var state=$("#sor").val();
//  var training=$("#train").val();religion
                var bio=$("#bio").val();
                var religion=$("#religion").val();
                var imgup=$("#profile-img").val();

//  profile-img

//  if ( fn=='' || gender=='' || mail=='' || pno=='' || state=='' || bio=='' || religion=='' || imgup=='' || dob=='' || bg==''){
//   tryc("error", "ALL FIELDS ARE COMPULSORY");
//   return false;

// }
                // exit();
                console.log(e);
                // alert('a');
                $("#bioform").addClass("was-validated");
                e.preventDefault();
                xhr = $.ajax({
                    url: "func/biodata.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    timeout:40000,
                    beforeSend : function()
                    {
                        // alert('b');
                        //$("#preview").fadeOut();
                        // $("#err").fadeOut();
                        // $("#bioform").addClass("was-validated");
                        $('#subm').attr('disabled', 'disabled');
                        $('#subm').text('please wait...');
                        $('#subm').addClass("btn-progress", "disabled");

                        // $('.circle-loader').css({"display":"block"});
                        // break;
                    },
                    success: function(data)
                    {
                        data = data.trim()
                        // alert(data);
                        // data = trim(data);
                        if(data=='go')
                        {
                            //   alert(data);
                            $('#subm').attr('disabled', 'disabled');
                            // showToastPosition('imgsuccess');
                            $('#subm').text('Biodata saved...');
                            $('#subm').addClass("btn-success");

                            $('#subm').removeClass("btn-progress");
                            $('#subm').removeClass("btn-primary");
                            tryc("success","BIODATA SAVED", "");

                            setTimeout(function() {


                                window.location.href="index.php?act=bios";
                            }, 1000);


                            // invalid file format.
                            //  $("#err").html("Invalid File !").fadeIn();
                        }
                        else if(data=='emptyfields')
                        {
                            $('#subm').attr('disabled', false);

                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");
                            // invalid file format.
                            $('#subm').text('Retry');
                            tryc("warning","SOME COMPULSORY FIELDS ARE EMPTY", "");

                        }
                        else if(data=='invalidimage')
                        {
                            $('#subm').attr('disabled', false);

                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");
                            // invalid file format.
                            $('#subm').text('save');
                            tryc("warning","INVALID PASSPORT", "select a valid image for your passport");

                        }
                        else if(data=='imagenotuploaded')
                        {
                            $('#subm').attr('disabled', false);

                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");
                            $('#subm').text('save');
                            tryc("error","Passport Error", "your image is not uploaded, pls try again");

                        }
                        else if(data=='imagesizer')
                        {
                            $('#subm').attr('disabled', false);

                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");
                            $('#subm').text('Retry...');
                            tryc("error","Large Imagesize", "your image is too large,\n select an image of less than 200kb");
// alert('largeimage');
                        }
                        else if(data=='empty')
                        {
                            $('#subm').attr('disabled', false);
                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");

                            $('#subm').text('save');
                            tryc("error","EMPTY DATA", "");
                            //   alert(data);
                            //  // invalid file format.
                            //  $("#err").html("Invalid File !").fadeIn();
                        }
                        else if(data=='update')
                        {
                            $('#subm').attr('disabled', 'disabled');
                            // showToastPosition('imgsuccess');
                            $('#subm').text('Biodata updated...');
                            $('#subm').addClass("btn-success");

                            $('#subm').removeClass("btn-progress");
                            $('#subm').removeClass("btn-primary");
                            tryc("success","BIODATA UPDATED", "");
                            //   alert(data);
                            //  // invalid file format.
                            //  $("#err").html("Invalid File !").fadeIn();
                        }
                        else
                        {
                            $('#subm').attr('disabled', false);

                            $('#subm').removeClass("btn-progress");

                            $('#subm').addClass("btn-primary");
                            //  alert('error');
                            tryc("error","ERROR", "");
                            $('#subm').text('Retry');
                            // exit();
                            // alert ('cool');
                            // view uploaded file.
                            //  $("#preview").html(data).fadeIn(2000);
                            //  $(".profile-image ").html(data).fadeIn(2000);

                            xhr.abort;

                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {

                        if (textStatus == 'timeout') {
                            tryc("warning", "Your internet connection seems to be slow, pls try again");
                            $('#subm').attr("disabled", false);
                            $('#subm').removeClass("btn-progress");


                            $('#subm').addClass("btn-primary");
                            $('#subm').text("Retry");
                        }
                        xhr.abort;
                    } ,
                    //  error: function(e)
                    //   {
                    //     alert(e);
                    //     console.log(e);
                    // $("#preview").html(e).fadeIn();
                    //   }
                });
            }));


        }
    );
</script>




<script type="text/javascript">
    function readURLa(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURLa(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img-tagb').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-imgb").change(function(){
        readURL(this);
    });





    // var body = $("body"),
    //   w = $(window);

    // if (w.outerWidth() <= 1024) {
    //   body.removeClass("search-show search-gone");
    //   if (body.hasClass("sidebar-gone")) {
    //     body.removeClass("sidebar-gone");
    //     body.addClass("sidebar-show");
    //   } else {
    //     body.addClass("sidebar-gone");
    //     body.removeClass("sidebar-show");
    //   }

    //   update_sidebar_nicescroll();
    // } else {
    //   body.removeClass("search-show search-gone");
    //   if (body.hasClass("sidebar-mini")) {
    //     toggle_sidebar_mini(false);
    //   } else {
    //     toggle_sidebar_mini(true);
    //   }
    // }

    // return false;

</script>
</html>


back to out daily tasks

its working perfectly well

this is a sample of our data
{
"isNewToken": false,
"token": "eyJhbGciOiJSUzI1NiIsImtpZCI6ImRjNjI2MmYzZTk3NzIzOWMwMDUzY2ViODY0Yjc3NDBmZjMxZmNkY2MiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vZWZpd2VhcHAtODM0YjUiLCJhdWQiOiJlZml3ZWFwcC04MzRiNSIsImF1dGhfdGltZSI6MTc0MDMxMjI0OSwidXNlcl9pZCI6IjZ0YTZybUlSQk1UZ3JXTDFLZGxqRGxqOGRkMDIiLCJzdWIiOiI2dGE2cm1JUkJNVGdyV0wxS2RsakRsajhkZDAyIiwiaWF0IjoxNzQwMzc4NDUwLCJleHAiOjE3NDAzODIwNTAsImVtYWlsIjoiZWZpd2V0ZXN0MDAyQGdtYWlsLmNvbSIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJlbWFpbCI6WyJlZml3ZXRlc3QwMDJAZ21haWwuY29tIl19LCJzaWduX2luX3Byb3ZpZGVyIjoicGFzc3dvcmQifX0.EN9W1MeLDPYgQpEBATdCU4PSgECJI3xkJ3BZL9dSL3t3dS6QpJ_NWJMjeDcXs2N657ascp4Koo5wR1X7xXNYsUFzVIamTd-XQg6nLcljDzZi3hY3b6-Nw2nihe-gu8IvVEPiYhXlA3tDGyVTdU1RGKPRKGxCrjTLlge7s5osCl5_XIPsLWlRPkJ4rWIvVJ5Q7F7iytZzi-xP1tIVhzqmzhGuHZtBNxoxQjrFM1qUGjBlU25U8ib0-xNgbIep2doUAZRUywQOlrBOQDg9EeFE_s5lDIo0bu_Dv5gZ56NQlWAE8O-H6WNvPxCJTHaQcKqDUci4ZvoWlpDfvnOcK9_PKA",
"success": true,
"data": [
{
"mock_week": "11",
"type": "mock",
"video_watched": false,
"active_recall_taken": false,
"assigned_date": "2025-02-24",
"completed": false,
"instruction": "This mock exam simulates the actual JAMB experience. Manage your time wisely, stay focused, and treat it like the real exam!",
"duration": 120,
"totalquestions": 180
},
{
"topic_id": "fRxmJou23M3M4Oc9yw3h",
"subject_id": "69KYTqYqCffzAW2lfuGN",
"subject": "Chemistry",
"type": "topic",
"video_watched": false,
"active_recall_taken": false,
"assigned_date": "2025-02-24",
"topic_data": {
"topic": "18.\tMetals & Their Compounds.",
"id": "fRxmJou23M3M4Oc9yw3h",
"doc": "https:\/\/drive.google.com\/uc?export=download&id=1Q-Q4g49WbYrIzfxfMog4l4TjBkSnIjU1",
"video": "https:\/\/youtu.be\/YzeLQkTH1iM",
"activerecall": true
}
},
{
"mock_week": "1",
"type": "mock",
"video_watched": false,
"active_recall_taken": false,
"assigned_date": "2025-02-24",
"completed": false,
"instruction": "This mock exam simulates the actual JAMB experience. Manage your time wisely, stay focused, and treat it like the real exam!",
"duration": 120,
"totalquestions": 180
},
{
"mock_week": "13",
"type": "mock",
"video_watched": false,
"active_recall_taken": false,
"assigned_date": "2025-02-24",
"completed": false,
"instruction": "This mock exam simulates the actual JAMB experience. Manage your time wisely, stay focused, and treat it like the real exam!",
"duration": 120,
"totalquestions": 180
},
{
"topic_id": "FiNmugB3p6pdrbU7Sp28",
"subject_id": "69KYTqYqCffzAW2lfuGN",
"subject": "Chemistry",
"type": "topic",
"video_watched": false,
"active_recall_taken": false,
"assigned_date": "2025-02-24",
"topic_data": {
"topic": "8.\tAcid. Bases. Salts: Hydrolysis Of Salts",
"id": "FiNmugB3p6pdrbU7Sp28",
"doc": "https:\/\/drive.google.com\/uc?export=download&id=1-nH-jEcrXPc8n0lQFkJCqFIkAIRSXWzZ",
"video": "https:\/\/youtu.be\/ROMhqEm1ohk",
"activerecall": true
}
},
{
"topic_id": "uc8JWf7N1oKo3qCYzBrs",
"subject_id": "69KYTqYqCffzAW2lfuGN",
"subject": "Chemistry",
"type": "topic",
"video_watched": false,
"active_recall_taken": false,
"assigned_date": "2025-02-24",
"topic_data": {
"topic": "1.\tNature of Matter. Separation Of Mixtures",
"id": "uc8JWf7N1oKo3qCYzBrs",
"doc": "https:\/\/drive.google.com\/uc?export=download&id=1STI0qLLRrF0WJHHAgS92GA4sQiN12KOC",
"video": "https:\/\/youtu.be\/HlSGN6_JzBc",
"activerecall": true
}
},
{
"topic_id": "jRm6p1yaP8liC3fgbxsW",
"subject_id": "69KYTqYqCffzAW2lfuGN",
"subject": "Chemistry",
"type": "topic",
"video_watched": false,
"active_recall_taken": false,
"assigned_date": "2025-02-24",
"topic_data": {
"topic": "16.\tNon-metal I; Hydrogen. Oxygen Carbon. Phosphorus.",
"id": "jRm6p1yaP8liC3fgbxsW",
"doc": "https:\/\/drive.google.com\/uc?export=download&id=17PCE3OUknL4Lin0Ybc1qTuBih7AlLwdU",
"video": "",
"activerecall": true
}
}
],
"code": 200,
"message": "success"
}


now what i want to do now is this



when an active recall is taken

check if the topic_id is among the task for the day, if it is
then:
i want to grab topic_id and the current date and update in 2 places
1. the local $_SESSION['dailyTaskRawData'] set active_recall_taken to true

and then
2. update it online as well!

In firestore