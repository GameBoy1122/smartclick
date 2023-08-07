<style>
    .carousel-item {
        position: relative;
        background-color: rgb(89 89 255 / 50%);
        /* Replace with your desired background color and opacity */
        width: 100%;
        /* height: 100vh; */
        /* Adjust the height to fit your image size */
    }

    .img-banner {
        width: 100%;
    }

    .w-lg-75 {
        width: 50%;
    }

    @media only screen and (max-width: 600px) {
        .your-container-class {
            position: relative;
            width: 100%;
            /* Set the aspect ratio to 4:3 (75% = 3/4 * 100%) */
            padding-top: 90%;
            overflow: hidden;
        }

        .img-banner {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* This ensures the image fills the container */
        }

        .banner-area .content {
            padding: 0;
            top: 50%;
        }

        .w-lg-75 {
            width: 100%;
        }
    }
</style>
<!-- Start Banner 
    ============================================= -->
<!-- <div class="banner-area auto-height text-color bg-gray inc-shape">
    <div class="item">
        <div class="container">
            <div class="row align-center" >
                <div class="col-lg-6">
                    <div class="content">
                        <h4 class="wow fadeInUp">Optimize IT Systems </h4>
                        <h2 class="wow fadeInDown">Creating a better <strong>IT solutions</strong></h2>
                        <p class="wow fadeInLeft">
                            Affixed pretend account ten natural. Need eat week even yet that. Incommode delighted he resolving sportsmen do in listening.
                        </p>
                        <a class="btn circle btn-theme effect btn-md wow fadeInUp" href="#">Start Now <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 thumb">
                    <img class="wow fadeInUp" src="assets/img/deep-learning-ai-empowering-businesses-with-intel-2023-05-30-11-33-18-utc.jpg" alt="Thumb">
                </div>
            </div>
        </div>
    </div>
</div> -->

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item your-container-class active">
            <img src="assets/img/banner_2.png" class="d-block img-banner" alt="..." style="opacity: 0.75;">
            <div class="carousel-caption d-md-block">
                <div class="banner-area text-color text-left">
                    <div class="content">
                        <h4 class="wow fadeInUp text-white">Optimize IT Systems </h4>
                        <h2 class="wow fadeInDown text-white">Creating a better <strong>IT solutions</strong></h2>
                        <p class="wow fadeInLeft w-lg-75" style="color:#d6d6d6;">
                            Affixed pretend account ten natural. Need eat week even yet that. Incommode delighted he resolving sportsmen do in listening.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item your-container-class">
            <img src="assets/img/banner_3.png" class="d-block img-banner" alt="..." style="opacity: 0.75;">
            <div class="carousel-caption d-md-block">
                <div class="banner-area text-color text-left">
                    <div class="content">
                        <h4 class="wow fadeInUp text-white">Data Center and Cloud</h4>
                        <h2 class="wow fadeInDown text-white">Hyper Converged <strong>Infrastructure</strong></h2>
                        <p class="wow fadeInLeft w-lg-75" style="color:#d6d6d6;">
                            Experience Seamless IT Evolution Unlock the Power of Hyperconverged Infrastructure (HCI)
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Banner -->

<!-- Star About Area
    ============================================= -->
<div class="about-area inc-shape default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="thumb">
                    <img src="<?php echo base_url('') ?>assets/img/p-1.jpg" alt="Thumb">
                    <img src="<?php echo base_url('') ?>assets/img/p-3.jpeg" alt="Thumb">
                    <div class="overlay">
                        <div class="content">
                            <h4>19 years of experience</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 info">
                <h4> <?php echo getWording('index_menu', 'smartclick_title') ?> </h4>
                <p>
                    <?php echo getWording('index_menu', 'smartclick_detail') ?>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- End About Area -->

<!-- Start Features 
    ============================================= -->
