<?php

   session_start();

   $email = filter_input(INPUT_POST,'email',
   FILTER_SANITIZE_SPECIAL_CHARS);
   $password= $_POST['password'];

   if($email=='somaya@gmail.com' && $password =='password'){
       $_SESSION['email']=$email;
       echo '<h1>Welcome ' . 'Somaya!' .'</h1>';
       echo '<a href="logout.php">logout</a>' ;
   } else{
    echo '<h1>Welcome Guest</h1>';
    echo '<a href="login.html">Home</a>';   
  }

          
  ?>