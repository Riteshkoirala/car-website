<?php
session_start();
//if there is no login then it will redirect to the login page
if(isset($_SESSION['loggedin']) == false){
    header('Location:../login.php');
}
else {
    //it takes the autoloader for the required class
    require '../auto_loadClass.inc.php';
    require 'temp/head.html.php';
    echo '<h2>Manage Staff</h2>';
    require 'temp/displayStaff.html.php';
    echo '<a href="addStaff.php">Add new Staff</a>';
    //creating an obj for classes
    $obj = new view();
    //calling the function
    $obj->showStaff();
    require 'temp/foot.html.php';
}
        ?>
