<?php
session_start();
//it takes the autoloader for the required class
require '../auto_loadClass.inc.php';
if(isset($_POST['submit'])){
    //getting an obj for classes
    $obj = new controller();
    //calling the function
    $obj->insertMarked($_POST['id'],$_SESSION['loggedin']);
    //now it will be redirected to this page
    header('Location:messageRead.php?message');
}



?>