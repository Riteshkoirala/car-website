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
    //getting an obj for classes
    $ob = new view();
    //calling the function
    $ob->showArticle();

    require 'temp/foot.html.php';
}
?>

