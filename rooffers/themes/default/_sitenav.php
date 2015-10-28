<<<<<<< HEAD
<header id="big-detail">
<div id="innerhead">
    <nav class="topnav">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <a href="<?php echo site_url(); ?>" class="logo">Rooffers</a>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <ul class="nav nav-pills nav-pills-top pull-right">
                        <?php if (empty($current_user)) : ?>
                        <li><a href="javascript:void(0);"><i class="fa fa-thumb-tack fa-lg"></i>&nbsp;ShortListed</a></li>
                        <li><a href="javascript:void(0);">News</a></li>
                        <li><a href="<?php echo site_url(LOGIN_URL); ?>">Sign In</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-bars fa-lg"></i></a></li>
                        <?php else : ?>
                        <li><a href="javascript:void(0);"><i class="fa fa-thumb-tack fa-lg"></i>&nbsp;ShortListed</a></li>
                        <li><a href="javascript:void(0);">News</a></li>
                        <li <?php echo check_method('profile'); ?>><a href="<?php echo site_url('users/profile'); ?>"><?php e(lang('bf_user_settings')); ?></a></li>
                        <li><a href="<?php echo site_url('logout'); ?>"><?php e(lang('bf_action_logout')); ?></a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-bars fa-lg"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <ul class="nav nav-pills nav-pills-banner nav-justified">
            <li><a href="javascript:void(0);">Overview</a></li>
            <li><a href="javascript:void(0);">Configuration</a></li>
            <li><a href="javascript:void(0);">Payment Plans</a></li>
            <li><a href="javascript:void(0);">Project Amenities</a></li>
            <li><a href="javascript:void(0);">Cunstruction Updates</a></li>
            <li><a href="javascript:void(0);">Discussion</a></li>
        </ul>
    </div>
</div>
</header>
<?php //echo check_class('home');Output=Class="active" ?>
<?php //e(lang('bf_home'));Output=Home ?>
<?php //e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire'); ?>
<div class="masthead">
    <h3 class="muted"></h3>
</div>
<hr />
=======
<nav class="topnav">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                <a href="<?php echo site_url(); ?>" class="logo text-hide">Rooffers</a>
            </div>
            <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
                <ul class="nav nav-pills nav-pills-top pull-right">
                    <?php if (empty($current_user)) : ?>
                    <li class="hidden-xs"><a href="javascript:void(0);"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp;ShortListed</a></li>
                    <li class="hidden-xs"><a href="javascript:void(0);">News</a></li>
                    <li><a href="<?php echo site_url(LOGIN_URL); ?>">Sign In</a></li>
                    <li><a href="javascript:void(0);" id="aside-nav-btn"><i class="fa fa-bars fa-lg"></i></a></li>
                    <?php else : ?>
                    <li class="hidden-xs"><a href="javascript:void(0);"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp;ShortListed</a></li>
                    <li class="hidden-xs"><a href="javascript:void(0);">News</a></li>
                    <li class="hidden-xs" <?php echo check_method('profile'); ?>><a href="<?php echo site_url('users/profile'); ?>"><?php e(lang('bf_user_settings')); ?></a></li>
                    <li><a href="<?php echo site_url('logout'); ?>"><?php e(lang('bf_action_logout')); ?></a></li>
                    <li><a href="javascript:void(0);" id="aside-nav-btn"><i class="fa fa-bars fa-lg"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php //echo check_class('home');Output=Class="active" ?>
<?php //e(lang('bf_home'));Output=Home ?>
<?php //e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire'); ?>
>>>>>>> 4f07b939976780ea4b5f59d2ef8f4aec02b1fc0b
