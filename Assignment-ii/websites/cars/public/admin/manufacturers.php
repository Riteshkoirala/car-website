<?php
session_start();
//if there is no login then it will redirect to the login page
if (isset($_SESSION['loggedin']) == false) {
    header('Location:../login.php');
} else {
    //it takes the autoloader for the required class
    require '../auto_loadClass.inc.php';
    $topic = 'Add Manufacturer';
    require 'temp/head.html.php';
    echo '<h2>Manufacturers</h2>';
    echo '<a class="new" href="addmanufacturer.php">Add new manufacturer</a>';
    //getting an obj for classes
    $obj = new view();
    //calling the function
    $obj->showManu();
    require 'temp/foot.html.php';

		}
?>

