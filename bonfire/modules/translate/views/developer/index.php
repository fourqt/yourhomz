<div class="panel panel-white">
<div class="panel-body">
    <?php echo form_open(current_url(), 'class="form-inline"'); ?>
    <div class="form-group">
        <label for='trans_lang'><?php e(lang('translate_current_lang')); ?></label>
        <select name="trans_lang" id="trans_lang" class="form-control">
            <?php foreach ($languages as $lang) : ?>
            <option value="<?php e($lang); ?>"<?php echo isset($trans_lang) && $trans_lang == $lang ? ' selected="selected"' : ''; ?>><?php e(ucfirst($lang)); ?></option>
            <?php endforeach; ?>
            <option value="other"><?php e(lang('translate_other')); ?></option>
        </select>
    </div>
    <div clas="form-group" id='new_lang_field' style='display: none;'>
        <label for='new_lang'><?php e(lang('translate_new_lang')); ?></label>
        <input type="text" name="new_lang" id="new_lang" class="form-control" value="<?php echo set_value('new_lang'); ?>" />
    </div>
    <input type="submit" name="select_lang" class="btn btn-small btn-primary" value="<?php e(lang('translate_select')); ?>" />
    <?php echo form_close(); ?>
</div>
</div>
<!-- Core -->
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo lang('translate_core'); ?> <small><?php echo count($lang_files) . ' ' . lang('bf_files'); ?></small></h3>
            </div>
            <div class="panel-body">
                <?php
                $linkUrl = site_url(SITE_AREA . "/developer/translate/edit/{$trans_lang}");
                $cnt = 1;
                $brk = 3;
                foreach ($lang_files as $file) :
                    if ($cnt == 1) :
                ?>
                <div class="p-v-xxs">
                    <?php
                    endif;
                    ++$cnt;
                    ?>
                    <a class='btn btn-info btn-rounded' href='<?php echo "{$linkUrl}/{$file}"; ?>'><?php e($file); ?></a>
                    <?php
                    if ($cnt > $brk) :
                    ?>
                </div>
                <?php
                        $cnt = 1;
                    endif;
                endforeach;
                if ($cnt != 1) :
                ?>
            </div>
        <?php endif; ?>
        </div>
        </div>
    </div>
<!-- Modules -->
    <div class="col-md-6">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo lang('translate_modules').((! empty($modules) && is_array($modules))?' <small>'.count($modules).' '.lang('bf_files').'</small>':''); ?></h3>
            </div>
            <div class="panel-body">
            <?php
            if (! empty($modules) && is_array($modules)) :
                $linkUrl = site_url(SITE_AREA . "/developer/translate/edit/{$trans_lang}");
                $cnt = 1;
                $brk = 3;
                foreach ($modules as $file) :
                    if ($cnt == 1) :
            ?>
            <div class="p-v-xxs">
                <?php
                    endif;
                    $cnt++;
                ?>
                <a class='btn btn-info btn-rounded' href="<?php echo "{$linkUrl}/{$file}"; ?>"><?php e($file); ?></a>
                <?php if ($cnt > $brk) : ?>
            </div>
            <?php
                        $cnt = 1;
                    endif;
                endforeach;
                if ($cnt != 1) :
                ?>
            </div>
            <?php
                endif;
            else :
            ?>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo lang('translate_no_modules'); ?>
            </div>
            <?php endif; ?>
        </div>
        </div>
    </div>
</div>