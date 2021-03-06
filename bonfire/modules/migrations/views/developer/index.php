<p><?php echo lang('migrations_intro'); ?></p>
<div class="panel panel-white">
<div class="panel-body">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#app-tab" data-toggle="tab"><?php echo lang('migrations_tab_app'); ?></a></li>
		<li><a href="#mod-tab" data-toggle="tab"><?php echo lang('migrations_tab_mod'); ?></a></li>
		<li><a href="#core-tab" data-toggle="tab"><?php echo lang('migrations_tab_core'); ?></a></li>
	</ul>
	<div class="tab-content">
		<!-- Application Migrations -->
		<div class="tab-pane active" id="app-tab">
            <h3 class="m-t-xs m-b-xs"><?php echo lang('migrations_app_migrations'); ?></h3>
            <hr class="m-t-xs">
            <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo sprintf(lang('migrations_installed_version'), $installed_version); ?> /
                    <?php echo sprintf(lang('migrations_latest_version'), $latest_version); ?>
                </div>
                <?php if (count($app_migrations)) : ?>
                <input type="hidden" name="core_only" value="0" />
                <div class="form-group">
                    <label class='col-sm-2 control-label' for='app_migration'><?php echo lang('migrations_choose_migration'); ?></label>
                    <div class="col-sm-10">
                        <select name="migration" id='app_migration' class="form-control">
                            <?php foreach ($app_migrations as $migration) :?>
                            <option value="<?php echo (int) substr($migration, 0, 3); ?>" <?php echo ((int) substr($migration, 0, 3) == $this->uri->segment(5)) ? 'selected="selected"' : ''; ?>><?php echo $migration; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="submit" name="migrate" class="btn btn-primary" value="<?php echo lang('migrations_migrate_button'); ?>" />
                    </div>
                </div>
                <?php
                    echo ' ' . lang('bf_or') . ' ' . anchor(SITE_AREA . '/developer/migrations', lang('bf_action_cancel'));
                else :
                ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo lang('migrations_no_migrations'); ?>
                </div>
                <?php endif; ?>
            <?php echo form_close(); ?>
		</div>
		<!-- Module Migrations -->
		<div id="mod-tab" class="tab-pane">
            <h3 class="m-t-xs m-b-xs"><?php echo lang('migrations_mod_migrations'); ?></h3>
            <hr class="m-t-xs">
            <?php if (isset($mod_migrations) && is_array($mod_migrations)) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="module-name"><?php e(lang('migrations_tbl_module')); ?></th>
                        <th class='version'><?php e(lang('migrations_tbl_installed_ver')); ?></th>
                        <th class='version'><?php e(lang('migrations_tbl_latest_ver')); ?></th>
                        <th class='migrate'><?php e(lang('migrations_migrate_module')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mod_migrations as $module => $migrations) : ?>
                    <tr>
                        <td><?php echo ucfirst($module); ?></td>
                        <td><?php echo $migrations['installed_version']; ?></td>
                        <td><?php echo $migrations['latest_version']; ?></td>
                        <td class='migrate'>
                            <?php echo form_open(site_url(SITE_AREA . "/developer/migrations/migrate_module/{$module}"), 'class="form-inline"'); ?>
                                <input type="hidden" name="is_module" value="1" />
                                <select name="version" class="form-control">
                                    <option value=""><?php echo lang('migrations_choose_migration'); ?></option>
                                    <option value="uninstall"><?php echo lang('migrations_uninstall'); ?></option>
                                    <?php
                                    foreach ($migrations as $migration) :
                                        if (is_array($migration)) :
                                            foreach ($migration as $filename) :
                                    ?>
                                    <option><?php echo $filename; ?></option>
                                    <?php
                                            endforeach;
                                        endif;
                                    endforeach;
                                    ?>
                                </select>
                                <input type="submit" name="migrate" class="btn btn-primary" value="<?php echo lang('migrations_migrate_module'); ?>" />
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else : ?>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo lang('migrations_no_migrations') ?>
            </div>
            <?php endif; ?>
		</div>
		<!-- Bonfire Migrations -->
		<div id="core-tab" class="tab-pane">
            <h3 class="m-t-xs m-b-xs"><?php echo lang('migrations_core_migrations'); ?></h3>
            <hr class="m-t-xs">
            <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo sprintf(lang('migrations_installed_version'), $core_installed_version); ?> /
                    <?php echo sprintf(lang('migrations_latest_version'), $core_latest_version); ?>
                </div>
                <input type="hidden" name="core_only" value="1" />
                <?php if (count($core_migrations)) : ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="migration"><?php echo lang('migrations_choose_migration'); ?></label>
                    <div class="col-sm-10">
						<select name="migration" id="migration" class="form-control">
                            <option value=""></option>
                            <?php foreach ($core_migrations as $migration) :?>
							<option value="<?php echo (int) substr($migration, 0, 3) ?>" <?php echo ((int)substr($migration, 0, 3) == $this->uri->segment(5)) ? 'selected="selected"' : '' ?>><?php echo $migration ?></option>
                            <?php endforeach; ?>
						</select>
					</div>
				</div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="submit" name="migrate" class="btn btn-primary" value="<?php echo lang('migrations_migrate_button'); ?>" />
                        <?php echo ' ' . lang('bf_or') . ' ' . anchor(SITE_AREA . '/developer/migrations', lang('bf_action_cancel')); ?>
                    </div>
                </div>
                <?php else: ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo lang('migrations_no_migrations'); ?>
                </div>
				<?php endif; ?>
            <?php echo form_close(); ?>
		</div>
	</div>
</div>
</div>