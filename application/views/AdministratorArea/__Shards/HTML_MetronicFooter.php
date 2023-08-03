<?php

$codeigniter_instance =& get_instance();

?>



<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">

	<div class="kt-container  kt-container--fluid ">

		<div class="kt-footer__copyright">

			<?php echo date("Y")?> &copy; <?php echo $this->config->item('WEBSITE_NAME');?> By <?php echo $this->config->item('WEBSITE_TEAM');?>

        <a href="<?php echo $this->config->item('WEBSITE_REFERENCE');?>" title="<?php echo $this->config->item('WEBSITE_REFERENCE');?>" target="_blank"> Join Us!</a>

		</div>

		<div class="kt-footer__menu">

		</div>

	</div>

</div>

