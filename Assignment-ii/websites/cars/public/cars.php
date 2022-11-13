<?php
//showromm of the website where u will be able to see the different cars
include 'include/auto_loadClass.inc.php';
$title = 'our cars';
$output = 'Our Cars';
require 'templates/header.html.php';
	$dis = new view();
	$dis->showCars(' WHERE archive = 0 LIMIT 10');
	require 'templates/footer.html.php';
?>


