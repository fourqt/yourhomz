<?php
Assets::add_css(array('modern.min.css'));
Assets::add_js(array('pace.min.js','bootstrap.min.js'));

$inline  = '$(".dropdown-toggle").dropdown();';
$inline .= '$(".tooltips").tooltip();';
Assets::add_js($inline, 'inline');
?>
<!--front page header-->
<!doctype html>
<head>
    <meta charset="utf-8">
    <title><?php
        echo isset($page_title) ? "{$page_title} : " : '';
        e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire');
    ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php e(isset($meta_description) ? $meta_description : ''); ?>">
    <meta name="author" content="<?php e(isset($meta_author) ? $meta_author : ''); ?>">
    <?php
    /* Modernizr is loaded before CSS so CSS can utilize its features */
    echo Assets::js('modernizr-2.5.3.js');
    ?>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/pace-theme-flash.css"; ?>" />
    <link rel="stylesheet" href="<?php echo base_url()."style.php/_bootstrap.scss"; ?>" />
    <link rel="stylesheet" href="<?php echo base_url()."style.php/_psstyle.scss"; ?>" />
	<?php echo Assets::css(); ?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
</head>
<body class="<?php echo addModClass()?>">