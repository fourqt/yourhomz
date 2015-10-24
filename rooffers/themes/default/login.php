<?php echo theme_view('header'); ?>
<main class="page-content"><!-- Start of Main Container -->
    <?php
    echo isset($content) ? $content : Template::content();

    echo theme_view('footer', array('show' => false));
?>