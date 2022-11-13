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
    //templete for the form
    require 'temp/manuTemp.html.php';
    if(isset($_POST['submit'])){
        //creating an obj for classes
        $obj = new controller();
        //calling the function
        $obj->addManufa($_POST['name']);
        echo 'Manufacturer added';

    }


    require 'temp/foot.html.php';
}


