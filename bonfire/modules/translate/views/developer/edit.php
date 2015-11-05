<div class="panel panel-default">
<?php
if (! empty($orig) && is_array($orig)) :
echo form_open(current_url(), 'class="form-horizontal" id="translate_form"');
?>
<input type="hidden" name="trans_lang" value="<?php e($trans_lang); ?>" />
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo lang('translate_file'); ?>: <?php echo $lang_file; ?></h3>
        <?php if (count($orig) > 30) : ?>
        <div class="panel-control">
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Go to Bottom" class="gobottom"><i class="fa fa-arrow-circle-o-down fa-lg"></i></a>
        </div>
        <?php endif; ?>
    </div>
    <div class="panel-body">
        <table class='table'>
            <thead>
                <tr>
                    <th class='column-check'><input class='check-all' type='checkbox' /></th>
                    <th class='text-right'><?php echo ucwords($orig_lang); ?></th>
                    <th><?php echo ucwords($trans_lang); ?></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan='3'>
                        <?php
                        if ($orig_lang != $trans_lang) :
                            echo lang('bf_with_selected');
                        ?>
                        <input type="submit" name="translate" class="btn translate-sel" value="<?php echo lang('translate_translate'); ?>" />
                        <?php
                        endif;
                        ?>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($orig as $key => $val) : ?>
                <tr>
                    <td class='column-check'><input type='checkbox' name='checked[]' value="<?php echo $key; ?>" <?php echo in_array($key, $chkd) ? "checked='checked' " : ''; ?>/></td>
                    <td><label class="control-label" for="lang<?php echo $key; ?>"><?php e($val); ?></label></td>
                    <td>
                        <?php if (strlen($val) < 80) : ?>
                        <input type="text" class="form-control" name="lang[<?php echo $key; ?>]" id="lang<?php echo $key; ?>" value="<?php e(isset($new[$key]) ? $new[$key] : ''); ?>" />
                        <?php else : ?>
                        <textarea class="form-control" name="lang[<?php echo $key; ?>]" id="lang<?php echo $key; ?>"><?php e(isset($new[$key]) ? $new[$key] : ''); ?></textarea>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <fieldset class="form-actions">
            
        </fieldset>
    </div>
    <div class="panel-footer">
        <input type="submit" name="save" class="btn btn-primary" value="<?php e(lang('bf_action_save')); ?>" />
        &nbsp;&nbsp;&nbsp;<?php e(lang('bf_or')); ?>&nbsp;&nbsp;&nbsp;
        <a href="<?php echo site_url(SITE_AREA . '/developer/translate/index') . '/'; e($trans_lang); ?>"><?php e(lang('bf_action_cancel')); ?></a>
    <?php
        if (count($orig) > 30) :
    ?>
        <div class="panel-control">
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Go to Bottom" class="gotop"><i class="fa fa-arrow-circle-o-up fa-lg"></i></a>
        </div>
    <?php endif; ?>
    </div>
<?php
echo form_close();
endif;
?>
</div>