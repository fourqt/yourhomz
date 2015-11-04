<div class='admin-box'>
    <fieldset>
        <legend><?php echo lang('emailer_test_result_header'); ?></legend>
    </fieldset>
    <?php if ($success !== false) : ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo lang('emailer_test_success'); ?>
    </div>
    <?php else : ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo lang('emailer_test_error'); ?>
    </div>
    <?php endif; ?>
    <fieldset>
        <legend><?php echo lang('emailer_test_debug_header'); ?></legend>
        <div style="padding:10px;"><?php echo $debug; ?></div>
    </fieldset>
</div>