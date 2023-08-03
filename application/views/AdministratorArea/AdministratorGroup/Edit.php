<!-- ------------------------------------------------------------------ -->
<!-- PERMISSION CHECK IS BEGIN                                          -->
<!-- ------------------------------------------------------------------ -->
<?php
$codeigniter_instance =& get_instance();
$configurations = array(
    "PAGE_TITLE" => "แก้ไขหรือเปลี่ยนแปลง AdministratorGroup System"
);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <link rel="icon" href="<?php echo base_url("assets/frontend/img/logo/Logo_main.png") ?>">

    <title>Change</title>

    <!-- META TAG AREA -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!--THEME -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="<?php echo assetsDirectory('dist/assets/plugins/css.css');?>" />

    <!--end::Page Vendors Styles -->

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


</head>

<!-- ------------------------------------------------------------------ -->
<!-- BODY IS BEGIN                                                      -->
<!-- ------------------------------------------------------------------ -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <!-- begin:: Aside -->
            <?php $this->load->view("AdministratorArea/__Shards/HTML_DarkBlueSideBar",array());?>
            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <!-- begin:: Header -->
                <?php $this->load->view("AdministratorArea/__Shards/HTML_DarkBlueHeader",array());?>
                <!-- end:: Header -->

                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <div class="kt-subheader kt-grid__item" id="kt_subheader" >
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-subheader__main">

                            </div>
                        </div>
                    </div>
                    
                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <!--begin::Portlet-->
                        <form class="kt-form form_data" id="kt_form_1">
                            <div class="kt-portlet kt-faq-v1">
                                <?php $this->load->view("AdministratorArea/__Shards/HTML_DarkBlueBreadCrumb",array());?>
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <span class="kt-portlet__head-icon">
                                            <i class="kt-font-brand flaticon-users-1"></i>
                                        </span>
                                        <h3 class="kt-portlet__head-title">
                                         <?php echo $configurations["PAGE_TITLE"]?>
                                     </h3>
                                 </div>
                             </div>
                             <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">  
                                        <input type="hidden" name="administrator_group_id" value="<?php if(isset($administrator_group->administrator_group_id)) echo $administrator_group->administrator_group_id?>">
                                        <input type="hidden"  name="administrator_group_id" value="<?php if(isset($administrator_group->administrator_group_id)) echo $administrator_group->administrator_group_id;?>"> 
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                Name<span style="color: red;"> * </span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" class="form-control" name="name" value="<?php if(isset($administrator_group->name)) echo $administrator_group->name?>" 
                                                    >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Status<span style="color: red;"> * </span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                        <div class="kt-radio-inline ">
                                                            <label class="kt-radio radio kt-radio--solid kt-radio--success">
                                                                <input type="radio" value="ACTIVATE" id="Status" name="status" style="color:green;"  <?php if(isset($administrator_group->status) && $administrator_group->status == "ACTIVATE")echo "checked"?>> ACTIVATE
                                                                <span></span>
                                                            </label>
                                                            <label class="kt-radio radio kt-radio--solid kt-radio--danger">
                                                                <input type="radio"  value="SUSPEND" id="Status" name="status" style="color:red;"  <?php if(!isset($administrator_group->status) || $administrator_group->status != "ACTIVATE")echo "checked"?>> SUSPEND
                                                                <span></span>
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <br><br><br>
                                            <h3 class="kt-portlet__head-title">
                                                PERMiSSION
                                            </h3>
                                            
                                            <?php
                                            $codeigniter_instance->load->model("administrator_group_permission_key_model");

                                            $group_permissions = $this->administrator_group_permission_key_model->search();

                                            foreach($group_permissions as $group_permission)
                                            {
                                                ?>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-4 col-sm-12" style="text-align: right;"><?php echo $group_permission->name;?></label>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <input type="hidden" name="administrator_group_permission_key_id" value="<?php echo $group_permission->administrator_group_permission_key_id; ?>">

                                                        <input data-switch="true" type="checkbox" name="switch[<?php echo $group_permission->administrator_group_permission_key_id; ?>]" id="test" data-on-color="success" data-off-color="warning" <?php foreach($administrator_group_permissions as $administrator_group_permission){ ?>  <?php if ($administrator_group_permission->administrator_group_permission_key_id == $group_permission->administrator_group_permission_key_id) {
                                                         echo 'checked ';
                                                     } ?>
                                                 <?php  }  ?>
                                                 >



                                             </div>
                                         </div>
                                     <?php } ?>


                                 </div>
                             </div>

                         </div>
                         <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3 col-xl-3">
                                    </div>
                                    <div class="col-lg-9 col-xl-9">
                                        <button type="submit" id="submit"  class="btn btn-success">Submit</button>&nbsp;
                                        <a type="reset" href="<?php echo base_url('AdministratorArea/Administrator_group')?>" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>         
                <!--end::Portlet-->  
            </div>
            <!-- end:: Content -->              
        </div>

        <!-- begin:: Footer -->
        <?php $this->load->view("AdministratorArea/__Shards/HTML_DarkBlueFooter",array());?>
        <!-- end:: Footer -->
    </div>
</div>
</div>
</body>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="<?php echo assetsDirectory("dist/assets/plugins/global/plugins.bundle.js")?>" type="text/javascript"></script>
<script src="<?php echo assetsDirectory("dist/assets/js/scripts.bundle.js")?>" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts(used by this page) -->
<script src="<?php echo assetsDirectory("dist/assets/js/pages/custom/login/login-general.js")?>" type="text/javascript"></script>

<script src="<?php echo assetsDirectory("dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js")?>" type="text/javascript"></script>
<!-- CUSTOM AREA -->
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
<script type="text/javascript">

 // Class definition

 var KTFormControls = function () {
    // Private functions

    var initWidgets = function() {

        // bootstrap switch
        $('[data-switch=true]').bootstrapSwitch();

    }

    var demo1 = function () {
        $( "#kt_form_1" ).validate({
            // define validation rules
            rules: {
                //= Client Information(step 3)
                // Billing Information
                name: {
                    required: true
                },
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {

                swal.fire({
                    "title": "",
                    "text": "There are some errors in your submission. Please correct them.",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });

                event.preventDefault();
            },

            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url("AdministratorArea/Administrator_group/edit")?>",
                    data: new FormData($('.form_data')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        try {
                            if(response.code == "0x0000-00000") {
                                swal.fire({
                                    title: 'Saved !',
                                    text: "Your file has been saved. ",
                                    type: 'success',
                                    timer: 650
                                }).then(function(result) {
                                    if (result.dismiss === 'timer') {
                                        window.history.back();
                                    }
                                });
                            }else{

                                $("#system-return-error .message").html(response.message);
                                $("#system-return-error").modal("toggle");
                            }
                        } catch(e) {
                            $("#system-return-failed").modal("toggle");
                        }
                        $.unblockUI('body');
                                // App.unblockUI('body');
                            },
                            error: function(){
                                $("#system-disconnected").modal("toggle");
                                $.unblockUI('body');
                            }
                        });  
            }
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
            initWidgets();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();
});




</script>

</html>

<!-- ------------------------------------------------------------------ -->
<!-- MODAL IS BEGIN                                                     -->
<!-- ------------------------------------------------------------------ -->
<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemDisconnected");?>
<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemReturnError");?>
<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemReturnFailed");?>