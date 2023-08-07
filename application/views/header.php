<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tanda - IT Solutions Template">

    <!-- ========== Page Title ========== -->
    <title>IT Solutions, System Integrator, Cloud Technology :: Smartclick Solution Co.,Ltd.</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="<?php echo base_url('') ?>assets/img/favicon.ico" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="<?php echo base_url('') ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('') ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('') ?>assets/css/themify-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url('') ?>assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="<?php echo base_url('') ?>assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="<?php echo base_url('') ?>assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('') ?>assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('') ?>assets/css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url('') ?>assets/css/bootsnav.css" rel="stylesheet" />
    <link href="<?php echo base_url('') ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('') ?>assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

</head>
<?php
$codeigniter_instance = &get_instance();
$ln = $codeigniter_instance->session->userdata("CURRENT_LANGUAGE");
$actual_link = base_url();
$current_url_array = $_SERVER['REQUEST_URI'];
$current_url_array = explode("/", uri_string());
?>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Start Header Top 
    ============================================= -->
    <div class="top-bar-area inc-pad bg-theme text-light">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 info">
                    <ul>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> Bangkok, TH 10110
                        </li>
                        <li>
                            <i class="fas fa-envelope-open"></i> info@smartclick.co.th
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right item-flex">
                    <div class="info">
                        <ul>
                            <li>
                                <i class="fas fa-clock"></i> Office Hours: 9:30 AM – 8:30 PM
                            </li>
                        </ul>
                    </div>
                    <div class="social">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default active-border navbar-sticky bootsnav">

            <div class="container">



                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('') ?>">
                        <img src="<?php echo base_url('') ?>assets/img/logo.png" class="logo" alt="Logo">
                    </a>
                    <ul class="navbar-ln">
                    <li class="contact">
                            <?php if ($ln == 'th') { ?>
                                <a class="ln_active" href="<?php echo base_url("language/change/th?url=" . $actual_link); ?>">TH</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url("language/change/th?url=" . $actual_link); ?>">TH</a>
                            <?php } ?>
                            |
                            <?php if ($ln == 'en') { ?>
                                <a class="ln_active" href="<?php echo base_url("language/change/en?url=" . $actual_link); ?>">EN</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url("language/change/en?url=" . $actual_link); ?>">EN</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <!-- End Header Navigation -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav inc-border">
                    <ul>
                        <li class="contact">
                            <?php if ($ln == 'th') { ?>
                                <a class="ln_active" href="<?php echo base_url("language/change/th?url=" . $actual_link); ?>">TH</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url("language/change/th?url=" . $actual_link); ?>">TH</a>
                            <?php } ?>
                            |
                            <?php if ($ln == 'en') { ?>
                                <a class="ln_active" href="<?php echo base_url("language/change/en?url=" . $actual_link); ?>">EN</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url("language/change/en?url=" . $actual_link); ?>">EN</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                        <li>
                            <a href="<?php echo base_url('') ?>"><?php echo getWording('index_menu', 'homepage') ?></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo getWording('index_menu', 'about') ?></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('About/company') ?>"><?php echo getWording('index_menu', 'companyprofile') ?></a></li>
                                <li><a href="<?php echo base_url('About/timeline') ?>"><?php echo getWording('index_menu', 'history') ?></a></li>
                                <li><a href="<?php echo base_url('About/message') ?>"><?php echo getWording('index_menu', 'message') ?></a></li>
                                <li><a href="<?php echo base_url('About/management') ?>"><?php echo getWording('index_menu', 'management') ?></a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo getWording('index_menu', 'solution') ?></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('solutions/enterprise-application') ?>"><?php echo getWording('index_menu', 'enterprise_application') ?></a></li>
                                <li><a href="<?php echo base_url('solutions/cloud-datacenter') ?>"><?php echo getWording('index_menu', 'datacenter') ?></a></li>
                                <li><a href="<?php echo base_url('solutions/digital-marketing') ?>"><?php echo getWording('index_menu', 'marketing') ?></a></li>
                                <li><a href="<?php echo base_url('solutions/streaming') ?>"><?php echo getWording('index_menu', 'streaming') ?></a></li>
                                <li><a href="<?php echo base_url('solutions/it-support') ?>"><?php echo getWording('index_menu', 'it_support') ?></a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo getWording('index_menu', 'knowledge/news') ?></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('Knowledge') ?>"><?php echo getWording('index_menu', 'knowledge') ?></a></li>
                                <li><a href="<?php echo base_url('News') ?>"><?php echo getWording('index_menu', 'news') ?></a></li>
                                <li><a href="<?php echo base_url('Seminar') ?>"><?php echo getWording('index_menu', 'seminar') ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('contact') ?>"><?php echo getWording('index_menu', 'contact_us') ?></a>
                        </li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->