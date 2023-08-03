<?php

$codeigniter_instance =& get_instance();

?>

<!-- ------------------------------------------------------------------ -->

<!-- HEADER IS BEGIN                                                    -->

<!-- ------------------------------------------------------------------ -->

<!DOCTYPE html>



<!--

Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8

Author: KeenThemes

Website: http://www.keenthemes.com/

Contact: support@keenthemes.com

Follow: www.twitter.com/keenthemes

Dribbble: www.dribbble.com/keenthemes

Like: www.facebook.com/keenthemes

Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes

Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes

License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->

<html lang="en">



<!-- begin::Head -->

<head>

    <base href="../../../">

    <meta charset="utf-8" />

    <link rel="icon" href="<?php echo base_url("assets/frontend/img/logo/Logo_main.png") ?>">

    <link href="<?php echo base_url('/assets/img/.png') ;?>" rel="shortcut icon" />

    <title>Advanced Security Mangement Program | Admin System</title>

    <meta name="description" content="Login page example">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!--begin::Fonts -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">



    <!--end::Fonts -->



    <!--begin::Page Custom Styles(used by this page) -->

    <link href="<?php echo assetsDirectory("dist/assets/css/pages/login/login-4.css")?>" rel="stylesheet" type="text/css" />



    <!--end::Page Custom Styles -->



    <!--begin::Global Theme Styles(used by all pages) -->

    <link href="<?php echo assetsDirectory("dist/assets/plugins/global/plugins.bundle.css")?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/style.bundle.css")?>" rel="stylesheet" type="text/css" />



    <!--end::Global Theme Styles -->



    <!--begin::Layout Skins(used by all pages) -->

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/header/base/light.css")?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/header/menu/light.css")?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/brand/dark.css")?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/aside/dark.css")?>" rel="stylesheet" type="text/css" />



    <!--end::Layout Skins -->



</head>



<!-- end::Head -->



<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">



    <!-- begin:: Page -->

    <div class="kt-grid kt-grid--ver kt-grid--root">

        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">

            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(https://www.change2561.com/new/assets/dist/assets/media/bg/bg-2.jpg);">

                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">

                    <div class="kt-login__container">

                        <div class="kt-login__logo">

                            <a href="#">

                                <img src="<?php echo base_url('/assets/img/LOGO-Main.png') ;?>"  style="margin: 5px 0 0;max-width: 236px;"/>

                            </a>

                        </div>

                        <div class="kt-login__signin">

                            <div class="kt-login__head">

                                <h3 class="kt-login__title">Sign In To Admin</h3>

                            </div>

                            <form class="kt-form login-form" action="" method="post">

                                <div class="input-group">

                                    <input class="form-control" type="text" placeholder="Username" name="Username" >

                                </div>

                                <div class="input-group">

                                    <input class="form-control" type="password" placeholder="Password" name="Password">

                                </div>

                                <div class="row kt-login__extra">

                                    <div class="col">

                                        <label class="kt-checkbox">

                                            <input type="checkbox" name="login_type" value="ADMINISTRATOR" checked> ADMINISTRATOR

                                            <span></span>

                                        </label>

                                    </div>

                                    <!-- <div class="col kt-align-right">

                                        <a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>

                                    </div> -->

                                </div>

                                <div class="kt-login__actions">

                                    <button id="login-form-submit" type="button" class="btn btn-brand btn-pill kt-login__btn-primary">Sign In</button>

                                </div>

                            </form>

                        </div>

                        <!-- <div class="kt-login__signup">

                            <div class="kt-login__head">

                                <h3 class="kt-login__title">Sign Up</h3>

                                <div class="kt-login__desc">Enter your details to create your account:</div>

                            </div>

                            <form class="kt-form" action="">

                                <div class="input-group">

                                    <input class="form-control" type="text" placeholder="Fullname" name="fullname">

                                </div>

                                <div class="input-group">

                                    <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">

                                </div>

                                <div class="input-group">

                                    <input class="form-control" type="password" placeholder="Password" name="password">

                                </div>

                                <div class="input-group">

                                    <input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">

                                </div>

                                <div class="row kt-login__extra">

                                    <div class="col kt-align-left">

                                        <label class="kt-checkbox">

                                            <input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.

                                            <span></span>

                                        </label>

                                        <span class="form-text text-muted"></span>

                                    </div>

                                </div>

                                <div class="kt-login__actions">

                                    <button id="kt_login_signup_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;

                                    <button id="kt_login_signup_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>

                                </div>

                            </form>

                        </div>

                        <div class="kt-login__forgot">

                            <div class="kt-login__head">

                                <h3 class="kt-login__title">Forgotten Password ?</h3>

                                <div class="kt-login__desc">Enter your email to reset your password:</div>

                            </div>

                            <form class="kt-form" action="">

                                <div class="input-group">

                                    <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">

                                </div>

                                <div class="kt-login__actions">

                                    <button id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;

                                    <button id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>

                                </div>

                            </form>

                        </div>

                        <div class="kt-login__account">

                            <span class="kt-login__account-msg">

                                Don't have an account yet ?

                            </span>

                            &nbsp;&nbsp;

                            <a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">Sign Up!</a>

                        </div> -->

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- end:: Page -->

    



    <!-- begin::Global Config(global config for global JS sciprts) -->

    <script>





        var KTAppOptions = {

            "colors": {

                "state": {

                    "brand": "#5d78ff",

                    "dark": "#282a3c",

                    "light": "#ffffff",

                    "primary": "#5867dd",

                    "success": "#34bfa3",

                    "info": "#36a3f7",

                    "warning": "#ffb822",

                    "danger": "#fd3995"

                },

                "base": {

                    "label": [

                    "#c5cbe3",

                    "#a1a8c3",

                    "#3d4465",

                    "#3e4466"

                    ],

                    "shape": [

                    "#f0f3ff",

                    "#d9dffa",

                    "#afb4d4",

                    "#646c9a"

                    ]

                }

            }

        };

    </script>



    <!-- end::Global Config -->



    <!--begin::Global Theme Bundle(used by all pages) -->

    <script src="<?php echo assetsDirectory("dist/assets/plugins/global/plugins.bundle.js")?>" type="text/javascript"></script>

    <script src="<?php echo assetsDirectory("dist/assets/js/scripts.bundle.js")?>" type="text/javascript"></script>



    <!--end::Global Theme Bundle -->



    <!--begin::Page Scripts(used by this page) -->

    <script src="<?php echo assetsDirectory("dist/assets/js/pages/custom/login/login-general.js")?>" type="text/javascript"></script>



    <!--end::Page Scripts -->

</body>



<script type="text/javascript">

   $(document).ready(function(){

       $('#login-form-submit').click(function(){   

        $.ajax({

            type: "POST",

            url: "<?php echo base_url("Authentication/login")?>",

            data: new FormData($('.login-form')[0]),

            cache: false,

            contentType: false,

            processData: false,

            success: function(response){

                try {

                    if(response.code == "0x0000-00000") {

                        if($("input[name='login_type']:checked").val() == "ADMINISTRATOR"){

                            window.location = "<?php echo base_url("AdministratorArea")?>";

                        }else{

                            window.location = "<?php echo base_url("AuditorArea")?>";

                        }

                    }else{

                        $("#system-return-error .message").html(response.message);

                        $("#system-return-error").modal("toggle");

                    }

                } catch(e) {

                    $("#system-return-failed").modal("toggle");

                }

            },

            error: function(){

                $("#system-disconnected").modal("toggle");

            }

        });      

    });



   });



</script>>



<!-- end::Body -->

</html>



<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemDisconnected");?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemReturnError");?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemReturnFailed");?>