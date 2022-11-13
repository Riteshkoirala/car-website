<?php
//getting the database connection
$pdo = new PDO('mysql:dbname=cars;host=mysql', 'student', 'student');
session_start();
//if there is no login then it will redirect to the login page
if(isset($_SESSION['loggedin']) == false){
    header('Location:../login.php');
}
else {
    //to load the class that has been called
    require '../auto_loadClass.inc.php';
    $topic = 'Add Car';
    require 'temp/head.html.php';
    require 'temp/addCarTemp.html.php';
    //when the submit button is pressed
    if (isset($_POST['submit'])) {
        //creating the object for the controller class
        $obj = new controller();
        //calling the required function
    $obj->addCar($_POST['model'], $_POST['price'], $_POST['manufacturerId'], $_POST['description'], $_POST['engine'], $_SESSION['loggedin'], $_POST['prevPrice']);
        //uploading the image to the folder
        if ($_FILES['image']['error'] == 0) {
            $fileName = $_POST['model'].'1.jpg';
            move_uploaded_file($_FILES['image']['tmp_name'], '../images/cars/' . $fileName);
        }

        if ($_FILES['image1']['error'] == 0) {
            $fileName = $_POST['model'].'2.jpg';
            move_uploaded_file($_FILES['image1']['tmp_name'], '../images/cars/' . $fileName);
        }

        if ($_FILES['image2']['error'] == 0) {
            $fileName = $_POST['model'].'3.jpg';
            move_uploaded_file($_FILES['image2']['tmp_name'], '../images/cars/' . $fileName);
        }

        if ($_FILES['image3']['error'] == 0) {
            $fileName = $_POST['model'].'4.jpg';
            move_uploaded_file($_FILES['image3']['tmp_name'], '../images/cars/' . $fileName);
        }

        echo 'Car added';

    }
    require 'temp/foot.html.php';
}
?>









