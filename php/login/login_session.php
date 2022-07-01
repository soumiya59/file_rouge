<?php include 'database_login.php';?>

<?php
   session_start();
   $email = filter_input(INPUT_POST,'email',
   FILTER_SANITIZE_EMAIL);
   $password= $_POST['pswd'];
   $_SESSION['email'] = $email;

    if($email=='somaya@gmail.com' && $password =='password'){
       header('Location: ../../admin.php');
    }else{
         $sql = "SELECT * FROM users WHERE email='$email' AND pswd='$password'";
         $result = mysqli_query($conn,$sql);
         $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
         if(!empty($users)){
               foreach($users as $user){
                  if($user['email'] == $_SESSION['email']){
                     echo "<h1>Welcome ".$user['firstName'].' '.$user['lastName']. "</h1>";
                  }else{
                     echo '<h1>User does not exist</h1>';
                     // or wrong password
                  }
               }
         }
      }

?>
