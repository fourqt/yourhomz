<div class="panel panel-white">
    <div class="panel-body">
        <?php echo form_open(SITE_AREA . '/settings/emailer', 'class="form-horizontal"'); ?>
            <h3 class="no-m"><?php echo lang('emailer_general_settings'); ?></h3>
            <hr class="m-t-xs">
            <div class="form-group<?php echo form_error('sender_email') ? ' error' : ''; ?>">
                <label class="col-sm-2 control-label" for="sender_email"><?php echo lang('emailer_system_email'); ?></label>
                <div class="col-sm-10">
                    <input type="email" name="sender_email" id="sender_email" class="form-control" value="<?php echo set_value('sender_email', $sender_email); ?>" />
                    <span class='help-inline'><?php echo form_error('sender_email'); ?></span>
                    <p class="help-block"><?php echo lang('emailer_system_email_note'); ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="mailtype"><?php echo lang('emailer_email_type'); ?></label>
                <div class="col-sm-10">
                    <select name="mailtype" id="mailtype" class="form-control">
                        <option value="text" <?php echo set_select('mailtype', 'text', $mailtype == 'text'); ?>><?php echo lang('emailer_mailtype_text'); ?></option>
                        <option value="html" <?php echo set_select('mailtype', 'html', $mailtype == 'html'); ?>><?php echo lang('emailer_mailtype_html'); ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group<?php echo form_error('protocol') ? ' error' : ''; ?>">
                <label class="col-sm-2 control-label" for="server_type"><?php echo lang('emailer_email_server'); ?></label>
                <div class="col-sm-10">
                    <select name="protocol" id="server_type" class="form-control">
                        <option value='mail' <?php echo set_select('protocol', 'mail', $protocol == 'mail'); ?>><?php echo lang('emailer_protocol_mail'); ?></option>
                        <option value='sendmail' <?php echo set_select('protocol', 'sendmail', $protocol == 'sendmail'); ?>><?php echo lang('emailer_protocol_sendmail'); ?></option>
                        <option value='smtp' <?php echo set_select('protocol', 'smtp', $protocol == 'smtp'); ?>><?php echo lang('emailer_protocol_smtp'); ?></option>
                    </select>
                    <p class="help-block"><?php echo form_error('protocol'); ?></p>
                </div>
            </div>
            <h3 class="no-m m-t-lg"><?php echo lang('emailer_settings'); ?></h3>
            <hr class="m-t-xs">
            <?php /* PHP Mail */ ?>
            <div class="alert alert-success" role="alert"><?php echo lang('emailer_settings_note'); ?></div>
                <?php /* Sendmail */ ?>
                <div id="sendmail" class='subsection'>
                    <div class="form-group<?php echo form_error('mailpath') ? ' error' : ''; ?>">
                        <label class="control-label col-sm-2" for="mailpath"><?php echo lang('emailer_sendmail_path'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="mailpath" id="mailpath" class="form-control" value="<?php echo set_value('mailpath', $mailpath) ?>" />
                            <p class="help-block"><?php echo form_error('mailpath'); ?></p>
                        </div>
                    </div>
                </div>
                <?php /* SMTP */ ?>
                <div id="smtp" class='subsection'>
                    <div class="form-group<?php echo form_error('smtp_host') ? ' error' : ''; ?>">
                        <label class="control-label col-sm-2" for="smtp_host"><?php echo lang('emailer_smtp_address'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="smtp_host" id="smtp_host" class="form-control" value="<?php echo set_value('smtp_host', $smtp_host) ?>" />
                            <p class="help-block"><?php echo form_error('smtp_host'); ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="smtp_user"><?php echo lang('emailer_smtp_username'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="smtp_user" id="smtp_user" class="form-control" value="<?php echo set_value('smtp_user', $smtp_user) ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="smtp_pass"><?php echo lang('emailer_smtp_password'); ?></label>
                        <div class="col-sm-10">
                            <input type="password" name="smtp_pass" id="smtp_pass" class="form-control" value="<?php echo set_value('smtp_pass', $smtp_pass) ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="smtp_port"><?php echo lang('emailer_smtp_port'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="smtp_port" id="smtp_port" class="form-control" value="<?php echo set_value('smtp_port', $smtp_port) ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="smtp_timeout"><?php echo lang('emailer_smtp_timeout_secs'); ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="smtp_timeout" id="smtp_timeout" class="form-control" value="<?php echo set_value('smtp_timeout', $smtp_timeout) ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="submit" name="save" class="btn btn-primary" value="<?php e(lang('emailer_save_settings')); ?>" />
                    </div>
                </div>
        <?php echo form_close(); ?>
    </div>
</div>
<?php /* Test Settings */ ?>
<div class="panel panel-white">
    <div class="panel-body">
        <h3 class="no-m"><?php echo lang('emailer_test_header'); ?></h3>
        <hr class="m-t-xs">
        <?php echo form_open(SITE_AREA . '/settings/emailer/test', array('class' => 'form-horizontal', 'id'=>'test-form')); ?>
            <?php //echo lang('emailer_test_settings') ?>
            <div class="alert alert-success" role="alert"><?php echo lang('emailer_test_intro'); ?></div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="test-email"><?php echo lang('bf_email'); ?></label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="test-email" class="form-control" value="<?php echo set_value('test_email', settings_item('site.system_email')); ?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input type="submit" name="test" class="btn btn-primary" value="<?php echo lang('emailer_test_button'); ?>" />
                </div>
            </div>
        <?php echo form_close(); ?>
        <div id="test-ajax"></div>
    </div>
</div>