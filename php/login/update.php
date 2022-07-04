<?php 
    include "DAO.php";
    $id = $_GET['id'];
    
    if (isset($_POST['update'])) {
        echo DAO::update("users",$id);
    } 
    
    $info = DAO::recherche("users",$id);
    $firstname = $info[0];
    $lastname = $info[1];
    $email = $info[2];
    $pswd = $info[3];
?>

<h2>User Update Form</h2>
<form action="" method="post">
  <fieldset>
    <legend>Personal information:</legend>
    First name:<br>
    <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br>
    Last name:<br><input type="text" name="lastname" value="<?php echo $lastname; ?>"><br>
    Email:<br><input type="email" name="email" value="<?php echo $email; ?>"><br>
    Password:<br><input type="password" name="password" value="<?php echo $pswd; ?>"><br>
    <input type="submit" value="Update" name="update">
  </fieldset>
</form> 