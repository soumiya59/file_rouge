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
            $firstName=$_POST['firstname'];
            $lastName=$_POST['lastname'];
            $email=$_POST['email'];
            $password=$_POST['pswd'];
            $sql = "INSERT INTO ".$table." (firstName,lastName,email,pswd) VALUES ('$firstName', '$lastName', '$email', '$password')";
            if (mysqli_query($retConn, $sql)) {
              echo "User Ajouté";
            } else {
              echo 'Error: ' . mysqli_error($retConn);
            }
        }
    }
    public function delete($table){
        $retConn = self::connecter();
        if($retConn != null){
            if (isset($_GET['id'])) {
                $user_id = $_GET['id'];
                $sql= "DELETE FROM ".$table." WHERE id='".$user_id."'";
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
            $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
            if(!empty($users)) {
                foreach($users as $user) {
                    $id = $user['id'];
                    echo "<tr><td>".$user['id']."</td>
                          <td>".$user['firstName']."</td>
                          <td>".$user['lastName']."</td>
                          <td>".$user['email']."</td>";
                    echo '<td> <a class="btn btn-info" href="update.php?id='.$id.'">Modifier</a> 
                          <a class="btn btn-danger" href="delete.php?id='.$id.'">Delete</a> </td></tr>';
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
            while ($user = $result->fetch_assoc()){
                $info[0] = $user['firstName'];
                $info[1] = $user['lastName'];
                $info[2] = $user['email'];
                $info[3] = $user['pswd'];
            }
            $result->close();
            return $info;
        }
    }
    public static function userinfo($table,$email){
        $retConn = self::connecter();
        if($retConn != null){
            $info=[];
            $sql= "SELECT * FROM ".$table." WHERE email='".$email."'" ;
            $result = $retConn->query($sql);
            while ($user = $result->fetch_assoc()){
                $info[0] = $user['firstName'];
                $info[1] = $user['lastName'];
                $info[2] = $user['email'];
                $info[3] = $user['pswd'];
                $info[4] = $user['id'];
            }              
            $result->close();
            return $info;
        }
    }
    public function update($table,$id){
        $retConn = self::connecter();
        if($retConn != null){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "UPDATE ".$table." SET firstName='" .$firstname. "', lastName='" .$lastname. "' ,email='" .$email. "' ,pswd= '".$password. "'  WHERE id='".$id."'";
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

