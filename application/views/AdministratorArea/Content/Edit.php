<!-- ------------------------------------------------------------------ -->

<!-- PERMISSION CHECK IS BEGIN                                          -->

<!-- ------------------------------------------------------------------ -->

<?php

$codeigniter_instance = &get_instance();

$configurations = array(

    "PAGE_TITLE" => "Main Banner",

    "PAGE_HEADER" => array(

        "MAIN_TITLE" => "สินค้าในประเทศ",

        "SUB_TITLE" => "Edit or change"

    ),

    "PORTLET_HEADER" => array(

        "ICON" => "flaticon2-photograph",

        "TITLE" => "Domestic type Detail"

    )

);

?>

<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <link href="<?php echo base_url('/assets/images/icon-web/Logo_main.png') ?>" rel="shortcut icon" />

    <title>Advanced Security Mangement Program | Admin System</title>



    <!-- META TAG AREA -->

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <meta content="" name="description" />

    <meta content="" name="author" />

    <!--THEME -->



    <!--begin::Page Vendors Styles(used by this page) -->

    <link href="<?php echo assetsDirectory('dist/assets/plugins/css.css'); ?>" />



    <!--end::Page Vendors Styles -->

    <link href="<?php echo assetsDirectory("dist/assets/css/pages/login/login-4.css") ?>" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->



    <!--begin::Global Theme Styles(used by all pages) -->

    <link href="<?php echo assetsDirectory("dist/assets/plugins/global/plugins.bundle.css") ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/style.bundle.css") ?>" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->



    <!--begin::Layout Skins(used by all pages) -->

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/header/base/light.css") ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/header/menu/light.css") ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/brand/dark.css") ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/aside/dark.css") ?>" rel="stylesheet" type="text/css" />

    <!-- PAGE WIZARD -->

    <link href="<?php echo assetsDirectory("dist/assets/css/pages/wizard/wizard-3.css") ?>" rel="stylesheet" type="text/css" />

    <!-- CUSTOM AREA -->

    <!-- <link href="<?php echo assetsDirectory("dist/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"); ?>" rel="stylesheet" type="text/css" /> -->
    <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

</head>

<style type="text/css">
    .kt-avatar .kt-avatar__holder {

        background-size: contain;

        width: 380px;

        height: 200px;

    }
</style>

<!-- CSS -->
<style type="text/css">
    .cke_textarea_inline {
        border: 1px solid black;
    }
</style>



<!-- ------------------------------------------------------------------ -->

<!-- BODY IS BEGIN                                                      -->

