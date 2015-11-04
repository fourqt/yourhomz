<?php if (validation_errors()) : ?>
    <div class="alert alert-error alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class='alert-heading'><?php echo lang('database_validation_errors_heading'); ?></h4>
        <p><?php echo validation_errors(); ?></p>
    </div>
<?php
endif;
if (empty($tables) || ! is_array($tables)) :
?>
    <div class="alert alert-error">
        <p><?php echo lang('database_backup_no_tables'); ?></p>
    </div>
<?php
else :
    echo form_open(SITE_AREA . '/developer/database/backup', 'class="form-horizontal"');
?>
<div class="panel panel-white">
    <div class="panel-body">
        <?php foreach ($tables as $table) : ?>
        <input type="hidden" name="tables[]" value="<?php e($table); ?>" />
        <?php endforeach; ?>
        <div class="alert alert-info">
            <p><?php echo lang('database_backup_warning'); ?></p>
        </div>
        <div class="form-group<?php echo form_error('file_name') ? ' error' : ''; ?>">
            <label for="file_name" class="col-sm-2 control-label"><?php echo lang('database_filename'); ?></label>
            <div class="col-sm-10">
                <input type="text" name="file_name" id="file_name" value="<?php echo set_value('file_name', empty($file) ? '' : $file); ?>" class="form-control" />
                <p class="help-block"><?php echo form_error('file_name'); ?></p>
            </div>
        </div>
        <div class="form-group<?php echo form_error('drop_tables') ? ' error' : ''; ?>">
            <label for="drop_tables" class="col-sm-2 control-label"><?php echo lang('database_drop_question'); ?></label>
            <div class="col-sm-10">
                <select name="drop_tables" id="drop_tables" class="form-control">
                    <option value="0" <?php echo set_select('drop_tables', '0'); ?>><?php echo lang('bf_no'); ?></option>
                    <option value="1" <?php echo set_select('drop_tables', '1'); ?>><?php echo lang('bf_yes'); ?></option>
                </select>
                <p class="help-block"><?php echo form_error('drop_tables'); ?></p>
            </div>
        </div>
        <div class="form-group<?php echo form_error('add_inserts') ? ' error' : ''; ?>">
            <label for="add_inserts" class="col-sm-2 control-label"><?php echo lang('database_insert_question'); ?></label>
            <div class="col-sm-10">
                <select name="add_inserts" id="add_inserts" class="form-control">
                    <option value="0" <?php echo set_select('add_inserts', '0'); ?>><?php echo lang('bf_no'); ?></option>
                    <option value="1" <?php echo set_select('add_inserts', '1', true); ?>><?php echo lang('bf_yes'); ?></option>
                </select>
                <p class="help-block"><?php echo form_error('add_inserts'); ?></p>
            </div>
        </div>
        <div class="form-group<?php echo form_error('file_type') ? ' error' : ''; ?>">
            <label for="file_type" class="col-sm-2 control-label"><?php echo lang('database_compress_question'); ?></label>
            <div class="col-sm-10">
                <select name="file_type" id="file_type" class="form-control">
                    <option value="txt" <?php echo set_select('file_type', 'txt', true); ?>><?php echo lang('bf_none'); ?></option>
                    <option value="gzip" <?php echo set_select('file_type', 'gzip'); ?>><?php echo lang('database_gzip'); ?></option>
                    <option value="zip" <?php echo set_select('file_type', 'zip'); ?>><?php echo lang('database_zip'); ?></option>
                </select>
                <p class="help-block"><?php echo form_error('file_type'); ?></p>
            </div>
        </div>
        <div class="alert alert-warning">
            <?php echo lang('database_restore_note'); ?>
        </div>
        <div class="form-group<?php echo form_error('tables') ? ' error' : ''; ?>">
            <label class='col-sm-2 control-label' for='table_names'><?php echo lang('database_backup_tables'); ?></label>
            <div id='table_names' class='col-sm-10'>
                <a class='btn btn-info disabled btn-xs'><?php e(implode(', ', $tables)); ?></a>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" name="backup" class="btn btn-primary"><?php echo lang('database_backup'); ?></button>
                <?php echo '&nbsp;&nbsp;&nbsp;' . lang('bf_or') . '&nbsp;&nbsp;&nbsp;' . anchor(SITE_AREA . '/developer/database', lang('bf_action_cancel')); ?>
            </div>
        </div>
    </div>
</div>        
<?php
    echo form_close();
endif;
?>