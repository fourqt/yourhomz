<?php

$hasPermissionDeleteDate   = isset($hasPermissionDeleteDate) ? $hasPermissionDeleteDate : false;
$hasPermissionDeleteModule = isset($hasPermissionDeleteModule) ? $hasPermissionDeleteModule : false;
$hasPermissionDeleteUser   = isset($hasPermissionDeleteUser) ? $hasPermissionDeleteUser : false;

?>
<div class="panel panel-white">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo lang('activities_filter_head'); ?></h3>
    </div>
    <div class="panel-body">
        <?php echo form_open(SITE_AREA . "/reports/activities/{$vars['which']}", ''); ?>
        <div class="row">
            <div class="col-sm-6">
                <?php
                echo form_dropdown(
                    array(
                        'name'  => "{$vars['which']}_select",
                        'id'    => "{$vars['which']}_select",
                        'class' => 'form-control',
                    ),
                    $select_options,
                    $filter,
                    lang('activities_filter_head'),
                    '',
                    '<p class="help-block">' . sprintf(
                        lang('activities_filter_note'),
                        $vars['view_which'] == ucwords(lang('activities_date')) ? lang('activities_filter_from_before') : lang('activities_filter_only_for'),
                        strtolower($vars['view_which'])
                    ) . '</p>',
                    'sr-only',
                    ''
                );
                ?>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <?php
                    echo form_submit('filter', lang('activities_filter'), 'class="btn btn-primary"');
                    if ($vars['which'] == 'activity_own' && $hasPermissionDeleteOwn) :
                    ?>
                    <button type="submit" name="delete" class="btn btn-danger" id="delete-activity_own"><span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('activities_own_delete'); ?></button>
                    <?php elseif ($vars['which'] == 'activity_user' && $hasPermissionDeleteUser) : ?>
                    <button type="submit" name="delete" class="btn btn-danger" id="delete-activity_user"><span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('activities_user_delete'); ?></button>
                    <?php elseif ($vars['which'] == 'activity_module' && $hasPermissionDeleteModule) : ?>
                    <button type="submit" name="delete" class="btn btn-danger" id="delete-activity_module"><span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('activities_module_delete'); ?></button>
                    <?php elseif ($vars['which'] == 'activity_date' && $hasPermissionDeleteDate) : ?>
                    <button type="submit" name="delete" class="btn btn-danger" id="delete-activity_date"><span class="icon-trash icon-white"></span>&nbsp;<?php echo lang('activities_date_delete'); ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<div class="panel panel-white">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php echo sprintf(
                lang('activities_view'),
                $vars['view_which'] == ucwords(lang('activities_date')) ? sprintf(lang('activities_view_before'), $vars['view_which']) : $vars['view_which'],
                $vars['name']
            );?>
        </h3>
    </div>
    <div class="panel-body">
        <?php if (empty($activity_content)) : ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo lang('activities_not_found'); ?>
        </div>
        <?php else : ?>
        <div id="user_activities">
            <table class="table table-striped table-bordered" id="flex_table">
                <thead>
                    <tr>
                        <th><?php echo lang('activities_user'); ?></th>
                        <th><?php echo lang('activities_activity'); ?></th>
                        <th><?php echo lang('activities_module'); ?></th>
                        <th><?php echo lang('activities_when'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($activity_content as $activity) : ?>
                    <tr>
                        <td><span class="icon-user"></span>&nbsp;<?php e($activity->username); ?></td>
                        <td><?php echo $activity->activity; ?></td>
                        <td><?php echo $activity->module; ?></td>
                        <td><?php echo date('M j, Y g:i A', strtotime($activity->created)); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php echo $this->pagination->create_links();?>
    </div>
</div>
<?php
endif;
