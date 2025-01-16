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
                    <div class="col-xl-3 col-lg-3 col-sm-12 col-12 ">

                        <button type="button" class="btn btn-primary btn-icon icon-left m-b-15 w-100 align-left">
                            <!-- <i class="material-icons" style="vertical-align: top;">account_box</i> -->

                            <i class="fas fa-user-graduate"></i>
                            <span style="font-size: 13px;">DASHBOARD  <?php  echo $profileSet ?></span>
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
                                                <h5 class="font-15"> <?php echo $surname." ". $firstName ?></h5>

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
                                    <h4 class="card-title">Total Points</h4>
                                    <span class="font-50">524</span>
                                   <br>
                                    <p class="mb-0 text-sm">

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daily Tasks</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-1.png">
                                        <div class="media-body">
                                            <div class="media-title">Cara Stevens Cara Stevens Cara Stevens Cara Stevens</div>
                                            <div class="text-job text-muted">Web Developer</div>
                                        </div>
                                        <div class="media-progressbar">
                                            <div class="progress-text">30%</div>
                                            <div class="progress" data-height="6" style="height: 6px;">
                                                <div class="progress-bar bg-primary" data-width="30%" style="width: 30%;"></div>
                                            </div>
                                        </div>
                                        <div class="media-cta">
                                            <a href="#" class="btn btn-outline-primary">Detail</a>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-5.png">
                                        <div class="media-body">
                                            <div class="media-title">Ashton Cox</div>
                                            <div class="text-job text-muted">Web Developer</div>
                                        </div>
                                        <div class="media-progressbar">
                                            <div class="progress-text">67%</div>
                                            <div class="progress" data-height="6" style="height: 6px;">
                                                <div class="progress-bar bg-primary" data-width="67%" style="width: 67%;"></div>
                                            </div>
                                        </div>
                                        <div class="media-cta">
                                            <a href="#" class="btn btn-outline-primary">Detail</a>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-4.png">
                                        <div class="media-body">
                                            <div class="media-title">Sarah Smith</div>
                                            <div class="text-job text-muted">Web Developer</div>
                                        </div>
                                        <div class="media-progressbar">
                                            <div class="progress-text">45%</div>
                                            <div class="progress" data-height="6" style="height: 6px;">
                                                <div class="progress-bar bg-primary" data-width="45%" style="width: 45%;"></div>
                                            </div>
                                        </div>
                                        <div class="media-cta">
                                            <a href="#" class="btn btn-outline-primary">Detail</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card mat-4 col-lg-6">
                        <div class="card-header">
                            <h4>My Subjects</h4>
                        </div>
                        <div class="card-body pb-0">
                            <div class="row">
                                <!-- Rectangle 1 -->
                                <div class="col-6 col-sm-3 col-lg-6 mb-4">
                                    <div class="rectangle bg-blue">
                                        <div class="icon">🔵</div>
                                        <div class="title">Item AB</div>
                                    </div>
                                </div>
                                <!-- Rectangle 2 -->
                                <div class="col-6 col-sm-3 col-lg-6 mb-4">
                                    <div class="rectangle bg-green">
                                        <div class="icon">🟢</div>
                                        <div class="title">Item AB</div>
                                    </div>
                                </div>
                                <!-- Rectangle 3 -->
                                <div class="col-6 col-sm-3 col-lg-6 mb-4">
                                    <div class="rectangle bg-yellow">
                                        <div class="icon">🟡</div>
                                        <div class="title">Item AB</div>
                                    </div>
                                </div>
                                <!-- Rectangle 4 -->
                                <div class="col-6 col-sm-3 col-lg-6 mb-4">
                                    <div class="rectangle bg-red">
                                        <div class="icon">🔴</div>
                                        <div class="title">Item AB</div>
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