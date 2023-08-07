<!-- Start Breadcrumb 
    ============================================= -->
<?php if ($solution_category->image != "") {
    $banner = base_url('') . $solution_category->image;
} else {
    $banner = base_url('assets/img/2440x1578.png');
} ?>
<div class="breadcrumb-area shadow dark bg-fixed text-light" style="background-image: url(<?php echo $banner ?>);">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6">
                <h2><?php echo getVariable($solution_category, 'title') ?></h2>
            </div>
            <div class="col-lg-6 text-right">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fas fa-home"></i><?php echo getWording('index_menu', 'homepage') ?></a></li>
                    <li class="active"><?php echo getVariable($solution_category, 'title') ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Services 
    ============================================= -->
<div class="service-area default-padding bottom-less bg-cover">
    <div class="container">
        <div class="service-items text-center">
            <div class="row">
                <!-- Single item -->
                <?php foreach ($solution as $key => $solution_list) { ?>
                    <div class="col-lg-4 col-md-6 single-item">
                        <div class="item">
                            <div class="info">
                                <?php if ($solution_list->icon != "") { ?>
                                    <img class="pb-3" style="width: 84px;" src="<?php echo base_url('') . $solution_list->icon ?>" alt="">
                                <?php } else { ?>
                                    <i class="flaticon-cogwheel"></i>
                                <?php } ?>

                                <h5><a href="<?php echo base_url('solutions/') . $solution_list->seo_slug ?>"><?php echo getVariable($solution_list, 'title') ?></a></h5>
                                <p>
                                    <?php echo getVariable($solution_list, 'short_description') ?>
                                </p>
                                <a class="btn-standard" href="<?php echo base_url('solutions/') . $solution_list->seo_slug ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- End Single item -->


            </div>
        </div>
    </div>
</div>
<!-- End Services Area -->

<!-- Start Clients 
    ============================================= -->
<div class="clients-area default-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="clients-carousel owl-carousel owl-theme">
                    <a href="#"><img src="<?php echo base_url('assets/img/150x80.png') ?>" alt="Client"></a>
                    <a href="#"><img src="<?php echo base_url('assets/img/150x80.png') ?>" alt="Client"></a>
                    <a href="#"><img src="<?php echo base_url('assets/img/150x80.png') ?>" alt="Client"></a>
                    <a href="#"><img src="<?php echo base_url('assets/img/150x80.png') ?>" alt="Client"></a>
                    <a href="#"><img src="<?php echo base_url('assets/img/150x80.png') ?>" alt="Client"></a>
                    <a href="#"><img src="<?php echo base_url('assets/img/150x80.png') ?>" alt="Client"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Clients Area -->