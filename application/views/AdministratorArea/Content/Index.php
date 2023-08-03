<!-- ------------------------------------------------------------------ -->

<!-- PERMISSION CHECK IS BEGIN                                          -->

<!-- ------------------------------------------------------------------ -->

<?php

$codeigniter_instance = &get_instance();

$configurations = array(

    "PAGE_TITLE" => "BANNER MAIN",

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

    <link href="<?php echo assetsDirectory("dist/assets/plugins/custom/datatables/datatables.bundle.css") ?>" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->



    <!--begin::Global Theme Styles(used by all pages) -->

    <link href="<?php echo assetsDirectory("dist/assets/plugins/global/plugins.bundle.css") ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/style.bundle.css") ?>" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <link href="<?php echo assetsDirectory("dist/assets/css/pages/login/login-4.css") ?>" rel="stylesheet" type="text/css" />

    <!--begin::Layout Skins(used by all pages) -->

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/header/base/light.css") ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/header/menu/light.css") ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/brand/dark.css") ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo assetsDirectory("dist/assets/css/skins/aside/dark.css") ?>" rel="stylesheet" type="text/css" />

</head>



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

                    <!-- begin:: Subheader -->

                    <?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicSubHeader", array()); ?>

                    <!-- end:: Subheader -->

                    <!-- <div class="kt-subheader kt-grid__item" id="kt_subheader" >

                    <div class="kt-container  kt-container--fluid ">

                        <div class="kt-subheader__main">

                            

                        </div>

                    </div>

                </div> -->

                    <!-- begin:: Content -->

                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                        <!--begin::Portlet-->

                        <div class="kt-portlet kt-faq-v1">

                            <div class="kt-portlet__head  kt-iconbox kt-iconbox--brand kt-iconbox--animate-slow">

                                <div class="kt-portlet__head-label">

                                    <span class="kt-portlet__head-icon">

                                        <i class="kt-font-brand flaticon2-photograph"></i>

                                    </span>

                                    <h3 class="kt-portlet__head-title">

                                        <?php echo $configurations["PAGE_TITLE"] ?>

                                    </h3>

                                </div>

                                <?php if (checkAdministratorPermission("ADMINISTRATOR_MANAGEMENT", "index")) {

                                ?>

                                    <div class="kt-portlet__head-toolbar">

                                        <div class="kt-portlet__head-wrapper">

                                            <a href="<?php echo base_url('AdministratorArea/Content/edit'); ?>">

                                                <button type="button" class="btn btn-brand btn-icon-sm">

                                                    <i class="flaticon2-plus"></i> Add

                                                </button>

                                            </a>&nbsp;



                                        </div>

                                    </div>

                                <?php

                                }

                                ?>

                            </div>

                            <div class="kt-portlet__body">

                                <?php if (checkAdministratorPermission("ADMINISTRATOR_MANAGEMENT", "index")) {

                                ?>

                                    <!--begin: Search Form -->

                                    <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">

                                        <div class="row align-items-center">

                                            <div class="col-xl-8 order-2 order-xl-1">

                                                <div class="row align-items-center">

                                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">

                                                        <div class="kt-input-icon kt-input-icon--left">

                                                            <input type="text" class="form-control" placeholder="Search..." id="generalSearch">

                                                            <span class="kt-input-icon__icon kt-input-icon__icon--left">

                                                                <span><i class="la la-search"></i></span>

                                                            </span>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <!--end: Search Form -->



                                    <!--begin: Datatable -->

                                    <div class="kt-datatable table-hover" id="ajax_data"></div>



                                    <!-- <table class="table table-striped- table-bordered table-hover table-checkable order-column" id="ajax_datatables">

                                    <thead>

                                        <tr>

                                            <th style="padding: 5px;"><input type="text" class="form-control table-head-search" data-index="0" data-type="text" data-table="#ajax_datatables"></th>

                                            <th style="padding: 5px;"><input type="text" class="form-control table-head-search" data-index="1" data-type="text" data-table="#ajax_datatables"></th>

                                            <th style="padding: 5px;"><input type="text" class="form-control table-head-search" data-index="2" data-type="text" data-table="#ajax_datatables"></th>

                                            <th style="padding: 5px;"><input type="text" class="form-control table-head-search" data-index="3" data-type="text" data-table="#ajax_datatables"></th>

                                            <th style="padding: 5px;"></th>

                                            <th style="padding: 7px;">

                                            </th>

                                        </tr>

                                        <tr>

                                            <th style="width:2%;">No.</th>

                                            <th>URL</th>

                                            <th>Name EN</th>

                                            <th style="width:10%;">Status</th>

                                            <th>Created date</th>

                                            <th>Actions</th>

                                        </tr>

                                    </thead>

                                    <tbody class="sort">



                                    </tbody>

                                </table> -->

                                    <!--end: Datatable -->

                                <?php

                                } else {

                                ?>

                                    <center style="color: red;">

                                        <i class="fas fa-unlock-alt">
                                            <h4>Permission denied</h4><br>

                                            <h5>You are not allow to use this function.</h5>

                                    </center>

                                <?php

                                }

                                ?>

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

<!-- end:: Page -->



<!-- ------------------------------------------------------------------ -->

<!-- JAVASCRIPT IS BEGIN                                                -->

<!-- ------------------------------------------------------------------ -->

<!--begin::Global Theme Bundle(used by all pages) -->

