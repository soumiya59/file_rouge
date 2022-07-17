<?php
class DAO{
    public static function connecter(){
        define('DB_HOST','localhost');
        define('DB_USER','newuser');
        define('DB_PASSWORD','password');
        define('DB_NAME','BBE');
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        if($conn->connect_error){
            die('connection failed : ' . $conn->connect_error);
        }else{
            return $conn;
        }
    }
    public static function create($table){
        $retConn = self::connecter();
        if($retConn != null){
            $categorie=$_POST['categorie'];
            $name=$_POST['name'];
            $price=$_POST['price'];
            $image=$_POST['image'];
            $status=$_POST['status'];
            $sql = "INSERT INTO ".$table." (categorie,name,price,image,status) VALUES ('$categorie', '$name', '$price', '$image', '$status')";
            if (mysqli_query($retConn, $sql)) {
              echo "Produit Ajouté !";
            } else {
              echo 'Error: ' . mysqli_error($retConn);
            }
        }
    }
    public function delete($table){
        $retConn = self::connecter();
        if($retConn != null){
            if (isset($_GET['id'])) {
                $prod_id = $_GET['id'];
                $sql= "DELETE FROM ".$table." WHERE id='".$prod_id."'";
                $result = $retConn->query($sql);
                 if ($result == TRUE) {
                    echo "deleted successfully.";
                }else{
                    echo "Error:" . $retConn->error;
                }
            }
            $retConn->close();
        }
    }
    public function view($table){
        $retConn = self::connecter();
        if($retConn != null){
            $sql= 'SELECT * FROM '.$table;
            $result = mysqli_query($retConn,$sql);
            $products = mysqli_fetch_all($result,MYSQLI_ASSOC);
            if(!empty($products)) {
                foreach($products as $prod) {
                    $id = $prod['id'];
                    echo "<tr><td>".$prod['id']."</td>
                          <td><img src='../../img/".$prod['image']."' width='100px'></td>
                          <td>".$prod['categorie']."</td>
                          <td>".$prod['name']."</td>
                          <td>".$prod['price']."</td>
                          <td>".$prod['status']."</td>";
                    echo '<td> <a target="blank" class="btn btn-info" href="update.php?id='.$id.'">Modifier</a> 
                          <a target="blank" class="btn btn-danger" href="delete.php?id='.$id.'">Delete</a> </td></tr>';
                }
            }
        }
    }

    public static function recherche($table,$id){
        $retConn = self::connecter();
        if($retConn != null){
            $info=[];
            $sql= "SELECT * FROM ".$table." WHERE id=".$id ;
            $result = $retConn->query($sql);
            while ($prod = $result->fetch_assoc()){
                $info[0] = $prod['categorie'];
                $info[1] = $prod['name'];
                $info[2] = $prod['price'];
                $info[3] = $prod['image'];
                $info[4] = $prod['status'];
            }
            $result->close();
            return $info;
        }
    }
    public function update($table,$id){
        $retConn = self::connecter();
        if($retConn != null){
            $categorie=$_POST['categorie'];
            $name=$_POST['name'];
            $price=$_POST['price'];
            $image=$_POST['image'];
            $status=$_POST['status'];
            $sql = "UPDATE ".$table." SET categorie='" .$categorie. "', name='" .$name. "' ,price= '".$price. "' ,image='" .$image. "' ,status='" .$status. "'  WHERE id='".$id."'";
            $result = $retConn->query($sql); 
            if ($result == TRUE) {
                echo "updated successfully.";
            }else{
                echo "Error:" . $retConn->error;
            }

        }
    }
    public static function getproducts(){
        $retConn = self::connecter();
        if($retConn != null){
           $sql = "SELECT * FROM product";
           $result = $retConn->query($sql); 
           $products= mysqli_fetch_all($result,MYSQLI_ASSOC);
           return count($products);
        }
    }
    
    public static function getnbrclients(){
        $retConn = self::connecter();
        if($retConn != null){
           $sql = "SELECT * FROM users";
           $result = $retConn->query($sql); 
           $users= mysqli_fetch_all($result,MYSQLI_ASSOC);
           return count($users);
        }
    }
}

?>

