<?php 

include "DAO.php";
if (isset($_POST['submit'])) {
    echo DAO::create("product");
}
?>

<html>
    <body>
        <h2>PRODUCT FORM</h2>
          <form action="" method="POST">
            <fieldset>
              <legend>Product info</legend>
          
              categorie :<br><input type="text" name="categorie"><br>
          
              Name:<br><input type="text" name="name"><br>
                    
              Price:<br><input type="text" name="price"><br>

              Image:<br><input type="file" name="image"><br>

              Status:<br><input type="text" name="status"><br><br>

              <input type="submit" name="submit" value="AJOUTER">
            </fieldset>

          </form>
    </body>
</html>