<script src="<?php echo assetsDirectory("dist/assets/plugins/global/plugins.bundle.js") ?>" type="text/javascript"></script>

<script src="<?php echo assetsDirectory("dist/assets/js/jquery-ui.min.js") ?>"></script>

<script src="<?php echo assetsDirectory("dist/assets/js/scripts.bundle.js") ?>" type="text/javascript"></script>

<script src="<?php echo assetsDirectory("dist/assets/plugins/custom/datatables/datatables.bundle.js") ?>" type="text/javascript"></script>



<script src="<?php echo assetsDirectory("dist/assets/js/pages/crud/datatables/extensions/rowreorder.js") ?>" type="text/javascript"></script>

<!--begin::Page Scripts(used by this page) -->

<script src="<?php echo assetsDirectory("dist/assets/js/pages/custom/login/login-general.js") ?>" type="text/javascript"></script>

<script src="<?php echo assetsDirectory("dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js") ?>" type="text/javascript"></script>

<script src="<?php echo assetsDirectory("dist/assets/js/pages/components/extended/sweetalert2.js") ?>" type="text/javascript"></script>



</script>

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

<script>
    "use strict";

    var KTDatatableJsonRemoteDemo = function() {

        // Private functions



        // basic demo

        var demo = function() {



            var datatable = $('.kt-datatable').KTDatatable({

                // datasource definition

                data: {

                    type: 'remote',

                    source: '<?php echo base_url('AdministratorArea/Content/datatables'); ?>',

                    pageSize: 10,

                },



                // layout definition

                layout: {

                    scroll: false,

                    footer: false,

                },



                // column sorting

                sortable: true,



                pagination: true,



                search: {

                    input: $('#generalSearch'),

                },



                // columns definition

                columns: [

                    {

                        field: 'content_id',

                        title: '#',

                        sortable: 'asc',

                        width: 35,

                        type: 'number',

                        selector: false,

                        textAlign: 'center',

                    },

                    {

                        field: 'title',

                        title: 'TITLE',

                        width: 550,

                        autoHide: false,

                        textAlign: 'center',

                    },

                    {

                        field: 'status',

                        title: 'STATUS',

                        width: 80,

                        autoHide: false,

                        textAlign: 'center',

                    },

                    {

                        field: 'Actions',

                        title: 'Actions',

                        textAlign: 'center',

                        autoHide: false,

                        template: function(row) {

                            var db_id = row['content_id'];

                            var action_header = '<a href="<?php echo base_url('AdministratorArea/Content/edit/'); ?>' + db_id + '"class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">' +

                                '<i class="flaticon2-paper"></i>' +

                                '</a>';



                            action_header += '<a class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Delete" id="confirmDelete' + db_id + '">' +

                                '<i class="flaticon2-trash"></i>' +

                                '</a>' +

                                '<input type="hidden" id="' + db_id + '" value="<?php echo base_url('AdministratorArea/Content/delete/'); ?>' + db_id + '">';

                            $(document).ready(function() {



                                $('#confirmDelete' + db_id + '').click(function(e) {

                                    swal.fire({

                                        title: 'Are you sure?',

                                        text: "You won't be able to revert this!",

                                        type: 'warning',

                                        showCancelButton: true,

                                        confirmButtonText: 'Yes, delete it!'

                                    }).then(function(result) {

                                        if (result.value) {

                                            // console.log(id);

                                            $.ajax({

                                                type: "GET",

                                                url: $("#" + db_id + " ").val(),

                                                data: new FormData($('.login-form')[0]),

                                                cache: false,

                                                contentType: false,

                                                processData: false,

                                                success: function(response) {

                                                    try {

                                                        if (response.code == "0x0000-00000") {

                                                            location.reload();

                                                        } else {

                                                            $("#system-return-error .message").html(response.message);

                                                            // $("#system-return-error").modal("toggle");

                                                            swal.fire("Something wrong!", "Please check your process", "error");

                                                        }

                                                    } catch (e) {

                                                        $("#system-return-failed").modal("toggle");

                                                    }

                                                },

                                                error: function() {

                                                    $("#system-disconnected").modal("toggle");

                                                }

                                            });

                                            $('#confirmation-delete').modal('hide');



                                        }

                                    });

                                });



                            });



                            return action_header;

                        },

                    }
                ],

            });



            // $('#kt_form_status').on('change', function() {

            //   datatable.search($(this).val().toLowerCase(), 'Status');

            // });



            // $('#kt_form_type').on('change', function() {

            //   datatable.search($(this).val().toLowerCase(), 'Type');

            // });



            // $('#kt_form_status,#kt_form_type').selectpicker();



            //     $('#generalSearch').on( 'keyup', function () {

            //     datatable.search( this.value ).draw();

            // } );



        };



        return {

            // public functions

            init: function() {

                demo();

            },

        };

    }();







    jQuery(document).ready(function() {

        KTDatatableJsonRemoteDemo.init();

    });
</script>



<!-- INCLUDE RAW SCRIPT AREA -->

<?php $this->load->view("AdministratorArea/__Scripts/Javascript_Datatables", array()); ?>

</html>



<!-- ------------------------------------------------------------------ -->

<!-- MODAL IS BEGIN                                                     -->

<!-- ------------------------------------------------------------------ -->

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal"); ?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_ConfirmationDelete"); ?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_PermissionDenied"); ?>