<div class="features-area overflow-hidden bg-gray default-padding">
    <!-- Fixed Shpae  -->
    <div class="fixed-shape shape left bottom">
        <img src="assets/img/shape/3.png" alt="Shape">
    </div>
    <!-- End Fixed Shpae  -->
    <div class="container-fluid">
        <div class="row" style="padding: 0rem 4rem;">
            <div class="col-lg-5 why-us">
                <h5><?php echo getWording('index_menu', 'solution') ?></h5>
                <p>
                    <?php echo getWording('index_menu', 'solution_detail') ?>
                </p>
                <a class="popup-youtube theme relative video-play-button" href="https://www.youtube.com/watch?v=owhuBrGIOsE">
                    <i class="fa fa-play"></i> <span>Video Showcase</span>
                </a>
                <?php foreach ($Solution_category as $key => $Solution_category_list) { ?>
                    <?php if ($Solution_category_list->title_en == 'Digital Marketing') { ?>
                        <div class="item mt-5">
                            <i class="flaticon-globe-grid"></i>
                            <h5><a href="<?php echo base_url('solutions/digital-marketing') ?>"> <?php echo getVariable($Solution_category_list, 'title') ?></a></h5>
                            <p>
                                <?php echo getVariable($Solution_category_list, 'short_description') ?>
                            </p>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-lg-7 features-box text-center">
                <div class="row">
                    <!-- Item Grid -->
                    <div class="col-lg-6 col-md-6 item-grid">
                        <!-- Single Item -->
                        <?php foreach ($Solution_category as $key => $Solution_category_list) { ?>
                            <?php if ($Solution_category_list->title_en == 'Enterprise Application') { ?>
                                <div class="item">
                                    <i class="flaticon-cogwheel"></i>
                                    <h5><a href="<?php echo base_url('solutions/enterprise-application') ?>"> <?php echo getVariable($Solution_category_list, 'title') ?></a></h5>
                                    <p>
                                        <?php echo getVariable($Solution_category_list, 'short_description') ?>
                                    </p>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <!-- End Single Item -->
                        <!-- Single Item -->

                        <?php foreach ($Solution_category as $key => $Solution_category_list) { ?>
                            <?php if ($Solution_category_list->title_en == 'Data Center and Cloud') { ?>
                                <div class="item">
                                    <i class="flaticon-globe-grid"></i>
                                    <h5><a href="<?php echo base_url('solutions/cloud-datacenter') ?>"> <?php echo getVariable($Solution_category_list, 'title') ?></a></h5>
                                    <p>
                                        <?php echo getVariable($Solution_category_list, 'short_description') ?>
                                    </p>
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <!-- End Single Item -->
                    </div>
                    <!-- End Item Grid -->

                    <!-- Item Grid -->
                    <div class="col-lg-6 col-md-6 item-grid">
                        <!-- Single Item -->
                        <?php foreach ($Solution_category as $key => $Solution_category_list) { ?>
                            <?php if ($Solution_category_list->title_en == 'Streaming Solution') { ?>
                                <div class="item">
                                    <i class="flaticon-cloud-storage"></i>
                                    <h5>
                                        <a href="<?php echo base_url('solutions/streaming') ?>">
                                            <?php echo getVariable($Solution_category_list, 'title') ?>
                                        </a>
                                    </h5>
                                    <p>
                                        <?php echo getVariable($Solution_category_list, 'short_description') ?>
                                    </p>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <!-- End Single Item -->
                        <!-- Single Item -->
                        <?php foreach ($Solution_category as $key => $Solution_category_list) { ?>
                            <?php if ($Solution_category_list->title_en == 'IT Support') { ?>
                                <div class="item">
                                    <i class="flaticon-backup"></i>
                                    <a href="<?php echo base_url('solutions/it-support') ?>">
                                        <h5> <?php echo getVariable($Solution_category_list, 'title') ?>
                                    </a></h5>
                                    <p>
                                        <?php echo getVariable($Solution_category_list, 'short_description') ?>
                                    </p>

                                </div>
                                </a>
                            <?php } ?>
                        <?php } ?>

                        <!-- End Single Item -->
                    </div>
                    <!-- End Item Grid -->

                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Features Area -->


<!-- Start Blog 
    ============================================= -->
<div class="blog-area content-less default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h4>Knowledge / News</h4>
                    <h2>Latest From our blog</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <!-- Single Item -->
                <div class="single-item col-lg-4 col-md-6">
                    <div class="item">
                        <div class="thumb">
                            <a href="#">
                                <img src="assets/img/800x600.png" alt="Thumb">
                            </a>
                        </div>
                        <div class="info">
                            <div class="cats">
                                <a href="#">Technology</a>
                            </div>
                            <div class="meta">
                                <ul>
                                    <li><i class="fas fa-calendar-alt"></i> 12 Aug, 2020</li>
                                    <li><i class="fas fa-user"></i> By <a href="#">John Botha</a></li>
                                </ul>
                            </div>
                            <h4>
                                <a href="#">Additions in conveying or collected objection</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="single-item col-lg-4 col-md-6">
                    <div class="item">
                        <div class="thumb">
                            <a href="#">
                                <img src="assets/img/800x600.png" alt="Thumb">
                            </a>
                        </div>
                        <div class="info">
                            <div class="cats">
                                <a href="#">Firewall</a>
                            </div>
                            <div class="meta">
                                <ul>
                                    <li><i class="fas fa-calendar-alt"></i> 05 Oct, 2020</li>
                                    <li><i class="fas fa-user"></i> By <a href="#">Jork Mon</a></li>
                                </ul>
                            </div>
                            <h4>
                                <a href="#">Discourse ye continued pronounce we abilities</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="single-item col-lg-4 col-md-6">
                    <div class="item">
                        <div class="thumb">
                            <a href="#">
                                <img src="assets/img/800x600.png" alt="Thumb">
                            </a>
                        </div>
                        <div class="info">
                            <div class="cats">
                                <a href="#">Security</a>
                            </div>
                            <div class="meta">
                                <ul>
                                    <li><i class="fas fa-calendar-alt"></i> 27 Dec, 2020</li>
                                    <li><i class="fas fa-user"></i> By <a href="#">Spark Lee</a></li>
                                </ul>
                            </div>
                            <h4>
                                <a href="#">Children greatest online extended delicate of</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->