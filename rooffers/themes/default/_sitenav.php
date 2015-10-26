<nav class="topnav">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                <a href="<?php echo site_url(); ?>" class="logo">Rooffers</a>
            </div>
            <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
                <ul class="nav nav-pills nav-pills-top pull-right">
                    <?php if (empty($current_user)) : ?>
                    <li class="hidden-xs"><a href="javascript:void(0);"><i class="fa fa-thumb-tack fa-lg"></i>&nbsp;ShortListed</a></li>
                    <li class="hidden-xs"><a href="javascript:void(0);">News</a></li>
                    <li><a href="<?php echo site_url(LOGIN_URL); ?>">Sign In</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-bars fa-lg"></i></a></li>
                    <?php else : ?>
                    <li class="hidden-xs"><a href="javascript:void(0);"><i class="fa fa-thumb-tack fa-lg"></i>&nbsp;ShortListed</a></li>
                    <li class="hidden-xs"><a href="javascript:void(0);">News</a></li>
                    <li class="hidden-xs" <?php echo check_method('profile'); ?>><a href="<?php echo site_url('users/profile'); ?>"><?php e(lang('bf_user_settings')); ?></a></li>
                    <li><a href="<?php echo site_url('logout'); ?>"><?php e(lang('bf_action_logout')); ?></a></li>
                    <li><a href="javascript:void(0);" onClick="$(body).toggleClass('sidenav');"><i class="fa fa-bars fa-lg"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php //echo check_class('home');Output=Class="active" ?>
<?php //e(lang('bf_home'));Output=Home ?>
<?php //e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire'); ?>