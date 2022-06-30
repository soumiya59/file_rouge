<?php include 'database_login.php';?>

<?php
   session_start();
   $email = filter_input(INPUT_POST,'user_email',
   FILTER_SANITIZE_EMAIL);
   $password= $_POST['user_password'];
   $_SESSION['email'] = $email;

    if($email=='somaya@gmail.com' && $password =='password'){
       echo '<h1>Welcome Admin ! ' . '</h1>';
       echo '<a href="users.php">Users</a><br/>' ;
       echo '<a href="database_controle.php">Controle Users</a><br/>' ;
       echo '<a href="logout.php">logout</a>' ;
       
    }else{

         $sql = "SELECT * FROM users WHERE user_email='$email' AND user_password='$password'";
         $result = mysqli_query($conn,$sql);
         $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
         if(!empty($users)){
               foreach($users as $user){
                  if($user['user_email'] == $_SESSION['email']){
                     echo "<h1>Welcome ".$user['user_first_name'].' '.$user['user_last_name']. "</h1>";
                  }else{
                     echo '<h1>User does not exist</h1>';
                     // or wrong password
                  }
               }
         }
      }

?>
