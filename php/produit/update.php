<?php 
    include "DAO.php";
    $id = $_GET['id'];
    
    if (isset($_POST['update'])) {
        echo DAO::update("product",$id);
    } 
    
    $info = DAO::recherche("product",$id);
    $categorie = $info[0];
    $name = $info[1];
    $price = $info[2];
    $image = $info[3];
    $status = $info[4];
?>

<h2>User Update Form</h2>
<form action="" method="post">
  <fieldset>
    <legend>Personal information:</legend>
    categorie:<br><input type="text" name="categorie" value="<?php echo $categorie; ?>"><br>
    name:<br><input type="text" name="name" value="<?php echo $name; ?>"><br>
    price:<br><input type="text" name="price" value="<?php echo $price; ?>"><br>
    image:<br><input type="file" name="image" value="<?php echo $image; ?>"><br>
    status:<br><input type="text" name="status" value="<?php echo $status; ?>"><br>
    <input type="submit" value="Update" name="update">
  </fieldset>
</form> 