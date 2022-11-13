
<!--this is the form that has been used for the enquiry form-->
<form action="/contact.php" method="POST">
    <label>UserName</label>
    <input type="text" name="name" required="required"/>

    <label>Email</label>
    <input type="email" name="email" required="required"/>

    <label>Telephone</label>
    <input type="text" name="number" required="required"/>

    <label>enquiry</label>
    <textarea name="enquiry"></textarea>

    <input type="submit" name="submit" value="Enquiry Form" />

</form>
