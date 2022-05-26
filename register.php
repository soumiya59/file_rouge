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
session_start();

    setcookie('firstname', $_POST['first_name'], time()+ 86400*30);
    setcookie('lastname', $_POST['last_name'], time()+ 86400*30);
    setcookie('email', $_POST['email'], time()+ 86400*30);
    setcookie('password', $_POST['password'], time()+ 86400*30);   

   $_SESSION['first_name']=$_POST['first_name'];
   echo '<h1>Welcome ' . $_SESSION['first_name'] .'</h1>';
   echo '<a href="login.html">Home</a>';   
  

          
  ?>