<!-- ------------------------------------------------------------------ -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- end:: Header Mobile -->

    <div class="kt-grid kt-grid--hor kt-grid--root">

        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->

            <?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicSidebar", array()); ?>

            <!-- end:: Aside -->

            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->

                <?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicHeader", array()); ?>

                <!-- end:: Header -->

                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <div class="kt-subheader kt-grid__item" id="kt_subheader">

                        <div class="kt-container  kt-container--fluid ">

                            <div class="kt-subheader__main">

                            </div>

                        </div>

                    </div>

                    <!-- begin:: Content -->

                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                        <!--begin::Portlet-->


                        <div class="kt-portlet kt-faq-v1">

                            <?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicSubHeader", array()); ?>

                            <div class="kt-portlet__head kt-iconbox kt-iconbox--brand kt-iconbox--animate-slow">

                                <div class="kt-portlet__head-label">

                                    <span class="kt-portlet__head-icon">

                                        <i class="kt-font-brand <?php echo $configurations["PORTLET_HEADER"]["ICON"] ?>"></i>

                                    </span>

                                    <h3 class="kt-portlet__head-title">

                                        <?php echo $configurations["PAGE_TITLE"] ?>

                                        <small>

                                            <?php echo $configurations["PAGE_HEADER"]["SUB_TITLE"] ?>

                                        </small>

                                    </h3>

                                </div>

                            </div>

                            <div class="kt-portlet__body">

                                <div class="kt-portlet__body kt-portlet__body--fit">

                                    <div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3" data-ktwizard-state="step-first">

                                        <div class="kt-grid__item">

                                            <!--begin: Form Wizard Nav -->

                                            <div class="kt-wizard-v3__nav">

                                                <!--doc: Remove "kt-wizard-v3__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->

                                                <div class="kt-wizard-v3__nav-items kt-wizard-v3__nav-items--clickable">

                                                    <div class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">

                                                        <div class="kt-wizard-v3__nav-body">

                                                            <div class="kt-wizard-v3__nav-label">

                                                                <span>1</span> Information

                                                            </div>

                                                            <div class="kt-wizard-v3__nav-bar"></div>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <!--end: Form Wizard Nav -->

                                        </div>

                                        <form class="kt-form form_data" id="main-form">

                                            <br>
                                            <div class="form-group row">


                                                <label class="col-lg-3 col-form-label" align="right">STATUS <span style="color: red;"> *</span></label>

                                                <div class="col-lg-3">

                                                    <div class="kt-radio-inline">

                                                        <label class="kt-radio kt-radio--bold kt-radio--success">

                                                            <input type="radio" name="status" value="ACTIVATE" <?php if (!isset($content->status) || $content->status == "ACTIVATE") echo "checked" ?>> Activate

                                                            <span></span>

                                                        </label>

                                                        <label class="kt-radio kt-radio--bold kt-radio--warning">

                                                            <input type="radio" name="status" value="SUSPEND" <?php if (isset($content->status) && $content->status != "ACTIVATE") echo "checked" ?>> Suspend

                                                            <span></span>

                                                        </label>

                                                    </div>

                                                </div>

                                            </div>



                                            <!--begin: Form th -->

                                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">

                                                <div class="kt-form__section kt-form__section--first">

                                                    <div class="kt-wizard-v3__form">

                                                        <div class="form-group ">

                                                            <div class="row">

                                                                <div class="col-lg-12">

                                                                    <label class="col-xl-3 col-lg-3 col-form-label" align="right">BANNER </label>

                                                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar1">

                                                                        <?php

                                                                        $image = '';

                                                                        if (isset($content->image) && $content->image != "" && file_exists(FCPATH . '/assets/uploads/content/' . $content->image)) {

                                                                            $image = uploadsDirectory("content/" . $content->image);
                                                                        }

                                                                        ?>

                                                                        <div class="kt-avatar__holder" <?php if (isset($content->image)) echo ' style="background-image:url(' . $image . ');"'; ?>> </div>

                                                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="Change Banner">

                                                                            <i class="fa fa-pen"></i>

                                                                            <input type="file" name="image[th]">

                                                                        </label>

                                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="Cancel Banner">

                                                                            <i class="fa fa-times"></i>

                                                                        </span>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="form-group row">

                                                            <label class="col-lg-3 col-form-label" align="right">Title</label>

                                                            <div class="col-lg-6 col-xl-7">

                                                                <input type="text" class="form-control" name="title" value="<?php if (isset($content->title)) echo $content->title ?>">

                                                            </div>

                                                        </div>
                                                        <div class="form-group row">

                                                            <label class="col-lg-3 col-form-label" align="right">Description</label>

                                                            <div class="col-lg-6 col-xl-7">

                                                                <!-- <textarea class="ckeditor form-control" name="description" rows="6" data-error-container="#editor2_error"></textarea>
                                                                <div id="editor2_error"> </div> -->
                                                                <!-- <textarea class="ckeditor form-control" name="description" rows="6" data-error-container="#editor2_error" value="<?php if (isset($content->description)) echo $content->description ?>"></textarea>
                                                                <div id="editor2_error"> </div> -->
                                                                <textarea class="summernote" id="description" name="description"><?php if (isset($content->description)) echo $content->description; ?></textarea>

                                                            </div>

                                                        </div>



                                                    </div>

                                                </div>

                                            </div>
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

                                            <button type="button" class="btn btn-outline-danger mr-2" id="kt_sweetalert_cancel">Cancel</button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!--end::Portlet-->

                    </div>

                    <!-- end:: Content -->

                </div>



                <!-- begin:: Footer -->

                <?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicFooter", array()); ?>

                <!-- end:: Footer -->

            </div>

        </div>

    </div>

</body>



<!-- ------------------------------------------------------------------ -->

<!-- JAVASCRIPT IS BEGIN                                                -->

<!-- ------------------------------------------------------------------ -->

<!--begin::Global Theme Bundle(used by all pages) -->

<script src="<?php echo assetsDirectory("dist/assets/plugins/global/plugins.bundle.js") ?>" type="text/javascript"></script>

