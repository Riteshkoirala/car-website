<?php
//autoloading function to make the work easier to run the classes in the other php file
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "classes/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    include_once ($fullPath);

}

?>