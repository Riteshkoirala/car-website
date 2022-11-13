<?php
//the autoloader which helps to autoloades the classes
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "classes/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    include_once ($fullPath);

}

?>