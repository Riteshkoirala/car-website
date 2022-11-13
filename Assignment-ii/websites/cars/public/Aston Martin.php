<?php
//it shows the list of austin martin cars
include 'include/auto_loadClass.inc.php';
$title = "Aston Martin Cars";
$output = "Aston Martin Cars";
require 'templates/header.html.php';
	$dis = new view();
	$dis->showCars(' WHERE manufacturerId = 4 AND archive = 0');
	require 'templates/footer.html.php';
?>