<?php

if (validation_errors()) :
?>
<div class="alert alert-error alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="alert-heading"><?php echo lang('emailer_validation_errors_heading'); ?></h4>
    <?php echo validation_errors(); ?>
</div>
<?php
endif;

echo form_open($this->uri->uri_string());
?>
    <!-- Forgot Password -->
<?php
echo form_close();
