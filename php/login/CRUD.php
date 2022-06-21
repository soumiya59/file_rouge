<?php
class user{
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public function __construct($firstName,$lastName,$email,$password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->pswd = $password;
    }
    function connecter(){
        define('DB_HOST','localhost');
        define('DB_USER','newuser');
        define('DB_PASSWORD','password');
        define('DB_NAME','CRUD');
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        if($conn->connect_error){
            die('connection failed' . $conn->connect_error);
        }else{
            return $conn;
        }
    }
    public function ajouter($table){
        $retConn = $this->connecter();
        if($retConn != null){
            $sql = "INSERT INTO ".$table." (firstName,lastName,email,pswd) VALUES ('$this->firstName', '$this->lastName', '$this->email', '$this->pswd')";
            if (mysqli_query($retConn, $sql)) {
              echo "User Ajouté";
            } else {
              echo 'Error: ' . mysqli_error($retConn);
            }
        }
    }
    public function ajouter_poo($table,$firstName,$lastName,$email,$password){
        $retConn = $this->connecter();
        if($retConn != null){
            $sql = "INSERT INTO ".$table." (user_first_name,user_last_name,user_email,user_password) VALUES ('$firstName', '$lastName', '$email', '$password')";
            if (mysqli_query($retConn, $sql)) {
              echo "User Ajouté";
            } else {
              echo 'Error: ' . mysqli_error($retConn);
            }
        }
    }

    public function show_all_users($table){
        $retConn = $this->connecter();
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
    public function show_user($table,$id){
        $retConn = $this->connecter();
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
    public function delete($table,$id){
        $retConn = $this->connecter();
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

    public function update($table,$id,$newFirstName,$newLastName,$newEmail,$newPswd)
    {
        $retConn = $this->connecter($table);
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

$user1 = new user('somaya','ayouch','somaya@gmail.com','password');
// echo $user1->ajouter("user");
// echo $user1->show_all_users("user");
// echo $user1->show_user("user",2);
// echo $user1->delete("user",3);
// echo $user1->update("user",5,"soma","soka","shit@gmail.com","ss111");

?>
