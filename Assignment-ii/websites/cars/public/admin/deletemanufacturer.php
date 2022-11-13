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
    //creating an obj for classes
    $obj = new controller();
    //calling the function
    $del = $obj->deleteManuf($_POST['id']);
    if($del){
        // it will be displayed when the above method is success
        echo '<h2>Manufucturer deleted</h2>';
    }
    else{
        // if failed this will be displayed
        echo '<h2>Erorr!!!</h2>';
    }
    require 'temp/foot.html.php';

}
?>
