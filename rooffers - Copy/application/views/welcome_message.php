<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <!--StyleSheets-->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/pace-master/themes/blue/pace-theme-flash.css"; ?>"/>
	<link rel="stylesheet" href="<?php echo base_url()."style.php/_bootstrap.scss"; ?>" />
	<link rel="stylesheet" href="<?php echo base_url()."assets/plugins/fontawesome/css/font-awesome.min.css"; ?>" />
    
</head>
<body>
<header>
<div class="container">header section</div>
</header>
<div class="base">
<div class="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>
<div class="row">
<div class="col-lg-6">1</div>
<div class="col-lg-6">1</div>
</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</div>
<script src="<?php echo base_url()."assets/js/jQuery-1.10.2.js"; ?>"></script>
<script src="<?php echo base_url()."assets/js/bootstrap.js"; ?>"></script>
<script src="<?php echo base_url()."assets/plugins/pace-master/pace.min.js";?>"></script>
</body>
</html>