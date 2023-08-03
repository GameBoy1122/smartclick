<!-- ------------------------------------------------------------------ -->

<!-- PERMISSION CHECK IS BEGIN                                          -->

<!-- ------------------------------------------------------------------ -->

<?php

$codeigniter_instance =& get_instance();

$configurations = array(

    "PAGE_TITLE" => "Administrator System",

    "PAGE_HEADER" => array(

        "MAIN_TITLE" => "ผู้ใช้งานและสิทธิ์การเข้าถึง",

        "SUB_TITLE" => "แก้ไขหรือเปลี่ยนแปลง ผู้ใช้งานและสิทธิ์การเข้าถึง"

    ),

    "PORTLET_HEADER" => array(

        "ICON" => "flaticon2-user",

        "TITLE" => "Administrator Detail"

    )

);

?>

<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>

    <title><?php echo $this->config->item('WEBSITE_NAME');?> | Admin System</title>

    <link href="<?php echo base_url('/assets/images/icon-web/Logo_main.png') ?>" rel="shortcut icon" />



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

            <?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicSidebar",array());?>

            <!-- end:: Aside -->

            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->

                <?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicHeader",array());?>

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

                        <?php if (checkAdministratorPermission("ADMINISTRATOR_MANAGEMENT", "edit")) {

                            ?>

                            <!--begin::Portlet-->

                            <div class="kt-portlet kt-faq-v1">

                                <?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicSubHeader",array());?>

                                <div class="kt-portlet__head kt-iconbox kt-iconbox--brand kt-iconbox--animate-slow">

                                    <div class="kt-portlet__head-label">

                                        <span class="kt-portlet__head-icon">

                                            <i class="kt-font-brand <?php echo $configurations["PORTLET_HEADER"]["ICON"]?>"></i>

                                        </span>

                                        <h3 class="kt-portlet__head-title">

                                           <?php echo $configurations["PAGE_TITLE"]?>

                                            <small>

                                                <?php echo $configurations["PAGE_HEADER"]["SUB_TITLE"]?>

                                            </small>

                                       </h3>

                                   </div>

                               </div>

                               <div class="kt-portlet__body">

                                <div class="kt-section kt-section--first">

                                    <div class="kt-section__body">

                                        <form class="kt-form form_data" id="main-form">

                                            <input type="hidden"  name="administrator_id" value="<?php if(isset($administrator->{"administrator::administrator_id"})) echo $administrator->{"administrator::administrator_id"}?>">

                                            <div class="form-group row">

                                                <label class="col-lg-3 col-form-label" style="text-align: right;">Status: <span style="color: red;"> *</span></label>

                                                <div class="col-lg-3">

                                                    <div class="kt-radio-inline">

                                                        <label class="kt-radio kt-radio--bold kt-radio--success">

                                                            <input type="radio" name="status" value="ACTIVATE" <?php if(isset($administrator->{"administrator::status"}) && $administrator->{"administrator::status"} == "ACTIVATE")echo "checked"?>> Activate

                                                            <span></span>

                                                        </label>

                                                        <label class="kt-radio kt-radio--bold kt-radio--warning">

                                                            <input type="radio" name="status" value="SUSPEND" <?php if(!isset($administrator->{"administrator::status"}) || $administrator->{"administrator::status"} != "ACTIVATE")echo "checked"?>> Suspend

                                                            <span></span>

                                                        </label>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                            <label class="col-xl-3 col-lg-3 col-form-label" style="text-align: right;">

                                                Username<span style="color: red;"> * </span></label>

                                                <div class="col-lg-5 col-xl-6">

                                                    <input type="text" class="form-control" name="username" value="<?php if(isset($administrator->{"administrator::username"})) echo $administrator->{"administrator::username"}?>"  

                                                    >

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label class="col-xl-3 col-lg-3 col-form-label" style="text-align: right;">E-mail<span style="color: red;"> * </span></label>

                                                <div class="col-lg-5 col-xl-6">

                                                    <input type="text" class="form-control" name="email" value="<?php if(isset($administrator->{"administrator::email"})) echo $administrator->{"administrator::email"}?>" >

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label class="col-xl-3 col-lg-3 col-form-label" style="text-align: right;">Group<span style="color: red;"> * </span></label>

                                                <div class="col-lg-5 col-xl-6">

                                                    <select class="form-control kt-select2" id="group_select2" name="administrator_group_id" >

                                                        <option></option> 



                                                        <?php foreach ($administrator_group as $key => $administrator_groups) { ?>

                                                           

                                                               <option value="<?php echo $administrator_groups->administrator_group_id; ?>" <?php if(isset($administrator->{"administrator::administrator_group_id"}) && $administrator_groups->administrator_group_id == $administrator->{"administrator::administrator_group_id"}) echo 'selected';?> ><?php echo $administrator_groups->name; ?></option> 

                                                        <?php  } ?>



                                                    </select>

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label class="col-xl-3 col-lg-3 col-form-label" style="text-align: right;">Password<span style="color: red;"> * </span></label>

                                                <div class="col-lg-5 col-xl-6">

                                                    <input type="password" class="form-control" id="password" name="password" >

                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label class="col-xl-3 col-lg-3 col-form-label" style="text-align: right;">Retype password<span style="color: red;"> * </span></label>

                                                <div class="col-lg-5 col-xl-6">

                                                    <div class="input-group">

                                                        <input type="password" class="form-control" id="retype_password" name="retype_password" >



                                                    </div>

                                                </div>

                                            </div>



                                            <h3 class="kt-portlet__head-title">

                                                PERMISSION

                                            </h3>



                                            <?php

                                            $codeigniter_instance->load->model("administrator_permission_key_model");



                                            $permissions = $this->administrator_permission_key_model->search();



                                            foreach($permissions as $key => $permission)

                                            {

                                                ?>

                                                <div class="form-group row" style="margin-bottom: 0;">

                                                    <label class="col-xl-3 col-lg-3 col-form-label bold" style="text-align: right;"><?php echo $permission->name;?><br>

                                                        <small style="font-style: normal;color: lightslategray;"><?php echo $permission->description;?></small>

                                                    </label>

                                                    <div class="col-lg-5 col-xl-6">

                                                        <?php

                                                        $possible_permissions = json_decode($permission->possible_permission);

                                                        ?>

                                                        <select class="form-control kt-select2" id="permission_select2_<?php echo $key ?>" name="administrator_permission[<?php echo $permission->key?>][]" multiple>

                                                            <?php

                                                            foreach($possible_permissions as $possible_permission){

                                                                ?>

                                                                <option value="<?php echo $possible_permission?>" <?php if(isset($administrator_permissions[$permission->key]) && in_array($possible_permission, $administrator_permissions[$permission->key]))echo "selected"?>><?php echo ucfirst($possible_permission)?></option>

                                                                <?php

                                                            }

                                                            ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <?php

                                            }

                                            ?>  

                                        </form>

                                    </div>

                                </div>

                               </div>

                                <div class="kt-portlet__foot">

                                    <div class="kt-form__actions">

                                        <div class="row">

                                            <div class="col-lg-3 col-xl-3">

                                            </div>

                                            <div class="col-lg-9 col-xl-9">

                                                <button type="button" class="btn btn-primary" id="confirmSave">Save Changes</button>

                                                <button type="button" class="btn red btn-outline" id="kt_sweetalert_cancel">Cancel</button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>         

                        <!--end::Portlet--> 

                            <?php

                        }else{

                            ?>

                            <center style="color: red;">

                                <h4>Permission denied</h4><br>

                                <h5>You are not allow to use this function.</h5>

                            </center>

                            <?php

                        }

                        ?>

                             

                    </div>

                    <!-- end:: Content -->              

                </div>



                <!-- begin:: Footer -->

                <?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicFooter",array());?>

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





    var initWidgets = function() {

    

        // datetimepicker

        $('#kt_datetimepicker').datetimepicker({

            pickerPosition: 'bottom-left',

            todayHighlight: true,

            autoclose: true,

            format: 'yyyy.mm.dd hh:ii'

        });



        // select2

        $('#group_select2').select2({

            placeholder: "Select a state",

        });



        <?php foreach($permissions as $key => $permission)

        { 

            ?>

            $('#permission_select2_<?php echo $key ?>').select2({

                placeholder: "Please Select...",

            });

            <?php

        } ?>

    }

    // Private functions



    var demo1 = function () {

        $( "#main-form" ).validate({

            // define validation rules

            rules: {

                username: {required: true},

                email: {required: true},

                administrator_group_id: {required: true},

                password: {required: true},

                retype_password: {required: true},

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

                KTApp.blockPage({

                    target: 'body',

                    overlayColor: '#000000',

                    state: 'warning', // a bootstrap color

                    size: 'lg' //available custom sizes: sm|lg

                });

                $.ajax({

                    type: "POST",

                    data: new FormData($('#main-form')[0]),

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

                                        timer: 600

                                    }).then(function(result) {

                                        if (result.dismiss === 'timer') {

                                            window.history.back();

                                        }

                                    });

                            }else{



                                $("#system-return-error .message").html(response.message);

                                // $("#system-return-error").modal("toggle");

                                swal.fire({

                                    // "Something wrong!", "Please check your process", "error"

                                    title: "Something wrong!",

                                    html: response.message + '<br><br> Please check your process',

                                    type: "error",

                                    class: "error",

                                });

                                // toastr.success("Clear itself?<br /><br /><button type="button" class="btn btn-outline-light btn-sm--air--wide clear">Yes</button>");

                            }

                        }catch(e) {

                            $("#system-return-failed").modal("toggle");

                        }

                        KTApp.unblockPage('body');

                    },

                    error: function(){

                        $("#system-disconnected").modal("toggle");

                        KTApp.unblockPage('body');

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



    /** =================================================================== **/

    /** SWEET ALERT                                                      **/

    /** =================================================================== **/

    $('#confirmSave').click(function(e) {

        swal.fire({

            title: 'Are you sure to save ?',

            text: "Save will overwrite previous data ",

            type: 'warning',

            // timer: 1000,

            showCancelButton: true,

            confirmButtonText: 'Yes, Confirm Save!'

        }).then(function(result) {

            if (result.value) {

                $('#main-form').submit();

            }

        });

    });



    $('#kt_sweetalert_cancel').click(function(e) {

        swal.fire({

            title: 'Are you sure to cancel ?',

            text: "You won't be able to revert this!",

            type: 'error',

            showCancelButton: true,

            confirmButtonText: 'Yes, Cancel!',

            confirmButtonClass: 'btn-danger'

        }).then(function(result) {

            if (result.value) {

                window.history.back();

            }

        });

    });

});

          

</script>



</html>



<!-- ------------------------------------------------------------------ -->

<!-- MODAL IS BEGIN                                                     -->

<!-- ------------------------------------------------------------------ -->

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemDisconnected");?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemReturnError");?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemReturnFailed");?>