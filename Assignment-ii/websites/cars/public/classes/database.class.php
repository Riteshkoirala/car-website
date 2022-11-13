<?php

class database {

// this class is used for the connection to the database
public function connect(){

 $username='student';
 $password='student';
 $db = 'cars';

	$dbcon = new PDO('mysql:dbname=' .$db .';host=mysql', $username, $password);

    return $dbcon;
}


}


?>