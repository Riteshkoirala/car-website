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
    $topic = 'Manage Car';
    echo '<h2>Manage Car</h2>';
    echo '<a href="addcar.php">Add new car</a>';
    //creating an obj for classes
    $obj = new view();
    //calling the function
    $obj->showCar($_SESSION['loggedin']);
    require 'temp/foot.html.php';
}
?>

