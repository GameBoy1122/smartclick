<?php

$ci = &get_instance();

// $ci->load->model('UserRoleMenuTable');

// $ci->load->model('MenuTable');



// $permissionMenus = $ci->UserRoleMenuTable->getMenu($ci->session->userdata('_beRoleId'));

$class = $this->router->fetch_class();

$menu_key_current = $class . "/" . $this->router->fetch_method();



$codeigniter_instance = &get_instance();



$directory = strtolower($codeigniter_instance->router->directory);

$controller = strtolower($codeigniter_instance->router->fetch_class());

$function = strtolower($codeigniter_instance->router->fetch_method());



$head_open = "kt-menu__item--here kt-menu__item--open";

?>



<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->

    <?php $this->load->view('AdministratorArea/__Shards/HTML_MetronicAside'); ?>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->

    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">

        <div id="kt_aside_menu" class="kt-aside-menu kt-scroll ps ps--active-y " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">



            <ul class="kt-menu__nav ">

                <?php

                /** ======================================================================================

                 *      DASHBOARD

                ====================================================================================== **/

                ?>

                <li class="kt-menu__section ">

                    <h3 class="kt-menu__section-text">Home page</h3>

                    <i class="kt-menu__section-icon flaticon-more-v2"></i>

                </li>

                <li class="kt-menu__item  kt-menu__item--<?php if ($class == 'index') echo 'active';
                                                            else echo 'submenu'; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="<?php echo base_url("AdministratorArea") ?>" class="kt-menu__link ">

                        <i class="kt-menu__link-icon flaticon2-website"></i>

                        <span class="kt-menu__link-text">Home</span>

                    </a>

                </li>


                <?php

                /** ======================================================================================

                 *      ADMINISTRATOR ACCOUNT & PERMISSION

                ====================================================================================== **/

                if (checkAdministratorPermission("ADMINISTRATOR_MANAGEMENT", "index") || checkAdministratorPermission("ADMINISTRATOR_MANAGEMENT", "edit")) {

                ?>

                    <li class="kt-menu__section d-none">

                        <h3 class="kt-menu__section-text">Administrator access</h3>

                        <i class="kt-menu__section-icon flaticon-more-v2"></i>

                    </li>

                    <li class="kt-menu__item kt-menu__item--submenu d-none <?php if ($class == 'Administrator' || $class == 'administrator_group') echo $head_open;
                                                                            else echo ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">

                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">

                            <i class="kt-menu__link-icon flaticon-user"></i>

                            <span class="kt-menu__link-text">PERMISSION</span>

                            <i class="kt-menu__ver-arrow la la-angle-right"></i>

                        </a>

                        <div class="kt-menu__submenu " kt-hidden-height="80" style="">

                            <span class="kt-menu__arrow"></span>

                            <ul class="kt-menu__subnav">

                                <!-- <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">จัดการธุรกิจ</span></span></li>  -->

                                <li class="kt-menu__item kt-menu__item--<?php if ($class == 'Administrator') echo 'active';
                                                                        else echo ''; ?>" aria-haspopup="true">

                                    <a href="<?php echo base_url("AdministratorArea/Administrator") ?>" class="kt-menu__link ">

                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>

                                        <span class="kt-menu__link-text">ผู้ใช้งานและสิทธิ์การเข้าถึง</span>

                                    </a>

                                </li>

                            </ul>

                        </div>

                    </li>



                <?php

                }

                ?>



                <?php

                /** ======================================================================================

                 *      BANNER

                ====================================================================================== **/

                if (checkAdministratorPermission("CONTENT_MANAGEMENT", "index") || checkAdministratorPermission("CONTENT_MANAGEMENT", "edit")) {

                ?>

                    <li class="kt-menu__section ">

                        <h3 class="kt-menu__section-text">Content</h3>

                        <i class="kt-menu__section-icon flaticon-more-v2"></i>

                    </li>

                    <li class="kt-menu__item kt-menu__item--submenu <?php if ($class == 'Bannermain' || $class == 'Vision' || $class == 'Values' || $class == 'Landingpage') echo $head_open;
                                                                    else echo ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">

                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">

                            <i class="kt-menu__link-icon flaticon-user"></i>

                            <span class="kt-menu__link-text">HOME</span>

                            <i class="kt-menu__ver-arrow la la-angle-right"></i>

                        </a>

                        <div class="kt-menu__submenu " kt-hidden-height="80" style="">

                            <span class="kt-menu__arrow"></span>

                            <ul class="kt-menu__subnav">

                                <li class="kt-menu__item kt-menu__item--<?php if ($class == 'Bannermain') echo 'active';
                                                                        else echo ''; ?>" aria-haspopup="true">

                                    <a href="<?php echo base_url("AdministratorArea/Bannermain") ?>" class="kt-menu__link ">

                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>

                                        <span class="kt-menu__link-text">Banner main</span>
                                    </a>
                                </li>


                                <!-- <li class="kt-menu__item kt-menu__item--<?php if ($class == 'Landingpage') echo 'active';
                                                                                else echo ''; ?>" aria-haspopup="true">

                                    <a href="<?php echo base_url("AdministratorArea/landingpage/edit/1") ?>" class="kt-menu__link ">

                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>

                                        <span class="kt-menu__link-text">Landing page</span>
                                    </a>
                                </li> -->


                            </ul>
                        </div>

                    </li>

                    <li class="kt-menu__item kt-menu__item--submenu <?php if ($class == 'About') echo $head_open;
                                                                    else echo ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">

                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">

                            <i class="kt-menu__link-icon flaticon-user"></i>

                            <span class="kt-menu__link-text">ABOUT</span>

                            <i class="kt-menu__ver-arrow la la-angle-right"></i>

                        </a>

                        <div class="kt-menu__submenu " kt-hidden-height="80" style="">

                            <span class="kt-menu__arrow"></span>

                            <ul class="kt-menu__subnav">

                                <li class="kt-menu__item kt-menu__item--<?php if ($class == 'About') echo 'active';
                                                                        else echo ''; ?>" aria-haspopup="true">

                                    <a href="<?php echo base_url("AdministratorArea/About") ?>" class="kt-menu__link ">

                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>

                                        <span class="kt-menu__link-text">About</span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </li>

                    <li class="kt-menu__item kt-menu__item--submenu <?php if ($class == 'Ourservices') echo $head_open;
                                                                    else echo ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">

                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">

                            <i class="kt-menu__link-icon flaticon-user"></i>

                            <span class="kt-menu__link-text">OURSERVICES</span>

                            <i class="kt-menu__ver-arrow la la-angle-right"></i>

                        </a>

                        <div class="kt-menu__submenu " kt-hidden-height="80" style="">

                            <span class="kt-menu__arrow"></span>

                            <ul class="kt-menu__subnav">

                                <li class="kt-menu__item kt-menu__item--<?php if ($class == 'Ourservices') echo 'active';
                                                                        else echo ''; ?>" aria-haspopup="true">

                                    <a href="<?php echo base_url("AdministratorArea/Ourservices") ?>" class="kt-menu__link ">

                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>

                                        <span class="kt-menu__link-text">Ourservices</span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </li>

                    <li class="kt-menu__item kt-menu__item--submenu <?php if ($class == 'Treatment') echo $head_open;
                                                                    else echo ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">

                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">

                            <i class="kt-menu__link-icon flaticon-user"></i>

                            <span class="kt-menu__link-text">TREATMENT</span>

                            <i class="kt-menu__ver-arrow la la-angle-right"></i>

                        </a>

                        <div class="kt-menu__submenu " kt-hidden-height="80" style="">

                            <span class="kt-menu__arrow"></span>

                            <ul class="kt-menu__subnav">

                                <li class="kt-menu__item kt-menu__item--<?php if ($class == 'Treatment') echo 'active';
                                                                        else echo ''; ?>" aria-haspopup="true">

                                    <a href="<?php echo base_url("AdministratorArea/Treatment") ?>" class="kt-menu__link ">

                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>

                                        <span class="kt-menu__link-text">Treatment</span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </li>

                    <li class="kt-menu__item kt-menu__item--submenu <?php if ($class == 'Review') echo $head_open;
                                                                    else echo ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">

                            <i class="kt-menu__link-icon flaticon-user"></i>

                            <span class="kt-menu__link-text">REVIEW</span>

                            <i class="kt-menu__ver-arrow la la-angle-right"></i>

                        </a>

                        <div class="kt-menu__submenu " kt-hidden-height="80" style="">

                            <span class="kt-menu__arrow"></span>

                            <ul class="kt-menu__subnav">

                                <li class="kt-menu__item kt-menu__item--<?php if ($class == 'Review') echo 'active';
                                                                        else echo ''; ?>" aria-haspopup="true">

                                    <a href="<?php echo base_url("AdministratorArea/Review") ?>" class="kt-menu__link ">

                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>

                                        <span class="kt-menu__link-text">Review</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="kt-menu__item kt-menu__item--submenu <?php if ($class == 'Knowledge') echo $head_open;
                                                                    else echo ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">

                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">

                            <i class="kt-menu__link-icon flaticon-user"></i>

                            <span class="kt-menu__link-text">KNOWLEDGE</span>

                            <i class="kt-menu__ver-arrow la la-angle-right"></i>

                        </a>

                        <div class="kt-menu__submenu " kt-hidden-height="80" style="">

                            <span class="kt-menu__arrow"></span>

                            <ul class="kt-menu__subnav">

                                <li class="kt-menu__item kt-menu__item--<?php if ($class == 'Knowledge') echo 'active';
                                                                        else echo ''; ?>" aria-haspopup="true">

                                    <a href="<?php echo base_url("AdministratorArea/Knowledge") ?>" class="kt-menu__link ">

                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>

                                        <span class="kt-menu__link-text">Knowledge</span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </li>

                    <li class="kt-menu__item kt-menu__item--submenu <?php if ($class == 'contact_us' || $class == 'Training_place') echo $head_open;
                                                                    else echo ''; ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">

                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">

                            <i class="kt-menu__link-icon flaticon-user"></i>

                            <span class="kt-menu__link-text">CONTACT US</span>

                            <i class="kt-menu__ver-arrow la la-angle-right"></i>

                        </a>

                        <div class="kt-menu__submenu " kt-hidden-height="80" style="">

                            <span class="kt-menu__arrow"></span>

                            <ul class="kt-menu__subnav">

                                <li class="kt-menu__item kt-menu__item--<?php if ($class == 'contact_us') echo 'active';
                                                                        else echo ''; ?>" aria-haspopup="true">

                                    <a href="<?php echo base_url("AdministratorArea/contact_us") ?>" class="kt-menu__link ">

                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>

                                        <span class="kt-menu__link-text">Contact us</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>

                <?php

                }

                ?>



                <?php

                /** ======================================================================================

                 *      

                ====================================================================================== **/



                ?>



            </ul>

        </div>

    </div>

    <!-- end:: Aside Menu -->

</div>