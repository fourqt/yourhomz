<h3 class="no-m m-b-xs"><?php echo lang('bf_site_information'); ?></h3>
<hr class="m-t-xs">
    <div class="form-group<?php echo form_error('title') ? $errorClass : ''; ?>">
        <label class="col-sm-2 control-label" for="title"><?php echo lang('bf_site_name'); ?></label>
        <div class="col-sm-10">
            <input type="text" name="title" id="title" class="form-control" value="<?php echo set_value('site.title', isset($settings['site.title']) ? $settings['site.title'] : ''); ?>" />
            <p class='help-block'><?php echo form_error('title'); ?></p>
        </div>
    </div>
    <div class="form-group<?php echo form_error('system_email') ? $errorClass : ''; ?>">
        <label class="col-sm-2 control-label" for="system_email"><?php echo lang('bf_site_email'); ?></label>
        <div class="col-sm-10">
            <input type="text" name="system_email" id="system_email" class="form-control" value="<?php echo set_value('site.system_email', isset($settings['site.system_email']) ? $settings['site.system_email'] : ''); ?>" />
            <span class="help-inline"><?php echo lang('bf_site_email_help'); ?></p>
        </div>
    </div>
    <div class="form-group<?php echo form_error('status') ? $errorClass : ''; ?>">
        <label class="col-sm-2 control-label" for="status"><?php echo (form_error('system_email') ? form_error('system_email') . '<br />' : '') . lang('bf_site_status'); ?></label>
        <div class="col-sm-10">
            <select name="status" id="status" class="form-control">
                <option value="1" <?php echo set_select('site.status', 1, isset($settings['site.status']) && $settings['site.status'] == 1); ?>><?php echo lang('bf_online'); ?></option>
                <option value="0" <?php echo set_select('site.status', 0, isset($settings['site.status']) && $settings['site.status'] == 0); ?>><?php echo lang('bf_offline'); ?></option>
            </select>
            <p class='help-block'><?php echo form_error('status'); ?></p>
        </div>
    </div>
    <div class="form-group<?php echo form_error('offline_reason') ? $errorClass : ''; ?>"<?php echo isset($settings['site.status']) && $settings['site.status'] == 1 ? ' style="display:none"' : ''; ?>>
        <label class="col-sm-2 control-label" for="offline_reason"><?php echo lang('settings_offline_reason'); ?></label>
        <div class="col-sm-10">
            <textarea id="offline_reason" name="offline_reason" cols="60" rows="5" class="form-control"><?php echo isset($settings['site.offline_reason']) ? $settings['site.offline_reason'] : ''; ?></textarea>
            <p class='help-block'><?php echo form_error('offline_reason'); ?></p>
        </div>
    </div>
    <div class="form-group<?php echo form_error('list_limit') ? $errorClass : ''; ?>">
        <label class="col-sm-2 control-label" for="list_limit"><?php echo lang('bf_top_number'); ?></label>
        <div class="col-sm-10">
            <input type="text" name="list_limit" id="list_limit" value="<?php echo set_value('list_limit', isset($settings['site.list_limit']) ? $settings['site.list_limit'] : ''); ?>" class="form-control" />
            <span class="help-inline"><?php echo (form_error('list_limit') ? form_error('list_limit') . '<br />' : '') . lang('bf_top_number_help'); ?></p>
        </div>
    </div>
    <div class="form-group<?php echo form_error('languages') ? $errorClass : ''; ?>">
        <label class="col-sm-2 control-label" for="languages"><?php echo lang('bf_language'); ?></label>
        <div class="col-sm-10">
            <select name="languages[]" id="languages" multiple="multiple" class="form-control">
                <?php
                if (! empty($languages) && is_array($languages)) :
                    foreach ($languages as $language) :
                        $selected = in_array($language, $selected_languages);
                ?>
                <option value="<?php e($language); ?>" <?php echo set_select('languages', $language, $selected); ?>><?php e(ucfirst($language)); ?></option>
                <?php
                    endforeach;
                endif;
                ?>
            </select>
            <span class="help-inline"><?php echo (form_error('languages') ? form_error('languages') . '<br />' : '') . lang('bf_language_help'); ?></p>
        </div>
    </div>