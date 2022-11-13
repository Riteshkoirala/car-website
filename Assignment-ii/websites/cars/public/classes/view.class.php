<?php

class view extends model{

    //function used for showing the car in the chowroom page
    public function showCars($value){
        $resultCar = $this->getCar($value);
        $resultManu = $this->getManu();
        foreach ($resultCar as $car) {
            $resultManu->execute(['id' => $car['manufacturerId']]);
            $manufacturer = $resultManu->fetch();
             echo '<li>';
            if (file_exists('images/cars/' . $car['name'] . '1.jpg')) {
                echo '<a href="images/cars/' . $car['name'] . '1.jpg"><img src="images/cars/' . $car['name'] . '1.jpg" /></a>';
            }
            if (file_exists('images/cars/' . $car['name'] . '2.jpg')) {
                echo '<a href="images/cars/' . $car['name'] . '2.jpg"><img src="images/cars/' . $car['name'] . '2.jpg" /></a>';
            }
            if (file_exists('images/cars/' . $car['name'] . '3.jpg')) {
                echo '<a href="images/cars/' . $car['name'] . '3.jpg"><img src="images/cars/' . $car['name'] . '3.jpg" /></a>';
            }
            if (file_exists('images/cars/' . $car['name'] . '4.jpg')) {
                echo '<a href="images/cars/' . $car['name'] . '4.jpg"><img src="images/cars/' . $car['name'] . '4.jpg" /></a>';
            }
            echo '<div class="details">';
            echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
            if($car['previousPrice'] !=null){
                echo '<h3>was £' . $car['previousPrice'] . '</h3>';
            }
            echo '<h3>is £' . $car['price'] . '</h3>';
            echo '<p>' . $car['description'] . '</p>';
            echo '<p>Engine type: '. $car['engine'] . '</p>';
            }
            echo '</div>';
            echo '</li>';
        }
//function used for showing the staff in the staff page
    public function showStaff(){
        $show = $this->selectStaff();
        foreach ($show as $category) {
            echo '<tr>';
            echo '<td>' . $category['username'] . '</td>';
            echo '<td><form method="post" action="deleteStaf.php">
				<input type="hidden" name="id" value="' . $category['idstaff'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
            echo '</tr>';
        }
        echo '</thead>';
        echo '</table>';
    }
//function used to show the inquery in the message page
    public function showMessage($username){
        $show = $this->checkQuerypre();
        foreach ($show as $category) {
            echo '<tr>';
            echo '<td>Marked by'. $category['marked'] . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>' . $category['name'] . '</td>';
            echo '<td>' . $category['email'] . '</td>';
            echo '<td>' . $category['telephone'] . '</td>';
            echo '<td>' . $category['enquiry'] . '</td>';
            echo '<td><form method="post" action="deleteMess.php">
				<input type="hidden" name="id" value="' . $category['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
            echo '</tr>';
        }


        echo '</thead>';
        echo '</table>';
    }
//function used for showing the already checked message
    public function showMessagePre($username){
        $show = $this->checkQuery();
        foreach ($show as $category) {
            echo '<tr>';
            echo '<td>' . $category['name'] . '</td>';
            echo '<td>' . $category['email'] . '</td>';
            echo '<td>' . $category['telephone'] . '</td>';
            echo '<td>' . $category['enquiry'] . '</td>';
            echo '<td><form method="post" action="mark.php?message">
				<input type="hidden" name="id" value="' . $category['id'] . '" />
            <input type="submit" name="submit" value=" Mark " />
				</form></td>';
            echo '<td><form method="post" action="deleteMess.php">
				<input type="hidden" name="id" value="' . $category['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
            echo '</tr>';
        }


        echo '</thead>';
        echo '</table>';
    }
//function used for showing the article
    public function showArticle(){
        $article = $this->selectArticle();
        foreach ($article as $art) {

            echo '<div class="details">';
            echo '<h1>' . $art['title'].'</h1>';
            echo '<h4>Posted By: ' . $art['username'] . '</h4>';
            echo '<em>at: '.$art['Currentdate'].$art['Currenttime'] . '</em>';
                echo '<img src="../images/article/' . $art['title'] . '.jpg" />';
            echo '<p>' . $art['content'] . '</p>';
        }
        echo '</div>';
    }
//function used for showing the car which is not archived
    public function showCar($name){
        $cars = $this->selectCar();
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Model</th>';
        echo '<th style="width: 10%">Price</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '</tr>';
        foreach ($cars as $car) {
            if($car['Remove'] != NULL){
                echo '<th>'.$car['name'].'    Listed by:- '.$car['Remove'].'</th>';
            }
            echo '<tr>';
            echo '<td>' . $car['name'] . '</td>';
            echo '<td>£' . $car['price'] . '</td>';
            echo '<td><a style="float: right" href="editcar.php?val='.$car['id'].'">Edit</a></td>';
            echo '<td><form method="get" action="Cars.php">
                  <input type="hidden" name="id" value=' .$car['id'].' ">
                  <button type="submit" name="submit" value=submit> Archive </button></form></td>';
            if(isset($_GET['submit'])){
                $dif = new controller();
                $dif->UpdateData($_GET['id'],$name);

            }
            echo '<td><form method="post" action="deletecar.php">
				<input type="hidden" name="id" value="' . $car['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
            echo '</tr>';
        }

        echo '</thead>';
        echo '</table>';
    }
// function to show for the car which has been archived
    public function showCara($name){
        $cars = $this->selectCara();
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Model</th>';
        echo '<th style="width: 10%">Price</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '</tr>';
        foreach ($cars as $car) {
            if($car['user'] != NULL){
                echo '<th>'.$car['name'].'     archived by:- '.$car['user'].'</th>';
            }
            echo '<tr>';
            echo '<td>' . $car['name'] . '</td>';
            echo '<td>£' . $car['price'] . '</td>';
            echo '<td><a style="float: right" href="editcar.php?id=' . $car['id'] . '">Edit</a></td>';
            echo '<td><form method="get" action="archive.php">
                  <input type="hidden" name="id" value='.$car['id'].' ">
                  <button type="submit" name="submit" value=submit> Remove Archive </button></form></td>';
            if(isset($_GET['submit'])){
                $dif = new controller();
                $dif->removeData($_GET['id'],$name);

            }
            echo '<td><form method="post" action="deletecar.php">
				<input type="hidden" name="id" value="' . $car['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
            echo '</tr>';
        }

        echo '</thead>';
        echo '</table>';
    }
// function to show the manufacturer in managing page
    public function showManu(){
        $categories = $this->selectmanu();
        require '../admin/temp/displayStaff.html.php';
        foreach ($categories as $category) {
            echo '<tr>';
            echo '<td>' . $category['name'] . '</td>';
            echo '<td><a style="float: right" href="editmanufacturer.php?val=' . $category['id'] . '">Edit</a></td>';
            echo '<td><form method="post" action="deletemanufacturer.php">
				<input type="hidden" name="id" value="' . $category['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
            echo '</tr>';
        }

        echo '</thead>';
        echo '</table>';
    }

}


?>