<header id="big-detail">
<div id="innerhead">
    <div class="container">
        <ul class="nav nav-pills nav-pills-banner nav-justified">
            <li><a href="javascript:void(0);">Overview</a></li>
            <li><a href="javascript:void(0);">Configuration</a></li>
            <li><a href="javascript:void(0);">Payment Plans</a></li>
            <li><a href="javascript:void(0);">Project Amenities</a></li>
            <li><a href="javascript:void(0);">Construction Updates</a></li>
            <li><a href="javascript:void(0);">Discussion</a></li>
        </ul>
    </div>
</div>
</header>
<section id="project-head">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9">
				<div class="row">
					<div class="col-lg-8 project-headline">
						<h2>Project Name</h2>
						<h4>by Project Group</h4>
						<p>Sr. No. 73A/1+2+75/2P, Near Manjri Stud Farm, Pune-Solapur Road, Pune</p>
					</div>
					<div class="col-lg-4">
						<h2>50.13 Lacs +</h2>
						<ul class="fa-ul">
							<li><span>&bull;</span>4.45k/sq.ft+</li>
							<li><span>&bull;</span>EMI starting 34.9 k</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 btn-right">
				<div class="btns">
				<a href="" class="btn btn-default btn-lg">
					<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
					ShortList
				</a>
				<a href="" class="btn btn-default btn-success btn-lg hidden-xs hidden-sm hidden-md">Book Via Floor Plan</a>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="jumbotron" text-align="center">
	<h1>Welcome to Detail</h1>

	<p class="lead">Kickstart your CodeIgniter applications and save yourself 100s of hours of development time.<br/>That means you make more money.</p>

	<?php if (isset($current_user->email)) : ?>
		<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-success">Go to the Admin area</a>
	<?php else :?>
		<a href="<?php echo site_url(LOGIN_URL); ?>" class="btn btn-large btn-primary"><?php echo lang('bf_action_login'); ?></a>
	<?php endif;?>

	<br/><br/><a href="<?php echo site_url('/docs') ?>" class="btn btn-large btn-info">Browse the Docs</a>
</div>

<hr />

<div class="row-fluid">

	<div class="span6">
		<h4>A Solid Base</h4>

		<p>Bonfire is based on <a href="http://ellislab.com/codeigniter" target="_blank">CodeIgniter <?php echo CI_VERSION; ?></a>, a proven PHP framework. In order to make the best use of it, you should be comfortable with CodeIgniter and its <a href="http://ellislab.com/codeigniter/user-guide/" target="_blank">documentation</a> first.</p>

		<p>We use Twitter's <a href="">Bootstrap</a> front-end framework and <a href="http://jquery.com/">jQuery</a> as the basis of the CSS and Javascript.</p>
	</div>

	<div class="span6">
		<h4>A Growing Community</h4>

		<p>Bonfire has an ever-growing <a href="http://forums.cibonfire.com">community</a> of users that are there to help you get unstuck, or make the best use of this powerful system.</p>

		<p>Bugs and feature discussion also happen on GitHub's <a href="https://github.com/ci-bonfire/Bonfire/issues?direction=desc&labels=0.7&sort=created&state=open">issue tracker</a>. This is the best place to report bugs and discuss new features.</p>
	</div>
</div>

<div class="row-fluid">

	<div class="span6">
		<h4>Built-in Flexibility</h4>

		<p>A <a href="https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc">modular system</a> that allows code re-use, and overriding core modules with custom modules.</p>

		<p>A <i>template system</i> that allows parent-child themes, and overriding controller views in the template.</p>

		<p><i>Role-Based Access Control</i> that provides as much fine-grained control as your modules need.</p>
	</div>

</div>