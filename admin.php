<html>
   <head>
        <title>ADMIN PAGE</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="icon" href="img/icon.jpg" type="image/x-icon" />
        <script> 
        $(function(){
               $("#header").load("./include/Header.html"); 
               $("#footer").load("./include/Footer.html");
        });
        </script> 
        <style>
            tr td{
                border:1px solid grey;
                padding: .8rem;
                font-size: large;
            }
        </style>
   </head>
   
    <body>
        
        <div id="header"></div>

        <div class="container my-4 ban " style="min-height:700px ;">
        <h2 class="fw-bold">Welcome Admin!</h2>
        <form action="" method="POST" class="row mt-4">
        <div class="col-4 py-4 text-center">
            <button class="border-0 bg-light mb-3 fs-5" id="users" name="users">Gestion des Utilisateurs</button><br>
            <button class="border-0 bg-light mb-3 fs-5" id="products" name="products">Gestion des produits</button><br>
            <button class="border-0 bg-light mb-3 fs-5 " name="logout">logout</button>
        </div>
        <div class="col-8 ps-4 pt-4" style="border-left: 1px solid grey;">
                <?php
                    if(isset($_POST['users'])){
                        echo '<div class="text-dark fs-5 mb-3"><a class="text-dark" href="./php/login/view.php">> Update/Delete Users</a></div>' ;
                        echo '<div class="text-dark fs-5 "><a class="text-dark" href="./php/login/create.php">> Add Users</a></div>' ;
                        echo '<script>document.querySelector("#users").style.color= "#9e121b";
                        document.querySelector("#users").style.fontWeight= "bold"
                        </script>';
                    }
                    if(isset($_POST['products'])){
                        echo '<script>document.querySelector("#products").style.color= "#9e121b";
                        document.querySelector("#products").style.fontWeight= "bold"
                        </script>';
                        include "php/login/DAO.php";
                        echo "<table><tr>
                              <td>Nombre produit Total</td>
                              <td> ".DAO::getproducts()."</td></tr>
                              <tr>
                              <td>Nombre de comptes clients </td>
                              <td>".DAO::getnbrclients()."</td></tr>
                              <tr>
                              <td>Nombre de bouteilles vendues</td> 
                              <td>0</td>
                              </tr>
                              </table>";  
                    }
                    if(isset($_POST['logout'])){
                        header('location: ./php/login/logout.php');
                    }
                ?>
        </div>
        </form>
        </div>

        <div id="footer"></div>


    </body>

</html>