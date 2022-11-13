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

    echo '<h2>Add new staff..</h2>';
    require 'temp/staff.html.php';

    if (isset($_POST['submit'])) {
        //to make the password unable to decrypt using the sha1 method
        $salt="23g427r2fb232fb3fv873f3f87fg3f384";
        $password= $_POST['password'].$salt;
        $password =sha1($password);
        //creating an obj for classes
        $obj = new controller();
        //calling the function
        $obj->addStaffs($_POST['name'], $password);
    }
    require 'temp/foot.html.php';
}
?>