<!--for to post the article-->

<form action="/admin/addArticle.php" method="POST" enctype="multipart/form-data">
    <label>Title</label>
    <input type="text" name="title" required="required"/>

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Image</label>
    <input type="file" name="image" id="image" required="required"/>

    <input type="submit" name="submit" value="Add Article" />

</form>
