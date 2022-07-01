<?php
class CRUD{
    function connecter(){
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
    public function ajouter($table){
        $retConn = self::connecter();
        if($retConn != null){
            $firstName=$_POST['FirstName'];
            $lastName=$_POST['lastName'];
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
            $sql= "DELETE FROM ".$table." WHERE id='".$_POST['user_id_delete']."'";
            if (mysqli_query($retConn, $sql)) {
                echo "User Deleted";
            } else {
                echo 'Error: ' . mysqli_error($retConn);
            }
            $retConn->close();
        }
    }
    public function show_user($table){
        $retConn = self::connecter();
        if($retConn != null){
            $user_id = $_POST['user_id_show'];
            $sql= "SELECT * FROM ".$table." WHERE id=".$user_id ;
            $result = $retConn->query($sql);
            while ($user = $result->fetch_assoc()){
                echo '<p>'. $user['id'].' - '. $user['firstName'].' '.$user['lastName'] .'</p>';
                echo '<p>Email: '.$user['email'].' || Password: '.$user['pswd'] .'</p><hr>';
            }
            $result->close();
        }
    }
    public function update($table){
        $retConn = self::connecter($table);
        if($retConn != null){
            $id=$_POST['id_update'];
            $newFirstName=$_POST['newFirstName'];
            $newLastName=$_POST['newLastName'];
            $newEmail=$_POST['newEmail'];
            $newPswd=$_POST['newPswd'];
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

if(!empty($_POST['pswd'])){
    echo CRUD::ajouter("users");
}
if(!empty($_POST['user_id_delete'])){
    echo CRUD::delete("users");
}
if(!empty($_POST['user_id_show'])){
    echo CRUD::show_user("users");
}
if(!empty($_POST['newPswd'])){
    echo CRUD::update("users");
}

?>
<html>
    <body style="margin:0 6% ;">
        <div style="display: flex; justify-content:space-between;margin-top:1rem;">
           <h2>GESTION DES UTILISATEURS</h2>
           <a href="./users.php" target="_blank" style="padding-top: 2rem;">SHOW ALL USERS</a>
        </div>
        <form action="" method="POST" >
            <fieldset>
                <legend style="text-decoration:underline; font-size:1.2rem">Add User</legend>
                Nom : <input type="text" name="lastName"><br>
                Prenom : <input type="text" name="FirstName"><br>
                Email : <input type="email" name="email" ><br>
                Password : <input type="password" name="pswd" ><br>
                <input type="button" name="add" value="ADD" onclick="this.form.submit()"><br>
            </fieldset><br>
            <fieldset>
                <legend style="text-decoration:underline; font-size:1.2rem">Delete User</legend>
                ID : <input type="text" name="user_id_delete">
                <button type="submit">delete</button>
            </fieldset><br>
            <fieldset>
                <legend style="text-decoration:underline; font-size:1.2rem">Show User</legend>
                ID : <input type="text" name="user_id_show">
                <button type="submit" name="show">Show</button>
            </fieldset><br>
            <fieldset>
                <legend style="text-decoration:underline; font-size:1.2rem">Update User</legend>
                ID : <input type="text" name="id_update"><br>
                Nom : <input type="text" name="newLastName"><br>
                Prenom : <input type="text" name="newFirstName"><br>
                Email : <input type="email" name="newEmail" ><br>
                Password : <input type="password" name="newPswd" ><br>
                <button type="submit" name="update">Update</button>
            </fieldset>
        </form>
    </body>
</html>
