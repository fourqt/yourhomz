<?php
$directory = "assets/css";
require "../application/third_party/leafo/scssphp/scss.inc.php";
scss_server::serveFrom($directory);