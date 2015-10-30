<?php

Assets::add_js(array(
					'bootstrap.min.js', 
					'jwerty.js',
					'/plugins/3d-bold-navigation/js/main.js',
					'/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js',
            		'/plugins/jquery-validation/jquery.validate.min.js'
            		), 
					'external', true);

echo theme_view('header');

?>
<div class="body">
	<div class="container-fluid">
	    <?php
            echo Template::message();
            echo isset($content) ? $content : Template::content();
        ?>
	</div>
</div>
<?php echo theme_view('footer'); ?>