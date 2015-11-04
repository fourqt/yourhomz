<div class="alert alert-info">
    <b><?php e(lang('database_sql_query')); ?>:</b><br><?php e($query); ?>
</div>
<?php if (empty($num_rows) || empty($rows) || ! is_array($rows)) : ?>
<div class="alert alert-warning">
    <?php e(lang('database_no_rows')); ?>
</div>
<?php else : ?>
<div class="panel panel-white">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo e(sprintf(lang('database_total_results'), $num_rows)); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <?php foreach ($rows[0] as $field => $value) : ?>
                    <th><?php e($field); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                <tr>
                    <?php foreach ($row as $key => $value) : ?>
                    <td><?php e($value); ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
endif;
