<?php
//including the autoloader
include 'include/auto_loadClass.inc.php';
//title of the page
$title = "Jaguar's Cars";
//output to print on screen
$output = "Jaguar's Cars";
//bringing the header on show
require 'templates/header.html.php';
//calling the viewclass
	$dis = new view();
    //calling yhe function of it
	$dis->showCars(' WHERE manufacturerId = 2  AND archive = 0');
        //getting the footer
	require 'templates/footer.html.php';
?>