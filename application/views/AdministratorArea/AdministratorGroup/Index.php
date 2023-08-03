<!-- ------------------------------------------------------------------ -->
<!-- PERMISSION CHECK IS BEGIN                                          -->
<!-- ------------------------------------------------------------------ -->
<?php
$codeigniter_instance =& get_instance();
$configurations = array(
    "PAGE_TITLE" => "AdministratorGroup System",
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
                        <div class="kt-portlet kt-faq-v1">
                            <?php $this->load->view("AdministratorArea/__Shards/HTML_DarkBlueBreadCrumb",array());?>
                            <div class="kt-portlet__head kt-iconbox--animate-slow">
                                <div class="kt-portlet__head-label ">
                                    <span class="kt-portlet__head-icon">
                                        <i class="kt-font-brand flaticon-users-1"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                       <?php echo $configurations["PAGE_TITLE"]?>
                                   </h3>
                               </div>
                               <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <a href="<?php echo base_url('AdministratorArea/Administrator_group/Edit'); ?>">
                                        <button type="button" class="btn btn-brand btn-icon-sm">
                                            <i class="flaticon2-plus"></i> Add New
                                        </button>
                                    </a>
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">

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
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit">

                            <!--begin: Datatable -->
                            <div class="kt-datatable" id="ajax_data"></div>

                            <!--end: Datatable -->
                        </div>
                    </div>         
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

<script src="<?php echo assetsDirectory("dist/assets/js/pages/components/extended/sweetalert2.js")?>" type="text/javascript"></script>



<script type="text/javascript">


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
                source: '<?php echo base_url('AdministratorArea/Administrator_group/datatables'); ?>',
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
                field: 'administrator_group_id',
                title: '#',
                sortable: 'asc',
                width: 35,
                type: 'number',
                selector: false,
                textAlign: 'center',
            }, {
                field: 'name',
                title: 'Administrator_group',
                width: 135,

            },  {
                field: 'status',
                title: 'Status',
                textAlign: 'center',
                    // callback function support for column rendering
                    template: function(row) {
                        var status = {
                            'ACTIVATE': {'title': 'ACTIVATE', 'class': ' kt-badge--success'},
                            'SUSPEND': {'title': 'SUSPEND', 'class': ' kt-badge--danger'},
                        };
                        return '<span class="kt-badge ' + status[row.status].class + ' kt-badge--inline kt-badge--pill">' + status[row.status].title + '</span>';
                    },
                }, {
                    field: 'created_date',
                    title: 'Created_date',
                    textAlign: 'center',
                    template: function(row) {
                        if (row['created_date'] !=  null) {

                            return moment(row['created_date']).format("DD-MMMM-YYYY");
                        }else{

                            return '<span class="">' + '-' + '</span>';
                        }
                    
                    },
                },  {
                    field: 'modified_date',
                    title: 'Modified_date',
                    textAlign: 'center',
                    template: function(row) {

                         if (row['modified_date'] !=  null) {

                            return moment(row['modified_date']).format("DD-MMMM-YYYY");
                        }else{

                            return '<span class="">' + '-' + '</span>';
                        }
                        
                    },
                }, {
                    field: 'Actions',
                    title: 'Actions',
                    textAlign: 'center',
                    template: function(row) {
                        var id = row['administrator::administrator_id'];
                        var action_header = '<a href="<?php echo base_url('AdministratorArea/Administrator_group/edit/');?>'+row['administrator_group_id']+'"class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">'+
                        '<i class="flaticon2-paper"></i>'+
                        '</a>';

                        action_header += '<a class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Delete" id="confirmDelete'+row['administrator_group_id']+'">'+
                        '<i class="flaticon2-trash"></i>'+
                        '</a>'+
                        '<input type="hidden" id="'+row['administrator_group_id']+'" value="<?php echo base_url('AdministratorArea/Administrator_group/delete/');?>'+row['administrator_group_id']+'">';
                        $(document).ready(function(){

                         $('#confirmDelete'+row['administrator_group_id']+'').click(function(e) {
                            swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes, delete it!'
                            }).then(function(result) {
                                if (result.value) {
                                    console.log(id);
                                    $.ajax({
                                        type: "GET",
                                        url: $("#"+row["administrator_group_id"]+" ").val(),
                                        data: new FormData($('.login-form')[0]),
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(response){
                                            try {
                                                if(response.code == "0x0000-00000") {
                                                    location.reload();
                                                }else{
                                                    $("#system-return-error .message").html(response.message);
                                                                    // $("#system-return-error").modal("toggle");
                                                                    swal.fire("Something wrong!", "Please check your process", "error");
                                                                }
                                                            } catch(e) {
                                                                $("#system-return-failed").modal("toggle");
                                                            }
                                                        },
                                                        error: function(){
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
                }],

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
</html>

<!-- ------------------------------------------------------------------ -->
<!-- MODAL IS BEGIN                                                     -->
<!-- ------------------------------------------------------------------ -->
<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal");?>
<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_ConfirmationDelete");?>
<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_PermissionDenied");?>