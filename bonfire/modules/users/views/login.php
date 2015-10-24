<?php
	$site_open = $this->settings_lib->item('auth.allow_register');
?>
<div class="page-inner">
<div id="main-wrapper">
<p><br/><a href="<?php echo site_url(); ?>">&larr; <?php echo lang('us_back_to') . $this->settings_lib->item('site.title'); ?></a></p>
<div class="row">
<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 center">
<div id="login" class="login-box">
	<a href="index.html" class="logo-name text-lg text-center">ROOFERS ADMIN</a>
	<p class="text-center m-t-md"><?php echo lang('us_login'); ?></p>
	<?php echo Template::message(); ?>

	<?php
		//if (validation_errors()) :
	?>
			<div class="alert alert-error alert-dismissible" role="alert">
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php echo validation_errors(); ?>
			</div>
	<?php //endif; ?>

	<?php echo form_open(LOGIN_URL, array('autocomplete' => 'off')); ?>

		<div class="control-group <?php echo iif( form_error('login') , 'error') ;?>">
			<div class="form-group">
				<input class="form-control" type="text" name="login" id="login_value" value="<?php echo set_value('login'); ?>" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" />
			</div>
		</div>

		<div class="control-group <?php echo iif( form_error('password') , 'error') ;?>">
			<div class="form-group">
				<input class="form-control" type="password" name="password" id="password" value="" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>" />
			</div>
		</div>

		<?php if ($this->settings_lib->item('auth.allow_remember')) : ?>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3" />
					<?php echo lang('us_remember_note'); ?>
				</label>
			</div>
		<?php endif; ?>

		<div class="control-group">
			<div class="controls">
				<input class="btn btn-success" type="submit" name="log-me-in" id="submit" value="<?php e(lang('us_let_me_in')); ?>" tabindex="5" />
			</div>
		</div>
	<?php echo form_close(); ?>

	<?php // show for Email Activation (1) only
		if ($this->settings_lib->item('auth.user_activation_method') == 1) : ?>
	<!-- Activation Block -->
			<p style="text-align: left" class="well">
				<?php echo lang('bf_login_activate_title'); ?><br />
				<?php
				$activate_str = str_replace('[ACCOUNT_ACTIVATE_URL]',anchor('/activate', lang('bf_activate')),lang('bf_login_activate_email'));
				$activate_str = str_replace('[ACTIVATE_RESEND_URL]',anchor('/resend_activation', lang('bf_activate_resend')),$activate_str);
				echo $activate_str; ?>
			</p>
	<?php endif; ?>

	<p style="text-align: center">
		<?php if ( $site_open ) : ?>
			<?php echo anchor(REGISTER_URL, lang('us_sign_up')); ?>
		<?php endif; ?>

		<br/><?php echo anchor('/forgot_password', lang('us_forgot_your_password')); ?>
	</p>

</div>
</div>
</div>
</div>
</main>