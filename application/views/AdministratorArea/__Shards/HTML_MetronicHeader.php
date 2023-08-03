<?php
$ci =&get_instance();
// $ci->load->model('UserRoleMenuTable');
// $ci->load->model('MenuTable');

// $permissionMenus = $ci->UserRoleMenuTable->getMenu($ci->session->userdata('_beRoleId'));

$class = $this->router->fetch_class();
$menu_key_current = $class."/".$this->router->fetch_method();

$codeigniter_instance =& get_instance();

$administrator_information = $codeigniter_instance->session->userdata("__administrator_information");
?>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->


<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " style="background-color: #1a1a27">
    <!-- begin: Header Menu -->
    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
            class="la la-close"></i></button>
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">

        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
            <ul class="kt-menu__nav ">

            </ul>
        </div>
    </div>
    <!-- end: Header Menu -->
    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">
        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,  </span>
                    <span class="kt-header__topbar-username kt-hidden-mobile">@<?php echo $codeigniter_instance->session->userdata("__administrator::username")?>  <br>  [<?php echo $codeigniter_instance->session->userdata("__administrator_group::name")?>] 
                        <?php
                            if(isset($administrator_information->firstname) && isset($administrator_information->lastname)){
                                echo $administrator_information->firstname." ".$administrator_information->lastname;
                            }else{
                                echo "&nbsp;";
                            }
                            ?>
                    </span>
					<i class="flaticon-user" style="font-size: 3rem; border-color: white;  border: 0.5rem;"></i>
                </div>
            </div>

            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                
                <!--begin: Navigation -->
                <div class="kt-notification">
                    <a href="#"
                        class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">
                                My Profile
                            </div>
                            <div class="kt-notification__item-time">
                                Account settings and more
                            </div>
                        </div>
                    </a>

                    <div class="kt-notification__custom kt-space-between">
                        <a href="<?php echo base_url("Authentication/Logout")?>"  class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>

                    </div>
                </div>
                <!--end: Navigation -->
            </div>
        </div>
        <!--end: User Bar -->

    </div>
    <!-- end:: Header Topbar -->
</div>
<!-- end:: Header -->

<!-- CUSTOM AREA -->
    <!-- begin::Global Config(global config for global JS sciprts) -->
    
    <!--end::Page Vendors -->
