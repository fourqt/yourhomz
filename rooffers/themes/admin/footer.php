	<div class="page-footer">
		<div class="container">
      	<p class="no-s">2015 &copy; Rooffers by 4qt. | Executed in {elapsed_time} seconds, using {memory_usage}.</p>
      </div>
   </div>
</div><!-- Page Inner -->
	</main><!-- Page Content -->
<nav class="cd-nav-container" id="cd-nav">
   <header>
       <h3>Navigation</h3>
       <a href="#0" class="cd-close-nav">Close</a>
   </header>
   <ul class="cd-nav list-unstyled">
		<li class="cd-selected" data-menu="index">
			<a href="javsacript:void(0);">
		   	<span><i class="glyphicon glyphicon-home"></i></span>
		      <p>Dashboard</p>
			</a>
		</li>
		<li data-menu="profile">
		  <a href="javsacript:void(0);">
		      <span>
		          <i class="glyphicon glyphicon-user"></i>
		      </span>
		      <p>Profile</p>
		  </a>
		</li>
		<li data-menu="inbox">
		  <a href="javsacript:void(0);">
		      <span>
		          <i class="glyphicon glyphicon-envelope"></i>
		      </span>
		      <p>Mailbox</p>
		  </a>
		</li>
		<li data-menu="#">
		  <a href="javsacript:void(0);">
		      <span>
		          <i class="glyphicon glyphicon-tasks"></i>
		      </span>
		      <p>Tasks</p>
		  </a>
		</li>
		<li data-menu="#">
		  <a href="javsacript:void(0);">
		      <span>
		          <i class="glyphicon glyphicon-cog"></i>
		      </span>
		      <p>Settings</p>
		  </a>
		</li>
		<li data-menu="calendar">
		  <a href="javsacript:void(0);">
		      <span>
		          <i class="glyphicon glyphicon-calendar"></i>
		      </span>
		      <p>Calendar</p>
		  </a>
		</li>
   </ul>
        </nav>
        <div class="cd-overlay"></div>
	<div id="debug"><!-- Stores the Profiler Results --></div>
   <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline 
   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
   <script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-2.1.4.min.js"><\/script>');</script>
   	<script>
	var js_base_url = '<?php echo base_url()?>';
	var csrf_token_name = $('input[name="csrf_token"]').val();
	</script>
	<?php echo Assets::js(); ?>
</body>
</html>