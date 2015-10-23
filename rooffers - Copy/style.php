<?php
$directory = "assets/stylesheets";
require "vendor/leafo/scssphp/scss.inc.php";
scss_server::serveFrom($directory);