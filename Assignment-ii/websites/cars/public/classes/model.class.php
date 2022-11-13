<?php
class model extends database{

    //function is used for showing the cars in shwroom page
    protected function getCar($value){
        if(isset($_GET['numberClicked'])){
            $cars = $this->connect()->prepare('SELECT * FROM cars $value');

        }
        else{
	$cars = $this->connect()->prepare('SELECT * FROM cars' .$value);
        }
	$cars->execute();
    return $cars;

    }
//function to get the manufacturer
    protected function getManu(){
    
        $manu = $this->connect()->prepare('SELECT * FROM manufacturers WHERE id = :id');
    
        return $manu;
        }
        //function to set archive the car
        protected function setArchive($num,$name){
            $update = $this->connect()->prepare("UPDATE cars SET archive = 1, user='$name' WHERE id=".$num );
            $update->execute();
        }
        //function to remove archive the car
        protected function removeArchive($num,$name){
            $update = $this->connect()->prepare("UPDATE cars SET archive = 0, Remove='$name' WHERE id=".$num );
            $update->execute();
        }
//function where the adding staff query is written and executed
    protected function addStaff($username,$password){
        $sql = "INSERT INTO staff(username, password) VALUES (:username,:password)";
        $stmp = $this->connect()->prepare($sql);
        $inc = ['username'=>$username,'password'=>$password];
        $stmp->execute($inc);
        echo 'Staff added';
    }
// function that runs query to check the user data in the login page
    protected function  checkData($username,$password)
    {
        $sql = $this->connect()->prepare("SELECT username, password FROM staff WHERE username='$username' AND password= '$password'");
        $sql->execute();
        $count = $sql->rowCount();
        if($count >0){
                return true;
            } else {
                return false;
            }

    }
// function where the inserting query of message is written
    protected function addquery($name,$email,$telephone,$enquiry){
        $sql = $this->connect()->prepare("INSERT INTO enquiries (name, email, telephone, enquiry)
                VALUES (:name, :email,:telephone, :enquiry)");
        $inc = ['name'=>$name,'email'=>$email, 'telephone'=>$telephone, 'enquiry'=>$enquiry];
        $sql->execute($inc);
        echo 'Message delivered';
    }
// function which add the article in database
    protected  function addArticle($title,$username,$content){
        $sql = $this->connect()->prepare("INSERT INTO article (title, username, content)
                VALUES (:title, :username,:content)");
        $inc = ['title'=>$title,'username'=>$username, 'content'=>$content];
        $sql->execute($inc);
        echo 'article added';
    }
//function which select staff to show in the managestaff page
    protected function selectStaff(){
        $sql = $this->connect()->prepare("SELECT * FROM staff");
        $sql->execute();
        return $sql;

    }
//function to check query in the database
    protected function checkQuery(){
        $sql = $this->connect()->prepare("SELECT * FROM enquiries WHERE marked='Not Marked Yet'");
        $sql->execute();
        return $sql;

    }
    //update that  the message has been checked
    protected function checkBy($id,$username){
        $update = $this->connect()->prepare("UPDATE enquiries SET marked= '.$username.' WHERE id=".$id );
        $update->execute();

    }
    //function to write article
    protected function get(){
        $sel = $this->connect()->prepare("SELECT id FROM article ORDER BY id DESC LIMIT 1" );
        $sel->execute();

    }
    //function to select the article to be displayed
    protected function selectArticle(){
        $sql = $this->connect()->prepare("SELECT * FROM article ORDER BY Currenttime DESC");
        $sql->execute();
        return $sql;

    }
    //the query which has been checked
    protected function checkQuerypre(){
        $sql = $this->connect()->prepare("SELECT * FROM enquiries WHERE marked !='Not Marked Yet'");
        $sql->execute();
        return $sql;

    }
//function to select car from database
    protected function selectCar(){
        $sql = $this->connect()->prepare("SELECT * FROM cars WHERE archive=0");
        $sql->execute();
        return $sql;

    }
//function to archived select car from database
    protected function selectCara(){
        $sql = $this->connect()->prepare("SELECT * FROM cars WHERE archive=1");
        $sql->execute();
        return $sql;

    }
//function to add the manufacturer
    protected function addManu($name){
        $stmt = $this->connect()->prepare('INSERT INTO manufacturers (name) VALUES (:name)');
        $criteria = [
            'name' => $name
        ];
        $stmt->execute($criteria);
    }
//function to select the manufacturer
    protected function selectmanu(){
        $sql = $this->connect()->prepare('SELECT * FROM manufacturers');
        $sql->execute();
        return $sql;

    }
//function where the query of delete manufacturer is executed
    protected function deleteManu($id){
        $sql = $this->connect()->prepare('DELETE FROM manufacturers WHERE id = ' . $id);
        $sql->execute();
        return $sql;

    }
    //function which runs the query for updating the manufacturer
    protected function updatemanu($name,$id){
        $stmt = $this->connect()->prepare('UPDATE manufacturers SET name = :name WHERE id = :id ');
        $criteria = [
            'name' => $name,
            'id' => $id
        ];
        $stmt->execute($criteria);
    }
//function to delete car
    protected function deleteCar($id){
        $sql = $this->connect()->prepare('DELETE FROM cars WHERE id = ' . $id);
        $sql->execute();
        return $sql;

    }
//function where the inserting car query is executed
    protected function insertCar($model,$price,$manufacturerId,$description,$engine,$user,$previousPrice){
        $stmt = $this->connect()->prepare('INSERT INTO cars (name, price, manufacturerId, description,engine,user,previousPrice) 
							   VALUES (:model, :price, :manufacturerId,:description, :engine, :user, :previousPrice)');

        $criteria = [
            'model' => $model,
            'price' => $price,
            'manufacturerId' => $manufacturerId,
            'description' => $description,
            'engine' => $engine,
            'user' => $user,
            'previousPrice' => $previousPrice

        ];

        $stmt->execute($criteria);
    }
    //function where the updating car query is executed
    protected function updateCar($model,$price,$manufacturerId,$description,$engine,$user,$previousPrice)
    {
        $stmt = $this->connect()->prepare('UPDATE cars
								SET name = :name, 
								    description = :description, 
								    price = :price,
								    manufacturerId = :manufacturerId,
								    engine= :engine,
								    user = :user,
								    previousPrice= :previousPrice
								   WHERE id = :id 
						');
        $criteria = [
            'name' => $model,
            'description' => $description,
            'price' => $price,
            'manufacturerId' =>$manufacturerId,
            'engine' => $engine,
            'user'=>$user,
            'previousPrice' => $previousPrice,

            'id' => $_POST['id']
        ];

        $stmt->execute($criteria);

    }
//function where deleting query for message is written and executed
    protected function deleteStaff($id){
        $sql = $this->connect()->prepare('DELETE FROM staff WHERE idstaff = ' . $id);
        $sql->execute();
        return $sql;

    }
    //function where deleting query for message is written and executed
    protected function deleteMesss($id){
        $sql = $this->connect()->prepare('DELETE FROM enquiries WHERE id = ' . $id);
        $sql->execute();
        return $sql;

    }

    }

?>