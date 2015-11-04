<p><?php echo lang('mb_context_create_intro'); ?></p>
<div class="alert alert-info" role="alert"><?php echo lang('mb_context_create_intro_note'); ?></div>
<div class="panel panel-white">
<div class="panel-body">
    <?php if (validation_errors()) : ?>
	<div class="alert alert-error alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="alert-heading"><?php echo lang('mb_form_errors'); ?></h4>
		<?php echo validation_errors(); ?>
	</div>
    <?php endif; ?>
	<?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
        <div class="form-group<?php echo form_error('context_name') ? ' error' : ''; ?>">
            <label for="context_name" class="col-sm-2 control-label"><?php echo lang('mb_context_name'); ?></label>
            <div class="col-sm-10">
                <input type="text" name="context_name" id="context_name" class="form-control" value="<?php echo settings_item('context_name'); ?>" />
                <p class="help-block"><?php
                    echo form_error('context_name') ? form_error('context_name') . '<br />' : '';
                    echo lang('mb_context_name_help');
                ?></p>
            </div>
        </div>
        <?php if (! empty($roles) && is_array($roles)) : ?>
        <div class="form-group">
            <label class="col-sm-2 control-label" id="roles_label"><?php echo lang('mb_roles_label'); ?></label>
            <div class="col-sm-10" aria-labelledby="roles_label" role="group">
                <?php foreach ($roles as $role) : ?>
                <label class="checkbox-inline" for="roles_<?php echo $role->role_id; ?>">
                    <input type="checkbox" name="roles[]" id="roles_<?php echo $role->role_id; ?>" value="<?php echo $role->role_id; ?>" <?php echo set_checkbox('roles[]', $role->role_id); ?> />
                    <?php echo $role->role_name; ?>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        <?php
        /* TODO: Add this in later.
        <div class="control-group">
            <div class="controls">
                <label class="checkbox" for="migrate">
                    <input type="checkbox" name="migrate" id="migrate" value="1" <?php echo set_checkbox('migrate', '1'); ?> /> <?php echo lang('mb_context_migrate'); ?>
                </label>
            </div>
        </div>
        */
        ?>
        <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
                <input type="submit" name="build" class="btn btn-primary" value="<?php echo lang('mb_context_submit'); ?>" />
                <?php
                echo anchor(
                    site_url(SITE_AREA . '/developer/builder'),
                    '<i class="fa fa-ban"></i>&nbsp;' . htmlspecialchars(lang('bf_action_cancel')),
                    array('class' => 'btn btn-warning')
                );
                ?>
            </div>
        </div>
	<?php echo form_close(); ?>
</div>
</div>