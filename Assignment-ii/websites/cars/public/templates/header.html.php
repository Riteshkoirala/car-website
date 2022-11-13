<!DOCTYPE html>
<html>
<!--this is the header of the website mostly used in every page-->
	<head>
	<link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
		<title><?php echo $title ?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sunday: Closed</p>
			</aside>
			<img src="/images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
<!--            link to navigate in the different page-->
			<li><a href="/">Home</a></li>
			<li><a href="/cars.php?car">Showroom</a></li>
			<li><a href="/about.php">About Us</a></li>
			<li><a href="/contact.php">Contact us</a></li>
			<li><a href="/career.php">Careers</a></li>
            <li><a href="login.php">Admin Login</a></li>

		</ul>
	</nav>
		<img src="/images/randombanner.php"/>
	<main class="admin">
        <?php


        if(isset($_GET['car'])){
        ?>
	<section class="left">
		<ul>
            <?php
            //code for getting the added manufacturer name from the database
            $pdo = new PDO('mysql:dbname=cars;host=mysql', 'student', 'student');

            $selectQuery = "SELECT id, name FROM manufacturers";
            $smkt=$pdo->prepare($selectQuery);
            $result = $smkt->execute();
            if ($result) {
                $record = $smkt->fetchAll();
                if (count($record) > 0) {
                    foreach ($record as $row) {
                        print "<li><a href='$row[name].php?car'> <button  class ='sel' type='onclick' name='sel' value='sel'>.$row[name].</button></a></td></li>";
                    }
                }
                else{

                }
            }
            ?>
		</ul>
	</section>
        <?php
        }
        ?>
	<section class="right">

		<h1><?php echo $output ?></h1>

	<ul class="cars">
