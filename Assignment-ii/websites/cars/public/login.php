<?php
//starting the session
session_start();
// including the autoloader
include 'include/auto_loadClass.inc.php';
//when the submit button will be clicked
if(isset($_POST['submit'])){
    //hassing the password to make in more strong
    $salt="23g427r2fb232fb3fv873f3f87fg3f384";
    $password= $_POST['password'].$salt;
    $password =sha1($password);
    //creating the object for the controller class
    $obj = new controller();
    // calling the function
    $result = $obj->checkUser($_POST['name'], $password);
    //implying the result from the called function
    if(!$result){
    }
    else{
        //if data is correct the user will be redirected to admin page
        header("Location: admin/index.php");
        //message to be passed from this page to other different page
        $_SESSION['loggedin'] = $_POST['name'];
        $_SESSION['Message'] = "you are Logged in";
    }
}
//title of the page
$title = 'Admin Login';
// the output to be displayed in the page
$output = 'Admin Login';
//getting the header templete
require 'templates/header.html.php';
//form for filling the value
require 'templates/formTemplate.html.php';
if(isset($_POST['submit'])){
    // securing the password
    $salt="23g427r2fb232fb3fv873f3f87fg3f384";
    $password= $_POST['password'].$salt;
    $password =sha1($password);
//creating the object
    $obj = new controller();
    //calling the function
    $result = $obj->checkUser($_POST['name'],$password);
    if(!$result){
        //if the given data is wrong
        echo  '<h4>Wrong Detail!!!</h4>';
    }
    else{
    }
}
//footer of the page...
require 'templates/footer.html.php';
?>