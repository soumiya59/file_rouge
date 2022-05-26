<?php

    session_start();

    setcookie('firstname', $_POST['first_name'], time()+ 86400*30);
    setcookie('lastname', $_POST['last_name'], time()+ 86400*30);
    setcookie('email', $_POST['email'], time()+ 86400*30);
    setcookie('password', $_POST['password'], time()+ 86400*30);   

   $_SESSION['first_name']=$_POST['first_name'];
   echo '<h1>Welcome ' . $_SESSION['first_name'] .'</h1>';
   echo '<a href="login.html">Home</a>';   
  

          
  ?>