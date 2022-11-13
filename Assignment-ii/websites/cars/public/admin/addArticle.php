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

    echo '<h2>Add new article..</h2>';
    require 'temp/articleForm.html.php';

    if (isset($_POST['submit'])) {
        // creating the for the class
        $obj = new controller();
        //calling the function
        $obj->insertArticle($_POST['title'], $_SESSION['loggedin'], $_POST['description']);

        $obj1 = new database();
//inserting the image in the article folder
        if ($_FILES['image']['error'] == 0) {
            $fileName = $_POST['title'] . '.jpg';
            move_uploaded_file($_FILES['image']['tmp_name'], '../images/article/' . $fileName);
        }
    }
    require 'temp/foot.html.php';
}
?>