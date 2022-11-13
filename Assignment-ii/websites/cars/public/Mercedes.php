<?php
//including the autoloader to run the classes
include 'include/auto_loadClass.inc.php';
//giving the title for the car
$title = "Mercedes Cars";
//the name that will be printed in the screen
$output = "Mercedes Cars";
// the general output of the file
require 'templates/header.html.php';
// creating the object for the view class
	$dis = new view();
    // calling the function present in the view class
	$dis->showCars(' WHERE manufacturerId = 3 AND archive = 0');
    //getting the footer templete
	require 'templates/footer.html.php';
?>