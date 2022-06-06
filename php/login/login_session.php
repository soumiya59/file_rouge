<?php
  session_start();

   $email = filter_input(INPUT_POST,'user_email',
   FILTER_SANITIZE_EMAIL);
   $password= $_POST['user_password'];

    if($email=='somaya@gmail.com' && $password =='password'){
       echo '<h1>Welcome ' . 'Admin !' .'</h1>';
       echo '<a href="users.php">Users</a><br/>' ;
       echo '<a href="logout.php">logout</a>' ;
    } else{
       echo '<h1>Welcome Guest</h1>';
       echo '<a href="login.html">Home</a>';   
    }

?>
