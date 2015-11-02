<?php

$roleCount = array();
foreach ($role_counts as $r) {
    $roleCount[$r->role_name] = $r->count;
}

?>
<div class="panel panel-white">
	<div class="panel-heading">
		<h3 class="panel-title"><?php e(lang('role_intro')); ?></h3>
	</div>
	<div class="panel-body">
    <?php if (isset($role_counts) && is_array($role_counts) && count($role_counts)) : ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th class='type'><?php echo lang('role_account_type'); ?></th>
				<th class="text-center users"># <?php echo lang('bf_users'); ?></th>
				<th><?php echo lang('role_description'); ?></th>
			</tr>
		</thead>
		<tbody>
            <?php foreach ($roles as $role) : ?>
			<tr>
				<td><?php echo anchor(SITE_AREA . "/settings/roles/edit/{$role->role_id}", $role->role_name); ?></td>
				<td class='text-center'><?php echo isset($roleCount[$role->role_name]) ? $roleCount[$role->role_name] : 0; ?></td>
				<td><?php e($role->description); ?></td>
			</tr>
    		<?php endforeach; ?>
		</tbody>
	</table>
    <?php else : ?>
    <p><?php echo lang('role_no_roles'); ?></p>
    <?php endif; ?>
    </div>
</div>