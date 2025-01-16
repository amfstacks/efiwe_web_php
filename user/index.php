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
                    <div class="col-xl-3 col-lg-3 col-sm-12 col-12 ">

                        <button type="button" class="btn btn-primary btn-icon icon-left m-b-15 w-100 align-left">
                            <!-- <i class="material-icons" style="vertical-align: top;">account_box</i> -->

                            <i class="fas fa-user-graduate"></i>
                            <span style="font-size: 13px;">DASHBOARD </span>
                        </button>

                    </div>

<!--                    <div class="col-xl-4 col-lg-4 col-sm-12 col-12">-->
<!---->
<!--                        <button type="button" class="btn btn-primary btn-icon icon-left m-b-15 float-right w-100 align-left">-->
<!---->
<!--                            <i class="fas fa-calendar-alt"></i>-->
<!--                            <span style="font-size: 13px;"> 2024/2025 : 2nd semester  </span>-->
<!--                        </button>-->
<!--                    </div>-->
                </div>
                <div class="row ">


                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-15"> OLAIFA RAMOTA OLUWABUKOLA</h5>

                                                <!-- <h2 class="mb-3 font-18">1,287</h2> -->
                                                <p class="mb-3"><span class="col-orange">Full Name</span> </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">

                                                <img src="assets/img/user.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="card">

                            <div class="card-body card-type-3">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-muted mb-0">Completed Daily Tasks</h6>
<!--                                        <span class="font-weight-bold mb-0">450</span>-->
                                    </div>
                                    <div class="col-auto">
                                        <div class="card-circle l-bg-green-dark text-white">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                <ul class="list-unstyled list-unstyled-border">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="float-right">
<!--                                                <div class="font-weight-600 text-muted text-small">112 Sales</div>-->
                                            </div>
                                            <div class="media-title">0/0</div>
                                            <div class="mt-1">
<!--                                                <div class="budget-price bg-grey">-->
<!--                                                    <div class="budget-price-square bg-primary" data-width="61%" style="width: 61%;"></div>-->
<!--                                                </div>-->
                                                <div class="progress mb-3">
<!--                                                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50</div>-->
                                                    <div class="progress-bar" role="progressbar" data-width="75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6">
                        <div class="card l-bg-green">
                            <div class="card-statistic-3 float-right">
                                <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                                <div class="card-content">
                                    <h4 class="card-title">New Orders</h4>
                                    <span>524</span>
                                    <div class="progress mt-1 mb-1" data-height="8" style="height: 8px;">
                                        <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                    </div>
                                    <p class="mb-0 text-sm">
                                        <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>Completed Daily Tasks</h4>
                            <div class="card-header-action dropdown">
