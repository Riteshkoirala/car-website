<h2>Add Car</h2>
<!--this is form to add the car-->
<form action="addcar.php" method="POST" enctype="multipart/form-data">
    <label>Car Model</label>
    <input type="text" name="model" required="required"/>

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Price</label>
    <input type="text" name="price" required="required"/>

    <label>Previous Price:</label>
    <input type="text" name="prevPrice" />
    <label>Leave Blank if is a New car...</label>

    <label>Engine</label>
    <input type="text" name="engine" required="required"/>


    <label>Category</label>

    <select name="manufacturerId">
        <?php
        //getting the manufacturer in the select box
        $pdo = new PDO('mysql:dbname=cars;host=mysql', 'student', 'student');
        $stmt = $pdo->prepare('SELECT * FROM manufacturers');
        $stmt->execute();
        foreach ($stmt as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }

        ?>

    </select>

    <label>Image</label>

    <input type="file" name="image" required="required"/>
    <input type="file" name="image1" required="required"/>
    <input type="file" name="image2" required="required"/>
    <input type="file" name="image3" required="required"/>


    <input type="submit" name="submit" value="Add Car" />

</form>