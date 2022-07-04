<?php 

include "DAO.php";
if (isset($_POST['submit'])) {
    echo DAO::create("users");
}
?>

<html>
    <body>
        <h2>Signup Form</h2>
          <form action="" method="POST">
            <fieldset>
              <legend>Personal information:</legend>
          
              First name:<br><input type="text" name="firstname"><br>
          
              Last name:<br><input type="text" name="lastname"><br>
          
              Email:<br><input type="email" name="email"><br>
          
              Password:<br><input type="password" name="pswd"><br><br>
          
              <input type="submit" name="submit" value="submit">
            </fieldset>

          </form>
    </body>
</html>