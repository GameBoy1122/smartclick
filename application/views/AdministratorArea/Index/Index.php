<?php

$codeigniter_instance =& get_instance();

?>

<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>

	<link href="<?php echo base_url('/assets/images/icon-web/Logo_main.png') ?>" rel="shortcut icon" />

	<title><?php echo $this->config->item('WEBSITE_NAME');?> | Admin System</title>



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



					<!-- begin:: Subheader -->

					<?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicSubHeader",array());?>

					<!-- end:: Subheader -->



					<!-- begin:: Content -->

					<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

						<!--begin::Portlet-->

						<div class="kt-portlet kt-faq-v1">

							<div class="kt-portlet__head kt-iconbox--animate-slow">

								<div class="kt-portlet__head-label">

									<h3 class="kt-portlet__head-title">



									</h3>

								</div>

							</div>

							<div class="kt-portlet__body">

								<div class="row">                 

								</div>

							</div>

						</div>         

						<!--end::Portlet-->  

					</div>

					<!-- end:: Content -->              

				</div>



				<!-- begin:: Footer -->

				<!-- <?php $this->load->view("AdministratorArea/__Shards/HTML_MetronicFooter",array());?> -->

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

<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>

<script src="<?php echo assetsDirectory("dist/assets/plugins/custom/gmaps/gmaps.js")?>" type="text/javascript"></script>



<!--begin::Page Scripts(used by this page) -->

<script src="<?php echo assetsDirectory("dist/assets/js/pages/dashboard.js")?>" type="text/javascript"></script>



<!--end::Page Scripts -->





<!-- INCLUDE RAW SCRIPT AREA -->

</html>



<!-- ------------------------------------------------------------------ -->

<!-- MODAL IS BEGIN                                                     -->

<!-- ------------------------------------------------------------------ -->

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal");?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemDisconnected");?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemReturnError");?>

<?php $codeigniter_instance->load->view("AdministratorArea/__Modals/Modal_SystemReturnFailed");?>