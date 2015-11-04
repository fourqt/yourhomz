<div class='panel panel-white'>
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo lang('database_drop_title'); ?></h3>
    </div>
    <div class="panel-body">
        <?php if (empty($tables) || ! is_array($tables)) : ?>
        <div class="alert alert-error">
            <?php echo lang('database_drop_none'); ?>
        </div>
        <?php
        else :
            echo form_open(SITE_AREA . '/developer/database/drop');
        ?>
            <h4 class="text-danger"><?php echo lang('database_drop_confirm'); ?></h4>
            <ul>
                <?php foreach ($tables as $table) : ?>
                <li><?php e($table); ?>
                    <input type="hidden" name="tables[]" value="<?php e($table); ?>" />
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="alert alert-warning">
                <?php echo lang('database_drop_attention'); ?>
            </div>
            <button type="submit" name="drop" class="btn btn-danger"><?php e(lang('database_drop_button')); ?></button>
            <?php echo '&nbsp;&nbsp;&nbsp;' . lang('bf_or') . '&nbsp;&nbsp;&nbsp;' . anchor(SITE_AREA . '/developer/database', lang('bf_action_cancel')); ?>
        <?php
            echo form_close();
        endif;
        ?>
    </div>
</div>