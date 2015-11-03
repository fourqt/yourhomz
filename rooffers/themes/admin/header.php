<?php

Assets::add_css(array('pace-theme-flash.css','uniform.default.css','bootstrap.css','font-awesome.css','simple-line-icons.css', 'switchery.min.css','boldnavigation.css','slidepushmenu.css','datepicker3.css','colorpicker.css','bootstrap-tagsinput.css','bootstrap-timepicker.min.css','modern.css'));
Assets::add_js(array('jquery-ui.min.js','pace.min.js','jquery.blockui.js','jquery.slimscroll.min.js','switchery.min.js','jquery.uniform.min.js','bootstrap.min.js','classie.js','navmain.js','bootstrap-datepicker.js','bootstrap-colorpicker.js','bootstrap-tagsinput.min.js','bootstrap-timepicker.min.js','modern.js','form-elements.js','plugins/jquery-validation/jquery.validate.min.js','jwerty.js','plugins/jquery-validation/jquery.validate.min.js'));

if (isset($shortcut_data) && is_array($shortcut_data['shortcut_keys'])) {
    Assets::add_js($this->load->view('ui/shortcut_keys', $shortcut_data, true), 'inline');
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php
        echo isset($toolbar_title) ? "{$toolbar_title} : " : '';
        e($this->settings_lib->item('site.title'));
    ?></title>
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta name="robots" content="noindex" />
    <?php
    /* Modernizr is loaded before CSS so CSS can utilize its features */
    ?>
	<script src="<?php echo Template::theme_url('js/modernizr.js'); ?>"></script>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url()."style.php/_psstyle.scss"; ?>" />
	<?php echo Assets::css(null, true); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="desktop page-header-fixed compact-menu page-horizontal-bar">
    <!--[if lt IE 7]>
    <p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or
    <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p>
    <![endif]-->
	<noscript>
		<p>Javascript is required to use Rooffer's admin.</p>
	</noscript>
    <div class="overlay"></div>
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
        <h3><span class="pull-left">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
        <div class="slimscroll">
            <a href="javascript:void(0);" class="showRight2"><img src="<?=base_url();?>assets/images/avatar2.png" alt=""><span>Sandra smith<small>Hi! How're you?</small></span></a>
            <a href="javascript:void(0);" class="showRight2"><img src="<?=base_url();?>assets/images/avatar3.png" alt=""><span>Amily Lee<small>Hi! How're you?</small></span></a>
            <a href="javascript:void(0);" class="showRight2"><img src="<?=base_url();?>assets/images/avatar4.png" alt=""><span>Christopher Palmer<small>Hi! How're you?</small></span></a>
            <a href="javascript:void(0);" class="showRight2"><img src="<?=base_url();?>assets/images/avatar5.png" alt=""><span>Nick Doe<small>Hi! How're you?</small></span></a>
            <a href="javascript:void(0);" class="showRight2"><img src="<?=base_url();?>assets/images/avatar2.png" alt=""><span>Sandra smith<small>Hi! How're you?</small></span></a>
            <a href="javascript:void(0);" class="showRight2"><img src="<?=base_url();?>assets/images/avatar3.png" alt=""><span>Amily Lee<small>Hi! How're you?</small></span></a>
            <a href="javascript:void(0);" class="showRight2"><img src="<?=base_url();?>assets/images/avatar4.png" alt=""><span>Christopher Palmer<small>Hi! How're you?</small></span></a>
            <a href="javascript:void(0);" class="showRight2"><img src="<?=base_url();?>assets/images/avatar5.png" alt=""><span>Nick Doe<small>Hi! How're you?</small></span></a>
        </div>
    </nav>
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
        <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
        <div class="slimscroll chat">
            <div class="chat-item chat-item-left">
                <div class="chat-image">
                    <img src="<?=base_url();?>assets/images/avatar2.png" alt="">
                </div>
                <div class="chat-message">
                    Hi There!
                </div>
            </div>
            <div class="chat-item chat-item-right">
                <div class="chat-message">
                    Hi! How are you?
                </div>
            </div>
            <div class="chat-item chat-item-left">
                <div class="chat-image">
                    <img src="<?=base_url();?>assets/images/avatar2.png" alt="">
                </div>
                <div class="chat-message">
                    Fine! do you like my project?
                </div>
            </div>
            <div class="chat-item chat-item-right">
                <div class="chat-message">
                    Yes, It's clean and creative, good job!
                </div>
            </div>
            <div class="chat-item chat-item-left">
                <div class="chat-image">
                    <img src="<?=base_url();?>assets/images/avatar2.png" alt="">
                </div>
                <div class="chat-message">
                    Thanks, I tried!
                </div>
            </div>
            <div class="chat-item chat-item-right">
                <div class="chat-message">
                    Good luck with your sales!
                </div>
            </div>
        </div>
        <div class="chat-write">
            <form class="form-horizontal" action="javascript:void(0);">
                <input type="text" class="form-control" placeholder="Say something">
            </form>
        </div>
    </nav>
    <form class="search-form" action="#" method="GET">
        <div class="input-group">
            <input type="text" name="search" class="form-control search-input" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default close-search " type="button"><i class="fa fa-times"></i></button>
            </span>
        </div><!-- Input Group -->
    </form><!-- Search Form -->
    <main class="page-content content-wrap">
        <div class="navbar">
            <div class="navbar-inner container">
                <div class="sidebar-pusher">
                    <a href="javascript:void(0);" class=" push-sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="logo-box">
                    <?php echo anchor('/', '<span>'.html_escape($this->settings_lib->item('site.title')).'</span>', 'class="logo-text"'); ?>
                </div><!-- Logo Box -->
                <div class="search-button">
                    <a href="javascript:void(0);" class=" show-search"><i class="fa fa-search"></i></a>
                </div>
                <div class="topmenu-outer">
                    <div class="top-menu">
                        <ul class="nav navbar-nav navbar-left">
                            <li>        
                                <a href="javascript:void(0);" class=" sidebar-toggle"><i class="fa fa-bars"></i></a>
                            </li>
                            <li>
                                <a href="#cd-nav" class=" cd-nav-trigger"><i class="fa fa-diamond"></i></a>
                            </li>
                            <li>        
                                <a href="javascript:void(0);" class=" toggle-fullscreen"><i class="fa fa-expand"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                                    <i class="fa fa-cogs"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-md dropdown-list theme-settings" role="menu">
                                    <li class="li-group">
                                        <ul class="list-unstyled">
                                            <li class="no-link" role="presentation">
                                                Fixed Header 
                                                <div class="ios-switch pull-right switch-md">
                                                    <input type="checkbox" class="js-switch pull-right fixed-header-check" checked>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="li-group">
                                        <ul class="list-unstyled">
                                            <li class="no-link" role="presentation">
                                                Fixed Sidebar 
                                                <div class="ios-switch pull-right switch-md">
                                                    <input type="checkbox" class="js-switch pull-right fixed-sidebar-check">
                                                </div>
                                            </li>
                                            <li class="no-link" role="presentation">
                                                Toggle Sidebar 
                                                <div class="ios-switch pull-right switch-md">
                                                    <input type="checkbox" class="js-switch pull-right toggle-sidebar-check">
                                                </div>
                                            </li>
                                            <li class="no-link" role="presentation">
                                                Compact Menu 
                                                <div class="ios-switch pull-right switch-md">
                                                    <input type="checkbox" class="js-switch pull-right compact-menu-check" checked>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="no-link"><button class="btn btn-default reset-options">Reset Options</button></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>    
                                <a href="javascript:void(0);" class=" show-search"><i class="fa fa-search"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-primary pull-right">4</span></a>
                                <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                    <li><p class="drop-title">You have 4 new  messages !</p></li>
                                    <li class="dropdown-menu-list slimscroll messages">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#">
                                                    <div class="msg-img"><div class="online on"></div><img class="img-circle" src="<?=base_url();?>assets/images/avatar2.png" alt=""></div>
                                                    <p class="msg-name">Sandra Smith</p>
                                                    <p class="msg-text">Hey ! I'm working on your project</p>
                                                    <p class="msg-time">3 minutes ago</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="msg-img"><div class="online off"></div><img class="img-circle" src="<?=base_url();?>assets/images/avatar4.png" alt=""></div>
                                                    <p class="msg-name">Amily Lee</p>
                                                    <p class="msg-text">Hi David !</p>
                                                    <p class="msg-time">8 minutes ago</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="msg-img"><div class="online off"></div><img class="img-circle" src="<?=base_url();?>assets/images/avatar3.png" alt=""></div>
                                                    <p class="msg-name">Christopher Palmer</p>
                                                    <p class="msg-text">See you soon !</p>
                                                    <p class="msg-time">56 minutes ago</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="msg-img"><div class="online on"></div><img class="img-circle" src="<?=base_url();?>assets/images/avatar5.png" alt=""></div>
                                                    <p class="msg-name">Nick Doe</p>
                                                    <p class="msg-text">Nice to meet you</p>
                                                    <p class="msg-time">2 hours ago</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="msg-img"><div class="online on"></div><img class="img-circle" src="<?=base_url();?>assets/images/avatar2.png" alt=""></div>
                                                    <p class="msg-name">Sandra Smith</p>
                                                    <p class="msg-text">Hey ! I'm working on your project</p>
                                                    <p class="msg-time">5 hours ago</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="msg-img"><div class="online off"></div><img class="img-circle" src="<?=base_url();?>assets/images/avatar4.png" alt=""></div>
                                                    <p class="msg-name">Amily Lee</p>
                                                    <p class="msg-text">Hi David !</p>
                                                    <p class="msg-time">9 hours ago</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="drop-all"><a href="#" class="text-center">All Messages</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-primary pull-right">3</span></a>
                                <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                    <li><p class="drop-title">You have 3 pending tasks !</p></li>
                                    <li class="dropdown-menu-list slimscroll tasks">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#">
                                                    <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                                    <span class="badge badge-roundless badge-default pull-right">1min ago</span>
                                                    <p class="task-details">New user registered.</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="task-icon badge badge-danger"><i class="icon-energy"></i></div>
                                                    <span class="badge badge-roundless badge-default pull-right">24min ago</span>
                                                    <p class="task-details">Database error.</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="task-icon badge badge-info"><i class="icon-heart"></i></div>
                                                    <span class="badge badge-roundless badge-default pull-right">1h ago</span>
                                                    <p class="task-details">Reached 24k likes</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <?php
                                $userDisplayName = isset($current_user->display_name) && ! empty($current_user->display_name) ? $current_user->display_name : ($this->settings_lib->item('auth.use_usernames') ? $current_user->username : $current_user->email);
                                ?>
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                                    <span class="user-name"><?php echo $userDisplayName; ?><i class="fa fa-angle-down"></i></span>
                                    <?php echo gravatar_link($current_user->email, 40, null, $userDisplayName, 'img-circle avatar'); ?>
                                </a>
                                <ul class="dropdown-menu dropdown-list" role="menu">
                                    <li><a href="<?php echo site_url(SITE_AREA . '/settings/users/edit'); ?>"><i class="fa fa-user"></i><?php echo lang('bf_user_settings'); ?></a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock screen</a></li>
                                    <li><a href="<?php echo site_url('logout'); ?>"><i class="fa fa-sign-out m-r-xs"></i><?php echo lang('bf_action_logout'); ?></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="" id="showRight">
                                    <i class="fa fa-comments"></i>
                                </a>
                            </li>
                        </ul><!-- Nav -->
                    </div><!-- Top Menu -->
                </div>
            </div>
        </div><!-- Navbar -->
        <div class="page-sidebar sidebar horizontal-bar">
            <div class="page-sidebar-inner">
                <ul class="menu accordion-menu">
                    <li class="nav-heading"><span>Navigation</span></li>
                    <li><a href="index.html"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                    <li><a href="profile.html"><span class="menu-icon icon-user"></span><p>Profile</p></a></li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-envelope-open"></span><p>Mailbox</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="inbox.html">Inbox</a></li>
                            <li><a href="message-view.html">View Message</a></li>
                            <li><a href="compose.html">Compose</a></li>
                        </ul>
                    </li>
                    <li class="nav-heading"><span>Features</span></li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-briefcase"></span><p>UI Kits</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="ui-alerts.html">Alerts</a></li>
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-icons.html">Icons</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-notifications.html">Notifications</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>
                            <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="ui-modals.html">Modals</a></li>
                            <li><a href="ui-panels.html">Panels</a></li>
                            <li><a href="ui-progress.html">Progress Bars</a></li>
                            <li><a href="ui-sliders.html">Sliders</a></li>
                            <li><a href="ui-nestable.html">Nestable</a></li>
                            <li><a href="ui-tree-view.html">Tree View</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-layers"></span><p>Layouts</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="layout-blank.html">Blank Page</a></li>
                            <li><a href="layout-fixed-sidebar.html">Fixed Menu</a></li>
                            <li><a href="layout-static-header.html">Static Header</a></li>
                            <li><a href="layout-collapsed-sidebar.html">Collapsed Sidebar</a></li>
                            <li><a href="layout-large-menu.html">Large Menu</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-grid"></span><p>Tables</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="table-static.html">Static Tables</a></li>
                            <li><a href="table-responsive.html">Responsive Tables</a></li>
                            <li><a href="table-data.html">Data Tables</a></li>
                        </ul>
                    </li>
                    <li class="droplink active open"><a href="#"><span class="menu-icon icon-note"></span><p>Forms</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li class="active"><a href="form-elements.html">Form Elements</a></li>
                            <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-upload.html">File Upload</a></li>
                            <li><a href="form-image-crop.html">Image Crop</a></li>
                            <li><a href="form-image-zoom.html">Image Zoom</a></li>
                            <li><a href="form-select2.html">Select2</a></li>
                            <li><a href="form-x-editable.html">X-editable</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-bar-chart"></span><p>Charts</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="charts-sparkline.html">Sparkline</a></li>
                            <li><a href="charts-rickshaw.html">Rickshaw</a></li>
                            <li><a href="charts-morris.html">Morris</a></li>
                            <li><a href="charts-flotchart.html">Flotchart</a></li>
                            <li><a href="charts-chartjs.html">Chart.js</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-user"></span><p>Login</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="login.html">Login Form</a></li>
                            <li><a href="login-alt.html">Login Alt</a></li>
                            <li><a href="register.html">Register Form</a></li>
                            <li><a href="register-alt.html">Register Alt</a></li>
                            <li><a href="forgot.html">Forgot Password</a></li>
                            <li><a href="lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-pointer"></span><p>Maps</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="maps-google.html">Google Maps</a></li>
                            <li><a href="maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-present"></span><p>Extra</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="500.html">500 Page</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="todo.html">Todo</a></li>
                            <li><a href="pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="search.html">Search Results</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-folder"></span><p>Levels</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li class="droplink"><a href="#"><p>Level 1.1</p><span class="arrow"></span></a>
                                <ul class="sub-menu">
                                    <li class="droplink"><a href="#"><p>Level 2.1</p><span class="arrow"></span></a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Level 3.1</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Level 2.2</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Level 1.2</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- Page Sidebar Inner -->
        </div><!-- Page Sidebar -->
        <div class="page-inner">
            <div class="container">
                <?php echo Contexts::render_menu('text', 'normal'); ?>
            </div>
            <div class="page-breadcrumb">
                <div class="container">
                    <?php Template::block('sub_nav', ''); ?>
                </div>
            </div>
            <div class="page-title">
                <div class="container">
                    <?php if (isset($toolbar_title)) : ?>
                    <h3><?php echo $toolbar_title; ?></h3>
                    <?php endif; ?>
                </div>
            </div>