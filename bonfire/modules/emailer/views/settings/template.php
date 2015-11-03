<div class="panel panel-white">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo lang('emailer_template_note'); ?></h3>
	</div>
	<div class="panel-body">
   	<?php echo form_open(SITE_AREA . '/settings/emailer/template', 'class="form-horizontal"'); ?>
   		<div class="form-group">
   			<label class="col-sm-2 control-label"><?php echo lang('emailer_header'); ?></label>
   			<div class="col-sm-10">
   				<textarea name="header" rows="15" class="form-control"><?php echo htmlspecialchars_decode($this->load->view('email/_header', null, true)) ;?></textarea>
   			</div>
   		</div>
   		<div class="form-group">
   			<label class="col-sm-2 control-label"><?php echo lang('emailer_footer'); ?></label>
   			<div class="col-sm-10">
   				<textarea name="footer" rows="15" class="form-control"><?php echo htmlspecialchars_decode($this->load->view('email/_footer', null, true)) ;?></textarea>
   			</div>
   		</div>
   		<div class="form-group">
   			<div class="col-sm-10 col-sm-offset-2">
   				<input type="submit" name="save" id="submit" class="btn btn-primary" value="<?php e(lang('emailer_save_template')); ?>" />
   				<?php echo ' ' . lang('bf_or') . ' ' . anchor(SITE_AREA . '/settings/emailer', lang('bf_action_cancel')); ?>
   			</div>
   		</div>
	<?php echo form_close(); ?>
	</div>
</div>