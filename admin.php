<html>
   <head>
        <title>Panier</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="icon" href="img/icon.jpg" type="image/x-icon" />
        <script> 
        $(function(){
               $("#header").load("./include/Header.html"); 
               $("#footer").load("./include/Footer.html");
        });
        </script> 

   </head>
   
    <body>
        
        <div id="header"></div>

        <div class="container my-4 ban " style="min-height:700px ;">
        <h2 class="fw-bold">Welcom Admin!</h2>
        <form action="" method="POST" class="row mt-4">
        <div class="col-4 py-4 text-center">
            <button class="border-0 bg-light fs-5" name="users">Gestion des Utilisateur</button><br>
            <button class="border-0 bg-light my-2 fs-5" name="products">Gestion des produits</button><br>
            <button class="border-0 bg-light fs-5 " name="logout">logout</button>
        </div>
        <div class="col-8 ps-4 pt-4" style="border-left: 1px solid grey;">
                <?php
                    if(isset($_POST['users'])){
                        echo '<a class="text-dark fs-5" href="php/login/users.php">Users</a><br/>' ;
                        echo '<a class="text-dark fs-5" href="php/login/user_controle.php">Controle Users</a><br/>' ;
                    }
                    if(isset($_POST['logout'])){
                        header('location:php/login/logout.php');
                    }
                ?>
        </div>
        </form>
        </div>

        <div id="footer"></div>


    </body>

</html>