<!--                               <i class="fas fa-check-circle"></i>-->
                                <div class="card-circle l-bg-cyan text-white">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="top-5-scroll" tabindex="2" style="height: 315px; overflow: hidden; outline: none;">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="assets/img/products/product-3.png" alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">112 Sales</div>
                                        </div>
                                        <div class="media-title">Mobile</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="61%" style="width: 61%;"></div>
                                                <div class="budget-price-label">$24,897</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="38%" style="width: 38%;"></div>
                                                <div class="budget-price-label">$18,865</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="assets/img/products/product-4.png" alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">49 Sales</div>
                                        </div>
                                        <div class="media-title">Laptop</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="78%" style="width: 78%;"></div>
                                                <div class="budget-price-label">$74,568</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="55%" style="width: 55%;"></div>
                                                <div class="budget-price-label">$65,892</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="assets/img/products/product-1.png" alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">63 Sales</div>
                                        </div>
                                        <div class="media-title">Headphone</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="38%" style="width: 38%;"></div>
                                                <div class="budget-price-label">$2,859</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="25%" style="width: 25%;"></div>
                                                <div class="budget-price-label">$1,872</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="assets/img/products/product-2.png" alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">28 Sales</div>
                                        </div>
                                        <div class="media-title">Tablet</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="48%" style="width: 48%;"></div>
                                                <div class="budget-price-label">$11,238</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="33%" style="width: 33%;"></div>
                                                <div class="budget-price-label">$7,564</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="assets/img/products/product-5.png" alt="product">
                                    <div class="media-body">
                                        <div class="float-right">
                                            <div class="font-weight-600 text-muted text-small">19 Sales</div>
                                        </div>
                                        <div class="media-title">Camera</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="91%" style="width: 91%;"></div>
                                                <div class="budget-price-label">$7,285</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="74%" style="width: 74%;"></div>
                                                <div class="budget-price-label">$5,147</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer pt-3 d-flex justify-content-center">
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-primary" data-width="20" style="width: 20px;"></div>
                                <div class="budget-price-label">Selling Price</div>
                            </div>
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-danger" data-width="20" style="width: 20px;"></div>
                                <div class="budget-price-label">Product Cost</div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <h5 class="font-15"> Basic Midwifery </h5>

                                                <!-- <h2 class="mb-3 font-18">1,287</h2> -->
                                                <p class="mb-3"><span class="col-orange">Department</span> </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">

                                                <img src="assets/img/class.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">




                                                <h5 class="font-15"> 100 </h5>

                                                <!-- <h2 class="mb-3 font-18">1,287</h2> -->
                                                <p class="mb-0 text-warning">Level </p>

                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">

                                                <img src="assets/img/subject.png" alt="" >
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-xl-4 col-lg-6">
                        <div class="alert alert-light alert-has-icon">
                            <div class="alert-icon" style="align-self: center;">
                                <!-- <i class="far fa-lightbulb"></i> -->
                                <!-- <i class="material-icons font-40">filter_frames</i> -->
                                <i class="material-icons font-40 text-warning">beenhere</i>

                            </div>
                            <div class="alert-body text-right">
                                <div class="alert-title">9</div>
                                Exams Written
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6">
                        <div class="alert alert-light alert-has-icon">
                            <div class="alert-icon" style="align-self: center;">
                                <!-- <i class="far fa-lightbulb"></i> -->
                                <i class="material-icons font-40 " style="color:#6777ef">event_note</i>

                            </div>
                            <div class="alert-body text-right">
                                <div class="alert-title">0</div>
                                Exams Today
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-4 col-lg-6">
                        <div class="alert alert-light alert-has-icon">
                            <div class="alert-icon" style="align-self: center;">
                                <!-- <i class="far fa-lightbulb"></i> -->
                                <!-- <i class="material-icons font-40">filter_frames</i> -->
                                <i class="fas fa-calendar-plus font-30 text-warning"></i>

                            </div>
                            <div class="alert-body text-right">
                                <div class="alert-title">  </div>
                                Next Exam
                            </div>
                        </div>
                    </div>



                    <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="card">
                        <div class="card-statistic-4">
                          <div class="align-items-center justify-content-between">
                            <div class="row ">
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                  <h5 class="font-15">Revenue</h5>
                                  <h2 class="mb-3 font-18">$48,697</h2>
                                  <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                  <img src="assets/img/banner/4.png" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                </div>
                <!-- <div class="row">
                <div class="col-xl-3 col-lg-6">
                  <div class="alert alert-primary alert-has-icon">
                            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                            <div class="alert-body">
                              <div class="alert-title">Primary</div>
                              This is a primary alert.
                            </div>
                          </div>
                </div>
                  </div> -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Activity Calendar</h4>
                            </div>
                            <div class="card-body">
                                <div class="fc-overflow">
                                    <img src="img/loader.gif"  class="mg-t-5 circle-loader " id="loadcal" style="display: none; height:20px !important;">

                                    <div id="myEvent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--<div class="row">-->
                <!--  <div class="col-12">-->
                <!--    <div class="card">-->
                <!--      <div class="card-header">-->
                <!--        <h4>Exam Timetable</h4>-->
                <!--      </div>-->
                <!--      <div class="card-body">-->
                <!--        <div class="table-responsive">-->
                <!--          <table class="table table-striaped table-hoaver" id="savae-stage" style="width:100%;">-->
                <!--            <thead>-->
                <!--              <tr>-->
                <!--               <th>S/N</th>-->
                <!--                <th>Course</th>-->
                <!--                <th>Date and Time</th>-->

                <!--              </tr>-->
                <!--            </thead>-->
                <!--            <tbody>-->


                <!--            </tbody>-->
                <!--          </table>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                          data-target="#exampleModalCenter">Vertically
                          Centered</button> -->
            </section>
            <div class="settingSidebar">
                <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                </a>
                <div class="settingSidebar-body ps-container ps-theme-default">
                    <div class=" fade show active">
                        <div class="setting-panel-header">Setting Panel
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Select Layout</h6>
                            <div class="selectgroup layout-color w-50">
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                                    <span class="selectgroup-button">Light</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                                    <span class="selectgroup-button">Dark</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Sidebar Color</h6>
                            <div class="selectgroup selectgroup-pills sidebar-color">
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                          data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                          data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Color Theme</h6>
                            <div class="theme-setting-options">
                                <ul class="choose-theme list-unstyled mb-0">
                                    <li title="white" class="active">
                                        <div class="white"></div>
                                    </li>
                                    <li title="cyan">
                                        <div class="cyan"></div>
                                    </li>
                                    <li title="black">
                                        <div class="black"></div>
                                    </li>
                                    <li title="purple">
                                        <div class="purple"></div>
                                    </li>
                                    <li title="orange">
                                        <div class="orange"></div>
                                    </li>
                                    <li title="green">
                                        <div class="green"></div>
                                    </li>
                                    <li title="red">
                                        <div class="red"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                           id="mini_sidebar_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Mini Sidebar</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                           id="sticky_header_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Sticky Header</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                <i class="fas fa-undo"></i> Restore Default
                            </a>
                        </div>
                    </div>
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Dear <b>BM/A24/002 </b>,</h5>
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
                <h5 class="modal-title" id="formModal">Dear <b>OLAIFA </b>,</h5>
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
<script src="assets/bundles/fullcalendar/fullcalendar.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/calendar.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script></body>

