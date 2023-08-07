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
                <h2><?php echo getVariable($solution, 'title') ?></h2>
            </div>
            <div class="col-lg-6 text-right">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fas fa-home"></i><?php echo getWording('index_menu', 'homepage') ?></a></li>
                    <?php if ($solution_category->title_en == 'Enterprise Application') { ?>
                        <li><a href="<?php echo base_url('solutions/enterprise-application') ?>"><?php echo getWording('index_menu', 'enterprise_application') ?></a></li>
                    <?php } elseif ($solution_category->title_en == 'Data Center And Cloud') { ?>
                        <li><a href="<?php echo base_url('solutions/cloud-datacenter') ?>"><?php echo getWording('index_menu', 'datacenter') ?></a></li>
                    <?php } elseif ($solution_category->title_en == 'Digital Marketing') { ?>
                        <li><a class="active" href="<?php echo base_url('solutions/digital-marketing') ?>"><?php echo getWording('index_menu', 'marketing') ?></a></li>
                    <?php } elseif ($solution_category->title_en == 'Streaming Solution') { ?>
                        <li><a href="<?php echo base_url('solutions/streaming') ?>"><?php echo getWording('index_menu', 'streaming') ?></a></li>
                    <?php } elseif ($solution_category->title_en == 'IT Support') { ?>
                        <li><a href="<?php echo base_url('solutions/it-support') ?>"><?php echo getWording('index_menu', 'it_support') ?></a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo base_url('solutions/cloud-datacenter') ?>"><?php echo getWording('index_menu', 'datacenter') ?></a></li>
                    <?php } ?>
                    <li class="active"><?php echo getVariable($solution, 'title') ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Services Details 
    ============================================= -->
<div class="services-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 content">
                <div class="thumb">

                    <?php if ($solution->image != "") { ?>
                        <img src="<?php echo base_url('') . $solution->image ?>" alt="Thumb">

                    <?php } else { ?>
                        <img src="<?php echo base_url('') ?>assets/img/1500x700.png" alt="Thumb">
                    <?php } ?>
                </div>
                <h2><?php echo getVariable($solution, 'title') ?></h2>
                <?php echo getVariable($solution, 'description') ?>
            </div>
            <div class="col-lg-4 sidebar">
                <div class="sidebar-item link">
                    <ul>
                        <?php if ($solution_category->title_en == 'Enterprise Application') { ?>
                            <li><a class="active" href="<?php echo base_url('solutions/enterprise-application') ?>"><?php echo getWording('index_menu', 'enterprise_application') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/cloud-datacenter') ?>"><?php echo getWording('index_menu', 'datacenter') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/digital-marketing') ?>"><?php echo getWording('index_menu', 'marketing') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/streaming') ?>"><?php echo getWording('index_menu', 'streaming') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/it-support') ?>"><?php echo getWording('index_menu', 'it_support') ?></a></li>
                        <?php } elseif ($solution_category->title_en == 'Data Center And Cloud') { ?>
                            <li><a href="<?php echo base_url('solutions/enterprise-application') ?>"><?php echo getWording('index_menu', 'enterprise_application') ?></a></li>
                            <li><a class="active" href="<?php echo base_url('solutions/cloud-datacenter') ?>"><?php echo getWording('index_menu', 'datacenter') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/digital-marketing') ?>"><?php echo getWording('index_menu', 'marketing') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/streaming') ?>"><?php echo getWording('index_menu', 'streaming') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/it-support') ?>"><?php echo getWording('index_menu', 'it_support') ?></a></li>
                        <?php } elseif ($solution_category->title_en == 'Digital Marketing') { ?>
                            <li><a href="<?php echo base_url('solutions/enterprise-application') ?>"><?php echo getWording('index_menu', 'enterprise_application') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/cloud-datacenter') ?>"><?php echo getWording('index_menu', 'datacenter') ?></a></li>
                            <li><a class="active" href="<?php echo base_url('solutions/digital-marketing') ?>"><?php echo getWording('index_menu', 'marketing') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/streaming') ?>"><?php echo getWording('index_menu', 'streaming') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/it-support') ?>"><?php echo getWording('index_menu', 'it_support') ?></a></li>
                        <?php } elseif ($solution_category->title_en == 'Streaming Solution') { ?>
                            <li><a href="<?php echo base_url('solutions/enterprise-application') ?>"><?php echo getWording('index_menu', 'enterprise_application') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/cloud-datacenter') ?>"><?php echo getWording('index_menu', 'datacenter') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/digital-marketing') ?>"><?php echo getWording('index_menu', 'marketing') ?></a></li>
                            <li><a class="active" href="<?php echo base_url('solutions/streaming') ?>"><?php echo getWording('index_menu', 'streaming') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/it-support') ?>"><?php echo getWording('index_menu', 'it_support') ?></a></li>
                        <?php } elseif ($solution_category->title_en == 'IT Support') { ?>
                            <li><a href="<?php echo base_url('solutions/enterprise-application') ?>"><?php echo getWording('index_menu', 'enterprise_application') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/cloud-datacenter') ?>"><?php echo getWording('index_menu', 'datacenter') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/digital-marketing') ?>"><?php echo getWording('index_menu', 'marketing') ?></a></li>
                            <li><a href="<?php echo base_url('solutions/streaming') ?>"><?php echo getWording('index_menu', 'streaming') ?></a></li>
                            <li><a class="active" href="<?php echo base_url('solutions/it-support') ?>"><?php echo getWording('index_menu', 'it_support') ?></a></li>
                        <?php } ?>



                    </ul>
                </div>
                <div class="sidebar-item banner">
                    <div class="thumb">
                        <img src="<?php echo base_url('') ?>assets/img/800x800.png" alt="Thumb">
                        <div class="content">
                            <h5>Have Additional Questions?</h5>
                            <h3><i class="fas fa-phone"></i><a href="tel:(+66)02-664-2926">(+66)02-664-2926</a></h3>
                        </div>
                    </div>
                </div>
                <div class="sidebar-item brochure">
                    <div class="title">
                        <h4>Brochure</h4>
                    </div>
                    <p>
                        Existence its certainly explained how improving household pretended.
                    </p>
                    <a href="#"><i class="fas fa-file-pdf"></i> Download Service</a>
                    <a href="#"><i class="fas fa-file-archive"></i> Download Features</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Services Details -->