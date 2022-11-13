<?php
session_start();
//if there is no login then it will redirect to the login page
if (isset($_SESSION['loggedin']) == false) {
    header('Location:../login.php');
} else {
    //it takes the autoloader for the required class
    require '../auto_loadClass.inc.php';
    $topic = 'Edit Manufacturer';
    require 'temp/head.html.php';
    //database connection for getting the previous value in the page
    $pdo = new PDO('mysql:dbname=cars;host=mysql', 'student', 'student');
    $currentMan = $pdo->query('SELECT * FROM manufacturers WHERE id = ' . $_GET['val'])->fetch();
    ?>
<h2>Edit Manufacturer</h2>
<!--form for filling the manufacturer-->
<form action="editmanufacturer.php?val=<?php echo $currentMan['id'] ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $currentMan['id']; ?>" />
    <label>Name</label>
    <input type="text" name="name" value="<?php echo $currentMan['name']; ?>" />
    <input type="submit" name="submit" value="Save Manufacturer" />
</form>
<?php
    //when the submit button is clicked
    if(isset($_POST['submit'])){
        //creating the object for the controller class
    $obj = new controller();
    //getting the function from the controller class
    $obj->updman($_POST['name'],$_POST['id']);
    echo 'Manufacturer saved';
}
    require 'temp/foot.html.php';

}
?>


