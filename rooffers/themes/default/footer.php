    <?php if ( ! isset($show) || $show == true) : ?>
    <hr />
    <footer class="footer">
        <div class="container">
            <p>Powered by <a href="http://cibonfire.com" target="_blank">Bonfire <?php echo BONFIRE_VERSION; ?></a></p>
        </div>
    </footer>
    <div id="sidemenu-container">
    <div id="side-backdrop"></div>
    <div id="side-nav-menu">
        <ul class="side-menu-list">
            <li class="full-link menu-list-item uppercase"><a data-href="/" href="/" class="link">Home</a></li>
            <li class="full-link menu-list-item uppercase"><a title="Know more about roofers.com" target="_blank" href="/about" data-bypass="true" class="link">About Us<i class="hover-icon icon icon-arrow-diagonal"></i></a></li>
            <li class="full-link menu-list-item uppercase"><a target="_blank" data-bypass="true" href="http://roofers.com/blog" class="link">Blog<i class="hover-icon icon icon-arrow-diagonal"></i></a></li>

            <li class="full-link menu-list-item padded-item"><span class="feedback-item link">Give us your feedback</span></li>
            <li class="full-link menu-list-item"><a title="Get assets of logo, images of roofers.com" rel="nofollow" href="/media_kit.zip" data-bypass="true" class="link">Media Kit</a></li>
            
            <li class="full-link last-link menu-list-item padded-item">
                <a data-bypass="true" href="mailto:support@roofers.com" class="support-email">
                    <div class="call-text">Need any help? Write to us at</div>
                    <div class="circled"><i class="icon icon-message"></i><span>support@roofers.com </span></div>
                </a>
            </li>
            <li class="bordered-item last-link menu-list-item padded-item">
                <div class="text">Follow Us</div>
                <div class="share-icons">
                    <a rel="nofollow" target="_blank" href="https://twitter.com/roofers" data-bypass="true" class="link"><i class="icon icon-twitter"></i></a>
                    <a rel="nofollow" target="_blank" href="http://www.facebook.com/roofers.co.in" data-bypass="true" class="link"><i class="icon icon-facebook"></i></a>
                    <a target="_blank" rel="publisher" href="https://plus.google.com/116390109264258994237" data-bypass="true" class="link"><i class="icon icon-gplus"></i></a>
                    <a target="_blank" rel="publisher" href="https://instagram.com/roofersindia/" data-bypass="true" class="link"><i class="icon icon-instagram"></i></a>
                    <a target="_blank" rel="publisher" href="https://www.pinterest.com/roofersindia/" data-bypass="true" class="link"><i class="icon icon-pinterest"></i></a>
                </div>
            </li>
        </ul>
    </div>
    </div>
    <?php endif; ?>
	<div id="debug"><!-- Stores the Profiler Results --></div>
    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-2.1.4.min.js"><\/script>');</script>
    <?php echo Assets::js(); ?>rgergas
</body>
</html>