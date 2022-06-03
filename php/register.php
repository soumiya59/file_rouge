<?php

    session_start();

    // setcookie('prenom', $_POST['txt_prenom'], time()+ 86400*30);
    // setcookie('nom', $_POST['txt_nom'], time()+ 86400*30);
    // setcookie('email', $_POST['txt_email'], time()+ 86400*30);
    // setcookie('password', $_POST['txt_password'], time()+ 86400*30);   

    $_SESSION['prenom']=$_POST['txt_prenom'];
    echo '<h1>Welcome ' . $_SESSION['prenom'] .'</h1>';
    echo '<a href="login.html">Home</a>';   
  
  ?>