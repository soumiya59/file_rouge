<?php
class CRUD{
    public static function connecter(){
        define('DB_HOST','localhost');
        define('DB_USER','newuser');
        define('DB_PASSWORD','password');
        define('DB_NAME','CRUD');
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        if($conn->connect_error){
            die('connection failed : ' . $conn->connect_error);
        }else{
            return $conn;
        }
    }
    public static function ajouter($table,$firstname,$lastname,$email,$pswd){
        $retConn = self::connecter();
        if($retConn != null){
            $sql = "INSERT INTO ".$table." (firstName,lastName,email,pswd) VALUES ('$firstname', '$lastname', '$email', '$pswd')";
            if (mysqli_query($retConn, $sql)) {
              echo "User Ajouté";
            } else {
              echo 'Error: ' . mysqli_error($retConn);
            }
        }
    }
    public static function ajouter_poo($table,$firstName,$lastName,$email,$password){
        $retConn = self::connecter();
        if($retConn != null){
            $sql = "INSERT INTO ".$table." (user_first_name,user_last_name,user_email,user_password) VALUES ('$firstName', '$lastName', '$email', '$password')";
            if (mysqli_query($retConn, $sql)) {
              echo "User Ajouté";
            } else {
              echo 'Error: ' . mysqli_error($retConn);
            }
        }
    }

    public static function show_all_users($table){
        $retConn = self::connecter();
        if($retConn != null){
            $sql= "SELECT * FROM ".$table." ";
            $result = $retConn->query($sql);
            $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
            if(empty($users)){
                echo 'there is no data';
            }
            foreach($users as $user){
                echo '<p>'.$user['firstName'].' '.$user['lastName'] .'</p>';
                echo '<p>Email: '.$user['email'].' Password: '.$user['pswd'] .'</p><hr>';
            }
        }
    }
    public static function show_user($table,$id){
        $retConn = self::connecter();
        if($retConn != null){
            $sql= "SELECT * FROM ".$table." WHERE id=".$id ;
            $result = $retConn->query($sql);
            while ($user = $result->fetch_assoc()){
                echo '<p>'.$user['firstName'].' '.$user['lastName'] .'</p>';
                echo '<p>Email: '.$user['email'].' Password: '.$user['pswd'] .'</p><hr>';
            }
            $result->close();
        }
    }
    public static function delete($table,$id){
        $retConn = self::connecter();
        if($retConn != null){
            $sql= "DELETE FROM ".$table." WHERE id='".$id."'";
            if (mysqli_query($retConn, $sql)) {
                echo "User Deleted";
            } else {
                echo 'Error: ' . mysqli_error($retConn);
            }
            $retConn->close();
        }
    }

    public static function update($table,$id,$newFirstName,$newLastName,$newEmail,$newPswd){
        $retConn = self::connecter($table);
        if($retConn != null){
            $sql = "UPDATE ".$table." SET firstName='" .$newFirstName. "', lastName='" .$newLastName. "' ,email='" .$newEmail. "' ,pswd= '".$newPswd. "'  WHERE id='".$id."'";
            if($retConn->query($sql)){
               echo "Data updated successfully." ;
            }else{
               echo "ERROR: ", $retConn->error;
            }
            $retConn->close();
        }   
    }
}

echo CRUD::ajouter("user","sokaina","sokaina","mlll@gmail.com","ss111");
// echo CRUD::show_user("user",2);
// echo CRUD::show_all_users("user");
// echo CRUD::update("user",3,"sara","sokan","mlll@gmail.com","ss111");
// echo CRUD::delete("user",9);

?>
