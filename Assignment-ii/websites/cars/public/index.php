<?php
//this is the first page that will be loaded when the website is run
$title = "Home Page";
$output ="";
require 'auto_loadClass.inc.php';
require 'templates/header.html.php';
echo "<p>Welcome to Claire's Cars, Northampton's specialist in classic and import cars.</p>";
$ob = new view();
$ob->showArticle();
require 'templates/footer.html.php';
?>
