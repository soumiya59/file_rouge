<?php

   session_start();
   
   $email = filter_input(INPUT_POST,'txt_email',
   FILTER_SANITIZE_SPECIAL_CHARS);
   $password= $_POST['txt_password'];

   if($email=='somaya@gmail.com' && $password =='password'){
       $_SESSION['txt_email']=$email;
       echo '<h1>Welcome ' . 'Somaya!' .'</h1>';
       echo '<a href="logout.php">logout</a>' ;
   } else{
       echo '<h1>Welcome Guest</h1>';
       echo '<a href="login.html">Home</a>';   
  }

          
  ?>