<script src="<?php echo assetsDirectory("dist/assets/js/scripts.bundle.js") ?>" type="text/javascript"></script>

<!--begin::Page Scripts(used by this page) -->

<script src="<?php echo assetsDirectory("dist/assets/js/pages/custom/login/login-general.js") ?>" type="text/javascript"></script>

<script src="<?php echo assetsDirectory("dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js") ?>" type="text/javascript"></script>

<script src="<?php echo assetsDirectory("dist/assets/js/pages/components/extended/sweetalert2.js") ?>" type="text/javascript"></script>



<!-- CUSTOM AREA -->

<script src="<?php echo assetsDirectory("dist/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"); ?>" type="text/javascript"></script>

<script src="<?php echo assetsDirectory("dist/assets/plugins/bootstrap-summernote/summernote.js"); ?>"></script>

<!-- <script src="<?php echo assetsDirectory("dist/assets/js/pages/crud/file-upload/dropzonejs.js"); ?>"></script> -->



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

    var KTFormControls = function() {

        var initWidgets = function() {



            // datetimepicker

            $('#kt_datetimepicker').datetimepicker({

                pickerPosition: 'bottom-left',

                todayHighlight: true,

                autoclose: true,

                format: 'yyyy.mm.dd hh:ii'

            });



            // select2

            $('.kt-select2').select2({

                placeholder: "เลือกข้อมูล",

            });



            var summernote_selector = ".summernote";



            // INITIAL SUMMERNOTE

            var summernote_instance = $(summernote_selector).summernote({

                height: 200,

                focus: false,

                disableDragAndDrop: true,

                toolbar: [

                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]

                ],

                cleaner: {

                    action: 'both', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.

                    newline: '<br>', // Summernote's default is to use '<p><br></p>'

                    notStyle: 'position:absolute;top:0;left:0;right:0', // Position of Notification

                    icon: '<i class="note-icon">[Your Button]</i>',

                    keepHtml: false, // Remove all Html formats

                    keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>', '<i>', '<a>'], // If keepHtml is true, remove all tags except these

                    keepClasses: false, // Remove Classes

                    badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'], // Remove full tags with contents

                    badAttributes: ['style', 'start'], // Remove attributes from remaining tags

                    limitChars: false, // 0/false|# 0/false disables option

                    limitDisplay: 'both', // text|html|both

                    limitStop: false // true/false

                }

            });
        }

        // Private functions



        var wizardEl;

        var wizard;



        // Private functions

        var initWizard = function() {

            // Initialize form wizard

            wizard = new KTWizard('kt_wizard_v3', {

                startStep: 1, // initial active step number

                clickableSteps: true // allow step clicking

            });

        }



        var initUserForm = function() {

            avatar1 = new KTAvatar('kt_user_add_avatar1');

            avatar2 = new KTAvatar('kt_user_add_avatar2');

        }



        var submitForm = function() {

            $("#main-form").validate({

                // define validation rules

                rules: {

                    year: {
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



                submitHandler: function() {

                    KTApp.blockPage({

                        target: 'body',

                        overlayColor: '#000000',

                        state: 'warning', // a bootstrap color

                        size: 'lg' //available custom sizes: sm|lg

                    });

                    $.ajax({

                        type: "POST",

                        // url: "<?php echo base_url("Admin/Administrator/edit") ?>",

                        data: new FormData($('#main-form')[0]),

                        cache: false,

                        contentType: false,

                        processData: false,

                        success: function(response) {

                            try {

                                if (response.code == "0x0000-00000") {

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

                                } else {



                                    $("#system-return-error .message").html(response.message);

                                    // $("#system-return-error").modal("toggle");

                                    swal.fire({

                                        title: "Something wrong!",

                                        html: response.message + '<br><br> Please check your process',

                                        type: "error",

                                        class: "error",

                                    });

                                }

                            } catch (e) {

                                $("#system-return-failed").modal("toggle");

                            }

                            KTApp.unblockPage('body');

                            // App.unblockUI('body');

                        },

                        error: function() {

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

                wizardEl = KTUtil.get('kt_wizard_v3');

                formEl = $('#main-form');



                submitForm();

                initWizard();

                initUserForm();

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

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemDisconnected"); ?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemReturnError"); ?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemReturnFailed"); ?>