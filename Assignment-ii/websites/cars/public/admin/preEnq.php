<?php
session_start();
//if there is no login then it will redirect to the login page
if(isset($_SESSION['loggedin']) == false){
    header('Location:../login.php');
}
else {
    require '../auto_loadClass.inc.php';
    require 'temp/head.html.php';
    $topic = 'Manage Enquiry';
    require 'temp/displayStaff.html.php';
    //creating the object for the class
    $obj = new view();
    //calling the function of the class
    $obj->showMessage($_SESSION['loggedin']);
    require 'temp/foot.html.php';
}
?>