<?php
//this is the contact page of the website where u can submit the enquiry
include 'include/auto_loadClass.inc.php';
$title = "Contact Page";
$output =" Enquiry Form--Leave a Message..";
require 'templates/header.html.php';
echo "<p>Please call us on  01604 90345 or email <a href='mailto:enquiries@clairscars.co.uk'>enquiries@clairscars.co.uk</a>";
require 'templates/contactForm.html.php';

if (isset($_POST['submit'])) {
    $obj = new controller();
    $obj->insertMessage($_POST['name'], $_POST['email'], $_POST['number'], $_POST['enquiry']);
}
require 'templates/footer.html.php';
?>