<script>

    var user = "OLAIFA RAMOTA OLUWABUKOLA";
    function myfunction(){
        setTimeout(function(){
            tryc("info", "You have some unchecked important notifications","", "topRight");

        }, 5000);
    }
</script>
<script>

    tryc('success', 'Welcome '+user  );


</script><script>

    window.onload(myfunction());

</script>

<script>

    var user = "";
    function myfunction(){
        setTimeout(function(){
            tryc("info", "You have some unchecked important notifications");

        }, 5000);
    }

    var studclass = '1';
    $(document).ready(function() {

        // showSwal('rsuccess');
        $('#setup').click(function(e){
// alert('a');

            var sub = [];
            var datab =
                $('.sub option:selected');
            datab.each(function(){
                sub.push($(this).val());
            })

            // sub[i] = $(selected).val();
            console.log(sub);
            // alert(sub);

            if(sub.length < 1){

                //  showToastPosition('selempty');
                tryc("warning", "Subjects cannot be empty");

                return false;

            }
            var jsonsub = JSON.stringify(sub);

            $.ajax
            ({

                type: "POST",
                url: "func/setup.php",
//    data: "subj="+jsonsub+"&class="+jsonclas,
                data: {  mysubjects: jsonsub, studclass:studclass },
                timeout:20000,
                beforeSend: function() {
                    $('.circle-loader').css({"display":"block"});
                    $('#setup').attr('disabled', 'disabled');
                    $('#setup').text('setting up...');
                },

                success:function(response) {


                    // alert (response);
                    if(response.trim()=="success")
                    {
                        $('.circle-loader').css({"display":"none"});
                        // showSwal('rsuccess-message');
                        // $('#regform').css({"display":"none"});
                        // $('#headhide').css({"display":"none"});
                        // $('#headshow').css({"display":"block"});
                        $('#setup').attr('disabled', 'disabled');
                        $('#setup').removeClass("btn-primary");

                        $('#setup').addClass("btn-success");
                        $('#setup').text('setup complete...');
                        tryc("success" , "Subjects successfully Setup");

                        setTimeout(function() {
                            // showSwal('rsuccess');

                            // $("#emailid").css({"display":"none"});
                            window.location.href="index.php?act=sset";
                        }, 1000);

                    }
                    else if(response.trim()=="error"){
                        tryc("error" , "Subjects  Setup error, Please try again");

                        $('#setup').attr('disabled', false);
                        $('#setup').text('Set up');
                    }

                },

                error: function(xhr, textStatus, errorThrown) {

                    if (textStatus == 'timeout') {

                        // subjst.abort();
                        tryc("warning", "Your internet connection seems to be slow, please exercise patience...");

                        //    $('#setup').attr('disabled', false);
                        // $('#setup').text('Set up');
                    }
                } ,

            });

            return false;



// return false;
        });
    });



</script>
<script>
    get_prog();
    function get_prog(){
        // alert('here');
        val = BM/A24/002;
        $.ajax({
            type: "POST",
            url: "stapi/getovrp.php",
            data: { user_id: val,  },
            dataType:"json",
            // data:'class_id='+val+'user_id='+userq,
            beforeSend:function(){
                // $('#button_action').attr('disabled', 'disabled');
                // $('#button_action').val('Validate...');
                // alert('a');
                $("#loaderb").show();
            },
            success: function(data){
                $("#loaderb").hide();
                // alert (data.all);
                // alert(data.allp);
                $('#lnpg').text(data.allp);
                $("#lnpg").show();
                $(".lnpbar").width(data.allp + '%');
                $(".lnpbar").text(data.allp + '%');


            }
        });
    }


    $(document).ready(function(){


        var dataTable = $('#savae-staaage').DataTable({
            "processing" : true,
            "serverSide" : true,
            "searching" : false,
            "ordering" : false,


            "order" : [],
            "ajax" : {
                url: "videre/schedexna.php",
                method:"POST",
                data:{action:'fetch', page:'schedule'}
            },

            "columnDefs":[
                {

                    "orderable":false,
                },
            ],
        });

        // $("#notification-modal").modal('show');
        // alert("right");
    });


    // var user = "";
    // console.log(user);

    // showToastPosition('welcome',user);
    // showToastPosition('welcome',trim());


</script>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>