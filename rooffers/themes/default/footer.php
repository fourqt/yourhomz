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
        <ul class="list-group">
            <li class="text-uppercase"><a href="javascript:void(0);"><strong>Home</strong></a></li>
            <li class="text-uppercase"><a href="javascript:void(0);"><strong>My Profile</strong></a></li>
            <li class="text-uppercase"><a title="Know more about Roofers.com" href="javascript:void(0);" ><strong>About Us</strong></a></li>
            <li class="text-uppercase"><a href="javascript:void(0);"><strong>News</strong></a></li>
            <li class="text-uppercase"><a href="javascript:void(0);"><strong>ShortListed</strong></a></li>
        </ul>
        <ul class="list-group">
            <li><a title="Get assets of logo, images of Roofers.com" rel="nofollow" href="javascript:void(0);">Media Kit</a></li>
            
            <li>
                <a data-bypass="true" href="mailto:support@roofers.com" class="support-email">
                    <div class="call-text">Need any help? Write to us at</div>
                    <div class="circled"><i class="icon icon-message"></i><span>support@roofers.com </span></div>
                </a>
            </li>
        </ul>
        <ul class="list-group">
            <li>
                <div class="text"><h3>Follow Us</h3></div>
                <div class="share-icons">
                    <a rel="nofollow" target="_blank" href="javascript:void(0);" class="social tw">
                        <i class="fa fa-twitter-square fa-2x fa-fw"></i>
                    </a>
                    <a rel="nofollow" target="_blank" href="javascript:void(0);" class="social fb">
                        <i class="fa fa-facebook-square fa-2x fa-fw"></i>
                    </a>
                    <a rel="publisher" target="_blank" href="javascript:void(0);" class="social gp">
                        <i class="fa fa-google-plus-square fa-2x fa-fw"></i>
                    </a>
                    <a rel="publisher" target="_blank" href="javascript:void(0);" class="social ig">
                        <i class="fa fa-instagram fa-2x fa-fw"></i>
                    </a>
                    <a rel="publisher" target="_blank" href="javascript:void(0);" class="social pint">
                        <i class="fa fa-pinterest-square fa-2x fa-fw"></i>
                    </a>
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