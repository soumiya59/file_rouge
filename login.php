<?php

//  if(isset($_POST['checked'])){
 

//  }
// session_start();

    //  if(isset($_POST['submit'])){
    //     $email = filter_input(INPUT_POST,'email',
    //     FILTER_SANITIZE_SPECIAL_CHARS);
    //     $password= $_POST['password'];
     
    //     if($email=='somaya@gmail.com' && $password =='password'){
    //         $_SESSION['email']=$email;
    //         echo 'correct login';
    //        //  header('Location: ../php/extras/dashboard.php');
    //     }else{
    //         echo 'incorrect login';
    //     }
          
    //   }
    // echo 'hello'
    // setcookie('email', $_POST['email'], time()+ 86400*30);
    // setcookie('password', $_POST['password'], time()+ 86400*30);   
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