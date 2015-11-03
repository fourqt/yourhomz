<h3 class="no-m m-b-xs"><?php echo lang('set_option_developer'); ?></h3>
<hr class="m-t-xs">
    <label class="checkbox-inline" for="show_profiler">
        <input type="checkbox" name="show_profiler" id="show_profiler" value="1" <?php echo set_checkbox('auth.use_extended_profile', 1, isset($settings['site.show_profiler']) && $settings['site.show_profiler'] == 1); ?> />
        <?php echo lang('bf_show_profiler'); ?>
    </label>
    <label class="checkbox-inline" for="show_front_profiler">
        <input type="checkbox" name="show_front_profiler" id="show_front_profiler" value="1" <?php echo set_checkbox('site.show_front_profiler', 1, isset($settings['site.show_front_profiler']) && $settings['site.show_front_profiler'] == 1); ?> />
        <?php echo lang('bf_show_front_profiler'); ?>
    </label>