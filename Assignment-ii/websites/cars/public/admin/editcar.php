<?php
session_start();
//autoloader to load the specified class
require '../auto_loadClass.inc.php';
//if there is no login then it will redirect to the login page
if (isset($_SESSION['loggedin']) == false) {
    header('Location:../login.php');
} else {
    //giving the database connection
$pdo = new PDO('mysql:dbname=cars;host=mysql', 'student', 'student');
require 'temp/head.html.php';
			$car = $pdo->query('SELECT * FROM cars WHERE id = ' . $_GET['val'])->fetch();
		?>
<!--        form for editing car where the value will be pre-written-->
			<h2>Edit Car</h2>
			<form action="editcar.php?val=<?php echo $car['id'] ?>" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $car['id']; ?>" />
				<label>Name</label>
				<input type="text" name="name" value="<?php echo $car['name']; ?>" />
				<label>Description</label>
				<textarea name="description"><?php echo $car['description']; ?></textarea>
				<label>Price</label>
				<input type="text" name="price" value="<?php echo $car['price']; ?>" />
                <label>Previous Price: </label>
                <input type="text" name="previousPrice" value="<?php echo $car['previousPrice']; ?>" />
                <label>engine</label>
                <input type="text" name="engine" value="<?php echo $car['engine']; ?>" />
				<label>Category</label>
				<select name="manufacturerId">
				<?php
                //query for getting the manufacturer option
					$stmt = $pdo->prepare('SELECT * FROM manufacturers');
					$stmt->execute();
					foreach ($stmt as $row) {
						if ($car['categoryId'] == $row['id']) {
							echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
						}
						else {
							echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';	
						}
					}
				?>
				</select>
				<label>Product image</label>
				<input type="file" name="image" />
                <input type="file" name="image1" />
                <input type="file" name="image2" />
                <input type="file" name="image3" />

                <input type="submit" name="submit" value="Save Product" />

			</form>
<?php
// when the submit button from the form is pressed
    if (isset($_POST['submit'])) {
        //creating the object for controller class
        $up = new controller();
        //calling the required function
        $up->upCar($_POST['name'],$_POST['price'],$_POST['manufacturerId'],$_POST['description'],$_POST['engine'],$_SESSION['loggedin'],$_POST['previousPrice']);

//uploading the image
        if ($_FILES['image']['error'] == 0) {
            $fileName = $_POST['name'].'1.jpg';
            move_uploaded_file($_FILES['image']['tmp_name'], '../images/cars/' . $fileName);
        }

        if ($_FILES['image1']['error'] == 0) {
            $fileName = $_POST['name'].'2.jpg';
            move_uploaded_file($_FILES['image1']['tmp_name'], '../images/cars/' . $fileName);
        }

        if ($_FILES['image2']['error'] == 0) {
            $fileName = $_POST['name'].'3.jpg';
            move_uploaded_file($_FILES['image2']['tmp_name'], '../images/cars/' . $fileName);
        }

        if ($_FILES['image3']['error'] == 0) {
            $fileName = $_POST['name'].'4.jpg';
            move_uploaded_file($_FILES['image3']['tmp_name'], '../images/cars/' . $fileName);
        }

        echo 'Product saved';
    }
        require 'temp/foot.html.php';

}
        ?>

