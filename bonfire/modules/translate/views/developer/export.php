<p><?php echo lang('translate_export_note'); ?></p>
<div class='panel panel-white'>
<div class="panel-body">
<?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
    <div class="form-group">
        <label for="export_lang" class="col-sm-2 control-label"><?php echo lang('translate_language'); ?></label>
        <div class="col-sm-10">
            <select name="export_lang" id="export_lang" class="form-control">
                <?php foreach ($languages as $lang) : ?>
                <option value="<?php e($lang); ?>" <?php echo isset($trans_lang) && $trans_lang == $lang ? 'selected="selected"' : '' ?>><?php e(ucfirst($lang)); ?></option>
                <?php endforeach; ?>
                <option value="other"><?php e(lang('translate_other')); ?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo lang('translate_include'); ?></label>
        <div class="col-sm-10">
            <label for="include_core" class="checkbox-inline">
                <input type="checkbox" id="include_core" name="include_core" value="1" checked="checked" />
                <?php echo lang('translate_include_core'); ?>
            </label>
            <label for="include_mods" class="checkbox-inline">
                <input type="checkbox" id="include_mods" name="include_mods" value="1" />
                <?php echo lang('translate_include_mods'); ?>
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input type="submit" name="export" class="btn btn-primary" value="<?php e(lang('translate_export_short')); ?>" />
        </div>
    </div>
<?php echo form_close(); ?>
</div>
</div>